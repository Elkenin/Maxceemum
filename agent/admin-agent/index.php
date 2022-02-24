<?php
session_start();
include "../../connections/database.php";  
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) 
{
	header('Location: ../../logout.php');
	exit;
}
    if(isset($_SESSION["loggedin"]))
    {
        if((time() - $_SESSION["last_login_time"]) > 30000)
        {
            header('location: ../../logout.php');
        }
		    else 
        {
            $_SESSION['last_login_time'] = time();
    		}
    }
    $yusername = $_SESSION['username'];
    $getuser = mysqli_query($con,"select * from accounts where username = '$yusername'");
    $user = mysqli_fetch_array($getuser);
    // assigning variable to show
    $authority = $user['position'];
    if($authority == "admin")
    {
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Financial Freedom Plans Inc.</title>

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../css/sbadmin-2.css" rel="stylesheet">

    <!-- Custom styles for this template -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&family=Roboto&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- External CSS -->
    <link rel="stylesheet" type="text/css" href="index.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <div class="profile">
                <!--Profile Image-->
                <img src="../../img/icon.png" alt="Refrubished Employee Icon - Admin Assets Upload Id@nicepng.com" class="center">
            </div>
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="glyphicon glyphicon-grain"></i>
                </div>
                <div class="sidebar-brand-text mx-3">ADMIN-AGENT <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="../../dashboard">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Planholder Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="../../membership">
                    <i class="fas fa-fw fa-heart"></i>
                    <span>Membership</span>
                </a>
            </li>

            <!-- Nav Item - Collector Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="../../collector">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Collector</span>
                </a>
            </li>
            
            <!-- Nav Item - Agents Collapse Menu -->
            <li class="nav-item active">
              <a style="background-color:black;opacity: 0.5;"class="nav-link collapsed" href="../">
                    <i class="fas fa-fw fa-handshake"></i>
                    <span>Agent</span>
                </a>
            </li>

            <!-- Nav Item - Payment Collapse Menu -->
            <li class="nav-item">
              <a class="nav-link collapsed" href="../../payment">
                    <i class="fas fa-fw fa-credit-card"></i>
                    <span>Payment</span>
                </a>
            </li>

            <!-- Nav Item - Reports Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    <i class="fas fa-fw fa-clipboard-list"></i>
                    <span>Reports</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="..">Planholder Report</a> 
                        <a class="collapse-item" href="..">Agent Report</a> 
                        <a class="collapse-item" href="..">Payment Report</a> 
                        <a class="collapse-item" href="..">Commission Report</a> 
                        <a class="collapse-item" href="..">Collection Report</a>
                        <a class="collapse-item" href="..">Payout Report</a>                  
                    </div>
                </div>
            </li>
            <!-- Nav Item - Settings Collapse Menu -->
            <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                            aria-expanded="true" aria-controls="collapseTwo">
                            <i style="font-size:15px" class="fa">&#xf013;</i>
        
                            <span>Settings</span>
                        </a>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <a class="collapse-item" href="../../settings">Registration</a> 
                                <a class="collapse-item" href="..">Commission and Plan</a> 
                                                 
                            </div>
                        </div>
                    </li>

            <!-- Nav Item - Logout Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="../../logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>
                        <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
               <center> <button class="rounded-circle border-0" id="sidebarToggle"></button></center>
            </div>           

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>

                       <!-- Nav Item - User Information -->
                       <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="../../dashboard/" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                                <img class="img-profile rounded-circle"
                                    src="../../img/undraw_profile.svg">
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Agent`s Information</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Contribution Report</a>
                    </div>

<!-- Begin of Form -->                  
 <form>

<section>

<?php
        $generateID = "FFPI-A20000"
        /*<!-- ================= GENERATE NEW ID ================== -->
        $checkID = mysqli_query($con,"select * from agents");
        while($check = mysqli_fetch_array($checkID))
        {
          $userID = $check['agent-id'];
          $existingID=substr($userID,6);
          $addone = $existingID+1;
          $generateID = "FFPI-A".$addone;
        
        }*/
        ?>
<div class="form-shadow">
<div class="form-row">
    <div class="form-group col-md-4">
      <b><label for="mID">Agent ID</label></b>
         <input type="text" style="background-color:white;" name="memberid"readonly id="memberid"value="<?php echo $generateID ?>" class="form-control" id="mID" name="ID">
        </label></b>
    </div>

    <div class="form-group col-md-2">
    <b><label for="cs">Type of Agent</label></b>
      <select id="tyAgent" name="typeofagent" list="typeofagent" class="form-control">
      <datalist id="typeofagent">
          
          <?php
          $getstatus = mysqli_query($con,"select * from type_of_agent_list");
          if($getstatus) 
          {
                while($checkstatus = mysqli_fetch_array($getstatus))
                {
                  $showall = $checkstatus['LIST'];
                  echo"<option>$showall</option>";
                }
          }
          ?>
          <option selected>Choose...</option>
        <option>...</option>
      </select>
  </div>

 <div class="form-group col-md-2">
    <b><label for="branch">Branch</label></b>
      <select id="branch" class="form-control">
          <datalist id= "typeofbranch">  
              <?php
          $getstatus = mysqli_query($con,"select * from branch");
          if($getstatus) 
          {
                while($checkstatus = mysqli_fetch_array($getstatus))
                {
                  $showall = $checkstatus['branch'];
                  echo"<option>$showall</option>";
                }
          }
          ?>

        <option selected>Choose...</option>
        <option>...</option>
      </select>
  </div>

       <div class="form-group col-md-4">
     <b><label for="doa">Date of Application</label></b>
        <input type="date" id="date" name="date" class="form-control">
   </div>
</div>

<div class="form-row">
    <div class="form-group col-md-3">
      <b><label for="inputls">Last Name</label></b>
         <input type="text" name="lastname" class="form-control" id="inputls">
    </div>

    <div class="form-group col-md-3">
      <b><label for="inputfn">First Name</label></b>
         <input type="text" name="firstname" class="form-control" id="inputfn">
    </div>

    <div class="form-group col-md-3">
      <b><label for="inputmn">Middle Name</label></b>
         <input type="text" name="middlename" class="form-control" id="inputmn">
    </div>

    <div class="form-group col-md-2">
      <b><label for="inputmn">Suffix</label></b>
         <input type="text" name="suffix" class="form-control" id="inputmn">
    </div>
</div>

<div class="form-row">
    
    <div class="form-group col-md-3">   
        <b><label for="province">House No./Street</label></b>
        <input type="text" class="form-control" name="housenumber" id="inputAddress" placeholder="House No./Street">
    </div>
    
    <div class="form-group col-md-2">                  
                    <b><label for="province">Province</label></b>
                    <select id="province" class="form-control">
                        
                    <option>Choose...</option>
                    <option <? ($temp == $value) ? "SELECTED" : "" ?> ></opton>
                    </select>
    </div>
    
    <div class="form-group col-md-2">
                    <b><label for="city">City/Municipality</label></b>
                    <select id="city" class="form-control">
                    <option>Choose Province First</option>
                    </select>
    </div>
                   
    <div class="form-group col-md-3">
                    <b><label for="barangay">Baranggay</label></b>
                    <select id="barangay" class="form-control">
                    <option>Choose Municipality First</option>
                    </select>
    </div>
    <div class="form-group col-md-2">
                    <b><label for="barangay">Postal/Zip Code</label></b>
         <input type="text" class="form-control" name="zipcode" id="inputls" placeholder="Postal/Zip Code">
    </div>

</div>

    <div class="form-row">
  <div class="form-group col-md-3">
    <b><label for="hbd">Birthday</label></b>
      <input type="date" id="hbd" name="date" class="form-control">
  </div>

    <div class="form-group col-md-2">
    <b><label for="Age">Age</label></b>
      <input type="text" class="form-control" id="Age">
  </div>

 <div class="form-group col-md-3">
    <b><label for="cs">Civil Status</label></b>
      <select id="cs" list="civilstatus" name="civilstatus" class="form-control">
      <datalist id="civilstatus">
          <?php
          $getstatus = mysqli_query($con,"select * from civil_status_list");
          if($getstatus) 
          {
                while($checkstatus = mysqli_fetch_array($getstatus))
                {
                  $showall = $checkstatus['LIST'];
                  echo"<option>$showall</option>";
                }
          }
          ?>
      </select>
  </div>

  <div class="form-group col-md-3">
    <b><label for="cs">Gender</label></b>
      
    <select id="Gender" name="gender" class="form-control">
      <datalist id="gender">
          <?php
          $getgender = mysqli_query($con,"select * from gender_list");
          if($getgender) 
          {
                while($checkgender = mysqli_fetch_array($getgender))
                {
                  $showall = $checkgender['LIST'];
                  echo"<option>$showall</option>";
                }
          }
          ?>
      </select>
  </div>
</div>

<div class="form-row">
  <div class="form-group col-md-4">
    <b><label for="cn">Contact No.</label></b>
      <input type="text" class="form-control" id="cn">
  </div>

 <div class="form-group col-md-4">
    <b><label for="Email">Email</label></b>
      <input type="text" class="form-control" id="Email">
   </div>
</div>

<div class="form-group col-md-4">
     <b><label for="cover">Areas that you can cover:</label></b>
     <div class="textarea">
       <textarea class="form-control" id="N" rows="3" cols="6" placeholder="Type here"></textarea>
     </div>
  </div>
</section><br>
</div>
<section class="text-center">
  <button class="btn btn-primary" type="Reset">Reset</button>
  <button class="btn btn-primary" type="Submit">Submit</button>
</section>
</section>
</div>

<!-- Bootstrap core JavaScript-->
<script src="../../vendor/jquery/jquery.min.js"></script>
<script src="../../vendor/bootstrap/"></script>
<script src="../../js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../../js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="../../vendor/chart.../js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="../../js/demo/chart-area-demo.js"></script>
<script src="../../js/demo/chart-pie-demo.js"></script>
<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>

        <!-- script type="text/javascript" src="../../jquery.ph-locations.js"></script -->
        <script type="text/javascript" src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations.js"></script -->
        <script type="text/javascript">
            
            var my_handlers = {


                fill_cities: function(){

                    var province_code = $(this).val();
                    $('#city').ph_locations( 'fetch_list', [{"province_code": province_code}]);
                },


                fill_barangays: function(){

                    var city_code = $(this).val();
                    $('#barangay').ph_locations('fetch_list', [{"city_code": city_code}]);
                }
            };

            $(function(){
             
                $('#province').on('change', my_handlers.fill_cities);
                $('#city').on('change', my_handlers.fill_barangays);

               
                $('#province').ph_locations({'location_type': 'provinces'});
                $('#city').ph_locations({'location_type': 'cities'});
                $('#barangay').ph_locations({'location_type': 'barangays'});

                $('#province').ph_locations('fetch_list');
            });
        </script>
</form>
</html>
<?php
    }

    else
    header('location: ../../logout.php');
?>
