<!-- وصف الاعلانات الخاصه بلقسم -->
<?php require "common/header.php"; ?>
<?php require "connection/connection.php"; ?>



<div class="tg-innerbanner">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ol class="tg-breadcrumb">
                    <li><a href="index.php">الصفحة الرئيسية</a></li>
                    <li><a href="javascript:void(0);">العلوم الادارية</a></li>
                    <li class="tg-active">علوم بيانات</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!--************************************	Main start  *************************************-->
<main id="tg-main" class="tg-main tg-haslayout">
    <div class="container">
        <div class="row">
            <div id="tg-twocolumns" class="tg-twocolumns">
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9 pull-right">
                    <div id="tg-content" class="tg-content">
                        <div class="tg-detailpage tg-eventdetailpage">


                            <?php

                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM bannerdepart WHERE id = $id";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                ?>
                            <article class="tg-themepost tg-eventpost">
                                <div class="tg-themepostcontent">
                                    <ul class="tg-themeposttags">
                                        <li><a href="javascript:void(0);">بيانات</a></li>
                                        <li><a href="javascript:void(0);">علوم</a></li>
                                    </ul>
                                    <div class="tg-themeposttitle">
                                        <h1><?= $row['namedoctor'] ;?></h1>
                                    </div>

                                </div>
                                <img src="admin/images/banner/<?= $row['image'] ;?>" alt=" image description">
                                </figure>
                                <div id="tg-eventcounter" class="tg-eventcounter tg-counter"></div>
                                <div class="tg-description">
                                    <h3>الوصف الاول</h3>
                                    <p><?= $row['descriptiontitle'] ;?></p>
                                    <h3>الوصف العام</h3>
                                    <ul class="tg-ullist tg-liststyledot">
                                        <li><?= $row['description']; ?></li>

                                    </ul>

                                    <img src="admin/images/banner/<?= $row['descimage'] ;?>" alt="image description">

                                    <div class="clea8rfix"></div>
                                    <!-- عرض نضيفه فيما بعد اذا لزم الامر لا شياء مهمه او يتم حذفه -->

                                    <h3>وسائل التواصل </h3>
                                    <ul class="tg-socialicons">
                                        <li class="tg-facebook"><a href="javascript:void(0);"><i
                                                    class="fa fa-facebook"></i></a></li>
                                        <li class="tg-twitter"><a href="javascript:void(0);"><i
                                                    class="fa fa-twitter"></i></a></li>
                                        <li class="tg-linkedin"><a href="javascript:void(0);"><i
                                                    class="fa fa-linkedin"></i></a></li>
                                        <li class="tg-googleplus"><a href="javascript:void(0);"><i
                                                    class="fa fa-google-plus"></i></a></li>
                                        <li class="tg-rss"><a href="javascript:void(0);"><i class="fa fa-rss"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </article>
                            <?php  } else {  echo " لايوجد وصف ."; }
                               } else { echo "Invalid request.";  }
                               ?>
                            <!-- اعلانات القسم -->
                            <div class="tg-relatedthemeposts">
                                <div class="tg-borderheading">
                                    <h2>اعلانات القسم</h2>
                                </div>
                                <div id="tg-latestnewsslider" class="tg-latestnewsslider owl-carousel tg-posts">

                                    <?php  
                                        $newdepart = mysqli_query($conn, "SELECT * FROM newdept  ");
                                        while ($newdepartmint = mysqli_fetch_assoc($newdepart)) {
                                        ?>
                                    <div class="item">
                                        <article class="tg-themepost tg-eventpost">
                                            <figure class="tg-featuredimg">
                                                <a href="javascript:void(0);">
                                                    <img src="admin/images/dep/<?= $newdepartmint['image'] ;?>"
                                                        alt="image description">
                                                </a>
                                            </figure>
                                            <div class="tg-themepostcontent">
                                                <ul class="tg-themeposttags">
                                                    <li><a href="javascript:void(0);">البيانات</a></li>
                                                    <li><a href="javascript:void(0);">علوم</a></li>
                                                </ul>
                                                <div class="tg-themeposttitle">
                                                    <h3><a
                                                            href="newdetaildeprt.php?id=<?= $newdepartmint['id'] ?>"><?= $newdepartmint['title'] ;?></a>
                                                    </h3>
                                                </div>
                                                <ul class="tg-matadata">
                                                    <li>
                                                        <a href="javascript:void(0);">
                                                            <i class="fa fa-calendar"></i>
                                                            <span><?= $newdepartmint['date'] ;?></span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">
                                                            <i class="fa fa-location-arrow"></i>
                                                            <span>علوم بيانات</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <a class="tg-btn tg-btn-sm"
                                                    href="newdetaildeprt.php?id=<?= $newdepartmint['id'] ?>"> معلومات
                                                    اكثر</a>
                                            </div>
                                        </article>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 pull-left">
                    <aside id="tg-sidebar" class="tg-sidebar">
                        <div class="tg-widget tg-widgetsearchcourse">
                            <div class="tg-widgettitle">
                                <h3>البحث</h3>
                            </div>
                            <div class="tg-widgetcontent">
                                <form class="tg-formtheme tg-formsearchcourse">
                                    <fieldset>
                                        <div class="tg-inputwithicon">
                                            <i class="icon-book"></i>
                                            <input type="search" name="keyword" class="form-control" placeholder="النص">
                                        </div>
                                        <button type="submit" class="tg-btn">ابحث </button>

                                    </fieldset>
                                </form>
                            </div>
                        </div>
                        <div class="tg-widget tg-widgetlatestcourses">
                            <div class="tg-widgettitle">
                                <h3>اخبار الدكاتره</h3>
                            </div>
                            <div class="tg-widgetcontent">
                                <?php  
                                    $bannerr = mysqli_query($conn, "SELECT * FROM bannerdepart  ");
                                    while ($doc = mysqli_fetch_assoc($bannerr)) {
                                    ?>
                                <article class="tg-campus tg-campusleftthumb">
                                    <figure class="tg-featuredimg">
                                        <a href="doctro_ditails.php?id=<?= $doc['id'] ?>">
                                            <img src="admin/images/banner/<?= $doc['image'] ;?>"
                                                alt="image description">
                                        </a>
                                    </figure>
                                    <div class="tg-campuscontent">
                                        <div class="tg-datetime">
                                            <i class="fa fa-calendar"></i>
                                            <span><?= $doc['datebanner'] ;?></span>
                                        </div>
                                        <div class="tg-campustitle">
                                            <h3><a
                                                    href="doctro_ditails.php?id=<?= $doc['id'] ?>"><?= $doc['descriptiontitle'] ;?></a>
                                            </h3>
                                        </div>
                                    </div>
                                </article>
                                <?php } ?>
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-md-12 ">
                    <div class="tg-commentssection">
                        <div class="tg-titleborder">
                            <h2>تعليقات</h2>
                        </div>
                        <ul id="tg-comments" class="tg-comments">
                            <li>
                                <div class="tg-comment">
                                    <figure><a href="javascript:void(0);"><img src="images/img-19.jpg"
                                                alt="image description"></a>
                                    </figure>
                                    <div class="tg-commentcontent">
                                        <div class="tg-commenthead">
                                            <h4><a href="javascript:void(0);">اسم صاحب التعليق</a></h4>
                                            <span>June 27, 2015</span>
                                            <a class="tg-btncommentreply" href="javascript:void(0);">
                                                <i class="fa fa-reply"></i>
                                                <em>reply</em>
                                            </a>
                                        </div>
                                        <div class="tg-description">
                                            <p>التعليق</p>
                                        </div>
                                    </div>
                                </div>
                                <ul class="tg-commentchild">
                                    <li>
                                        <div class="tg-comment">
                                            <figure><a href="javascript:void(0);"><img src="images/img-20.jpg"
                                                        alt="image description"></a></figure>
                                            <div class="tg-commentcontent">
                                                <div class="tg-commenthead">
                                                    <h4><a href="javascript:void(0);">اسم صاحب التعليق</a></h4>
                                                    <span>June 27, 2015</span>
                                                    <a class="tg-btncommentreply" href="javascript:void(0);">
                                                        <i class="fa fa-reply"></i>
                                                        <em>reply</em>
                                                    </a>
                                                </div>
                                                <div class="tg-description">
                                                    <p>التعليق.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <div class="tg-comment">
                                    <figure><a href="javascript:void(0);"><img src="images/img-21.jpg"
                                                alt="image description"></a>
                                    </figure>
                                    <div class="tg-commentcontent">
                                        <div class="tg-commenthead">
                                            <h4><a href="javascript:void(0);">اسم العميل</a></h4>
                                            <span>June 27, 2015</span>
                                            <a class="tg-btncommentreply" href="javascript:void(0);">
                                                <i class="fa fa-reply"></i>
                                                <em>رد</em>
                                            </a>
                                        </div>
                                        <div class="tg-description">
                                            <p>التعليق.</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="tg-postcomments">
                        <div class="tg-titleborder">
                            <h2>اضف تعليق</h2>
                        </div>
                        <form class="tg-formtheme tg-formpostcomment">
                            <fieldset>
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="الاسم*">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control"
                                        placeholder="Email* (الرجاء اضافة البريد الالكتروني.)">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="subject" class="form-control" placeholder="الموضوع">
                                </div>
                                <div class="form-group">
                                    <textarea name="Comment" class="form-control" placeholder="التعليق"></textarea>
                                </div>
                                <button class="tg-btn" type="submit">اضافة</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
<!--************************************	Main End  *************************************-->
<?php $conn->close();
?>
<?php include('common/footer.php') ?>