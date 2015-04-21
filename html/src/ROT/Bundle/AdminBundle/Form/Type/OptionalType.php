<?php

namespace ROT\Bundle\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints as Assert;

class OptionalType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('toggle', 'checkbox', array(
            'required' => false
        ));
        $builder->add('subtype', $options['subtype_class'], $options['subtype_class_options']);
        $builder->addViewTransformer(new CallbackTransformer(function ($value) {
            return array(
                'toggle' => $value !== null,
                'subtype' => $value
            );
        }, function ($value) {
            return $value['toggle'] ? $value['subtype'] : null;
        }));
	}
	
	public function getName() {
		return 'optional';
	}
	
	public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => null,
            'subtype_class_options' => array()
        ));
		$resolver->setRequired(array('subtype_class'));
	}
}