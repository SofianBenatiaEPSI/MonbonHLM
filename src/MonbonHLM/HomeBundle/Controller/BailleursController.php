<?php

namespace MonbonHLM\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use MonbonHLM\DashboardBundle\Entity\Bailleur;
use MonbonHLM\DashboardBundle\Form\BailleursType;

class BailleursController extends Controller
{
    public function IndexAction($page)
    {
        $maxbailleurs = 9;

        $bailleurs_count = $this->getDoctrine()
            ->getRepository('MonbonHLMDashboardBundle:Bailleur')
            ->countbailleursTotal();

        $pagination = array(
            'page' => $page,
            'route' => 'monbon_hlm_home_bailleurs',
            'pages_count' => ceil($bailleurs_count / $maxbailleurs),
            'route_params' => array()
        );

        $bailleursTab = $this->getDoctrine()->getRepository('MonbonHLMDashboardBundle:Bailleur')
            ->Recupererbailleurs($page, $maxbailleurs);

        return $this->render('MonbonHLMHomeBundle:Bailleurs:index.html.twig', array(
            'bailleursTab' => $bailleursTab,
            'pagination' => $pagination
        ));
    }

    public function modifierbailleurAction($id)
    {
        $bailleur = $this->getDoctrine()->getRepository('MonbonHLMDashboardBundle:Bailleur');
        $bailleurdet = $bailleur->RecupererbailleursParId($id);

        $form = $this->createForm(new BailleursType(), $bailleurdet);

        if ($this->get('request')->getMethod() == 'POST'){
            //On récupére les données du formulaire
            $form->bind($this->get('request'));
            if ($form->isValid())
            {
                $em = $this->getDoctrine()->getManager();
                $bailleurdet->setNom($form["nom"]->getData());
                $bailleurdet->setAdresse($form["adresse"]->getData());
                $bailleurdet->setTelephone($form["telephone"]->getData());
                $bailleurdet->setSiteweb($form["siteweb"]->getData());
                $bailleurdet->setlogo($form["logo"]->getData());
                $em->persist($bailleurdet);
                $em->flush();
                return new RedirectResponse($this->generateUrl('monbon_hlm_home_bailleurs'));
            }
        }
        return $this->render('MonbonHLMHomeBundle:Bailleurs:modifier.html.twig',  array('form'=>$form->createView()));
    }


}
