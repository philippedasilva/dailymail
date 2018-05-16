<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class GoogleSheetConfiguration
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
    private $token;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $spreadSheetId;

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
    public function getToken(): ?string
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     *
     * @return GoogleSheetConfiguration
     */
    public function setToken($token) : self
    {
        $this->token = $token;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSpreadSheetId(): ?string
    {
        return $this->spreadSheetId;
    }

    /**
     * @param mixed $spreadSheetId
     *
     * @return GoogleSheetConfiguration
     */
    public function setSpreadSheetId($spreadSheetId) : self
    {
        $this->spreadSheetId = $spreadSheetId;

        return $this;
    }

    public function set($googleSheetConf = []) : self
    {
        if ($googleSheetConf) {
            foreach ($googleSheetConf as $key => $value) {
                $this->{$key} = $value;
            }
        }

        return $this;
    }

    public function getArray()
    {
        return [
            'token' => $this->getToken(),
            'spreadSheetId' => $this->getSpreadSheetId(),
        ];
    }
}