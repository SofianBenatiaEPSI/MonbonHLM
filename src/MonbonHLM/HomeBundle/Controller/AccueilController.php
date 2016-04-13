<?php

namespace MonbonHLM\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AccueilController extends Controller
{
    public function RecupererAction()
    {
        $annonce = $this->getDoctrine()->getRepository('MonbonHLMDashboardBundle:Annonce');
        $annonceaccTab = $annonce->Recupererannonceaccueil();

        $bailleur = $this->getDoctrine()->getRepository('MonbonHLMDashboardBundle:Bailleur');
        $bailleuraccTab = $bailleur->Recupererbailleursaccueil();


        return $this->render('MonbonHLMHomeBundle:Accueil:index.html.twig', array(
            'annonceaccTab' => $annonceaccTab, 'bailleuraccTab' => $bailleuraccTab
        ));
    }


}
