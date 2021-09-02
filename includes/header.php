
 <?php 
 ob_start();
session_start();

?>

<!DOCTYPE html>

<html lang="en">



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>clinic system</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
<div class="main-wrapper">
        <div class="header">
			<div class="header-left">
				<a href="index.html" class="logo">
					<img src="assets/img/logo.png" width="35" height="35" alt=""> <span>DR:anas clinic</span>
				</a>
			</div>
			<a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
        


                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img">
							<img class="rounded-circle" src="assets/img/user.jpg" width="24" alt="Admin">
							<span class="status online"></span>
						</span>


                        <!-- admin -->


                        
						<span><?php 
                        if(isset($_SESSION["id"]))
                        
                        echo  $_SESSION["name"]; ?></span>
                    </a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="profile.php">صفحتى</a>
						<a class="dropdown-item" href="edit-profile.php">تعديل الصفحه</a>
						<a class="dropdown-item" href="settings.html">الاعدادات</a>
						<a class="dropdown-item" href="logout.php">خروج</a>
					</div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="profile.php">صفحتى</a>
                    <a class="dropdown-item" href="edit-profile.php">تعديل الصفحه</a>
                    <a class="dropdown-item" href="settings.html">الاعدادات</a>
                    <a class="dropdown-item" href="logout.php">خروج</a>
                </div>
            </div>
        </div>