<?php

namespace MainBundle\Form;

use MainBundle\Entity\People;
use MainBundle\Entity\Person;
use MainBundle\Entity\Race;
use MainBundle\Entity\Society;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PeopleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')
                ->add('race', RaceType::class)
                ->add('person', CollectionType::class, array(
                'entry_type' => PersonType::class,
                'entry_options' => array('label' => false)));
                //->add('user')

        //->add('user')
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => People::class,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'mainbundle_people';
    }


}
