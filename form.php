<!doctype html>
<!--Form-->
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
		<title>
		Transaction Form
		</title>
			<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	</head>
	<body>
	<!--Navigation -->
	<ul class="nav justify-content-end">
	<li class="nav-item dropdown">
	<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"> 
	<?php echo htmlspecialchars($_SESSION["username"]); ?> </a>
	<div class="dropdown-menu">
      <a class="dropdown-item" href="index.php">Home</a>
      <a class="dropdown-item" href="balhist.php">Dashboard</a>
      <a class="dropdown-item" href="settings.php">Settings</a>
	  <a class="dropdown-item" href="#">Logout</a>
    </div>
	<li>
	</ul>
	<!--Dropdown Settings -->
	<center>
	
	<h1> Transaction</h1>
	<br>
		<form class="form-group" method="post" autocomplete="on">
		<label class="control-label">Tags:</label><input id="tags" type="text" placeholder="Tags" name="Tags" class="form-control" required><br>
		<label>Property:</label><input id="props" type="text" placeholder="Property" name="Property" class="form-control" required><br>
		<label>Cost:</label><input id="cost" type="text" placeholder="00.00" name="Cost" class="form-control" required><br>
	
	<br>
		<input type="submit" id="earn" formaction="earn.php" value="EARN" class="btn btn-success">&nbsp
		<input type="submit" id="send" formaction="send.php" value="SEND" class="btn btn-warning" disabled>&nbsp
		<input type="submit" id="spend" formaction="spend.php" value="SPEND" class="btn btn-danger">
	<!--Two Input Submit = earn & spend-->
	</form>
	
	</center>

	</body>
</html>	