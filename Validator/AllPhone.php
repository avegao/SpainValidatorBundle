<?php

namespace Xinjia\SpainValidatorBundle\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * Class AllPhone
 * @package Xinjia\SpainValidatorBundle\Validator
 * @author Álvaro de la Vega Olmedilla <alvarodlvo@gmail.com>
 *
 * @Annotation
 */
class AllPhone extends Constraint
{
    public $message = 'validator.phone.all.not_valid';
}