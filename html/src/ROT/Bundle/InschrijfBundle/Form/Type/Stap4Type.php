<?php

namespace ROT\Bundle\InschrijfBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Validator\Constraints as Assert;

class Stap4Type extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $arrayManVrouwLang = $options['lang'] == 'nl' ?  
                            array('Man' => 'Man', 'Vrouw' => 'Vrouw') : 
                            array('Man' => 'Male', 'Vrouw' => 'Female');
        $arrayJaNeeLang = $options['lang'] == 'nl' ?
                            array('1' => 'Ja', '0' => 'Nee') :
                            array('1' => 'Yes', '0' => 'No');
       $builder
            ->add('stuurmanVoornaam', 'text', array(
//               'constraints' => array(
//                    new Assert\NotBlank(),
//                    new Assert\Length(array('min' => 3))
//               )
            ))
            ->add('stuurmanTussenVoegsel', 'text', array(
                   'required' => false,
            ))
            ->add('stuurmanAchternaam', 'text', array(
//                   'constraints' => array(
//                        new Assert\NotBlank(),
//                        new Assert\Length(array('min' => 3))
//                   )
            ))
            ->add('stuurmanPostcode', 'text', array(
//                   'constraints' => array(
//                        new Assert\NotBlank(),
//                        new Assert\Length(array('min' => 3))
//                   )
            ))
            ->add('stuurmanWoonplaats', 'text', array(
//                   'constraints' => array(
//                        new Assert\NotBlank(),
//                        new Assert\Length(array('min' => 3, 'max' => 150))
//                   )
            ))
            ->add('stuurmanAdres', 'text', array(
//                           'constraints' => array(
//                                new Assert\NotBlank(),
//                                new Assert\Length(array('min' => 3))
//                           )
                        ))
            ->add('stuurmanHuisnummer', 'text', array(
//                           'constraints' => array(
//                                new Assert\NotBlank(),
//                                new Assert\Length(array('min' => 3))
//                           )
                        ))
            ->add('stuurmanLand', 'text', array(
//                             'constraints' => array(
//
//                             )
                         ))
            ->add('stuurmanDOB', 'birthday', array(
                'widget' => 'choice',
                'format' => 'dd-MM-yyyy',))

            ->add($builder->create('stuurmanNationaliteit', 'entity', array(
                   'class' => 'ROTIISBundle:Nationaliteit',
                   'empty_value'=> '',
                   'constraints' => array(
//                       new Assert\Type("ROT\Bundle\IISBundle\Entity\Nationaliteit")
                   )
                ))->addModelTransformer(new CallbackTransformer(function ($nationaliteitid) use ($options) {
                    if ($nationaliteitid !== null) {
                        return $options['em']->getRepository('ROTIISBundle:Nationaliteit')->findOneById($nationaliteitid);
                    }
                }, function($nationaliteit) {
                    if ($nationaliteit !== null) {
                        return $nationaliteit;
                    }
                })))               
                        
            ->add('stuurmanGeslacht', 'choice', array(
                       'choices' => $arrayManVrouwLang,
                       'empty_value'=> ''))
            ->add('watersportStuurman', 'choice', array(
                        'choices' => $arrayJaNeeLang,
                        'empty_value' => '',))
            ->add('watersportNrStuurman', 'text')
            ->add('stuurmanMobielnr', 'text')
			->add('stuurmanMobiel', 'text')
            ->add('stuurmanNoodnr', 'text')
            ->add('stuurmanEmail', 'email')
            ->add('stuurmanEmailConf', 'email')
            ->add('stuurmanFokmaat', 'choice', array(
                        'choices' => $arrayJaNeeLang,
                        'empty_value' => '',))
            ;
    }

    public function getName() {
        return 'stap4';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setRequired(array('em','lang'));
    }
}