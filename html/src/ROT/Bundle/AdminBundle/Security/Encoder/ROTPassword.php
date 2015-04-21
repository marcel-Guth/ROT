<?php

namespace ROT\Bundle\AdminBundle\Security\Encoder;

use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;

class ROTPassword extends MessageDigestPasswordEncoder
{
	protected function mergePasswordAndSalt($password, $salt) {
		return $salt . $password;
	}
}