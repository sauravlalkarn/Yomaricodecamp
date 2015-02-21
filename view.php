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
$get_pagesn = isset($_GET['sn']) ? $_GET['sn'] : '0';
if($get_pagesn > '0') {
		$conn = mysql_connect("localhost", "root", "");
	if(!$conn) {
	die('Error in connection');
	}
	mysql_select_db("codecamp");
	$takequery = "SELECT * FROM users_pages WHERE sn = '$get_pagesn' LIMIT 1";
	$asdf = mysql_query($takequery);
	$counntt = mysql_num_rows($asdf);
	if($counntt> 0) {
		while($asdff = mysql_fetch_array($asdf)) {
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
<?php
$conn = mysql_connect("localhost", "root", "");
	if(!$conn) {
	die('Error in connection');
	}
	mysql_select_db("codecamp");
$takequery = "INSERT INTO page_viewed (userid, page_sn ) VALUES ('$get_userid', '$get_pagesn')";
mysql_query($takequery);


?>
<script type="text/javascript" language="JavaScript">
    function clickedButton()
    {
        window.location = 'edit.php?article=<?php echo $get_pagesn;?>'
    }
</script>
<br><br><br>
<div style="position:relative;left:50px;top:50px;">
<?php  echo $title; ?><br>
<h4> <?php echo $para[0]; ?> </h4>
<p> <?php echo $para_data[0]; ?> </p>
<br><br>

<h4> <?php echo $para[1]; ?> </h4>
<p> <?php echo $para_data[1]; ?> </p>
<br><br>

<h4> <?php echo $para[2]; ?> </h4>
<p>  <?php echo $para_data[2]; ?></p>
<br><br>

<h4> <?php echo $para[3]; ?> </h4>
<p>  <?php echo $para_data[3]; ?> </p>
<br><br>

<h4> <?php echo $para[4]; ?> </h4>
<p>  <?php echo $para_data[4]; ?> </p>
<br><br>

<h4> <?php echo $para[5]; ?> </h4>
<p>  <?php echo $para_data[5]; ?> </p>
<br><br>
</div>
<br><br>
<button class="btn btn-primary" onclick="clickedButton()" style="width:auto;position:relative;left:500px;">Edit</button>