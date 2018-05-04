<?php

namespace App\Controller;

use App\Entity\Developper;
use App\Form\DevelopperType;
use App\Helper\GoogleSheetHelper;
use App\Repository\DevelopperRepository;
use JavierEguiluz\Bundle\EasyAdminBundle\Controller\AdminController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration as Config;

/**
 * Class GoogleSheetController
 * @package App\Controller
 */
class GoogleSheetController extends Controller
{
    /**
     * @Config\Route(
     *      name="google_sheet_index",
     *      path="/google_sheet",
     * )
     *
     * @param GoogleSheetHelper $googleSheetHelper
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(GoogleSheetHelper $googleSheetHelper)
    {
        //$boards = $trelloHelper->getBoards();

        $url = $googleSheetHelper->test();

        return $this->render('google_sheet.html.twig', [
            'chartUrl' => $url
        ]);
    }
}