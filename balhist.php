<!doctype html>
<html>
<head>
<title>Dashboard</title>
</head>
<body>
<?php
$connection=mysql_connect('localhost','root','') or die ('Connection Failed');
mysql_select_db('MoneyTrack');
$query='SELECT Date AS "Date Recorded",Balance FROM balance_history ORDER BY Date ASC';
$result=mysql_query($query);

$i=0;
echo"<center>";
echo "<br><br><br>";

echo "<table border='1' cellpadding='10px'>";
	
	echo "<tr>";
		while($i<mysql_num_fields($result))
		{
			$meta= mysql_fetch_field($result,$i);
			echo '<td>' . '<b>' . $meta->name. '</b>' . '</td>';
		$i++;} 
		echo "</tr>";
		
		while ($row=mysql_fetch_row($result))
		{	
			echo '<tr>';
			$count= count($row);
			$y=0;
			while ($y<$count)
			{
				$d_row=current($row);
				echo '<td>';
				echo ($d_row); 
				echo '</td>';
				next($row);				
				$y++;
				
			}
			
			echo '</tr>';
		} 
		
			echo "</table>";
			echo"</center>";	
		
			mysql_free_result($result);
			mysql_close($connection);
			
?>
<?php
$connection=mysql_connect('localhost','root','') or die ('Connection Failed');
mysql_select_db('MoneyTrack');
$query='SELECT Date,Earnings FROM income';
$result=mysql_query($query);

$i=0;
echo"<center>";
echo "<br><br><br>";

echo "<table border='1' cellpadding='10px'>";
	
	echo "<tr>";
		while($i<mysql_num_fields($result))
		{
			$meta= mysql_fetch_field($result,$i);
			echo '<td>' . '<b>' . $meta->name. '</b>' . '</td>';
		$i++;} 
		echo "</tr>";
		
		while ($row=mysql_fetch_row($result))
		{	
			echo '<tr>';
			$count= count($row);
			$y=0;
			while ($y<$count)
			{
				$d_row=current($row);
				echo '<td>';
				echo ($d_row); 
				echo '</td>';
				next($row);				
				$y++;
				
			}
			
			echo '</tr>';
		} 
		
			echo "</table>";
			echo"</center>";	
		
			mysql_free_result($result);
			mysql_close($connection);
			
?>
<?php
$connection=mysql_connect('localhost','root','') or die ('Connection Failed');
mysql_select_db('MoneyTrack');
$query='SELECT Date,Spendings FROM expense';
$result=mysql_query($query);

$i=0;
echo"<center>";
echo "<br><br><br>";

echo "<table border='1' cellpadding='10px'>";
	
	echo "<tr>";
		while($i<mysql_num_fields($result))
		{
			$meta= mysql_fetch_field($result,$i);
			echo '<td>' . '<b>' . $meta->name. '</b>' . '</td>';
		$i++;} 
		echo "</tr>";
		
		while ($row=mysql_fetch_row($result))
		{	
			echo '<tr>';
			$count= count($row);
			$y=0;
			while ($y<$count)
			{
				$d_row=current($row);
				echo '<td>';
				echo ($d_row); 
				echo '</td>';
				next($row);				
				$y++;
				
			}
			
			echo '</tr>';
		} 
		
			echo "</table>";
			echo"</center>";	
		
			mysql_free_result($result);
			mysql_close($connection);
			
?>

</body>
</html>