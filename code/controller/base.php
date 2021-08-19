<?php

    function base() {
        $_rc = []; 
        $base = [ "This is the" => "base!" ];
        array_push($_rc, $base);
        return $_rc;
    }