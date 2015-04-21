<?php

namespace ROT\Bundle\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints as Assert;

class UploadNorfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('norfilename', 'file', array(
            'required' => 'File'
        ));
        $builder->addModelTransformer(new CallbackTransformer(function ($norfile) {
            return $norfile;
        }, function ($norfile) {
            var_dump($norfile);
            exit();
        }));
    }

    public function getName() {
        return 'uploadNorfile';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'ROT\Bundle\AdminBundle\Entity\Norfile'
        ));
    }
}