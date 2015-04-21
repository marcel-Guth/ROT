<?php

namespace ROT\Bundle\IISBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class NationaliteitFilterType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('nationaliteit', 'text', array(
            'required' => false
        ));
		$builder->add('landcode', 'text', array(
            'required' => false
        ));
	}
	
	public function getName() {
		return 'nationaliteitFilter';
	}
}