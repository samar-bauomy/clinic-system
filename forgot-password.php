<?php  
    ob_start();
    include_once('includes/header.php');
    session_start();
?>


    <div class="main-wrapper account-wrapper my-5">
        <div class="account-page">
			<div class="account-center">
                <div class="account-box">
                    <form class="form-signin" method="post">
						<div class="account-logo">
                            <a href="index-2.php"><img src="assets/img/logo-dark.png" alt=""></a>
                        </div>
                        <div class="form-group">
                            <label> ادخل رقم الهاتف او الايميل  </label>
                            <input type="email" class="form-control "name="staffemail" autofocus>
                        </div>
                        <div class="form-group text-center">
                         
                          <input type="submit" name="btncheck" class="btn btn-primary account-btn">   التحقق من البريد الالكترونى او الهاتف 
                          
                        </div>
                        <div class="text-center register-link">
                            <a href="login.php">العوده الى تسجيل الدخول</a>
                        </div>




 <?php

if(isset($_POST["btncheck"])){

    include_once "Classes/staff.php";
    $cust=new staff();
    $cust->setemail($_POST["staffemail"]);
    $cust->setphone($_POST["staffemail"]);
    $rs=$cust->GetByEmail();

    if($row=mysqli_fetch_assoc($rs))
    {
        //send email
        $name=$row["name"];
        $active=rand(11111,99999);
        $_SESSION["code"]=$active;
        $id=$row["id"];
        $url="http://localhost/nti/clinic_system/activation-password.php?name=".urlencode($name)."&id={$id}";
        $msg="Dear Mr/Miss : ".$name ."<br/> Your Activation Code is : ".$active."<br/> Click her to check your activation code : ".$url;

       

        require_once "src/PHPMailer.php";
                        require_once "src/Exception.php";
                        require_once "src/SMTP.php";
                        require_once "vendor/autoload.php";
                            
                            $mail = new  PHPMailer\PHPMailer\PHPMailer();
    
                            $mail->IsSMTP();
                            //$mail->SMTPDebug = 1;
                            $mail->SMTPAuth = true;
                            $mail->SMTPSecure = 'ssl';
                            $mail->Host = "smtp.gmail.com";
                            $mail->Port = 465; // or 587
                            $mail->IsHTML(true);

                            $mail->Username = "Kasen.saad@gmail.com";
                            $mail->Password = "Killer2391998";

                            $mail->setFrom('Kasen.saad@gmail.com ', 'clinic system');
                          
                            $mail->addAddress($row["email"], "clinic system");
                            $mail->Subject = 'Forget Password - clinic system';
                            
                            $mail->Body = $msg;
                            
                            if(!$mail->send()) {
                              //  echo "Opps! For some technical reasons we couldn't able to sent you an email. We will shortly get back to you with download details.";	
                                echo "Mailer Error: " . $mail->ErrorInfo;
                            }
                            else{
                                
                                echo("<div class='alert alert-success'>Verfication Code has been sent , Check Your Email </div>");		 
                            }


    }
    else
    {
        echo "<div class='alert alert-danger'>Invaild Email / Phone !!! </div>";
    }

}

?>


                    </form>
                </div>
			</div>
        </div>
    </div>


    <?php 
    include_once('includes/footer.php');
?>
  