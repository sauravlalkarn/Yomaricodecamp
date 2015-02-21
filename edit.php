<?php
include "loggedheader.php";

$category = '';
$title = '';
$para[0] = "";
$para_data[0] = "";
$para[1] = "";
$para_data[1] = "";
$para[2] = "";
$para_data[2] = "";
$para[3] = "";
$para_data[3] = "";
$para[4] = "";
$para_data[4] = "";
$para[5] = "";
$para_data[5] = "";
$get_pagesn = isset($_GET['article']) ? $_GET['article'] : '0';
if($get_pagesn > '0') {
		$conn = mysql_connect("localhost", "root", "");
	if(!$conn) {
	die('Error in connection');
	}
	mysql_select_db("codecamp");
	$takequery = "SELECT * FROM users_pages WHERE sn = '$get_pagesn' LIMIT 1";
	//echo $takequery;
	$asdf = mysql_query($takequery);
	$counntt = mysql_num_rows($asdf);
	if($counntt> 0) {
		while($asdff = mysql_fetch_array($asdf)) {
			print_r($asdff);
			$category = $asdff['category'];
			$title= $asdff['page_title'];
$para_data[0] = $asdff['para0'];
$para_data[1] = $asdff['para1'];
$para_data[2] = $asdff['para2'];
$para_data[3] = $asdff['para3'];
$para_data[4] = $asdff['para4'];
$para_data[5] = $asdff['para5'];
			
			
		}
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
	}
}
?>
<br><br><br><br>
<h3 style= "position:relative;left:30px;"> 
<br><br>
<div class="container">
<?php
if(array_key_exists("new_article", $_POST)) {
	//echo print_r($_POST);
	$get_pagesn = isset($_POST['pagesn']) ? $_POST['pagesn'] : '';
	$get_pagetitle = isset($_POST['page_title']) ? $_POST['page_title'] : '';
	$get_para0 = isset($_POST['para0']) ? $_POST['para0'] : '';
	$get_para1 = isset($_POST['para1']) ? $_POST['para1'] : '';
	$get_para2 = isset($_POST['para2']) ? $_POST['para2'] : '';
	$get_para3 = isset($_POST['para3']) ? $_POST['para3'] : '';
	$get_para4 = isset($_POST['para4']) ? $_POST['para4'] : '';
	$get_para5 = isset($_POST['para5']) ? $_POST['para5'] : '';
	
	$conn = mysql_connect("localhost", "root", "");
	if(!$conn) {
	die('Error in connection');
	}
	mysql_select_db("codecamp");
	$takequery = "UPDATE users_pages SET page_title = '$get_pagetitle' , para0 = '$get_para0', para1 = '$get_para1' , para2 = '$get_para2' , para3 = '$get_para3' , para4 = '$get_para4' , para5 = '$get_para5'  WHERE sn = '$get_pagesn'";
	echo $takequery;
	mysql_query($takequery);
	echo ' <div class="loginform" style="position:relative;left:30px;"> Updated successfully</div>';
} ?>
      <div class="loginform" style="position:relative;left:30px;">
        <form class="form-signin" role="form" action="edit.php?article=<?php echo $get_pagesn; ?>" method="post">
		<input type="hidden" name="pagesn" value= "<?php echo $get_pagesn; ?>" />
          <h2 class="form-signin-heading"><?php echo $category; ?></h2>
            Title <textarea  rows = "1" type="text" name ="page_title" class="form-control"  style=" width:700px;" placeholder="<?php echo $para[0]; ?>" autofocus> </textarea><br>
           	<?php echo $para[0]; ?><textarea  rows = "5" type="text" name ="para0" class="form-control"  style=" width:700px;" placeholder="<?php echo $para[0]; ?>" autofocus> <?php echo $para_data[0]; ?></textarea><br>
            <?php echo $para[1]; ?><textarea  rows = "5" type="text" name ="para1" class="form-control"  style=" width:700px;" placeholder="<?php echo $para[1]; ?>" autofocus>  <?php echo $para_data[1]; ?></textarea><br>
            <?php echo $para[2]; ?><textarea  rows = "5" type="text" name ="para2" class="form-control"  style=" width:700px;" placeholder="<?php echo $para[2]; ?>" autofocus> <?php echo $para_data[2]; ?> </textarea><br>
            <?php echo $para[3]; ?><textarea  rows = "5" type="text" name ="para3" class="form-control"  style=" width:700px;" placeholder="<?php echo $para[3]; ?>" autofocus> <?php echo $para_data[3]; ?> </textarea><br>
            <?php echo $para[4]; ?><textarea  rows = "5" type="text" name ="para4" class="form-control"  style=" width:700px;" placeholder="<?php echo $para[4]; ?>" autofocus> <?php echo $para_data[4]; ?> </textarea><br>
            <?php echo $para[5]; ?><textarea  rows = "5" type="text" name ="para5" class="form-control"  style=" width:700px;" placeholder="<?php echo $para[5]; ?>" autofocus> <?php echo $para_data[5]; ?> </textarea><br>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="new_article" value="new_article" style="width:auto;">Update article</button>
  </div>
 </div>