<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MonbonHLM\UserBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', 'text', array('attr' => array('class' => 'nom')))
            ->add('prenom', 'text', array('attr' => array('class' => 'prenom')))
            ->add('telephone', 'text', array('attr'=> array('class'=> 'telephone')))
        ;
    }

    public function getParent()
    {
        return 'fos_user_registration';
    }

    public function getBlockPrefix()
    {
        return 'monbonhlm_user_registration';
    }

    public function getName()
    {
        return $this->getBlockPrefix();
    }
}
