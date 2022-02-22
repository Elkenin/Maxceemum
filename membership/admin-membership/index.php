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
    $yusername = $_SESSION['username'];
    $getuser = mysqli_query($con,"select * from accounts where username = '$yusername'");
    $user = mysqli_fetch_array($getuser);
    // assigning variable to show
    $authority = $user['position'];
    if($authority == "admin")
    {?>
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
                        <div class="sidebar-brand-text mx-3"><?php echo $authority?><sup></sup></div>
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
                    <li class="nav-item active">
                        <a style="background-color:black;opacity: 0.5;" class="nav-link collapsed" href="../">
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
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
        
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
                            <div
                                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Check member ID"
                                        aria-label="Search" aria-describedby="basic-addon2" id="member">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" onclick="search()"id="search" type="submit">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
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
                                <h1 class="h3 mb-0 text-gray-800"><?php echo $user['branch'];?> Branch Membership</h1><input type="text" style="opacity:0;"id="username" value="<?php echo $yusername?>">
                                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                        class="fas fa-download fa-sm text-white-50"></i> Contribution Report</a>
                            </div>
        
        <!-- Begin of Form --> 
        <form method="POST" action="index.php" enctype="multipart/form-data">
          <?php include "../../connections/process.php"; ?>
                <!-- ================= DO NOT REMOVE! THIS IS FOR GETTING FULL ADDRESS OF PLANHOLDER ================== -->
                <input type="text" style="width:0px;height:0px;opacity:0;" id="newprovince" readonly name="newprovince"> 
                <input type="text" style="width:0px;height:0px;opacity:0;" id="newcity" readonly name="newcity"> 
                <input type="text" style="width:0px;height:0px;opacity:0;" id="newbarangay" readonly name="newbarangay"> 
        <div id="print">
        <section>
        <div class="form-row">
        <div class="form-group col-md-3">
              <b><label for="pcn"> Policy Contract No.</label></b>
                <input type="text" required name="contractno" id="contractno" class="form-control" id="pcn">
            </div>
            <div class="form-group col-md-3">
              <b><label for="mID">Member ID</label></b>
                 <input type="text" name="memberid" readonly placeholder="Auto Generated"id="memberid" value=""class="form-control"style="background-color:white;">
            </div>
        
           <div class="form-group col-md-3">
             <b><label for="doa">Date of Application</label></b>
                <input type="text"readonly id="date" name="date" class="form-control" readonly style="background-color:white;">
           </div>
           <div class="form-group col-md-2">
             <b><label for="doa">2x2 Picture</label></b>
                <input type="file" required id="pic" name="pic" >
            </div>
        </div>
        
        
        <div class="form-row">
            <div class="form-group col-md-3">
              <b><label for="inputls">Last Name</label></b>
                 <input type="text" required="" id="lastname" name="lastname" class="form-control" id="inputls">
            </div>
        
            <div class="form-group col-md-3">
              <b><label for="inputfn">First Name</label></b>
                 <input type="text" required id="firstname" name="firstname" class="form-control">
            </div>
        
            <div class="form-group col-md-3">
              <b><label for="inputmn">Middle Name</label></b>
                 <input type="text" required id="middlename"name="middlename" class="form-control">
            </div>
        
            <div class="form-group col-md-2">
              <b><label for="inputmn">Suffix</label></b>
                 <input type="text" placeholder="Leave if none" id="suffix" name="suffix" class="form-control">
            </div>
        </div>
        
        <div class="form-row">
            
            <div class="form-group col-md-3">   
                <b><label for="address">Address</label></b>
                <input type="text" required id="address" class="form-control" name="address"placeholder="House No./Street">
            </div>
            
            <div class="form-group col-md-2">                  
                            <b><label for="province">Province</label></b>
                            <select type="text" required id="province" name="province" class="form-control">
                            <option id="showprov" selected hidden>Choose Province First</option>
                              
                            </select>
            </div>
            
            <div class="form-group col-md-2">
                            <b><label for="city">City/Municipality</label></b>
                            <select type="text" id="city" name="city" required class="form-control">
                            <option id="showcity" selected hidden>Choose Province First</option>
                            </select>
            </div>
                           
            <div class="form-group col-md-3">
                            <b><label for="barangay">Barangay</label></b>
                            <select type="text" onchange="getaddress()" required id="barangay" name="barangay" class="form-control">
                            <option id="showbar" selected hidden>Choose Municipality First</option>
                            </select>
            </div>
            <div class="form-group col-md-2">
                            <b><label for="barangay">Postal/Zip Code</label></b>
                 <input type="number" required id="zipcode" class="form-control" name="zipcode" placeholder="Postal/Zip Code">
            </div>
        
        </div>
        
        <div class="form-row">
          <div class="form-group col-md-3">
            <b><label for="hbd">Birthday</label></b>
              <input type="date"required id="bday" name="bday" class="form-control">
          </div>
        
          <div class="form-group col-md-3">
            <b><label for="Age">Age</label></b>
              <input type="number" required id="age" name="age" class="form-control">
          </div>
        
          <div class="form-group col-md-3">
            <b><label for="bp">Birthplace</label></b>
              <input type="text" required id="bplace" name="bplace" class="form-control" id="bp">
          </div>
        
          <div class="form-group col-md-3">
            <b><label for="Gender">Gender</label></b>
              <select id="gender" required name="gender" class="form-control">
              <datalist id="gender">
                            <option required value="" selected hidden>Choose...</option>
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
          </div> </div>
        
        <div class="form-row">
          <div class="form-group col-md-3">
            <b><label for="cs">Civil Status</label></b>
              <select id="civilstatus" required name="civilstatus" list="civilstatus"class="form-control">
              <datalist id="civilstatus">
                            <option value="" selected hidden>Choose...</option>
                  <?php
                  $getstatus = mysqli_query($con,"select * from dropdown_list");
                  if($getstatus) 
                  {
                        while($checkstatus = mysqli_fetch_array($getstatus))
                        {
                          $showall = $checkstatus['civil_status_list'];
                          echo"<option>$showall</option>";
                        }
                  }
                  ?>
              </select>
          </div>
        
          <div class="form-group col-md-4">
            <b><label for="cn">Contact No.</label></b>
              <input type="text" required name="contactnumber" class="form-control" id="number">
          </div>
        
          <div class="form-group col-md-4">
            <b><label for="Email">Email</label></b>
              <input type="email" required name="email" class="form-control" id="email">
           </div>
        </div>
        
        <div class="form-row">
        <div class="form-group col-md-3">
        <b><label for="height">Height(­ft)</label></b>
        <input type="text" class="form-control"­ id="height" name="height">
        </div>
        
        <div class="form-group col-md-3">
        <b><label for="weight">Weight(­kg)</label></b>
        <input type="text" class="form-control"­ id="weight" name="weight">
        </div>
        </div>
        
        </section>
        
        <hr class="my-6">
        <section> <br>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Beneficiaries</h1>
                </div>
        <div class="form">
            <b><label for="primary"><i>Primary</i></label></b>
          </div>
        
        <div class="form-row">
          <div class="form-group col-md-5">
            <b><label for="nameP">Name</label></b>
              <input type="text" required id="pname" class="form-control"name="pname">
          </div>
        
          <div class="form-group col-md-3">
            <b><label for="rel1">Relationship</label></b>
              <input type="text" required id="prelationship" class="form-control" name="prelationship">
          </div>
        
          <div class="form-group col-md-1">
            <b><label for="Age1">Age</label></b>
              <input type="number" required id="page" class="form-control"name="page">
          </div>
        
          <div class="form-group col-md-3">
            <b><label for="hbd1">Birthday</label></b>
              <input type="date" required id="pbday" name="pbday"class="form-control">
          </div>
        </div>
        
        <div class="form">
            <b><label for="Contingent"><i>Contingent</i></label></b>
          </div>
        
        <div class="form-row">
          <div class="form-group col-md-5">
            <b><label for="nameC">Name</label></b>
              <input type="text" required id="cname" class="form-control"name="cname">
          </div>
        
          <div class="form-group col-md-3">
            <b><label for="rel2">Relationship</label></b>
              <input type="text" required id="crelationship" class="form-control"name="crelationship">
          </div>
        
          <div class="form-group col-md-1">
            <b><label for="Age2">Age</label></b>
              <input type="number" required id="cage" class="form-control"name="cage">
          </div>
        
          <div class="form-group col-md-3">
            <b><label for="hbd2">Birthday</label></b>
              <input type="date" required id="cbday" name="cbday"
        class="form-control">
          </div>
        </div>
        </section>
        
        <hr class="my-6">
        <section> <br>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Sales Agent Information</h1>
                </div>
        
        <div class="form-row">
          <div class="form-group col-md-3" id="">
            <b><label for="agent">Agent ID</label></b>
              <input onchange="getid(this.value)" type="text" placeholder="Enter Referrer ID" required id="agentid" name="agentid" list="agentid_list" style="background-color:white;"class="form-control">
              <datalist id="agentid_list">
                  <?php
                  $getstatus = mysqli_query($con,"select * from agents");
                  if($getstatus) 
                  {
                        while($checkstatus = mysqli_fetch_array($getstatus))
                        {
                          $showall = $checkstatus["agent-id"];
                          echo"
                          <option>$showall</option>";
                        }
                  }
                  ?>
              </datalist>
          </div>
          <div class="form-group col-md-4">
            <b><label for="afn">Agent Full Name</label></b>
              <input type="text" required readonly style="background-color:white;" Placeholder="Please Select AgentID"name="afullname" id="agent-fullname"class="form-control">
          </div>
        
          <div class="form-group col-md-4">
            <b><label for="position">Position</label></b>
              <input type="text" required readonly style="background-color:white;" Placeholder="Please Select AgentID" name="aposition" id="agent-position"
        class="form-control">
          </div>
        
        </div>
        </section>
        
        <hr class="my-6">
        <section> <br>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Plan Type</h1>
                </div>
        
        <div class="form-row">
          <div class="form-group col-md-4">
            <b><label for="pt">Plan Type</label></b>
              <select id="plantype" required name="plantype" list="plan_type_list" class="form-control">
              <datalist id="plan_type_list">
                            <option value="" selected hidden>Choose...</option>
                  <?php
                  $getstatus = mysqli_query($con,"select * from plan_type_list");
                  if($getstatus) 
                  {
                        while($checkstatus = mysqli_fetch_array($getstatus))
                        {
                          $showall = $checkstatus['LIST'];
                          echo"<option name='plantype'>$showall</option>";
                        }
                  }
                  ?>
              </select>
          </div>
        
          <div class="form-group col-md-4">
            <b><label for="mtp">Mode of Payment</label></b>
              <select onchange="calculate(this.value)"id="modeofpayment" required name="modeofpayment" list="months_to_pay_list" class="form-control">
              <datalist id="mode_of_payment_list">
                            <option value="" selected hidden>Choose...</option>
                  <?php
                  $getstatus = mysqli_query($con,"select * from mode_of_payment_list");
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
        
          <div class="form-group col-md-4">
            <b><label for="ta">Amount to Pay/Month</label></b>
              <input type="number" required readonly style="background-color:white;" Placeholder="Choose Mode of Payment" id="amounttopay" name="amounttopay" class="form-control">
            </div>
            
          <div class="form-group col-md-4">
            <b><label for="ta">Number of Payments to Pay</label></b>
              <input type="text" required readonly style="background-color:white;" Placeholder="Choose Mode of Payment" id="numberperpay" name="numberperpay" class="form-control">
          </div>
          <div class="form-group col-md-4">
            <b><label for="ta">Amount Per Pay</label></b>
              <input type="number" required readonly style="background-color:white;" Placeholder="Choose Mode of Payment" id="amountperpay" name="amountperpay" class="form-control">
          </div>
          <div class="form-group col-md-4">
            <b><label for="ta">Total Amount</label></b>
              <input type="number" required readonly style="background-color:white;" Placeholder="Choose Mode of Payment" id="totalamount" name="totalamount" class="form-control">
          </div>
        
        </div>
        </section>
        
        <hr class="my-6">
        <section> <br>
        <h4><b>Declaration of Health Status</b></h4>
        
        <div> I herby declare that I am free from any harmful and dreaded diseases like:</div>
        <div> (<i> Answer with Yes or No </i>) </div><br>
        
        <div class="row ">
            <div class="form-group col-lg-5">
              <div class="d-flex justify-content-between">
                <label class="Bold">1. Any Cardiovascular Problem</label></b>
                <div class="form-group">
                  <input class="radio-inline"id="yes1" name="num1" value="1" type="radio">Yes
                  <input class="radio-inline"id="no1" name="num1" value="0" type="radio">No
                </div>
              </div>
            </div>
            <div class="form-group col-lg-5">
              <div class="d-flex justify-content-between">
                <label class="Bold">2. Cancer/Tumor/Neoplasm</label></b>
                <div class="form-group">
                  <input class="radio-inline"id="yes2" name="num2" value="1" type="radio">Yes
                  <input class="radio-inline"id="no2" name="num2" value="0" type="radio">No
                </div>
              </div>
            </div>
            <div class="form-group col-lg-5">
              <div class="d-flex justify-content-between">
                <label class="Bold">3. Diabetes Mellitus <i>(all types)</i></label></b>
                <div class="form-group">
                  <input class="radio-inline"id="yes3" name="num3" value="1" type="radio">Yes
                  <input class="radio-inline"id="no3" name="num3" value="0" type="radio">No
                </div>
              </div>
            </div>
            <div class="form-group col-lg-5">
              <div class="d-flex justify-content-between">
                <label class="Bold">4. Kidney Problem</label></b>
                <div class="form-group">
                  <input class="radio-inline"id="yes4" name="num4" value="1" type="radio">Yes
                  <input class="radio-inline"id="no4" name="num4" value="0" type="radio">No
                </div>
              </div>
            </div>
            <div class="form-group col-lg-5">
              <div class="d-flex justify-content-between">
                <label class="Bold">5. Severe Respiratory Problem</label></b>
                <div class="form-group">
                  <input class="radio-inline" id="yes5" name="num5" value="1" type="radio">Yes
                  <input class="radio-inline"id="no5" name="num5" value="0" type="radio">No
                </div>
              </div>
            </div>
            <div class="form-group col-lg-5">
              <div class="d-flex justify-content-between">
                <label class="Bold">6. Hernias</label></b>
                <div class="form-group">
                  <input class="radio-inline"id="yes6" name="num6" value="1" type="radio">Yes
                  <input class="radio-inline"id="no6" name="num6" value="0" type="radio">No
                </div>
              </div>
            </div>
            <div class="form-group col-lg-5">
              <div class="d-flex justify-content-between">
                <label class="Bold">7. Endometriosis</label></b>
                <div class="form-group">
                  <input class="radio-inline"id="yes7" name="num7" value="1" type="radio">Yes
                  <input class="radio-inline"id="no7" name="num7" value="0" type="radio">No
                </div>
              </div>
            </div>
            <div class="form-group col-lg-5">
              <div class="d-flex justify-content-between">
                <label class="Bold">8. Hemorrhoids</label></b>
                <div class="form-group">
                  <input class="radio-inline"id="yes8" name="num8" value="1" type="radio">Yes
                  <input class="radio-inline"id="no8" name="num8" value="0" type="radio">No
                </div>
              </div>
            </div>
            <div class="form-group col-lg-5">
              <div class="d-flex justify-content-between">
                <label class="Bold">9. Ear-Nose-Throat Condition Requiring Surgery</label></b>
                <div class="form-group">
                  <input class="radio-inline"id="yes9" name="num9" value="1" type="radio">Yes
                  <input class="radio-inline"id="no9" name="num9" value="0" type="radio">No
                </div>
              </div>
            </div>
            <div class="form-group col-lg-5">
              <div class="d-flex justify-content-between">
                <label class="Bold">10. Cataracts/Glaucoma</label></b>
                <div class="form-group">
                  <input class="radio-inline"id="yes10" name="num10" value="1" type="radio">Yes
                  <input class="radio-inline"id="no10" name="num10" value="0" type="radio">No
                </div>
              </div>
            </div>
            <div class="form-group col-lg-5">
              <div class="d-flex justify-content-between">
                <label class="Bold">11. Epilepsy</label></b>
                <div class="form-group">
                  <input class="radio-inline"id="yes11" name="num11" value="1" type="radio">Yes
                  <input class="radio-inline"id="no11" name="num11" value="0" type="radio">No
                </div>
              </div>
            </div>
            <div class="form-group col-lg-5">
              <div class="d-flex justify-content-between">
                <label class="Bold">12. Cirrhosis of the Liver</label></b>
                <div class="form-group">
                  <input class="radio-inline"id="yes12" name="num12" value="ye1s" type="radio">Yes
                  <input class="radio-inline"id="no12" name="num12" value="0" type="radio">No
                </div>
              </div>
            </div>
            <div class="form-group col-lg-5">
              <div class="d-flex justify-content-between">
                <label class="Bold">13. Anal Fistulae</label></b>
                <div class="form-group">
                  <input class="radio-inline"id="yes13" name="num13" value="1" type="radio">Yes
                  <input class="radio-inline"id="no13" name="num13" value="0"type="radio">No
                </div>
              </div>
            </div>
            <div class="form-group col-lg-5">
              <div class="d-flex justify-content-between">
                <label class="Bold">14. Calculi of the Urinary System</label></b>
                <div class="form-group">
                  <input class="radio-inline"id="yes14" name="num14" value="1" type="radio">Yes
                  <input class="radio-inline"id="no14" name="num14" value="0" type="radio">No
                </div>
              </div>
            </div>
            <div class="form-group col-lg-5">
              <div class="d-flex justify-content-between">
                <label class="Bold">15. Gastric/Duodenal Ulcer</label></b>
                <div class="form-group">
                  <input class="radio-inline"id="yes15" name="num15" value="1" type="radio">Yes
                  <input class="radio-inline"id="no15" name="num15" value="0" type="radio">No
                </div>
              </div>
            </div>
            <div class="form-group col-lg-5">
              <div class="d-flex justify-content-between">
                <label class="Bold">16. Hallux Valgus</label></b>
                <div class="form-group">
                  <input class="radio-inline"id="yes16" name="num16" value="1" type="radio">Yes
                  <input class="radio-inline"id="no16" name="num16" value="0" type="radio">No
                </div>
              </div>
            </div>
            <div class="form-group col-lg-5">
              <div class="d-flex justify-content-between">
                <label class="Bold">17. Collagen Diseases</label></b>
                <div class="form-group">
                  <input class="radio-inline"id="yes17" name="num17" value="1" type="radio">Yes
                  <input class="radio-inline"id="no17" name="num17" value="0" type="radio">No
                </div>
              </div>
            </div>
            <div class="form-group col-lg-5">
              <div class="d-flex justify-content-between">
                <label class="Bold">18. Hypertension</label></b>
                <div class="form-group">
                  <input class="radio-inline"id="yes18" name="num18" value="1" type="radio">Yes
                  <input class="radio-inline"id="no18" name="num18" value="0" type="radio">No
                </div>
              </div>
            </div>
            <div class="form-group col-lg-5">
              <div class="d-flex justify-content-between">
                <label class="Bold">19. Cholecystitis/Choielithiasis</label></b>
                <div class="form-group">
                  <input class="radio-inline"id="yes19" name="num19" value="1"type="radio">Yes
                  <input class="radio-inline"id="no19" name="num19" value="0"type="radio">No
                </div>
              </div>
            </div>
            <div class="form-group col-lg-auto">
              <div class="d-flex justify-content-between">
                <label class="Bold">20. Others</label></b>&nbsp
                <div class="form-group">
               <textarea class="form-control" required name="num20" id="num20" rows="2" cols="40" placeholder="Type here"></textarea>
              </div>
              </div>
            </div>
          </div>
        <div>&nbsp <i>The following, among others, when occurring during the first year of the coverage after the effective date, are considered Pre-Existing.</i></div>
        
        </div>
        
        </div>
        </section>
        
        <section class="text-center">
          <button class="btn btn-primary" type="Reset">Reset</button>
          <button class="btn btn-primary"name="submit">Submit</button> 
        
        </section>
        </section>
        </div>
        <!-- ========== Auto load and Cities here! =========== -->
        <script type="text/javascript" src="../autoload.js"></script>
        <script type="text/javascript" src="../printdesign.js"></script>
            <!-- Bootstrap core JavaScript-->
            <script src="../../vendor/jquery/jquery.min.js"></script>
            <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <!-- Core plugin JavaScript-->
            <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
        
            <!-- Custom scripts for all pages-->
            <script src="../../js/sb-admin-2.min.js"></script>
        
            <script src="../../css/sweetalert2.all.min.js"></script>
        <link rel="stylesheet" href="../../css/sweetalert2.min.css">
        <!-- ========== onchange and onclick functions here! =========== -->
        <script type="text/javascript" src="../functions.js"></script>
        
            <!-- Page level plugins -->
            <script type="text/javascript"src="../../vendor/chart.js/Chart.min.js"></script>
        
            <!-- Page level custom scripts -->
            <script src="../../js/demo/chart-area-demo.js"></script>
            <script src="../../js/demo/chart-pie-demo.js"></script>
        <!-- Page level custom scripts -->
        <script src="../../js/demo/chart-area-demo.js"></script>
        <script src="../../js/demo/chart-pie-demo.js"></script>
        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        
         <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
        
        <!-- Source of Province -->
         <script type="text/javascript" src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations.js"></script>
        <script type="text/javascript"></script>
        </body>
        </html>
    <?php 
    }
    }
    }
    else
      header('location: ../../logout.php');
?>
