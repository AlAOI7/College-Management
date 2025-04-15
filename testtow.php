<?php include('common/header.php') ?>



<main id="tg-main" class="tg-main tg-haslayout">
    <div class="container">
        <div class="row">
            <div id="tg-twocolumns" class="tg-twocolumns">

                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
                    <div id="tg-content" class="tg-content">
                        <div class="tg-jobs">
                            <div class="tg-heading">
                                <h2>جدول الاختبارات المستوى الثاني </h2>
                            </div>
                            <div class="tg-themecollapsecontent">
                                <table id="zero_config" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>



                                            <th class="font-weight-bold">الفصل</th>
                                            <th class="font-weight-bold">المادة</th>
                                            <th class="font-weight-bold">اليوم</th>
                                            <th class="font-weight-bold">التاريخ</th>
                                            <th class="font-weight-bold">وقت الاختبار</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
									$sql = "SELECT examschedule.id,level.levelname,level.section,level.level,level.id,course.namecourse,tbldayes.id,tbldayes.namedayes,
                                examschedule.id,examschedule.examdate,examschedule.time,examschedule.levelid,examschedule.courseid,examschedule.dayeid
                                    FROM examschedule
									INNER JOIN course ON course.id = examschedule.courseid
									 INNER JOIN tbldayes ON tbldayes.id = examschedule.dayeid
									INNER JOIN level ON level.id = examschedule.levelid 
                                        where  level=2 
                                           ORDER BY course.namecourse,level.levelname,examschedule.id ";
  
                                         $result = $conn->query($sql);
                                         $sn=0;
                                         if ($result->num_rows > 0) {           
                                        while($row = $result->fetch_assoc()) {
                                                        $sn = $sn + 1;  
                                              ?>
                                        <tr>

                                            <td><?= $row['levelname'] ;?>_ <?= $row['section'] ;?></td>
                                            <td><?=$row['namecourse'] ;?></td>
                                            <td><?=$row['namedayes'];?></td>
                                            <td><?=$row['examdate'] ;?></td>
                                            <td><?=$row['time'] ;?></td>



                                        </tr>
                                        <?php
										}
										} else {
										echo "<tr>
											<td colspan='8'> لايوجد بيانات!.</td>
										</tr>";
										}
                                     ?>

                                    </tbody>

                                </table>
                            </div>
                            <!-- <nav class="tg-pagination">
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
                            </nav> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>



<?php include('common/footer.php') ?>