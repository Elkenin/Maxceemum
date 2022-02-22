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
    $branch = $user['branch'];
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
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

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
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="glyphicon glyphicon-grain"></i>
                </div>
                <div class="sidebar-brand-text mx-3">ADMIN<sup></sup></div>
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
            <li class="nav-item">
              <a class="nav-link collapsed" href="../../agent">
                    <i class="fas fa-fw fa-handshake"></i>
                    <span>Agent</span>
                </a>
            </li>

            <!-- Nav Item - Payment Collapse Menu -->
            <li class="nav-item active">
              <a style="background-color:black;opacity: 0.5;"class="nav-link collapsed" href="../">
                    <i class="fas fa-fw fa-credit-card"></i>
                    <span>Payment</span>
                </a>
            </li>
            <!-- Nav Item - Logout Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="../../logout.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Logout</span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
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
                </nav>                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?php echo "$branch Branch ";?>Payment</h1>                       
                    </div>

<!-- Begin of Form -->                  
<form>

<div class="form-group row">
  <div class="form-group col-md-6">
    <b><label for="nameP">ID:</label></b>
      <input onchange="generate(this.value)" required placeholder="Enter memberID" list="members_list" class="form-control"name="id" id="id">
          <datalist id="members_list">
          <?php
          $getstatus = mysqli_query($con,"select * from planholders");
          if($getstatus) 
          {
                while($checkstatus = mysqli_fetch_array($getstatus))
                {
                  $showall = $checkstatus["member_id"];
                  echo"
                  <option>$showall</option>";
                }
          }
          ?>
          </datalist>
  </div>

  <div class="form-group col-md-6">
  <b><label for="nameP">FullName:</label></b>
      <input type="text" readonly required style="background-color:white;" class="form-control"name="fname" id="fname">
  </div>

  <div class="form-group col-md-6">
  <b><label for="nameP">Transaction Number:</label></b>
      <input type="text" readonly required value="System Generated" style="background-color:white;" class="form-control"name="tnum" id="tnum">
  </div>

  <div class="form-group col-md-6">
  <b><label for="nameP">Referrence(OR):</label></b>
        <input type="text" style="background-color:white;" class="form-control"name="refor" id="refor">
    </div>
    <div class="form-group col-md-6">
    <b><label for="nameP">Plan Type:</label></b>
        <input type="text" readonly required style="background-color:white;" class="form-control"name="ptype" id="ptype">
    </div>
    <div class="form-group col-md-6">
    <b><label for="nameP">Payment Type:</label></b>
        <input type="text" readonly required style="background-color:white;" class="form-control"name="paytype" id="paytype">
    </div>
    <div class="form-group col-md-6">
    <b><label for="nameP">Balance:</label></b>
        <input type="number" readonly required style="background-color:white;" class="form-control"name="balance" id="balance">
    </div>
    <div class="form-group col-md-6">
    <b><label for="nameP">Amount to Pay:</label></b>
        <input type="number" readonly required style="background-color:white;" class="form-control"name="amounttopay" id="amounttopay">
    </div>
    <div class="form-group col-md-6">
    <b><label for="nameP">Amount Recieved:</label></b>
        <input type="text" onchange="calculate(this.value)" required class="form-control"name="recieved" id="recieved">
    </div>
    <div class="form-group col-md-6">
    <b><label for="nameP">Change:</label></b>
        <input type="text" readonly style="background-color:white;" required class="form-control"name="change" id="change">
    </div>
    <div class="form-group col-md-6">
    <b><label for="nameP">Paid By:</label></b>
    &nbsp
        <input type="radio" required name="paidby" onclick="someone();"> Someone
    &nbsp
        <input type="radio" required name="paidby" onclick="collector();"> Collector
    <div id="selected">
        
    </div>
          <datalist id="collectors">
          <?php
          $getstatus = mysqli_query($con,"select * from collectors");
          if($getstatus) 
          {
                while($checkstatus = mysqli_fetch_array($getstatus))
                {
                  $showall = $checkstatus["collector_id"];
                  echo"
                  <option>$showall</option>";
                }
          }
          ?>
          </datalist>
    </div>
    <div class="form-group col-md-6">
    <b><label for="nameP">Remaining Balance:</label></b>
        <input type="text" readonly required style="background-color:white;" class="form-control"name="newbal" id="newbal">
    </div>
       
</div>
</section><br>

<section class="text-right">
<button class="btn btn-primary" name="paybutton" type="submit">Submit</button>
<button class="btn btn-primary" type="Reset">Reset</button
</section>
</form>  
<!-- End of Form -->
                                                                                          
                            
                    

                
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; FFPI Company</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../js/demo/chart-area-demo.js"></script>
    <script src="../../js/demo/chart-pie-demo.js"></script>
<script>
function generate(info)
{
    var webrequest=new XMLHttpRequest();
    webrequest.onreadystatechange = function()
    {
        if(info.lenght == 0)
        {
            return;
        }
        if(this.readyState == 4 && this.status == 200)
        {
            var arr = JSON.parse(this.responseText);
            document.getElementById("fname").value = arr[0];
            document.getElementById("ptype").value = arr[1];
            document.getElementById("paytype").value = arr[2];
            document.getElementById("balance").value = arr[3];
            document.getElementById("amounttopay").value = arr[4];
        }
    }
    webrequest.open("GET","autofill.php?id="+info, true);
    webrequest.send();
}
function collector()
{
    document.getElementById("selected").innerHTML = "<input type='text' required placeholder='Enter CollectorID' list='collectors' class='form-control'name='collector' id='collector'>";
    /*document.getElementById("paidby").name = 'collector';
    document.getElementById("paidby").value = document.getElementById("paidby").name;*/
}
function someone()
{
    document.getElementById("selected").innerHTML = "<input type='text' required placeholder='Enter FullName'class='form-control'name='someone' id='someone'>";
    /*document.getElementById("paidby").name = 'collector';
    document.getElementById("paidby").value = document.getElementById("paidby").name;*/
}
function calculate(info)
{
    document.getElementById("change").value = document.getElementById("recieved").value - document.getElementById("amounttopay").value;
    document.getElementById("newbal").value = document.getElementById("balance").value - document.getElementById("recieved").value;
}
    </script>
</body>
</html>
<?php
    }

    else
    header('location: ../../logout.php');
?>
