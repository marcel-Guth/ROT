<?php

namespace ROT\Bundle\IISBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BorgType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('betaalwijze', 'choice', array(
            'choices' => array(
                'contant' => 'contant',
                'pin' => 'pin'
            )
        ));
        $current_year = getdate()['year'];
		$builder->add('betaaldatum', 'date', array(
            'input' => 'datetime',
            'years' => range($current_year, 2010)
        ));
		$builder->add('terugbetaald', null, array(
			'required' => false
		));
	}
	
	public function getName() {
		return 'borg';
	}
	
	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setDefaults(array(
			'data_class' => 'ROT\Bundle\IISBundle\Entity\Borg'
		));
	}
}