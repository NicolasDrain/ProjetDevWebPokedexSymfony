<?php

namespace App\Entity;

use App\Repository\CaptureRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CaptureRepository::class)]
class Capture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Type::class, inversedBy: 'captures')]
    #[ORM\JoinColumn(nullable: false)]
    private $id_type;

    #[ORM\ManyToOne(targetEntity: Region::class, inversedBy: 'captures')]
    #[ORM\JoinColumn(nullable: false)]
    private $id_region;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdType(): ?Type
    {
        return $this->id_type;
    }

    public function setIdType(?Type $id_type): self
    {
        $this->id_type = $id_type;

        return $this;
    }

    public function getIdRegion(): ?Region
    {
        return $this->id_region;
    }

    public function setIdRegion(?Region $id_region): self
    {
        $this->id_region = $id_region;

        return $this;
    }
}
