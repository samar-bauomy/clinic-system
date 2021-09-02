

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
                        <h4 class="page-title"> اضافه عمليه</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                    <a  class="btn btn btn-primary btn-rounded float-right" href="oprations.php"> العمليات </a>
                       
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
                                        <input class="form-control" name="name_addd" type="int">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label> رقم الحجز <span class="text-danger">*</span></label>
                                        <input class="form-control" name="name_add" type="int">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label> رقم المريض <span class="text-danger">*</span></label>
                                        <input class="form-control" name="patient" type="int">
                                    </div>
                                </div>
                             
                                
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label> نوع العمليه <span class="text-danger">*</span></label>
                                        <input class="form-control"  name="opration_add" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label> الوقت <span class="text-danger">*</span></label>
                                        <input class="form-control"  name="time_add" type="time">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label> اليوم <span class="text-danger">*</span></label>
                                        <input class="form-control"  name="day_add" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label> التاريخ <span class="text-danger">*</span></label>
                                        <input class="form-control"  name="date_add" type="date">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>  اسم دكتور التخدير  <span class="text-danger">*</span></label>
                                        <input class="form-control"  name="doctor_add" type="text">
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
     $db->RunDML("insert into oprations values(Default,'".$_POST["name_add"]."','".$_POST["patient"]."','".$_POST["opration_add"]."','".$_POST["time_add"]."','".$_POST["day_add"]."','".$_POST["date_add"]."','".$_POST["doctor_add"]."')");
    
   echo("<div class='alert alert-dark m-3'> تم الحفظ </div>");
}
if(isset($_POST["btnupdate"]))
{
    include_once('Classes/Database.php');
    $db=new Database();
     $db->RunDML("update oprations set id='".$_POST["name_addd"]."',reservation='".$_POST["name_add"]."',patient='".$_POST["patient"]."',opration='".$_POST["opration_add"]."',time='".$_POST["time_add"]."',day='".$_POST["day_add"]."',date='".$_POST["date_add"]."',doctor='".$_POST["doctor_add"]."'");
    
   echo("<div class='alert alert-dark m-3'>تم التعديل </div>");
}
if(isset($_POST["btndelete"]))
{
    include_once('Classes/Database.php');
    $db=new Database();
     $db->RunDML("delete from oprations where id='".$_POST["name_addd"]."'");
    
   echo("<div class='alert alert-dark m-3'> تم الحذف</div>"); 
}

?>
            </div>
          
            <table class="table table-border table-striped m-3 p-3">
<tr>
                                        <th>رقم العمليه</th>
										<th>رقم الحجز</th>
										<th>رقم المريض</th>
										
										<th>نوع العمليه</th>
										<th>الوقت</th>
										<th>اليوم</th>
										<th>التاريخ</th>
										<th> اسم دكتور التخدير</th>
									
										
</tr>
 
<?php
    include_once('Classes/Database.php');
    $db=new Database();
    $rsn=$db->GetData("select * from oprations");
   while($row=mysqli_fetch_assoc($rsn)) {
  
      echo("<tr>");
      echo("<td>". $row['id'] ."</td>");
     
      echo("<td>". $row['Reservation_id'] ."</td>");
      echo("<td>". $row['patient_id'] ."</td>");
     echo("<td>". $row['oprations_type'] ."</td>");
      echo("<td>". $row['time'] ."</td>");
      echo("<td>". $row['day'] ."</td>");
      echo("<td>". $row['date'] ."</td>");
      echo("<td>". $row['doctor_name'] ."</td>");
      echo("</tr>");
   }
?>
</table>
					
         </form>       
    
    
        </div>


   
<?php 
    include_once('includes/footer.php');
?>
