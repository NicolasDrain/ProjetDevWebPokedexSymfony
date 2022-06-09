<?php

namespace App\Entity;

use App\Repository\VenteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VenteRepository::class)]
class Vente
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: PokemonDresseur::class, inversedBy: 'ventes')]
    #[ORM\JoinColumn(nullable: false)]
    private $id_pokemon_dresseur;

    #[ORM\Column(type: 'integer')]
    private $prix;

    #[ORM\Column(type: 'string', length: 255)]
    private $statut;

    #[ORM\ManyToOne(targetEntity: Dresseur::class, inversedBy: 'ventes')]
    #[ORM\JoinColumn(nullable: false)]
    private $id_dresseur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdPokemonDresseur(): ?PokemonDresseur
    {
        return $this->id_pokemon_dresseur;
    }

    public function setIdPokemonDresseur(?PokemonDresseur $id_pokemon_dresseur): self
    {
        $this->id_pokemon_dresseur = $id_pokemon_dresseur;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getIdDresseur(): ?Dresseur
    {
        return $this->id_dresseur;
    }

    public function setIdDresseur(?Dresseur $id_dresseur): self
    {
        $this->id_dresseur = $id_dresseur;

        return $this;
    }
}
