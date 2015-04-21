<?php

namespace ROT\Bundle\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\CallbackTransformer;

class GebruikerType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('naam');
		$builder->add('username');
		$builder->add('roles', 'choice', array(
			'choices' => array(
				'ROLE_BEKIJK_GEBRUIKERS' => 'Gebruikers bekijken',
				'ROLE_WIJZIG_GEBRUIKERS' => 'Gebruikers wijzigen',
				'ROLE_CONFIGUREER_RACE' => 'Race configureren',
				'ROLE_CONFIGUREER_APPLICATIE' => 'Applicatie configureren',
				'ROLE_CONFIGUREER_INSCHRIJF' => 'Inschrijfapplicatie configureren',
				'ROLE_WIJZIG_IIS' => 'IIS gegevens wijzigen',
				'ROLE_WIJZIG_PBS' => 'PBS gegevens wijzigen',
				'ROLE_WIJZIG_RBS' => 'RBS gegevens wijzigen',
			),
			'expanded' => true,
			'multiple' => true
		));
	}
	
	public function getName() {
		return 'gebruiker';
	}
}