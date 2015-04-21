<?php

namespace ROT\Bundle\IISBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DeelnemerType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('voornaam');
		$builder->add('tussenvoegsel', 'text', array(
            'required' => false
        ));
		$builder->add('achternaam');
		$builder->add('adres');
		$builder->add('huisnummer');
		$builder->add('woonplaats');
		$builder->add('postcode');
		$builder->add('land');
		$builder->add('geslacht', 'choice', array(
			'choices' => array(
				'M' => 'M',
				'V' => 'V'
			)
		));
		$builder->add('telefoon', null, array(
            'required' => false
        ));
		$builder->add('noodtelefoon');
                $builder->add('geboortedatum', 'birthday', array(
                'widget' => 'choice',
                'format' => 'dd-MM-yyyy',));
		$builder->add('email');
		$builder->add('nationaliteit', 'entity', array(
            'class' => 'ROT\Bundle\IISBundle\Entity\Nationaliteit'
        ));
        $builder->add('rotmember', 'checkbox', array(
            'required' => false
        ));
        $builder->add('rotmembernummer', 'text', array(
            'required' => false
        ));
	}
	
	public function getName() {
		return 'deelnemer';
	}
	
	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setDefaults(array(
			'data_class' => 'ROT\Bundle\IISBundle\Entity\Deelnemer'
		));
	}
}