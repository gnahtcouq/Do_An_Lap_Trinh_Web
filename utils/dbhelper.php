<?php

require_once ('config.php');
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
    //save data into table
    // open connection to database
    $con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($con, 'UTF8');
    //insert, update, delete
    $result = mysqli_query($con, $sql);
    $data = [];
    while ($row = mysqli_fetch_array($result, 1)) {
        $data[] = $row;
    }

    //close connection
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
