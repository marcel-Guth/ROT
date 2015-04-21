<?php

namespace ROT\Bundle\RBSBundle\Form\Type;

use ROT\Bundle\PBSBundle\Form\Type\ParkeerkaartFilterType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints as Assert;
use ROT\Bundle\RBSBundle\Entity\Organisatie;

class BetrokkeneFilterType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add($builder->create('organisatie', 'entity', array(
            'class' => 'ROT\Bundle\RBSBundle\Entity\Organisatie',
            'required' => false,
        ))->addModelTransformer(new CallbackTransformer(function ($organisatieid) use ($options) {
            if ($organisatieid !== null) {
                return $options['em']->getRepository('ROTRBSBundle:Organisatie')->findOneById($organisatieid);
            }
        }, function ($organisatie) {
            if ($organisatie !== null) {
                return $organisatie->getId();
            }
        })));
		$builder->add('voornaam', 'text', array(
            'required' => false
        ));
		$builder->add('tussenvoegsel', 'text', array(
            'required' => false
        ));
		$builder->add('achternaam', 'text', array(
            'required' => false
        ));
		$builder->add('soort', 'text', array(
            'required' => false
        ));
        $builder->add('hasparkeerkaart', 'choice', array(
            'choices' => array(
                0 => 'Nee',
                1 => 'Ja'
            ),
            'required' => false
        ));
        $builder->add('parkeerkaart', new ParkeerkaartFilterType());
	}
	
	public function getName() {
		return 'betrokkeneFilter';
	}

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setRequired(array('em'));
    }
}