<?php

namespace App\Form;

use App\Entity\Registro;
use App\Form\RegistroVehiculoType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class RegistroType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('comentarios')
            ->add('administrador', null, [
                'attr' => [
                    'class' => 'administrador-collection',
                ],
                
            ])
            ->add('cliente')
            ->add('vehiculo', CollectionType::class, array(
                'entry_type' => RegistroVehiculoType::class,
                'entry_options'  => ['label' => false],
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'label' => false,
                'required'   => false,
                'attr' => [
                    'class' => 'vehiculos-collection row'
                ],
            ));
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Registro::class,
        ]);
    }
}
