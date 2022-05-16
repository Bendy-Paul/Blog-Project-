<?php 
include_once 'header.php'
?>
	
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<br><br>
<!--CONTENT START-->
<div class="content">
<div class="container">
	<br><br>
<div class="kf_bit_coin_row">
				


<style>
	@media screen and (min-width: 992px) {
    .first {
        background-color: blue;
        color: white;
    }
}
</style>

<?php 
 $news= $conn->query("SELECT * FROM news_posts WHERE news_status='Enabled' ORDER BY date_created DESC");
 
 $i=0;
 
 while ($posts=$news->fetch_assoc()) {
$i=$i+1;

if($i<8){

if ($i <= 3) {
	if ($i == 1) {



?>
<!-- FIRST ON NEW POST CONTENT  -->
<div class="kf-bit-row-slide">
	<div>
		<div class="kf_bit_fig">
			<figure class="overlay img_view"  style="height: 424px; ">
			<img src="../demos/bt4/blog_manager/images/<?php echo $posts['news_cover_img']  ?>"  alt="">
				<figcaption class="bit_caption">
					<a class="theam_btn margin-bottom" href="#"><?php echo $posts['news_catigory'] ?></a>
					<h2><a href="view_post.php?id=<?php echo $posts['id']  ?>"><?php echo $posts['news_title'] ?></a></h2>
					<ul class="bit_meta">
						<li><?php $d=strtotime($posts['date_created']); echo date("F d Y", $d);?></li>
						<li><a href="#"><i class="fa fa-eye"></i><?php echo $posts['no_of_views']  ?></a></li>
					</ul>
				</figcaption>
			</figure></a>
		</div>


		<?php
	}elseif ($i == 2|| $i == 3) {
	?>
	<!-- SECOND AND THIRD ON NEW POST CONTENT  -->

							<a href="view_post.php?id=<?php echo $posts['id'] ?>">
							<span>
							<div class="kf_bit_side">
									<div class="kf_bit_fig">
										<figure class="overlay" style="width: 100%; height: 196px; object-fit: cover; object-position:100% 0;">
											<a href="view_post.php?id=<?php echo $posts['id'] ?>"><img src="../demos/bt4/blog_manager/images/<?php echo $posts['news_cover_img']  ?>" alt=""></a>
											<figcaption class="bit_caption">
												<a class="theam_btn margin-bottom" href="#"><?php echo $posts['news_catigory'] ?></a>
												<h2><a href="view_post.php?id=<?php echo $posts['id']  ?>"><?php echo $posts['news_title'] ?></a></h2>
												<ul class="bit_meta">
													<li>Admin</li>
													<li><a href="#"><i class="fa fa-clock-o"></i><?php $d=strtotime($posts['date_created']); echo date("F d Y", $d);?></a></li>
													<!-- <li><a href="#"><i class="fa fa-share-alt"></i>250</a></li> -->
												</ul>
											</figcaption>
										</figure>
									</div>
								</div>
							</span>
							
							</a>
<?php
	}	
	?>


					<div class="row">
				

<?php
}else{
?>
<!-- FOURTH TILL EIGHT  ON NEW POST CONTENT  -->

						<div class="col-md-4 m-t-10" style="margin-top:20px">
							<div class="kf_bit_fig fig_2">
								<figure class="overlay" style="width: 100%; height: 200px; object-fit: none; object-position:0% 0;">
								<a href="view_post.php?id=<?php echo $posts['id'] ?>"><img src="../demos/bt4/blog_manager/images/<?php echo $posts['news_cover_img']  ?>"  alt=""></a>
									<figcaption class="bit_caption">
										<a class="theam_color" href="#"><?php echo $posts['news_catigory'] ?></a>
										<h4><a href="view_post.php?id=<?php echo $posts['id']  ?>"><?php echo $posts['news_title'] ?></a></h4>
										<ul class="bit_meta meta_2">
											<li><a href="#"><i class="fa fa-calendar-check-o"></i><?php $d=strtotime($posts['date_created']); echo date("F d Y", $d);?></a></li>
											<li><a href="#"><i class="fa fa-user"></i>Admin</a></li>
										</ul>
									</figcaption>
								</figure>
							</div>
						</div>
<?php
}

}

}

?>


	
			<!--KF MAGZINE ADD START-->
			<div class="kf_magazine_add">
				<div class="container">
					<div class="kf_banner_add add_2 overlay">
						<div class="kf_add_text">
							<h5>Best Business ,<br>News Magazine</h5>
						</div>
						<div class="kf_add_content">
							<h3>Banner Ad</h3>
							<span>760 x 90</span>
						</div>
					</div>
				</div>
			</div>
			<!--KF MAGZINE ADD END-->
			



			<!--KF MAGZINE LIST START-->
			<div class="kf_magazine_list" >
				<!--CONTAINER START-->
				<div class="container" style="margin-left:4vh">
					<div class="col-md-12 responsive_padding">
						<!--MOS VIEWED PAGE START-->
						<div class="kf_magazine_row">
							<div class="kf_top_story">
								<div class="section_heading">
									<h2>Most Viewed Posts</h2>
									<span></span>
								</div>
							<!-- </div> -->
							<div class="row">
							<?php
					$i = 1;
					$qry = $conn->query("SELECT * FROM news_posts WHERE news_status='Enabled' ORDER BY no_of_views DESC; ");
                    if($qry->num_rows>0){
                    $i=0;
					while($i < 5 && $row= $qry->fetch_assoc() ){
						$i=$i+1;

						if ($i == 1) {
                                ?>
								<!-- FIRST ON MOST READ IMAGE CONTENT  -->
								<div class="col-md-8">
									<div class="kf_blog_medium">
										<figure class="overlay">
										<a href="view_post.php?id=<?php echo $row['id'] ?>"><img src="../demos/bt4/blog_manager/images/<?php echo $row['news_cover_img']  ?>" style="width: 100%; height: 337px; object-fit: cover; object-position:0% 0;"></a>											
										<a class="bf_busines theam_btn_medium" href="#"><?php echo $row['news_catigory'] ?></a>
											<ul class="bit_meta meta_2 meta_3">
												<li><a href="#"><i class="fa fa-user"></i>Admin</a></li>
												<li><a href="#"><i class="fa fa-calendar-check-o"></i><?php $d=strtotime($row['date_created']); echo date("l F d Y", $d);?></a></li>
											</ul>
										</figure>
										<div class="kf_blog_text">
											<h4><?php echo $row['news_title'] ?></h4>
											<?php 
											?>
								<p><?php echo filter($row['news_content'], 47) ?></p>
										</div>
									</div>
								</div>


								<?php
						}else{
						?>
														<!-- SECOND TO FIFTH MOST READ NEWS CONTENT  -->

								<div class="col-md-4">
									<div class="kf_blog_list">
										<ul>
											<li>
												<div class="kf_blog_modren">
													<figure class="overlay" style="width: 40%; height: 77px; object-fit: fill; object-position:0% 0;">
													<a href="view_post.php?id=<?php echo $row['id'] ?>"><img src="../demos/bt4/blog_manager/images/<?php echo $row['news_cover_img']  ?>"  alt=""></a>
													</figure>
													<div class="kf_blog_modren_text">
													<b><a href="view_post.php?id=<?php echo $row['id']  ?>"><?php echo $row['news_title'] ?></a></b><br>
														<ul class="bit_meta meta_2 meta_4">
															<li>
															<a href="#"><i class="fa fa-clock-o"></i><?php $d=strtotime($row['date_created']); echo date("F d Y", $d);?></a>
														</ul>
													</div>
												</div>
											</li>
						</ul></div>
</a>
											</div>	

												<?php
												}
											}
										}
												?>
								</ul>
									</div>
								</div>
							</div>
							</div>	
							

						
	
			<!--WORLD NEWS START-->
			<div class="kf_famous_news">
				<div class="container"> 
					<div class="row">
						<div class="col-md-9">
							<div class="section_heading">
								<h2>World News</h2>
								<span></span>
							</div>
							<?php $val=$conn->query("SELECT * FROM news_posts WHERE news_type='World News' ORDER BY id DESC ");

							if ($val->num_rows>0) {
								$i=0;
								while($post=$val->fetch_assoc()){
									$i=$i+1;
									if ($i<=7) {



							?>
<!-- BEGINING OF WORLD NEWS CONTENT -->
							<div class="kf_news_list">
								<span class="col-lg-2 col-md-3 col-sm-3" style="padding-left:0px">
									<!-- <span class="col-md-12"  style="padding-left:0px"> -->
									<figure>
										<a href="view_post.php?id=<?php echo $post['id'] ?>"><img src="../demos/bt4/blog_manager/images/<?php echo $post['news_cover_img']  ?>" class="lg_img_view img_view" style="height:22rem;" ></a>											
										</figure>
									<!-- </span> -->
								</span>
								<div class="col-md-10">
									<a class="theam_color" href="#"><?php echo $post['news_sub_catigory'] ?></a>
									<h4><?php echo $post['news_title'] ?></h4>
									<li><a href="#" class="active"><i class="fa fa-calendar-check-o"></i><?php $d=strtotime($post['date_created']); echo date("F d Y", $d);?></a></li>
									<p><?php echo filter($post['news_content'], 38) ?></p>
								</div>
							</div>
<!-- END OF WORLD NEWS CONTENT -->

		
							<?php
									}
                            }
                    }
                    else{
                    ?>
					<!-- IF THERE IS NO TOPIC UNDER WORLD NEWS THE BELLOW INFORMATION WILL BE SHOWED -->

                        <h3>There Are No News Posts Under This Topic At This Time </h3><br><br>
				<?php
                    }
				?>

							<!--KF SIDE FORM END-->
								</div>
							<!--SIDE BAR WRAP END-->
						</div>
					</div>
				</div>
			</div>
			<!--WORLD NEWS ENDS NEWS END-->
			


</body>
</html>						<?php include_once 'footer.php'  ?>
