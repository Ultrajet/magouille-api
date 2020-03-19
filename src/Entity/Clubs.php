<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\ClubsRepository")
 */
class Clubs
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="float")
     */
    private $budget;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Joueurs", mappedBy="club")
     */
    private $joueurs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Transferts", mappedBy="club_vendeur")
     */
    private $achats;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Transferts", mappedBy="club_acheteur")
     */
    private $ventes;

    public function __construct()
    {
        $this->joueurs = new ArrayCollection();
        $this->achats = new ArrayCollection();
        $this->ventes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getBudget(): ?float
    {
        return $this->budget;
    }

    public function setBudget(float $budget): self
    {
        $this->budget = $budget;

        return $this;
    }

    /**
     * @return Collection|Joueurs[]
     */
    public function getJoueurs(): Collection
    {
        return $this->joueurs;
    }

    public function addJoueur(Joueurs $joueur): self
    {
        if (!$this->joueurs->contains($joueur)) {
            $this->joueurs[] = $joueur;
            $joueur->setClub($this);
        }

        return $this;
    }

    public function removeJoueur(Joueurs $joueur): self
    {
        if ($this->joueurs->contains($joueur)) {
            $this->joueurs->removeElement($joueur);
            // set the owning side to null (unless already changed)
            if ($joueur->getClub() === $this) {
                $joueur->setClub(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Transferts[]
     */
    public function getAchats(): Collection
    {
        return $this->achats;
    }

    public function addAchat(Transferts $achat): self
    {
        if (!$this->achats->contains($achat)) {
            $this->achats[] = $achat;
            $achat->setClubAcheteur($this);
        }

        return $this;
    }

    public function removeAchat(Transferts $achat): self
    {
        if ($this->achats->contains($achat)) {
            $this->achats->removeElement($achat);
            // set the owning side to null (unless already changed)
            if ($achat->getClubAcheteur() === $this) {
                $achat->setClubAcheteur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Transferts[]
     */
    public function getVentes(): Collection
    {
        return $this->ventes;
    }

    public function addVente(Transferts $vente): self
    {
        if (!$this->ventes->contains($vente)) {
            $this->ventes[] = $vente;
            $vente->setClubVendeur($this);
        }

        return $this;
    }

    public function removeVente(Transferts $vente): self
    {
        if ($this->ventes->contains($vente)) {
            $this->ventes->removeElement($vente);
            // set the owning side to null (unless already changed)
            if ($vente->getClubVendeur() === $this) {
                $vente->setClubVendeur(null);
            }
        }

        return $this;
    }
}
