<?php

namespace ROT\Bundle\IISBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BetalingType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('afschriftnummer');
		$builder->add('bedrag');
		$builder->add('betaaldatum', 'date', array(
            'input' => 'datetime'
        ));
        $builder->add('afschriftnummer2', 'text', array(
            'label' => '2e afschriftnummer',
            'required' => false
        ));
		$builder->add('bedrag2', null, array(
            'label' => '2e bedrag',
            'required' => false
        ));
		$builder->add('betaaldatum2', 'date', array(
            'input' => 'datetime',
            'label' => '2e betaaldatum',
            'required' => false
        ));
	}
	
	public function getName() {
		return 'betaling';
	}
	
	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setDefaults(array(
			'data_class' => 'ROT\Bundle\IISBundle\Entity\Betaling'
		));
	}
}