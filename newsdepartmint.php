<?php include('common/header.php') ?>
<?php include('connection/connection.php') ?>

<!--************************************
			اعلانات القسم
		*************************************-->
<div class="tg-innerbanner">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ol class="tg-breadcrumb">
                    <li><a href="javascript:void(0);">الصفحة الرئيسية</a></li>
                    <li class="tg-active">اخبار القسم</li>
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
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div id="tg-content" class="tg-content">
                    <div class="tg-titleborder">
                        <h2>اخبار القسم</h2>
                    </div>
                    <div class="tg-newsandarticle tg-grid">
                        <div class="row">
                        <?php  
                            $newdepart = mysqli_query($conn, "SELECT * FROM newdept  ");
                            while ($newdepartmint = mysqli_fetch_assoc($newdepart)) {
                            ?>
                            <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                <article class="tg-themepost tg-newspost">
                                    <figure class="tg-featuredimg">
                                        <a href="javascript:void(0);">
                                            <img src="admin/images/dep/<?= $newdepartmint['image'] ;?>" alt="image description">
                                        </a>
                                    </figure>
                                    <div class="tg-themepostcontent">
                                        <ul class="tg-matadata">
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <i class="fa fa-calendar"></i>
                                                    <span><?= $newdepartmint['date'] ;?></span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tg-themeposttitle">
                                            <h3><a href="newdetaildeprt.php?id=<?= $newdepartmint['id'] ?>"><?= $newdepartmint['title'] ;?></a></h3>
                                        </div>
                                        <div class="tg-description">
                                            <p><?= $newdepartmint['title1'] ;?>... <a href="newdetaildeprt.php?id=<?= $newdepartmint['id'] ?>">قراءه اكثر </a></p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <nav class="tg-pagination">
                        <ul>
                            <li class="tg-prevpage"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li class="tg-active"><a href="#">5</a></li>
                            <li>...</li>
                            <li><a href="#">10</a></li>
                            <li class="tg-nextpage"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</main>
<!--************************************
				Main End
		*************************************-->
<!--************************************
				Footer Start
		*************************************-->
<?php include('common/footer.php') ?>