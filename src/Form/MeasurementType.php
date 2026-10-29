<?php

namespace App\Form;

use App\Entity\Location;
use App\Entity\Measurement;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

// Validation rules for Measurement live in config/validator/Measurement.yaml
class MeasurementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', DateType::class)
            ->add('celsius', NumberType::class, [
                'label' => 'Temperature in Celsius',
            ])
            ->add('location', EntityType::class, [
                'placeholder' => 'Select a location',
                'class' => Location::class,
                'choice_label' => function (Location $location) {
                    return $location->getCity().", ".$location->getCountry();
                },
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Measurement::class,
            'validation_groups' => ['new'],
        ]);
    }
}
