<?php include_once 'header.php';

// IF THE SEARCH IS UNDER CATIGORIES GAT THE ARREY UNDER THE CATIGORIES 
if (isset($_GET['cat'])) {
$value=$_GET['cat'];
$cat=$conn->query("SELECT * FROM news_posts WHERE news_catigory='$value' AND news_status='Enabled' ORDER BY id DESC ");

}

// IF THE SEARCH IS UNDER NEWS TYPES GAT THE ARREY UNDER THE NEWS TYPES 

if (isset($_GET['type'])) {
	$value=$_GET['type'];
	$cat=$conn->query("SELECT * FROM news_posts WHERE news_type='$value' AND news_status='Enabled' ORDER BY id DESC ");

	}
	

// IF THERE IS NO SEARCH RESULT FOUND THERE SHOULD BE NO INFORMATION FOUND 
	
if (isset($_GET['type'])==false && isset($_GET['cat'])==false) {

$value="Sorry No Information Found !";
	
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
		<div class="content ">
			<!--KF MAGZINE LIST START-->
			<div class="kf_magazine_list padding_list">
				<!--CONTAINER START-->
				<div class="container">
					<div class="col-md-9 responsive_padding">
						<div class="section_heading">
							<h2><?php echo $value ?></h2>
							<span></span>
						</div>
						



                                        <?php 

                                        if ($cat->num_rows>0) {
                                            # code...
                                        

										while($post=$cat->fetch_assoc()){
                                            
																	
							
							?>


<!-- BEGINING OF CATIGORY/TYPE NEWS -->
						<div class="kf_news_list">
						<span class="col-lg-4 col-md-12 col-sm-12" >
								<figure style="margin:auto;width:100%">
								<img src="../demos/bt4/blog_manager/images/<?php echo $post['news_cover_img']  ?>"  class="lg_img img_view lg_img_view">
								</figure>
							</span>
							<div class="kf_news_text text_2">
								<a class="theam_btn margin-bottom" href="#"><?php echo $post['news_sub_catigory'] ?></a>
								<li ><a class="theam_color"><i class="fa fa-calendar-check-o"></i> <?php $d=strtotime($post['date_created']); echo date("F d Y", $d);?></a></li>
								<h4><a href="#"><?php echo $post['news_title'] ?></a></h4>
								<p><?php echo filter($post['news_content'], 25) ?></p>
								<a class="theam_btn_large" href="view_post.php?id=<?php echo $post['id']  ?>">See More</a>
							</div>
						</div>				

                    <?php
                                        }
                    }
                    else{
                    ?>
<!-- IF THERE IS NO NEWS POST UNDER THIS CATIGORY/TYPE THIS INFORMATION SHOULD SHOW -->
                        <h1>There Are No News Posts Under This Catigory Now More News Comming Soon </h1>
<?php
                    }
?>

</div>



					<div class="col-md-3 responsive_padding">
						<!--SIDE BAR WRAP START-->
							<!--KF SELLING ADD OVERLAY END-->
								<?php
								if (isset($_GET['cat'])) {
									# code...

								?>
<!-- BEGINING OF BREAKING NEWS -->
							<div class="kf_blog_list margin-30">
								<div class="kf_top_story">
									<div class="section_heading hdg_2">
										<h2 class="font_size">Breaking News</h2>
										<span></span>
									</div>
								</div>

								<ul>
							
					<?php

						$types=$conn->query("SELECT * FROM news_posts WHERE news_type='Breaking News' ORDER BY id DESC");
						$i=0;
						while ($type_content=$types->fetch_assoc()) {
						$i=$i+1;
						if($i<7 ){
							
					?>
<!-- BEGINING OF BREAKING NEWS CONTENT  -->
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
<!-- END OF BREAKING NEWS CONTENT  -->

	<?php
}

}

?>								
	</ul>
	</div>
<!-- END OF BREAKING NEWS  -->
						<?php
						$types=$conn->query("SELECT * FROM news_catigories WHERE catigory_name!='".$_GET['cat']."' ");

					}else {
						$types=$conn->query("SELECT * FROM news_catigories  ");
					}
					?>
					<!-- BEGINING OF CATIGORY LIST  -->
							  <div class="aladin_aside_category aside_hdg_1">
								<div class="kf_top_story">
									<div class="section_heading hdg_2">
										<h2 class="font_size">Categories</h2>
										<span></span>
									</div>	
								</div>
                                <ul>
											<!-- BEGINING OF CATIGORY LIST CONTENT 														 -->
									<?php


									while ($type_content=$types->fetch_assoc()) {

										
									?>
											<li><a href="all_posts.php?cat=<?php echo $type_content['catigory_name'] ?>"><?php echo $type_content['catigory_name'] ?></a><span>(0<?php echo $conn->query("SELECT * FROM news_posts WHERE news_status='enabled' && news_catigory='".$type_content['catigory_name']."'")->num_rows ?>)</span></li>

									<?php

									}

									?>	
											<!-- END OF CATIGORY LIST CONTENT  -->
								 </ul>
                            </div>
                            <!--END OF CATIGORY LIST-->
							
						</div>
						<!--END OF THE SIDE BAR-->
					</div>
				</div>
				<!--CONTAINER END-->
			</div>
			<!--PAGE END-->
			<?php include_once 'footer.php' ?>

</body>
</html>

