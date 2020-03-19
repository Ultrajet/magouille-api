<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class Budget extends Constraint
{
    /*
     * Any public properties become valid options for the annotation.
     * Then, use these in your validator class.
     */
    public $message = 'Le budget de {{ budget }} M€ est insuffisant pour acheter ce joueur ({{ prix }} M€).';

    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
}
