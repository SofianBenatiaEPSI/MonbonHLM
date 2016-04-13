<?php


namespace MonbonHLM\DashboardBundle\Form;

use MonbonHLM\DashboardBundle\Entity\Logo_bailleur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Model\User;
use FOS\UserBundle\Security;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class BailleursType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('nom', 'text', array('attr' => array('class' => 'Nom')))
            ->add('logo', new Logo_bailleurFormType(), array('label' => 'Logo :'))
            ->add('adresse', 'text', array('attr' => array('class' => 'Nom')))
            ->add('telephone', 'text', array('attr' => array('class' => 'Nom')))
            ->add('siteweb', 'text', array('attr' => array('class' => 'Nom')))
            ->add('envoyer', 'submit');
    }

    public function getName() {
        return 'DashboardBundle_Photo_quartier';
    }
}