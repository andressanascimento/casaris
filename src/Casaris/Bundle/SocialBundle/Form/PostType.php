<?php

namespace Casaris\Bundle\SocialBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PostType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('content', 'textarea', array(
                    'label' => false,
                    'attr' => array('placeholder' => 'Publique algo para seus amigos!')))
                ->add('save', 'submit', array(
                    'label' => 'Enviar',
                    'attr' => array('class' => 'btn btn-primary')
                        )
        );
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Casaris\Bundle\SocialBundle\Entity\Post'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'casaris_bundle_socialbundle_post';
    }

}
