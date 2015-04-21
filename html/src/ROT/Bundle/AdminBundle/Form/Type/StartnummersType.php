<?php

namespace ROT\Bundle\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class StartnummersType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('begin', 'integer', array(
            'required' => true,
            'constraints' => array(
                new Assert\Type(array(
                    'type' => 'integer'
                ))
            )
        ));
	}
	
	public function getName() {
		return 'startnummers';
	}
}