<?php include('common/header.php') ?>
<?php include('connection/connection.php') ?>

<!-- الاعلانات -->

<div class="clearfix"></div>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="tg-homebannervtwo">

                <div id="tg-homeslider" class="tg-homeslider owl-carousel tg-btnround tg-haslayout">
                    <?php  
							$bannerr = mysqli_query($conn, "SELECT * FROM bannercolleg  ");
							while ($banner = mysqli_fetch_assoc($bannerr)) {
							?>
                    <div class="item">
                        <figure>
                            <a href="banner_ditails.php?id=<?= $banner['id'] ?>">

                                <img src="admin/images/banner/<?= $banner['image'] ;?>" alt="image description">
                            </a>
                            <figcaption class="tg-slidercontent">
                                <div class="tg-slidercontentbox">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                                <div class="tg-titledescription">
                                                    <a class="tg-btn"
                                                        href="banner_ditails.php?id=<?= $banner['id'] ?>">قراءة
                                                        المزيد</a>
                                                    <h1>
                                                        <?= $banner['name'] ;?>
                                                    </h1>
                                                    <div class="tg-description">
                                                        <p>
                                                            <?= $banner['short'] ;?>..</p>

                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                    <?php } ?>
                </div>
                <div class="tg-noticeboardarea">
                    <div class="tg-widget tg-widgetadmissionform">
                        <div class="tg-widgetcontent">
                            <h3>فسم علوم البيانات</h3>
                            <div class="tg-description">
                                <p>
                                    هذه المشروع يختص في عرض البيانات الخاصه بلقسم</p>
                            </div>
                            <a class="tg-btn tg-btnicon" href="javascript:void(0);">
                                <i class="fa fa-file-pdf-o"></i>
                                <span>ادارة الطلاب</span>
                            </a>
                        </div>
                    </div>
                    <div class="tg-widget tg-widgetadmissionform">
                        <div class="tg-widgetcontent">
                            <h3>خاص بلطلاب </h3>
                            <div class="tg-description">
                                <p>بقوم بعرض المولد و المحاضرات ودرجات الطالب.</p>
                            </div>
                            <a class="tg-btn tg-btnicon" href="javascript:void(0);">
                                <i class="fa fa-file-pdf-o"></i>
                                <span>الطالب</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tg-tickerbox">
                <span>اخبار القسم:</span>
                <div id="tg-ticker" class="tg-ticker owl-carousel">
                    <div class="item">
                        <div class="tg-description">
                            <p>قسم علوم البيانات هذه المشروع بختص فقط ب قسم علوم البيانات</p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="tg-description">
                            <p>مشروع عرض درجات الطلاب والكورسات واداره.</p>
                        </div>
                    </div>

                </div>
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
                <!-- كلام رئيس القسم -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <section class="tg-sectionspace tg-haslayout">

                        <?php  
                                    $bannerr = mysqli_query($conn, "SELECT * FROM bannerdepart ");
                                    while ($doc = mysqli_fetch_assoc($bannerr)) {
                                    ?>
                        <div class="tg-shortcode tg-welcomeandgreeting tg-welcomeandgreeting-v2">
                            <figure><img src="admin/images/banner/<?= $doc['image'] ;?>" alt="image description">
                            </figure>
                            <div class="tg-shortcodetextbox">
                                <h2>مرحباً &amp; في قسم علوم البيانات!</h2>
                                <div class="tg-description">
                                    <p> <?= $doc['descriptiontitle'] ;?>...</p>
                                </div>
                                <span class="tg-name">Prof. <?= $doc['namedoctor'] ;?></span>
                                <span class="tg-designation">Vice Chancellor</span>
                                <div class="tg-btnpluslogo">
                                    <a class="tg-btn" href="doctro_ditails.php?id=<?= $doc['id'] ?>">read more</a>
                                    <strong class="tg-universitylogo">
                                        <a href="javascript:void(0);">
                                            <img style="width: 100px;height: 100px;"
                                                src="admin/images/banner/<?= $doc['descimage'] ;?>"
                                                alt="image description">
                                        </a>
                                    </strong>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </section>
                </div>

                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
                    <div id="tg-content" class="tg-content">

                        <!-- اخبار القسم -->
                        <section class="tg-sectionspace tg-haslayout">
                            <div class="tg-borderheading">
                                <h2>اخبار القسم</h2>
                            </div>
                            <div class="tg-events">
                                <div class="row">
                                    <?php  
                                                $newdepart = mysqli_query($conn, "SELECT * FROM newdept  ");
                                                while ($newdepartmint = mysqli_fetch_assoc($newdepart)) {
                                                ?>
                                    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                                        <article class="tg-themepost tg-eventpost">
                                            <figure class="tg-featuredimg">
                                                <a href="javascript:void(0);">
                                                    <img src="admin/images/dep/<?= $newdepartmint['image'] ;?>"
                                                        alt="image description">
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
                                                    <h3><a
                                                            href="newdetaildeprt.php?id=<?= $newdepartmint['id'] ?>"><?= $newdepartmint['title'] ;?></a>
                                                    </h3>
                                                </div>
                                                <div class="tg-description">
                                                    <p><?= $newdepartmint['title1'] ;?>... <a
                                                            href="newdetaildeprt.php?id=<?= $newdepartmint['id'] ?>">قراءه
                                                            اكثر </a></p>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </section>
                        <!-- صور الكلية -->
                        <section class="tg-sectionspace tg-haslayout">
                            <div class="row">
                                <!-- صور الكلية -->
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                    <div class="tg-glanceatuoeandk tg-glanceatuoeandkvtwo">
                                        <div class="tg-borderheading">
                                            <h2>صور للكلية</h2>
                                        </div>
                                        <ul class="tg-gallery">
                                            <li>
                                                <figure>
                                                    <a class="tg-btnview" href="Images/logo.jpg"
                                                        data-rel="prettyPhoto[glance]"><i
                                                            class="icon-magnifier"></i></a>
                                                    <img src="Images/logo.jpg" alt="image description">
                                                </figure>
                                            </li>
                                            <li>
                                                <figure>
                                                    <a class="tg-btnview" href="Images/glance/img-01.jpg"
                                                        data-rel="prettyPhoto[glance]"><i
                                                            class="icon-magnifier"></i></a>
                                                    <img src="Images/glance/img-01.jpg" alt="image description">
                                                </figure>
                                            </li>
                                            <li>
                                                <figure>
                                                    <a class="tg-btnview" href="Images/glance/img-02.jpg"
                                                        data-rel="prettyPhoto[glance]"><i
                                                            class="icon-magnifier"></i></a>
                                                    <img src="Images/glance/img-02.jpg" alt="image description">
                                                </figure>
                                            </li>
                                            <li>
                                                <figure>
                                                    <a class="tg-btnview" href="Images/glance/img-03.jpg"
                                                        data-rel="prettyPhoto[glance]"><i
                                                            class="icon-magnifier"></i></a>
                                                    <img src="Images/glance/img-03.jpg" alt="image description">
                                                </figure>
                                            </li>
                                            <li>
                                                <figure>
                                                    <a class="tg-btnview" href="Images/glance/img-04.jpg"
                                                        data-rel="prettyPhoto[glance]"><i
                                                            class="icon-magnifier"></i></a>
                                                    <img src="Images/glance/img-04.jpg" alt="image description">
                                                </figure>
                                            </li>
                                            <li>
                                                <figure>
                                                    <a class="tg-btnview" href="images/glance/img-05.jpg"
                                                        data-rel="prettyPhoto[glance]"><i
                                                            class="icon-magnifier"></i></a>
                                                    <img src="images/glance/img-05.jpg" alt="image description">
                                                </figure>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- الوصول السريع -->
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                    <div class="tg-widget tg-widgetquicklinks tg-widgetquicklinksvtwo">
                                        <div class="tg-borderheading">
                                            <h2>وصول سريع</h2>
                                        </div>
                                        <div class="tg-widgetcontent">
                                            <ul>
                                                <li><a href="method.php">المناهج</a></li>
                                                <li><a href="newstabledate.php">وقت المحاصرات</a></li>
                                                <li><a href="level.php">المستويات</a></li>
                                                <li><a href="newsdepartmint.php">اعلانات</a></li>
                                                <li><a href="newscolleg.php">اخبار مهمة</a></li>
                                                <li><a href="linrary.php"> المكتبة</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class="tg-sectionspace tg-haslayout">
                            <div class="tg-latestnews">
                                <div class="tg-borderheading">
                                    <h2>اخبار الكلية</h2>
                                </div>
                                <div id="tg-latestnewsslider" class="tg-latestnewsslider owl-carousel tg-posts">
                                    <?php  
                                                $newcollg = mysqli_query($conn, "SELECT * FROM newcolleg  ");
                                                while ($newcolleg = mysqli_fetch_assoc($newcollg)) {
                                                ?>
                                    <div class="item">
                                        <article class="tg-themepost tg-newspost">
                                            <figure class="tg-featuredimg">
                                                <a href="javascript:void(0);">
                                                    <img src="admin/images/colleg/<?= $newcolleg['image'] ;?>"
                                                        alt="image newcolleg">
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
                                                    <h3><a
                                                            href="newsdetailcolleg.php?id=<?= $newcolleg['id'] ?>"><?= $newcolleg['title'] ;?></a>
                                                    </h3>
                                                </div>
                                                <div class="tg-description">
                                                    <p> <a class="tg-btn tg-btn-sm"
                                                            href="newsdetailcolleg.php?id=<?= $newcolleg['id'] ?>">قراءه
                                                            اكثر </a></p>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="tg-btnsbox">

                                </div>
                            </div>
                        </section>

                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                    <aside id="tg-sidebar" class="tg-sidebar">
                        <div class="tg-widget">
                            <div class="tg-widgetcontent">
                                <form class="tg-formtheme tg-formsearch">
                                    <fieldset>
                                        <input type="search" name="search" class="form-control" placeholder="بحث سريع">
                                        <button type="submit" class="tg-btnsearch"><i
                                                class="icon-magnifier"></i></button>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                        <div class="tg-widget tg-widgetnoticeboard">
                            <div class="tg-widgettitle">
                                <h3>عن القسم</h3>
                            </div>
                            <div class="tg-widgetcontent">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0);">وصف اولي.</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">وصف اخر.</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">وصف.</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tg-widget tg-widgetadmissionform">
                            <div class="tg-widgetcontent">
                                <h3>تاريخ افتتاح القسم</h3>
                                <div class="tg-description">
                                    <p>الهدف من القسم التالي في الحياه العملية والمهنيه.</p>
                                </div>
                                <a class="tg-btn tg-btnicon" href="javascript:void(0);">
                                    <i class="fa fa-file-pdf-o"></i>
                                    <span>تحميل PDF</span>
                                </a>
                            </div>
                        </div>


                    </aside>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include('common/footer.php') ?>