<?php

namespace App\Controller;

use App\Entity\Kviz;
use App\Entity\Vysledek;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;

class QuestionController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function homepage(EntityManagerInterface $entityManager)
    {
        $repositoryKviz = $entityManager->getRepository(Kviz::class);
        $kvizy = $repositoryKviz->findAll();

        $user = $this->getUser();

        if ($user !== NULL) {
            $repositoryVysledky = $entityManager->getRepository(Vysledek::class);
            $vysledky = $repositoryVysledky->findBy(['user' => $user]);

            foreach ($vysledky as $vysledek) {
                foreach ($kvizy as $kviz) {
                    if ($kviz === $vysledek->getKviz()) {
                        $kviz->setVysledky($vysledek);
                    }
                }
            }
        }

        return $this->render("question/homepage.html.twig", [
            "kvizy" => $kvizy,
        ]);
    }

    /**
     * @Route("/otazka/{slug}/vyhodnoceni/", name="app_question_result")
     */
    public function result($slug, EntityManagerInterface $entityManager) {
        $repositoryKviz = $entityManager->getRepository(Kviz::class);
        $kviz = $repositoryKviz->findOneBy(['slug' => $slug]);

        $spravnychOdpovedi = 0;

        $user = $this->getUser();

        $otazky = $kviz->getOtazky()->getValues();

        foreach ($_POST as $idOtazka => $idOdpoved) {
            $idOdpoved = intval($idOdpoved);
            foreach ($otazky as $otazka) {
                if ($otazka->getId() === $idOtazka) {
                    $odpovedi = $otazka->getOdpovedi();
                    foreach ($odpovedi as $odpoved) {
                        if ($odpoved->getId() === $idOdpoved) {
                            $odpoved->setJeVybrana(TRUE);
                            if ($odpoved->getJeSpravna() === TRUE) {
                                $otazka->setJeZodpovezenaSpravne(TRUE);
                                $spravnychOdpovedi++;
                            }
                        }
                    }
                }
            }
        }

        $procent = round(($spravnychOdpovedi * 100) / count($otazky), 1);

        if ($user !== NULL) {
            // P??ihl????en?? u??ivatel.
            $repositoryVysledek = $entityManager->getRepository(Vysledek::class);
            $vysledek = $repositoryVysledek->findOneBy(['user' => $user, 'kviz' => $kviz]);
            if ($vysledek === NULL) {
                $vysledek = new Vysledek();
            }


            $vysledek->setUser($user)->setKviz($kviz)->setProcent($procent);
            $entityManager->persist($vysledek);

            // Fin??ln?? ulo??en?? do dtb.
            $entityManager->flush();
        }


        return $this->render("question/result.html.twig", [
            "question" => $slug,
            "kviz" => $kviz,
            "procent" => $procent,
            "spravne" => $spravnychOdpovedi,
        ]);
    }

    /**
     * @Route("/otazka/{slug}/", name="app_question_show")
     */
    public function show($slug, EntityManagerInterface $entityManager)
    {
        $repositoryKviz = $entityManager->getRepository(Kviz::class);
        $kviz = $repositoryKviz->findOneBy(['slug' => $slug]);

        return $this->render("question/show.html.twig", [
            "question" => $slug,
            "kviz" => $kviz,
        ]);
    }
}
