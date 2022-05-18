<?php

namespace App\Entity;

use App\Repository\PokemonDresseurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PokemonDresseurRepository::class)]
class PokemonDresseur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Dresseur::class, inversedBy: 'pokemonDresseurs')]
    #[ORM\JoinColumn(nullable: false)]
    private $id_dresseur;

    #[ORM\ManyToOne(targetEntity: Pokemon::class, inversedBy: 'pokemonDresseurs')]
    #[ORM\JoinColumn(nullable: false)]
    private $id_pokemon;

    #[ORM\Column(type: 'string', nullable: true, length: 255)]
    private $surnom;

    #[ORM\Column(type: 'string', length: 255)]
    private $genre;

    #[ORM\Column(type: 'integer')]
    private $exp;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $date_time_derniere_activite;

    #[ORM\OneToMany(mappedBy: 'id_pokemon_dresseur', targetEntity: Vente::class)]
    private $ventes;

    public function __construct()
    {
        $this->ventes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIdPokemon(): ?Pokemon
    {
        return $this->id_pokemon;
    }

    public function setIdPokemon(?Pokemon $id_pokemon): self
    {
        $this->id_pokemon = $id_pokemon;

        return $this;
    }

    public function getSurnom(): ?string
    {
        return $this->surnom;
    }

    public function setSurnom(string $surnom): self
    {
        $this->surnom = $surnom;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getExp(): ?int
    {
        return $this->exp;
    }

    public function setExp(int $exp): self
    {
        $this->exp = $exp;

        return $this;
    }

    public function getDateTimeDerniereActivite(): ?\DateTimeInterface
    {
        return $this->date_time_derniere_activite;
    }

    public function setDateTimeDerniereActivite(?\DateTimeInterface $date_time_derniere_activite): self
    {
        $this->date_time_derniere_activite = $date_time_derniere_activite;

        return $this;
    }

    /**
     * @return Collection<int, Vente>
     */
    public function getVentes(): Collection
    {
        return $this->ventes;
    }

    public function addVente(Vente $vente): self
    {
        if (!$this->ventes->contains($vente)) {
            $this->ventes[] = $vente;
            $vente->setIdPokemonDresseur($this);
        }

        return $this;
    }

    public function removeVente(Vente $vente): self
    {
        if ($this->ventes->removeElement($vente)) {
            // set the owning side to null (unless already changed)
            if ($vente->getIdPokemonDresseur() === $this) {
                $vente->setIdPokemonDresseur(null);
            }
        }

        return $this;
    }
}
