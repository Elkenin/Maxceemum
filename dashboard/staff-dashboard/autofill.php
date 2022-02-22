<?php
include '../../connections/dbcon.php';
/*<====================== Getting Agent Info ======================>*/
if(isset($_GET['name']))
{
    $get=$_GET['name'];
    $getstatus = mysqli_query($con,"SELECT * FROM `agents` WHERE `agent-id` ='$get'");
    while($checkstatus = mysqli_fetch_array($getstatus))
    {
        $fname = $checkstatus['fullname'];
        $position = $checkstatus['position'];
    }      
    $array = array("$fname", "$position");
    $encode = json_encode($array);
    echo $encode;
}
/*<====================== Plan Typle List ======================>*/
else if(isset($_GET['amount']))
{
    $pay=$_GET['amount'];
    $type=$_GET['type'];
    $getstatus = mysqli_query($con,"SELECT * FROM `plan_type_list` WHERE `LIST` ='$type'");
    while($checkstatus = mysqli_fetch_array($getstatus))
    {
        $amount = $checkstatus['amount'];
        $monthly = $checkstatus['monthly'];
        $quarterly = $checkstatus['quarterly'];
        $semi = $checkstatus['semi-annual'];
        $annual = $checkstatus['annual'];
        $onetime = $checkstatus['onetime'];
        $total = $checkstatus['total_amount'];
    }
    /*<====================== Number of Payment List ======================>*/
    $getstatus = mysqli_query($con,"SELECT * FROM `mode_of_payment_list` WHERE `LIST` ='$pay'");
    while($check = mysqli_fetch_array($getstatus))
    {
        $numberofpayments = $check['number'];
    }
    if(strpos($pay, "Monthly")===0)
    {
        $array = array("$amount","$numberofpayments","$monthly", "$total");
        $encode = json_encode($array);
    }
    else if(strpos($pay, "Quarterly")===0)
    {
        $array = array("$amount","$numberofpayments","$quarterly", "$total");
        $encode = json_encode($array);
    }
    else if(strpos($pay, "Semi")===0)
    {
        $array = array("$amount","$numberofpayments","$semi", "$total");
        $encode = json_encode($array);
    }
    else if(strpos($pay, "Annually")===0)
    {
        $array = array("$amount","$numberofpayments","$annual", "$total");
        $encode = json_encode($array);
    }
    else if(strpos($pay, "One Time")===0)
    {
        $array = array("$amount","$numberofpayments","$onetime", "$total");
        $encode = json_encode($array);
    }
    echo $encode;
}

      ?>