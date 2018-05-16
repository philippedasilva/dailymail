<?php

namespace App\Helper;

use App\Trello\Model\Board;
use Trello\Client;
use Trello\Model\Lane;

class TrelloHelper {

    /**
     * Regex to find (number) in title of tickets
     */
    const POINTS_REGEX = '#^.*?\([^\d]*(\d+)[^\d]*\).*$#';

    /** @var Client  */
    private $client;

    /**
     * @param $trelloApiKey
     * @param $trelloToken
     */
    public function authenticate($trelloApiKey, $trelloToken)
    {
        $this->client = new Client($trelloApiKey);
        $this->client->setAccessToken($trelloToken);
    }

    public function getBoard($boardId)
    {
        return $this->client->getBoard($boardId);
    }

    public function getCardsFromBoard($boardId)
    {
        $board = $this->getBoard($boardId);

        return $board->getCards();
    }

    public function getCard($cardId, $boardId)
    {
        $board = $this->getBoard($boardId);

        return $board->getCard($cardId);
    }

    public function getPointsFromBoard(\Trello\Model\Board $board)
    {
        $pointsData = [];

        /** @var Lane $list */
        foreach ($board->getLists() as $list) {
            $listPoints = 0;

            foreach ($list->getCards() as $card) {
                $data = $card->toArray();
                $name = $data['name'];
                $point = $this->getPointsFromTitle($name);

                $listPoints += $point;
            }

            $pointsData[$list->getId()] = $listPoints;
        }

        return $pointsData;
    }

    public function getPointsFromTitle($title)
    {
        preg_match(self::POINTS_REGEX, $title, $matches);

        return $matches && is_array($matches) ? (int) $matches[1] : 0;
    }
}