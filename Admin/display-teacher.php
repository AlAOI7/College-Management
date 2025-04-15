<!---------------- Session starts form here ----------------------->
<?php  
	session_start();

	if ($_SESSION["LoginAdmin"])
	{
		$teacher_id=$_GET['teacher_id'];
	}

	else{ ?>
<script>
alert("Your Are Not Autorize Person For This link");
</script>
<?php
		header('location:../login/login.php');
	}

?>
<!---------------- Session Ends form here ------------------------>

<?php require "nav.php" ; ?>
<?php require "sidemenu.php" ; ?>
<?php
		if($teacher_id){
			$query="select * from teacher_info where teacher_id='$teacher_id'";
		}
		else{
			$query="select * from teacher_info where email='$teacher_email'";
		}
		
		$run=mysqli_query($conn,$query);
		while ($row=mysqli_fetch_array($run)) {
	?>
<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100 page-content-index">
    <div class="flex-wrap flex-md-no-wrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
        <h4>لوحة التحكم </h4>
    </div>

    <div class="content py-4">
        <div class="card card-outline card-navy shadow rounded-0">
            <div class="card-header">
                <h5 class="card-title">بيانات الدكتور</h5>
                <div class="card-tools">
                    <!-- <a class="btn btn-sm btn-primary btn-flat" href="./?page=students/manage_student&id=<?= isset($id) ? $id : '' ?>"><i class="fa fa-edit"></i> Edit</a> -->
                    <button class="btn btn-sm btn-danger btn-flat" id="delete_student"><i class="fa fa-trash"></i>
                        حذف</button>
                    <button class="btn btn-sm btn-navy bg-navy btn-flat" type="button" id="add_academic"><i
                            class="fa fa-plus"></i> Add Academic</button>
                    <button class="btn btn-sm btn-info bg-info btn-flat" type="button" id="update_status">تحديث
                        الاحاله</button>
                    <button class="btn btn-sm btn-success bg-success btn-flat" type="button" id="print"><i
                            class="fa fa-print"></i> طباعة</button>
                    <!-- <a href="./?page=students" class="btn btn-default border btn-sm btn-flat"><i class="fa fa-angle-left"></i> Back to List</a> -->
                </div>
            </div>
            <div class="card-body">
                <div class="container-fluid" id="outprint">
                    <style>
                    #sys_logo {
                        width: 5em;
                        height: 5em;
                        object-fit: scale-down;
                        object-position: center center;
                    }
                    </style>

                    <div id="print-header" class="container  mt-1 border border-secondary mb-1">
                        <div class="row text-white bg-primary pt-5">
                            <div class="col-md-4">
                                <?php  $profile_image= $row["profile_image"] ?>
                                <img class="ml-5 mb-5" height='250px' width='220px'
                                    src=<?php echo "images/$profile_image"  ?>>
                            </div>
                            <div class="col-md-8">
                                <h3 class="ml-5">
                                    <?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name'] ?></h3>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>الاسم:</h5> <?php echo $row['father_name']  ?><br><br>
                                        <h5>البريد:</h5> <?php echo $row['email']  ?><br><br>
                                        <h5>الكنية:</h5> <?php echo $row['phone_no']  ?><br><br>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>العنوان:</h5> <?php echo $row['permanent_address']  ?><br><br>
                                        <h5>CNIC:</h5> <?php echo $row['cnic']  ?><br><br>
                                        <h5>الدكتور I'd:</h5> <?php echo $row['teacher_id']  ?><br><br>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-4">
                                <h5>الحالة:</h5> <?php echo $row['teacher_status']  ?>
                            </div>
                            <div class="col-md-4">
                                <h5>الجنس:</h5> <?php echo $row['gender']  ?>
                            </div>
                            <div class="col-md-4">
                                <h5>تاريخ الميلاد:</h5> <?php echo $row['dob']  ?>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-4">
                                <h5>رقم الهاتف:</h5> <?php echo $row['other_phone']  ?>
                            </div>
                            <div class="col-md-4">
                                <h5>الولايه:</h5> <?php echo $row['state']  ?>
                            </div>
                            <div class="col-md-4">
                                <h5>المؤهل الاخير:</h5> <?php echo $row['last_qualification']  ?>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-4">
                                <h5>عنوان دائم:</h5> <?php echo $row['permanent_address']  ?>
                            </div>
                            <div class="col-md-4">
                                <h5>العنوان الحالي :</h5> <?php echo $row['current_address']  ?>
                            </div>
                            <div class="col-md-4">
                                <h5>مكان الميلاد:</h5> <?php echo $row['place_of_birth']  ?>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-4">
                                <h5>Matricتاريخ الانتها من:</h5> <?php echo $row['matric_complition_date']  ?>
                            </div>
                            <div class="col-md-4">
                                <h5>Matricتاريخ منح :</h5> <?php echo $row['matric_awarded_date']  ?>
                            </div>
                            <div class="col-md-4">
                                <h5>Matric الشهادة:</h5>
                                <div class="col-md-4">
                                    <?php  $matric_certificate= $row["matric_certificate"] ?>
                                    <img class="ml-5 mb-5" height='250px' width='220px'
                                        src=<?php echo "images/$matric_certificate"  ?>>
                                </div>

                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-4">
                                <h5>Fa Cتاريخ الانتهاء:</h5> <?php echo $row['fa_complition_date']  ?>
                            </div>
                            <div class="col-md-4">
                                <h5>Fa تاريخ المنح :</h5> <?php echo $row['fa_awarded_date']  ?>
                            </div>
                            <div class="col-md-4">
                                <h5>Fa شهادة:</h5>

                                <div class="col-md-4">
                                    <?php  $fa_certificate= $row["fa_certificate"] ?>
                                    <img class="ml-5 mb-5" height='250px' width='220px'
                                        src=<?php echo "images/$fa_certificate"  ?>>
                                </div>


                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-4">
                                <h5>تاريخ الانتها من درجة البكالوريوس:</h5> <?php echo $row['ba_complition_date']  ?>
                            </div>
                            <div class="col-md-4">
                                <h5> الريخ منح البكالوريوس:</h5> <?php echo $row['ba_awarded_date']  ?>
                            </div>
                            <div class="col-md-4">
                                <h5>شهادة البكالوريوس:</h5>

                                <div class="col-md-4">
                                    <?php  $ba_certificate= $row["ba_certificate"] ?>
                                    <img class="ml-5 mb-5" height='250px' width='220px'
                                        src=<?php echo "images/$ba_certificate"  ?>>
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-4">
                                <h5>تاريخ الانتها من الماجستير:</h5> <?php echo $row['ma_complition_date']  ?>
                            </div>
                            <div class="col-md-4">
                                <h5>تاريخ منح الماجستير :</h5> <?php echo $row['ma_awarded_date']  ?>
                            </div>
                            <div class="col-md-4">
                                <h5>شهادة الماجستتير:</h5>

                                <div class="col-md-4">
                                    <?php  $ma_certificate= $row["ma_certificate"] ?>
                                    <img class="ml-5 mb-5" height='250px' width='220px'
                                        src=<?php echo "images/$ma_certificate"  ?>>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php } ?>
</main>
<script>
$(function() {
    $('#update_status').click(function() {
        uni_modal("Update Status of <b><?= isset($roll) ? $roll : "" ?></b>",
            "students/update_status.php?student_id=<?= isset($id) ? $id : "" ?>")
    })
    $('#add_academic').click(function() {
        uni_modal("Add Academic Record for <b><?= isset($roll) ? $roll.' - '.$fullname : "" ?></b>",
            "students/manage_academic.php?student_id=<?= isset($id) ? $id : "" ?>", 'mid-large')
    })
    $('.edit_academic').click(function() {
        uni_modal("Edit Academic Record of <b><?= isset($roll) ? $roll.' - '.$fullname : "" ?></b>",
            "students/manage_academic.php?student_id=<?= isset($id) ? $id : "" ?>&id=" + $(this)
            .attr('data-id'), 'mid-large')
    })
    $('.delete_academic').click(function() {
        _conf("Are you sure to delete this Student's Academic Record?", "delete_academic", [$(this)
            .attr('data-id')
        ])
    })
    $('#delete_student').click(function() {
        _conf("Are you sure to delete this Student Information?", "delete_student", [
            '<?= isset($id) ? $id : '' ?>'
        ])
    })
    $('.view_data').click(function() {
        uni_modal("Report Details", "students/view_report.php?id=" + $(this).attr('data-id'),
            "mid-large")
    })
    $('.table td, .table th').addClass('py-1 px-2 align-middle')
    $('.table').dataTable({
        columnDefs: [{
            orderable: false,
            targets: 5
        }],
    });
    $('#print').click(function() {
        start_loader()
        $('#academic-history').dataTable().fnDestroy()
        var _h = $('head').clone()
        var _p = $('#outprint').clone()
        var _ph = $($('noscript#print-header').html()).clone()
        var _el = $('<div>')
        _p.find('tr.bg-gradient-dark').removeClass('bg-gradient-dark')
        _p.find('tr>td:last-child,tr>th:last-child,colgroup>col:last-child').remove()
        _p.find('.badge').css({
            'border': 'unset'
        })
        _el.append(_h)
        _el.append(_ph)
        _el.find('title').text('Student Records - Print View')
        _el.append(_p)


        var nw = window.open('', '_blank', 'width=1000,height=900,top=50,left=200')
        nw.document.write(_el.html())
        nw.document.close()
        setTimeout(() => {
            nw.print()
            setTimeout(() => {
                nw.close()
                end_loader()
                $('.table').dataTable({
                    columnDefs: [{
                        orderable: false,
                        targets: 5
                    }],
                });
            }, 300);
        }, (750));


    })
})

function delete_academic($id) {
    start_loader();
    $.ajax({
        url: _base_url_ + "classes/Master.php?f=delete_academic",
        method: "POST",
        data: {
            id: $id
        },
        dataType: "json",
        error: err => {
            console.log(err)
            alert_toast("An error occured.", 'error');
            end_loader();
        },
        success: function(resp) {
            if (typeof resp == 'object' && resp.status == 'success') {
                location.reload();
            } else {
                alert_toast("An error occured.", 'error');
                end_loader();
            }
        }
    })
}

function delete_student($id) {
    start_loader();
    $.ajax({
        url: _base_url_ + "classes/Master.php?f=delete_student",
        method: "POST",
        data: {
            id: $id
        },
        dataType: "json",
        error: err => {
            console.log(err)
            alert_toast("An error occured.", 'error');
            end_loader();
        },
        success: function(resp) {
            if (typeof resp == 'object' && resp.status == 'success') {
                location.href = "./?page=students";
            } else {
                alert_toast("An error occured.", 'error');
                end_loader();
            }
        }
    })
}
</script>
<?php require "footer.php"; ?>