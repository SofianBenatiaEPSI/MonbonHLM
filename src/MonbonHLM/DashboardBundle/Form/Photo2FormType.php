<?php
namespace MonbonHLM\DashboardBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
class Photo2FormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('file', 'file', array('label' => false));

    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MonbonHLM\DashboardBundle\Entity\Photo2'
        ));
    }
    public function getName()
    {
        return 'monbon_hlm_home_annonce';
    }
}