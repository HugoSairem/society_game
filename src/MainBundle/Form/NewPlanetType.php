<?php

namespace MainBundle\Form;

use MainBundle\Entity\Solar;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NewPlanetType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')
                ->add('precipitation', ChoiceType::class,
                    array('choices' => array(
                        'Waterworld'=> 2.00,
                        'Archipelago'=> 1.75,
                        'Tropical'=> 1.50,
                        'Lot of rain'=> 1.25,
                        'Normal'=> 1.00,
                        'Dusty'=> 0.75,
                        'Arid'=> 0.50,
                        'Very Arid'=> 0.25,
                        'Dry'=> 00,
                    )))
            ->add('temperature', ChoiceType::class,
                array('choices' => array(
                    'Fusion'=> 2.00,
                    'Very Hot'=> 1.75,
                    'Hot'=> 1.50,
                    'Tropical'=> 1.25,
                    'Temperate'=> 1.00,
                    'Fresh'=> 0.75,
                    'Cold'=> 0.50,
                    'Very Cold'=> 0.25,
                    'Iced'=> 00,
                )))
            ->add('toxicity', ChoiceType::class,
                array('choices' => array(
                    'Deadly'=> 1.00,
                    'Really toxic'=> 0.75,
                    'Toxic'=> 0.50,
                    'Somewhat toxic'=> 0.25,
                    'No toxic'=> 0.00,
                )))
            ->add('atmosphere', ChoiceType::class,
                array('choices' => array(
                    'Too dense'=> 2.00,
                    'Dense'=> 1.75,
                    'Heavy'=> 1.50,
                    'Little more heavy'=> 1.25,
                    'Normal'=> 1.00,
                    'Little bit thicker'=> 0.75,
                    'Thick'=> 0.50,
                    'Unbreathable'=> 0.25,
                    'Void'=> 00,
                )))
                //->add('regionMapping')
                ->add('submit',SubmitType::class);

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MainBundle\Entity\Planet'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'mainbundle_planet';
    }


}
