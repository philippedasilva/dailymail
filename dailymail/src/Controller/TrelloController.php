<?php

namespace App\Controller;

use App\Entity\Developper;
use App\Form\DevelopperType;
use App\Helper\GoogleSheetHelper;
use App\Helper\TrelloHelper;
use App\Repository\DevelopperRepository;
use App\Trello\Model\Card;
use JavierEguiluz\Bundle\EasyAdminBundle\Controller\AdminController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration as Config;
use Trello\Model\Lane;

/**
 * Class TrelloController
 * @package App\Controller
 */
class TrelloController extends Controller
{
    /**
     * @Config\Route(
     *      name="trello_index",
     *      path="/trello",
     * )
     *
     * @param TrelloHelper $trelloHelper
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(TrelloHelper $trelloHelper)
    {
        $trelloApiKey = "46ee952a39259cd1a3db36781347bb26";
        $trelloToken = "8954fe1933ee3297940d46add859a74e0169833ec4e61889b0137b176e7d81a5";
        $boardId = "Qv1mGDTI";

        $trelloHelper->authenticate($trelloApiKey, $trelloToken);

        $listsData = [];

        $board = $trelloHelper->getBoard($boardId);
        $boardData = $board->toArray();

        //Test to have points of each board list
//        var_dump($trelloHelper->getPointsFromBoard($board));die;

        /** @var Lane $list */
        foreach ($board->getLists() as $list) {
            $listData = $list->toArray();
            $cards = [];
            $listPoints = 0;

            foreach ($list->getCards() as $card) {
                $data = $card->toArray();
                $name = $data['name'];
                $point = $trelloHelper->getPointsFromTitle($name);

                $cards[$card->getId()] = [
                    'name' => $name,
                    'description' => $data['desc'],
                    'points' => $point,
                ];

                $listPoints += $point;
            }

            $listsData[$list->getId()] = [
                'name' => $listData['name'],
                'cards' => $cards,
                'points' => $listPoints
            ];
        }

        return $this->render('trello.html.twig', [
            'boardName' => $boardData['name'],
            'data' => $listsData
        ]);
    }
}