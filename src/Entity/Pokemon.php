<?php

namespace App\Entity;

use App\Repository\PokemonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PokemonRepository::class)]
class Pokemon
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom;

    #[ORM\Column(type: 'boolean')]
    private $is_evolution;

    #[ORM\Column(type: 'boolean')]
    private $is_starter;

    #[ORM\Column(type: 'string', length: 255)]
    private $type_courbe_niveau;

    #[ORM\ManyToOne(targetEntity: Type::class, inversedBy: 'pokemon')]
    #[ORM\JoinColumn(nullable: false)]
    private $id_type_1;

    #[ORM\ManyToOne(targetEntity: Type::class)]
    private $id_type_2;

    #[ORM\Column(type: 'string', length: 255)]
    private $photo;

    #[ORM\Column(type: 'boolean')]
    private $can_evolve;

    #[ORM\OneToMany(mappedBy: 'id_pokemon', targetEntity: PokemonDresseur::class)]
    private $pokemonDresseurs;

    public function __construct()
    {
        $this->pokemonDresseurs = new ArrayCollection();
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

    public function isIsEvolution(): ?bool
    {
        return $this->is_evolution;
    }

    public function setIsEvolution(bool $is_evolution): self
    {
        $this->is_evolution = $is_evolution;

        return $this;
    }

    public function isIsStarter(): ?bool
    {
        return $this->is_starter;
    }

    public function setIsStarter(bool $is_starter): self
    {
        $this->is_starter = $is_starter;

        return $this;
    }

    public function getTypeCourbeNiveau(): ?string
    {
        return $this->type_courbe_niveau;
    }

    public function setTypeCourbeNiveau(string $type_courbe_niveau): self
    {
        $this->type_courbe_niveau = $type_courbe_niveau;

        return $this;
    }

    public function getIdType1(): ?Type
    {
        return $this->id_type_1;
    }

    public function setIdType1(?Type $id_type_1): self
    {
        $this->id_type_1 = $id_type_1;

        return $this;
    }

    public function getIdType2(): ?Type
    {
        return $this->id_type_2;
    }

    public function setIdType2(?Type $id_type_2): self
    {
        $this->id_type_2 = $id_type_2;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function isCanEvolve(): ?bool
    {
        return $this->can_evolve;
    }

    public function setCanEvolve(bool $can_evolve): self
    {
        $this->can_evolve = $can_evolve;

        return $this;
    }

    /**
     * @return Collection<int, PokemonDresseur>
     */
    public function getPokemonDresseurs(): Collection
    {
        return $this->pokemonDresseurs;
    }

    public function addPokemonDresseur(PokemonDresseur $pokemonDresseur): self
    {
        if (!$this->pokemonDresseurs->contains($pokemonDresseur)) {
            $this->pokemonDresseurs[] = $pokemonDresseur;
            $pokemonDresseur->setIdPokemon($this);
        }

        return $this;
    }

    public function removePokemonDresseur(PokemonDresseur $pokemonDresseur): self
    {
        if ($this->pokemonDresseurs->removeElement($pokemonDresseur)) {
            // set the owning side to null (unless already changed)
            if ($pokemonDresseur->getIdPokemon() === $this) {
                $pokemonDresseur->setIdPokemon(null);
            }
        }

        return $this;
    }
}
