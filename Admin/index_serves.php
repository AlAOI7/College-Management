<?php require "inc/security.php"; ?>
<?php require "nav.php"; ?>
<?php require "sidemenu.php"; ?>

<div class="page-wrapper">
    <div class="card">
        <div class="border-top">
            <div class="card-body">
                <a href="add_serves.php" type="submit" class="btn btn-warning">اضافة</a>
            </div>
        </div>
        <div class="card-body">
            <h5 class="card-title"> عرض الخدمات</h5>
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th> العنوان </th>
                            <th>صورة الخدمة</th>
                            <th>رقم الهاتف</th>
                            <th>رقم اخر</th>
                            <th>الربد الالكتروني </th>
                            <th> رابط الفيسبوك</th>
                            <th>الاجراءات</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php  
                                        $prosql = mysqli_query($conn, "SELECT * FROM serves");
                                        while ($prorow = mysqli_fetch_assoc($prosql)) {
                                
                                    ?>
                        <tr>
                            <td><?= $prorow['id'] ;?></td>
                            <td><?= $prorow['title'] ;?></td>
                            <td><img width="60px" src="images/serves/<?= $prorow['image'] ;?>"> </td>
                            <td><?= $prorow['phone'] ;?></td>
                            <td><?= $prorow['otherphone'] ;?></td>
                            <td><?= $prorow['email'] ;?></td>
                            <td><?= $prorow['fecboock'] ;?></td>
                            <td>
                                <a href="edit_serves.php?id=<?= $prorow['id'] ;?>" class="btn btn-success"><span><i
                                            class="fa fa-edit"></i></span>
                                </a>
                                <a href="delete_serves.php?id=<?= $prorow['id'] ;?>" class="btn btn-danger"> <span><i
                                            class="fa fa-trash"></i></span>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

<?php require "footer.php" ; ?>