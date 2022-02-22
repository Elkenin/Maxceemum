<?php
include '../../connections/dbcon.php';
/*<====================== Getting Agent Info ======================>*/
if(isset($_GET['id']))
{
    $get=$_GET['id'];
    $getstatus = mysqli_query($con,"SELECT * FROM `planholders_plan` WHERE `member_id` ='$get'");
    while($checkstatus = mysqli_fetch_array($getstatus))
    {
        $fname = $checkstatus['full_name'];
        $plan_type = $checkstatus['plan_type'];
        $mode_of_payment = $checkstatus['mode_of_payment'];
        $remaining = $checkstatus['remaining'];
        $amount_per_pay = $checkstatus['amount_per_pay'];
        $number_of_paid = $checkstatus['number_of_paid'];
        $member_status= $checkstatus['member_status'];
    }  

  
    $array = array("$fname", "$plan_type", "$mode_of_payment", "$remaining", "$amount_per_pay", "$number_of_paid","$member_status");
    $encode = json_encode($array);
    echo $encode;
}
