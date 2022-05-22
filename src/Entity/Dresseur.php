<?php

namespace App\Entity;

use App\Repository\DresseurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

#[ORM\Entity(repositoryClass: DresseurRepository::class)]
#[UniqueEntity(fields: ['mail'], message: 'There is already an account with this mail')]
class Dresseur implements UserInterface , PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom;

    #[ORM\Column(type: 'string', length: 255)]
    private $mail;

    #[ORM\Column(type: 'string', length: 255)]
    private $password;

    #[ORM\Column(type: 'boolean')]
    private $starter_taken;

    #[ORM\Column(type: 'integer')]
    private $argent;

    #[ORM\OneToMany(mappedBy: 'id_dresseur', targetEntity: PokemonDresseur::class)]
    private $pokemonDresseurs;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $roles;

    public function __construct()
    {
        $this->pokemonDresseurs = new ArrayCollection();
        $this->starter_taken = false;
        $this->argent = 5000;
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

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function isStarterTaken(): ?bool
    {
        return $this->starter_taken;
    }

    public function setStarterTaken(bool $starter_taken): self
    {
        $this->starter_taken = $starter_taken;

        return $this;
    }

    public function getArgent(): ?int
    {
        return $this->argent;
    }

    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getUserIdentifier(): string
    {
        return (string) $this->mail;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setArgent(int $argent): self
    {
        $this->argent = $argent;

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
            $pokemonDresseur->setIdDresseur($this);
        }

        return $this;
    }

    public function removePokemonDresseur(PokemonDresseur $pokemonDresseur): self
    {
        if ($this->pokemonDresseurs->removeElement($pokemonDresseur)) {
            // set the owning side to null (unless already changed)
            if ($pokemonDresseur->getIdDresseur() === $this) {
                $pokemonDresseur->setIdDresseur(null);
            }
        }

        return $this;
    }

    public function setRoles(?string $roles): self
    {
        $this->roles = $roles;

        return $this;
    }
}
