<?php

namespace ROT\Bundle\PBSBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ParkeerkaartType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('kenteken');
        $builder->add('kaarttype', 'choice', array(
            'choices' => array(
                'De graaf huisjes' => 'De graaf huisjes',
                'Medewerker' => 'Medewerker',
                'Organisatie' => 'Organisatie',
                'Sponsor/pers' => 'Sponsor/pers',
                'Strand 17' => 'Strand 17',
                'Vergunning' => 'Vergunning',
                'Paal17Events' => 'Paal17Events'
            ),
            'expanded' => true
        ));
        $builder->add('strandvergunningsoort', 'choice', array(
            'choices' => array(
                'Geen' => 'Geen',
                'Organisatievergunning' => 'Organisatievergunning',
                'Vergunning' => 'Vergunning'
            ),
            'expanded' => true
        ));
        $builder->add('vergunningsoort', 'choice', array(
            'choices' => array(
                'Geen' => 'Geen',
                '1000M' => '1000M',
                'Onbeperkt' => 'Onbeperkt'
            ),
            'expanded' => true
        ));
		$builder->add('uitgegeven', 'checkbox', array(
            'required' => false
        ));
        $builder->add('uitgavecount', 'integer', array(
            'label' => 'Aantal uitgegeven',
            'required' => false
        ));
        $builder->add('uitgavedatum', 'date', array(
            'required' => false
        ));
		$builder->add('donderdag', 'checkbox', array(
            'required' => false
        ));
		$builder->add('vrijdag', 'checkbox', array(
            'required' => false
        ));
		$builder->add('zaterdag', 'checkbox', array(
            'required' => false
        ));
		$builder->add('zondag', 'checkbox', array(
            'required' => false
        ));
	}
	
	public function getName() {
		return 'parkeerkaart';
	}
	
	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setDefaults(array(
			'data_class' => 'ROT\Bundle\PBSBundle\Entity\Parkeerkaart'
		));
	}
}