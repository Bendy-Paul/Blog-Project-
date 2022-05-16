<?php $setting=$conn->query("SELECT * FROM page_setting")->fetch_assoc() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
	<!-- CLOSING ALL DIVS THAT MIGHT STILL BE OPEN  -->
						</div>	
						</div>	
						</div>	
						</div>	
						</div>	
						</div>	
						</div>	
						</div>	
						</div>	
						</div>	
						
						
						<br><br>

<br>
		<footer>
			<!--BEGINING OF FOOTER-->
			<div class="kf_widget_wrap" style="margin-top:20px">
													<!-- BEGINING OF BREAKING NEWS COLUMN  -->

				<div class="container">
					<div class="row">
				
					<!-- BEGINNING OF BREAKING NEWS CONTENT  -->
						<div class="col-md-8">
							<div class="kf_widget_text">
								<h3 class="widget_title">Breaking News</h3>
								<div class="kf_blog_list">
									<ul>
										<!-- BEGINING OF BREAKING NEWS LIST  -->
									<?php
					$i = 1;
					$qry = $conn->query("SELECT * FROM news_posts WHERE news_type='Breaking News' ORDER BY id DESC; ");
                    if($qry->num_rows>0){
                    $i=0;
					while($i < 5 && $row= $qry->fetch_assoc() ){
						$i=$i+1;

                                ?>

<!-- BEGINING OF BREAKING NEWS CONTENT  -->
								
	<li>
						<div class="kf_blog_list">
						<span class="col-lg-2 col-md-12 col-sm-12" style="padding:0px;margin:auto;">
								<figure style="margin:auto;width:100%">		
								<img src="../demos/bt4/blog_manager/images/<?php echo $row['news_cover_img']  ?>" class="col-12 img_view">
								</figure>
							</span>
			<div class="kf_blog_modren_text">
				<h6><?php echo $row['news_title'] ?></h6>
				<ul class="bit_meta meta_2 meta_4">
					<li><a href="#"><i class="fa fa-user"></i>Admin</a></li>
					<li><a href="#"><i class="fa fa-calendar-check-o"></i><?php $d=strtotime($row['date_created']); echo date("F d Y", $d);?></a></li>
				</ul>
			</div>
		</div>
	</li>

<!-- END OF BREAKING NEWS CONTENT  -->

</a>
						

										<?php
												}
											}
												?>


<!-- END OF BREAKING NEWS LIST  -->

									</ul>
								</div>
							</div>
						</div>

<!-- END OF BREAKING NEWS COLUMN  -->



<!-- BEGINING OF CONTACT US LIST  -->

							<div class="col-md-4">
							<div class="kf_widget_text">
								<h3 class="widget_title">Contact Us</h3>
								<div class="kf_blog_list">
									
								<div class="row">
									
								<div class="col-md-6 col-sm-6"> 
									
<!-- FACEBOOK CONTACT  -->

								<i class="theam_color fa fa-facebook"></i><br> <span> <?php echo $setting['facebook'] ?></span><br><br>

<!-- PHONE CONTACT  -->

								<i class="theam_color fa fa-phone"></i><br> <span> <?php echo $setting['contact'] ?></span><br><br>

<!-- INSTAGRAM CONTACT  -->

								<i class="theam_color fa fa-instagram"></i><br> <span> <?php echo $setting['instagram'] ?></span><br><br>

								</div>
								<div class="col-md-6 col-sm-6"> 

<!-- YOUTUUBE CONTACT  -->

								<i class="theam_color fa fa-youtube"></i><br> <span> <?php echo $setting['youtube'] ?></span><br><br>

<!-- TWITTER CONTACT  -->

								<i class="theam_color fa fa-twitter"></i><br> <span> <?php echo $setting['twitter'] ?></span><br><br>

<!-- EMAIL CONTACT  -->

								<i class="theam_color fa fa-envelope"></i><br> <span> <?php echo $setting['email'] ?></span><br><br>
										
								</div>
										


									</div>

								</div>

<!-- END OF CONTACT US LIST  -->


						</div>
					</div>
				</div>
			</div>
			<!--KF WIDGET WRAP END-->
			
			<!--KF COPYRIGHT START-->
			<!--KF COPYRIGHT END-->
		</footer>
</body>
</html>