<?php

namespace ROT\Bundle\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class PasswordType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('password', 'repeated', array(
            'type' => 'password',
            'first_name' => 'Wachtwoord',
            'second_name' => 'Herhaling'
        ));
    }

    public function getName() {
        return 'password';
    }
}