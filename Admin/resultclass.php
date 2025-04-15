<?php
session_start();
error_reporting(0);
?>
<link rel="stylesheet" href="css/stylestyle.css" />
<?php require "nav.php" ; ?>
<?php require "sidemenu.php" ; ?>
 <main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 w-100">

    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
          <div class="content-wrapper">
                <div class="page-header">
                  <h3 class="page-title">عرض نتائج الطلاب </h3>
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="dashboard.php">لوحة التحكم</a></li>
                      <li class="breadcrumb-item active" aria-current="page">عرض نتائج الطلاب</li>
                    </ol>
                  </nav>
                </div>
                <div class="row">
                  <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-sm-flex align-items-center mb-4">
                          <h4 class="card-title mb-sm-0">  عرض نتائج الطلاب </h4>
                          <a href="add-result.php" class="text-dark ml-auto mb-3 mb-sm-0">  اضافة نتيجة طالب </a>
                        </div>
                        <?php
                                    $query30 = "SELECT id,max(id) FROM level";
                          $rs30 = $conn->query($query30);
                          $num30 = $rs30->num_rows;
                            $rowm = $rs30->fetch_assoc();
                              
                          $maxclssid1 = $rowm['max(id)'];
                          $maxclssid2 = $maxclssid1-1;?>
                          <form class="forms-sample" action="" enctype="multipart/form-data" method="POST" >
                              <div class="form-group  row mb-3">
                                <div class="col-xl-6">
                                  <label for="exampleInputEmail3">الصف</label>
                                  <select  name="levelid" class="form-control" onChange="getStudent(this.value);" required="required" >
                                        <option value="">--تحديد الصف--</option>
                                      <?php
                                        $qry1= "SELECT * FROM level  where id < '$maxclssid2' ORDER BY id ASC";
                                        $result1 = $conn->query($qry1);
                                        $num1 = $result1->num_rows;		
                                        if ($num1 > 0){
                                        while ($rows1 = $result1->fetch_assoc()){?>
                                        <option value="<?php echo $rows1['id'];?>" ><?php echo $rows1['levelname'].'  '.'-'.'  '.$rows1['section']; ?></option>
                                        <?php
                                            }}
                                          ?>  
                                  </select>
                                </div> 
                                <div class="col-xl-6">
                                  <label for="exampleInputEmail3"> العام الدراسي</label>
                                  <select  name="yearidd" class="form-control" required="required" >
                                        <?php
                                        $qry20= "SELECT * FROM collegyear ORDER BY id desc";
                                        $result20 = $conn->query($qry20);
                                        $num20 = $result20->num_rows;		
                                        if ($num20 > 0){
                                          while ($rows20 = $result20->fetch_assoc()){?>
                                          <option value="<?php echo $rows20['id'];?>" > <?php echo $rows20['yearcolleg'].'  '.'-'.'  '.$rows20['endyear'];?> </option>
                                          <?php
                                              }}
                                            ?>  
                                  </select>
                                </div>
                              </div>
                              <div class="form-group  row mb-3">
                                <div class="col-xl-6">
                                  <label for="exampleInputEmail3"> الفصل الدراسي</label>
                                  <select  name="sectionid" class="form-control" required="required" >
                                                <?php
                                                $qry1= "SELECT * FROM sectionyear ORDER BY id ASC";
                                                $result1 = $conn->query($qry1);
                                                $num1 = $result1->num_rows;		
                                                if ($num1 > 0){
                                                  while ($rows1 = $result1->fetch_assoc()){?>
                                                  
                                                  <option value="<?php echo $rows1['id'];?>" ><?php echo $rows1['sectionname']; ?></option>
                                                  <?php
                                                      }}
                                                    ?>  
                                  </select>
                                </div>
                              </div>
                                <button type="submit" class="btn btn-primary mr-2" name="submit">عرض</button>
                          </form>      
                      </div>
                          <?php
                              if(isset($_POST['submit'])){
                                $class=$_POST['levelid'];
                                $year=$_POST['yearidd'];
                                $section=$_POST['sectionid'];
                              ?>
                            <div class="row">
                              <div class="col-lg-12">
                                  <div class="card mb-4">
                                      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">جميع نتائج الطلاب </h6>
                                  
                                      </div>
                                      <div class="table-responsive p-3">
                                        <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                                          <thead class="thead-light">
                                            <tr>
                                                <th class="font-weight-bold">#</th>
                                                <th class="font-weight-bold">الطالب</th>
                                                    <?php
                                                    $query1 ="SELECT levelcourse.id,level.id,level.levelname,level.section,course.id,course.namecourse,course.id 
                                                      FROM levelcourse
                                                      INNER JOIN level ON level.id = levelcourse.levelid
                                                      INNER JOIN course ON course.id = levelcourse.coursid
                                                      where levelcourse.levelid='$class' ";
                                                      $rs1 = $conn->query($query1);
                                                      $num1 = $rs1->num_rows;
                                                        while ($rows1 = $rs1->fetch_assoc())
                                                          {
                                                          echo"  <th class='font-weight-bold'>".$rows1['namecourse']."</th>";
                                                          }
                                                        ?>
                                                <th class="font-weight-bold">المعدل</th>
                                                <th class="font-weight-bold">تعديل </th>
                                                <th class="font-weight-bold">حذف </th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <?php
                                              $query3 = "SELECT DISTINCT students.id,students.studentName,studresulte.studid
                                              FROM studresulte
                                            INNER JOIN students ON students.id = studresulte.studid
                                            where studresulte.levelid='$class' and studresulte.yearid='$year' and studresulte.secid='$section'";
                                                $rs3 = $conn->query($query3);
                                                $num3 = $rs3->num_rows;
                                                $sn=0;
                                                if($num3 > 0)
                                                { 
                                                while ($rows3 = $rs3->fetch_assoc())
                                                {
                                                    $sn = $sn + 1;
                                                    $stu=$rows3['id'];
                                                  echo"
                                                  <tr>
                                                  <td>".$sn."</td>
                                                  <td>".$rows3['studentName']."</td>";
                                                $query9 = "SELECT studresulte.id,level.id,level.levelname,level.section,course.namecourse,students.id,students.studentName,students.levelid,
                                                collegyear.id,collegyear.yearcolleg,collegyear.endyear,sectionyear.id,sectionyear.sectionname,sectionyear.id AS id,studresulte.id,studresulte.levelid,studresulte.studid,studresulte.avregtotal
                                                FROM studresulte
                                                INNER JOIN level ON level.id = studresulte.levelid
                                                INNER JOIN course ON course.id = studresulte.courseid
                                                INNER JOIN students ON students.id = studresulte.studid
                                                INNER JOIN collegyear ON collegyear.id = studresulte.yearid
                                                INNER JOIN sectionyear ON sectionyear.id = studresulte.secid
                                                where studresulte.studid='$stu' and studresulte.levelid='$class' and studresulte.yearid='$year' and studresulte.secid='$section'";

                                                $rs9 = $conn->query($query9);
                                                $num9= $rs9->num_rows;
                                                $cnt=1;
                                                $cou=0;
                                                $totlcount=0;
                                                $totalmarks=0;
                                                while ($rows9 = $rs9->fetch_assoc())
                                                {$totalmarks=$rows9['avregtotal'];
                                                      echo"
                                                  <td>".$rows9['avregtotal']."</td>";
                                                  $cnt=$cnt+1;
                                                  $totlcount+= $totalmarks;
                                                  $outof=($cnt-1)*100;
                                                $cou=$cou+$cnt;
                                                }
                                                $state=$totlcount*(100)/$outof;
                                                echo"
                                                <td style='color:#f00;'>".$state."</td>
                                                <td><a href='add-result.php?action=edit&studid=".$rows3['studid']."&levelid=".$rows3['levelid']."&yearid=".$rows3['yearid']."&secid=".$rows3['secid']."'><i class='fa fa-eye'></i></a></td>
                                                <td><a href='add-result.php?action=delete&studid=".$rows3['studid']."&levelid=".$rows3['levelid']."&yearid=".$rows3['yearid']."&secid=".$rows3['secid']."'> <i class='fa fa-trash'></i></a></td>
                                                  </tr>";
                                                }
                                                $titel=$cou+5;
                                                }
                                                else
                                                {
                                                  echo   
                                                  "<div class='alert alert-danger' role='alert'>
                                                  ! لايوجد بيانات
                                                  </div>";
                                                }

                                                ?>
                                          </tbody>
                                          <tfoot>
                                            <tr>
                                          <td colspan="<?php $titel;?>" align="center"><i class="icon-printer fa fas-print fa-2x" aria-hidden="true" style="cursor:pointer" OnClick="CallPrint(this.value)" ></i></td>
                                            </tr>
                                          </tfoot>
                                        </table>
                                      
                                      </div>
                                  </div>
                              </div>
                            </div>
                        <?php } ?> 
                    </div>
                  </div>
                </div>
          </div>
                       
        </div>
      </div>
    </div>
 </main>
                <script>

                  $(document).ready(function () {
                    $('#dataTable').DataTable(); // ID From dataTable 
                    $('#dataTableHover').DataTable(); // ID From dataTable with Hover
                  });
                </script>
                <script>
                          $(function($) {
                              $('#example').DataTable();

                              $('#example2').DataTable( {
                                  "scrollY":        "300px",
                                  "scrollCollapse": true,
                                  "paging":         false
                              } );

                              $('#example3').DataTable();
                          });

                                        function CallPrint(strid) {
                            var prtContent = document.getElementById("exampl");
                            var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
                            WinPrint.document.write(prtContent.innerHTML);
                          WinPrint.document.close();
                            WinPrint.focus();
                            WinPrint.print();
                            WinPrint.close();
                            }
                </script> <?php require "footer.php"; ?>