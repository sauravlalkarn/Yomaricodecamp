<?php

$category = $_GET["title"];

if ($category == 'sports'){
	$para[0] ="";
	$para[1] = "Geography";
	$para[2] = "Politics";
	$para[3] = "Economy";
	$para[4] = "Infrastructure";
	$para[5] = "Culture"; 
}
else if($category == 'Country'){
	$para[0] = "History";
	$para[1] = "Geography";
	$para[2] = "Politics";
	$para[3] = "Economy";
	$para[4] = "Infrastructure";
	$para[5] = "Culture";
}
else if($category =='Religion'){
	$para[0] = "Definitions";
	$para[1] = "Diversity";
	$para[2] = "History";
	$para[3] = "Practices";
	$para[4] = "Beliefs";
	$para[5] = "Institutions";
}
else if($category=='City'){
	$para[0] = "History";
	$para[1] = "Geography";
	$para[2] = "Climate";
	$para[3] = "Economy";
	$para[4] = "Government";
	$para[5] = "Culture";
}
else{
	$para[0] = "History";
	$para[1] = "Geography";
	$para[2] = "Climate";
	$para[3] = "Economy";
	$para[4] = "Government";
	$para[5] = "Culture";

}
//echo $category;
include "loggedheader.php";
?>
<?php
$page_created = '0';
if(array_key_exists("new_article", $_POST)) {
	$get_category = isset($_GET['title']) ? $_GET['title'] : '';
	$get_title = isset($_POST['page_title'])? $_POST['page_title'] : '';
	$get_para0 = isset($_POST['para0'])? $_POST['para0'] : '';
	$get_para1 = isset($_POST['para1'])? $_POST['para1'] : '';
	$get_para2 = isset($_POST['para2'])? $_POST['para2'] : '';
	$get_para3 = isset($_POST['para3'])? $_POST['para3'] : '';
	$get_para4 = isset($_POST['para4'])? $_POST['para4'] : '';
	$get_para5 = isset($_POST['para5'])? $_POST['para5'] : '';
	if(($get_category != '') && ($get_title != '') && ($get_para0 != '')) {
		
	}
	$conn = mysql_connect("localhost", "root", "");
	if(!$conn) {
	die('Error in connection');
	}
	mysql_select_db("codecamp");
	$takequery = "INSERT INTO  users_pages (userid,category, page_title, para0, para1, para2,para3,para4,para5)
	VALUES ('$get_userid', '$get_category', '$get_title', '$get_para0', '$get_para1', '$get_para2', '$get_para3', '$get_para4', '$get_para5')";
	echo $takequery;
	mysql_query($takequery);
	$page_created = '1';
	echo '<br><br><br><br><div class="container">page created successfully.</div>';
}
	?>
<?php
	if(!$page_created) {?>
<br><br><br><br>
<h3 style= "position:relative;left:30px;"> Create article for <?php  echo $category; ?> </h3>
<br><br>
<div class="container">
      <div class="loginform" style="position:relative;left:30px;">
        <form class="form-signin" role="form" action="createarticle.php?title=<?php echo $category; ?>" method="post">
          <h2 class="form-signin-heading"><?php echo $category; ?></h2>
            Title <textarea  rows = "1" type="text" name ="page_title" class="form-control"  style=" width:700px;" placeholder="<?php echo $para[0]; ?>" autofocus> </textarea><br>
           	<?php echo $para[0]; ?><textarea  rows = "5" type="text" name ="para0" class="form-control"  style=" width:700px;" placeholder="<?php echo $para[0]; ?>" autofocus> </textarea><br>
            <?php echo $para[1]; ?><textarea  rows = "5" type="text" name ="para1" class="form-control"  style=" width:700px;" placeholder="<?php echo $para[1]; ?>" autofocus> </textarea><br>
            <?php echo $para[2]; ?><textarea  rows = "5" type="text" name ="para2" class="form-control"  style=" width:700px;" placeholder="<?php echo $para[2]; ?>" autofocus> </textarea><br>
            <?php echo $para[3]; ?><textarea  rows = "5" type="text" name ="para3" class="form-control"  style=" width:700px;" placeholder="<?php echo $para[3]; ?>" autofocus> </textarea><br>
            <?php echo $para[4]; ?><textarea  rows = "5" type="text" name ="para4" class="form-control"  style=" width:700px;" placeholder="<?php echo $para[4]; ?>" autofocus> </textarea><br>
            <?php echo $para[5]; ?><textarea  rows = "5" type="text" name ="para5" class="form-control"  style=" width:700px;" placeholder="<?php echo $para[5]; ?>" autofocus> </textarea><br>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="new_article" value="new_article" style="width:auto;">Create article</button>
  </div>
 </div>
	<?php } ?>