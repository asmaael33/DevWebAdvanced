<?php
require_once('config.php');

$db_pwd = $_ENV['db_pwd'];

$dbuser = "root"; 
$dbpass = $db_pwd; 
$host = "localhost"; 
$db = "devwebadvanced";
$mysqli = new mysqli($host, $dbuser, $dbpass, $db);
date_default_timezone_set("Africa/Casablanca");
$staff_login_sql = "SELECT * FROM users";
$res = mysqli_query($mysqli, $staff_login_sql);
if (mysqli_num_rows($res) >= 0) {
	echo "oui";
} else {
	echo "non";
}

