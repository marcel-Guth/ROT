<?php

namespace ROT\Bundle\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints as Assert;

class SelectNorfilesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $em = $options['em'];

        $pdf_choices = array();
        foreach ($em->getRepository('ROTAdminBundle:Norfile')->findPDFNorfiles() as $pdf_norfile) {
            $pdf_choices[$pdf_norfile->getId()] = $pdf_norfile->getNorfilename();
        }
        $builder->add('pdf', 'choice', array(
            'choices' => $pdf_choices,
            'expanded' => true
        ));

        $html_choices = array();
        foreach ($em->getRepository('ROTAdminBundle:Norfile')->findHTMLNorfiles() as $html_norfile) {
            $html_choices[$html_norfile->getId()] = $html_norfile->getNorfilename();
        }
        $builder->add('html', 'choice', array(
            'choices' => $html_choices,
            'expanded' => true
        ));

        $image_choices = array();
        foreach ($em->getRepository('ROTAdminBundle:Norfile')->findImageNorfiles() as $image_norfile) {
            $image_choices[$image_norfile->getId()] = $image_norfile->getNorfilename();
        }
        $builder->add('image', 'choice', array(
            'choices' => $image_choices,
            'expanded' => true
        ));
    }

    public function getName() {
        return 'selectNorfiles';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'ROT\Bundle\AdminBundle\Entity\Norfile'
        ));
        $resolver->setRequired(array('em'));
    }
}