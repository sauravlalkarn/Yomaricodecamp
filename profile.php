<?php
include "loggedheader.php";
?>
<?php
	$conn = mysql_connect("localhost", "root", "");
	if(!$conn) {
	die('Error in connection');
	}
	mysql_select_db("codecamp");
	$takequery = "SELECT * FROM user_details WHERE sn = '$get_userid' LIMIT 1";
	//echo $takequery;
	$aaa = mysql_query($takequery);
	while($aaaa = mysql_fetch_array($aaa)) {
		?>
<br><br><br><br><br><br>
<div class="container">
<h3><small>Account Details</small></h3><br>
<form class="form-horizontal">
  <div class="form-group">
    <label class="col-sm-2 control-label">Username</label>
    <div class="col-sm-10">
      <p class="form-control-static"><?php echo $aaaa['user_name']; ?></p>
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <p class="form-control-static"><?php echo $aaaa['user_email']; ?></p>
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">Country</label>
    <div class="col-sm-10">
      <p class="form-control-static"><?php echo $aaaa['user_country']; ?></p>
    </div>
  </div>
  
</form>
	<?php
	}
	?>
<br><br>
<h3><small> Created articles</small></h3>
<br>
<?php 
$conn = mysql_connect("localhost", "root", "");
	if(!$conn) {
	die('Error in connection');
	}
	mysql_select_db("codecamp");
	$takequery = "SELECT * FROM users_pages WHERE userid = '$get_userid'";
	$asdd = mysql_query($takequery);
	?>
 <table class="table table-condensed">
      <thead>
        <tr>
          <th>#</th>
          <th>Article Title</th>
          <th>Category</th>
          <th>Created on</th>
        </tr>
      </thead>
      <tbody>
	  
<?php 
$i = 1;
while ($roo = mysql_fetch_array($asdd)) {
	   
	echo '  <tr>
          <th scope="row"> ' . $i . '</th>
                    <td> ' . $roo['page_title'] . '</td>
          <td> ' . $roo['category'] . '</td>
          <td> ' . $roo['added_date'] .'</td>
        </tr>';
		$i = $i +1;
}
?>
      </tbody>
    </table>


<br><br><br>
<h3><small> Viewed articles</small></h3>
<br>
<?php 
$conn = mysql_connect("localhost", "root", "");
	if(!$conn) {
	die('Error in connection');
	}
	mysql_select_db("codecamp");
	$takequery = "
	SELECT page_viewed.page_sn, page_viewed.added_date, users_pages.page_title, users_pages.category FROM page_viewed INNER JOIN users_pages
	WHERE page_viewed.page_sn = users_pages.sn"; //" ORDER BY DATE(added_date) DEC";
	
	//echo $takequery;
	$asdd = mysql_query($takequery);
	?>
 <table class="table table-condensed">
      <thead>
        <tr>
          <th>#</th>
          <th>Article Title</th>
          <th>Category</th>
          <th>Viewed on</th>
        </tr>
      </thead>
      <tbody>
	  <?php 
$i = 1;
while ($roo = mysql_fetch_array($asdd)) {
	   
	echo '  <tr>
          <th scope="row"> ' . $i . '</th>
                    <td> ' . $roo['page_title'] . '</td>
          <td> ' . $roo['category'] . '</td>
          <td> ' . $roo['added_date'] .'</td>
        </tr>';
		$i = $i +1;
}
?>
      </tbody>
    </table>
</div>