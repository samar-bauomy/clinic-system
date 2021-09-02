
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
                        <h4 class="page-title">العاملين</h4>
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
										<th>الوظيفه</th>
										<th>الرقم السرى</th>
										<th>رقم التليفون</th>
										<th>الايميل</th>
										<th>حذف عامل</th>
										
										
									</tr>


 <?php
    include_once('Classes/Database.php');
  
    $db=new Database();
    $rs=$db->GetData("SELECT * FROM `staff`");
    while($row=mysqli_fetch_assoc($rs))
    {
?>
								</thead>
							<tbody>

                          

                                        <td> <?php echo $row["id"]; ?></td>
                                        <td> <?php echo $row["name"]; ?></td>
                                        <td> <?php echo $row["job"]; ?></td>
                                        <td> <?php echo $row["password"]; ?></td>
                                        <td> <?php echo $row["phone"]; ?></td>
                                        <td> <?php echo $row["email"]; ?></td>
                                      
                                        <td><input type="submit" name="btn<?php echo $row["id"]; ?>" value="Delete" class="btn btn-danger text-center" /> </td>

										
										
            
                            </tbody>

                            <?php

if(isset($_POST["btn".$row["id"]]))
{
    $db->RunDML("delete from staff where ID='".$row["id"]."'");
    header("Location:staff.php");
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