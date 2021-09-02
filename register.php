<?php 
    include_once('includes/header.php');
?>


    <div class="main-wrapper  account-wrapper my-5">
        <div class="account-page">
            <div class="account-center">
                <div class="account-box">
                    <form method="post" class="form-signin">



                     



 <?php
						if(isset($_POST["btnreg"]))
						{
							include_once "Classes/staff.php";
							$cust=new staff();
							$cust->setname($_POST["staffname"]);
                            $cust->setjob($_POST["staffjob"]);
                            $cust->setpassword($_POST["staffpassword"]);
							$cust->setphone($_POST["staffphone"]);
							$cust->setemail($_POST["staffemail"]);
							
						
							
							
							$reg="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
							if(preg_match($reg,$_POST["staffpassword"]))
							{
					
							$msg=$cust->Add();
							if($msg=="ok")
							{
								echo "<div class='alert alert-success text-center'>تم انشاء المستخدم بنجاح </div>";
							}
							else if(strpos($msg,"staff.name"))
							{
								echo "<div class='alert alert-danger text-center'>هذا الاسم مستخدم حاول مره اخرى </div>";
							}else if(strpos($msg,"staff.phone"))
							{
								echo "<div class='alert alert-danger  text-center'>رقم الهاتف مستخدم حاول مره اخرى  </div>";
							}
							else
								{
									echo $msg;
								}
							}
							else
							{
								echo "<div class='alert alert-warning'>كلمه المرور ضعيفه !! </div>";
							}
						}	
						?> 


						<div class="account-logo">
                            <a href="index-2.php"><img src="assets/img/logo-dark.png" alt=""></a>
                        </div>
                        <div class="form-group">
                            <label>اسم المستخدم</label>
                            <input type="text" class="form-control"  name="staffname">
                        </div>
                        <select name="staffjob" class="form-control"  style="margin-bottom:15px">
                          <option value="nursing">تمريض</option>
                          <option value="secretary">سكرتيره</option>
                          <option value="doctor">طبيب </option>
                          <option value="Assistant doctor">طبيب مساعد </option>
                      </select>
                        <div class="form-group">
                            <label>الرقم السرى</label>
                            <input type="password" class="form-control"  name="staffpassword">
                        </div>
                        <div class="form-group">
                            <label>رقم الهاتف المحمول</label>
                            <input type="text" class="form-control"  name="staffphone">
                        </div>
                        <div class="form-group">
                            <label> ايميل جوجال</label>
                            <input type="email" class="form-control"  name="staffemail">
                        </div>
                     
                        <div class="form-group text-center">
                            <button class="btn btn-primary account-btn"   name="btnreg"  type="submit">تسجيل</button>
                        </div>
                        <div class="text-center login-link">
                          هل لديك حساب ؟ <a href="login.php">تسجيل الدخول</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>



</html>