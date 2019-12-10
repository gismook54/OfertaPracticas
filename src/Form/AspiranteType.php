<?php

namespace App\Form;

use App\Entity\Aspirante;
use App\Entity\Estatus;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AspiranteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', TextType::class, [ 'label'  => 'Nombre','attr'=>['class' => 'form-control']] )
            ->add('apellidoPaterno', TextType::class, [ 'label'  => 'Apellido','attr'=>['class' => 'form-control']] )
            ->add('curp', TextType::class, [ 'label'  => 'Curp','attr'=>['class' => 'form-control']] )
            ->add('matricula', TextType::class, [ 'label'  => 'Matrícula','attr'=>['class' => 'form-control']] )
            ->add('correo', TextType::class, [ 'label'  => 'Correo','attr'=>['class' => 'form-control']] )
            ->add('telefono', TextType::class, [ 'label'  => 'Número de Teléfono','attr'=>['class' => 'form-control']] )
            ->add('celular', TextType::class, [ 'label'  => 'Número de Célular','attr'=>['class' => 'form-control']] )
            ->add('universidad', TextType::class, [ 'label'  => 'Universidad de Procedencia','attr'=>['class' => 'form-control']] )
            //->add('credencial_unadm', CheckboxType::class, [ 'label'  => 'Cuenta con credencial de la UnADM','attr'=>['class' => 'form-control']] )
            ->add('usuario', TextType::class, [ 'label'  => 'Usuario','attr'=>['class' => 'form-control']] )
            ->add('password', PasswordType::class, [ 'label'  => 'Password','attr'=>['class' => 'form-control']] )


            //->add('idEstatus',EntityType::class,[
            //    'class' => Estatus::class,
              //  'choice_label' => 'descripcion',
                //'label'  => 'Estatus',
                //'attr'=>['class' => 'form-control']
            //])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Aspirante::class,
        ]);
    }
}
