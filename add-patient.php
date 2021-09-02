

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
                        <h4 class="page-title">اعدادات  المرضى</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                    <a  class="btn btn btn-primary btn-rounded float-right" href="patients.php">المرضى </a>
                       
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
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label> الرقم <span class="text-danger">*</span></label>
                                        <input class="form-control" name="name_add" type="int">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label> الاسم <span class="text-danger">*</span></label>
                                        <input class="form-control" name="patient_name_add" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label> رقم الحجز <span class="text-danger">*</span></label>
                                        <input class="form-control"  name="reservation_add" type="int">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label> العمر <span class="text-danger">*</span></label>
                                        <input class="form-control" name="patient_age_add" type="int">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label> رقم التليفون <span class="text-danger">*</span></label>
                                        <input class="form-control" name="patient_phone_add" type="int">
                                    </div>
                                </div>
                             
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label> العنوان <span class="text-danger">*</span></label>
                                        <input class="form-control" name="patient_address_add" type="desimal">
                                    </div>
                                </div>
                             
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label> الملاحظات <span class="text-danger">*</span></label>
                                        <input class="form-control" name="nots_add" type="desimal">
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
     $db->RunDML("insert into patients values(Default,'".$_POST["patient_name_add"]."','".$_POST["reservation_add"]."','".$_POST["patient_age_add"]."','".$_POST["patient_phone_add"]."','".$_POST["patient_address_add"]."','".$_POST["nots_add"]."')");
    
   echo("<div class='alert alert-dark m-3'> تم الحفظ </div>");
}
if(isset($_POST["btnupdate"]))
{
    include_once('Classes/Database.php');
    $db=new Database();
     $db->RunDML("update patients set id='".$_POST["name_add"]."',name='".$_POST["patient_name_add"]."',reservation='".$_POST["reservation_add"]."',age='".$_POST["patient_age_add"]."',phone='".$_POST["patient_phone_add"]."',address='".$_POST["patient_address_add"]."',nots='".$_POST["nots_add"]."'");
    
   echo("<div class='alert alert-dark m-3'>تم التعديل </div>");
}
if(isset($_POST["btndelete"]))
{
    include_once('Classes/Database.php');
    $db=new Database();
     $db->RunDML("delete from patients where id='".$_POST["name_add"]."'");
    
   echo("<div class='alert alert-dark m-3'> تم الحذف</div>"); 
}

?>




            </div>
          
            <table class="table table-border table-striped m-3 p-3">
<tr>
                                        <th>رقم </th>
										<th>الاسم</th>
										<th>رقم الحجز</th>
										<th>العمر</th>
										<th>رقم التليفون</th>
									
										<th>العنوان </th>
										<th>ملاحظات</th>
										
</tr>
 
<?php
    include_once('Classes/Database.php');
    $db=new Database();
    $rsn=$db->GetData("select * from patients");
   while($row=mysqli_fetch_assoc($rsn)) {
  
      echo("<tr>");
      echo("<td>". $row['patient_id'] ."</td>");
      echo("<td>". $row['patient_name'] ."</td>");
      echo("<td>". $row['Reservation_id'] ."</td>");
      echo("<td>". $row['age'] ."</td>");
      echo("<td>". $row['phone'] ."</td>");
      echo("<td>". $row['address'] ."</td>");
      echo("<td>". $row['notes'] ."</td>");
     
      echo("</tr>");
   }
?>
</table>
					
         </form>       
    
    
        </div>


  
<?php 
    include_once('includes/footer.php');
?>
