<?php

namespace Xinjia\SpainValidatorBundle\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * Class Cif
 * @package Xinjia\SpainValidatorBundle\Validator
 * @author Juanjo García <juanjogarcia@editartgroup.com>
 *
 * @Annotation
 */
class Cif extends Constraint
{
    public $message = 'validator.cif.not_valid';
}