<?php

namespace App\Form;

use App\Entity\Project;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array(
                'label' => "Ajouter un titre"
            ))
            ->add('content', null , array(
                'label' => "Contenu",
                'attr' => array(
                    'class' => 'ckeditor'
                )
            ))
            ->add('imageFile', VichFileType::class, array(
                'label' => 'Ajouter une Image',
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
        return 'project';
    }
}
