<?php

namespace App\Helper;

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
        // Get the API client and construct the service object.
        $client = $this->getClient();
        $service = new \Google_Service_Sheets($client);

        // Prints the names and majors of students in a sample spreadsheet:
        // https://docs.google.com/spreadsheets/d/1BxiMVs0XRA5nFMdKvBdBZjgmUUqptlbs74OgvE2upms/edit
        $spreadsheetId = '1YZa7Kaf43sTTstlpNiu__Q8bz88tSlbDa3eypIAiGNw';
        $range = 'Sprint #0!A2:E';

        $response = $service->spreadsheets->get($spreadsheetId);

        $sheetData = $response->getSheets();

        $charts = array_filter(array_map(
            function (\Google_Service_Sheets_Sheet $googleSheet) {
                return $googleSheet->getCharts();
            },
            $sheetData
        ));

        $charts = reset($charts);

        $chart = $charts[0];

        $chartId = $chart->getChartId();

        $url = "https://docs.google.com/spreadsheets/d/".$spreadsheetId."/embed/oimg?id=".$spreadsheetId."&oid=". $chartId ."&disposition=ATTACHMENT&bo=false&zx=9td6e8jgo6u3";

        return $url;
    }

    /**
     * Returns an authorized API client.
     * @return \Google_Client the authorized client object
     */
    function getClient() {
        $client = new \Google_Client();
        $client->setApplicationName('Google Sheets API PHP Quickstart');
//        $client->setScopes(implode(' ', array(
//                \Google_Service_Sheets::SPREADSHEETS_READONLY)
//        ));

//        $client->setAuthConfig(__DIR__. '/client_secret.json');
//        $client->setAccessType('offline');

        $client->setDeveloperKey('AIzaSyCmGsMS1iwOFUWfc--0QH_PbBgOtP_EtLs');

        return $client;
    }

    /**
     * Expands the home directory alias '~' to the full path.
     * @param string $path the path to expand.
     * @return string the expanded path.
     */
    function expandHomeDirectory($path) {
        $homeDirectory = getenv('HOME');
        if (empty($homeDirectory)) {
            $homeDirectory = getenv('HOMEDRIVE') . getenv('HOMEPATH');
        }
        return str_replace('~', realpath($homeDirectory), $path);
    }
}