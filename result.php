<?php
$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("DATABASE_USER");
$dbname = getenv("DATABASE_NAME");
$dbpwd = getenv("DATABASE_PASSWORD");
$connection = mysqli_connect($dbhost.":".$dbport, $dbuser, $dbpwd, $dbname) or die("Error " . mysqli_error($connection));
$sql = "select vote_item, count(vote_item) vote_count from vote group by vote_item";
$rs = $connection->query($sql);
?>
<html>
<div id="box">
    <table width="100%" height="100%">
        <tr>
            <td align="center">
                <font size="26" color="#FF0000">
                    <?php
                    while ($row = mysqli_fetch_assoc($rs)) {
                        echo "更新内容: ". $row['vote_item']. "  投票总数量: ". $row['vote_count']. "<br>";
                    }
                    mysqli_close($connection);
                    ?>
                </font>
            </td>
        </tr>
    </table>
</div>
</html>
