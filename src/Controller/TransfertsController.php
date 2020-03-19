<?php

namespace App\Controller;

use App\Entity\Transferts;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class TransfertsController
{
    public function __invoke(Transferts $data): Transferts
    {
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
