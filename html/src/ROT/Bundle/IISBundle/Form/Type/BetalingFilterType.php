<?php

namespace ROT\Bundle\IISBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class BetalingFilterType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('afschriftnummer', 'text', array(
            'required' => false
        ));
        $builder->add('bedrag', 'text', array(
            'required' => false
        ));
        $builder->add('betaaldatummodifier', 'choice', array(
            'choices' => array(
                '=' => '=',
                '>=' => '>=',
                '<=' => '<='
            )
        ));
        $current_year = getdate()['year'];
        $builder->add('betaaldatum', 'date', array(
            'input' => 'datetime',
            'years' => range($current_year, 2010)
        ));
	}
	
	public function getName() {
		return 'betalingFilter';
	}
}