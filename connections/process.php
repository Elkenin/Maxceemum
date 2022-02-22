
<!-- ========================= Error Design ========================= -->
<?php  if (count($errorresponse) > 0) : ?>

<?php foreach ($errorresponse as $error) : ?>

    <div class="form-group col-md-4" style="opacity:0;">
 <input type="text"class="form-control" id="process" value="<?php echo $error;
  ?>">
  </div>
 <!--=================== Process Response ===================-->
<script src="../../css/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="../../css/sweetalert2.min.css">
<script type="text/javascript" src="../printdesign.js"></script>
 <script>
var response = document.getElementById("process").value;
Swal.fire({
title: 'Server Response:',
text: `${response}`,
icon: 'error',
confirmButtonText: 'OK'
})
</script>
<?php endforeach ?>

<?php  endif ?>
<!-- ========================= Success Design ========================= -->
<?php  if (count($successresponse) > 0) : ?>

<?php foreach ($successresponse as $success) : ?>

    <div class="form-group col-md-4" style="opacity:0;">
 <input type="text"class="form-control" id="process" value="<?php echo $success;
  ?>">
  </div>
 <!--=================== Process Response ===================-->
<script src="../../css/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="../../css/sweetalert2.min.css">
 <script>
var response = document.getElementById("process").value;
Swal.fire({
  title: 'Success!!'+
    `${response}`,
  showDenyButton: false,
  showCancelButton: false,
  confirmButtonText: 'Print',
  //denyButtonText: `Don't save`,
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed)
  {
      
  }
})
</script>
<?php endforeach ?>

<?php  endif ?>
