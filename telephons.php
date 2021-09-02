
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
                        <h4 class="page-title"> التليفونات</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                    <a  class="btn btn btn-primary btn-rounded float-right" href="edit-telephon.php">اضافه تليفون </a>
                       
                    </div>
                </div>

              




                       

				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
                            <form  method="post">
							<table class="table table-border table-striped custom-table datatable mb-0">
								<thead>
									<tr>
										<th>رقم العمليه</th>
										<th>الاسم</th>
										<th>التخصص</th>
										<th>رقم تليفون العياده</th>
										<th>رقم الارضى  العياده</th>
										<th>رقم التليفون الخاص</th>
										<th>العنوان</th>
										<th>حذف</th>
										
										
									</tr>


 <?php
    include_once('Classes/Database.php');
  
    $db=new Database();
    $rs=$db->GetData("SELECT * FROM `telephons`");
    while($row=mysqli_fetch_assoc($rs))
    {
?>
								</thead>
							<tbody>

                          

                                        <td> <?php echo $row["id"]; ?></td>
                                        <td> <?php echo $row["name"]; ?></td>
                                        <td> <?php echo $row["specialty"]; ?></td>
                                        <td> <?php echo $row["phone_number"]; ?></td>
                                        <td> <?php echo $row["telephone"]; ?></td>
                                        <td> <?php echo $row["privat_number"]; ?></td>
                                        <td> <?php echo $row["address"]; ?></td>
                                      
                                        <td><input type="submit" name="btn<?php echo $row["id"]; ?>" value="Delete" class="btn btn-danger text-center" /> </td>

										
										
            
                            </tbody>

                            <?php

if(isset($_POST["btn".$row["id"]]))
{
    $db->RunDML("delete from telephons where ID='".$row["id"]."'");
    header("Location:telephons.php");
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


 
    <!-- <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
</body> -->
</html>
<?php 
    include_once('includes/footer.php');
?>

