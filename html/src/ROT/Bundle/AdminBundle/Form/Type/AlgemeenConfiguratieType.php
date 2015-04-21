<?php

namespace ROT\Bundle\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AlgemeenConfiguratieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('sitetitel_nl', new TextConfiguratieType());
        $builder->add('sitetitel_en', new TextConfiguratieType());
        $builder->add('siteondertitel_nl', new TextConfiguratieType());
        $builder->add('siteondertitel_en', new TextConfiguratieType());
        $builder->add('siteregistratietitel_nl', new TextConfiguratieType());
        $builder->add('siteregistratietitel_en', new TextConfiguratieType());
    }

    public function getName() {
        return 'algemeenconfiguratie';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'cascade_validation' => true
        ));
    }
}