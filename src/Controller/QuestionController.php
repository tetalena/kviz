<?php

namespace App\Controller;

use App\Entity\Kviz;
use App\Entity\Odpoved;
use App\Entity\Otazka;
use Symfony\Component\HttpFoundation\Response;
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
     * @Route("/otazka/{slug}/", name="app_question_show")
     */
    public function show($slug, EntityManagerInterface $entityManager)
    {
        $repositoryKviz = $entityManager->getRepository(Kviz::class);
        $kviz = $repositoryKviz->findOneBy(['slug' => $slug]);

        $otazky = $kviz->getOtazky()->getValues();

        return $this->render("question/show.html.twig", [
            "question" => $slug,
            "kviz" => $kviz,
            "otazky" => $otazky,
        ]);
    }
}
