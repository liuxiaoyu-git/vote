<?php
$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("DATABASE_USER"); #openshift
$dbname = getenv("DATABASE_NAME"); #demodb
$dbpwd = getenv("DATABASE_PASSWORD"); #password

$connection = mysqli_connect($dbhost.":".$dbport, $dbuser, $dbpwd, $dbname) or die("Error " . mysqli_error($connection));
$sql = "select vote_item, count(vote_item) vote_count from vote group by vote_item";


        $res=$connection->query($sql);
        $rows=$res->num_rows;//获取行数
        
        echo "<table><tr>";
        echo "<th>Vote Item</th><th>Vote Count</th>";
        echo "</tr>";
        while($row = $sql->fetch_assoc()){
            echo "<tr>";
            echo "<td>$row['vote_item']</td><td>$row['vote_count']</td>";
            echo "</tr>";
        }
        echo "</table>";

mysqli_close($connection);
?>
