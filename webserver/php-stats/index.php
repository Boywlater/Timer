<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<title>Timer Stats (Lite) by Zipcore</title>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
</head>
<body>

<h1 align=middle>Top Players</h1>
<table width='100%' border='1' cellpadding='5' cellspacing='0';>
	<tr>
		<th align=middle>Name</th>
		<th align=middle>Points</th>
	</tr>

	<?
	require_once("inc/config.inc.php");
	require_once("inc/functions.inc.php");

	$sql = "SELECT `points`, `lastname`, `auth` FROM `ranks` ORDER BY `points` DESC LIMIT 10";
	$players = $link->query($sql);
	while($array = mysqli_fetch_array($players))
	{
		echo "<tr>";
		echo "<td align=middle>".$array["lastname"]."</td>";
		echo "<td align=middle>".$array["points"]."</td>";
		echo "</tr>";
	}
	?>
</table>

<h1 align=middle>Most World Records</h1>
<table width='100%' border='1' cellpadding='5' cellspacing='0';>
	<tr>
		<th align=middle>Name</th>
		<th align=middle>WRs</th>
	</tr>

	<?
	$sql = "SELECT COUNT(*), `name` FROM (SELECT * FROM `round` WHERE `rank` = 1) AS s GROUP BY `auth` ORDER BY 1 DESC LIMIT 10";
	$players = $link->query($sql);
	while($array = mysqli_fetch_array($players))
	{
		echo "<tr>";
		echo "<td align=middle>".$array["name"]."</td>";
		echo "<td align=middle>".$array[0]."</td>";
		echo "</tr>";
	}?>
</table>

<h1 align=middle>Top Maps</h1>
<table width='100%' border='1' cellpadding='5' cellspacing='0'>
	<tr>
		<th align=left>Map</th>
		<th align=middle>Records</th>
	</tr>

	<?
	$sql = "SELECT `map`, COUNT(*) FROM `round` GROUP BY `map` ORDER BY 2 DESC LIMIT 10";
	$maps = $link->query($sql);
	while($array = mysqli_fetch_array($maps))
	{
		echo "<tr>";
		echo "<td align=left>".$array["map"]."</td>";
		echo "<td align=middle>".$array[1]."</td>";
		echo "</tr>";
	}
	?>
</table>

<center><a target='_blank' href='http://forums.alliedmods.net/member.php?u=74431'>Timer Stats (Lite) &copy; 2014 by Zipcore</a></center>

<?
echo mysqli_error();
mysqli_real_escape_string("localhost");
mysqli_close();
?>
</body>
</html>
