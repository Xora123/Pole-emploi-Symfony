<?php

namespace App\Form;

use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class,[
                'attr' => [
                    'class' => 'form-control',
                ],
                'label' => 'title',
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
                'label' => 'departement',
            ])
            ->add('content')
            ->add('type', ChoiceType::class, [
                    'expanded' => true,
                    'choices' => [
                        'cdd' => 'cdd',
                        'cdi' => 'cdi',
                        'stage' => 'stage',
                        'alternance' => 'alternance',
                        'interim' => 'interim'
                    ]
            ])
            ->add('salaire')
            ->add('duree')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
