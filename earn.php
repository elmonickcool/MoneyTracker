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
	<title>Earnings</title>
	<style>
	#add{	
	color:white;
	background-color: blue;
	border-style:solid;
	padding: 15px 20px;
	text-decoration:none;
	
}
#view{	
	color:white;
	background-color: yellow;
	border-style:solid;
	padding: 15px 20px;
	text-decoration:none;
	
}
#record{	
	color:white;
	background-color: green;
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
<?php
$connection = mysql_connect('localhost','root','') or die ('Connection Failed');
mysql_select_db('MoneyTrack');

$Tags = $_POST['Tags'];
$Prop = $_POST['Property'];
$Cost = $_POST['Cost'];
$Date = date('Y-m-d');
$user=htmlspecialchars($_SESSION["username"]);
$query = "INSERT INTO income(ID,Tags,Property,Earnings,Date,Username) VALUES ('','$Tags','$Prop','$Cost','$Date','$user')";
$result = mysql_query($query);

mysql_close($connection);

?>
<h1>Data Added</h1>
<br>
<a href="form.php" id="add"> Add Data</a>
<a href="income.php" id="view"> View Data</a>
<a href="record.php" id="record"> Record Balance</a>
</body>

</html>