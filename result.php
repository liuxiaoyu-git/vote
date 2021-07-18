<?php
$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("MYSQL_USER"); #openshift
$dbname = getenv("MYSQL_DATABASE"); #sampledb
$dbpwd = getenv("MYSQL_PASSWORD"); #password

$connection = mysqli_connect($dbhost.":".$dbport, $dbuser, $dbpwd, $dbname) or die("Error " . mysqli_error($connection));
$sql = "select vote_item, count(vote_item) vote_count from vote group by vote_item";


        $res=mysql_query($sql,$connection);
        $rows=mysql_affected_rows($connection);//获取行数
        $colums=mysql_num_fields($res);//获取列数
        
        echo "<table><tr>";
        for($i=0; $i < $colums; $i++){
            $field_name=mysql_field_name($res,$i);
            echo "<th>$field_name</th>";
        }
        echo "</tr>";
        while($row=mysql_fetch_row($res)){
            echo "<tr>";
            for($i=0; $i<$colums; $i++){
                echo "<td>$row[$i]</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

mysqli_close($connection);
?>
