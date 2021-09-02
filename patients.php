

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
                        <h4 class="page-title">المرضى</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                    <a  class="btn btn btn-primary btn-rounded float-right" href="add-patient.php">اضافه مريض </a>
                       
                    </div>
                </div>

              




                       

				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
                            <form  method="post">
							<table class="table table-border table-striped custom-table datatable mb-0">
								<thead>
									<tr>
										<th>رقم </th>
										<th>الاسم</th>
										<th>رقم الحجز</th>
										<th>العمر</th>
										<th>رقم التليفون</th>
									
										<th>العنوان </th>
										<th>ملاحظات</th>
										
										<th>حذف</th>
										
										
									</tr>


 <?php
    include_once('Classes/Database.php');
  
    $db=new Database();
    $rs=$db->GetData("SELECT * FROM `patients`");
    while($row=mysqli_fetch_assoc($rs))
    {
?>
								</thead>
							<tbody>

                          

                                        <td> <?php echo $row["patient_id"]; ?></td>
                                        <td> <?php echo $row["patient_name"]; ?></td>
                                        <td> <?php echo $row["Reservation_id"]; ?></td>
                                        <td> <?php echo $row["age"]; ?></td>
                                        <td> <?php echo $row["phone"]; ?></td>
                                        <td> <?php echo $row["address"]; ?></td>
                                        <td> <?php echo $row["notes"]; ?></td>
                                       
                                        <td><input type="submit" name="btn<?php echo $row["patient_id"]; ?>" value="Delete" class="btn btn-danger text-center" /> </td>

										
										
            
                            </tbody>

                            <?php

if(isset($_POST["btn".$row["patient_id"]]))
{
    $db->RunDML("delete from patients where patient_id='".$row["patient_id"]."'");
    header("Location:patients.php");
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