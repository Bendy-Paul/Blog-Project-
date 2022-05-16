<?php
include_once 'header.php';

$search_outcome=$_POST['search'];


$val=$conn->query("SELECT * FROM news_posts WHERE news_title LIKE '%$search_outcome%' OR news_content LIKE '%$search_outcome%' OR news_catigory LIKE '%$search_outcome%' OR news_sub_catigory LIKE '%$search_outcome%' OR news_type LIKE '%$search_outcome%' ORDER BY id DESC ");



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
			<!--SEARCH CONTAINER STARTS START-->
			<div class="kf_magazine_list padding_list">
				<!--CONTAINER START-->
				<div class="container">
					<div class="col-md-12 responsive_padding">
						<div class="section_heading">
							<h2>Search Result For <?php echo $search_outcome ?> </h2>
							<span></span>
						</div>
						



                                        <?php 

                                        if ($val->num_rows>0) {
                                            # code...
                                               
        				
										while($post=$val->fetch_assoc()){

                                            								
															
				
                                            
                       
						?>


<!-- BEGINING OF THE SEARCH OUTCOME  -->
						<div class="kf_news_list">
						<span class="col-lg-3 col-md-12 col-sm-12" style="padding:0px;margin:0px;">
								<figure style="margin:auto;width:100%">
								<img src="../demos/bt4/blog_manager/images/<?php echo $post['news_cover_img']  ?>"  class=" lg_img_view lg_img img_view">
								</figure>
							</span>
							<div class="kf_news_text text_2">
								<span class="theam_btn margin-bottom" href="#"><?php echo $post['news_sub_catigory'] ?></span>
                                
								<ul class="meta_2 meta_5 text-right">
									<li ><a class="theam_color"><i class="fa fa-calendar-check-o"></i> <?php $d=strtotime($post['date_created']); echo date("F d Y", $d);?></a></li><br>
                                </ul>
								<h3><a href="#"><?php echo $post['news_title'] ?></a></h3>								
                                <p><?php echo filter($post['news_content'], 20) ?></p>
								<a class="theam_btn_large" href="view_post.php?id=<?php echo $post['id']  ?>">See More</a>

							</div>
						</div>				
<!-- END OF SEARCH OUTCOME  -->
								
                    <?php
                                        }
                    }
                    else{
                    ?>
					<!-- THIS IS TO SHOW THAT THERE WAS NO RESULTS FOUND AFTER THE SEARCH  -->

                        <h1>There Are No News Posts Under This Sub-catigory Now More News Comming Soon </h1>
<?php
                    }
?>

</div>

			<?php include_once 'footer.php' ?>

</body>
</html>