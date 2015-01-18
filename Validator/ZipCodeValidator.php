<?php

namespace Xinjia\SpainValidatorBundle\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;


/**
 * Class ZipCodeValidator
 * @package Xinjia\SpainValidatorBundle\Validator
 * @author Álvaro de la Vega Olmedilla <alvarodlvo@gmail.com>
 */
class ZipCodeValidator extends ConstraintValidator
{
    /**
     * @var \Symfony\Component\Validator\Context\ExecutionContextInterface
     */
    protected $context;

    /**
     * Checks if the passed value is valid.
     *
     * @param mixed $value The value that should be validated
     * @param Constraint $constraint The constraint for the validation
     *
     * @api
     */
    public function validate($value, Constraint $constraint)
    {
        if (preg_match('/\(\(\[0\]\[1\-9\]\)\|\(\[1\-4\]\\d\)\|\(\[5\]\[0\-2\]\)\)\(\\d\{3\}\)/', $value))
        {
            $this->context->buildViolation($constraint->message)
                ->addViolation();
        }
    }
}
