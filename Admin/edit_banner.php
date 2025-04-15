<?php require "inc/security.php"; ?>
<?php require "nav.php"; ?>
<?php require "sidemenu.php"; ?>

<div class="page-wrapper">
    <div class="row1">
        <div class="col-md-12">
            <div class="card">
                <form action="inc/updute-banner.php" method="post" class="form-horizontal"
                    enctype="multipart/form-data">
                    <div class="card-body">
                        <h4 class="card-title"> صفحة الخدمات </h4>

                        <?php
                        if (isset($_POST['submit'])) {
                            $target = 'images/banner/' . basename($_FILES['image']['name']);
                            $name = mysqli_escape_string($conn, $_POST['name']);
                            $description = mysqli_escape_string($conn, $_POST['description']);
                            $short = mysqli_escape_string($conn, $_POST['short']);
                            
                            $image = $_FILES['image']['name'];
                            $sql = mysqli_query(   $conn, "INSERT INTO bannercolleg (name,description,short,image) VALUES ('$name','$description','$short','$image')"  );
                            move_uploaded_file($_FILES['image']['tmp_name'], $target);
                            if ($sql) {
                                echo "<script> alert('اضافة الى صفحة الافته...!!!') </script>";
                                echo "<script> location = 'edit_banner.php' </script>";
                            }
                        }
                        ?>
                        <?php
                        $sql = mysqli_query($conn, 'SELECT * FROM bannercolleg');
                        $row = mysqli_fetch_assoc($sql);
                        ?>


                        <div class="form-group ">
                            <label for="title" class="col-sm-3 text-right control-label col-form-label"> عنوان </label>
                            <div class="col-sm-9">
                                <input name="name" type="text" class="form-control" id="name"
                                    value="<?php echo $row['name']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-3 text-right control-label col-form-label">وصف
                            </label>
                            <div class="col-sm-9">
                                <textarea id="description" class="form-control"
                                    name="description"><?php echo $row['description']; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="short" class="col-sm-3 text-right control-label col-form-label">وصف
                            </label>
                            <div class="col-sm-9">
                                <textarea id="short" class="form-control"
                                    name="short"><?php echo $row['short']; ?></textarea>
                            </div>
                        </div>


                        <div class="form-group ">
                            <label for="title2" class="col-sm-3 text-right control-label col-form-label">
                                الصورة </label>


                            <div class="col-sm-9">
                                <input name="image" type="file" class="form-control" id="file" />
                                <img src="images/banner/<?= $row['image'] ;?>" alt="image"
                                    style="width: 100px; height: 100px;">

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