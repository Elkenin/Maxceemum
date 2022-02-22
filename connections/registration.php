<?php


// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) 
{
	header('Location: ../logout.php');
	exit;
}
else
{
    if(isset($_POST['submit'])) 
    {
      $username = $_SESSION['username'];
      /*<!--=================  Getting Branch of staff  =================--*/
      $checkaccount = mysqli_query($con,"SELECT * FROM `accounts` WHERE `username`='$username'");
      while($gettable = mysqli_fetch_array($checkaccount))
      {
          $userbranch = $gettable['branch'];
          $user_id = $gettable['user_id'];
      }
      /*<!--=================  Planholder Member INFO  =================--*/
          $contract_number = mysqli_real_escape_string($db, $_POST['contractno']);
          $memberid = mysqli_real_escape_string($db, $_POST['memberid']);
          $date = mysqli_real_escape_string($db, $_POST['date']);
          $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
          $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
          $middlename = mysqli_real_escape_string($db, $_POST['middlename']);
          $suffix = mysqli_real_escape_string($db, $_POST['suffix']);
          $address = mysqli_real_escape_string($db, $_POST['address']);
          $province = mysqli_real_escape_string($db, $_POST['newprovince']);
          $city = mysqli_real_escape_string($db, $_POST['newcity']);
          $barangay = mysqli_real_escape_string($db, $_POST['newbarangay']);
          $zipcode = mysqli_real_escape_string($db, $_POST['zipcode']);
          $bday = mysqli_real_escape_string($db, $_POST['bday']);
          $age = mysqli_real_escape_string($db, $_POST['age']);
          $bplace = mysqli_real_escape_string($db, $_POST['bplace']);
          $gender = mysqli_real_escape_string($db, $_POST['gender']);
          $civilstatus = mysqli_real_escape_string($db, $_POST['civilstatus']);
          $contactnumber = mysqli_real_escape_string($db, $_POST['contactnumber']);
          $email = mysqli_real_escape_string($db, $_POST['email']);
          $height = mysqli_real_escape_string($db, $_POST['height']);
          $weight = mysqli_real_escape_string($db, $_POST['weight']);
      /*<!--=================  Primary Benificiaries INFO  =================--*/
          $pname = mysqli_real_escape_string($db, $_POST['pname']);
          $prelationship = mysqli_real_escape_string($db, $_POST['prelationship']);
          $page = mysqli_real_escape_string($db, $_POST['page']);
          $pbday = mysqli_real_escape_string($db, $_POST['pbday']);
      /*<!--=================  Contingent Benificiaries INFO  =================--*/
          $cname = mysqli_real_escape_string($db, $_POST['cname']);
          $crelationship = mysqli_real_escape_string($db, $_POST['crelationship']);
          $cage = mysqli_real_escape_string($db, $_POST['cage']);
          $cbday = mysqli_real_escape_string($db, $_POST['cbday']);
      /*<!--=================  Sales Agent INFO  =================--*/
          $agentid = mysqli_real_escape_string($db, $_POST['agentid']);
          $afullname = mysqli_real_escape_string($db, $_POST['afullname']);
          $aposition = mysqli_real_escape_string($db, $_POST['aposition']);
      /*<!--=================  Plan Type INFO  =================--*/
          $plantype = mysqli_real_escape_string($db, $_POST['plantype']);
          $modeofpayment = mysqli_real_escape_string($db, $_POST['modeofpayment']);
          $amounttopay = mysqli_real_escape_string($db, $_POST['amounttopay']);
          $numberperpay = mysqli_real_escape_string($db, $_POST['numberperpay']);
          $amountperpay = mysqli_real_escape_string($db, $_POST['amountperpay']);
          $total = mysqli_real_escape_string($db, $_POST['totalamount']);
      /*<!--=================  Health Status INFO  =================--*/
          $num1 = mysqli_real_escape_string($db, $_POST['num1']);
          $num2 = mysqli_real_escape_string($db, $_POST['num2']);
          $num3 = mysqli_real_escape_string($db, $_POST['num3']);
          $num4 = mysqli_real_escape_string($db, $_POST['num4']);
          $num5 = mysqli_real_escape_string($db, $_POST['num5']);
          $num6 = mysqli_real_escape_string($db, $_POST['num6']);
          $num7 = mysqli_real_escape_string($db, $_POST['num7']);
          $num8 = mysqli_real_escape_string($db, $_POST['num8']);
          $num9 = mysqli_real_escape_string($db, $_POST['num9']);
          $num10 = mysqli_real_escape_string($db, $_POST['num10']);
          $num11 = mysqli_real_escape_string($db, $_POST['num11']);
          $num12 = mysqli_real_escape_string($db, $_POST['num12']);
          $num13 = mysqli_real_escape_string($db, $_POST['num13']);
          $num14 = mysqli_real_escape_string($db, $_POST['num14']);
          $num15 = mysqli_real_escape_string($db, $_POST['num15']);
          $num16 = mysqli_real_escape_string($db, $_POST['num16']);
          $num17 = mysqli_real_escape_string($db, $_POST['num17']);
          $num18 = mysqli_real_escape_string($db, $_POST['num18']);
          $num19 = mysqli_real_escape_string($db, $_POST['num19']);
          $num20 = mysqli_real_escape_string($db, $_POST['num20']);
    
    
      /*<!--=================  Checking Fullname  =================--*/
        $check_account = mysqli_query($con,"SELECT * FROM `planholders` WHERE `full_name` = '$firstname $middlename $lastname $suffix'");
        $gg = mysqli_num_rows($check_account);
        if($gg>=1)
      {
        array_push($errorresponse, "Planholder Credential is Already Registered");
        return;
      }
    
      else
      {
        /*<!-- ================= GENERATE NEW ID ================== -->*/
        $checkID = mysqli_query($con,"select * from planholders where `member_id`='FFPI-M20000'");
        if(mysqli_num_rows($checkID)<=0)
        {
          $generateID="FFPI-M20000";
        }
        else if(mysqli_num_rows($checkID)>=1)
        {
          $checkID = mysqli_query($con,"select * from planholders");
          while($check = mysqli_fetch_array($checkID))
          {
            $userID = $check['member_id'];
            $existingID=substr($userID,6);
            $addone = $existingID+1;
            $generateID = "FFPI-M".$addone;
          }
        }
        /*<!--=================  Processing Register Planholder  =================--*/
      	$query = "INSERT INTO planholders (branch, date_registered, member_id, contract_no, full_name,
         first_name, middle_name, last_name, suffix, address, province, city, barangay,
          zipcode, birthday, age, birthplace, gender, civil_status, contact, email, height, weight) 
        VALUES('$userbranch','$date','$generateID','$contract_number','$firstname $middlename $lastname $suffix',
         '$firstname', '$middlename', '$lastname','$suffix','$address',
         '$province','$city','$barangay','$zipcode','$bday','$age','$bplace',
         '$gender','$civilstatus','$contactnumber','$email','$height','$weight')";
        $process = mysqli_query($con, $query);
        
        /*<!--=================  Processing Plan Planholder  =================--*/
      	$query = "INSERT INTO planholders_plan (member_id,member_status, full_name,plan_type, mode_of_payment,
        monthly, number_of_payment_to_pay, amount_per_pay, total, remaining) 
       VALUES('$generateID','1','$firstname $middlename $lastname $suffix','$plantype','$modeofpayment', '$amounttopay', '$numberperpay',
        '$amountperpay', '$total', '$total')";
       $process = mysqli_query($con, $query);
       
        /*<!--=================  Processing Primary Beneficiary  =================--*/
        $query = "INSERT INTO beneficiaries (beneficiary_id, beneficiary_type, name, relationship, age, birthday, date) 
        VALUES('$generateID','Primary','$pname', '$prelationship', '$page','$pbday','$date')";
        $process = mysqli_query($con, $query);
      
        /*<!--=================  Processing Contingent Beneficiary  =================--*/
        $query = "INSERT INTO beneficiaries (beneficiary_id, beneficiary_type, name, relationship, age, birthday, date) 
        VALUES('$generateID','Contingent','$cname', '$crelationship', '$cage','$cbday','$date')";
        $process = mysqli_query($con, $query);
    
        /*<!--=================  Processing Referral Agents Info  =================--*/
        $query = "INSERT INTO referrals (full_name, referral_id, position, referred_to, plan_type, date) 
        VALUES('$afullname', '$agentid','$aposition', '$generateID', '$plantype','$date')";
        $process = mysqli_query($con, $query);
    
        /*<!--=================  Processing Referral Health Info  =================--*/
        $query = "INSERT INTO health_status (planholderid, Q1, Q2, Q3, Q4, Q5, Q6, Q7, Q8, Q9, Q10, Q11, Q12, Q13, Q14, Q15, Q16, Q17, Q18, Q19, Others) 
        VALUES('$generateID','$num1', '$num2', '$num3','$num4','$num5','$num6','$num7','$num8','$num9','$num10','$num11','$num12','$num13','$num14','$num15','$num16','$num17','$num18','$num19','$num20')";
        $process = mysqli_query($con, $query);
                
        //Getting Picture
        $file_loc = $_FILES['pic']['tmp_name'];
        $folder = "../pictures/";
        $picturename=$generateID.".png";
        if(move_uploaded_file($file_loc,$folder.$picturename))
        {
          header("Location: ../registered-successfully/?Account=$user_id&ID=$generateID");
        }
        else
        {
          $response = "Picture Cannot be Uploaded! Please Contact Administrator!";
          array_push($errorresponse, "$response");
        }
        return;
      }
      return;
    }
    else
    header("Location: ../logout.php");
}