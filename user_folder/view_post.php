<?php include_once 'config.php';

$found = false;

if (isset($_GET['id'])) {

	
$post = $conn->query("SELECT * FROM news_posts WHERE id=".$_GET['id']." ")->fetch_assoc();

$id=$_GET['id'];

$no_of_views=$post['no_of_views']+1;

$conn->query("UPDATE news_posts SET no_of_views='$no_of_views' WHERE id=".$_GET['id']." ");

$found = true;

header("location:view_post_content.php?id=$id");

}