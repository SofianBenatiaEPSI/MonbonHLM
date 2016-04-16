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

                $auteur = $this->get('security.context')->getToken()->getUser();
                $annonce->setAuteur($auteur);

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
            'pagination' => $pagination,
            'annoncecount' => $annonce_count
        ));
    }

    public function QuartierAction($id, $page=1)
    {
        $maxquartiers = 12;

        $annonce_count = $this->getDoctrine()
            ->getRepository('MonbonHLMDashboardBundle:Annonce')
            ->countAnnonceQuartierTotal($id);


        $annonceTab = $this->getDoctrine()->getRepository('MonbonHLMDashboardBundle:Annonce')
            ->Recupererannoncequartier($id, $page, $maxquartiers);

        $maxquartiers = 12;
        $pagination = array(
            'page' => $page,
            'route' => 'monbon_hlm_home_annonces',
            'pages_count' => ceil($annonce_count / $maxquartiers),
            'route_params' => array()
        );

        return $this->render('MonbonHLMHomeBundle:Annonce:index.html.twig', array(
            'annonceTab' => $annonceTab,
            'pagination' => $pagination,
            'annoncecount' => $annonce_count
        ));
    }

    public function BailleursAction($id, $page=1)
    {
        $maxannonces = 12;

        $annonce_count = $this->getDoctrine()
            ->getRepository('MonbonHLMDashboardBundle:Annonce')
            ->countAnnonceBailleursTotal($id);


        $annonceTab = $this->getDoctrine()->getRepository('MonbonHLMDashboardBundle:Annonce')
            ->Recupererannoncebailleurs($id, $page, $maxannonces);

        $maxannonces = 12;
        $pagination = array(
            'page' => $page,
            'route' => 'monbon_hlm_home_annonces',
            'pages_count' => ceil($annonce_count / $maxannonces),
            'route_params' => array()
        );

        return $this->render('MonbonHLMHomeBundle:Annonce:index.html.twig', array(
            'annonceTab' => $annonceTab,
            'pagination' => $pagination,
            'annoncecount' => $annonce_count
        ));
    }

    public function TypelogementAction($id, $page=1)
    {
        $maxannonces = 12;

        $annonce_count = $this->getDoctrine()
            ->getRepository('MonbonHLMDashboardBundle:Annonce')
            ->countAnnonceTypelogementTotal($id);


        $annonceTab = $this->getDoctrine()->getRepository('MonbonHLMDashboardBundle:Annonce')
            ->Recupererannoncetypelogement($id, $page, $maxannonces);

        $maxannonces = 12;
        $pagination = array(
            'page' => $page,
            'route' => 'monbon_hlm_home_annonces',
            'pages_count' => ceil($annonce_count / $maxannonces),
            'route_params' => array()
        );

        return $this->render('MonbonHLMHomeBundle:Annonce:index.html.twig', array(
            'annonceTab' => $annonceTab,
            'pagination' => $pagination,
            'annoncecount' => $annonce_count
        ));
    }
    

    public function DetailAction($id)
    {
        $annonce = $this->getDoctrine()->getRepository('MonbonHLMDashboardBundle:Annonce');
        $annoncedet = new \MonbonHLM\DashboardBundle\Entity\Annonce();
        $annoncedet = $annonce->RecupererAnnonceParId($id);

        return $this->render('MonbonHLMHomeBundle:Annonce:detailsannonce.html.twig', array('annonce' => $annoncedet));
    }

    public function ModifierAction($id)
    {
        $annonce = $this->getDoctrine()->getRepository('MonbonHLMDashboardBundle:Annonce');
        $annoncedet = $annonce->RecupererAnnonceParId($id);

        $form = $this->createForm(new AnnonceType(), $annoncedet);

        if ($this->get('request')->getMethod() == 'POST'){
            //On récupére les données du formulaire
            $form->bind($this->get('request'));
            if ($form->isValid())
            {
                $em = $this->getDoctrine()->getManager();
                $annoncedet->setReferencebailleur($form["reference_bailleur"]->getData());
                $annoncedet->setQuartier($form["quartier"]->getData());
                $annoncedet->setCodepostal($form["code_postal"]->getData());
                $annoncedet->setPhoto2($form["photo_2"]->getData());
                $annoncedet->setPhoto3($form["photo_3"]->getData());
                $annoncedet->setTypelogement($form["type_logement"]->getData());
                $annoncedet->setReferencelocataire($form["reference_locataire"]->getData());
                $annoncedet->setAdresse($form["adresse"]->getData());
                $annoncedet->setEtage($form["etage"]->getData());
                $annoncedet->setNumerologement($form["numero_logement"]->getData());
                $annoncedet->setDescriptioncomplementaire($form["description_complementaire"]->getData());
                $annoncedet->setPhotoPrincipal($form["photo_principal"]->getData());
                $em->persist($annoncedet);
                $em->flush();
                return new RedirectResponse($this->generateUrl('monbon_hlm_dashboard_homepage'));
            }
        }
        return $this->render('MonbonHLMHomeBundle:Annonce:modifierannonce.html.twig',  array('form'=>$form->createView()));
    }


}
