<?php

namespace Xinjia\SpainValidatorBundle\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;


/**
 * Class MobilePhoneValidator
 * @package Xinjia\SpainValidatorBundle\Validator
 * @author Álvaro de la Vega Olmedilla <alvarodlvo@gmail.com>
 */
class MobilePhoneValidator extends ConstraintValidator
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
        if (!$this->checkMobileTelephone($value))
        {
            $this->context->buildViolation($constraint->message)
                ->addViolation();
        }
    }

    /**
     * @param $mobileTelephone
     * @return bool
     */
    private function checkMobileTelephone($mobileTelephone)
    {
        $mobileTelephone = trim($mobileTelephone);
        $telephoneChars = str_split($mobileTelephone);

        if ($telephoneChars[0] == '6' || $telephoneChars[0] == '7')
        {
            if (preg_match('/\(\[6\-7\]\\d\{8\}\)/', $mobileTelephone))
                return true;
        }

        return false;
    }
}