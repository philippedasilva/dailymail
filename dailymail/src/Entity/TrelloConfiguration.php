<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class TrelloConfiguration
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $apikey;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $token;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $doneColumnId;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $codeReviewColumnId;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pairTestingColumnId;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $doingColumnId;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sprintColumnId;

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
    public function getApikey(): ?string
    {
        return $this->apikey;
    }

    /**
     * @param mixed $apikey
     *
     * @return TrelloConfiguration
     */
    public function setApikey($apikey) : self
    {
        $this->apikey = $apikey;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getToken(): ?string
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     *
     * @return TrelloConfiguration
     */
    public function setToken($token) : self
    {
        $this->token = $token;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDoneColumnId(): ?string
    {
        return $this->doneColumnId;
    }

    /**
     * @param mixed $doneColumnId
     *
     * @return TrelloConfiguration
     */
    public function setDoneColumnId($doneColumnId) : self
    {
        $this->doneColumnId = $doneColumnId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodeReviewColumnId(): ?string
    {
        return $this->codeReviewColumnId;
    }

    /**
     * @param mixed $codeReviewColumnId
     *
     * @return TrelloConfiguration
     */
    public function setCodeReviewColumnId($codeReviewColumnId) : self
    {
        $this->codeReviewColumnId = $codeReviewColumnId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPairTestingColumnId(): ?string
    {
        return $this->pairTestingColumnId;
    }

    /**
     * @param mixed $pairTestingColumnId
     *
     * @return TrelloConfiguration
     */
    public function setPairTestingColumnId($pairTestingColumnId) : self
    {
        $this->pairTestingColumnId = $pairTestingColumnId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDoingColumnId(): ?string
    {
        return $this->doingColumnId;
    }

    /**
     * @param mixed $doingColumnId
     *
     * @return TrelloConfiguration
     */
    public function setDoingColumnId($doingColumnId) : self
    {
        $this->doingColumnId = $doingColumnId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSprintColumnId(): ?string
    {
        return $this->sprintColumnId;
    }

    /**
     * @param mixed $sprintColumnId
     *
     * @return TrelloConfiguration
     */
    public function setSprintColumnId($sprintColumnId) : self
    {
        $this->sprintColumnId = $sprintColumnId;

        return $this;
    }

    public function set($trelloConf = []) : self
    {
        if ($trelloConf) {
            foreach ($trelloConf as $key => $value) {
                $this->{$key} = $value;
            }
        }

        return $this;
    }

    public function getArray()
    {
        return [
            'apikey' => $this->getApikey(),
            'token' => $this->getToken(),
            'doneColumnId' => $this->getDoneColumnId(),
            'codeReviewColumnId' => $this->getCodeReviewColumnId(),
            'pairTestingColumnId' => $this->getPairTestingColumnId(),
            'doingColumnId' => $this->getDoingColumnId(),
            'sprintColumnId' => $this->getSprintColumnId(),
        ];
    }
}