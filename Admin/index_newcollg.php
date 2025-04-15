<?php require "inc/security.php"; ?>
 <?php require "nav.php"; ?>
<?php require "sidemenu.php"; ?>

 <div class="page-wrapper">
           <div class="card">
           <div class="border-top">
                <div class="card-body">
                    <a href="add_newcollg.php" type="submit" class="btn btn-warning">اضافة</a>
                </div>
            </div>
                <div class="card-body">
                    <h5 class="card-title"> عرض الاخبار</h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th> العنوان </th>
                                    <th>صورة </th>
                                    <th>العنوان الوصفي</th>
                                    <th>الوصف</th>
                                    <th>تاربخ النشر</th>
                                    <th>الاجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php  
                                        $prosql = mysqli_query($conn, "SELECT * FROM newcolleg");
                                        while ($prorow = mysqli_fetch_assoc($prosql)) {
                                
                                    ?>
                                <tr>
                                        <td><?= $prorow['id'] ;?></td>
                                        <td><?= $prorow['title'] ;?></td>
                                        <td><img width="60px" src="images/colleg/<?= $prorow['image'] ;?>"> </td>
                                        <td><?= $prorow['title1'] ;?></td>
                                        <td><?= $prorow['description'] ;?></td>
                                         <td><?= $prorow['date'] ;?></td>
                                        <td>
                                                <a href="edit_newcollg.php?id=<?= $prorow['id'] ;?>" class="btn btn-success"><span><i class="fa fa-edit"></i></span>
                                                </a>
                                                <a href="delete_newcollg.php?id=<?= $prorow['id'] ;?>" class="btn btn-danger"> <span><i class="fa fa-trash"></i></span>
                                                </a>
                                        </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>id </th>
                                    <th>  title </th>
                                    <th> Image</th>
                                    <th>  description title1 </th>
                                    <th>  description </th>
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