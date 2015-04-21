<?php

namespace ROT\Bundle\IISBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class KlasseType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('naam');
		$builder->add('type', 'choice', array(
            'choices' => array(
                'Boot' => 'Boot',
                'Vereniging' => 'Vereniging',
                'Custom' => 'Custom'
            )
        ));
	}
	
	public function getName() {
		return 'klasse';
	}
	
	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setDefaults(array(
			'data_class' => 'ROT\Bundle\IISBundle\Entity\Klasse'
		));
	}
}