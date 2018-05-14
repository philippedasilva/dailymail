<?php

namespace App\Trello\Event;

use App\Trello\Model\CommentInterface;

class CardCommentEvent extends CardEvent
{
    /**
     * @var CommentInterface
     */
    protected $comment;

    /**
     * Set comment
     *
     * @param CommentInterface $comment
     */
    public function setComment(CommentInterface $comment)
    {
        $this->comment = $comment;
    }

    /**
     * Get comment
     *
     * @return CommentInterface
     */
    public function getComment()
    {
        return $this->comment;
    }
}
