<?php

namespace Xinjia\SpainValidatorBundle\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * Class Zip Code
 * @package Xinjia\SpainValidatorBundle\Validator
 * @author Álvaro de la Vega Olmedilla <alvarodlvo@gmail.com>
 *
 * @Annotation
 */
class ZipCode extends Constraint
{
    public $message = 'validator.zip_code.not_valid';
}
