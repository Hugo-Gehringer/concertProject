<?php

namespace App\Form;

use App\Entity\Band;
use App\Entity\Concert;
use App\Entity\Hall;
use App\Entity\Member;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bridge\Doctrine\Form\FormTypeInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class MemberType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class,[
                'label'=>'nom du membre'
            ])
            ->add('firstname',TextType::class,[
                'label'=>'prénom du membre'
            ])
            ->add('band',EntityType::class,[
                'class' => Band::class,
                'choice_label'=>'name',

            ])
            ->add('job',TextType::class,[
                'label'=>'job du membre'
            ])

            ->add('birthdate',DateType::class,[
                'widget' =>'choice',
                'format'=>'dd/MM/yyyy',

            ])


        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'=>Member::class,
        ]);
    }
}
