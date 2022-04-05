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
            ->add('title')
            ->add('createdAt', da)
            ->add('departement')
            ->add('zip_code')
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
            ->add('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}