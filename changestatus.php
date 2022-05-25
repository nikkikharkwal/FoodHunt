<?php
include("connection.php");
session_start();
extract($_REQUEST);
if(isset($updstatus))
{
	if(!empty($_SESSION['id']))
{
	  if(mysqli_query($con,"update tblorder set fldstatus='$status' where fld_order_id='$order_id'"))
	  {
		  header("location:food.php");
	  }
}
else
{
	header("location:vendor_login.php?msg=You Must Login First");
}
}

?>
<html>
<head>
<title>change order Status</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	  <!--bootstrap files-->
	  <style>
	  ul li{}
		ul li a {color:black;}
		ul li a:hover {color:black; font-weight:bold;}
		ul li {list-style:none;}
		</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  
    <a class="navbar-brand" href="index.php"><span style="color:green;font-family: 'Permanent Marker', cursive;">Food Hunt</span></a>
    <?php
	if(!empty($id))
	{
	?>
	<a class="navbar-brand" style="color:black; text-decoration:none;"><i class="far fa-user"><?php if(isset($id)) { echo $vr['fld_name']; }?></i></a>
	<?php
	}
	?>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
	
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home
                
              </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="aboutus.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="services.php">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
		<li class="nav-item">
		  <form method="post">
          <?php
			if(empty($_SESSION['id']))
			{
			?>
		   <button class="btn btn-outline-danger my-2 my-sm-0" name="login">Log In</button>&nbsp;&nbsp;&nbsp;
            <?php
			}
			else
			{
			?>
			
			<button class="btn btn-outline-success my-2 my-sm-0" name="logout" type="submit">Log Out</button>&nbsp;&nbsp;&nbsp;
			<?php
			}
			?>
			</form>
        </li>
		
		
      </ul>
	  
    </div>
	
</nav>

<br><br><br><br><br><br>
   <div class="container">
    <form method="post">
      <div class="row">
	 
	  <div class="col-sm-4">Update Order Status</div>
	  <div class="col-sm-4">Delivered<input type="radio"  name="status" value="Delivered">&nbsp;&nbsp;&nbsp;Out Of Stock<input type="radio"  name="status" value="Out Of Stock"><br>
	  <br>
	  
	  <button type="submit" class="btn btn-outline-success" name="updstatus">Update Status</button>
	  </div>
	  <div class="col-sm-4"></div>
	  
	  </div>
	  </form>
   </div>
   <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
   <?php
   include("footer.php");
   ?>
</body>
</html>