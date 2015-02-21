<?php

function sessionid_to_userid($session_data){
	$conn = mysql_connect("localhost", "root", "");
if(!$conn) {
die('Error in connection');
}
mysql_select_db("codecamp");
$takequery = "SELECT * FROM user_current_sessions WHERE session_data = '$session_data'";
$asdd = mysql_query($takequery);
$counnt = mysql_num_rows($asdd);
if($counnt == '1') {
	while($aaa = mysql_fetch_array($asdd)) {
	return	$aaa['userid'];
	}
}
return 0;
}


function valid_email($email){
	return 1;
}
function email_to_userid($email = "0"){ 
if($email == '0');
return 0;
if(valid_email($email)) {
$conn = mysql_connect("localhost", "root", "");
if(!$conn) {
die('Error in connection');
}
mysql_select_db("codecamp");
$takequery = "SELECT sn from user_details WHERE user_email = '$email' LIMIT 1";
//echo $takequery;
$query11 = mysql_query($takequery);
while($asdf = mysql_fetch_array($query11)) {
return $asdf['sn'];
}
}
else return 0;
}


function userid_to_username($userid = "0"){
if($userid <= '0')
return 0;
//echo "checking";
$conn = mysql_connect("localhost", "root", "");
if(!$conn) {
die('Error in connection');
}
mysql_select_db("codecamp");
$takequery = "SELECT user_name from user_details WHERE sn = '$userid' LIMIT 1";
//echo $takequery;
$query11 = mysql_query($takequery);
while($asdf = mysql_fetch_array($query11)) {
return $asdf['user_name'];
}
 return 0;
}
/*
function userid_to_firstname($userid = '0') {
if($userid <= '0');
return 0;
$conn = mysql_host("localhost", "root", "");
if(!$conn) {
die('Error in connection');
}
mysql_select_db("codecamp");
$takequery = "SELECT username form user_details WHERE sn = '$userid' LIMIT 1";
$query11 = mysql_query($takequery);
while($asdf = mysql_fetch_array($query11)) {
return $asdf['user_firstname'];
}
}
else return 0;
}*/

function check_valid_username($username = ''){
	return 1;
}
function check_new_username($username = ''){
	$conn = mysql_connect("localhost", "root", "");
if(!$conn) {
die('Error in connection');
}
mysql_select_db("codecamp");
$takequery = "SELECT COUNT(*) as countt from user_details WHERE user_name='$username' LIMIT 1";
$asdff =mysql_query($takequery);
echo $takequery;

$countt = '0';
while($feetch = mysql_fetch_array($asdff)) {
	$countt = $feetch['countt'];
}
//$counnt =count($asdf);
//echo $counnt;
if($countt != '0'){
	return 0;
}
else return 1;
}

function check_new_email($username = ''){
	$conn = mysql_connect("localhost", "root", "");
if(!$conn) {
die('Error in connection');
}
mysql_select_db("codecamp");
$takequery = "SELECT COUNT(*) as countt from user_details WHERE user_email='$username' LIMIT 1";
$asdff =mysql_query($takequery);
echo $takequery;

$countt = '0';
while($feetch = mysql_fetch_array($asdff)) {
	$countt = $feetch['countt'];
}
//$counnt =count($asdf);
//echo $counnt;
if($countt != '0'){
	return 0;
}
else return 1;
}
?>