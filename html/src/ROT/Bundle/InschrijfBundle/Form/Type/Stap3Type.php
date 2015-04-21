<?php

namespace ROT\Bundle\InschrijfBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class Stap3Type extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder->add('vloot', 'choice', array(
                   'choices' => array('goldFleet' => 'Gold Fleet', 'silverFleet' => 'Silver Fleet'),
                   'expanded'=> true

               ));
    }

    public function getName() {
        return 'stap3';
    }
}