<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class QuestionController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function homepage()
    {
        return $this->render("question/homepage.html.twig");
    }


    /**
     * @Route("/otazka/{slug}", name="app_question_show")
     */
    public function show($slug)
    {
        $answers = [
            "otazka1",
            "otazka2",
            "otazka3",
        ];

        return $this->render("question/show.html.twig", [
            "question" => $slug,
            "answers" => $answers,
        ]);
    }
}