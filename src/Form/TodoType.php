<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class TodoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('content', TextType::class, [
                'label' => 'Un super label',
                'attr' => [
                    'placeholder' => 'Contenu de la todo'
                ],
                'help' => 'Indiquez ce que vous avez à faire',
                'required' => true,
            ])
            // ->add('type', ChoiceType::class, [
            //     'choices' => [
            //         'Techno' => 'techno',
            //         'Nature' => 'nature'
            //     ],
            //     // Pour passer un attr de classe 
            //     // 'choice_attr' => [
            //     //     'Techno' => [
            //     //         'class' => 'techno-class'
            //     //     ]
            //     // ]
            //     // Passer via fonction anonyme
            //     'choice_attr' => function ($choices, $key, $value) {
            //         return ['class' => 'my-class'];
            //     },
            //     // 'choice_filter' => function ($option) {
            //     //     return $option != 'nature';
            //     // },
            //     'expanded' => true,
            //     'multiple' => true
            // ])
            ->add('pays', CountryType::class, ['mapped' => false])
            //->add('done', CheckboxType::class, ['required' => false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
