<?php

namespace App\Trello\Event;

use App\Trello\Model\MemberInterface;

class OrganizationMemberEvent extends OrganizationEvent
{
    /**
     * @var MemberInterface
     */
    protected $member;

    /**
     * Set member
     *
     * @param MemberInterface $member
     */
    public function setMember(MemberInterface $member)
    {
        $this->member = $member;
    }

    /**
     * Get member
     *
     * @return MemberInterface
     */
    public function getMember()
    {
        return $this->member;
    }
}
