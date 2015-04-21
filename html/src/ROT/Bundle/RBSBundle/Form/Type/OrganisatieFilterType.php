<?php

namespace ROT\Bundle\RBSBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class OrganisatieFilterType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('organisatie', 'text', array(
            'required' => false
        ));
	}
	
	public function getName() {
		return 'organisatieFilter';
	}
}