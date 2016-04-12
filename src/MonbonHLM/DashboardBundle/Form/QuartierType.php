<?php


namespace MonbonHLM\DashboardBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Model\User;
use FOS\UserBundle\Security;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class QuartierType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('nom', 'text', array('attr' => array('class' => 'Nom')))
            ->add('photo', new Photo_quartierFormType(), array('label' => 'Photos du quartier :'))
            ->add('envoyer', 'submit');
    }

    public function getName() {
        return 'DashboardBundle_Photo_quartier';
    }
}