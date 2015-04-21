<?php

namespace ROT\Bundle\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TextAreaConfiguratieType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('content', 'textarea');
	}
	
	public function getName() {
		return 'textareaconfiguratie';
	}

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'ROT\Bundle\AdminBundle\Entity\Configuratie'
        ));
    }
}