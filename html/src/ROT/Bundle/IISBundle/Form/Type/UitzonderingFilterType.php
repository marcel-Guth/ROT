<?php

namespace ROT\Bundle\IISBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class UitzonderingFilterType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('uitzondering', 'text', array(
            'required' => false
        ));
		$builder->add('afkorting', 'text', array(
            'required' => false
        ));
	}
	
	public function getName() {
		return 'uitzonderingFilter';
	}
}