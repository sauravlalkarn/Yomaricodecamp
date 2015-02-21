<?php
include "loggedheader.php";
?>
<?php
$query = isset($_GET['query'])? $_GET['query'] : '';
if($query != '') {
	
?><?php
	$conn = mysql_connect("localhost", "root", "");
	if(!$conn) {
	die('Error in connection');
	}
	mysql_select_db("codecamp");

		?>

<br><br>
<h3><small>articles</small></h3>
<br>
<?php 
$conn = mysql_connect("localhost", "root", "");
	if(!$conn) {
	die('Error in connection');
	}
	mysql_select_db("codecamp");
	$takequery = "SELECT * FROM users_pages WHERE page_title LIKE '%" . $query . "%' LIMIT 20";
	//echo $takequery;
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
                    <td> <a href="view.php?sn=' . $roo['sn'] . '"> ' . $roo['page_title'] . '</a></td>
          <td> ' . $roo['category'] . '</td>
          <td> ' . $roo['added_date'] .'</td>
        </tr>';
		$i = $i +1;
}
?>
      </tbody>
    </table>
<?php
}
else echo "no result found";
?>

</div>