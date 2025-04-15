<?php
session_start();

// تحقق من إذا كان المستخدم الحالي هو طالب
if (!isset($_SESSION["LoginStudent"])) {
    header('location:../login/login.php');
    exit;
}

// تحقق من إذا كان المستخدم الحالي ليس مدير النظام
if (isset($_SESSION['LoginAdmin']) && $_SESSION['LoginAdmin'] != "") {
    header('location:../login/login.php');
    exit;
}

require_once "../connection/connection.php";

$roll_no = $_SESSION['LoginStudent'];
$query = "SELECT s.studentName, s.gender, s.current_address, s.admission_date, s.profile_image, s.Username, s.password, l.levelname, l.section 
         FROM students s
         INNER JOIN level l ON s.levelid = l.id
         WHERE s.roll_no = '$roll_no'";
$rs = $conn->query($query);
$row = $rs->fetch_assoc();
?>
<!doctype html>
<html lang="en">
	<head>
		<title>الطالب  </title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/student-sidebar.php') ?>

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100 page-content-index">
			<div class="flex-wrap flex-md-no-wrap pt-3 pb-2 mb-3 admin-dashboard   pl-3" >
   

				<h4 style="color: #fff;">لوحة التحكم </h4>

			</div>
            <?php 
            // $roll_no=$_SESSION['LoginStudent'];
					// $query="select * from students where roll_no='$roll_no'";
					// $run=mysqli_query($conn,$query);
					// while ($row=mysqli_fetch_array($run)) {echo $row['studentName'];}
           $prosql = mysqli_query($conn, "SELECT * FROM students ");
          $row = mysqli_fetch_assoc($prosql)
					?>

  <div class="container-scroller">
      <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h2 class="page-title"> ادارة الملف الشخصي للطالب </h2>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">الرئيسية</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> الملف الشخصي للطالب </li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">الملف الشخصي للطالب</h4>
                    
                  
                        <div class="form-group  row mb-3">
                            <label  for="default" >الصورة</label>
                          <?php  $profile_image= $row["profile_image"] ?>
                          <img class="ml-5 mb-5" height='150px' width='150px' src=<?php echo "../Admin/images/$profile_image"  ?> >
                    
                        </div>
                        <div class="form-group  row mb-3">
                            <label  for="default" class="col-sm-2 control-label"> اسم الطالب  </label>
                            <div class="col-sm-9">
                              <input name="studentName" type="text" class="form-control" id="studentName" value="<?= $row['studentName'] ;?>">
                          </div>
                           
                        </div>
                        <div class="form-group  row mb-3">
                            <label  for="default" class="col-sm-2 control-label">النوع</label>
                            <div class="col-sm-9">
                              <input name="gender" type="text" class="form-control" id="gender" value="<?= $row['gender'] ;?>">
                          </div>
                        </div>
                        <div class="form-group  row mb-3">
                            <label  for="default" class="col-sm-2 control-label"> العنوان </label>
                            <div class="col-sm-9">
                              <input name="current_address" type="text" class="form-control" id="current_address" value="<?= $row['current_address'] ;?>">
                          </div>
                        </div> 
                        <div class="form-group  row mb-3">
                            <label  for="default" class="col-sm-2 control-label" >المستوى</label>
                            <div class="col-sm-9">
                              <?php  $prosql = mysqli_query($conn, "SELECT * FROM level");
                              $roww = mysqli_fetch_assoc($prosql)?>
                              <input name="levelname" type="text" class="form-control" id="levelname" value="<?= $roww['levelname'].'  '.'-'.'  '.$roww['section'];?>">
                            </div>
                        </div>    
                        <div class="form-group  row mb-3">
                            <label  for="default"  class="col-sm-2 control-label">تاريخ التسجيل  </label>
                            <div class="col-sm-9">
                              <input name="admission_date" type="text" class="form-control" id="admission_date" value="<?= $row['admission_date'] ;?>">
                          </div>
                           
                        </div>  
                       
                        <div class="form-group  row mb-3">
                            <label  for="default"  class="col-sm-2 control-label"> كلمة السر </label>
                            <div class="col-sm-9">
                              <input name="password" type="text" class="form-control" id="password" value="<?= $row['password'] ;?>">
                          </div>
                           
                        </div>
                    <div class="form-group  row mb-3">
                        <div class="col-xl-6"  class="col-sm-2 control-label">
                            <label for="exampleInputName1">اسم المستخدم</label>
                            <input type="text" name="Username" value="<?php echo $row['Username']; ?>" class="form-control" required='true'>
                        </div>
                    </div>
                      
                      <?php  ?> 
                  
                    </form>
                  </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	

	</main>
<!-- <script>
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
</script> -->
<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>


