<?php
// We need to use sessions, so you should always start sessions using the below code.
include '../dbcon.php';
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: ../logout.php');
	exit;
}
    if(isset($_SESSION["loggedin"])){
        if((time() - $_SESSION["last_login_time"]) > 300000){
            header('location: ../logout.php');
        }
		else {
            $_SESSION['last_login_time'] = time();
		}
    }
?>
<?php
//settng up variables
$yusername = $_SESSION['username'];
$getuser = mysqli_query($con,"select * from users where username = '$yusername'");
$user = mysqli_fetch_array($getuser);

// assigning variable to show
$authority = $user['user_type'];

/*<!-- ================= AUTHORIZED PERSONEL ONLY ================== -->*/
if ($authority == "admin" || $authority == "super_admin" || $authority == "user")
{
?>
<!DOCTYPE html>
<html>
<head>
  <!-- Required meta tags -->
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

<body>

    <!-- Navbar -->
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
     <div class="container-fluid">
       <a class="navbar-brand" href="#"></a>
         <img class="logo horizontal-logo" src=""> </a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav">
       <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
       </li>

       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Products
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Standard Plan</a>
        <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Platinum Plan</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Legalities</a>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact Us</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="../logout.php">Log out</a>
      </li>
      </li>
    </ul>
  </div>
 </div>
</nav>

<div class="container-fluid">
<section class="jumbotron">

<form>

<section>

<h4><b>Members Information</b></h4>

<div class="form-row">
    <div class="form-group col-md-4">
      <label for="mID">Members ID</label>
         <label class="form-control" id="mID" name="ID">
        <?php
        $addzero = 4;
        $string = "0000";
        /*<!-- ================= GENERATE NEW ID ================== -->*/
        $id = str_pad($string + 1, $addzero, 0, STR_PAD_LEFT);
        $newID = "FFPI-M2".$id;
        $checkID = mysqli_query($con,"select * from members_information");
        $check = mysqli_fetch_array($checkID);
        $userID = $check['member_id'];
        
        if($userID != $newID)
        {
            echo $newID;
        }
        else if($userID == $newID)
        {
            /*<!-- ================= ID EXISTED ================== -->*/
            $id2 = str_pad($id + 1, $addzero, 0, STR_PAD_LEFT);
            echo $updateID = "FFPI-M2".$id2;
        }
        else
        if($existingID = $userID == $newID || $userID == $newID)
        foreach($existingID as $id)
        {
            /*<!-- ================= LIMIT EXISTED ================== -->*/
            $id3 = str_pad($id + 1, $addzero++, 0, STR_PAD_LEFT);
            echo $limitID = "FFPI-M22".$id3;
        }
        ?></label>
    </div>

   <div class="form-group col-md-4">
     <label for="doa">Date of Application</label>
        <input type="date" id="date" name="date" class="form-control">
   </div>
</div>

<div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputls">Last Name</label>
         <input type="text" name="lastname" class="form-control" id="inputls">
    </div>

    <div class="form-group col-md-3">
      <label for="inputfn">First Name</label>
         <input type="text" name="firstname" class="form-control" id="inputfn">
    </div>

    <div class="form-group col-md-3">
      <label for="inputmn">Middle Name</label>
         <input type="text" name="middlename" class="form-control" id="inputmn">
    </div>

    <div class="form-group col-md-2">
      <label for="inputmn">Suffix</label>
         <input type="text" name="suffix" class="form-control" id="inputmn">
    </div>
</div>

<div class="form-row">
    
    <div class="form-group col-md-3">   
        <label for="province">Address</label>
        <input type="text" class="form-control" name="housenumber" id="inputAddress" placeholder="House No./Street">
    </div>
    
    <div class="form-group col-md-2">                  
                    <label for="province">Province</label>
                    <select id="province" class="form-control">
                    <option>Choose...</option>
                    <option <? ($temp == $value) ? "SELECTED" : "" ?> ></opton>
                    </select>
    </div>
    
    <div class="form-group col-md-2">
                    <label for="city">City/Municipality</label>
                    <select id="city" class="form-control">
                    <option>Choose Province First</option>
                    </select>
    </div>
                   
    <div class="form-group col-md-3">
                    <label for="barangay">Barangay</label>
                    <select id="barangay" class="form-control">
                    <option>Choose Municipality First</option>
                    </select>
    </div>
    <div class="form-group col-md-2">
                    <label for="barangay">Postal/Zip Code</label>
         <input type="text" class="form-control" name="zipcode" id="inputls" placeholder="Postal/Zip Code">
    </div>

</div>

<div class="form-row">
  <div class="form-group col-md-3">
    <label for="hbd">Birthday</label>
      <input type="date" id="hbd" name="date" class="form-control">
  </div>

  <div class="form-group col-md-3">
    <label for="Age">Age</label>
      <input type="text" name="age" class="form-control" id="Age">
  </div>

  <div class="form-group col-md-3">
    <label for="bp">Birthplace</label>
      <input type="text" name="birthplace" class="form-control" id="bp">
  </div>

  <div class="form-group col-md-3">
    <label for="Gender">Gender</label>
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
  </div> </div>

<div class="form-row">
  <div class="form-group col-md-3">
    <label for="cs">Civil Status</label>
      <select id="Gender" name="civilstatus" list="civilstatus"class="form-control">
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

  <div class="form-group col-md-4">
    <label for="cn">Contact No.</label>
      <input type="text" name="contactnumber" class="form-control" id="cn">
  </div>

  <div class="form-group col-md-4">
    <label for="Email">Email</label>
      <input type="text" name="email" class="form-control" id="Email">
   </div>
</div>
</section>

<hr class="my-6">
<section> <br>
<h4><b>Beneficiaries</b></h4>
<div class="form">
    <label for="primary"><i>Primary</i></label>
  </div>

<div class="form-row">
  <div class="form-group col-md-5">
    <label for="nameP">Name</label>
      <input type="text" class="form-control"name="namebata" id="primary">
  </div>

  <div class="form-group col-md-3">
    <label for="rel1">Relationship</label>
      <input type="text" class="form-control"name="relationshipbata" id="rel1">
  </div>

  <div class="form-group col-md-1">
    <label for="Age1">Age</label>
      <input type="text" class="form-control"name="agebata" id="Age1">
  </div>

  <div class="form-group col-md-3">
    <label for="hbd1">Birthday</label>
      <input type="date" id="hbd1" name="bdaybata"
class="form-control">
  </div>
</div>

<div class="form">
    <label for="Contingent"><i>Contingent</i></label>
  </div>

<div class="form-row">
  <div class="form-group col-md-5">
    <label for="nameC">Name</label>
      <input type="text" class="form-control"name="name18" id="primary">
  </div>

  <div class="form-group col-md-3">
    <label for="rel2">Relationship</label>
      <input type="text" class="form-control"name="relationship18" id="rel2">
  </div>

  <div class="form-group col-md-1">
    <label for="Age2">Age</label>
      <input type="text" class="form-control"name="age18" id="Age2">
  </div>

  <div class="form-group col-md-3">
    <label for="hbd2">Birthday</label>
      <input type="date" id="hbd2" name="bday18"
class="form-control">
  </div>
</div>
</section>

<hr class="my-6">
<section> <br>
<h4><b>Sales Agent Information</b></h4>

<div class="form-row">
  <div class="form-group col-md-3" id="">
    <label for="agent">Agent ID</label>
      <select id="select" name="agentid" list="agentid_list" class="form-control">
      <datalist id="agentid_list">
                  <option>Choose...</option>
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
      </select>
  </div>>
  <div class="form-group col-md-4">
    <label for="afn">Agent Full Name</label>
      <div id="input"class="form-control">
          <?php
          if(isset($_GET['agentid']))
      $agentid = $_GET['agentid'];
$getuser = mysqli_query($con,"SELECT * FROM `agents` WHERE `agent-id` = '$agentid'");
$user = mysqli_fetch_array($getuser);
      echo $user['fullname'];
      ?>
      </div>
  </div>

  <div class="form-group col-md-4">
    <label for="position">Position</label>
      <div id="position"
class="form-control">
          <?php
      echo $user['position'];
      ?>
</div>
  </div>

</div>
</section>

<hr class="my-6">
<section> <br>
<h4><b>Plan Type</b></h4>

<div class="form-row">
  <div class="form-group col-md-4">
    <label for="pt">Plan Type</label>
      <select id="pt" name="plantype" list="plan_type_list" class="form-control">
      <datalist id="plan_type_list">
          <?php
          $getstatus = mysqli_query($con,"select * from plan_type_list");
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
    <label for="mtp">Mode of Payment</label>
      <select id="mtp" name="monthstopay" list="months_to_pay_list" class="form-control">
      <datalist id="mode_of_payment_list">
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

  <div class="form-group col-md-2">
    <label for="ta">Amount to Pay/Month</label>
      <div type="number" id="ta" class="form-control">editmatik</div>
  </div>
  <div class="form-group col-md-2">
    <label for="ta">Total Amount</label>
      <div type="number" id="ta" class="form-control">editmatik</div>
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
        <label class="Bold">1. Any Cardiovascular Problem</label>
        <div class="form-group">
          <input class="radio-inline" name="1" type="radio">Yes
          <input class="radio-inline" name="1" type="radio" checked="true">No
        </div>
      </div>
    </div>
    <div class="form-group col-lg-5">
      <div class="d-flex justify-content-between">
        <label class="Bold">2. Cancer/Tumor/Neoplasm</label>
        <div class="form-group">
          <input class="radio-inline" name="2" type="radio">Yes
          <input class="radio-inline" name="2" type="radio" checked="true">No
        </div>
      </div>
    </div>
    <div class="form-group col-lg-5">
      <div class="d-flex justify-content-between">
        <label class="Bold">3. Diabetes Mellitus <i>(all types)</i></label>
        <div class="form-group">
          <input class="radio-inline" name="3" type="radio">Yes
          <input class="radio-inline" name="3" type="radio" checked="true">No
        </div>
      </div>
    </div>
    <div class="form-group col-lg-5">
      <div class="d-flex justify-content-between">
        <label class="Bold">4. Kidney Problem</label>
        <div class="form-group">
          <input class="radio-inline" name="4" type="radio">Yes
          <input class="radio-inline" name="4" type="radio" checked="true">No
        </div>
      </div>
    </div>
    <div class="form-group col-lg-5">
      <div class="d-flex justify-content-between">
        <label class="Bold">5. Severe Respiratory Problem</label>
        <div class="form-group">
          <input class="radio-inline" name="5" type="radio">Yes
          <input class="radio-inline" name="5" type="radio" checked="true">No
        </div>
      </div>
    </div>
    <div class="form-group col-lg-5">
      <div class="d-flex justify-content-between">
        <label class="Bold">6. Hernias</label>
        <div class="form-group">
          <input class="radio-inline" name="6" type="radio">Yes
          <input class="radio-inline" name="6" type="radio" checked="true">No
        </div>
      </div>
    </div>
    <div class="form-group col-lg-5">
      <div class="d-flex justify-content-between">
        <label class="Bold">7. Endometriosis</label>
        <div class="form-group">
          <input class="radio-inline" name="7" type="radio">Yes
          <input class="radio-inline" name="7" type="radio" checked="true">No
        </div>
      </div>
    </div>
    <div class="form-group col-lg-5">
      <div class="d-flex justify-content-between">
        <label class="Bold">8. Hemorrhoids</label>
        <div class="form-group">
          <input class="radio-inline" name="8" type="radio">Yes
          <input class="radio-inline" name="8" type="radio" checked="true">No
        </div>
      </div>
    </div>
    <div class="form-group col-lg-5">
      <div class="d-flex justify-content-between">
        <label class="Bold">9. Ear-Nose-Throat Condition Requiring Surgery</label>
        <div class="form-group">
          <input class="radio-inline" name="9" type="radio">Yes
          <input class="radio-inline" name="9" type="radio" checked="true">No
        </div>
      </div>
    </div>
    <div class="form-group col-lg-5">
      <div class="d-flex justify-content-between">
        <label class="Bold">10. Cataracts/Glaucoma</label>
        <div class="form-group">
          <input class="radio-inline" name="10" type="radio">Yes
          <input class="radio-inline" name="10" type="radio" checked="true">No
        </div>
      </div>
    </div>
    <div class="form-group col-lg-5">
      <div class="d-flex justify-content-between">
        <label class="Bold">11. Epilepsy</label>
        <div class="form-group">
          <input class="radio-inline" name="11" type="radio">Yes
          <input class="radio-inline" name="11" type="radio" checked="true">No
        </div>
      </div>
    </div>
    <div class="form-group col-lg-5">
      <div class="d-flex justify-content-between">
        <label class="Bold">12. Cirrhosis of the Liver</label>
        <div class="form-group">
          <input class="radio-inline" name="12" type="radio">Yes
          <input class="radio-inline" name="12" type="radio" checked="true">No
        </div>
      </div>
    </div>
    <div class="form-group col-lg-5">
      <div class="d-flex justify-content-between">
        <label class="Bold">13. Anal Fistulae</label>
        <div class="form-group">
          <input class="radio-inline" name="13" type="radio">Yes
          <input class="radio-inline" name="13" type="radio" checked="true">No
        </div>
      </div>
    </div>
    <div class="form-group col-lg-5">
      <div class="d-flex justify-content-between">
        <label class="Bold">14. Calculi of the Urinary System</label>
        <div class="form-group">
          <input class="radio-inline" name="14" type="radio">Yes
          <input class="radio-inline" name="14" type="radio" checked="true">No
        </div>
      </div>
    </div>
    <div class="form-group col-lg-5">
      <div class="d-flex justify-content-between">
        <label class="Bold">15. Gastric/Duodenal Ulcer</label>
        <div class="form-group">
          <input class="radio-inline" name="15" type="radio">Yes
          <input class="radio-inline" name="15" type="radio" checked="true">No
        </div>
      </div>
    </div>
    <div class="form-group col-lg-5">
      <div class="d-flex justify-content-between">
        <label class="Bold">16. Hallux Valgus</label>
        <div class="form-group">
          <input class="radio-inline" name="16" type="radio">Yes
          <input class="radio-inline" name="16" type="radio" checked="true">No
        </div>
      </div>
    </div>
    <div class="form-group col-lg-5">
      <div class="d-flex justify-content-between">
        <label class="Bold">17. Collagen Diseases</label>
        <div class="form-group">
          <input class="radio-inline" name="17" type="radio">Yes
          <input class="radio-inline" name="17" type="radio" checked="true">No
        </div>
      </div>
    </div>
    <div class="form-group col-lg-5">
      <div class="d-flex justify-content-between">
        <label class="Bold">18. Hypertension</label>
        <div class="form-group">
          <input class="radio-inline" name="18" type="radio">Yes
          <input class="radio-inline" name="18" type="radio" checked="true">No
        </div>
      </div>
    </div>
    <div class="form-group col-lg-5">
      <div class="d-flex justify-content-between">
        <label class="Bold">19. Cholecystitis/Choielithiasis</label>
        <div class="form-group">
          <input class="radio-inline" name="19" type="radio">Yes
          <input class="radio-inline" name="19" type="radio" checked="true">No
        </div>
      </div>
    </div>
    <div class="form-group col-lg-auto">
      <div class="d-flex justify-content-between">
        <label class="Bold">20. Others</label>&nbsp
        <div class="form-group">
          <input class="text"></input>
        </div>
      </div>
    </div>
  </div>
<div>&nbsp <i>The following, among others, when occurring during the first year of the coverage after the effective date, are considered Pre-Existing.</i></div>



</div>
</section>

<section class="text-center">
  <a class="btn btn-dark" href="../home/">Go Back</a>
  <button class="btn btn-dark"x type="Reset">Reset</button>
  <button class="btn btn-dark" type="Submit">Submit</button>
  <a class="btn btn-dark" href="#" role="button">Contribution Report</a>
</section>
</section>
</form>
</div>

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
<script>
    $(document).ready(function(){
		 $("#select").click("#input");
    });
</script>
</body
</html>
<?php
}
?>