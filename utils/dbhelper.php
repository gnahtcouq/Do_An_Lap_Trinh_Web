<?php

require_once('config.php');
$con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

function execute($sql) {
    //save data into table
    // open connection to database
    $con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($con, 'UTF8');
    //insert, update, delete
    mysqli_query($con, $sql);

    //close connection
    mysqli_close($con);
}

function executeResult($sql) {
    // open connection to database
    $con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($con, 'UTF8');

    // insert, update, delete
    $result = mysqli_query($con, $sql);

    // check if the query execution was successful
    if ($result === false) {
        // handle the error, for example:
        echo 'Query execution failed: ' . mysqli_error($con);
        // you might want to log the error, redirect the user, or handle it in some other way
        // ...

        // close connection
        mysqli_close($con);
        return [];  // return an empty array or false, depending on your error handling strategy
    }

    $data = [];
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $data[] = $row;
    }

    // close connection
    mysqli_close($con);

    return $data;
}


function executeSingleResult($sql) {
    //save data into table
    // open connection to database
    $con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($con, 'UTF8');
    //insert, update, delete
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, 1);

    //close connection
    mysqli_close($con);

    return $row;
}

function getNumRows($sql) {
    $con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($con, 'UTF8');
    $result = mysqli_query($con, $sql);
    $numRows = mysqli_num_rows($result);
    mysqli_close($con);
    return $numRows;
}
