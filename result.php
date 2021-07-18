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
      <td align="center"><font size="26" color="#FF0000">投票更新内容</font></td><td align="center"><font size="26" color="#FF0000">投票总数量</font></td>
    </tr>
    <?php
    while ($row = mysqli_fetch_assoc($rs)) {
      echo "<tr><td align=center><font size=26>".$row['vote_item']."</font></td>";
      echo "<td align=center><font size=26>".$row['vote_count']."</font></td></tr>";
    }
    mysqli_close($connection);
    ?>
  </table>
</div>
</html>
