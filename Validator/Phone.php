<?php

namespace Xinjia\SpainValidatorBundle\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * Class Phone
 * @package Xinjia\SpainValidatorBundle\Validator
 * @author Álvaro de la Vega Olmedilla <alvarodlvo@gmail.com>
 *
 * @Annotation
 */
class Phone extends Constraint
{
    public $message = 'validator.phone.not_valid';
}