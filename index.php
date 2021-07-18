<DOCTYPE HTML PUBLIC "-//W3C//DTDHTML 4.0 Transitional//EN">
<html>
	<HEAD>
		<title>投票</title>
<style type="text/css">
#main{width:100%;min-height:100%;height:100%;overflow:hidden !important;overflow: visible;}
.style1 {
	font-size: 24px;;
	color: #FF0000;
}
</style>
</head>
<body>
<table id="main">
	<tr>
	<td align="center">
	<form name="vote" method="post" action="vote.php">
	<table>
		<tr>
			<td colspan="2" align="center" height="100" valign="top"><img src="banner.png" width="350"></td>
		</tr>
		<tr>
			<td colspan="2" height="50" valign="top" class="style1">选出一项你希望新版本更新的内容：</td>
		</tr>
		<tr>
			<td>
				<select name="vote" style="font-size:24px;">
				  <option value="全部更新">更新和游戏背景和游戏宝藏</option>
				  <option value="游戏宝藏">只更新游戏背景</option>
				  <option value="游戏宝藏">只更新游戏宝藏</option>
				</select>
			</td>
			<td><input type="submit" value="投票"  style="font-size:22px;"></td>
		</tr>	
	</table>
	</form>
	</td>
	</tr>
</table>

</body>
</html>