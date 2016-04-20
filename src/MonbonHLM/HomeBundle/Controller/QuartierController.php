<?php

namespace MonbonHLM\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MonbonHLM\DashboardBundle\Form\QuartierType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use MonbonHLM\DashboardBundle\Entity\Quartier;

class QuartierController extends Controller
{
    public function AjouterAction()
    {

        $quartier = New quartier();

        $form = $this->createForm(new QuartierType, $quartier);

        $request = $this->get('request');
        if ($request->getMethod() == 'POST'){
            $form->handleRequest($request);

            if ($form->isValid()){

                $em=  $this->getDoctrine()->getManager();
                $em-> persist($quartier);
                $em->flush();
                return new RedirectResponse($this->generateUrl('monbon_hlm_home_quartiers'));

            }

        }
        return $this->render('MonbonHLMDashboardBundle:Quartier:ajouterquartier.html.twig',
            array('form'=>$form->createView()));

    }

    public function IndexAction($page)
    {
        $maxquartier = 30;

        $quartier_count = $this->getDoctrine()
            ->getRepository('MonbonHLMDashboardBundle:Quartier')
            ->countQuartierTotal();

        $pagination = array(
            'page' => $page,
            'route' => 'monbon_hlm_home_quartier',
            'pages_count' => ceil($quartier_count / $maxquartier),
            'route_params' => array()
        );

        $quartierTab = $this->getDoctrine()->getRepository('MonbonHLMDashboardBundle:Quartier')
            ->Recupererquartier($page, $maxquartier);

        return $this->render('MonbonHLMHomeBundle:Quartier:index.html.twig', array(
            'quartierTab' => $quartierTab,
            'pagination' => $pagination
        ));
    }
}
