<?php

namespace MonbonHLM\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MonbonHLM\DashboardBundle\Form\QuartierType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use MonbonHLM\DashboardBundle\Entity\Quartier;

class TypeLogementController extends Controller
{
    public function IndexAction()
    {
        return $this->render('MonbonHLMHomeBundle:TypeLogement:index.html.twig');
    }
}
