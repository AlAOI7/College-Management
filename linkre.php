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
                    <li class="tg-active"> مراجع الكترونية</li>
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
                            <h2> روابط مراجع الكترونية </h2>
                        </div>


                        <div role="tabpanel" class="tab-pane" id="curriculum">
                            <div id="tg-content" class="tg-content">
                                <div class="tg-jobs">
                                    <div class="tg-heading">
                                        <h2>جدول المراجع الالكترونية </h2>
                                    </div>
                                    <div class="tg-themecollapsecontent">
                                        <table id="zero_config" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>

                                                    <th> الرقم</th>
                                                    <th> اسم المرجع</th>
                                                    <th> المستوى</th>
                                                    <th> الرابط </th>

                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php  
                                    $newcollg = mysqli_query($conn, "SELECT * FROM refrenc  ");
                                    while ($newcolleg = mysqli_fetch_assoc($newcollg)) {
                                    ?>
                                                <tr>
                                                    <td><?=$newcolleg['id'];?></td>
                                                    <td><?= $newcolleg['name'] ;?></td>
                                                    <td><?= $newcolleg['levelnamelink'] ;?></td>
                                                    <td><a
                                                            href="<?= $newcolleg['refrence'] ;?>"><?= $newcolleg['refrence'] ;?></a>
                                                    </td>





                                                </tr>
                                                <?php
                                    }
                                                    ?>

                                            </tbody>

                                        </table>
                                    </div>

                                </div>
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