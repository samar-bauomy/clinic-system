

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
                        <h4 class="page-title">اضافه وصل ضريبه </h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                    <a  class="btn btn btn-primary btn-rounded float-right" href="taxes.php"> الضرائب </a>
                       
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
                                        <label>  اسم الفاتوره <span class="text-danger">*</span></label>
                                        <input class="form-control" name="taxes_name_add" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label> التاريخ <span class="text-danger">*</span></label>
                                        <input class="form-control"  name="taxes_date_add" type="date">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label> القيمه <span class="text-danger">*</span></label>
                                        <input class="form-control" name="taxes_payment_add" type="desimal">
                                    </div>
                             
                        <input type="submit" value="حفظ " class="btn btn-success btn-rounded" style="width:14%" name="btnsave"/>

                        <input type="submit" value="تعديل" class="btn btn-warning btn-rounded" style="width:14%" name="btnupdate"/>

                        <input type="submit" value="حذف" class="btn btn-danger btn-rounded" formnovalidate style="width:14%" name="btndelete"/>


                        
<?php

if(isset($_POST["btnsave"]))
{
    include_once('Classes/Database.php');
    $db=new Database();
     $db->RunDML("insert into taxes values(Default,'".$_POST["taxes_name_add"]."','".$_POST["taxes_date_add"]."','".$_POST["taxes_payment_add"]."')");
    
   echo("<div class='alert alert-dark m-3'> تم الحفظ </div>");
}
if(isset($_POST["btnupdate"]))
{
    include_once('Classes/Database.php');
    $db=new Database();
     $db->RunDML("update taxes set id='".$_POST["name_add"]."',name='".$_POST["taxes_name_add"]."',date='".$_POST["taxes_date_add"]."',value='".$_POST["taxes_payment_add"]."'");
    
   echo("<div class='alert alert-dark m-3'>تم التعديل </div>");
}
if(isset($_POST["btndelete"]))
{
    include_once('Classes/Database.php');
    $db=new Database();
     $db->RunDML("delete from taxes where id='".$_POST["name_add"]."'");
    
   echo("<div class='alert alert-dark m-3'> تم الحذف</div>"); 
}

?>
            </div>
          
            <table class="table table-border table-striped m-3 p-3">
<tr>
                                        <th>رقم العمليه</th>
										<th>الاسم</th>
										<th>التاريخ</th>
										<th>القيمه</th>
									
										
</tr>
 
<?php
    include_once('Classes/Database.php');
    $db=new Database();
    $rsn=$db->GetData("select * from taxes");
   while($row=mysqli_fetch_assoc($rsn)) {
  
      echo("<tr>");
      echo("<td>". $row['id'] ."</td>");
      echo("<td>". $row['name'] ."</td>");
      echo("<td>". $row['date'] ."</td>");
      echo("<td>". $row['payment'] ."</td>");
      echo("</tr>");
   }
?>
</table>
					
         </form>       
    
    
        </div>


  
<?php 
    include_once('includes/footer.php');
?>
