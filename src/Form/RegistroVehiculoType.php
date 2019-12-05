<?php

namespace App\Form;

use App\Entity\Registro;
use App\Entity\Vehiculo;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistroVehiculoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('vehiculos', EntityType::class, array(
                'class' => Vehiculo::class,
                'placeholder' => '- Elija un producto -',
                'expanded' => false,
                'multiple' => false,
                'label' => 'Vehiculo',
                'attr' => [
                    'class' => 'vehiculo',
                ],
                // 'query_builder' => function (EntityRepository $er) {
                //     return $er->createQueryBuilder('p')->orderBy('p.nombre', 'ASC');
                // },
            ))
        ;
    }
}
