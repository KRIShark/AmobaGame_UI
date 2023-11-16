<?php

class AmobaGameAPI {
    private $baseUrl;

    public function __construct($baseUrl) {
        $this->baseUrl = rtrim($baseUrl, '/');
    }

    private function sendRequest($method, $path, $params = []) {
        $url = $this->baseUrl . $path;
        if (!empty($params)) {
            $query = http_build_query($params);
            $url .= '?' . $query;
        }

        // Initialize cURL session
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute cURL session and close it
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }

    public function startGame() {
        return $this->sendRequest('GET', '/AmobaGame/StartGame');
    }

    public function getTable($gameId) {
        return $this->sendRequest('GET', '/AmobaGame/gateCurrentGameTable', ['gameId' => $gameId]);
    }

    public function placeXOrO($gameId, $xOrO, $horizontalPosition, $verticalPosition) {
        $params = [
            'gameId' => $gameId,
            'xOrO' => $xOrO,
            'horizontalPosition' => $horizontalPosition,
            'VerticalPosition' => $verticalPosition
        ];
        return $this->sendRequest('GET', '/AmobaGame/placeXOrO', $params);
    }

    public function isWin($gameId) {
        return $this->sendRequest('GET', '/AmobaGame/isWin', ['gameId' => $gameId]);
    }

    public function deleteGame($gameId) {
        return $this->sendRequest('GET', '/AmobaGame/deleteGame', ['gameId' => $gameId]);
    }

    public function isGameExists($gameId) {
        return $this->sendRequest('GET', '/AmobaGame/IsGameExists', ['gameId' => $gameId]);
    }

    public function displayTable($gameId, $debugPassCode = null) {
        $params = ['gameId' => $gameId];
        if ($debugPassCode !== null) {
            $params['debugPassCode'] = $debugPassCode;
        }
        return $this->sendRequest('GET', '/AmobaGame/DisplayTable', $params);
    }
}

?>