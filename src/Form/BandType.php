<?php

namespace App\Form;

use App\Entity\Band;
use App\Entity\Concert;
use App\Entity\Hall;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bridge\Doctrine\Form\FormTypeInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class BandType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class,[
                'label'=>'nom du Groupe'
            ])
            ->add('style',TextType::class,[
                'label'=>'Style'
            ])
            ->add('yearOfCreation',DateType::class,[
                'widget' =>'choice',
                'format'=>'dd/MM/yyyy',
                'required' => false,
            ])
            ->add('lastAlbumName',TextType::class,[
                'label'=>'nom du dernier Album',
                'required' => false,
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'=>Band::class,
        ]);
    }
}
