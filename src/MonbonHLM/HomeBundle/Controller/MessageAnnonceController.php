<?php

namespace MonbonHLM\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MonbonHLM\DashboardBundle\Form\AnnonceType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use MonbonHLM\DashboardBundle\Entity\Annonce;

class MessageAnnonceController extends Controller
{
    public function MessageAction($id)
    {
        $user = $this->getUser();

        $em = $this->getDoctrine()->getManager();
        $annoncerepo = $em->getRepository('MonbonHLMDashboardBundle:Annonce');

        $annonceUserConnected = $annoncerepo->Auteurannonce($user->getId());
        $userann = $annonceUserConnected->getId();


        $annonce = $annoncerepo->find($id);

        $message = \Swift_Message::newInstance()
            ->setSubject('Une personne est intéressé par votre annonce')
            ->setFrom(array('monbonhlmmtp@gmail.com' => "MonbonHLM"))
            ->setTo($annonce->getAuteur()->getEmailCanonical())
            ->setCharset('utf-8')
            ->setContentType('text/html')
            ->setBody($this->renderView('MonbonHLMHomeBundle:Message:index.html.twig',
                array('user' => $user, 'annonce' => $annonce, 'userann' => $userann)));

        $this->get('mailer')->send($message);

        return $this->render('MonbonHLMHomeBundle:Message:messageok.html.twig');
    }
}
