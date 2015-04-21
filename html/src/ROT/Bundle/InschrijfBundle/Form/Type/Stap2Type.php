<?php

namespace ROT\Bundle\InschrijfBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class Stap2Type extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options) {

       $builder->add('Akkoord', 'checkbox');
    }

    public function getName() {
        return 'stap2';
    }
}