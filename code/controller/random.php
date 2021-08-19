<?php

    function joke() {
        
        $client = new GuzzleHttp\Client();
        $res = $client->get('https://official-joke-api.appspot.com/random_joke');
        $json = $res->getBody(); 
        $result = json_decode($json);
        $_rc = [
            "httpResult" => $result
        ];
        return $_rc;
    }