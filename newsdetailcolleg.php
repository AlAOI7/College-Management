<?php require "common/header.php"; ?>
<?php require "connection/connection.php"; ?>
<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM newcolleg WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>
<div class="tg-innerbanner">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ol class="tg-breadcrumb">
                    <li><a href="javascript:void(0);">الصفحة الرئيسية</a></li>
                    <li><a href="javascript:void(0);">العلوم الادارية</a></li>
                    <li class="tg-active">علوم بيانات</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!--************************************
				Main Start
		*************************************-->
<main id="tg-main" class="tg-main tg-haslayout">
    <div class="container">
        <div class="row">
            <div id="tg-twocolumns" class="tg-twocolumns">
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9 >
                    <div id="tg-content" class="tg-content">
                        <div class="tg-detailpage tg-newsdetailpage">
                            <article class="tg-themepost tg-newspost">
                                <div class="tg-themepostcontent">
                                    <ul class="tg-themeposttags">
                                        <li><a href="javascript:void(0);">بيانات</a></li>
                                        <li><a href="javascript:void(0);">علوم</a></li>
                                    </ul>
                                    <div class="tg-themeposttitle">
                                        <h1><?php echo $row['title']; ?></h1>
                                    </div>
                                    <ul class="tg-themepostinfo">
                                        <li>
                                            <figure>
                                                <a href="javascript:void(0);">
                                                    <img src=""  alt="image description"></a>
                                            </figure>
                                            <div class="tg-infodata">
                                                <span>التاريخ:</span>
                                                <strong><a href="javascript:void(0);"><?php echo $row['date']; ?></a></strong>
                                            </div>
                                        </li>
                                       
                                        <li>
                                            <div class="tg-infodata">
                                                <span>الموقع :</span>
                                                <strong><a href="javascript:void(0);">جامعة تعز - كلية العلوم الاداربة</a></strong>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <figure class="tg-featuredimg"><img src="admin/images/colleg/<?php echo $row['image']; ?>" alt="image description"></figure>
                                <div class="tg-description">
                                   <blockquote><q><?php echo $row['title1']; ?></q></blockquote>
                                    <p><?php echo $row['description']; ?></p>
                                   </div>
                            </article>
                           
                        </div>
                    </div>
                </div>
              
            </div>
        </div>
    </div>
</main>
<!--************************************	Main End  *************************************-->
        <?php  } else {  echo " لايوجد اخبار ."; }
                               } else { echo "Invalid request.";  }
                               ?>
<?php include('common/footer.php') ?>WW