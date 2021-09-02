
<?php 
    include_once('includes/header.php');
  //  include_once('Classes/Database.php');

?>


   
        <!-- sidebar -->

        <?php 
    include_once('includes/sidebar.php');
        ?>



        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title"> العمليات</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                    <a  class="btn btn btn-primary btn-rounded float-right" href="edit-opration.php">اضافه عمليه </a>
                       
                    </div>
                </div>

              




                       

				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
                            <form  method="post">
							<table class="table table-border table-striped custom-table datatable mb-0">
								<thead>
									<tr>
										<th>رقمه</th>
										<th>رقم الحجز</th>
										<th>رقم المريض</th>
										
										<th>نوع العمليه</th>
										<th>الوقت</th>
										<th>اليوم</th>
										<th>التاريخ</th>
										<th> اسم دكتور التخدير</th>
										<th>حذف</th>
										
										
									</tr>


 <?php
    include_once('Classes/Database.php');
  
    $db=new Database();
    $rs=$db->GetData("SELECT * FROM `oprations`");
    while($row=mysqli_fetch_assoc($rs))
    {
?>
								</thead>
							<tbody>

                          

                                        <td> <?php echo $row["id"]; ?></td>
                                        <td> <?php echo $row["Reservation_id"]; ?></td>
                                        <td> <?php echo $row["patient_id"]; ?></td>
                                       
                                        <td> <?php echo $row["oprations_type"]; ?></td>
                                        <td> <?php echo $row["time"]; ?></td>
                                        <td> <?php echo $row["day"]; ?></td>
                                        <td> <?php echo $row["date"]; ?></td>
                                        <td> <?php echo $row["doctor_name"]; ?></td>
                                      
                                        <td><input type="submit" name="btn<?php echo $row["id"]; ?>" value="Delete" class="btn btn-danger text-center" /> </td>

										
										
            
                            </tbody>

                            <?php

if(isset($_POST["btn".$row["id"]]))
{
    $db->RunDML("delete from oprations where ID='".$row["id"]."'");
    header("Location:oprations.php");
}
?>

<?php } ?>
                         
							</table>

                           
                            </form>
						</div>
					</div>
                </div>
            </div>
           
        </div>
		
    </div>


 

<?php 
    include_once('includes/footer.php');
?>

