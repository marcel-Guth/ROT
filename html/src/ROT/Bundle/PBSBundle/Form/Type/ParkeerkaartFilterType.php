<?php

namespace ROT\Bundle\PBSBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class ParkeerkaartFilterType extends AbstractType{
	public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('kenteken', 'text', array(
            'required' => false
        ));
        $builder->add('uitgegeven', 'choice', array(
            'choices' => array(
                0 => 'Nee',
                1 => 'Ja'
            ),
            'required' => false
        ));
        $builder->add('uitgavedatummodifier', 'choice', array(
            'choices' => array(
                '=' => '=',
                '>=' => '>=',
                '<=' => '<='
            )
        ));
        $builder->add('uitgavedatum', 'date', array(
            'input' => 'string',
            'required' => false
        ));
        $builder->add('uitgavecountmodifier', 'choice', array(
            'choices' => array(
                '=' => '=',
                '>=' => '>=',
                '<=' => '<='
            )
        ));
        $builder->add('uitgavecount', 'integer', array(
            'required' => false
        ));
        $builder->add('vergunningsoort', 'text', array(
            'required' => false,
        ));
        $builder->add('donderdag', 'choice', array(
            'choices' => array(
                0 => 'Nee',
                1 => 'Ja'
            ),
            'required' => false
        ));
        $builder->add('vrijdag', 'choice', array(
            'choices' => array(
                0 => 'Nee',
                1 => 'Ja'
            ),
            'required' => false
        ));
        $builder->add('zaterdag', 'choice', array(
            'choices' => array(
                0 => 'Nee',
                1 => 'Ja'
            ),
            'required' => false
        ));
        $builder->add('zondag', 'choice', array(
            'choices' => array(
                0 => 'Nee',
                1 => 'Ja'
            ),
            'required' => false
        ));
	}
	
	public function getName() {
		return 'parkeerkaartFilter';
	}
}