<?php
    // Include breff/guzzel and other dependancies.
    require_once 'vendor/autoload.php';
    
    $__path = explode("/", $_SERVER['REQUEST_URI']);

    if(count($__path) < 3){
        $__controller = 'controller/base.php';
        $__view = 'view/base/base.php';
        $__controllerMethod = 'base';
    }else{
        //Delete the first '/'
        $__pos = strpos($_SERVER['REQUEST_URI'], "/");
        if ($__pos !== false) {
            //extract the view ( /sample/page will be --> view/sample/page.php )
            $__view = "view/" .substr_replace( $_SERVER['REQUEST_URI'], "/", $__pos, 1) .".php";
            //extract the controller at this point it ill be ( sample/page )
            $__controller = "controller/" .substr_replace( $_SERVER['REQUEST_URI'], "/", $__pos, 1);
        }
        //Convert to an array and get the last item ( page )
        $__method_arr = explode ( "/", $__controller );
        $__controllerMethod = end($__method_arr);
        
        //Remove the last item in the path ( sample/page --> sample )
        array_pop($__method_arr);
        //rebuild the path to the controller ( controller/sample.php )
        $__controller = implode ( $__method_arr, "/" ) .'.php';
        
    }
    // Incldue the controller which provides access to....
    include $__controller;
    // the methods we will call ( in this case page ), the result will be placed back in $_rc
    $_rc = call_user_func($__controllerMethod);
    // include the view, the viw shoudl ponly ever access $_rc no other scopes for data.
    include $__view;

?>