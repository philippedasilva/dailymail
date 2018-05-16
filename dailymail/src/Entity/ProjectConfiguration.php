<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class ProjectConfiguration
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Project")
     */
    private $project;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\GoogleSheetConfiguration", cascade="all")
     */
    private $googleConfiguration;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\TrelloConfiguration", cascade="all")
     */
    private $trelloConfiguration;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @param mixed $project
     *
     * @return ProjectConfiguration
     */
    public function setProject($project) : self
    {
        $this->project = $project;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getGoogleConfiguration()
    {
        return $this->googleConfiguration;
    }

    /**
     * @param mixed $googleConfiguration
     *
     * @return ProjectConfiguration
     */
    public function setGoogleConfiguration($googleConfiguration) : self
    {
        $this->googleConfiguration = $googleConfiguration;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTrelloConfiguration()
    {
        return $this->trelloConfiguration;
    }

    /**
     * @param mixed $trelloConfiguration
     *
     * @return ProjectConfiguration
     */
    public function setTrelloConfiguration($trelloConfiguration) : self
    {
        $this->trelloConfiguration = $trelloConfiguration;

        return $this;
    }
}
