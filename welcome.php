<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>!<br> Welcome to Money Tracker.</h1>
    </div>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
		<a href="piggybank.php" class="btn btn-warning">Piggy Bank</a>
		<a href="form.php" class="btn btn-success"> Transaction </a>
		<a href="form.php" class="btn btn-success"> Dashboard </a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
	<br>
	
	<?php
$connection=mysql_connect('localhost','root','') or die ('Connection Failed');
mysql_select_db('MoneyTrack');
$user=htmlspecialchars($_SESSION["username"]);
$query="SELECT Balance FROM balance_history WHERE username='$user' ORDER BY ID DESC LIMIT 1";
$result=mysql_query($query);
$i=0;

		while($i<mysql_num_fields($result))
		{
			$meta= mysql_fetch_field($result,$i);
			echo '<h3>' . $meta->name. ':&nbsp';
		$i++;} 
		
		
		while ($row=mysql_fetch_row($result))
		{	
			
			$count= count($row);
			$y=0;
			while ($y<$count)
			{
				$d_row=current($row);
				echo ($d_row); 
				
				next($row);				
				$y++;
				
			}
			echo'</h3>'
			;
		} 
		
			mysql_free_result($result);
			mysql_close($connection);
			
			?>
			
</body>
</html>