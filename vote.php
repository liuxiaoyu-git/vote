<?php
$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("DATABASE_USER"); #openshift
$dbname = getenv("DATABASE_NAME"); #demodb
$dbpwd = getenv("DATABASE_PASSWORD"); #password

echo "dbhost".$dbhost;
echo "dbport".$dbport;
echo "dbuser".$dbuser;
echo "dbname".$dbname;
echo "dbpwd".$dbpwd;


$vote = trim($_POST['vote']);
$sql = "insert into vote values('".$vote."')";

$connection = mysqli_connect($dbhost.":".$dbport, $dbuser, $dbpwd, $dbname) or die("Error " . mysqli_error($connection));
$connection->query($sql);

echo "投票结果：".$vote;

mysqli_close($connection);
?>