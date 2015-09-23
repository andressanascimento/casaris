<?php

namespace Casaris\Bundle\SocialBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CompanyType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('name', 'text', array(
                    'required' => false,
                    'label' => 'Nome'))
                ->add('email', 'text', array(
                    'required' => false,
                    'label' => 'Email'))
                ->add('phone', 'text', array(
                    'required' => false,
                    'label' => 'Telefone'))
                ->add('site', 'text', array(
                    'required' => false,
                    'label' => 'Site'))
                ->add('description', 'textarea', array(
                    'required' => false,
                    'label' => 'História da Empresa'))
                ->add('cnpj', 'text', array(
                    'required' => false,
                    'label' => 'CNPJ'))
                ->add('category')
//                ->add('dateOpening', 'birthday', array(
//                    'required' => false,
//                    'label' => 'Data de Abertura'))
                ->add('save', 'submit', array(
                        'label' => 'Enviar',
                        'attr' => array('class' => 'btn btn-primary')
                        )
                )
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Casaris\Bundle\SocialBundle\Entity\Company'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'casaris_bundle_socialbundle_company';
    }

}
