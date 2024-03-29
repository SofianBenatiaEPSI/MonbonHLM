<?php

namespace MonbonHLM\DashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MonbonHLM\DashboardBundle\Entity\Quartier;
use MonbonHLM\DashboardBundle\Form\QuartierType;
use Symfony\Component\HttpFoundation\RedirectResponse;

class QuartiersController extends Controller
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
                return new RedirectResponse($this->generateUrl('monbon_hlm_admin_annonces'));

            }

        }
        return $this->render('MonbonHLMDashboardBundle:Quartier:ajouterquartier.html.twig',
            array('form'=>$form->createView()));

    }
}
