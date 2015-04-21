<?php

namespace ROT\Bundle\CoreBundle\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ROTBirthdayTypeExtension extends AbstractTypeExtension {

    public function getExtendedType() {
        return 'birthday';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $current_year = strftime('%Y');
        $resolver->setDefaults(array(
            'widget' => 'choice',
            'years' => range($current_year, $current_year - 80)
        ));
    }
}