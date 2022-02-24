<?php
// We need to use sessions, so you should always start sessions using the below code.
include '../connections/dbcon.php';
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) 
{
	header('Location: ../logout.php');
	exit;
}
    if(isset($_SESSION["loggedin"]))
    {
        if((time() - $_SESSION["last_login_time"]) > 30000)
        {
            header('location: ../logout.php');
        }
		    else 
        {
            $_SESSION['last_login_time'] = time();
    		}
    }
?>
<?php
//settng up variables
$yusername = $_SESSION['username'];
$getuser = mysqli_query($con,"select * from accounts where username = '$yusername'");
$user = mysqli_fetch_array($getuser);
// assigning variable to show
$authority = $user['position'];
/*<!-- ================= SUPER ADMIN PAGE ================== -->*/
if ($authority == "superagent")
{
?>

<?php
}
/*<!-- ================= ADMIN PAGE ================== -->*/
else if ($authority == "admin")
{
  header("Location: admin-registration");
}
/*<!-- ================= STAFF PAGE ================== -->*/
else if ($authority == "staff")
{
  header("Location: staff-registration");
}
?>