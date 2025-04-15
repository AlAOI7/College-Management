
<?php include('common/header.php') ?>
<?php include('connection/connection.php') ?>

        <main id="tg-main" class="tg-main tg-haslayout">
			<div class="container">
				<div class="row">
					<div id="tg-twocolumns" class="tg-twocolumns">
						<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
							<aside id="tg-sidebar" class="tg-sidebar">
								<div class="tg-widget tg-widgetaboutusnav">
									<div class="tg-widgettitle">
										<h3>من نحن</h3>
									</div>
									<div class="tg-widgetcontent">
										<ul>
											<li><a href="javascript:void(0);">السجلات</a></li>
											<li><a href="javascript:void(0);">المكتبة</a></li>
											<li><a href="javascript:void(0);">المستويات</a></li>
											<li><a href="javascript:void(0);">المواضيع</a></li>
											<li><a href="javascript:void(0);">الاراء </a></li>
											
										</ul>
									</div>
								</div>
							</aside>
						</div>
						<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
							<div class="row">
								<div id="tg-content" class="tg-content">
									<div class="tg-aboutus tg-honorawards">
									<?php  
										$about = mysqli_query($conn, "SELECT * FROM about  ");
										while ($aboutt = mysqli_fetch_assoc($about)) {
										?>
										<div class="tg-honoraward">
											<figure><img  src="admin/images/about/<?= $aboutt['image'] ;?>" alt="image description"></figure>
											<div class="tg-honorawardcontent">
												<h3><?= $aboutt['name'] ;?></h3>
												<p>
												<?= $aboutt['description'] ;?>												</p>
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

        	<?php include('common/footer.php') ?>

