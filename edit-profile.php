
<?php 

    session_start();
    if(isset($_SESSION["id"]))
    include_once('includes/header.php');
  
?>


<?php 
    include_once('includes/sidebar.php');
?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title"> تعديل الصفحه</h4>
                    </div>
                </div>
                <form>

                    <div class="card-box"  style="height: 100vh;">


                    <?php
						if(isset($_POST["btnupdate"]))
						{
							include_once "Classes/staff.php";
							$cust=new staff();
							$cust->setname($_POST["staffname"]);
                            $cust->setjob($_POST["staffjob"]);
                            $cust->setpassword($_POST["staffpassword"]);
							$cust->setphone($_POST["staffphone"]);
							
						
							
							
							$reg="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
							if(preg_match($reg,$_POST["staffpassword"]))
							{
					
							$msg=$cust->Update();
							if($msg=="ok")
							{
								echo "<div class='alert alert-success text-center'>تم التعديل  بنجاح </div>";
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


                    <?php
        include_once "classes/staff.php";
        $cust=new staff();
        $rs=$cust->GetAll();
        if($row=mysqli_fetch_assoc($rs))
        {
    ?>
                        <h3 class="card-title">معلومات اساسيه</h3>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="profile-img-wrap">
                                    <img class="inline-block" src="assets/img/user.jpg" alt="user">
                                    <div class="fileupload btn">
                                        <span class="btn-text">تعديل</span>
                                        <input class="upload" type="file">
                                    </div>
                                </div>
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-6">
                                        
                                            <div class="form-group form-focus">
                                                <label class="focus-label">الاسم</label>
                                                <input type="text" class="form-control floating" value="<?php echo $row["name"]; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                        <select name="staffjob" class="form-control"  style="margin-bottom:15px">
                                                
                                                <option value="nursing" <?php if($row["job"]=="nursing") echo "selected";  ?> >تمريض</option>
                                                <option value="secretary"  <?php if($row["job"]=="secretary") echo "selected";  ?> >سكرتيره</option>
                                                <option value="doctor"  <?php if($row["job"]=="doctor") echo "selected";  ?> >طبيب</option>
                                                <option value="Assistant doctor"  <?php if($row["job"]=="Assistant doctor") echo "selected";  ?>>طبيب مساعد </option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <label class="focus-label">الرقم السرى</label>
                                                <input type="password" class="form-control floating" value="<?php echo $row["password"]; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <label class="focus-label">التليفون</label>
                                                <input type="integer" class="form-control floating" value="<?php echo $row["phone"]; ?>">
                                            </div>
                                        </div>
                                      
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

   <?php } ?>


 

                    <div class="text-center m-t-20">
                    <input type="submit"  class="btn btn-primary submit-btn" name="btnupdate" class="btn btn-warning" value="حفظ"/> 
                    </div>
                </form>
        
                </div>
            </div>
        </div>
    </div>
    <?php 
    include_once('includes/footer.php');
?>