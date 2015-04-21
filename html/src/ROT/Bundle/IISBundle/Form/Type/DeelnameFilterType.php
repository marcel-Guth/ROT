<?php

namespace ROT\Bundle\IISBundle\Form\Type;

use ROT\Bundle\PBSBundle\Form\Type\ParkeerkaartFilterType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints as Assert;

class DeelnameFilterType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('inschrijfdatummodifier', 'choice', array(
            'choices' => array(
                '=' => '=',
                '>=' => '>=',
                '<=' => '<='
            )
        ));
        $current_year = strftime('%Y');
        $builder->add('inschrijfdatum', 'date', array(
            'input' => 'datetime',
            'years' => range($current_year, 2010),
            'required' => false
        ));
        $builder->add('reserveringscode', 'text', array(
            'required' => false
        ));
        $builder->add('zeilnummer', 'text', array(
            'required' => false
        ));
        $builder->add('startnummer', 'integer', array(
            'required' => false
        ));
        $builder->add('meetbrief', 'checkbox', array(
            'required' => false
        ));
        $builder->add('meetbriefnummer', 'text', array(
            'required' => false
        ));
        $builder->add('persoonlijkereclamelicentie', 'choice', array(
            'choices' => array(
                0 => 'Nee',
                1 => 'Ja'
            ),
            'required' => false
        ));
        $builder->add('watersportverbondstartlicentie', 'choice', array(
            'choices' => array(
                0 => 'Nee',
                1 => 'Ja'
            ),
            'required' => false
        ));
        $builder->add('watersportverbondlidmaatschapnummer', 'text', array(
            'required' => false
        ));
        $builder->add('bootklasse', 'text', array(
            'required' => false
        ));
        $builder->add('reclame', 'choice', array(
            'choices' => array(
                0 => 'Nee',
                1 => 'Ja'
            ),
            'required' => false
        ));
        $builder->add('sponsor', 'choice', array(
            'choices' => array(
                0 => 'Nee',
                1 => 'Ja'
            ),
            'required' => false
        ));
        $builder->add('spinnaker', 'choice', array(
            'choices' => array(
                0 => 'Nee',
                1 => 'Ja'
            ),
            'required' => false
        ));
        $builder->add('fleet', 'text', array(
            'required' => false
        ));
        $builder->add('boot', 'entity', array(
            'class' => 'ROT\Bundle\IISBundle\Entity\Boot',
            'required' => false
        ));
        $builder->add('vereniging', 'entity', array(
            'class' => 'ROT\Bundle\IISBundle\Entity\Vereniging',
            'required' => false
        ));
        //$builder->add('status', new StatusFilterType());
        $builder->add('stuurman', new DeelnemerFilterType());
        $builder->add('hasfokkemaat', 'checkbox', array(
            'required' => false
        ));
        $builder->add('fokkemaat', new DeelnemerFilterType());
        $builder->add('hasbetaling', 'checkbox', array(
            'required' => false
        ));
        $builder->add('betaling', new BetalingFilterType());
        $builder->add('hasborg', 'checkbox', array(
            'required' => false
        ));
        $builder->add('borg', new BorgFilterType());
        $builder->add('hasparkeerkaart', 'checkbox', array(
            'required' => false
        ));
        $builder->add('parkeerkaart', new ParkeerkaartFilterType());
        $builder->add('hasfinishtijd', 'checkbox', array(
            'required' => false
        ));
        //$builder->add('finishtijd', new FinishtijdFilterType());
	}
	
	public function getName() {
		return 'deelnameFilter';
	}

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setRequired(array('em'));
    }
}