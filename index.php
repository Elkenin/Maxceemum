<?php include "connections/database.php";?>
<!DOCTYPE html>
<!-- SemiTech 2021 -->
<html lang="en"><!--<![endif]--><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<title>FFPI | Login</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
	<meta content="" name="description">
	<meta content="" name="author">
	
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="css/css" rel="stylesheet">
	<link href="css/jquery-ui.min.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/fontawesome-all.min.css" rel="stylesheet">
	<link href="css/ionicons.min.css" rel="stylesheet">
	<link href="css/animate.min.css" rel="stylesheet">
	<link href="css/style.min.css" rel="stylesheet">
	<link href="css/style-responsive.min.css" rel="stylesheet">
	<link href="css/default.css" rel="stylesheet" id="theme">
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="css/pace.min.js.download"></script>
	<!-- ================== END BASE JS ================== -->
</head>
  
<body class="pace-top  pace-done" style="background-color:#4e73df;"><div class="pace  pace-inactive"><div class="pace-progress" data-progress-text="100%" data-progress="99" style="width: 100%;">
  <div class="pace-progress-inner"></div>
</div>
<div class="pace-activity"></div></div>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show d-none"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<div class="login-cover">
	    <div class="login-cover-image" style="background-image: url(assets/img/login-bg/login-bg-7.jpg)" data-id="login-cover-image"></div>
	    <div class="login-cover-bg"></div>
	</div>
	<!-- begin #page-container -->
	<div id="page-container" class="fade show">
	    <!-- begin login -->
        <div class="login login-v2 animated fadeIn" data-pageload-addclass="animated fadeIn">
            <!-- begin brand -->
            <div class="login-header">
                <div class="brand">
                    <b>FFPI Login</b>
                    <small>"We Need More People Like You To Served Others Lives.</small>
                </div>
            </div>
            <!-- end brand -->
            <!-- begin login-content -->
            <div class="login-content">
				<div>
                <center><?php include "connections/errors.php"; ?></center>
</div>
                <form method="post" action="index.php" accept-charset="utf-8" class="margin-bottom-0">
                    <div class="form-group m-b-20">
                        <input type="text" class="form-control form-control-lg" placeholder="Username" id="user" required="" name="username">
                    </div>
                    <div class="form-group m-b-20">
                        <input type="password" class="form-control form-control-lg" placeholder="Password" id="pass" required="" name="password">
                    </div>
                    <div class="login-buttons">
                        <button name="login_user" type="submit" class="btn btn-success btn-block btn-lg">Login</button>
                    </div>
                </form>
            </div>
            <!-- end login-content -->
        </div>
        <!-- end login -->
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="css/jquery-3.2.1.min.js.download"></script>
	<script src="css/jquery-ui.min.js.download"></script>
	<script src="css/bootstrap.bundle.min.js.download"></script>
	<!--[if lt IE 9]>
		<script src="assets/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/crossbrowserjs/respond.min.js"></script>
		<script src="assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="css/jquery.slimscroll.min.js.download"></script>
	<script src="css/js.cookie.js.download"></script>
	<script src="css/apple.min.js.download"></script>
	<script src="css/apps.min.js.download"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="css/login-v2.demo.min.js.download"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->

</body></html>