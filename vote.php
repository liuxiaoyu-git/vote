<?php
$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("MYSQL_USER"); #openshift
$dbname = getenv("MYSQL_DATABASE"); #sampledb
$dbpwd = getenv("MYSQL_PASSWORD"); #password

$vote = trim($_POST['vote']);
$sql = "insert into vote values('".$vote."')";

$connection = mysqli_connect($dbhost.":".$dbport, $dbuser, $dbpwd, $dbname) or die("Error " . mysqli_error($connection));
$connection->query($sql);

echo "投票结果：".$vote;

mysqli_close($connection);
?>