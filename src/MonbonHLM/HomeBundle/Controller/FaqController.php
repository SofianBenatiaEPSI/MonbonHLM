<?php

namespace MonbonHLM\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FaqController extends Controller
{
    public function FonctionnementAction()
    {
        return $this->render('MonbonHLMHomeBundle:FAQ:fonctionnement.html.twig');
    }

    public function DemarchesAction()
    {
        return $this->render('MonbonHLMHomeBundle:FAQ:demarches.html.twig');
    }

    public function QuestionsreponsesAction()
    {
        return $this->render('MonbonHLMHomeBundle:FAQ:questionsreponses.html.twig');
    }
}
