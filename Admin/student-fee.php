<?php
require_once "../connection/connection.php"; ?>
<link rel="stylesheet" href="css/stylestyle.css" />
<?php require "nav.php" ; ?>
<?php require "sidemenu.php" ; ?>
<?php
if (isset($_POST['sub'])) {


	$roll_no = mysqli_escape_string($conn, $_POST['roll_no']);
    $amount = mysqli_escape_string($conn, $_POST['amount']);
    $status = mysqli_escape_string($conn, $_POST['status']);
    
    $sql = mysqli_query($conn, "INSERT INTO student_fee (roll_no, amount,status)VALUES ('$roll_no','$amount','$status')");
 
	if ($sql) {
			echo "Insert Successfully";
		}	
		else{
			echo " Insert Not Successfully";
		}
	}

?>

<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
    <div class="sub-main">
        <div
            class="bar-margin text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
            <h4>ادارة نظام الطالب </h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="student-fee.php" method="post">
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>ادخل الرقم الاكاديمي:</label>
                                <div class="d-flex">
                                    <input type="text" class="form-control" name="roll_no" placeholder="Enter Roll No">
                                    <input type="submit" name="submit" class="btn btn-primary px-4 ml-4" value="Press">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 align-items-baseline pt-4">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 ml-2">
                <section class="border mt-3">
                    <table class="w-100 table-elements table-three-tr" cellpadding="3">
                        <tr class="table-tr-head table-three ">
                            <th>Sr No.</th>
                            <th>Roll No.</th>
                            <th>اسم الطالب</th>
                            <th>Program</th>
                            <th>Amount (Rs.)</th>
                        </tr>
                        <?php  
								$i=1;
									if (isset($_POST['submit'])) {
										$roll_no=$_POST['roll_no'];
									
                                        $run = mysqli_query($conn, "SELECT * FROM students  where roll_no='$roll_no'");
                                        while ($row = mysqli_fetch_assoc($run)) {
                                
									?>
                        <form action="student-fee.php" method="post">
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $row['roll_no'] ?></td>
                                <input type="hidden" name="roll_no" value=<?php echo $row['roll_no'] ?>>
                                <td><?php echo $row['studentName']?></td>
                                <td><input type="text" name="amount" class="form-control" placeholder="ادخل الكمية">
                                </td>
                                <input type="hidden" name="status" value="Paid">

                            </tr>

                            <?php		
									}
									}
								?>
                            <input type="submit" name="sub">

                        </form>
                    </table>
                </section>
            </div>
        </div>
    </div>
</main>
<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<?php require "footer.php" ; ?>