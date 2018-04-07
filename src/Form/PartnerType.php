<?php

namespace App\Form;

use App\Entity\Partner;
use Symfony\Component\Form\AbstractType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PartnerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                'label' => "Nom du partenaire"
            ))
            ->add('description', TextareaType::class, array(
                'label' => "Ajouter une description"
            ))
            ->add('imageFile', VichFileType::class, array(
                'label' => 'ajouter son logo ou sa photo',
                'required' => true,
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
