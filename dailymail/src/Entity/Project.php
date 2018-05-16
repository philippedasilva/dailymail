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
     * @ORM\OneToOne(targetEntity="App\Entity\ProjectConfiguration", cascade="all")
     */
    private $configuration;

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

    /**
     * @return mixed
     */
    public function getConfiguration()
    {
        return $this->configuration;
    }

    /**
     * @param mixed $configuration
     *
     * @return Project
     */
    public function setConfiguration($configuration)
    {
        $this->configuration = $configuration;

        return $this;
    }

    public function getGoogleSheetConfiguration()
    {
        if (!$this->getConfiguration() || !$this->getConfiguration()->getGoogleConfiguration()) {
            return null;
        }

        return [
            0 => $this->getConfiguration()->getGoogleConfiguration()->getArray()
        ];
    }

    public function setGoogleSheetConfiguration($googleSheetConfiguration)
    {
        if (!$this->configuration) {
            $this->configuration = new ProjectConfiguration();
        }

        if ($googleSheetConfiguration) {
            //Take first only (one configuration only)
            $googleSheetConfiguration = reset($googleSheetConfiguration);

            $currentGoogleConfiguration = $this->configuration->getGoogleConfiguration();

            if (!$currentGoogleConfiguration) {
                $currentGoogleConfiguration = new GoogleSheetConfiguration();
            }

            $currentGoogleConfiguration = $currentGoogleConfiguration->set($googleSheetConfiguration);
            $this->configuration->setGoogleConfiguration($currentGoogleConfiguration);
            $this->configuration->setProject($this);
        } else {
            $this->configuration->setGoogleConfiguration(null);
        }

        return $this;
    }

    public function getTrelloConfiguration()
    {
        if (!$this->getConfiguration() || !$this->getConfiguration()->getTrelloConfiguration()) {
            return null;
        }

        return [
            0 => $this->getConfiguration()->getTrelloConfiguration()->getArray()
        ];
    }

    public function setTrelloConfiguration($trelloConfiguration)
    {
        if (!$this->configuration) {
            $this->configuration = new ProjectConfiguration();
        }

        if ($trelloConfiguration) {
            //Take first only (one configuration only)
            $trelloConfiguration = reset($trelloConfiguration);

            $currentTrelloConfiguration = $this->configuration->getTrelloConfiguration();

            if (!$currentTrelloConfiguration) {
                $currentTrelloConfiguration = new TrelloConfiguration();
            }

            $currentTrelloConfiguration = $currentTrelloConfiguration->set($trelloConfiguration);
            $this->configuration->setTrelloConfiguration($currentTrelloConfiguration);
            $this->configuration->setProject($this);
        } else {
            $this->configuration->setTrelloConfiguration(null);
        }

        return $this;
    }

    /**
     * @return string
     */

    public function __toString()
    {
        return $this->name;
    }

}
