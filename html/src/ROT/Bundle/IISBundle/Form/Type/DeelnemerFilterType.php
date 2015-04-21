<?php

namespace ROT\Bundle\IISBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class DeelnemerFilterType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('voornaam', 'text', array(
            'required' => false
        ));
        $builder->add('tussenvoegsel', 'text', array(
            'required' => false
        ));
        $builder->add('achternaam', 'text', array(
            'required' => false
        ));
        $builder->add('adres', 'text', array(
            'required' => false
        ));
        $builder->add('huisnummer', 'text', array(
            'required' => false
        ));
        $builder->add('woonplaats', 'text', array(
            'required' => false
        ));
        $builder->add('postcode', 'text', array(
            'required' => false
        ));
        $builder->add('land', 'text', array(
            'required' => false
        ));
        $builder->add('geslacht', 'choice', array(
            'choices' => array(
                'M' => 'M',
                'V' => 'V'
            ),
            'required' => false
        ));
        $builder->add('telefoon', 'text', array(
            'required' => false
        ));
        $builder->add('noodtelefoon', 'text', array(
            'required' => false
        ));

        $builder->add('geboortedatummodifier', 'choice', array(
            'choices' => array(
                '=' => '=',
                '>=' => '>=',
                '<=' => '<='
            )
        ));
        $current_year = getdate()['year'];
        $builder->add('geboortedatum', 'birthday', array(
            'required' => false
        ));
        $builder->add('email', 'text', array(
            'required' => false
        ));
        $builder->add('nationaliteit', 'entity', array(
            'class' => 'ROT\Bundle\IISBundle\Entity\Nationaliteit',
            'required' => false
        ));
        $builder->add('rotmember', 'checkbox', array(
            'required' => false
        ));
        $builder->add('rotmembernummer', 'text', array(
            'required' => false
        ));
        }
	
	public function getName() {
		return 'deelnemerFilter';
	}
}