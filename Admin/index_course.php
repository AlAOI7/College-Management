<?php require "inc/security.php"; ?>
<?php require "nav.php"; ?>
<?php require "sidemenu.php"; ?>

<div class="page-wrapper">
    <div class="card">
        <div class="border-top">
            <div class="card-body">
                <a href="add_course.php" class="btn btn-warning">اضافة</a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">جميع المواد</h6>

                        </div>
                        <div class="table-responsive p-3">
                            <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                                <thead class="thead-light">


                                    <tr>

                                        <th class="font-weight-bold">#</th>
                                        <th class="font-weight-bold">اسم المادة</th>
                                        <th class="font-weight-bold">كود الماده </th>
                                        <th class="font-weight-bold"> اسم الدكتور</th>
                                        <th class="font-weight-bold">عدد الساعات المعادة </th>
                                        <th class="font-weight-bold"> التاريخ</th>
                                        <th class="font-weight-bold">تعديل</th>
                                        <th class="font-weight-bold">حذف</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  
                                                  $prosql = mysqli_query($conn, "SELECT * FROM course");
                                              
                                                  while ($prorow = mysqli_fetch_assoc($prosql)) {
                                          
                                              ?>
                                    <tr>
                                        <td><?= $prorow['id'] ;?></td>
                                        <td><?= $prorow['namecourse'] ;?></td>
                                        <td><?= $prorow['codecours'] ;?></td>
                                        <td>د.<?= $prorow['doctorcours'] ;?></td>
                                        <td>ساعة:<?= $prorow['course_credits'] ;?></td>
                                        <td><?= $prorow['date'] ;?></td>

                                        <td><a href="edit_course.php?id=<?= $prorow['id'] ;?>"> <span><i
                                                        class="fa fa-edit"></i></span></a></td>
                                        <td><a href="delete_course.php?id=<?= $prorow['id'] ;?>"> <span><i
                                                        class="fa fa-trash"></i></span></a></td>
                                    </tr>

                                    <?php }?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" align="center"><i class="icon-printer fa fas-print fa-2x"
                                                aria-hidden="true" style="cursor:pointer"
                                                OnClick="CallPrint(this.value)"></i></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require "footer.php" ; ?>