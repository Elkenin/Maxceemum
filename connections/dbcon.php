<?php

//                          localhost       username            password        dbname
$con = mysqli_connect('localhost', 'root', '', 'ffpi');

if (!$con) {

    die("Connection failed: " . mysqli_connect_error());

}