<?php

namespace App\Helper;

use Google\Spreadsheet\DefaultServiceRequest;
use Google\Spreadsheet\ServiceRequestFactory;
use Google\Spreadsheet\SpreadsheetService;

class GoogleSheetHelper {
    /**
     * @var string;
     */
    protected $googleSheetToken;

    /**
     * TrelloHelper constructor.
     * @param $googleSheetToken
     */
    public function __construct($googleSheetToken)
    {
        $this->googleSheetToken = $googleSheetToken;
    }

    public function test()
    {
        $serviceRequest = new DefaultServiceRequest($this->googleSheetToken);
        ServiceRequestFactory::setInstance($serviceRequest);

        $spreadsheetService = new SpreadsheetService();
//        $worksheetFeed = $spreadsheetService->getPublicSpreadsheet("1YZa7Kaf43sTTstlpNiu__Q8bz88tSlbDa3eypIAiGNw");
        $worksheetFeed = $spreadsheetService->getSpreadsheetFeed();

        var_dump($worksheetFeed);die;
    }
}