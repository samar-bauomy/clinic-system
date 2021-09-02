

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
                        <h4 class="page-title"> اضافه حجز</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                    <a  class="btn btn btn-primary btn-rounded float-right" href="reservation.php"> الحجز </a>
                       
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
                                        <input class="form-control" name="reservation_add" type="int">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label> رقم الحجز <span class="text-danger">*</span></label>
                                        <input class="form-control" name="reservation_number" type="int">
                                    </div>
                                </div>
                             
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label> وقت الحجز <span class="text-danger">*</span></label>
                                        <input class="form-control"  name="reservation_time" type="time">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label> تاريخ الحجز <span class="text-danger">*</span></label>
                                        <input class="form-control"  name="reservation_date" type="date">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label> العمر <span class="text-danger">*</span></label>
                                        <input class="form-control"  name="reservation_age" type="integar">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label> الدفع <span class="text-danger">*</span></label>
                                        <input class="form-control"  name="reservation_payment" type="desimal">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label> ملاحظات <span class="text-danger">*</span></label>
                                        <input class="form-control"  name="reservation_notes" type="text">
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
     $db->RunDML("insert into reservation values(Default,'".$_POST["reservation_number"]."','".$_POST["reservation_time"]."','".$_POST["reservation_date"]."','".$_POST["reservation_age"]."','".$_POST["reservation_payment"]."','".$_POST["reservation_notes"]."')");
    
   echo("<div class='alert alert-dark m-3'> تم الحفظ </div>");
}
if(isset($_POST["btnupdate"]))
{
    include_once('Classes/Database.php');
    $db=new Database();
     $db->RunDML("update reservation set Reservation_id='".$_POST["reservation_add"]."',number='".$_POST["reservation_number"]."',time='".$_POST["reservation_time"]."',date='".$_POST["reservation_date"]."',age='".$_POST["reservation_age"]."',payment='".$_POST["reservation_payment"]."',notes='".$_POST["reservation_notes"]."'");
    
   echo("<div class='alert alert-dark m-3'>تم التعديل </div>");
}
if(isset($_POST["btndelete"]))
{
    include_once('Classes/Database.php');
    $db=new Database();
     $db->RunDML("delete from reservation where Reservation_id='".$_POST["reservation_add"]."'");
    
   echo("<div class='alert alert-dark m-3'> تم الحذف</div>"); 
}

?>
            </div>
          
            <table class="table table-border table-striped m-3 p-3">
<tr>
                                       <th>رقم المريض</th>
										<th>رقم الحجز</th>
										<th>وقت الحجز</th>
										<th> تاريخ الحجز</th>
										<th>العمر </th>
										<th>الدفع </th>
										<th>ملاحظات</th>
									
										
</tr>
 
<?php
    include_once('Classes/Database.php');
    $db=new Database();
    $rsn=$db->GetData("select * from reservation");
   while($row=mysqli_fetch_assoc($rsn)) {
  
      echo("<tr>");
      echo("<td>". $row['Reservation_id'] ."</td>");
      echo("<td>". $row['Reservation_number'] ."</td>");
      echo("<td>". $row['Reservation_time'] ."</td>");
      echo("<td>". $row['Reservation_date'] ."</td>");
      echo("<td>". $row['age'] ."</td>");
      echo("<td>". $row['patient_payment'] ."</td>");
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
