<?php

namespace ROT\Bundle\RBSBundle\Form\Type;

use ROT\Bundle\AdminBundle\Form\Type\OptionalType;
use ROT\Bundle\PBSBundle\Entity\Parkeerkaart;
use ROT\Bundle\PBSBundle\Form\Type\ParkeerkaartType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BetrokkeneType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('organisatie');
		$builder->add('voornaam');
		$builder->add('tussenvoegsel', null, array(
            'required' => false
        ));
		$builder->add('achternaam');
		$builder->add('soort');
        $builder->add('parkeerkaart', new OptionalType(), array(
            'subtype_class' => new ParkeerkaartType()
        ));
	}
	
	public function getName() {
		return 'betrokkene';
	}

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'ROT\Bundle\RBSBundle\Entity\Betrokkene',
            'error_mapping' => array(
                'parkeerkaart' => 'parkeerkaart.subtype'
            )
        ));
    }
}