<?php

namespace ROT\Bundle\CoreBundle\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ROTDateTypeExtension extends AbstractTypeExtension {

    public function getExtendedType() {
        return 'date';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'widget' => 'single_text',
            'input' => 'datetime'
        ));
    }
}