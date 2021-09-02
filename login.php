<?php 
    include_once('includes/header.php');
    session_start();
?>


    <div class="main-wrapper account-wrapper my-5">
        <div class="account-page">
			<div class="account-center">
				<div class="account-box">
                    <form method="post" class="form-signin">

      

         <?php
						 if(isset($_COOKIE['usercookie'])){
							
							$_SESSION["id"]=$_COOKIE['usercookie'];
							echo("<script> window.open('index.php', '_self')</script>");		 
						 }
						if(isset($_POST["btnlogin"]))
						{
							include_once "Classes/staff.php";
							$cust=new staff();
							$cust->setname($_POST["staffname"]);
                           // $cust->setjob($_POST["staffjob"]);
                            $cust->setpassword($_POST["staffpassword"]);
							//$cust->setphone($_POST["staffphone"]);
							
							$rs=$cust->login();
							if($row=mysqli_fetch_assoc($rs))
							{
								$_SESSION["id"]=$row["id"];
								
								$_SESSION["name"]=$row["name"];

								if(isset($_POST["chkloginme"]))
								{
									echo "ok";
									setcookie("usercookie",$_SESSION["id"],time()+60*60*24*365);
								}
                                
								 echo("<script> window.open('index.php', '_self')</script>");		 
							}
							else{
								echo "<div class='alert alert-danger'>كلمه مرور غير صالحه حاول مره اخرى </div>";
							}
						}
					?>                 




						<div class="account-logo">
                            <a href="index-2.php"><img src="assets/img/logo-dark.png" alt=""></a>
                        </div>
                        <div class="form-group">
                            <label>اسم المستخدم</label>
                            <input type="text" class="form-control"  name="staffname" required=" ">
                        </div>
                        <div class="form-group">
                            <label>الرقم السرى</label>
                            <input type="password" class="form-control"  name="staffpassword" required=" ">
                        </div>

                        <input type="checkbox" name="chkloginme" style="margin-bottom:15px;"/>
                      <span style="margin-left: 10px;"> تسجيل الدخول لى </span>


                        <div class="form-group text-right text-center text-primary">
                            <a href="forgot-password.php">نسيت رقمك السرى</a>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary account-btn  " name="btnlogin">تسجيل الدخول</button>
                        </div>
                        <div class="text-center register-link ">
                             ليس  لديك حساب ؟<a href="register.php"> تسجيل الان </a>
                        </div>
                    </form>
                </div>
			</div>
        </div>
    </div>

    
    <?php 
    include_once('includes/footer.php');
?>