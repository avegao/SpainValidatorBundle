<?php

namespace Xinjia\SpainValidatorBundle\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;


/**
 * Class PhoneValidator
 * @package Xinjia\SpainValidatorBundle\Validator
 * @author Álvaro de la Vega Olmedilla <alvarodlvo@gmail.com>
 */
class PhoneValidator extends ConstraintValidator
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
        if (!$this->checkTelephone($value))
        {
            $this->context->buildViolation($constraint->message)
                ->addViolation();
        }
    }

    /**
     * @param $telephone
     * @return bool
     */
    private function checkTelephone($telephone)
    {
        $return = false;
        
        //$telephone = trim($telephone);
        trim($telephone);
        $telephoneChars = str_split($telephone);

        if(empty($telephone)){
            $return = true;
        }
        
        if ($telephoneChars[0] == '6' || $telephoneChars[0] == '7' || $telephoneChars[0] == '9' || $telephoneChars[0] == '8')
        {
            if (preg_match('/[6-9]\d{8}/', $telephone)) {
                $return = true;
            }
        }

        return $return;
    }
}