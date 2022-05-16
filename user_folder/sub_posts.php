<?php include_once 'header.php'; 
	
	// IF THE SEARCH IS UNDER SUB-CATIGORIES GAT THE ARREY UNDER THE SUB-CATIGORIES 

	if (isset($_GET['subcat'])==false) {

		$value="Sorry No Information Found !";
			
		}

		// IF THERE IS NO SEARCH RESULT FOUND THERE SHOULD BE NO INFORMATION FOUND 

		else {
			$value=$_GET['subcat'];
			$cat=$conn->query("SELECT * FROM news_posts WHERE news_sub_catigory='".$_GET['subcat']."' AND news_status='Enabled' ORDER BY id DESC ");

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



                                        if ($cat->num_rows>0 && isset($_GET['subcat'])) {
                                            # code...
		

		while($post=$cat->fetch_assoc()){
							
						?>

<!-- BEGINING OF SUB-CATIGORY NEWS -->

					<div class="kf_news_list">
						<span class="col-lg-4 col-md-12 col-sm-12" >
								<figure style="margin:auto;width:100%">
								<img src="../demos/bt4/blog_manager/images/<?php echo $post['news_cover_img']  ?>"  class="lg_img img_view lg_img_view">
								</figure>
							</span>
							<div class="kf_news_text text_2">
								<a class="theam_btn margin-bottom" href="#"><?php echo $post['news_sub_catigory'] ?></a>
								<h3><a href="#"><?php echo $post['news_title'] ?></a></h3>								
								<p><?php echo filter($post['news_content'], 17) ?></p>
								<a class="theam_btn_large" href="view_post.php?id=<?php echo $post['id']  ?>">See More</a>

								<br><br>
								<ul class="meta_2 meta_5">
									<li ><a class="theam_color"><i class="fa fa-calendar-check-o"></i> <?php $d=strtotime($post['date_created']); echo date("F d Y", $d);?></a></li>

							</div>
					</div>				
<!-- END OF SUB-CATIGORY NEWS -->

								
                    <?php
                                        }
                    }
                    else{
                    ?>
<!-- IF THERE IS NO NEWS POST UNDER THIS SUB-CATIGORY THIS INFORMATION SHOULD SHOW -->

                        <h1>There Are No News Posts Under This Sub-catigory Now More News Comming Soon </h1>
<?php
                    }
?>

</div>


<!-- SIDE BAR STARTS HERE  -->

					<div class="col-md-3 responsive_padding">
	
<!-- RECENT NEWS LIST STARTS  -->
					<div class="kf_blog_list margin-30">
								<div class="kf_top_story">
									<div class="section_heading hdg_2">
										<h2 class="font_size">Recent Posts</h2>
										<span></span>
									</div>
								</div>

								<ul>
											
				<?php

				$types=$conn->query("SELECT * FROM news_posts ORDER BY date_created DESC");
				$i=0;
				while ($type_content=$types->fetch_assoc()) {
				$i=$i+1;
				if($i<6){
					
				?>
<!-- BEGINING OF RECENT NEWS  CONTENT-->

	<li>
						<div class="kf_blog_list">
						<span class="col-lg-4 col-md-12 col-sm-12" style="padding:0px;margin:0px;">
								<figure style="margin:auto;width:100%">		
								<img src="../demos/bt4/blog_manager/images/<?php echo $type_content['news_cover_img']  ?>" style="" class="col-12 img_view">
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
	
<!--END OF RECENT NEWS  CONTENT-->


<?php
}

}

?>								
	</ul>
							</div>
<!--RECENT NEWS LIST END-->


<!--NEWS TYPES STARTS HERE -->
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
<!-- NEWS TYPE LIST STARTS HERE  -->

													<li><a href="all_posts.php?type=<?php echo $type_content['dtype_name'] ?>"><?php echo $type_content['dtype_name'] ?></a><span>(0<?php echo $conn->query("SELECT * FROM news_posts WHERE news_status='enabled' && news_type='".$type_content['dtype_name']."'")->num_rows ?>)</span></li>

									<?php

									}

									?>	

								 </ul>
                            </div>
<!--NEWS TYPES ENDS HERE -->

							
						</div>
<!--SIDE BAR ENDS HERE-->
					</div>
				</div>
<!--CONTAINER END-->
			</div>
<!--KF MAGZINE LIST END-->
			<?php include_once 'footer.php' ?>

</body>
</html>

