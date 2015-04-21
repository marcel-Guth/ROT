<?php

namespace ROT\Bundle\InschrijfBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\CallbackTransformer;

class Stap6Type extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $arrayJaNeeLang = $options['lang'] == 'nl' ?
                            array('1' => 'Ja', '0' => 'Nee') :
                            array('1' => 'Yes', '0' => 'No');
        
       $builder
            ->add($builder->create('boottype', 'entity', array(
                  'class' => 'ROTIISBundle:Boot',
                  'empty_value' => ''
               ))->addModelTransformer(new CallbackTransformer(function ($boottypeid) use ($options) {
                   if ($boottypeid !== null) {
                       return $options['em']->getRepository('ROTIISBundle:Boot')->findOneById($boottypeid);
                   }
               }, function ($boottype) {
                   if ($boottype !== null) {
                       return $boottype;
                   }
               })))
            ->add('boottypeCustom', 'text')
            ->add('zeilnummer', 'text')
            ->add('spinnaker', 'choice', array(
                             'choices' => $arrayJaNeeLang,
                             'empty_value' => ''))
            ->add('meetbrief', 'choice', array(
                             'choices' => $arrayJaNeeLang,
                             'empty_value' => ''))
            ->add('meetbriefNr', 'text', array(
                  'required' => false))
            ->add('reclame', 'choice', array(
                             'choices' => $arrayJaNeeLang,
                             'empty_value' => ''))
            ->add('reclameLicentie', 'text', array(
                             'required' => false))
           ->add($builder->create('vereniging', 'entity', array(
                     'class' => 'ROTIISBundle:Vereniging',
                     'required' => false,
                     'empty_value' => ''
                  ))->addModelTransformer(new CallbackTransformer(function ($verenigingid) use ($options) {
                      if ($verenigingid !== null) {
                          return $options['em']->getRepository('ROTIISBundle:Vereniging')->findOneById($verenigingid);
                      }
                  }, function ($vereniging) {
                      if ($vereniging !== null) {
                          return $vereniging;
                      }
                  })))
            ->add('verenigingCustom', 'text', array(
                                      'required' => false))
                                       
            ->add('kenteken', 'text', array(
                              'required' => false))
            ->add('DutchOpen', 'choice', array(
                             'choices' => $arrayJaNeeLang,
                             'empty_value' => ''))
            ->add('horstocht', 'choice', array(
                             'choices' => $arrayJaNeeLang,
                             'empty_value' => ''))
            ->add('tochtNoord', 'choice', array(
                             'choices' => $arrayJaNeeLang,
                             'empty_value' => ''))
            ->add('akkoordSponsor', 'choice', array(
                             'choices' => $arrayJaNeeLang,
                             'preferred_choices' => array('0')))  // Moet op Nee staan volgens de privacywet
        ;
    }

    public function getName() {
        return 'stap6';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setRequired(array('em','lang'));
    }
}