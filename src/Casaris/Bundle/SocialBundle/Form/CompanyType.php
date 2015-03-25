<?php

namespace Casaris\Bundle\SocialBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CompanyType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cnpj')
            ->add('idCategory')
            ->add('idAddress')
            ->add('phone')
            ->add('cellphone')
            ->add('dateOpening')
            ->add('name')
            ->add('email')
            ->add('password')
            ->add('followers')
            ->add('photo')
            ->add('background')
            ->add('friends')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Casaris\Bundle\SocialBundle\Entity\Company'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'casaris_bundle_socialbundle_company';
    }
}
