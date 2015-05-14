<?php

namespace Xinjia\SpainValidatorBundle\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * Class DniCif
 * @package Xinjia\SpainValidatorBundle\Validator
 * @author Juanjo García <juanjogarcia@editartgroup.com>
 *
 * @Annotation
 */
class DniCif extends Constraint
{
    public $message = 'validator.dnicif.not_valid';
}