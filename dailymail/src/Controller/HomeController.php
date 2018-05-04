<?php
namespace App\Controller;

use App\Helper\GoogleSheetHelper;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Helper\TrelloHelper;

class HomeController extends Controller
{

    /**
     * @Route("/", name="homepage")
     * @param TrelloHelper $trelloHelper
     * @return Response
     */
    public function home(TrelloHelper $trelloHelper, GoogleSheetHelper $googleSheetHelper)
    {
        //$boards = $trelloHelper->getBoards();

        $googleSheetHelper->test();

        return $this->render('home.html.twig');

    }
}