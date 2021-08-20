<?php

    function page() {
        $_rc = []; 
        $mysqli = mysqli_init();
        $mysqli->real_connect("database-1.clqonggx5zd5.ap-southeast-1.rds.amazonaws.com","admin",{password},'school',3306);
        if ($mysqli->connect_errno) {
            $connVar = [ $mysqli->connect_errno => $mysqli->connect_error ];
            array_push($_rc, $connVar);
        } else {
            $studentRecords = array();
            $queryresult = mysqli_query($mysqli,"SELECT * FROM student;");
            while($cRow = mysqli_fetch_array($queryresult))
            {
                array_push($studentRecords,$cRow);
            }
            array_push($_rc, $studentRecords);
        }
        $mysqli->close();
        return $_rc;
    }
    
    function form() {
        $_rc = []; 
        return $_rc;
    }
    
    function result() {
        $_rc = [];
        array_push($_rc, $_POST);
        $mysqli = mysqli_init();
        $mysqli->real_connect("database-1.clqonggx5zd5.ap-southeast-1.rds.amazonaws.com","admin",{password},'school',3306);
        if ($mysqli->connect_errno) {
            $connVar = [ $mysqli->connect_errno => $mysqli->connect_error ];
            array_push($_rc, $connVar);
        } else {
            $queryresult = mysqli_query($mysqli,"insert into student (name) values ('".$_rc[0]['name']."')");
            if(!$queryresult)
            {
                array_push($_rc, $queryresult);
            }
        }
        $mysqli->close();
        return $_rc;
    }
