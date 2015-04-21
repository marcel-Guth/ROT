<?php

namespace ROT\Bundle\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints as Assert;

class UploadFinishtijdenType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('bestand', new FileType(), array(
            'constraints' => array(
                new Assert\File(array(
                    'mimeTypes' => array('text/csv', 'text/plain')
                ))
            )
        ));
    }

    public function getName() {
        return 'uploadFinishtijden';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {}
}