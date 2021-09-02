<?php 

    session_start();
    if(isset($_SESSION["id"]))
    include_once('includes/header.php');
   
?>



<?php 
    include_once('includes/sidebar.php');
?>
     
<form method="post">


        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-7 col-6">
                        <h4 class="page-title"> صفحتى</h4>
                    </div>
                   
                    <div class="col-sm-5 col-6 text-right m-b-30">
                         <input type="submit" name="btndelete" class="btn btn-danger btn-rounded" value="حذف الصفحه" />
                        <a href="edit-profile.php" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> تعديل الصفحه</a>
                    </div>
                </div>
                <div class="card-box profile-header " style="height: 100vh;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
                                <div class="profile-img-wrap">
                                    <div class="profile-img">
                                        <a href="#"><img class="avatar" src="assets/img/doctor-03.jpg" alt=""></a>
                                    </div>
                                </div>


                                <?php
        include_once "classes/staff.php";
        $cust=new staff();
        $rs=$cust->GetAll();
        if($row=mysqli_fetch_assoc($rs))
        {
    ?>


                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="profile-info-left">
                                                <h3 class="user-name m-t-0 mb-0"> الاسم:  <?php echo $row["name"]; ?></h3>
                                                <small class="text-muted">  الوظيفه  : <?php echo $row["job"]; ?></small>
                                                <div class="staff-id">  ID: <?php echo $row["id"]; ?></div>
                                               
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <ul class="personal-info">
                                                <li>
                                                    <span class="title">الاسم:</span>
                                                    <span class="text"><a href="#"> <?php echo $row["name"]; ?></a></span>
                                                </li>
                                                <li>
                                                    <span class="title">الوظيفه:</span>
                                                    <span class="text"><a href="#"> <?php echo $row["job"]; ?></a></span>
                                                </li>
                                                <li>
                                                    <span class="title">رقم التليفون:</span>
                                                    <span class="text"><a href="#"> <?php echo $row["phone"]; ?></a></span>
                                                </li>
                                               
                                              
                                            </ul>
                                        </div>
                                    </div>
                                </div>


         <?php } ?>  
         
         

         <?php
 if(isset($_POST["btndelete"]))
 {
    include_once "Classes/staff.php";
	$cust=new staff();
    $msg=$cust->Delete();
	if($msg!="ok")
	 {
      echo ($msg);	         
    }
 } 

?>
                            </div>                        
                        </div>
                    </div>
                </div>
			
  </form>

    <?php 
    include_once('includes/footer.php');
?>