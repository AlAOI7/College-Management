 <!---------------- Session starts form here ----------------------->
 <?php
	session_start();
	if (!$_SESSION["LoginAdmin"]) {
		header('location:../login/login.php');
	}
	require_once "../connection/connection.php";
	?>
 <!---------------- Session Ends form here ------------------------>
 <title>لوحة تحكم علوم البيانات</title>


 <?php require "nav.php"; ?>

 <?php require "sidemenu.php"; ?>


 <div class="page-wrapper">

     <div class="page-breadcrumb">
         <div class="row">
             <div class="col-12 d-flex no-block align-items-center">
                 <h4 class="page-title">لوحة التحكم</h4>
                 <div class="ml-auto text-right">
                     <nav aria-label="breadcrumb">
                         <ol class="breadcru mb">
                             <li class="breadcrumb"><a href="index.php">الرئيسية</a></li>
                             <li class="breadcrumb active" aria-current="page">مكتبة</li>
                         </ol>
                     </nav>
                 </div>
             </div>
         </div>
     </div>
     <div class="container-fluid">

         <div class="row">
             <!-- Column -->
             <div class="col-md-6 col-lg-3">
                 <div class="card card-hover">
                     <div class="box bg-cyan text-center">
                         <a href="admin-index.php">
                             <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                             <h6 class="text-white">لوحة التحكم</h6>
                         </a>
                     </div>
                 </div>
             </div>

             <!-- Column -->
             <div class="col-md-6 col-lg-3">
                 <div class="card card-hover">
                     <div class="box bg-warning text-center">
                         <a href="teacher.php">
                             <h1 class="font-light text-white"><i class="far fa-plus-square"></i></h1>
                             <h6 class="text-white">الدكتور</h6>
                         </a>
                     </div>
                 </div>
             </div>
             <div class="col-md-6 col-lg-3">
                 <div class="card card-hover">
                     <div class="box bg-warning text-center">
                         <a href="Student.php">
                             <h1 class="font-light text-white"><i class="far fa-plus-square">

                                 </i></h1>
                             <h6 class="text-white"> الطلاب</h6>
                         </a>
                     </div>
                 </div>
             </div>
             <div class="col-md-6 col-lg-3">
                 <div class="card card-hover">
                     <div class="box bg-warning text-center">
                         <a href="index_banner.php">
                             <h1 class="font-light text-white">
                                 <i class="far fa-plus-square">

                                 </i>
                             </h1>
                             <h6 class="text-white">اعلانات</h6>
                         </a>
                     </div>
                 </div>
             </div>
             <!-- Column -->
             <div class="col-md-6 col-lg-3">
                 <div class="card card-hover">
                     <div class="box bg-success text-center">
                         <a href="/index_newdepartmint.php">
                             <h1 class="font-light text-white"><i class="fas fa-shopping-bag"></i></h1>
                             <h6 class="text-white"> اعلانات القسم</h6>
                         </a>
                     </div>
                 </div>
             </div>
             <div class="col-md-6 col-lg-3">
                 <div class="card card-hover">
                     <div class="box bg-success text-center">
                         <a href="index_newcollg.php">
                             <h1 class="font-light text-white"><i class="fas fa-shopping-bag"></i></h1>
                             <h6 class="text-white"> اعلانات الكلية</h6>
                         </a>
                     </div>
                 </div>
             </div>
             <div class="col-md-6 col-lg-3">
                 <div class="card card-hover">
                     <div class="box bg-success text-center">
                         <a href="add-examschedule.php">
                             <h1 class="font-light text-white"><i class="fas fa-shopping-bag"></i></h1>
                             <h6 class="text-white"> اضافة جدول اختبار</h6>
                         </a>
                     </div>
                 </div>
             </div>
             <div class="col-md-6 col-lg-3">
                 <div class="card card-hover">
                     <div class="box bg-success text-center">
                         <a href="add-courslevel.php">
                             <h1 class="font-light text-white"><i class="fas fa-shopping-bag"></i></h1>
                             <h6 class="text-white"> اضافة مادة الى مستوى</h6>
                         </a>
                     </div>
                 </div>
             </div>
             <div class="col-md-6 col-lg-3">
                 <div class="card card-hover">
                     <div class="box bg-info text-center">
                         <a href="add_course.php">
                             <h1 class="font-light text-white">
                                 <i class="fas fa-file-alt">

                                 </i>
                             </h1>
                             <h6 class="text-white">اضافة منهج</h6>
                         </a>
                     </div>
                 </div>
             </div>
             <div class="col-md-6 col-lg-3">
                 <div class="card card-hover">
                     <div class="box bg-info text-center">
                         <a href="esultclass.php">
                             <h1 class="font-light text-white">
                                 <i class="fas fa-file-alt">

                                 </i>
                             </h1>
                             <h6 class="text-white">نتائج </h6>
                         </a>
                     </div>
                 </div>
             </div>

             <!-- Column -->
             <div class="col-md-6 col-lg-3">
                 <div class="card card-hover">
                     <div class="box bg-danger text-center">
                         <a href="index_lectures.php">
                             <h1 class="font-light text-white"><i class="far fa-envelope"></i></h1>
                             <h6 class="text-white">جدول المحاضرات</h6>
                         </a>
                     </div>
                 </div>
             </div>

             <div class="col-md-6 col-lg-3">
                 <div class="card card-hover">
                     <div class="box text-center" style="background-color: #FB0881">
                         <a href="manage-accounts.php">
                             <h1 class="font-light text-white"><i class="fas fa-cogs"></i></h1>
                             <h6 class="text-white">الاعدادات</h6>
                         </a>
                     </div>
                 </div>
             </div>
             <div class="col-md-6 col-lg-3">
                 <div class="card card-hover">
                     <div class="box bg-info text-center">
                         <a href="index_about.php">
                             <h1 class="font-light text-white"><i class="fas fa-file-alt"></i></h1>
                             <h6 class="text-white">من نخن</h6>
                         </a>
                     </div>
                 </div>
             </div>




         </div>

     </div>
 </div>


 <?php require "footer.php"; ?>