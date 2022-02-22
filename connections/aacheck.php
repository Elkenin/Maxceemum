<?php
if(isset($_GET['papa']))
{
    $user = $_GET['papa'];
}
if(isset($_GET['mama']))
{
    $user = $_GET['mama'];
}
    echo $user;
?>