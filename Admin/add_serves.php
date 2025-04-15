<?php require "inc/security.php"; ?>
<?php require "nav.php"; ?>
<?php require "sidemenu.php"; ?>

<?php  
  if (isset($_POST['submit'])) {
    $target = "images/serves/".basename($_FILES['image']['name']);
    $title = mysqli_escape_string($conn, $_POST['title']);
    $phone = mysqli_escape_string($conn, $_POST['phone']);
    $otherphone = mysqli_escape_string($conn, $_POST['otherphone']);
    $email = mysqli_escape_string($conn, $_POST['email']);
    $fecboock = mysqli_escape_string($conn, $_POST['fecboock']);
    
    $image = $_FILES['image']['name'];
 
  
  
    $sql = mysqli_query($conn, "INSERT INTO serves (title,phone,otherphone,email,fecboock,image)
    VALUES ('$title','$phone','$otherphone','$email','$fecboock','$image')");
    move_uploaded_file($_FILES['image']['tmp_name'], $target);

    if ($sql) {
      echo "<script> alert('New serves added...!!!') </script>";
      echo "<script> location = 'index_serves.php' </script>";
    }
 }
?>


<div class="page-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="card-body">
                        <h4 class="card-title">اضافة خدمة جديد </h4>

                        <div class="form-group row">
                            <label for="title" class="col-sm-3 text-right control-label col-form-label"> العنوان
                            </label>
                            <div class="col-sm-9">
                                <input name="title" type="text" class="form-control" id="title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-3 text-right control-label col-form-label"> رفم الهاتف
                            </label>
                            <div class="col-sm-9">
                                <input name="phone" type="number" class="form-control" id="phone">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="otherphone" class="col-sm-3 text-right control-label col-form-label"> رقم هاتف
                                اخر
                            </label>
                            <div class="col-sm-9">
                                <input name="otherphone" type="number" class="form-control" id="otherphone">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nameemail" class="col-sm-3 text-right control-label col-form-label">
                                البريد الالكتروني
                            </label>
                            <div class="col-sm-9">
                                <input name="email" type="email" class="form-control" id="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fecboock" class="col-sm-3 text-right control-label col-form-label"> رابط
                                الفيسبوك
                            </label>
                            <div class="col-sm-9">fecboock
                                <input name="fecboock" type="text" class="form-control" id="name">
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="image" class="col-sm-3 text-right control-label col-form-label">صورة
                                العنوان</label>
                            <div class="col-sm-9">
                                <input name="image" type="file" class="form-control" id="file" />
                            </div>
                        </div>

                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button name="submit" type="submit" class="btn btn-warning">اضافة</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<?php require "footer.php" ; ?>