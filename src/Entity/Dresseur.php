<?php

namespace App\Entity;

use App\Repository\DresseurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: DresseurRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class Dresseur implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private $email;

    #[ORM\Column(type: 'json')]
    private $roles = [];

    #[ORM\Column(type: 'string')]
    private $password;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom;

    #[ORM\Column(type: 'boolean')]
    private $starter_taken;

    #[ORM\Column(type: 'integer')]
    private $argent;

    #[ORM\OneToMany(mappedBy: 'id_dresseur', targetEntity: PokemonDresseur::class)]
    private $pokemonDresseurs;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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
}
