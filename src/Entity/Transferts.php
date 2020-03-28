<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use App\Controller\TransfertsController;
use App\Validator\Budget;

/**
 * @ApiResource(
 *      collectionOperations={
 *          "get",
 *          "post"={
 *              "method"="POST",
 *              "controller"=TransfertsController::class,
 *              "access_control"="is_granted('CREATE', object)"
 *          }
 *      }
 * )
 * @ORM\Entity(repositoryClass="App\Repository\TransfertsRepository")
 */
class Transferts
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Joueurs", inversedBy="transferts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $joueur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Clubs", inversedBy="ventes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $club_vendeur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Clubs", inversedBy="achats")
     * @ORM\JoinColumn(nullable=false)
     */
    private $club_acheteur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJoueur(): ?Joueurs
    {
        return $this->joueur;
    }

    public function setJoueur(?Joueurs $joueur): self
    {
        $this->joueur = $joueur;

        return $this;
    }

    public function getClubVendeur(): ?Clubs
    {
        return $this->club_vendeur;
    }

    public function setClubVendeur(?Clubs $club_vendeur): self
    {
        $this->club_vendeur = $club_vendeur;

        return $this;
    }

    public function getClubAcheteur(): ?Clubs
    {
        return $this->club_acheteur;
    }

    public function setClubAcheteur(?Clubs $club_acheteur): self
    {
        $this->club_acheteur = $club_acheteur;

        return $this;
    }
}
