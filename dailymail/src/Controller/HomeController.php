<?php
namespace App\Controller;

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
    public function home(TrelloHelper $trelloHelper)
    {
        //$boards = $trelloHelper->getBoards();

        return $this->render('home.html.twig');

    }
}