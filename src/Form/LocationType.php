<?php

namespace App\Form;

use App\Entity\Location;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LocationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add ('city', null, [
                'attr' => [
                    'placeholder' => 'Enter city name',
                ],
                // 'constraints' => [
                    // new Assert\NotBlank(message: 'Please enter a city name', groups: ['new', 'edit']),
                // ],
            ])
            ->add ( 'country', ChoiceType::class, [
                'choices' => [
                    'Poland' => 'PL',
                    'Germany'=>'DE',
                    'France' => 'FR',
                    'Spain'=>'ES',
                    'Italy'=>'IT',
                    'United Kingdom' => 'GB',
                    'United States' => 'US',
                ],
                // 'constraints' => [
                    // new Assert\NotBlank(message: 'Value shouldn\'t be empty',groups: ['new', 'edit'])
                // ],
            ])
            ->add('latitude', NumberType::class, [
                'html5' => true,
                'scale' => 7,
                'attr' => ['step' => '0.0001'],
                // 'constraints' => [
                    // new Assert\Range(
                        // notInRangeMessage: 'This value should be between {{ min }} and {{ max }}',
                        // min: -90,
                        // max: 90,
                        // groups: ['new', 'edit'],
                    // ),
                    // new Assert\NotBlank(message: 'Value shouldn\'t be empty',groups: ['new', 'edit'])
                // ],
            ])
            ->add('longitude', NumberType::class, [
                'html5' => true,
                'scale' => 7,
                'attr' => ['step' => '0.0001'],
                // 'constraints' => [
                    // new Assert\Range(
                        // notInRangeMessage: 'This value should be between {{ min }} and {{ max }}',
                        // min: -180,
                        // max: 180,
                        // groups: ['new', 'edit'],
                    // ),
                    // new Assert\NotBlank(message: 'Value shouldn\'t be empty', groups: ['new', 'edit'])
                // ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Location::class,
            'validation_groups' => ['new'],
        ]);
    }
}
