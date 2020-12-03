<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<html>
<head>

<title>Money Tracker</title>
<style>
#transact{	
	color:white;
	background-color: blue;
	border-style:solid;
	padding: 15px 20px;
	text-decoration:none;
	
}
#history{	
	color:white;
	background-color: blue;
	border-style:solid;
	padding: 15px 20px;
	text-decoration:none;
	
}
#data{
	color:black;
	background-color: white;
	border-style:solid;
	padding: 15px 20px;
	text-decoration:none;
	
}
a{
	font-size: 30px;
}
</style>
</head>

<body>

<center>
<?php
$connection=mysql_connect('localhost','root','') or die ('Connection Failed');
mysql_select_db('MoneyTrack');
$query='SELECT SUM(Earnings) AS Total_Earnings FROM Income';
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
		
			mysql_free_result($result);
			mysql_close($connection);
			
?>

<?php
$connection=mysql_connect('localhost','root','') or die ('Connection Failed');
mysql_select_db('MoneyTrack');
$query='SELECT SUM(Spendings) AS Total_Spendings FROM Expense';
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

<h1>Balance Recorded</h1>
<?php
$connection=mysql_connect('localhost','root','') or die ('Connection Failed');
mysql_select_db('MoneyTrack');

date_default_timezone_set('Asia/Manila');
$Date = date('Y-m-d');
$bal= $c_row-$d_row;
$user = htmlspecialchars($_SESSION["username"]);
$query="INSERT INTO balance_history(ID,Date,Balance,username) VALUES ('','$Date','$bal','$user')";
$result=mysql_query($query);

mysql_close($connection);

?>

<br>
<a id="transact" href="form.php">Transact</a>
<a id="history" href="balhist.php"> Balance History</a>
<br>
<?php
echo"<br><br><br><br><br><br>";
echo "<a id='data'>Date:".$Date;
echo"</a><br><br><br><br><br><br>";
echo "<a id='data'>Balance:". $bal."</a>";
?>
<!--
SQL to show total balance of the month 
SELECT SUM() FROM projects WHERE YEAR(Date) = 2011 AND MONTH(Date) = 5
-->
</center>
</body>
</html>