<?php
  $db = mysqli_connect('localhost', 'root', '', 'ffpi');

$con = mysqli_connect('localhost', 'root', '', 'ffpi');

// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) 
{
	header('Location: ../logout.php');
	exit;
}
else
{
    if(isset($_POST['paybutton'])) 
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
        $id = $_POST['id'];         $balance = $_POST['balance'];
        $refor = $_POST['refor'];   $recieved = $_POST['recieved'];
        $fname = $_POST['fname'];   $amounttopay = $_POST['amounttopay'];
        $change = $_POST['change']; $paidby = $_POST['paidby'];
        $newbal = $_POST['newbal']; $mpaid = $_POST['mpaid'];
        $date = $_POST['date'];

        /*<!--=================  Checking Plan  =================--*/
        $check_account = mysqli_query($con,"SELECT * FROM `planholders_plan` WHERE `member_id` = '$id'");
        while($check = mysqli_fetch_array($check_account))
        {
            $member_status = $check['member_status'];
            $total_paid = $check['total_paid']; $number_of_paid = $check['number_of_paid'];
            $newtotal = $total_paid+$amounttopay; $newnum_of_paid = $number_of_paid+1;

        }
        /*<!-- ================= GENERATE NEW ID ================== -->*/
        $checkID = mysqli_query($con,"select * from member_payment_history where `transaction_id`='POS000000'");
        if(mysqli_num_rows($checkID)<=0)
        {
            $generateID="POS000000";
        }
        else if(mysqli_num_rows($checkID)>=1)
        {
            $checkID = mysqli_query($con,"select * from member_payment_history");
            while($check = mysqli_fetch_array($checkID))
            {
                $userID = $check['transaction_id'];
                $existingID=substr($userID,3);
                $addone = $existingID+1;
                $generateID = "POS00000".$addone;
            }
        }
        /*<!--=================  Checking History  =================--*/
        $check_account = mysqli_query($con,"INSERT INTO `member_payment_history` (transaction_id,reference_or,member_id, date, amount, paid_by, remaining) VALUES('$generateID','$refor','$id','$date','$recieved','$paidby','$newbal')");

        /*<!--=================  Updating Tables =================--*/

        
        $update_plan = mysqli_query($con, "UPDATE planholders_plan SET member_status = '1', number_of_paid = '$newnum_of_paid', total_paid= '$newtotal', remaining = '$newbal' WHERE member_id='$id'");
        array_push($successresponse, "<br>Your member Transaction ID: '$generateID'");
        }
    
}