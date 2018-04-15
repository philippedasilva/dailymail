<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjectRepository")
 */
class Project
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $customer;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $trelloKey;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $googleKey;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Developper", inversedBy="projects")
     */
    private $developpers;

    public function __construct()
    {
        $this->developpers = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCustomer(): ?string
    {
        return $this->customer;
    }

    public function setCustomer(?string $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    public function getTrelloKey(): ?string
    {
        return $this->trelloKey;
    }

    public function setTrelloKey(?string $trelloKey): self
    {
        $this->trelloKey = $trelloKey;

        return $this;
    }

    public function getGoogleKey(): ?string
    {
        return $this->googleKey;
    }

    public function setGoogleKey(?string $googleKey): self
    {
        $this->googleKey = $googleKey;

        return $this;
    }

    /**
     * @return Collection|Developper[]
     */
    public function getDeveloppers(): Collection
    {
        return $this->developpers;
    }

    public function addDevelopper(Developper $developper): self
    {
        if (!$this->developpers->contains($developper)) {
            $this->developpers[] = $developper;
        }

        return $this;
    }

    public function removeDevelopper(Developper $developper): self
    {
        if ($this->developpers->contains($developper)) {
            $this->developpers->removeElement($developper);
        }

        return $this;
    }
}
