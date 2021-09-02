
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
                        <h4 class="page-title"> الحجز</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                    <a  class="btn btn btn-primary btn-rounded float-right" href="edit-reservation.php">اضافه حجز </a>
                       
                    </div>
                </div>

              




                       

				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
                            <form  method="post">
							<table class="table table-border table-striped custom-table datatable mb-0">
								<thead>
									<tr>
									
										<th>رقم المريض</th>
										<th>رقم الحجز</th>
										<th>وقت الحجز</th>
										<th> تاريخ الحجز</th>
										<th>العمر </th>
										<th>الدفع </th>
										<th>ملاحظات</th>
										
										<th>حذف</th>
										
										
									</tr>


 <?php
    include_once('Classes/Database.php');
  
    $db=new Database();
    $rs=$db->GetData("SELECT * FROM `reservation`");
    while($row=mysqli_fetch_assoc($rs))
    {
?>
								</thead>
							<tbody>

                          

                                        <td> <?php echo $row["Reservation_id"]; ?></td>
                                      
                                        <td> <?php echo $row["Reservation_number"]; ?></td>
                                        <td> <?php echo $row["Reservation_time"]; ?></td>
                                        <td> <?php echo $row["Reservation_date"]; ?></td>
                                        <td> <?php echo $row["age"]; ?></td>
                                        <td> <?php echo $row["patient_payment"]; ?></td>
                                        <td> <?php echo $row["notes"]; ?></td>
                                       
                                      
                                        <td><input type="submit" name="btn<?php echo $row["Reservation_id"]; ?>" value="Delete" class="btn btn-danger text-center" /> </td>

										
										
            
                            </tbody>

                            <?php

if(isset($_POST["btn".$row["Reservation_id"]]))
{
    $db->RunDML("delete from reservation where Reservation_id='".$row["Reservation_id"]."'");
    header("Location:reservation.php");
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

