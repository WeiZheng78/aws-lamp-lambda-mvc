<?php

    function page() {
        $_rc = []; 
        $someVar = [ "foo" => "bar" ];
        array_push($_rc, $someVar);
        return $_rc;
    }
    
    function form() {
        $_rc = []; 
        return $_rc;
    }
    
    function result() {
        $_rc = [];
        array_push($_rc, $_POST);
        return $_rc;
    }