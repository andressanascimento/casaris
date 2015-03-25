<?php

namespace Casaris\Bundle\SocialBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Casaris\Bundle\SocialBundle\Form\AddressType;

class ClientType extends AbstractType {

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
                ->add('birthday', 'birthday', array(
                    'required' => false,
                    'label' => 'Data de nascimento'
                ))
                ->add('cpf', 'text', array(
                    'required' => false,
                    'label' => 'CPF'
                ))
                ->add('city', 'text', array(
                    'required' => false,
                    'label' => 'Cidade')
                )
                
                ->add('state', 'choice', array(
                    'choices' => array(
                        '' => 'Selecione um estado', 
                        'AC' => 'Acre', 
                        'AL' => 'Alagoas',
                        'AP' => 'Amapá',
                        'AM' => 'Amazonas',
                        'BA' => 'Bahia',
                        'CE' => 'Ceará',
                        'DF' => 'Distrito Federal',
                        'ES' => 'Espírito Santo',
                        'GO' => 'Goiás',
                        'MA' => 'Maranhão',
                        'MT' => 'Mato Grosso',
                        'MS' => 'Mato Grosso do Sul',
                        'MG' => 'Minas Gerais',
                        'PA' => 'Pará',
                        'PB' => 'Paraíba',
                        'PR' => 'Paraná',
                        'PE' => 'Pernambuco',
                        'PI' => 'Piauí',
                        'RJ' => 'Rio de Janeiro',
                        'RN' => 'Rio Grande do Norte',
                        'RS' => 'Rio Grande do Sul',
                        'RO' => 'Rondônia',
                        'RR' => 'Roraima',
                        'SC' => 'Santa Catarina',
                        'SP' => 'São Paulo',
                        'SE' => 'Sergipe',
                        'TO' => 'Tocantins'
                        ),
                    'label' => 'Estado'
                        )
                )
                ->add('cellphone', 'text', array(
                    'required' => false,
                    'label' => 'Telefone')
                )
                ->add('profession', 'text', array(
                    'required' => false,
                    'label' => 'Profissão'))
                ->add('gender', 'choice', array(
                    'choices' => array('F' => 'Feminino', 'M' => 'Masculino'),
                    'label' => 'Sexo'
                        )
                )
                
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
            'data_class' => 'Casaris\Bundle\SocialBundle\Entity\Client'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'casaris_bundle_socialbundle_client';
    }

}
