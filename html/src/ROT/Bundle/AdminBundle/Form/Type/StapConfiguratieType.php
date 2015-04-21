<?php

namespace ROT\Bundle\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class StapConfiguratieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('nl', new RichTextConfiguratieType());
        $builder->add('en', new RichTextConfiguratieType());
    }

    public function getName() {
        return 'stapconfiguratie';
    }
}