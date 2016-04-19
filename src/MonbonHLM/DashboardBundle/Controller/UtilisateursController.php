<?php

namespace MonbonHLM\DashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UtilisateursController extends Controller
{
    public function RecupererAction($page=1)
    {
        $maxUtilisateurs=30;

        $utilisateurs_count = $this->getDoctrine()
            ->getRepository('MonbonHLMUserBundle:Utilisateurs')
            ->countUtilisateursTotal();

        $pagination = array(
            'page' => $page,
            'route' => 'monbon_hlm_admin_utilisateurs',
            'pages_count' => ceil($utilisateurs_count / $maxUtilisateurs),
            'route_params' => array()
        );

        $utilisateursTab = $this->getDoctrine()->getRepository('MonbonHLMUserBundle:Utilisateurs')
            ->RecupererUtilisateurs($page, $maxUtilisateurs);


        return $this->render('MonbonHLMDashboardBundle:Users:index.html.twig', array(
            'utilisateursTab' => $utilisateursTab,
            'pagination' => $pagination
        ));


    }

    public function SupprimerAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $utilisateurs = $em->getRepository('MonbonHLMUserBundle:Utilisateurs')->find($id);

        if (!$utilisateurs) {
            throw $this->createNotFoundException(
                'Aucun élément trouvé pour cet id : '.$id
            );
        }

        $em->remove($utilisateurs);
        $em->flush();

        return $this->redirect($this->generateUrl('monbon_hlm_admin_annonces'));
    }
}
