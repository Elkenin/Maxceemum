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
        if(isset($_GET['Account'])&&isset($_GET['ID']))
        {
            $id = $_GET['ID'];
            $user_id = $_GET['Account'];
            $getuser = mysqli_query($con,"SELECT * FROM `accounts` WHERE `user_id` ='$user_id'");
            $getmember = mysqli_query($con,"SELECT * FROM `planholders` WHERE `member_id` ='$id'");
            $check = mysqli_num_rows($getuser);     $checkmember = mysqli_num_rows($getmember);
            if($check == 1 && $checkmember == 1)
            {
                //<--========================= Getting Member =========================-->
                $getallinfo = mysqli_query($con,"SELECT * FROM `planholders` WHERE `member_id` ='$id'");
                while($checkstatus = mysqli_fetch_array($getallinfo))
                {
                    $date = $checkstatus['date_registered'];
                    $fname = $checkstatus['full_name'];         $contract_no = $checkstatus['contract_no'];
                    $bday = $checkstatus['birthday'];           $age = $checkstatus['age'];
                    $address = $checkstatus['address'];         $province = $checkstatus['province'];
                    $city = $checkstatus['city'];               $barangay = $checkstatus['barangay'];
                    $zipcode = $checkstatus['zipcode'];         $weight = $checkstatus['weight'];
                    $birthplace = $checkstatus['birthplace'];   $gender = $checkstatus['gender'];
                    $contact = $checkstatus['contact'];         $civil_status = $checkstatus['civil_status'];
                    $email = $checkstatus['email'];             $height = $checkstatus['height'];
                    
                }
                //<--========================= Getting Member Plan Type =========================-->
                $getplan = mysqli_query($con,"SELECT * FROM `planholders_plan` WHERE `member_id` ='$id'");
                while($checkplan = mysqli_fetch_array($getplan))
                {
                    $plan_type = $checkplan['plan_type'];         $mode_of_payment = $checkplan['mode_of_payment'];
                    $total = $checkplan['total'];                 $numpayment = $checkplan['number_of_payment_to_pay'];
                }
                //<--========================= Getting Member Health Status =========================-->
                $gethealth = mysqli_query($con,"SELECT * FROM `health_status` WHERE `planholderid` ='$id'");
                while($checkhealth = mysqli_fetch_array($gethealth))
                {
                    $Q1 = $checkhealth['Q1'];           $Q2 = $checkhealth['Q2'];
                    $Q3 = $checkhealth['Q3'];           $Q4 = $checkhealth['Q4'];
                    $Q5 = $checkhealth['Q5'];           $Q6 = $checkhealth['Q6'];
                    $Q7 = $checkhealth['Q7'];           $Q8 = $checkhealth['Q8'];
                    $Q9 = $checkhealth['Q9'];           $Q10 = $checkhealth['Q10'];
                    $Q11 = $checkhealth['Q11'];          $Q12 = $checkhealth['Q12'];
                    $Q13 = $checkhealth['Q13'];          $Q14 = $checkhealth['Q14'];
                    $Q15 = $checkhealth['Q15'];          $Q16 = $checkhealth['Q16'];
                    $Q17 = $checkhealth['Q17'];          $Q18 = $checkhealth['Q18'];
                    $Q19 = $checkhealth['Q19'];          $Q20 = $checkhealth['Others'];
                }
                function convert($value)
                {
                    if($value == 0)
                    {
                        $respond = "NO";
                    }
                    else if($value == 1)
                    {
                        $respond = "YES";
                    }
                    else
                    {
                        $respond = "Unable to Read Data";
                    }
                    return $respond;
                }
                //<--========================= Getting Primary Beneficiaries =========================-->
                $getpri = mysqli_query($con,"SELECT * FROM `beneficiaries` WHERE `beneficiary_id` ='$id' AND `beneficiary_type` = 'Primary'");
                while($checkpri = mysqli_fetch_array($getpri))
                {
                    $pname = $checkpri['name'];          $prela = $checkpri['relationship'];
                    $pbday = $checkpri['birthday'];      $page = $checkpri['age'];
                    
                }
                //<--========================= Getting Contingent Beneficiaries =========================-->
                $getpri = mysqli_query($con,"SELECT * FROM `beneficiaries` WHERE `beneficiary_id` ='$id' AND `beneficiary_type` = 'Contingent'");
                while($checkpri = mysqli_fetch_array($getpri))
                {
                    $cname = $checkpri['name'];          $crela = $checkpri['relationship'];
                    $cbday = $checkpri['birthday'];      $cage = $checkpri['age'];
                    
                }
            ?>
                    <html lang="en">
                    <head>
                    <meta charset="utf-8">
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css">
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
                    <style type="text/css">
                    @page { size: A4 }
                    .sub-header{
                    margin: 10px 0 10px 0;
                    border-bottom: 0px solid #eee;
                    }
                    .column1, column2{
                    width: 100%;
                    }
                    </style>
                    </head>
                    <body class="A4">
                    <section class="sheet padding-10mm" style="margin: 0 auto;">
                    <div _id="head" class="row">
                    <h5 align="center"><b>Financial Freedom Plans Inc.</b></h5>
                    <p align="center"><i>"We need more people like you to serve others lives"</i></p>
                    <div class="col" style="text-align: right;">
                    <img src="" style="width: 150px; height: 150px;" class="img-rounded">
                    </div>
                    </div>
                    <div class="sub-header"><h4><b>Members Information</b></h4>
                    </div>
                    <div _id="phi" class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">Date of Application: <?php echo $date;?></div>
                    </div>
                    <div _id="phi" class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">Member ID: <?php echo $id;?></div>
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">Contract No.: <?php echo $contract_no;?></div>
                    </div>
                    <div _id="phi" class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">Full Name: <?php echo $fname;?></div>
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">Age: <?php echo $age;?></div>
                    </div>
                    <div _id="phi" class="row">
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">Address: <?php echo "$address $province $city $barangay";?></div>
                    </div>
                    <div _id="phi" class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">Birthday: <?php echo $bday;?></div>
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">Birthplace: <?php echo $birthplace;?></div>
                    </div>
                    <div _id="phi" class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">Gender: <?php echo $gender;?></div>
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">Civil Status: <?php echo $civil_status;?></div>
                    </div>
                    <div _id="phi" class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">Height: <?php echo $height;?></div>
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">Weight: <?php echo $weight;?></div>
                    </div>
                    <div _id="phi" class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">Contact No.: <?php echo $contact;?></div>
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">Email Address: <?php echo $email;?></div>
                    </div>
                    <div class="sub-header"><h4><b>Beneficiaries</b></h4></div>
                    <div _id="bnfs" class="row" >
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><i><b>Primary</b></i></div>
                    </div>
                    <div _id="bnfs" class="row" >
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">Name: <?php echo $pname;?></div>
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">Relationship: <?php echo $prela;?></div>
                    </div>
                    <div _id="bnfs" class="row" >
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">Birthday: <?php echo $pbday;?></div>
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">Age: <?php echo $cage;?></div>
                    </div>
                    <br>
                    <div _id="bnfs" class="row" >
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><i><b>Contingent</b></i></div>
                    </div>
                    <div _id="bnfs" class="row" >
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">Name: <?php echo $cname;?></div>
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">Relationship: <?php echo $crela;?></div>
                    </div>
                    <div _id="bnfs" class="row" >
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">Birthday: <?php echo $cbday;?></div>
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">Age: <?php echo $cage;?></div>
                    </div>
                    <div class="sub-header"><h4><b>Plan Type</b></h4></div>
                    <div _id="pt" class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">Plan Type: <?php echo $plan_type;?></div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">Mode of Payment: <?php echo $mode_of_payment;?></div>
                    </div>
                    <div _id="pt" class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">Number of Months To Pay: <?php echo $numpayment;?></div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">Total Amount: <?php echo $total;?></div>
                    </div>
                    <div class="sub-header"><h4><b>Health Declaration</b></h4></div>
                    <div> I hereby declare that I am FREE from any harmful and dreaded diseases list down below <i>(Answer with Yes or No)</i><br><i>The following, among others, when occurring during the first year of coverage after effective date are considered Pre-Existing.</i></div><br>
                    <div class="row">
                    <div _id="column1" class="column1">
                    <div class="form-row col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="form-row">1. Any Cardiovascular Problem: <?php echo convert($Q1);?></div>
                    <div class="form-row">2. Cancer/Tumor/Neoplasm: <?php echo convert($Q2);?></div>
                    <div class="form-row">3. Diabetes Mellitus <i>(all types)</i>: <?php echo convert($Q3);?></div>
                    <div class="form-row">4. Kidney Problem: <?php echo convert($Q4);?></div>
                    <div class="form-row">5. Severe Respiratory Problem: <?php echo convert($Q5);?></div>
                    <div class="form-row">6. Hernias: <?php echo convert($Q6);?></div>
                    <div class="form-row">7. Endometriosis: <?php echo convert($Q7);?></div>
                    <div class="form-row">8. Hemorrhoids: <?php echo convert($Q8);?></div>
                    <div class="form-row">9. Ear-Nose-Throat Condition Requiring Surgery: <?php echo convert($Q9);?></div>
                    <div class="form-row">10. Cataracts/Glaucoma: <?php echo convert($Q10);?></div>
                    </div>
                    </div>
                    <div class="row">
                    <div _id="column2" class="column2">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="form-row">11. Epilepsy: <?php echo convert($Q11);?></div>
                    <div class="form-row">12. Cirrhosis of the Liver.:<?php echo convert($Q12);?></div>
                    <div class="form-row">13. Anal Fistulae: <?php echo convert($Q13);?></div>
                    <div class="form-row">14. Calculi of the Urinary System: <?php echo convert($Q14);?><div>
                    <div class="form-row">15. Gastric/Duodenal Ulcer: <?php echo convert($Q15);?></div>
                    <div class="form-row">16. Hallux Valgus: <?php echo convert($Q16);?></div>
                    <div class="form-row">17. Collagen Diseases: <?php echo convert($Q17);?></div>
                    <div class="form-row">18. Hypertension. <?php echo convert($Q18);?></div>
                    <div class="form-row">19. Cholecystitis/Choielithiasis: <?php echo convert($Q19);?></div>
                    <div class="form-row">20. Others: <?php echo $Q20;?></div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </section>
                    </body>
                    </html></div>
                    <script>
                    history.replaceState(null, '', '/membership-registered/');
                    document.title = 'Registered-Successfully';
                    window.print();
                    </script>
        <?php
            }
            else
            header("Location: ../");
        }
        else
        header("Location: ../");
    }
}
else
header("Location: ../");
?>