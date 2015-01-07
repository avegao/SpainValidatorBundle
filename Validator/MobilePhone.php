<?php

namespace Xinjia\SpainValidatorBundle\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * Class MobilePhone
 * @package Xinjia\SpainValidatorBundle\Validator
 * @author Álvaro de la Vega Olmedilla <alvarodlvo@gmail.com>
 *
 * @Annotation
 */
class MobilePhone extends Constraint
{
    public $message = 'validator.phone.mobile.not_valid';
}