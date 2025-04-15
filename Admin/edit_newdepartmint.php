<?php require "inc/security.php"; ?>
 <?php require "nav.php"; ?>
<?php require "sidemenu.php"; ?>

<div class="page-wrapper">
    <div class="row1">
        <div class="col-md-12">
            <div class="card">
                <form action="inc/update-newdepartmint.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="card-body">
                        <h4 class="card-title"> صفحة التعديل </h4>

                        <?php
                         if (isset($_POST['submit'])) {
                            $target = "images/dep/".basename($_FILES['image']['name']);
                            $title = mysqli_escape_string($conn, $_POST['title']);
                            $date = mysqli_escape_string($conn, $_POST['date']);
                            $description = mysqli_escape_string($conn, $_POST['description']);
                            $title1 = mysqli_escape_string($conn, $_POST['title1']);
                            $image = $_FILES['image']['name'];
                          
                            $sql = mysqli_query($conn, "INSERT INTO newdept (title, description,date,image,title1)
                            VALUES ('$title', '$description','$date', '$image','$title1')");
                            move_uploaded_file($_FILES['image']['tmp_name'], $target);
                            if ($sql) {
                                echo "<script> alert('اضافة الى صفحة الافته...!!!') </script>";
                                echo "<script> location = 'index_newdepartmint.php' </script>";
                            }
                        }
                        ?>
                        <?php
                        $sql = mysqli_query($conn, 'SELECT * FROM newdept');
                        $row = mysqli_fetch_assoc($sql);
                        ?>	

                                <div class="form-group row">
                                        <label for="title" class="col-sm-3 text-right control-label col-form-label"> العنوان  </label>
                                        <div class="col-sm-9">
                                            <input name="title" type="text" class="form-control" id="title" value="<?php echo $row['title']; ?>">
                                        </div>
                                    </div>
                                   
                                    <div class="form-group row">
                                        <label for="description" class="col-sm-3 text-right control-label col-form-label">وصف </label>
                                        <div class="col-sm-9">
                                            <textarea id="description" class="form-control" name="description"><?php echo $row['description']; ?></textarea>
										</div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="date" class="col-sm-3 text-right control-label col-form-label"> تاريخ النشر </label>
                                        <div class="col-sm-9">
                                            <input name="date" type="date" class="form-control" id="date" value="<?php echo $row['date']; ?>" >
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="title2" class="col-sm-3 text-right control-label col-form-label">  
                                            الصورة </label>


                                        <div class="col-sm-9">
                                            <input name="image" type="file" class="form-control" id="file" />
                                            <img  src="images/dep/<?= $row['image'] ;?>" alt="image" style="width: 100px; height: 100px;">
                                        
                                        </div>
                                    </div>
        
                                </div>

            </div>
            <div class="border-top">
                <div class="card-body">
                    <button name="submit" type="submit" class="btn btn-primary">اضافة</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>



<?php require 'footer.php'; ?>
