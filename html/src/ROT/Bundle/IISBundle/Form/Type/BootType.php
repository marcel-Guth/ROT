<?php

namespace ROT\Bundle\IISBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BootType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('type');
		$builder->add('klasse');
		$builder->add('normalrating', 'text', array(
            'label' => 'Normale rating'
        ));
		$builder->add('spinnakerrating', 'text', array(
            'label' => 'Spinnaker rating'
        ));
		$builder->add('iscustom', null, array(
            'label' => 'Is custom',
            'required' => false
		));
	}
	
	public function getName() {
		return 'boot';
	}
	
	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setDefaults(array(
			'data_class' => 'ROT\Bundle\IISBundle\Entity\Boot'
		));
	}
}