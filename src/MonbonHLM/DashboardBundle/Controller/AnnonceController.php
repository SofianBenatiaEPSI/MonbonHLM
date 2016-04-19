<?php

namespace MonbonHLM\DashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AnnonceController extends Controller
{
    public function RecupererAction($page)
    {
        $maxannonces = 30;

        $annonce_count = $this->getDoctrine()
            ->getRepository('MonbonHLMDashboardBundle:Annonce')
            ->countAnnonceTotal();

        $pagination = array(
            'page' => $page,
            'route' => 'monbon_hlm_admin_annonces',
            'pages_count' => ceil($annonce_count / $maxannonces),
            'route_params' => array()
        );

        $annonceTab = $this->getDoctrine()->getRepository('MonbonHLMDashboardBundle:Annonce')
            ->Recupererannonceadmin($page, $maxannonces);

        return $this->render('MonbonHLMDashboardBundle:Annonce:index.html.twig', array(
            'annonceTab' => $annonceTab,
            'pagination' => $pagination,
            'annoncecount' => $annonce_count
        ));
    }

    public function SupprimerAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $annoncedet = $em->getRepository('MonbonHLMDashboardBundle:Annonce')->find($id);

        if (!$annoncedet) {
            throw $this->createNotFoundException(
                'Aucun élément trouvé pour cet id : '.$id
            );
        }

        $em->remove($annoncedet);
        $em->flush();

        return $this->redirect($this->generateUrl('monbon_hlm_admin_annonces'));
    }

}
