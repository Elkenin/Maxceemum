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

/*<!--=================  Search Member Information  =================--*/
else if(isset($_GET['member']))
{
    $username=$_GET['username'];
    $search=$_GET['member'];
    $checkaccount = mysqli_query($con,"SELECT * FROM `accounts` where `username`='$username'");
    while($gettable = mysqli_fetch_array($checkaccount))
    {
      $userbranch = $gettable['branch'];
    }

  $query = mysqli_query($con,"SELECT * FROM `planholders`");
  while($gettable = mysqli_fetch_array($query))
  {
      /*<--======================= Checking in member ID =======================-->*/
      $query = mysqli_query($con,"SELECT * FROM `planholders` WHERE `member_id` ='$search' AND `branch`='$userbranch'");
      if($check = mysqli_num_rows($query)==1)
      {
        while($gettable = mysqli_fetch_array($query))
        {
            $m1 = $gettable['contract_no']; $m2 =  $gettable['member_id'];  $m3 =  $gettable['date_registered'];
            $m4 = $gettable['last_name'];   $m5 = $gettable['first_name'];  $m6 = $gettable['middle_name'];
            $m7 =  $gettable['suffix'];     $m8 = $gettable['address'];     $m9 = $gettable['province'];
            $m10 =  $gettable['city'];      $m11 = $gettable['barangay'];   $m12 = $gettable['zipcode'];
            $m13 =  $gettable['birthday'];  $m14 = $gettable['age'];        $m15 = $gettable['birthplace'];
            $m16 =  $gettable['gender'];    $m17 = $gettable['civil_status'];$m18 = $gettable['contact'];
            $m19 = $gettable['email'];      $m20 = $gettable['height'];     $m21 = $gettable['weight'];
            
            /*<!--============================== Getting Beneficiaries using MemberID ==============================-->*/
            // Primary info
            $query = mysqli_query($con,"SELECT * FROM `beneficiaries` WHERE `beneficiary_id` ='$m2' AND `beneficiary_type` = 'Primary'");
            while($gettable = mysqli_fetch_array($query))
            {
                $p1 = $gettable['name'];
                $p2 = $gettable['relationship'];
                $p3 = $gettable['age'];
                $p4 = $gettable['birthday'];
            }
            // Contingent info
            $query = mysqli_query($con,"SELECT * FROM `beneficiaries` WHERE `beneficiary_id` ='$m2' AND `beneficiary_type` = 'Contingent'");
            while($gettable = mysqli_fetch_array($query))
            {
                $c1 = $gettable['name'];
                $c2 = $gettable['relationship'];
                $c3 = $gettable['age'];
                $c4 = $gettable['birthday'];
            }
            // Sales Agent info
            $query = mysqli_query($con,"SELECT * FROM `referrals` WHERE `referred_to` ='$m2'");
            while($gettable = mysqli_fetch_array($query))
            {
                $a1 = $gettable['agent_id'];
                $a2 = $gettable['full_name'];
                $a3 = $gettable['position'];
            }
            // PlanType info
            $query = mysqli_query($con,"SELECT * FROM `planholders_plan` WHERE `member_id` ='$m2'");
            while($gettable = mysqli_fetch_array($query))
            {
                $pl1 = $gettable['plan_type'];   $pl2 = $gettable['mode_of_payment'];  $pl3 = $gettable['monthly'];
                $pl4 = $gettable['number_of_payment_to_pay'];   $pl5 = $gettable['amount_per_pay'];   $pl6 = $gettable['total'];
            }

            //Health Info
            $query = mysqli_query($con,"SELECT * FROM `health_status` WHERE `planholderid` ='$m2'");
            while($gettable = mysqli_fetch_array($query))
            {
                $q1 = $gettable['Q1'];    $q8 = $gettable['Q8'];    $q15 = $gettable['Q15'];
                $q2 = $gettable['Q2'];    $q9 = $gettable['Q9'];    $q16 = $gettable['Q16'];
                $q3 = $gettable['Q3'];    $q10 = $gettable['Q10'];    $q17 = $gettable['Q17'];
                $q4 = $gettable['Q4'];    $q11 = $gettable['Q11'];    $q18 = $gettable['Q18'];
                $q5 = $gettable['Q5'];    $q12 = $gettable['Q12'];    $q19 = $gettable['Q19'];
                $q6 = $gettable['Q6'];    $q13 = $gettable['Q13'];    $q20 = $gettable['Others'];
                $q7 = $gettable['Q7'];    $q14 = $gettable['Q14'];
            }
            $array = array("$m1","$m2","$m3","$m4","$m5","$m6","$m7","$m8",
                            "$m9","$m10","$m11","$m12","$m13","$m14","$m15","$m16",
                            "$m17","$m18","$m19","$m20","$m21","$p1","$p2","$p3",
                            "$p4","$c1","$c2","$c3","$c4","$a1","$a2","$a3","$pl1",
                            "$pl2","$pl3","$pl4","$pl5","$pl6","$q1","$q2","$q3",
                            "$q4","$q5","$q6","$q7","$q8","$q9","$q10","$q11","$q12",
                            "$q13","$q14","$q15","$q16","$q17","$q18","$q19","$q20");
            $encodearray = json_encode($array);
        }
      }
      else if($check = mysqli_num_rows($query)==0)
      {
          $response = "Account not Found!";
          $array = array("$response");
          $encodearray = json_encode($array);
      }

      else
      /*<--======================= Checking in Contract Number =======================-->*/
      $query = mysqli_query($con,"SELECT * FROM `planholders` WHERE `contract_no` ='$search' AND `branch`='$userbranch'");
      if($check = mysqli_num_rows($query)==1)
      {
        while($gettable = mysqli_fetch_array($query))
        {
            $m1 = $gettable['contract_no']; $m2 =  $gettable['member_id'];  $m3 =  $gettable['date_registered'];
            $m4 = $gettable['last_name'];   $m5 = $gettable['first_name'];  $m6 = $gettable['middle_name'];
            $m7 =  $gettable['suffix']; $m8 = $gettable['address']; $m9 = $gettable['province'];
            $m10 =  $gettable['city'];  $m11 = $gettable['barangay'];   $m12 = $gettable['zipcode'];
            $m13 =  $gettable['birthday'];  $m14 = $gettable['age'];    $m15 = $gettable['birthplace'];
            $m16 =  $gettable['gender'];    $m17 = $gettable['civil_status'];   $m18 = $gettable['contact'];
            $m19 = $gettable['email'];  $m20 = $gettable['height']; $m21 = $gettable['weight'];
            
            /*<!--============================== Getting Beneficiaries using MemberID ==============================-->*/
            // Primary info
            $query = mysqli_query($con,"SELECT * FROM `beneficiaries` WHERE `beneficiary_id` ='$m2' AND `beneficiary_type` = 'Primary'");
            while($gettable = mysqli_fetch_array($query))
            {
                $p1 = $gettable['name'];
                $p2 = $gettable['relationship'];
                $p3 = $gettable['age'];
                $p4 = $gettable['birthday'];
            }
            // Contingent info
            $query = mysqli_query($con,"SELECT * FROM `beneficiaries` WHERE `beneficiary_id` ='$m2' AND `beneficiary_type` = 'Contingent'");
            while($gettable = mysqli_fetch_array($query))
            {
                $c1 = $gettable['name'];
                $c2 = $gettable['relationship'];
                $c3 = $gettable['age'];
                $c4 = $gettable['birthday'];
            }
            // Sales Agent info
            $query = mysqli_query($con,"SELECT * FROM `referrals` WHERE `referred_to` ='$m2'");
            while($gettable = mysqli_fetch_array($query))
            {
                $a1 = $gettable['agent_id'];
                $a2 = $gettable['full_name'];
                $a3 = $gettable['position'];
            }
            // PlanType info
            $query = mysqli_query($con,"SELECT * FROM `planholders_plan` WHERE `member_id` ='$m2'");
            while($gettable = mysqli_fetch_array($query))
            {
                $pl1 = $gettable['plan_type'];   $pl2 = $gettable['mode_of_payment'];  $pl3 = $gettable['monthly'];
                $pl4 = $gettable['number_of_payment_to_pay'];   $pl5 = $gettable['amount_per_pay'];   $pl6 = $gettable['total'];
            }

            //Health Info
            $query = mysqli_query($con,"SELECT * FROM `health_status` WHERE `planholderid` ='$m2'");
            while($gettable = mysqli_fetch_array($query))
            {
                $q1 = $gettable['Q1'];    $q8 = $gettable['Q8'];    $q15 = $gettable['Q15'];
                $q2 = $gettable['Q2'];    $q9 = $gettable['Q9'];    $q16 = $gettable['Q16'];
                $q3 = $gettable['Q3'];    $q10 = $gettable['Q10'];    $q17 = $gettable['Q17'];
                $q4 = $gettable['Q4'];    $q11 = $gettable['Q11'];    $q18 = $gettable['Q18'];
                $q5 = $gettable['Q5'];    $q12 = $gettable['Q12'];    $q19 = $gettable['Q19'];
                $q6 = $gettable['Q6'];    $q13 = $gettable['Q13'];    $q20 = $gettable['Others'];
                $q7 = $gettable['Q7'];    $q14 = $gettable['Q14'];
            }
            $array = array("$m1","$m2","$m3","$m4","$m5","$m6","$m7","$m8",
                            "$m9","$m10","$m11","$m12","$m13","$m14","$m15","$m16",
                            "$m17","$m18","$m19","$m20","$m21","$p1","$p2","$p3",
                            "$p4","$c1","$c2","$c3","$c4","$a1","$a2","$a3","$pl1",
                            "$pl2","$pl3","$pl4","$pl5","$pl6","$q1","$q2","$q3",
                            "$q4","$q5","$q6","$q7","$q8","$q9","$q10","$q11","$q12",
                            "$q13","$q14","$q15","$q16","$q17","$q18","$q19","$q20");
            $encodearray = json_encode($array);
        }
      }
      else if($check = mysqli_num_rows($query)==0)
      {
          $response = "Account not Found!";
          $array = array("$response");
          $encodearray = json_encode($array);
      }
  }
  echo $encodearray;
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
