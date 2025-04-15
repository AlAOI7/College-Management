<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	
	if ($_SESSION["LoginAdmin"])
	{
		$id=$_GET['id'] ?? $_SESSION['LoginStudent'];
	}
	else if(!$_SESSION["LoginAdmin"] && $_SESSION['LoginStudent']){
		$roll_no=$_SESSION['LoginStudent'];
	}
	else{ ?>
		<script> alert("Your Are Not Authorize Person For This link");</script>
	<?php
		header('location:../login/login.php');
	}
	require_once "../connection/connection.php";
	?>
<!---------------- Session Ends form here ------------------------>
<!---------------- Session starts form here ----------------------->
<!-- <?php require "inc/security.php"; ?> -->
<!---------------- Session Ends form here ------------------------>
<link rel="stylesheet" href="css/stylestyle.css" />
<?php require "nav.php" ; ?>
<?php require "sidemenu.php" ; ?>
		

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100 page-content-index">
			<div class="flex-wrap flex-md-no-wrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
				<h4>لوحة التحكم </h4>
			</div>

				<div class="content py-4">
					<div class="card card-outline card-navy shadow rounded-0">
						<div class="card-header">
							<h5 class="card-title">محتوى الطالب</h5>
							<div class="card-tools">
								<!-- <a class="btn btn-sm btn-primary btn-flat" href="./?page=students/manage_student&id=<?= isset($id) ? $id : '' ?>"><i class="fa fa-edit"></i> Edit</a> -->
								<button class="btn btn-sm btn-danger btn-flat" id="delete_student"><i class="fa fa-trash"></i> Delete</button>
								<button class="btn btn-sm btn-navy bg-navy btn-flat" type="button" id="add_academic"><i class="fa fa-plus"></i> Add Academic</button>
								<button class="btn btn-sm btn-info bg-info btn-flat" type="button" id="update_status">Updated Status</button>
								<button onclick="window.print();" class="btn btn-primary" id="print-btn">
                            <i class="fa fa-print"></i> طباعة</button>
								<!-- <a href="./?page=students" class="btn btn-default border btn-sm btn-flat"><i class="fa fa-angle-left"></i> Back to List</a> -->
							</div>
						</div>
						<div class="card-body">
							<div class="container-fluid" id="outprint">
								<style>
									#sys_logo{
										width:5em;
										height:5em;
										object-fit:scale-down;
										object-position:center center;
									}
								</style>
						<?php
						$query="select * from students where id='$id'";
						$run=mysqli_query($conn,$query);
						while ($row=mysqli_fetch_array($run)) {
							?>
							<div class="container  mt-1 border border-secondary mb-1">
								<div class="row  pt-5" >
									<div class="col-md-4">
										<?php  $profile_image= $row["profile_image"] ?>
										<img class="ml-5 mb-5" height='290px' width='250px' src=<?php echo "images/$profile_image"  ?> >
									</div>
									<div class="col-md-8">
										<h3 class="ml-5" style="text-align:center;"> الاسم:<?php echo $row['studentName']?></h3><br>
										<div class="row">
											<div class="col-md-6">
												<h5>البريد:</h5> <?php echo $row['email']  ?><br><br>
												<h5>رقم الهاتف:</h5> <?php echo $row['mobile_no']  ?><br><br>
												<h5>رقم الهاتف الاخر:</h5> <?php echo $row['other_phone']  ?><br><br>
											</div>
											<div class="col-md-6">
											<h5>  الجنس :</h5> <?php echo $row['gender']  ?><br><br>
												<h5>العنوان:</h5> <?php echo $row['permanent_address']  ?><br><br>
												<h5>البطافة الوطنبة:</h5> <?php echo $row['cnic']  ?><br><br>
												<h5>رقم سجل الطالب :</h5> <?php echo $row['roll_no']  ?><br><br> 
											</div>		
										</div>
									</div>
									<hr>
								</div>
								<hr>
								<div class="row pt-3">
									<div class="col-md-4"><h5>حالة الدراسة:</h5> <?php echo $row['applicant_status']  ?></div>
									<div class="col-md-4"><h5> عنوانك الثابت:</h5> <?php echo $row['permanent_address']  ?></div>
										<div class="col-md-4"><h5>الفصل:</h5> <?php echo $row['session']  ?></div>
								
								</div>
								<div class="row pt-3">
									<div class="col-md-4"><h5>الجنس:</h5> <?php echo $row['gender']  ?></div>
									<?php  $prosql = mysqli_query($conn, "SELECT * FROM level");
							     	$roww = mysqli_fetch_assoc($prosql)?>
									<div class="col-md-4"><h5>المستوى:</h5> <?php echo $roww['levelname']  ?></div>
									
									<div class="col-md-4"><h5>تاريخ الميلاد:</h5> <?php echo $row['dob']  ?></div>
									
								</div>
								<div class="row pt-3">
								    <div class="col-md-4"><h5>اسم المستخدم:</h5> <?php echo $row['Username']  ?></div>
									<div class="col-md-4"><h5> كلمة السر:</h5> <?php echo $row['password']  ?></div>
									
								</div>
							
								<div class="row pt-3">
									<div class="col-md-4"><h5>العنوان الثابت :</h5> <?php echo $row['permanent_address']  ?></div>
									<div class="col-md-4"><h5>العنوان الحالي:</h5> <?php echo $row['current_address']  ?></div>
									<div class="col-md-4"><h5>مكان الميلاد:</h5> <?php echo $row['place_of_birth']  ?></div>
								</div>
								<div class="row pt-3">
									<div class="col-md-4"><h5>تالايخ التخرج من الثانوية:</h5> <?php echo $row['matric_complition_date']  ?></div>
									<div class="col-md-4"><h5> الشهادة الثانوية:</h5> 
									<?php  $matric_certificate= $row["matric_certificate"] ?>
									<img class="ml-5 mb-5" height='290px' width='250px' src=<?php echo "images/$matric_certificate"  ?> >
                                    </div>
								</div>
							
							</div>
						<?php } ?>


						</div>
						</div>
					</div>
				</div>
	

	</main>
<script>
    $(function() {
        $('#update_status').click(function(){
            uni_modal("Update Status of <b><?= isset($roll) ? $roll : "" ?></b>","students/update_status.php?student_id=<?= isset($id) ? $id : "" ?>")
        })
        $('#add_academic').click(function(){
            uni_modal("Add Academic Record for <b><?= isset($roll) ? $roll.' - '.$fullname : "" ?></b>","students/manage_academic.php?student_id=<?= isset($id) ? $id : "" ?>",'mid-large')
        })
        $('.edit_academic').click(function(){
            uni_modal("Edit Academic Record of <b><?= isset($roll) ? $roll.' - '.$fullname : "" ?></b>","students/manage_academic.php?student_id=<?= isset($id) ? $id : "" ?>&id="+$(this).attr('data-id'),'mid-large')
        })
        $('.delete_academic').click(function(){
			_conf("Are you sure to delete this Student's Academic Record?","delete_academic",[$(this).attr('data-id')])
		})
        $('#delete_student').click(function(){
			_conf("Are you sure to delete this Student Information?","delete_student",['<?= isset($id) ? $id : '' ?>'])
		})
        $('.view_data').click(function(){
			uni_modal("Report Details","students/view_report.php?id="+$(this).attr('data-id'),"mid-large")
		})
        $('.table td, .table th').addClass('py-1 px-2 align-middle')
		$('.table').dataTable({
            columnDefs: [
                { orderable: false, targets: 5 }
            ],
        });
        $('#print').click(function(){
            start_loader()
            $('#academic-history').dataTable().fnDestroy()
            var _h = $('head').clone()
            var _p = $('#outprint').clone()
            var _ph = $($('noscript#print-header').html()).clone()
            var _el = $('<div>')
            _p.find('tr.bg-gradient-dark').removeClass('bg-gradient-dark')
            _p.find('tr>td:last-child,tr>th:last-child,colgroup>col:last-child').remove()
            _p.find('.badge').css({'border':'unset'})
            _el.append(_h)
            _el.append(_ph)
            _el.find('title').text('Student Records - Print View')
            _el.append(_p)


            var nw = window.open('','_blank','width=1000,height=900,top=50,left=200')
                nw.document.write(_el.html())
                nw.document.close()
                setTimeout(() => {
                    nw.print()
                    setTimeout(() => {
                        nw.close()
                        end_loader()
                        $('.table').dataTable({
                            columnDefs: [
                                { orderable: false, targets: 5 }
                            ],
                        });
                    }, 300);
                }, (750));
                
            
        })
    })
    function delete_academic($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_academic",
			method:"POST",
			data:{id: $id},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("An error occured.",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.reload();
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}
    function delete_student($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_student",
			method:"POST",
			data:{id: $id},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("An error occured.",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.href="./?page=students";
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}
</script>
	<?php require "footer.php" ; ?>