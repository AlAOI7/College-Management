<?php require "inc/security.php"; ?>
<?php require "nav.php"; ?>
<?php require "sidemenu.php"; ?>

<?php  
  if (isset($_POST['submit'])) {
    $target = "images/banner/".basename($_FILES['image']['name']);

    $name = mysqli_escape_string($conn, $_POST['name']);
    $description = mysqli_escape_string($conn, $_POST['description']);
     $short = mysqli_escape_string($conn, $_POST['short']);
    $image = $_FILES['image']['name'];
 
  
  
    $sql = mysqli_query($conn, "INSERT INTO bannercolleg (name, description,short, image)VALUES ('$name', '$description','$short',
     '$image')");
    move_uploaded_file($_FILES['image']['tmp_name'], $target);

    if ($sql) {
      echo "<script> alert('New banner added...!!!') </script>";
      echo "<script> location = 'index_banner.php' </script>";
    }
 }
?>


<div class="page-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="card-body">
                        <h4 class="card-title">اضافة اعلان جديد </h4>

                        <div class="form-group row">
                            <label for="name" class="col-sm-3 text-right control-label col-form-label"> العنوان </label>
                            <div class="col-sm-9">
                                <input name="name" type="text" class="form-control" id="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-3 text-right control-label col-form-label">وصف
                            </label>
                            <div class="col-sm-9">
                                <textarea id="description" class="form-control" name="description"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="short" class="col-sm-3 text-right control-label col-form-label">وصف قصير
                            </label>
                            <div class="col-sm-9">
                                <textarea id="short" class="form-control" name="short"></textarea>
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