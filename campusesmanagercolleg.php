<?php include('common/header.php') ?>
<?php include('connection/connection.php') ?>

<div class="tg-innerserves">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ol class="tg-breadcrumb">
                    <li><a href="javascript:void(0);">الصفحة الرئيسية</a></li>
                    <li class="tg-active">الخدمات</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!--************************************
				Inner serves End
		*************************************-->
<!--************************************
				Main Start						
		*************************************-->
<main id="tg-main" class="tg-main tg-haslayout">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="tg-titleborder">
                    <h2>كل الخدمات</h2>
                </div>
                <div class="tg-maincampuses">
                    <div class="tg-themepost tg-campuses tg-maincampus">
                        <figure class="tg-campusimg">
                            <img src="images/campuses/weeeeeee.png" alt="image description">
                        </figure>
                        <div class="tg-themepostcontent">
                            <ul class="tg-capmusinfo">
                                <li>
                                    <i class="icon-location"></i>
                                    <address>مرحباً بك في جامعة تعز</address>
                                </li>
                                <li>
                                    <i class="icon-phone-handset"></i>
                                    <span>+774252137</span>
                                </li>
                                <li>
                                    <i class="icon-printer"></i>
                                    <span>+774252137</span>
                                </li>
                                <li>
                                    <a href="mailto:alaoi77alsho.@gmail.com">
                                        <i class="icon-envelope"></i>
                                        <span>alaoi77alsho.@gmail.com</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="رابط فيسبوك ">
                                        <i class="icon-facebook"></i>
                                        <span>facebook@facebook.com</span>
                                    </a>
                                </li>
                            </ul>
                            <button type="submit" class="tg-btn">قسم علوم البيانات</button>
                        </div>
                    </div>
                    <div class="tg-mapholder">
                        <div id="tg-campuseslocation" class="tg-campuseslocation"></div>
                        <div class="tg-map-controls">
                            <span id="doc-mapplus" class="doc-mapplus"><i class="fa fa-plus"></i></span>
                            <span id="doc-mapminus" class="doc-mapminus"><i class="fa fa-minus"></i></span>
                            <span id="doc-lock" class="doc-lock"><i class="fa fa-lock"></i></span>
                            <span id="tg-geolocation" class="tg-geolocation"><i class="fa fa-crosshairs"></i></span>
                        </div>
                    </div>
                </div>
                <div class="tg-othercampuses tg-campuses">

                    <div class="row">
                        <?php  
                    $servess = mysqli_query($conn, "SELECT * FROM serves  ");
                    while ($serves = mysqli_fetch_assoc($servess)) {
                    ?>
                        <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
                            <div class="tg-campus">
                                <div class="tg-themepost">
                                    <figure class="tg-othercampusimg">
                                        <img src="admin/images/serves/<?= $serves['image'] ;?>" alt="image description">
                                    </figure>
                                </div>
                                <ul class="tg-capmusinfo">
                                    <li>
                                        <i class="icon-location"></i>
                                        <address> <?= $serves['title'] ;?></address>
                                    </li>
                                    <li>
                                        <i class="icon-phone-handset"></i>
                                        <span>+ <?= $serves['phone'] ;?></span>
                                    </li>
                                    <li>
                                        <i class="icon-printer"></i>
                                        <span>+ <?= $serves['otherphone'] ;?></span>
                                    </li>
                                    <li>
                                        <a href="mailto:<?= $serves['email'] ;?>">
                                            <i class="icon-envelope"></i>
                                            <span> <?= $serves['email'] ;?></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href=" <?= $serves['fecboock'] ;?>">
                                            <i class="icon-facebook"></i>
                                            <span> رابط الفيسبوك</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!--************************************
				Main End
		*************************************-->
<?php include('common/footer.php') ?>