<?php

namespace App\Form;

use App\Entity\Car;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class CarFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Brand', TextType::class, [
                'attr' => array(
                    'class' => 'form-control my-1',
                    'placeholder' => 'Enter brand',
                    'autofocus' => true
                )
            ])
            ->add('Model', TextType::class, [
                'attr' => [
                    'class' => 'form-control my-1',
                    'placeholder' => 'Enter model'
                ]
            ])
            ->add('ProductionYear', IntegerType::class, [
                'attr' => [
                    'class' => 'form-control my-1',
                    'placeholder' => 'Enter production year'
                ]
            ])
            ->add('HorsePower', IntegerType::class, [
                'attr' => [
                    'class' => 'form-control my-1',
                    'placeholder' => 'Enter horse power'
                ]
            ])
            ->add('ImagePath', FileType::class, [
                'attr' => [
                    'class' => 'form-control my-1'
                ],
                'required' => false,
                'mapped' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
        ]);
    }
}
