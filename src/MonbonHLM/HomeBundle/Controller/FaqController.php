<?php

namespace MonbonHLM\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FaqController extends Controller
{
    public function ConditionsAction()
    {
        return $this->render('MonbonHLMHomeBundle:FAQ:conditions.html.twig');
    }

    public function MentionsAction()
    {
        return $this->render('MonbonHLMHomeBundle:FAQ:mentions.html.twig');
    }

    public function QuestionsreponsesAction()
    {
        return $this->render('MonbonHLMHomeBundle:FAQ:questionsreponses.html.twig');
    }
}
