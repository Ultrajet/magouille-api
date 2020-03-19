<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class BudgetValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        /* @var $constraint \App\Validator\Budget */

        if (null === $value || '' === $value) {
            return;
        }

        $budgetClubAcheteur = $value->getClubAcheteur()->getBudget();
        $prixJoueur = $value->getJoueur()->getPrix();

        if ($budgetClubAcheteur < $prixJoueur) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ budget }}', $budgetClubAcheteur)
                ->setParameter('{{ prix }}', $prixJoueur)
                ->addViolation();
        }
    }
}
