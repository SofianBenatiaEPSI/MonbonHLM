<?php

namespace MonbonHLM\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MonbonHLM\DashboardBundle\Form\QuartierType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use MonbonHLM\DashboardBundle\Entity\Quartier;

class TypeLogementController extends Controller
{
    public function IndexAction($page)
    {
        $maxtypelogement = 9;

        $typelogement_count = $this->getDoctrine()
            ->getRepository('MonbonHLMDashboardBundle:Typelogement')
            ->countTypelogementTotal();

        $pagination = array(
            'page' => $page,
            'route' => ' monbon_hlm_home_type_logement',
            'pages_count' => ceil($typelogement_count / $maxtypelogement),
            'route_params' => array()
        );

        $typelogementTab = $this->getDoctrine()->getRepository('MonbonHLMDashboardBundle:TypeLogement')
            ->Recuperertypelogement($page, $maxtypelogement);

        return $this->render('MonbonHLMHomeBundle:Typelogement:index.html.twig', array(
            'typelogementTab' => $typelogementTab,
            'pagination' => $pagination
        ));
    }
}
