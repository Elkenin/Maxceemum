<?php  if (count($success) > 0) : ?>

<?php foreach ($success as $successs) : ?>

<link rel="stylesheet" type="text/css" href="popupmessagecss/normalize.css">
<link rel="stylesheet" type="text/css" href="popupmessagecss/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="popupmessagecss/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="popupmessagecss/awesome-bootstrap-checkbox.css">
<link rel="stylesheet" type="text/css" href="popupmessagecss/datepicker3.css">
<link rel="stylesheet" type="text/css" href="popupmessagecss/animate.css">
<link rel="stylesheet" type="text/css" href="popupmessagecss/toastr.min.css">
<link rel="stylesheet" type="text/css" href="popupmessagecss/style.css">
<link rel="stylesheet" type="text/css" href="popupmessagecss/select2.min.css">
<link rel="stylesheet" type="text/css" href="popupmessagecss/sweetalert.css">
<link rel="stylesheet" type="text/css" href="popupmessagecss/dai.style.css">
<link rel="stylesheet" type="text/css" href="popupmessagecss/dai.theme.css">

<script type="text/javascript" src="popupmessagecss/jquery-2.1.1.js.download"></script>
<script type="text/javascript" src="popupmessagecss/jquery-ui.js.download"></script>
<script type="text/javascript" src="popupmessagecss/bootstrap.min.js.download"></script>
<script type="text/javascript" src="popupmessagecss/bootstrap-datepicker.js.download"></script>
<script type="text/javascript" src="popupmessagecss/metisMenu.js.download"></script>
<script type="text/javascript" src="popupmessagecss/jquery.slimscroll.js.download"></script>
<script type="text/javascript" src="popupmessagecss/pace.min.js.download"></script>
<script type="text/javascript" src="popupmessagecss/toastr.min.js.download"></script>
<script type="text/javascript" src="popupmessagecss/inspinia.js.download"></script>
<script type="text/javascript" src="popupmessagecss/jquery.mask.js.download"></script>
<script type="text/javascript" src="popupmessagecss/sweetalert.min.js.download"></script>
<script type="text/javascript" src="popupmessagecss/dai.main.js.download"></script>
<script type="text/javascript" src="popupmessagecss/select2.min.js.download"></script>
<script type="text/javascript" src="popupmessagecss/Chart.min.js.download"></script>
<script type="text/javascript" src="popupmessagecss/jasny-bootstrap.min.js.download"></script>

<link rel="stylesheet" type="text/css" href="popupmessagecss/normalize.css">
<link rel="stylesheet" type="text/css" href="popupmessagecss/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="popupmessagecss/animate.css">
<link rel="stylesheet" type="text/css" href="popupmessagecss/style.css">
<link rel="stylesheet" type="text/css" href="popupmessagecss/materialize.min.css">
<link rel="stylesheet" type="text/css" href="popupmessagecss/dai.login.style.css">
<link rel="stylesheet" type="text/css" href="popupmessagecss/dai.login.style.css">

<script type="text/javascript" src="popupmessagecss/materialize.min.js.download"></script>

<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">	
</head>
<body class="gray-bg stop-scrolling  pace-done"><div class="pace  pace-inactive"><div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
<div class="pace-progress-inner"></div>
</div>
<style>
a:link {
color: green;
background-color: transparent;
text-decoration: none;
}
a:visited {
color: gray;
background-color: transparent;
text-decoration: none;
}
a:hover {
color: red;
background-color: transparent;
text-decoration: underline;
}
a:active {
color: yellow;
background-color: transparent;
text-decoration: underline;
}
</style>
<div class="pace-activity"></div></div>
<div class="sweet-overlay" tabindex="-1" style="opacity: 1.11; display: block;"></div><div class="sweet-alert showSweetAlert visible" data-custom-class="" data-has-cancel-button="false" data-has-confirm-button="true" data-allow-outside-click="false" data-has-done-function="false" data-animation="pop" data-timer="null" style="display: block; margin-top: -201px;"><div class="sa-icon sa-error" style="display: none;">
<span class="sa-x-mark">
  <span class="sa-line sa-left"></span>
  <span class="sa-line sa-right"></span>
</span>
</div><div class="sa-icon sa-warning" style="display: none;">
<span class="sa-body"></span>
<span class="sa-dot"></span>
</div><div class="sa-icon sa-info" style="display: none;"></div><div class="sa-icon sa-success animate" style="display: block;">
<span class="sa-line sa-tip animateSuccessTip"></span>
<span class="sa-line sa-long animateSuccessLong"></span>

<div class="sa-placeholder"></div>
<div class="sa-fix"></div>
</div><div class="sa-icon sa-custom" style="display: none;"></div><h2><?php echo $successs ?>!</h2>
<!-- <p style="display: block;"><?php// echo $successs ?></p> -->
<fieldset>
<input type="text" tabindex="3" placeholder="">
<div class="sa-input-error"></div>
</fieldset><div class="sa-error-container">
<div class="icon">!</div>
</div><div class="sa-button-container">
<!--<button class="cancel" tabindex="2" style="display: inline-block; box-shadow: none;">Cancel</button> -->
<button class="confirm" tabindex="1" style="display: inline-block; background-color: rgb(167, 213, 234); box-shadow: rgba(174, 222, 244, 0.8) 0px 0px 2px, rgba(0, 0, 0, 0.05) 0px 0px 0px 1px inset;">OK</button>
</div></div>


</body></html>
<?php endforeach ?>

<?php  endif ?>