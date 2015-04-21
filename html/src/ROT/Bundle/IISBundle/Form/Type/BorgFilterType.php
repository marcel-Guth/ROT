<?php

namespace ROT\Bundle\IISBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class BorgFilterType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options) {

	}
	
	public function getName() {
		return 'borgFilter';
	}
}