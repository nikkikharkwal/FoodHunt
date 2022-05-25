<?php 
session_start();
include('connection.php');
 $Vendorid=$_GET['Vendorid'];
$re=mysqli_query($con,"select * from tbfood where fldvendor_id='$Vendorid'");
$re_arr=mysqli_fetch_array($re);
$re_no=mysqli_num_rows($re);
if($re_no)
{
	unset($_SESSION['id']);
	 $vend_info=mysqli_query($con,"select * from tblvendor where fldvendor_id='$Vendorid'");
	 $vend_row=mysqli_fetch_array($vend_info);
	  $im=$vend_row['fld_logo'];
	  $em=$vend_row['fld_email'];
	  $food_img=$re_arr['fldimage'];
	 unlink("image/restaurant/$em/foodimages/$food_img");
	// rmdir("image/restaurant/$em/foodimages");
	 unlink("image/restaurant/$em/$im");
	 //rmdir("image/restaurant/$em");
	 mysqli_query($con,"delete from tbfood where fldvendor_id='$Vendorid'");
	 mysqli_query($con,"delete from tblvendor where fldvendor_id='$Vendorid'");
	 header( "refresh:5;url=dashboard.php" );
	 
}
else
{
	unset($_SESSION['id']);
	 $vend_info=mysqli_query($con,"select * from tblvendor where fldvendor_id='$Vendorid'");
	 $vend_row=mysqli_fetch_array($vend_info);
	  $im=$vend_row['fld_logo'];
	  $em=$vend_row['fld_email'];
	 mysqli_query($con,"delete from tblvendor where fldvendor_id='$Vendorid'");
	 unlink("image/restaurant/$em/$im");
	 rmdir("image/restaurant/$em/foodimages");
	 rmdir("image/restaurant/$em");
	 header( "refresh:5;url=dashboard.php" );
}

?>

<html>
  <head>
     <title>Admin control panel</title>
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <style>
  h1 {
  text-align: center;
  font-size: 60px;
  margin-top: 0px;
}
p {
  text-align: center;
  font-size: 60px;
  margin-top: 0px;
}
  </style>
  
  </head>
  
    
	<body>
	  <div class="container" style="margin:0px auto;text-align:center;">
     <p style="color:green;"> Please Wait While We Are Updating</p>
	 <img src="img/lg.walking-clock-preloader.gif"/></div>
	   <h1><time>00</time></h1>
<script>
var h1 = document.getElementsByTagName('h1')[0],
    start = document.getElementById('start'),
    stop = document.getElementById('stop'),
    clear = document.getElementById('clear'),
    seconds = 0, minutes = 0, hours = 0,
    t;

function add() {
    seconds++;
    if (seconds >= 60) {
        seconds = 0;
        minutes++;
        if (minutes >= 60) {
            minutes = 0;
            hours++;
        }
    }
    
    h1.textContent =   (seconds > 9 ? seconds : "0" + seconds);

    timer();
}
function timer() {
    t = setTimeout(add, 1000);
}
timer();



</script>

	</body>
