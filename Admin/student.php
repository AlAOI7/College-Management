<link rel="stylesheet" href="css/stylestyle.css" />
<?php require "nav.php" ; ?>
<?php require "sidemenu.php" ; ?>


<!--*********************** PHP code end from here for data insertion into database ******************************* -->




<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 w-100">
    <div class="sub-main">


        <div class="row w-100">
            <div class="col-md-12 ml-2">
                <section class="mt-3">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="search_student.php" method="post">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">
                                        <h5>بحث:</h5>
                                    </label>
                                    <div class="d-flex">
                                        <input type="text" name="search" id="search" class="form form-control"
                                            placeholder="Enter I'd">
                                        <input class="btn btn-primary px-4 ml-4" type="submit" name="btnSearch"
                                            value="Search">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- <div class="col-md-12 pt-5 mb-2">
									
									<button type="button" class="btn btn-primary ml-auto" data-toggle="modal" data-target=".bd-example-modal-lg1">تعيين الموضوع</button>
									<div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header bg-info text-white">
														<h4 class="modal-title text-center">Assign Subjects To Student</h4>
													</div>
													<div class="modal-body">
														<form action="student.php" method="POST" enctype="multipart/form-data">
															<div class="row mt-3">
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="exampleInputEmail1">اختار الكورس:*</label>
																		<select class="browser-default custom-select" name="namecourse" required="">
																			<option >Select Course</option>
																			<?php
																				$query="select namecourse from course";
																				$run=mysqli_query($conn,$query);
																				while($row=mysqli_fetch_array($run)) {
																				echo	"<option value=".$row['namecourse'].">".$row['namecourse']."</option>";
																				}
																			?>
																		</select>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="exampleInputPassword1" required>ادخل السنه:*</label>
																		<input type="text" name="semester" class="form-control">
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="exampleInputPassword1">Enter Roll No:*</label>
																		<input type="text" name="roll_no" class="form-control">
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group"> putPassword1">Select Subject:*</label>
																		<select class="browser-default custom-select" name="subject_code" required="">
																			<option >Select Subject</option>
																			<?php
																				$query="select subject_code from course_subjects";
																				$run=mysqli_query($conn,$query);
																				while($row=mysqli_fetch_array($run)) {
																				echo	"<option value=".$row['subject_code'].">".$row['subject_code']."</option>";
																				}
																			?>
																		</select>
																	</div>
																</div>	
															</div>
															<div class="modal-footer">
																<input type="submit" class="btn btn-primary" name="btn_save2">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
															</div>
														</form>
													</div>
												</div>
										</div>
									</div>
								</div> -->
                    </div>
                    <div class="card-body">
                        <div class="d-sm-flex align-items-center mb-4">
                            <h4 class="card-title mb-sm-0">عرض الطلاب</h4>
                            <a href="createstedunt.php" class="btn btn-secondary"> اضافة طالب </a>
                        </div>
                        <form class="forms-sample" action="" enctype="multipart/form-data" method="POST">
                            <div class="form-group  row mb-3">
                                <div class="col-xl-6">

                                    <label for="exampleInputEmail3">الفصل</label>
                                    <select name="levelid" class="form-control" onChange="getStudent(this.value);"
                                        required="required">
                                        <option value="">--تحديد الفصل--</option>
                                        <?php

                        $qry1= "SELECT * FROM level ORDER BY id ASC";
                        $result1 = $conn->query($qry1);
                        $num1 = $result1->num_rows;		
                        if ($num1 > 0){
                              while ($rows1 = $result1->fetch_assoc()){?>
                                        <option value="<?php echo $rows1['id'];?>">
                                            <?php echo $rows1['levelname'].'  '.'-'.'  '.$rows1['section']; ?></option>
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
			?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">جميع الطلاب</h6>

                                </div>
                                <div class="table-responsive p-3">
                                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                                        <thead class="thead-light">

                                            <tr>
                                                <th class="font-weight-bold"># </th>
                                                <th class="font-weight-bold"> اسم الطالب </th>
                                                <th class="font-weight-bold">النوع </th>
                                                <th class="font-weight-bold">المستوى الدراسي </th>
                                                <th class="font-weight-bold">اسم المستخدم</th>
                                                <th class="font-weight-bold">كلمة السر</th>
                                                <th class="font-weight-bold">تاريخ التسجيل</th>
                                                <th class="font-weight-bold"> البروفايل </th>
                                                <th class="font-weight-bold"> عملبات </th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
							
										$query = "SELECT students.id,level.levelname,level.section AS id,students.id,students.studentName,
										students.gender,students.admission_date,students.profile_image,students.Username,students.password
										FROM students
										INNER JOIN level ON level.id = students.levelid
										where students.levelid='$class'";
									$rs = $conn->query($query);
									$num = $rs->num_rows;
									$sn=0;
									if($num > 0)
									{ 
										while ($row = $rs->fetch_assoc())
										{
											?>
                                            <tr>
                                                <td><?php echo $row["id"] ?></td>
                                                <td><?php echo $row["studentName"]?></td>
                                                <td><?php echo $row["gender"] ?></td>
                                                <td><?php echo $row['levelname']?></td>
                                                <td><?php echo $row["Username"] ?></td>
                                                <td><?php echo $row["password"] ?></td>


                                                <!-- date_format($date,"Y/m/d H:i:s"); -->
                                                <td><?php echo date("Y-M-d",strtotime($row["admission_date"])); ?></td>
                                                <td><?php  $profile_image= $row["profile_image"] ?>
                                                    <img height='50px' width='50px'
                                                        src=<?php echo "images/$profile_image"  ?>>
                                                </td>
                                                <td width='170'>
                                                    <?php 
												echo "<a class='btn btn-primary' href=display-student.php?id=".$row['id'].">Profile</a> 
												<a class='btn btn-danger' href=delete-function.php?id=".$row['id'].">Delete</a> "
											?>
                                                </td>
                                            </tr>
                                            <?php	
										}
									}
									else
									{
										echo   
										"<div class='alert alert-danger' role='alert'>
										لايوجد بيانات
											</div>";
									}
									
									?>
                                        </tbody>

                                        <tfoot>
                                            <tr>


                                                <td colspan="11" align="center"><i
                                                        class="icon-printer fa fas-print fa-2x" aria-hidden="true"
                                                        style="cursor:pointer" OnClick="CallPrint(this.value)"></i></td>
                                            </tr>

                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }else{
                        echo   
                        "<div class='alert alert-danger' role='alert'>
                      قم بتحديد الفصل لعرض الطلاب
                         </div>";
                    } ?>



                </section>
            </div>
        </div>
    </div>
</main>
<?php require "footer.php" ; ?>