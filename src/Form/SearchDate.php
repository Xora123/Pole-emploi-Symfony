<?php
namespace App\Form;
use App\Form\PostType;
use App\Form\SearchDate;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SearchDate extends AbstractType
{
    public function BuildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
         
            ->add('order', ChoiceType::class, [
                'choices'=>[
                    'asc' => 'asc',
                    'desc' => 'desc'
                ],
                
            ])
           
        ;
    }
}