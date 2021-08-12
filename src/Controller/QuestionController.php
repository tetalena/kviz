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
        $repository = $entityManager->getRepository(Kviz::class);
        $kvizy = $repository->findAll();

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
                            if ($odpoved->getJeSpravna() === TRUE) {
                                $odpoved->setJeVybrana(TRUE);
                                $otazka->setJeZodpovezenaSpravne(TRUE);
                                $spravnychOdpovedi++;
                            }
                        }
                    }
                }
            }
        }

        if ($user !== NULL) {
            // Přihlášený uživatel.
            $repositoryVysledek = $entityManager->getRepository(Vysledek::class);
            $vysledek = $repositoryVysledek->findOneBy(['user' => $user, 'kviz' => $kviz]);
            if ($vysledek === NULL) {
                $vysledek = new Vysledek();
            }

            $procent = ($spravnychOdpovedi * 100) / count($otazky);

            $vysledek->setUser($user)->setKviz($kviz)->setProcent($procent);
            $entityManager->persist($vysledek);

            // Finální uložení do dtb.
            $entityManager->flush();
        }


        return $this->render("question/result.html.twig", [
            "question" => $slug,
            "kviz" => $kviz,
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
