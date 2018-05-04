<?php

namespace App\Trello\Event;

use App\Trello\Model\OrganizationInterface;

class OrganizationEvent extends AbstractEvent
{
    /**
     * @var OrganizationInterface
     */
    protected $organization;

    /**
     * Set organization
     *
     * @param OrganizationInterface $organization
     */
    public function setOrganization(OrganizationInterface $organization)
    {
        $this->organization = $organization;
    }

    /**
     * Get organization
     *
     * @return OrganizationInterface
     */
    public function getOrganization()
    {
        return $this->organization;
    }
}
