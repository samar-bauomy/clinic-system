
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
                        <h4 class="page-title"> المشتريات</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                    <a  class="btn btn btn-primary btn-rounded float-right" href="edit-payments.php">  اضافه عمليه شراء </a>
                       
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
										<th>التاريخ </th>
										<th>اسم المورد</th>
										<th>المشتريات</th>
										<th> الاجمالى</th>
										
										<th>حذف</th>
										
										
									</tr>


 <?php
    include_once('Classes/Database.php');
  
    $db=new Database();
    $rs=$db->GetData("SELECT * FROM `payments`");
    while($row=mysqli_fetch_assoc($rs))
    {
?>
								</thead>
							<tbody>

                          

                                        <td> <?php echo $row["id"]; ?></td>
                                        <td> <?php echo $row["date"]; ?></td>
                                        <td> <?php echo $row["Supplier_name"]; ?></td>
                                        <td> <?php echo $row["Purchases"]; ?></td>
                                        <td> <?php echo $row["total"]; ?></td>
                                       
                                        <td><input type="submit" name="btn<?php echo $row["id"]; ?>" value="Delete" class="btn btn-danger text-center" /> </td>

										
										
            
                            </tbody>

                            <?php

if(isset($_POST["btn".$row["id"]]))
{
    $db->RunDML("delete from payments where ID='".$row["id"]."'");
    header("Location:payments.php");
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


 

</html>
<?php 
    include_once('includes/footer.php');
?>

