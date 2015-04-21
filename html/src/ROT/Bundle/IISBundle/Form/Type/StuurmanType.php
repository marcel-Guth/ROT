<?php

namespace ROT\Bundle\IISBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class StuurmanType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('deelnemer', new DeelnemerType());
		$builder->add('startlicentie', 'checkbox', array(
            'required' => false
        ));
		$builder->add('startlicentienummer', null, array(
            'required' => false
        ));

	}
	
	public function getName() {
		return 'stuurman';
	}
	
	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setDefaults(array(
			'data_class' => 'ROT\Bundle\IISBundle\Entity\Stuurman'
		));
	}
}