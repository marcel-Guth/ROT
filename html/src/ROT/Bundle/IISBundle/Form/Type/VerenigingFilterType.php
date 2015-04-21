<?php

namespace ROT\Bundle\IISBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class VerenigingFilterType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('naam', 'text', array(
            'required' => false
        ));
		$builder->add('iscustom', 'choice', array(
            'choices' => array(
                0 => 'Nee',
                1 => 'Ja'
            ),
            'required' => false
        ));
	}
	
	public function getName() {
		return 'verenigingFilter';
	}
}