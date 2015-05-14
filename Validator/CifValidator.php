<?php

namespace Xinjia\SpainValidatorBundle\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Class CifValidator
 * @package Xinjia\SpainValidatorBundle\Validator
 * @author Juanjo García <juanjogarcia@editartgroup.com>
 */
class CifValidator extends ConstraintValidator {

    private $cifFormatExpr1 = '/^[ABEH][0-9]{8}$/i';
    private $cifFormatExpr2 = '/^[KPQS][0-9]{7}[A-J]$/i';
    private $cifFormatExpr3 = '/^[CDFGJLMNRUVW][0-9]{7}[0-9A-J]$/i';

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
    public function validate($value, Constraint $constraint) {
        if (!$this->checkCif($value)) {
            $this->context->buildViolation($constraint->message)
                    ->addViolation();
        }
    }

    /**
     * @param $cif
     * @return boolean
     */
    protected function checkCifFormat($cif) {

        if (preg_match($this->cifFormatExpr1, $cif) || preg_match($this->cifFormatExpr2, $cif) || preg_match($this->cifFormatExpr3, $cif)) {

            $control = $cif[strlen($cif) - 1];
            $suma_A = 0;
            $suma_B = 0;

            for ($i = 1; $i < 8; $i++) {
                if ($i % 2 == 0)
                    $suma_A += intval($cif[$i]);
                else {
                    $t = (intval($cif[$i]) * 2);
                    $p = 0;

                    for ($j = 0; $j < strlen($t); $j++) {
                        $p += substr($t, $j, 1);
                    }
                    $suma_B += $p;
                }
            }

            $suma_C = (intval($suma_A + $suma_B)) . "";
            $suma_D = (10 - intval($suma_C[strlen($suma_C) - 1])) % 10;

            $letras = "JABCDEFGHI";

            if ($control >= "0" && $control <= "9")
                return ($control == $suma_D);
            else
                return (strtoupper($control) == $letras[$suma_D]);
        } else {

            return false;
        }
    }

    /**
     * @param $cif
     * @return boolean
     */
    protected function checkCif($cif) {

        $cif = strtoupper($cif);

        return $this->checkCifFormat($cif);
    }

}
