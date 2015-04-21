<?php

namespace ROT\Bundle\IISBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FokkemaatType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('deelnemer', new DeelnemerType());
		$builder->add('bemanningslicentie', 'checkbox', array(
            'required' => false
        ));
		$builder->add('bemanningslicentienummer', null, array(
            'required' => false
        ));
	}
	
	public function getName() {
		return 'fokkemaat';
	}
	
	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setDefaults(array(
			'data_class' => 'ROT\Bundle\IISBundle\Entity\Fokkemaat'
		));
	}
}