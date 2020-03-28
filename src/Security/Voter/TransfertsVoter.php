<?php

namespace App\Security\Voter;

use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

class TransfertsVoter extends Voter
{
    protected function supports($attribute, $subject)
    {
        return in_array($attribute, ['CREATE'])
            && $subject instanceof \App\Entity\Transferts;
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();
        if (!$user instanceof UserInterface) {
            return false;
        }

        switch ($attribute) {
            case 'CREATE':
                if ($subject->getJoueur()->getPrenom() == 'Thomas') {
                    return true;
                }
                else {
                    throw new Exception("TransfertsVoter n'accepte qu'un joueur dont le prénom est Thomas !");
                }
                break;
        }

        return false;
    }
}
