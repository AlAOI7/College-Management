<?php require "inc/security.php"; ?>
 <?php require "nav.php"; ?>
<?php require "sidemenu.php"; ?>

 <div class="page-wrapper">
           <div class="card">
           <div class="border-top">
                <div class="card-body">
                    <a href="add_newdoctor.php" type="submit" class="btn btn-warning">اضافة</a>
                </div>
            </div>
                <div class="card-body">
                    <h5 class="card-title"> عرض الاخبار</h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th> اسم الدكتور  </th>
                                    <th>صورة الدكتور</th>
                                    <th>العنوان</th>
                                    <th>الوصف</th>
                                    <th>صورة توضيحية</th>
                                    <th>تاربخ النشر</th>
                                    <th>الاجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php  
                                        $prosql = mysqli_query($conn, "SELECT * FROM bannerdepart");
                                        while ($prorow = mysqli_fetch_assoc($prosql)) {
                                
                                    ?>
                                <tr>
                                        <td><?= $prorow['id'] ;?></td>
                                        <td><?= $prorow['namedoctor'] ;?></td>
                                        <td><img width="60px" src="images/banner/<?= $prorow['image'] ;?>"> </td>
                                        <td><?= $prorow['descriptiontitle'] ;?></td>
                                        <td><?= $prorow['description'] ;?></td>
                                        <td><img width="60px" src="images/banner/<?= $prorow['descimage'] ;?>"> </td>
                                        <td><?= $prorow['datebanner'] ;?></td>
                                        <td>
                                                <a href="edit_newdoctor.php?id=<?= $prorow['id'] ;?>" class="btn btn-success"><span><i class="fa fa-edit"></i></span>
                                                </a>
                                                <a href="delete_newdoctor.php?id=<?= $prorow['id'] ;?>" class="btn btn-danger"> <span><i class="fa fa-trash"></i></span>
                                                </a>
                                        </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>id </th>
                                    <th>  name </th>
                                    <th>profil Image</th>
                                    <th>  description desc </th>
                                    <th>  description </th>
                                    <th>desc Image</th>
                                    <th>  date </th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
 </div>
                  
<?php require "footer.php" ; ?>