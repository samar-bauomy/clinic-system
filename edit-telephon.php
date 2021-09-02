

<?php 
    include_once('includes/header.php');
?>


   
        <!-- sidebar -->

        <?php 
    include_once('includes/sidebar.php');
        ?>
      
   

   
                <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">اضافه تليفون</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                    <a  class="btn btn btn-primary btn-rounded float-right" href="telephons.php"> التليفونات </a>
                       
                    </div>
                </div>




                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                    <form  method="post">
							<table class="table table-border table-striped custom-table datatable mb-0">
							
							<tbody>

                            <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form>
                            <div class="row">
                            <div class="col-sm-6">
                                    <div class="form-group">
                                        <label> الرقم <span class="text-danger">*</span></label>
                                        <input class="form-control" name="name_addd" type="int">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label> الاسم <span class="text-danger">*</span></label>
                                        <input class="form-control" name="name_add" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>  التخصص <span class="text-danger">*</span></label>
                                        <input class="form-control" name="specialty_add" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label> رقم تليفون العياده <span class="text-danger">*</span></label>
                                        <input class="form-control"  name="phone_add" type="integar">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label> رقم ارضى العياده <span class="text-danger">*</span></label>
                                        <input class="form-control"  name="telephone_add" type="integar">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label> الرقم الخاص <span class="text-danger">*</span></label>
                                        <input class="form-control"  name="privat_phone_add" type="integar">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>العنوان <span class="text-danger">*</span></label>
                                        <input class="form-control"  name="address_add" type="text">
                                    </div>
                                </div>
                               
                              
                             
                        <input type="submit" value="حفظ " class="btn btn-success btn-rounded" style="width:14%" name="btnsave"/>

                        <input type="submit" value="تعديل" class="btn btn-warning btn-rounded" style="width:14%" name="btnupdate"/>

                        <input type="submit" value="حذف" class="btn btn-danger btn-rounded" formnovalidate style="width:14%" name="btndelete"/>


                        
<?php

if(isset($_POST["btnsave"]))
{
    include_once('Classes/Database.php');
    $db=new Database();
     $db->RunDML("insert into telephons values(Default,'".$_POST["name_add"]."','".$_POST["specialty_add"]."','".$_POST["phone_add"]."','".$_POST["telephone_add"]."','".$_POST["privat_phone_add"]."','".$_POST["address_add"]."')");
    
   echo("<div class='alert alert-dark m-3'> تم الحفظ </div>");
}
if(isset($_POST["btnupdate"]))
{
    include_once('Classes/Database.php');
    $db=new Database();
     $db->RunDML("update telephons set id='".$_POST["name_addd"]."',name='".$_POST["name_add"]."',specialty='".$_POST["specialty_add"]."',phone='".$_POST["phone_add"]."',telephone='".$_POST["telephone_add"]."',privart='".$_POST["privat_phone_add"]."',address='".$_POST["address_add"]."'");
    
   echo("<div class='alert alert-dark m-3'>تم التعديل </div>");
}
if(isset($_POST["btndelete"]))
{
    include_once('Classes/Database.php');
    $db=new Database();
     $db->RunDML("delete from telephons where id='".$_POST["name_addd"]."'");
    
   echo("<div class='alert alert-dark m-3'> تم الحذف</div>"); 
}

?>
            </div>
          
            <table class="table table-border table-striped m-3 p-3">
<tr>
                                        <th>رقم العمليه</th>
										<th>الاسم</th>
										<th>التخصص</th>
										<th>رقم تليفون العياده</th>
										<th>رقم الارضى  العياده</th>
										<th>رقم التليفون الخاص</th>
										<th>العنوان</th>
										
										
</tr>
 
<?php
    include_once('Classes/Database.php');
    $db=new Database();
    $rsn=$db->GetData("select * from telephons");
   while($row=mysqli_fetch_assoc($rsn)) {
  
      echo("<tr>");
      echo("<td>". $row['id'] ."</td>");
      echo("<td>". $row['name'] ."</td>");
      echo("<td>". $row['specialty'] ."</td>");
      echo("<td>". $row['phone_number'] ."</td>");
      echo("<td>". $row['telephone'] ."</td>");
      echo("<td>". $row['privat_number'] ."</td>");
      echo("<td>". $row['address'] ."</td>");
      echo("</tr>");
   }
?>
</table>
					
         </form>       
    
    
        </div>


    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
<?php 
    include_once('includes/footer.php');
?>
