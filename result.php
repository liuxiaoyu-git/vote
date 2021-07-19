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
  <head>
    <meta http-equiv="refresh" content="5">
  </head>
<table width="100%" height="100%">
	<tr>
	<td align="center">
	<table>
      <tr width=600 height=150>
        <td colspan="2" align="center" height="100" valign="top"><img src="banner.png" width="500"></td>
      </tr>
      <tr>
        <td align="center"><font size="24px" color="#FF0000">投票更新内容</font></td>
        <td align="center"><font size="24px" color="#FF0000">投票总数量</font></td>
      </tr>
      <?php
      while ($row = mysqli_fetch_assoc($rs)) {
        echo "<tr><td align=center><font size=24px>".$row['vote_item']."</font></td>";
        echo "<td align=center><font size=24px>".$row['vote_count']."</font></td></tr>";
      }
      mysqli_close($connection);
      ?>
	</table>
	</td>
	</tr>
</table>
</html>
