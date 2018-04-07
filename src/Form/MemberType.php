<?php

namespace App\Form;

use App\Entity\Member;
use Symfony\Component\Form\AbstractType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MemberType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                'label' => "Nom du Membre",
                'attr' => array(
                    'placeholder' => 'Nom Prénom'
                )

            ))
            ->add('status', TextType::class, array(
                'label' => "Statut du membre"
            ))
            ->add('role', TextType::class, array(
                'label' => "Quel est son role?"
            ))
            ->add('imageFile', VichFileType::class, array(
                'label' => "Ajouter sa photo",
                'required' => false,
                'allow_delete' => false,
                'download_link' => false
            ))
        ;
    }


    public function configureOptions(OptionsResolver $resolver)
    {

    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'partner';
    }
}
