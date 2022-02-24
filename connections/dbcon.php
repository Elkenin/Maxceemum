<?php

//                          localhost       username            password        dbname
$con = mysqli_connect('localhost', 'root', '', 'maxi');

if (!$con) {

    die("Connection failed: " . mysqli_connect_error());

}