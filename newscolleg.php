<?php include('common/header.php') ?>
<?php include('connection/connection.php') ?>


<!--************************************
				اعلانات الكلية
		*************************************-->
<div class="tg-innerbanner">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ol class="tg-breadcrumb">
                    <li><a href="javascript:void(0);">الصفحة الرئيسية</a></li>
                    <li class="tg-active">اخبار الكلية</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!--************************************Main Start	*************************************-->
<main id="tg-main" class="tg-main tg-haslayout">
    <div class="container">
        <div class="row">
            <div id="tg-twocolumns" class="tg-twocolumns">
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9 ">
                    <div id="tg-content" class="tg-content">
                        <div class="tg-titleborder">
                            <h2>اخبار الكلية</h2>
                        </div>
                        <div class="tg-newsandarticle tg-list">
                            <div class="row">
                            <?php  
                                    $newcollg = mysqli_query($conn, "SELECT * FROM newcolleg  ");
                                    while ($newcolleg = mysqli_fetch_assoc($newcollg)) {
                                    ?>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <article class="tg-themepost tg-newspost">
                                        <figure class="tg-featuredimg">
                                            <a href="javascript:void(0);">
                                                <img src="admin/images/colleg/<?= $newcolleg['image'] ;?>" alt="image description">
                                            </a>
                                        </figure>
                                        <div class="tg-themepostcontent">
                                            <ul class="tg-matadata">
                                                <li>
                                                    <a href="javascript:void(0);">
                                                        <i class="fa fa-calendar"></i>
                                                        <span><?= $newcolleg['date'] ;?></span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="tg-themeposttitle">
                                                <h3><a href="newsdetailcolleg.php?id=<?= $newcolleg['id'] ?>"><?= $newcolleg['title'] ;?></a></h3>
                                            </div>
                                            <div class="tg-description">
                                                <p><?= $newcolleg['title1'] ;?>...</p>
                                            </div>
                                            <a class="tg-btn tg-btn-sm" href="newsdetailcolleg.php?id=<?= $newcolleg['id'] ?>">قراءه اكثر </a>

                                         
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
    </div>
</main>
<!--************************************Main End*************************************-->
<?php include('common/footer.php') ?>