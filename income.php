<html>

<head>
<title>Income</title>
</head>
<body>
<?php
$connection=mysql_connect('localhost','root','') or die ('Connection Failed');
mysql_select_db('MoneyTrack');
$query='SELECT Date,Earnings,Tags FROM income';
$result=mysql_query($query);
$i=0;
echo"<center>";
echo "<br><br><br>";

echo "<table border='0' cellpadding='10px'>";
	
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
				$c_row=current($row);
				echo '<td>';
				echo ($c_row); 
				echo '</td>';
				next($row);				
				$y++;
				
			}
			
			echo '</tr>';
		} 
		
			echo "</table>";
			echo"</center>";
			echo" Total Earnings:";	
			
			mysql_free_result($result);
			mysql_close($connection);
			
?>

<?php
$connection=mysql_connect('localhost','root','') or die ('Connection Failed');
mysql_select_db('MoneyTrack');
$query='SELECT SUM(Earnings) FROM Income';
$result=mysql_query($query);
$i=0;

		
		
		while ($row=mysql_fetch_row($result))
		{	
			echo '<tr>';
			$count= count($row);
			$y=0;
			while ($y<$count)
			{
				$c_row=current($row);
				echo '<td>';
				echo ($c_row); 
				echo '</td>';
				next($row);				
				$y++;
				
			}
			
			echo '</tr>';
		}
		
			mysql_free_result($result);
			mysql_close($connection);
			
			?>
			
</body>
</html>