<?php

$db = mysqli_connect('localhost', 'root', '', 'ffpi');

$con = mysqli_connect('localhost', 'root', '', 'ffpi');

$errors = array(); 
$good = array();
$success = array();
$errorresponse = array();
$successresponse = array();
$modalsuccess = array();
$modalerror = array();

  /*<!--=================  Login Form  =================--*/

if (isset($_POST['login_user'])) 
{

  session_start();  
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password1 = mysqli_real_escape_string($db, $_POST['password']);
    $password = md5($password1);
    $queryusername = mysqli_query($con,"SELECT * FROM accounts WHERE username='$username'");
    $querypassword = mysqli_query($con,"SELECT * FROM accounts WHERE password='$password'");
    $queryaccount = mysqli_query($con,"SELECT * FROM accounts WHERE username='$username' AND password='$password'");

    if (mysqli_num_rows($querypassword) != 1 && mysqli_num_rows($queryusername) != 1)
    {
  	    array_push($errors, "Username and Password not found!");
    }
    
    else if (mysqli_num_rows($queryusername) != 1 && mysqli_num_rows($querypassword) == 1)
    {
  	    array_push($errors, "Wrong Username!");
    }
    
    else if (mysqli_num_rows($querypassword) != 1 && mysqli_num_rows($queryusername) == 1)
    {
  	    array_push($errors, "Wrong Password!");
    }
    
    else if (mysqli_num_rows($queryaccount) == 1)
    {
        session_regenerate_id();
    	$_SESSION['loggedin'] = TRUE;
    	$_SESSION['username'] = $username;
    	$_SESSION["last_login_time"] = time();
		header('location: dashboard/');
    }
}

  /*<!--=================  Membership Registration Form  =================--*/

if (isset($_POST['submit'])) 
{
    include "registration.php";
}
  /*<!--=================  Member POS Form  =================--*/

if (isset($_POST['paybutton'])) 
{
    include "pos.php";
}

  /*<!--=================  Collector Registration Form  =================--*/

  if (isset($_POST['collector'])) 
  {
        $username = $_SESSION['username'];
        $collector_id = mysqli_real_escape_string($db, $_POST['collector_id']);
        //$type_of_collector = mysqli_real_escape_string($db, $_POST['type_of_collector']);
        $branch = mysqli_real_escape_string($db, $_POST['branch']);
        $date_of_application = mysqli_real_escape_string($db, $_POST['date_of_application']);
        $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
        $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
        $middle_name = mysqli_real_escape_string($db, $_POST['middle_name']);
        $suffix = mysqli_real_escape_string($db, $_POST['suffix']);
        $address = mysqli_real_escape_string($db, $_POST['address']);
        $province = mysqli_real_escape_string($db, $_POST['province']);
        $city = mysqli_real_escape_string($db, $_POST['city']);
        $barangay = mysqli_real_escape_string($db, $_POST['barangay']);
        $zipcode = mysqli_real_escape_string($db, $_POST['zipcode']);
        $birthday = mysqli_real_escape_string($db, $_POST['birthday']);
        $age = mysqli_real_escape_string($db, $_POST['age']);
        $civil_status = mysqli_real_escape_string($db, $_POST['civil_status']);
        $gender = mysqli_real_escape_string($db, $_POST['gender']);
        $contact_no = mysqli_real_escape_string($db, $_POST['contact_no']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $areas_that_you_can_cover = mysqli_real_escape_string($db, $_POST['areas_that_you_can_cover']);
  
        /*<!--=================  Checking Fullname  =================--*/
        $check_account = mysqli_query($con,"SELECT * FROM `collectors` WHERE `fullname` = '$first_name $middle_name $last_name'");
        $gg = mysqli_num_rows($check_account);
        if($gg>=1)
        {
          array_push($errorresponse, "Collector Credential is Already Registered");
          return;
        }
        else
        {
          /*<!--=================  Processing Collector Information  =================--*/
          $query = "INSERT INTO collectors (collector_id, branch, date,
          fullname, suffix, address, birthday, age, civilstatus, gender,
          contactnumber, email, areas_covered) 
          VALUES('$collector_id','$branch','$date_of_application',
          '$first_name $middle_name $last_name', '$suffix','$address $province $city $barangay $zipcode',
          '$birthday', '$age', '$civil_status', '$gender', '$contact_no', '$email', '$areas_that_you_can_cover')";
          $process = mysqli_query($con, $query);
          array_push($successresponse, "Congratulations! Collector is now Registered!
          CollectorID: $collector_id");
        }
          /*<!--=================  Agent Submit Information  =================--*/
        if (isset($_POST['agent_submit'])) 
          {
    
            $agent_id = mysqli_real_escape_string($db, $_POST['memberid']);
            $agent_id = substr($agent_id, 6, strlen($agent_id));
            echo $agent_id;
   
            $fullname = mysqli_real_escape_string($db, $_POST['lastname']) . ", " . mysqli_real_escape_string($db, $_POST['firstname']) . " " . mysqli_real_escape_string($db, $_POST['middlename']);
            $position = mysqli_real_escape_string($db, $_POST['Position']);
            $email = mysqli_real_escape_string($db, $_POST['Email']);


            $query = "INSERT INTO agents (agent_id, fullname, position, email) VALUES ('$agent_id', '$fullname','$position', '$email')";
            $process = mysqli_query($con, $query);
            array_push($successresponse, "Congratulations! Agent is now Registered! Agent: $agent_id");
          }
}
  