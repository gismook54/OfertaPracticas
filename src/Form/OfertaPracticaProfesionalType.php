<?php

namespace App\Form;

use App\Entity\OfertaPracticaProfesional;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Carrera;
use App\Entity\Modalidad;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class OfertaPracticaProfesionalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idCarrera',EntityType::class,[
                    'class' => Carrera::class,
                    'choice_label' => 'descripcion',
                    'label'  => 'Carrera',
                    'attr'=>['class' => 'form-control']
                ])
            ->add('idModalidad',EntityType::class,[
                'class' => Modalidad::class,
                'choice_label' => 'descripcion',
                'label'  => 'Modalidad',
                'attr'=>['class' => 'form-control']
            ])
            ->add('descripcion', TextareaType::class, [ 'label'  => 'Descripción','attr'=>['class' => 'form-control']] )

            //->add('carrera', TextType::class, [ 'label'  => 'Carrera Adicional','attr'=>['class' => 'form-control']] )
            ->add('cupo', IntegerType::class, [ 'label'  => 'Cupos','attr'=>['class' => 'form-control']] )
            //->add('idInstitucion')
            //->add('idModalidad')
            //->add('Carrera', 'entity', array('class' => 'AppBundle\Entity\Carrera'))
            //->add('idEstatus')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => OfertaPracticaProfesional::class,
        ]);
    }
}
