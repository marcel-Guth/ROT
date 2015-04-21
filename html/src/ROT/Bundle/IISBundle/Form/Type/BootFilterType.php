<?php

namespace ROT\Bundle\IISBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class BootFilterType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('type', 'text', array(
            'required' => false
        ));
		$builder->add('klasse', 'text', array(
            'required' => false
        ));
		$builder->add('spinnakerratingmodifier', 'choice', array(
            'choices' => array(
                '=' => '=',
                '>=' => '>=',
                '<=' => '<='
            )
        ));
		$builder->add('spinnakerrating', 'text', array(
            'required' => false
        ));
		$builder->add('normalratingmodifier', 'choice', array(
            'choices' => array(
                '=' => '=',
                '>=' => '>=',
                '<=' => '<='
            )
        ));
		$builder->add('normalrating', 'text', array(
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
		return 'bootFilter';
	}
}