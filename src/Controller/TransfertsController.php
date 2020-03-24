<?php

namespace App\Controller;

use App\Entity\Transferts;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class TransfertsController
{
    public function __invoke(Transferts $data): Transferts
    {
        $budgetClubAcheteur = $data->getClubAcheteur()->getBudget();
        $prixJoueur = $data->getJoueur()->getPrix();

        if ($budgetClubAcheteur < $prixJoueur) {
            throw new Exception("Le budget de $budgetClubAcheteur M€ est trop bas pour ce transfert ($prixJoueur M€).");
        }

        $data->getJoueur()->setClub($data->getClubAcheteur());

        $budgetClubAcheteur = $data->getClubAcheteur()->getBudget();
        $data->getClubAcheteur()->setBudget($budgetClubAcheteur - $data->getJoueur()->getPrix());

        $budgetClubVendeur = $data->getClubVendeur()->getBudget();
        $data->getClubVendeur()->setBudget($budgetClubVendeur + $data->getJoueur()->getPrix());

        return $data;
    }

    /**
     * @Route("/token")
     */
    public function token()
    {
        return new Response('TOKEN !');
    }
}
