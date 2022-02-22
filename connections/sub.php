
<?php

if(isset($_POST['Account']) && isset($_POST['ID']))
{
    //session_start();  
    $connect = mysqli_connect('localhost', 'root', '', 'ffpi');
    $staff=$_POST['Account'];
    $newmember=$_POST['ID'];
    $query = mysqli_query($connect,"SELECT * FROM accounts WHERE username='$staff'");
    $check = mysqli_num_rows($query);
    if($check==1)
    {
        /*<!--======================= Getting Member Info =======================-->*/
        $query1 = mysqli_query($connect,"SELECT * FROM planholders WHERE member_id='$newmember'");
        while($gettable = mysqli_fetch_array($query1))
        {
            $date = $gettable['date_registered'];       $memid = $gettable['member_id'];
            $contract = $gettable['contract_no'];       $fname = $gettable['full_name'];
            $age = $gettable['age'];                    $prov = $gettable['province'];
            $city = $gettable['city'];                  $barangay = $gettable['barangay'];
            $zipcode = $gettable['zipcode'];            $bday = $gettable['birthday']; 
            $bplace = $gettable['birthplace'];          $gender = $gettable['gender'];
            $civilstatus = $gettable['civil_status'];   $height = $gettable['height'];
            $weight = $gettable['weight'];              $contact = $gettable['contact'];
            $email = $gettable['email'];                $branch = $gettable['branch'];
        }
        $query2 = mysqli_query($connect,"SELECT * FROM planholders_plan WHERE member_id='$newmember'");
        while($gettable = mysqli_fetch_array($query2))
        {
            $plan_type = $gettable['plan_type'];        $months_to_pay = $gettable['number_of_payment_to_pay'];
            $total = $gettable['total'];                $mode = $gettable['mode_of_payment'];
            $num_of_paid = $gettable['number_of_paid']; $total_paid = $gettable['total_paid'];
        }
        /*<!--======================= Contingent Beneficiaries Info =======================-->*/
        $query3 = mysqli_query($connect,"SELECT * FROM beneficiaries WHERE beneficiary_type='Contingent' AND beneficiary_id='$newmember'");
        while($gettable = mysqli_fetch_array($query3))
        {
            $cname = $gettable['name'];                 $cbday = $gettable['birthday'];
            $crelation = $gettable['relationship'];      $cage = $gettable['age'];
            
        }
        /*<!--======================= Primary Beneficiaries Info =======================-->*/
        $query4 = mysqli_query($connect,"SELECT * FROM beneficiaries WHERE beneficiary_type='Primary' AND beneficiary_id='$newmember'");
        while($gettable = mysqli_fetch_array($query4))
        {
            $pname = $gettable['name'];                 $pbday = $gettable['birthday'];
            $prelation = $gettable['relationship'];      $page = $gettable['age'];
            
        }
        /*<!--======================= Getting Health Info =======================-->*/
        $query5 = mysqli_query($connect,"SELECT * FROM health_status WHERE planholderid='$newmember'");
        while($gettable = mysqli_fetch_array($query5))
        {
            $Q1 = $gettable['Q1'];              $Q2 = $gettable['Q2'];
            $Q3 = $gettable['Q3'];              $Q4 = $gettable['Q4'];
            $Q5 = $gettable['Q5'];              $Q6 = $gettable['Q6'];
            $Q7 = $gettable['Q7'];              $Q8 = $gettable['Q8'];
            $Q9 = $gettable['Q9'];              $Q10 = $gettable['Q10'];
            $Q11 = $gettable['Q11'];              $Q12 = $gettable['Q12'];
            $Q13 = $gettable['Q13'];              $Q14 = $gettable['Q14'];
            $Q15 = $gettable['Q15'];              $Q16 = $gettable['Q16'];
            $Q17 = $gettable['Q17'];              $Q18 = $gettable['Q18'];
            $Q19 = $gettable['Q19'];              $Others = $gettable['Others'];
        }
        function yesno($data)
        {
            if($data==0)
            {
                $respond = "NO";
            }
            else if($data==1)
            {
                $respond = "YES";
            }
            else
            {
                $respond = "NO DATA FOUND!";
            }
            return $respond;
        }
        ?>
            
        <!DOCTYPE html>
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
        <div id="head" class="row">
        <h4 align="center"><b>Financial Freedom Plans Inc.</b></h4>
        <p align="center"><i>"We need more people like you to serve others lives"</i></p>
        <div class="col" style="text-align: right;">
        <img src="<?php $folder = "../pictures/"; echo $folder."$newmember.png";?>" style="width: 150px; height: 150px;" class="img-rounded">
        </div>
        </div>
        <div class="sub-header"><h4><b>Membership Information</b></h4>
        </div>
        <div _id="phi" class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><font font-family="Times New Roman" size="2"><b>Date of Application:</b> </div>
        </div>
        <div _id="phi" class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><b>Member ID:</b> <?php echo $newmember;?></div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><b>Contract #:</b> <?php echo $contract;?></div>
        </div>
        <div _id="phi" class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><b>Full Name: </b><?php echo $fname;?></div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><b>Age: </b><?php echo $age;?></div>
        </div>
        <div _id="phi" class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><b>Address: </b><?php echo "$prov $city $barangay $zipcode";?></div>
        </div>
        <div _id="phi" class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><b>Birthday: <?php echo $bday;?></b></div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><b>Birthplace: <?php echo $bplace;?></b></div>
        </div>
        <div _id="phi" class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><b>Gender: <?php echo $gender;?></b></div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><b>Civil Status: <?php echo $civilstatus;?></b></div>
        </div>
        <div _id="phi" class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><b>Height: <?php echo $height;?></b></div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><b>Weight: <?php echo $weight;?></b></div>
        </div>
        <div _id="phi" class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><b>Contact #: <?php echo $contact;?></b></div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><b>Email Address: <?php echo $email;?></b></div>
        </div></font>
        <div class="sub-header"><h4><b>Beneficiaries</b></h4></div>
        <div _id="bnfs" class="row" >
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><i><b>Primary</b></i></div>
        </div>
        <div _id="bnfs" class="row" >
        <font font-family="Times New Roman" size="2">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><b>Name: <?php echo $pname;?></b></div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><b>Relationship: <?php echo $prelation;?></b></div>
        </div>
        <div _id="bnfs" class="row" >
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><b>Birthday: <?php echo $pbday;?></b></div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><b>Age: <?php echo $page;?></b></div>
        </div>
        </font>
        <br>
        <div _id="bnfs" class="row" >
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><i><b>Contingent</b></i></div>
        </div>
        <div _id="bnfs" class="row" >
        <font font-family="Times New Roman" size="2">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><b>Name: <?php echo $cname;?></b></div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><b>Relationship: <?php echo $crelation;?></b></div>
        </div>
        <div _id="bnfs" class="row" >
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><b>Birthday: <?php echo $cbday;?></b></div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><b>Age: <?php echo $cage;?></b></div>
        </font>
        </div>
        <div class="sub-header"><h4><b>Plan Type</b></h4></div>
        <div _id="pt" class="row">
        <font font-family="Times New Roman" size="2">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><b>Plan Type: <?php echo $plan_type;?></b></div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><b>Months To Pay: <?php echo $months_to_pay;?></b></div>
        </div>
        <div _id="pt" class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><b>Total Amount: <?php echo $total;?></b></div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><b>Mode of Payment: <?php echo $mode;?></b></div>
        </div>
        <div _id="pt" class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><b>No. of Months Paid: <?php echo $num_of_paid;?></b></div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><b>Remaining: <?php echo $total-$total_paid;?></b></div>
        </font>
        </div>
        <div class="sub-header"><h4><b>Health Declaration</b></h4></div>
        <div> I hereby declare that I am FREE from any harmful and dreaded diseases list down below <i>(Answer with Yes or No)</i><br><i>The following, among others, when occurring during the first year of coverage after effective date are considered Pre-Existing.</i></div><br>
        <div class="row">
        <div _id="column1" class="column1">
        <font font-family="Times New Roman" size="2">
        <div class="form-row col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <div class="form-row"><b>1. Any Cardiovascular Problem: </b><?php echo yesno($Q1);?></div>
        <div class="form-row"><b>2. Cancer/Tumor/Neoplasm: </b><?php echo yesno($Q2);?></div>
        <div class="form-row"><b>3. Diabetes Mellitus <i>(all types)</i>: </b><?php echo yesno($Q3);?></div>
        <div class="form-row"><b>4. Kidney Problem: </b><?php echo yesno($Q4);?></div>
        <div class="form-row"><b>5. Severe Respiratory Problem: </b><?php echo yesno($Q5);?></div>
        <div class="form-row"><b>6. Hernias: </b><?php echo yesno($Q6);?></label>
        <div class="form-row"><b>7. Endometriosis: </b><?php echo yesno($Q7);?></div>
        <div class="form-row"><b>8. Hemorrhoids: </b><?php echo yesno($Q8);?></div>
        <div class="form-row"><b>9. Ear-Nose-Throat Condition Requiring Surgery: </b><?php echo yesno($Q9);?></div>
        <div class="form-row"><b>10. Cataracts/Glaucoma: </b><?php echo yesno($Q10);?></div>
        </div>
        </div>
        </div>
        <div class="row">
        <div _id="column2" class="column2">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <div class="form-row"><b>11. Epilepsy: </b><?php echo yesno($Q11);?></div>
        <div class="form-row"><b>12. Cirrhosis of the Liver: </b><?php echo yesno($Q12);?></div>
        <div class="form-row"><b>13. Anal Fistulae: </b><?php echo yesno($Q13);?></div>
        <div class="form-row"><b>14. Calculi of the Urinary System: </b><?php echo yesno($Q14);?><div>
        <div class="form-row"><b>15. Gastric/Duodenal Ulcer: </b><?php echo yesno($Q15);?></div>
        <div class="form-row"><b>16. Hallux Valgus: </b><?php echo yesno($Q16);?></div>
        <div class="form-row"><b>17. Collagen Diseases: </b><?php echo yesno($Q17);?></div>
        <div class="form-row"><b>18. Hypertension: </b><?php echo yesno($Q18);?></div>
        <div class="form-row"><b>19. Cholecystitis/Choielithiasis: </b><?php echo yesno($Q19);?></div>
        <div class="form-row"><b>20. Others: </b><?php echo $Others;?></div>
        </font>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </section>
        </body>
        </html>
        <script>
        window.print()
        </script>
        <?php
    }
    else if($check>1)
    {
        echo "duplicate";
    }
    else if($check==0)
    {
        echo "wala";
    }
    else
    {
        echo "";
    }
?>
<?php
}
?>