<?php include_once 'config.php';
$a=array("blue_bg","green_bg","green_bg","yellow_bg","yellow_light_bg","pinck_bg","parat_bg");
$r=0;


if (isset($_GET['subcat'] ) ) {

	$select_subcat=$conn->query("SELECT * FROM sub_catigories WHERE sub_catigory_name='".$_GET['subcat']."'")->num_rows;

	if ($select_subcat<1) {
		header("location:index.php");
	}
	# code...
}

if (isset($_GET['cat'] ) ) {

	$select_subcat=$conn->query("SELECT * FROM news_catigories WHERE catigory_name='".$_GET['cat']."'")->num_rows;

	if ($select_subcat<1) {

		header("location:index.php");
	}
	# code...
}


if (isset($_GET['type'] ) ) {

	$select_subcat=$conn->query("SELECT * FROM news_types WHERE dtype_name='".$_GET['type']."'")->num_rows;

	if ($select_subcat<1) {

		header("location:index.php");
	}			

	# code...
}


if (isset($_GET['id'] ) ) {

	$select_subcat=$conn->query("SELECT * FROM news_posts WHERE id=".$_GET['id']." AND news_status='Enabled' ")->num_rows;

	if ($select_subcat<1) {
		
		header("location:index.php");
	}
	# code...
}

 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Slider post</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Font-awesome -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Slick Slider -->
    <link href="css/slick.css" rel="stylesheet">
	<!-- Slick Slider -->
    <link href="css/prettyphoto.css" rel="stylesheet">
	<!-- Typography -->
    <link href="css/index.css" rel="stylesheet">
    <!-- Typography -->
    <link href="css/typography.css" rel="stylesheet">
	<!-- widget.css -->
    <link href="css/side-widget.css" rel="stylesheet">
    <!-- component-responsive.css -->
    <link href="css/responsive.css" rel="stylesheet">
	<!-- component-responsive.css -->
    <link href="css/component.css" rel="stylesheet">
    <!-- shortcodes.css -->
    <link href="css/shortcodes.css" rel="stylesheet">
    <!-- colors.css -->
    <link href="css/colors.css" rel="stylesheet">
    <!-- style.css -->
    <link href="style.css" rel="stylesheet">
  </head>

<style>
	
.search{
	background-color:#ff1744;
	color:white;
}

.view_post_img{
	height:49rem;


}

.lg_img{
	height:30rem;

}

.img_view{
	max-width:100%;
	margin-left:0px;
	object-fit:cover; object-position:0% 50%;
	max-height:40rem
}

.lg_img_view{
	margin-left:0px;
	width:100%;
	object-fit: cover;
	object-position:50% 0;

}


@media only screen and (max-width: 1000px) {
   .search_bar{
        width:20rem;
    }
}


@media only screen and (min-width: 1000px) {
	.nav_form{
		float: right !important;
    }

}


@media only screen and (max-width: 1000px) {	
.img_view{
	width: 100%;object-fit: cover; object-position:100% 0;padding:0px;margin:0px
}
}


@media only screen and (max-width: 450px) {	
.img_view{
	min-height:20rem;
	width:100vh;
	object-fit:cover; object-position:50% 0
}
}
</style>

  <body>
    <!-- wrapper-->
    <div class="wrapper">
        <!--header-->
		<header>	<!--KF TOP WRAP END-->
			
			<!--KF LOGO WRAP START-->
			<div class="kf_logo_wrap">
				<div class="container">
					<div class="row">
						<div class="col-md-4">
							<div class="kf_logo">
								<a href="#"><img src="images/logo-top.png" alt=""></a>
							</div>
						</div>
						<div class="col-md-8">
							<div class="kf_banner_add overlay">
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
				</div>
			<!-- </div> -->
			<br><br>
			<!--KF LOGO WRAP END-->

			<!--KF NAVI WRAP START-->

			<div class="kf_top_bar" >

				<div class="" style="background:black">

					<!--KF NAVIGATION ROW START-->

					<div class="kf_navigation_row">
						<div class="navigation">
							<ul>

							<li><a class="active" href="index.php">Home</a></li>
																
								
								<?php
									$cat=$conn->query("SELECT * FROM news_catigories ORDER BY id DESC");
									$i=0;
									while ($catigory=$cat->fetch_assoc()) {
										$i=$i+1;
										if($i<9){


									?>
									
<!-- LIST OF THE FIRST 9 CATIGORIES IN THE DATABASE -->

								<li class="menu-item kode-parent-menu"><a class="<?php echo $a[$r++] ?>" href="all_posts.php?cat=<?php echo $catigory['catigory_name'] ?>"><?php echo $catigory['catigory_name'] ?></a>

<!--END OF LIST OF THE FIRST 9 CATIGORIES IN THE DATABASE -->

								<?php  
								$sub=$conn->query("SELECT * FROM sub_catigories WHERE catigory_name='". $catigory['catigory_name']."'  ");

								if($sub->num_rows>0){
									?>
										<ul class="dl-submenu display">
											<?php

									while($subcat=$sub->fetch_assoc()){
								?>

<!-- LIST OF SUB-CATIGORIES IN THE GIVEN ROW -->

										<li><a href="sub_posts.php?subcat=<?php echo $subcat['sub_catigory_name'] ?>"><?php echo $subcat['sub_catigory_name'] ?></a></li>

<!-- LIST OF SUB-CATIGORIES IN THE GIVEN ROW -->

								<?php
									}
									?>
									</ul>

									<?php
											}
									}

								}

									?>

								<!-- <li><a  href="contact-us.html">contact us</a></li> -->
							</ul>
						</div>



<!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->
							<!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&MEDIA QUERY HEADER&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->
<!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->
<!--DL Menu Start-->
						<div id="kode-responsive-navigation" class="dl-menuwrapper">
							<button class="dl-trigger">Open Menu</button>
							<ul class="dl-menu">

<!-- INCLUDE HOME VIEW IN THE RESPONSIVE NAV-BAR -->

							<li><a class="blue_bg" href="index.php">Home</a></li>

<!-- INCLUDE HOME VIEW IN THE RESPONSIVE NAV-BAR -->

								
									<?php
									$cat=$conn->query("SELECT * FROM news_catigories ");
									// BEGINING OF CATIGORY WHILE LOOP
									while ($catigory=$cat->fetch_assoc()) {

									?>

<!-- THIS IS A  GIVEN CATIGORIES  -->

								<li class="menu-item kode-parent-menu"><a href="all_posts.php?cat=<?php echo $catigory['catigory_name'] ?>"><?php echo $catigory['catigory_name'] ?></a>

<!-- THIS IS A  GIVEN CATIGORIES  -->


								<?php  
								$sub=$conn->query("SELECT * FROM sub_catigories WHERE catigory_name='". $catigory['catigory_name']."'  ");
								if($sub->num_rows>0){
								// BEGINING OF SUB-CATIGORY IF STATEMENT LOOP

									?>
										<ul class="dl-submenu">
											<?php
									
									while($subcat=$sub->fetch_assoc()){

												// BEGINING OF SUB-CATIGORY WHILE LOOP

								?>
<!-- THIS IS A SUB-CATIGORIES IN THE GIVEN CATIGORIES LISTED HERE -->

										<li><a href="sub_posts.php?subcat=<?php echo $subcat['sub_catigory_name'] ?>"><?php echo $subcat['sub_catigory_name'] ?></a></li>

<!-- THIS IS A SUB-CATIGORIES IN THE GIVEN CATIGORIES LISTED HERE -->

								<?php
									// END OF SUB-CATIGORY WHILE LOOP
									}
									?>
									</ul>
									<?php
								// END OF SUB-CATIGORY IF STATEMENT LOOP
							}
									// END OF CATIGORY WHILE LOOP
						}
									
									?>
								</li>

									

							</ul>
						</div>

<!-- BEGINING OF SEARCH OPTION -->

						<form class="navbar-form navbar-left nav_form" method="post" action="search.php">

<!-- THE SEARCH BAR -->

								<input placeholder="Catigories, News etc.." id="search" name="search" type="text" class="form-control search_bar" required>

<!-- THE SEARCH BTN -->

								<button class="search btn text-white"><i class="fa fa-search"></i></button>

						</form>
<!-- END OF SEARCH OPTION -->
					</div>
					<!--KF NAVIGATION ROW END-->
				</div>
			</div>
			<!--KF NAVI WRAP END-->
		</header>
		
        	<!--KF WIDGET WRAP END-->
		
	</div>

<?php

if (isset($_POST['search'])) {
?>
	<script>
	document.getElementById("search").value="<?php echo $_POST['search'] ?>"
	</script>
<?php	
}

?>

	
    <!-- jquery javascript-->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap script-->
    <script src="js/bootstrap.js"></script>
	<!-- responsive-jquery script-->
	<!-- responsive-jquery script-->
    <script src="js/jquery.mkinfinite.js"></script>
	<!-- responsive-jquery script-->
    <script src="js/modernizr.custom.js"></script>
	<!-- responsive-jquery script-->
    <script src="js/jquery.dlmenu.js"></script>
    <!-- Slick Slider script-->
    <script src="js/slick.js"></script>
    <!-- Custom scripts-->
    <script src="js/custom.js"></script>
  </body>
</html>