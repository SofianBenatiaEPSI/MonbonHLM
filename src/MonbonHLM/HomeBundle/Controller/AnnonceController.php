<?php

namespace MonbonHLM\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MonbonHLM\DashboardBundle\Form\AnnonceType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use MonbonHLM\DashboardBundle\Entity\Annonce;

class AnnonceController extends Controller
{
    public function AjouterAction()
    {

        $annonce = New Annonce();

        $form = $this->createForm(new AnnonceType, $annonce);

        $request = $this->get('request');
        if ($request->getMethod() == 'POST'){
            $form->handleRequest($request);

            if ($form->isValid()){

                $em=  $this->getDoctrine()->getManager();
                $em-> persist($annonce);
                $em->flush();
                return new RedirectResponse($this->generateUrl('monbon_hlm_home_annonces'));

            }

        }
        return $this->render('MonbonHLMHomeBundle:Annonce:ajouterannonce.html.twig',
            array('form'=>$form->createView()));

    }


    public function RecupererAction($page)
    {
        $maxannonces = 12;

        $annonce_count = $this->getDoctrine()
            ->getRepository('MonbonHLMDashboardBundle:Annonce')
            ->countAnnonceTotal();

        $pagination = array(
            'page' => $page,
            'route' => 'monbon_hlm_home_annonces',
            'pages_count' => ceil($annonce_count / $maxannonces),
            'route_params' => array()
        );

        $annonceTab = $this->getDoctrine()->getRepository('MonbonHLMDashboardBundle:Annonce')
            ->Recupererannonce($page, $maxannonces);

        return $this->render('MonbonHLMHomeBundle:Annonce:index.html.twig', array(
            'annonceTab' => $annonceTab,
            'pagination' => $pagination
        ));
    }

    public function RecupererdeuxAction()
    {
        $annonce = $this->getDoctrine()->getRepository('MonbonHLMDashboardBundle:Annonce');
        $annonceTab = $annonce->Recupererannonce();

        return $this->render('ParrainlinkHomeBundle:Accueil:index.html.twig', array(
            'annonceTab' => $annonceTab,
        ));
    }
}
