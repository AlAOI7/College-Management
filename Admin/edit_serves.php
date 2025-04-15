<?php require "inc/security.php"; ?>
<?php require "nav.php"; ?>
<?php require "sidemenu.php"; ?>

<div class="page-wrapper">
    <div class="row1">
        <div class="col-md-12">
            <div class="card">
                <form action="inc/updute-serves.php" method="post" class="form-horizontal"
                    enctype="multipart/form-data">
                    <div class="card-body">
                        <h4 class="card-title"> صفحة الخدمات </h4>

                        <?php
                        if (isset($_POST['submit'])) {
                            $target = 'images/serves/' . basename($_FILES['image']['name']);
                            $title = mysqli_escape_string($conn, $_POST['title']);
                            $phone = mysqli_escape_string($conn, $_POST['phone']);
                            $otherphone = mysqli_escape_string($conn, $_POST['otherphone']);
                            $email = mysqli_escape_string($conn, $_POST['email']);
                            $fecboock = mysqli_escape_string($conn, $_POST['fecboock']);
                            
                            $image = $_FILES['image']['name'];
                            $sql = mysqli_query(   $conn, "INSERT INTO serves (title,phone,otherphone,email,fecboock,image)
                             VALUES ('$title','$phone','$otherphone','$email','$fecboock','$image')"  );
                            move_uploaded_file($_FILES['image']['tmp_name'], $target);
                            if ($sql) {
                                echo "<script> alert('اضافة الى صفحة الخدمات...!!!') </script>";
                                echo "<script> location = 'edit_serves.php' </script>";
                            }
                        }
                        ?>
                        <?php
                        $sql = mysqli_query($conn, 'SELECT * FROM serves');
                        $row = mysqli_fetch_assoc($sql);
                        ?>


                        <div class="form-group ">
                            <label for="title" class="col-sm-3 text-right control-label col-form-label"> عنوان </label>
                            <div class="col-sm-9">
                                <input name="title" type="text" class="form-control" id="title"
                                    value="<?php echo $row['title']; ?>">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="title" class="col-sm-3 text-right control-label col-form-label"> رقم الهاتف
                            </label>
                            <div class="col-sm-9">
                                <input name="phone" type="number" class="form-control" id="phone"
                                    value="<?php echo $row['phone']; ?>">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="title" class="col-sm-3 text-right control-label col-form-label"> رقم الهاتف
                                الاخر </label>
                            <div class="col-sm-9">
                                <input name="otherphone" type="number" class="form-control" id="otherphone"
                                    value="<?php echo $row['otherphone']; ?>">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="email class=" col-sm-3 text-right control-label col-form-label"> البريد
                                الالكتروني </label>
                            <div class="col-sm-9">
                                <input name="email" type="email" class="form-control" id="email"
                                    value="<?php echo $row['email']; ?>">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="fecboock" class="col-sm-3 text-right control-label col-form-label"> رابط
                                الفيسبوك
                            </label>
                            <div class="col-sm-9">
                                <input name="fecboock" type="text" class="form-control" id="fecboock"
                                    value="<?php echo $row['fecboock']; ?>">
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="title2" class="col-sm-3 text-right control-label col-form-label">
                                الصورة </label>


                            <div class="col-sm-9">
                                <input name="image" type="file" class="form-control" id="file" />
                                <img src="images/serves/<?= $row['image'] ;?>" alt="image"
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