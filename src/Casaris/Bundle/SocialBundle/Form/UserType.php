<?php

namespace Casaris\Bundle\SocialBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('name', 'text', array(
                    'required' => false,
                    'label' => 'Nome'
                        )
                )
                ->add('email', 'text', array(
                    'required' => false,
                    'label' => 'Email'
                        )
                )
                ->add('password', 'repeated', array(
                    'type' => 'password',
                    'invalid_message' => 'As senhas não correspondem',
                    'options' => array('attr' => array('class' => 'password-field')),
                    'required' => true,
                    'first_options' => array('label' => 'Senha'),
                    'second_options' => array('label' => 'Repita a senha'),
                ))
                ->add('type', 'choice', array(
                    'label' => 'Perfil',
                    'choices' => array(
                        'client' => 'Cliente',
                        'company' => 'Empresa',
                    ),
                ))
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
            'data_class' => 'Casaris\Bundle\SocialBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'register_user';
    }

}
