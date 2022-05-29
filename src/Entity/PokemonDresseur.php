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

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
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
        $this->date_time_derniere_activite = new \DateTime("-1 hour");
        $genre=rand(0,1);
        if($genre==0){
            $this->genre = "M";
        }
        else{
            $this->genre = "F";
        }
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

    public function setDateTimeDerniereActivite(\DateTimeInterface $date_time_derniere_activite): self
    {
        $this->date_time_derniere_activite = $date_time_derniere_activite;

        return $this;
    }

    public function getNiveau(): ?int
    {
        $typeCourbeNiveau = $this->getIdPokemon()->getTypeCourbeNiveau();
        if($this->exp==0){
            return 1;
        }
        if($typeCourbeNiveau=='R'){
            $niveau=pow($this->exp/0.8,1/3);

        }
        if($typeCourbeNiveau=='M'){
            $niveau=pow($this->exp,1/3);
        }
        if($typeCourbeNiveau=='P'){
            $niveau=pow($this->exp,1/3);
        }
        if($typeCourbeNiveau=='L'){
            if($this->exp==1){
                $niveau=1;
            }
            else{
                $niveau=pow($this->exp/1,25,1/3);
            }
        }
        if($niveau>100){
            return 100;
        }
        return intval($niveau);
    }

    public function getExpByNiveau(int $niveau): ?int
    {
        $typeCourbeNiveau = $this->getIdPokemon()->getTypeCourbeNiveau();
        if($typeCourbeNiveau=='R'){
            $exp=0.8*pow($niveau,3);
        }
        if($typeCourbeNiveau=='M'){
            $exp=pow($niveau,3);
        }
        if($typeCourbeNiveau=='P'){
            $exp=pow($niveau,3);
        }
        if($typeCourbeNiveau=='L'){
            $exp=1.25*pow($niveau,3);
        }
        return intval($exp);
    }

    public function isAvailable(): ?bool
    {
        $date = new \DateTime();
        $date2 = date_add($this->getDateTimeDerniereActivite(),date_interval_create_from_date_string('1 hour'));
        return ($date>$date2);
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
