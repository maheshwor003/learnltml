<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<!-- Bootstrap -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">VISIT NEPAL 2021</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li ><a href="home.php">Home</a></li>
      <li><a href="userlist.php">User List</a></li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>
  </div>
</nav>

	<?php
	if(isset($_SESSION['status']))
	{
		echo "<h5 class='alert alert-success'>".$_SESSION['status']."</h5>";
		unset($_SESSION['status']);
	}
	?>
	<div class="col-md-3"></div>
	<div class="col-md-12 well">
		<h3 class="text-primary">Welcome to Admin Homepage!</h3>
		
	
		<hr style="border-top:1px dotted #ccc;"/>
	
	
		<div class="col-md-12 mt-5">
		<div class="card">
		<div class="card-body">
		<div class="table-responsive">
		<table class="table table-bordered ">
  <thead>
    <tr>
      <th>s.no</th>
      <th >Customer Id</th>
	  <th >Customer Name</th>
	  <th >Phone no</th>
    <th>Destination</th>
      <th>Hotel Name</th>
      <th>Check Out</th>

    </tr>
  </thead>
  <tbody>
  <?php 
  include('includes/dbconfig.php');
  $ref ="posts";
  $fetchdata =$database->getReference($ref)->getvalue();
  $i = 0;
  if($fetchdata >0)
  { 
 foreach($fetchdata as $key => $row)
 {  
	 $i++;
	 ?>
    <tr>
    
      <td><?php echo $i;   ?></td>
	  <td><?php echo $row['uid']; ?></td>
      <td><?php echo $row['displayName']; ?></td>
      <td><?php echo $row['Phone']; ?></td>
	  <td><?php echo $row['Destination']; ?></td>
	  <td><?php echo $row['HotelName']; ?></td>
	  <td>
	
	  <form action="code.php" method="POST">
	  <input type="hidden" name="id_key" value="<?=$key;?>">
	  <button type="submit" name="delete_btn" class="btn btn-primary">Click Here!</button>
	  </form>
	  </td>
	  
    </tr>
	<?php
 }
 }
 else{
	 ?>
	 <tr>
	 <td colspan ="7">Booking are Empty!</td>
	 <tr>
	 <?php
 }
	?>
  
  </tbody>
</table></div></div></div>	<a href="login.php">Logout</a></div>
	</div>
</body>
</html>