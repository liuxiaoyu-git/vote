<?php
$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("DATABASE_USER"); #openshift
$dbname = getenv("DATABASE_NAME"); #sampledb
$dbpwd = getenv("DATABASE_PASSWORD"); #password
$connection = mysqli_connect($dbhost.":".$dbport, $dbuser, $dbpwd, $dbname) or die("Error " . mysqli_error($connection));
$sql = "select * from PrizeWheel order by user";
$rs = $connection->query($sql);

echo "<table><tr><td>抽奖人</td><td>获奖情况</td></tr>";
while($row = mysqli_fetch_assoc($rs))
	echo "<tr><td>".$row['user']."</td><td>".$row['prizetype']."</td></tr>";
echo "</table>";
mysqli_close($connection);
?>
