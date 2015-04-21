<?php

namespace ROT\Bundle\InschrijfBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class Stap1Type extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options) {

       $builder->add('taal', 'choice', array(
           'choices' => array('nl' => 'NL', 'en' => 'EN'),
           'expanded'=> true

       ));
    }

    public function getName() {
        return 'stap1';
    }
}