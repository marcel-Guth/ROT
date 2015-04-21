<?php

namespace ROT\Bundle\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FilterWrappingType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('name');
        $builder->add('content', $options['filter_class'], $options['filter_class_options']);
	}
	
	public function getName() {
		return 'filterWrapping';
	}

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'ROT\Bundle\AdminBundle\Entity\Filter',
            'filter_class_options' => array()
        ));
        $resolver->setRequired(array('filter_class'));
    }
}