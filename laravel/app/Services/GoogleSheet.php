<?php

namespace App\Services;

use Google_Client;
use Google_Service_Sheets;
use Google_Service_Sheets_ValueRange;

class GoogleSheet
{
    private $spreadSheetId;
    private $sheetId;
    private $client;
    private $googleSheetService;

    public function __construct()
    {
        $this->spreadSheetId = env('GOOGLE_SPREADSHEET_ID');
        $this->sheetId = env('GOOGLE_SHEET_ID');

        $this->client = new Google_Client();
        $this->client->setAuthConfig(storage_path('app/public/credentials/credentials.json'));
        $this->client->setScopes(Google_Service_Sheets::SPREADSHEETS);

        $this->googleSheetService = new Google_Service_Sheets($this->client);
    }

    public function saveDataToSheet(array $data)
    {
        $params = [
            'valueInputOption' => 'RAW',
            'insertDataOption' => 'INSERT_ROWS'
        ];

        try {
            $body = new Google_Service_Sheets_ValueRange([
                'values' => [ array_values($data) ]
            ]);

            $response = $this->googleSheetService
                ->spreadsheets_values
                ->append($this->spreadSheetId, $this->sheetId, $body, $params);

            return 'Order id: ' . $data['id'] . '; ' . $response->getUpdates()->getUpdatedRange();

        } catch (\Exception $e) {
            return 'Writing to google sheet failed';
        }

    }
}
