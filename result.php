<?php
$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("MYSQL_USER"); #openshift
$dbname = getenv("MYSQL_DATABASE"); #sampledb
$dbpwd = getenv("MYSQL_PASSWORD"); #password
$username = trim($_POST['username']);
$code = trim($_POST['code']);
$prizetype = trim($_POST['prizetype']);
$connection = mysqli_connect($dbhost.":".$dbport, $dbuser, $dbpwd, $dbname) or die("Error " . mysqli_error($connection));
$sql = "insert into PrizeWheel values('".$username."-".$code."','".$prizetype."')";

$connection->query($sql);
	echo "<br/>用户名：".$username;
	echo "<br/>手机后4位：".$code;
	echo "<br/>抽奖结果：".$prizetype;

mysqli_close($connection);
?>
