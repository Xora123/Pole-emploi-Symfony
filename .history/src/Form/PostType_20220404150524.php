<?php

namespace App\Form;

use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'label' => 'Titre',
            ])
            ->add('departement', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'label' => 'departement',
            ])
            ->add('zip_code', NumberType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'label' => 'Code postal',
            ])
            ->add('content', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'label' => 'Contenue du poste',
            ])
            ->add('type', ChoiceType::class, [
                'expanded' => true,
                'choices' => [
                    'cdd' => 'CDD',
                    'cdi' => 'CDI',
                    'stage' => 'Stage',
                    'alternance' => 'Alternance',
                    'interim' => 'Interim'
                ]
            ])
            ->add('salaire', NumberType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'label' => 'salaire',
            ])
            ->add('duree', NumberType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'label' => 'duree',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
