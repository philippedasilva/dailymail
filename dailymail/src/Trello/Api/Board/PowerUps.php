<?php

namespace App\Trello\Api\Board;

use App\Trello\Api\AbstractApi;

/**
 * Trello Board PowerUps API
 * @link https://trello.com/docs/api/board
 *
 * Not implemented:
 * - https://trello.com/docs/api/board/#post-1-boards-board-id-powerups
 * - https://trello.com/docs/api/board/#delete-1-boards-board-id-powerups-powerup
 */
class PowerUps extends AbstractApi
{
    /**
     * Base path of board power ups api
     * @var string
     */
    protected $path = 'boards/#id#/powerUps';
}
