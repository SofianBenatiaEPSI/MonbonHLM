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

class AnnonceType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('reference_locataire', 'text', array('attr' => array('class' => 'Nom')))
            ->add('reference_bailleur', 'entity', array('class'=>'MonbonHLMDashboardBundle:Bailleur', 'property' => 'nom' ))
            ->add('type_logement', 'entity', array('class'=>'MonbonHLMDashboardBundle:TypeLogement', 'property' => 'type' ))
            ->add('quartier', 'entity', array('class'=>'MonbonHLMDashboardBundle:Quartier', 'property' => 'nom' ))
            ->add('adresse', 'text', array('attr' => array('class' => 'adresse')))
            ->add('code_postal', 'entity', array('class'=>'MonbonHLMDashboardBundle:CodePostal', 'property' => 'code' ))
            ->add('etage', 'text', array('attr' => array('class' => 'etage')))
            ->add('numero_logement', 'text', array('attr'=> array('class'=> 'numero_logement')))
            ->add('description_complementaire', 'textarea', array('attr' => array('class' => 'ckeditor')))
            ->add('photo_principal', new PhotoPrincipalFormType(), array('label' => 'Photo principal du logement :'))
            ->add('photo_2', new Photo2FormType(), array('label' => 'Photo 2 du logement :'))
            ->add('photo_3', new Photo3FormType(), array('label' => 'Photo 3 du logement :'))
            ->add('type_logementrechercher', 'entity', array('class'=>'MonbonHLMDashboardBundle:TypeLogement', 'property' => 'type', 'label' => 'Type de logement rechercher' ))
            ->add('envoyer', 'submit', array('attr' => array('class'=>'button')));
    }

    public function getName() {
        return 'HomeBundle_Annonce';
    }
}