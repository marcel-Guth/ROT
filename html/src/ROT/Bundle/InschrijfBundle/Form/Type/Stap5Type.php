<?php

namespace ROT\Bundle\InschrijfBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\CallbackTransformer;

class Stap5Type extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $arrayManVrouwLang = $options['lang'] == 'nl' ?  
                            array('Man' => 'Man', 'Vrouw' => 'Vrouw') : 
                            array('Man' => 'Male', 'Vrouw' => 'Female');
        $arrayJaNeeLang = $options['lang'] == 'nl' ?
                            array('1' => 'Ja', '0' => 'Nee') :
                            array('1' => 'Yes', '0' => 'No');
        
       $builder
           ->add('fokmaatVoornaam', 'text')
           ->add('fokmaatTussenVoegsel', 'text', array('required' => false))
           ->add('fokmaatAchternaam', 'text')
           ->add('fokmaatPostcode', 'text')
           ->add('fokmaatWoonplaats', 'text')
           ->add('fokmaatAdres', 'text')
           ->add('fokmaatHuisnummer', 'text')
           ->add('fokmaatLand', 'text', array(
//                       'constraints' => array(
//
//                        )
                    ))
           ->add('fokmaatDOB', 'birthday', array(
               'widget' => 'choice',
               'format' => 'dd-MM-yyyy',))
           ->add($builder->create('fokmaatNationaliteit', 'entity', array(
                  'class' => 'ROTIISBundle:Nationaliteit',
                  'empty_value'=> ''
               ))->addModelTransformer(new CallbackTransformer(function ($nationaliteitid) use ($options) {
                   if ($nationaliteitid !== null) {
                       return $options['em']->getRepository('ROTIISBundle:Nationaliteit')->findOneById($nationaliteitid);
                   }
               }, function ($nationaliteit) {
                   if ($nationaliteit !== null) {
                       return $nationaliteit;
                   }
               })))
           ->add('fokmaatGeslacht', 'choice', array(
                      'choices' => $arrayManVrouwLang,
                      'empty_value'=> ''),array('required' => true))
           ->add('fokmaatBemanningslicentie', 'choice', array(
                       'choices' => $arrayJaNeeLang,
                       'empty_value' => ''))
           ->add('fokmaatBemanningslicentieNr', 'text')
           ->add('fokmaatMobielnr', 'text')
		   ->add('fokmaatMobiel', 'text')
           ->add('fokmaatNoodnr', 'text')
           ->add('fokmaatEmail', 'email')
           ->add('fokmaatEmailConf', 'email')
       ;
    }

    public function getName() {
        return 'stap5';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setRequired(array('em','lang'));
    }
}