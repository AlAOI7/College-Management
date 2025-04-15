<?php require "inc/security.php"; ?>
 <?php require "nav.php"; ?>
<?php require "sidemenu.php"; ?>

<?php  
  if (isset($_POST['submit'])) {
    $target = "images/banner/".basename($_FILES['image']['name']);
    $targett = "images/banner/".basename($_FILES['descimage']['name']);

    $namedoctor = mysqli_escape_string($conn, $_POST['namedoctor']);
    $descriptiontitle = mysqli_escape_string($conn, $_POST['descriptiontitle']);
    $description = mysqli_escape_string($conn, $_POST['description']);
    $datebanner = mysqli_escape_string($conn, $_POST['datebanner']);
    $image = $_FILES['image']['name'];
    $descimage = $_FILES['descimage']['name'];
  
    $sql = mysqli_query($conn, "INSERT INTO bannerdepart (namedoctor,descriptiontitle, description,datebanner,image,descimage)VALUES ('$namedoctor','$descriptiontitle', '$description','$datebanner', '$image','$descimage')");
    move_uploaded_file($_FILES['image']['tmp_name'], $target);
    move_uploaded_file($_FILES['descimage']['tmp_name'], $targett);

    if ($sql) {
      echo "<script> alert('New newdoctor added...!!!') </script>";
      echo "<script> location = 'index_newdoctor.php' </script>";
    }
 }
?>
		
		
		<div class="page-wrapper">
           <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="card-title">اضافة كلام من الدكتور </h4>

                                    <div class="form-group row">
                                        <label for="namedoctor" class="col-sm-3 text-right control-label col-form-label"> اسم الدكتور </label>
                                        <div class="col-sm-9">
                                            <input name="namedoctor" type="text" class="form-control" id="namedoctor" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="descriptiontitle" class="col-sm-3 text-right control-label col-form-label">العنوان </label>
                                        <div class="col-sm-9">
                                            <textarea id="descriptiontitle" class="form-control" name="descriptiontitle"></textarea>
										</div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="description" class="col-sm-3 text-right control-label col-form-label">وصف </label>
                                        <div class="col-sm-9">
                                            <textarea id="description" class="form-control" name="description"></textarea>
										</div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="datebanner" class="col-sm-3 text-right control-label col-form-label"> تاريخ النشر </label>
                                        <div class="col-sm-9">
                                            <input name="datebanner" type="date" class="form-control" id="datebanner" >
                                        </div>
                                    </div>
                                    
									<div class="form-group row">
                                        <label for="image" class="col-sm-3 text-right control-label col-form-label">صورة الدكتور</label>
                                        <div class="col-sm-9">
                                            <input name="image" type="file" class="form-control" id="file"  />
										    </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="descimage" class="col-sm-3 text-right control-label col-form-label">صورة الوصف</label>
                                        <div class="col-sm-9">
                                            <input name="descimage" type="file" class="form-control" id="file"  />
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