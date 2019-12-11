<?php

namespace App\Form;

use App\Entity\RegistroVehiculo;
use App\Entity\Vehiculo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistroVehiculoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('vehiculo', EntityType::class, array(
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

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RegistroVehiculo::class
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'registro_vehiculo';
    }
}
