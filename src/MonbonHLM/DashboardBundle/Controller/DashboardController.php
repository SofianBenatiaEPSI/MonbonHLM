<?php

namespace MonbonHLM\DashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller
{
    public function RecupererAction()
    {
        $annonce = $this->getDoctrine()->getRepository('MonbonHLMDashboardBundle:Annonce');
        $annoncedashTab = $annonce->Recupererannonce();

        return $this->render('MonbonHLMDashboardBundle:Dashboard:index.html.twig', array(
            'annoncedashTab' => $annoncedashTab
        ));
    }
}
