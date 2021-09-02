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
                        
                            <input type="text" class="form-control" name="txtcode" autofocus  placeholder="Activation Code">
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary account-btn" name="btncheck" type="submit">اعاده تعين كلمه المرور </button>
                        </div>
                        <div class="text-center register-link">
                            <a href="login.php">العوده الى تسجيل الدخول</a>
                        </div>
                    </form>

                    <?php
        if(isset($_POST["btncheck"]))
        {
            if($_SESSION["code"]==$_POST["txtcode"])
            {
                $name=$_GET["name"];
                $id=$_GET["id"];
                header("Location:UpdatePassword.php?name=".urlencode($name)."&id={$id}"); 
            }
            else
            {
                echo "<div class='alert alert-danger'>Invaild in activation code , check your email !!! </div>";
            }
        }
    ?>


                </div>
			</div>
        </div>
    </div>


    <?php 
    include_once('includes/footer.php');
?>
  