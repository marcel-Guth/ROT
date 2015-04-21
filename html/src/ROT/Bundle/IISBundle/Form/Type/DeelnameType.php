<?php

namespace ROT\Bundle\IISBundle\Form\Type;

use ROT\Bundle\AdminBundle\Form\Type\OptionalType;
use ROT\Bundle\PBSBundle\Form\Type\ParkeerkaartType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ExecutionContextInterface;

class DeelnameType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options) {
        $current_year = strftime('%Y');
		$builder->add('inschrijfdatum', 'date', array(
            'input' => 'datetime',
            'years' => range($current_year, 2010)
        ));
		$builder->add('nederlands', 'checkbox', array(
            'required' => false
        ));
		$builder->add('reserveringscode');
		$builder->add('zeilnummer');
		$builder->add('startnummer', 'integer', array(
            'required' => false
        ));
		$builder->add('meetbrief', 'checkbox', array(
            'required' => false
        ));
		$builder->add('meetbriefnummer', 'text', array(
            'required' => false
        ));
		$builder->add('persoonlijkereclamelicentie', 'checkbox', array(
            'required' => false
        ));
		$builder->add('persoonlijkereclamelicentienummer', 'text', array(
            'required' => false
        ));
		$builder->add('reclame', 'checkbox', array(
            'required' => false
        ));
		$builder->add('sponsor', 'checkbox', array(
            'required' => false
        ));
		$builder->add('spinnaker', 'checkbox', array(
            'required' => false
        ));
		$builder->add('fleet', 'text', array(
            'required' => false
        ));
		$builder->add('boot', 'entity', array(
            'class' => 'ROT\Bundle\IISBundle\Entity\Boot'
        ));
        $builder->add('vereniging');
        $builder->add('bootklasse', 'text', array(
            'required' => false
        ));

        $builder->add('finishtijd', 'integer', array(
            'required' => false
        ));
        $builder->add('modrating', 'integer', array(
            'required' => false
        ));
        $builder->add('gecorrigeerde_finishtijd', 'integer', array(
            'required' => false
        ));
        $builder->add('uitzondering', 'entity', array(
            'class' => 'ROT\Bundle\IISBundle\Entity\Uitzondering',
            'required' => false
        ));
        $builder->add('aangemeld', 'checkbox', array(
            'required' => false
        ));
        $builder->add('afgemeld', 'checkbox', array(
            'required' => false
        ));
        $builder->add('memberstatus', 'choice', array(
            'choices' => array(
                'Geen member' => 'Geen member',
                'Nog niet gecontroleerd member' => 'Nog niet gecontroleerd member',
                'Gecontroleerd member' => 'Gecontroleerd member'
            ),
            'expanded' => true
        ));
        $builder->add('racestatus', 'choice', array(
            'choices' => array(
                'Correct gefinisht' => 'Correct gefinisht',
                'Uitzondering' => 'Uitzondering',
                'Gestart' => 'Gestart',
                'Nog niet gestart' => 'Nog niet gestart'
            ),
            'expanded' => true
        ));
        $builder->add('verzekeringsbewijsstatus', null, array(
            'required' => false,
            'label' => 'Verzekeringsbewijs ontvangen'
        ));
        $builder->add('xcbstatus', 'choice', array(
            'choices' => array(
                'Xcb teruggegeven' => 'Xcb teruggegeven',
                'Xcb meegegeven' => 'Xcb meegegeven',
                'In aanmerking voor Xcb' => 'In aanmerking voor Xcb',
                'Geen Xcb' => 'Geen Xcb'
            ),
            'expanded' => true
        ));

        $builder->add('bevestigingbriefstatus', null, array(
            'required' => false,
            'label' => 'Bestigingsbrief verzonden'
        ));
        $builder->add('helaasbriefstatus', null, array(
            'required' => false,
            'label' => 'Helaasbrief verzonden'
        ));
        $builder->add('dutchopenstatus', null, array(
            'required' => false,
            'label' => 'Dutch open'
        ));
        $builder->add('horstochtstatus', null, array(
            'required' => false,
            'label' => 'Horstocht'
        ));
        $builder->add('nacrachampstatus', null, array(
            'required' => false,
            'label' => 'Nacra championships'
        ));
        $builder->add('tochtnoordstatus', null, array(
            'required' => false,
            'label' => 'Tocht naar de noord'
        ));

		$builder->add('stuurman', new StuurmanType());
		$builder->add('fokkemaat', new OptionalType(), array(
            'subtype_class' => new FokkemaatType()
        ));
		$builder->add('betaling', new OptionalType(), array(
            'subtype_class' => new BetalingType()
        ));
		$builder->add('borg', new OptionalType(), array(
            'subtype_class' => new BorgType()
        ));
	}
	
	public function getName() {
		return 'deelname';
	}
	
	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setDefaults(array(
			'data_class' => 'ROT\Bundle\IISBundle\Entity\Deelname',
            'error_mapping' => array(
                '.fokkemaat' => '.fokkemaat.subtype',
                'betaling' => 'betaling.subtype',
                'borg' => 'borg.subtype'
            )
		));
	}
}