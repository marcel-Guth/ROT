<?php

namespace ROT\Bundle\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class MailConfiguratieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('subject_nl', new TextConfiguratieType());
        $builder->add('subject_en', new TextConfiguratieType());
        $builder->add('html_nl', new RichTextConfiguratieType());
        $builder->add('html_en', new RichTextConfiguratieType());
        $builder->add('plain_nl', new TextAreaConfiguratieType());
        $builder->add('plain_en', new TextAreaConfiguratieType());
    }

    public function getName() {
        return 'mailconfiguratie';
    }
}