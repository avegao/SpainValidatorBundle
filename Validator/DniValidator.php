<?php

namespace Xinjia\SpainValidatorBundle\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;


/**
 * Class DniValidator
 * @package Xinjia\SpainValidatorBundle\Validator
 * @author Álvaro de la Vega Olmedilla <alvarodlvo@gmail.com>
 */
class DniValidator extends ConstraintValidator
{
    private $dniFormatExpr = '/((^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$|^[T]{1}[A-Z0-9]{8}$)|^[0-9]{8}[A-Z]{1}$)/';
    private $standardDniExpr = '/(^[0-9]{8}[A-Z]{1}$)/';
    private $availableLastChar = 'TRWAGMYFPDXBNJZSQVHLCKE';

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
        if (!$this->checkDni($value))
        {
            $this->context->buildViolation($constraint->message)
                ->addViolation();
        }
    }

    private function splitDni($dni)
    {
        return str_split($dni, 1);
    }

    protected function checkDniFormat($dni)
    {
        return preg_match($this->dniFormatExpr, $dni);
    }

    protected function isValidDniLastChar($dni)
    {
        $dniCharacters = $this->splitDni($dni);
        return ($dniCharacters[8] == substr($this->availableLastChar, substr($dni, 0, 8) % 23, 1));
    }

    protected function checkStandardDni($dni)
    {
        // Check if standard DNI
        return (preg_match($this->standardDniExpr, $dni)) ? $this->isValidDniLastChar($dni) : false;
    }

    protected function checkSpecialDni($dni)
    {
        $dniCharacters = $this->splitDni($dni);

        $plus = $dniCharacters[2] + $dniCharacters[4] + $dniCharacters[6];
        for ($i = 1; $i < 8; $i += 2)
            $plus += (int) substr((2 * $dniCharacters[$i]), 0, 1) + (int) substr((2 * $dniCharacters[$i]), 1, 1);

        $n = 10 - substr($plus, strlen($plus) - 1, 1);

        return (preg_match('/^[KLM]{1}/', $dni)) ? ($dniCharacters[8] == chr(64 + $n) || $this->isValidDniLastChar($dni)) : false;
    }

    protected function checkDni($dni)
    {
        $dni = strtoupper($dni);

        // Invalid format
        if (!$this->checkDniFormat($dni))
            return false;

        return ($this->checkStandardDni($dni) || $this->checkSpecialDni($dni));
    }
}