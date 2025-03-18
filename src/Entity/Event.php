<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: 'App\Repository\EventRepository')]
class Event
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(name: 'title_fr', type: 'string', length: 255, nullable: true)]
    #[Groups(['event:read'])]
    private $titleFr;

    #[ORM\Column(name: 'title_ar', type: 'string', length: 255, nullable: true)]
    #[Groups(['event:read'])]
    private $titleAr;

    #[ORM\Column(name: 'title_en', type: 'string', length: 255, nullable: true)]
    #[Groups(['event:read'])]
    private $titleEn;

    #[ORM\Column(name: 'description_fr', type: 'text', nullable: true)]
    #[Groups(['event:read'])]
    private $descriptionFr;

    #[ORM\Column(name: 'description_ar', type: 'text', nullable: true)]
    #[Groups(['event:read'])]
    private $descriptionAr;

    #[ORM\Column(name: 'description_en', type: 'text', nullable: true)]
    #[Groups(['event:read'])]
    private $descriptionEn;

    // Getters et Setters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitleFr(): ?string
    {
        return $this->titleFr;
    }

    public function setTitleFr(?string $titleFr): self
    {
        $this->titleFr = $titleFr;
        return $this;
    }

    public function getTitleAr(): ?string
    {
        return $this->titleAr;
    }

    public function setTitleAr(?string $titleAr): self
    {
        $this->titleAr = $titleAr;
        return $this;
    }

    public function getTitleEn(): ?string
    {
        return $this->titleEn;
    }

    public function setTitleEn(?string $titleEn): self
    {
        $this->titleEn = $titleEn;
        return $this;
    }

    public function getDescriptionFr(): ?string
    {
        return $this->descriptionFr;
    }

    public function setDescriptionFr(?string $descriptionFr): self
    {
        $this->descriptionFr = $descriptionFr;
        return $this;
    }

    public function getDescriptionAr(): ?string
    {
        return $this->descriptionAr;
    }

    public function setDescriptionAr(?string $descriptionAr): self
    {
        $this->descriptionAr = $descriptionAr;
        return $this;
    }

    public function getDescriptionEn(): ?string
    {
        return $this->descriptionEn;
    }

    public function setDescriptionEn(?string $descriptionEn): self
    {
        $this->descriptionEn = $descriptionEn;
        return $this;
    }
}
