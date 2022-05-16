<?php include_once 'header.php';

$found = false;

if (isset($_GET['id'])) {

	
$post = $conn->query("SELECT * FROM news_posts WHERE id=".$_GET['id']." ")->fetch_assoc();

$content= $post['news_content'];

$content = $filter_words = str_replace("../blog_manager/images/", "../demos/bt4/blog_manager/images/", $content );

$found = true;

}
else {

	$content=  "<br><br><br><br><h1 class='text-center'><strong>Sorry No News Information Was Found Under This Post</strong></h1>";

	
}

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
  <!--CONTENT START-->

<?php
if ($found== true) {
?>



<div class="content">
			<div class="container">
				<div class="detail_row">
					<div class="kf_detail_text">
						<a class="theam_btn" href="#"><?php echo $post['news_catigory'] ?></a>
						<h2><?php echo $post['news_title'] ?></h2>
						<ul class="bit_meta meta_2 meta_3">
							<li><a href="#"><i class="fa fa-calendar-check-o"></i><?php $d=strtotime($post['date_created']); echo date("F d Y", $d);?></a></li>
							<li><a href="#"><i class="fa fa-user"></i>Admin</a></li>
							<li><a href="#"><i class="fa fa-eye"></i><?php echo $post['no_of_views'] ?> Views</a></li>
						</ul>
					</div>


<!-- START OF COVER PICTURE IMAGE VIEW  -->

					<div class="kf_detail_slide">
						<div class="kf_detail_fig">
							<figure class="overlay">
								<img src="../demos/bt4/blog_manager/images/<?php echo $post['news_cover_img']  ?>" class="view_post_img img_view" alt="">
							</figure>
						</div>
					</div>

<?php
}
?>

<!-- END OF COVER PICTURE IMAGE VIEW  -->


					<div class="row">

<!-- BEGINING OF NEWS CONTENT  -->

						<div class="col-md-9">
                            <?php
                            echo $content;
                            ?>
							</div>

<!-- END OF NEWS CONTENT  -->



<!-- BEGINING OF SIDE BAR  -->
						<div class="col-md-3">
							
<!-- BEGINING OF MOST VIEWED POSTS  -->

						<div class="kf_blog_list margin-30">
								<div class="kf_top_story">
									<div class="section_heading hdg_2">
										<h2 class="font_size">Most Viewed</h2>
										<span></span>
									</div>
								</div>

								<ul>
							
<?php

$types=$conn->query("SELECT * FROM news_posts ORDER BY no_of_views DESC");
$i=0;
while ($type_content=$types->fetch_assoc()) {
$i=$i+1;
if($i<6){
	
?>
<!-- BEGINING OF MOST VIEWED POSTS CONTENT -->


<li>
					<div class="kf_blog_list">
					<span class="col-lg-4 col-md-12 col-sm-12" style="padding:0px;margin:0px;">
							<figure style="margin:auto;width:100%">		
							<img src="../demos/bt4/blog_manager/images/<?php echo $type_content['news_cover_img']  ?>" class="col-12 img_view">
							</figure>
						</span>
		<div class="kf_blog_modren_text">
			<h6><?php echo $type_content['news_title'] ?></h6>
			<ul class="bit_meta meta_2 meta_4">
				<li><a href="#"><i class="fa fa-user"></i>Admin</a></li>
				<li><a href="#"><i class="fa fa-calendar-check-o"></i><?php $d=strtotime($type_content['date_created']); echo date("F d Y", $d);?></a></li>
			</ul>
		</div>
	</div>
</li>


<!-- END OF MOST VIEWED POSTS  -->

<?php
}

}

?>								
	</ul>
							</div>
<!-- END OF MOST VIEWED POSTS  -->


							<!--Category Wrap Start-->
                            <div class="aladin_aside_category aside_hdg_1">
								<div class="kf_top_story">
									<div class="section_heading hdg_2">
										<h2 class="font_size">News types</h2>
										<span></span>
									</div>	
								</div>
                                <ul>
																									
									<?php

									$types=$conn->query("SELECT * FROM news_types  ");

									while ($type_content=$types->fetch_assoc()) {

										
									?>
									<li><a href="all_posts.php?type=<?php echo $type_content['dtype_name'] ?>"><?php echo $type_content['dtype_name'] ?></a><span>(0<?php echo $conn->query("SELECT * FROM news_posts WHERE news_status='enabled' && news_type='".$type_content['dtype_name']."'")->num_rows ?>)</span></li>

									<?php

									}

									?>	

								 </ul>
                            </div>
                            <!--Category Wrap End-->
							
						</div>
						<!--SIDE BAR WRAP END-->
					</div>
				</div>
				<!--CONTAINER END-->
			</div>
			<!--KF MAGZINE LIST END-->
			<?php include_once 'footer.php' ?>

</body>
</html>

