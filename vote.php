<?php
$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("DATABASE_USER"); #openshift
$dbname = getenv("DATABASE_NAME"); #demodb
$dbpwd = getenv("DATABASE_PASSWORD"); #password

echo "<br>dbhost:".$dbhost;
echo "<br>dbport:".$dbport;
echo "<br>dbuser".$dbuser;
echo "<br>dbname:".$dbname;
echo "<br>dbpwd:".$dbpwd;


$vote = trim($_POST['vote']);
$sql = "insert into vote values('".$vote."')";
echo "<br>sql:".$sql;

$connection = mysqli_connect($dbhost.":".$dbport, $dbuser, $dbpwd, $dbname) or die("Error " . mysqli_error($connection));
$connection->query($sql);

echo "<br>投票结果：".$vote;

mysqli_close($connection);
?>