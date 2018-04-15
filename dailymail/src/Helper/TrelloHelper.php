<?php

namespace App\Helper;

use Trello\Client;

class TrelloHelper {

    /**
     * Regex to find (number) in title of tickets
     */
    const POINTS_REGEX = '#^.*?\([^\d]*(\d+)[^\d]*\).*$#';

    /**
     * @var string
     */
    protected $trelloApiKey;

    /**
     * @var string;
     */
    protected $trelloToken;

    /**
     * TrelloHelper constructor.
     * @param $trelloApiKey
     * @param $trelloToken
     */
    public function __construct($trelloApiKey, $trelloToken)
    {
        $this->trelloApiKey = $trelloApiKey;
        $this->trelloToken = $trelloToken;
    }

    /**
     * @param $apiKey
     * @return Client
     */
    public function authenticate()
    {
        $client = new Client();
        $client->authenticate($this->trelloApiKey, $this->trelloToken, Client::AUTH_URL_CLIENT_ID);

        return $client;
    }

    /**
     * @param $apiKey
     */
    public function getBoards() {
        $client = $this->authenticate();

        return $client->api('member')->boards()->all();
    }

    /**
     * @param $boardId
     * @return \Trello\Api\Cardlist
     */
    public function getBoardLists($boardId) {
        $client = $this->authenticate();

        return $client->api('board')->lists()->all($boardId);
    }

    /**
     * @param $listId
     * @return \Trello\Api\Cardlist
     */
    public function getCardsFromList($listId) {
        $client = $this->authenticate();

        return $client->api('lists')->cards()->all($listId);
    }

    public function getPointsFromList($listId) {
        $cards = $this->getCardsFromList($listId);

        $points = 0;
        foreach ($cards as $card) {
            $points += $this->getPointsFromTitle($card['name']);
        }

        return $points;
    }

    protected function getPointsFromTitle($title) {
        preg_match(self::POINTS_REGEX, $title, $matches);

        return $matches && is_array($matches) ? (int) $matches[1] : 0;
    }

}