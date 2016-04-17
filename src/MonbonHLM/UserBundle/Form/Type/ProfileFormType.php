<?php
namespace MonbonHLM\UserBundle\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
class ProfileFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder
                ->add('current_password', 'password', array(
                    'label' => 'form.current_password',
                    'translation_domain' => 'FOSUserBundle',
                    'mapped' => false))
                ->add('plainPassword', 'repeated', array(
                    'type' => 'password',
                    'options' => array('translation_domain' => 'FOSUserBundle'),
                    'first_options' => array('label' => 'form.new_password'),
                    'second_options' => array('label' => 'form.new_password_confirmation'),
                    'invalid_message' => 'fos_user.password.mismatch'))
                ->add('nom',null, array(
                    'label' => 'Nom :',
                    'required' => true))
                ->add('prenom',null, array(
                    'label' => 'Prenom :',
                    'required' => true,))
                ->add('telephone',null, array('label' => 'Téléphone :'));
    }

    public function getParent()
    {
        return 'fos_user_profile';
    }
    public function getName()
    {
        return 'monbonhlm_user_profile';
    }
}