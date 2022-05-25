<?php
include("connection.php");
extract($_REQUEST);
session_start();
if(isset($_SESSION['cust_id']))
{
	 $cust_id=$_SESSION['cust_id'];
	 $qq=mysqli_query($con,"select * from tblcustomer where fld_email='$cust_id'");
	 $qqr= mysqli_fetch_array($qq);
}
else
{
	$cust_id="";
}
if(isset($food_id))
{
$fid= $food_id;
}
else
{
	header("location:index.php");
}
if(isset($login))
 {
	 header("location:form/index.php");
 }
 if(isset($logout))
 {
	 session_destroy();
	 header("location:index.php");
 }
if(isset($addtocart))
 {
	 
	if(!empty($_SESSION['cust_id']))
	{
		 
		header("location:form/cart.php?product=$addtocart");
	}
	else
	{
		header("location:form/?product=$addtocart");
	}
 }

$query=mysqli_query($con,"select tbfood.foodname,tbfood.fldvendor_id,tbfood.cost,tbfood.cuisines,tbfood.fldimage,tblcart.fld_cart_id,tblcart.fld_product_id,tblcart.fld_customer_id from tbfood inner  join tblcart on tbfood.food_id=tblcart.fld_product_id where tblcart.fld_customer_id='$cust_id'");
  $re=mysqli_num_rows($query);
?>
<html>
  <head>
     <title>Home</title>
	 <!--bootstrap files-->
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	  <!--bootstrap files-->
	 
	 <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	 
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	 <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Permanent+Marker" rel="stylesheet">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
	 
	 
	 
	 <script>
	 //search product function
            $(document).ready(function(){
	
	             $("#search_text").keypress(function()
	                      {
	                       load_data();
	                       function load_data(query)
	                           {
		                        $.ajax({
			                    url:"fetch2.php",
			                    method:"post",
			                    data:{query:query},
			                    success:function(data)
			                                 {
				                               $('#result').html(data);
			                                  }
		                                });
	                             }
	
	                           $('#search_text').keyup(function(){
		                       var search = $(this).val();
		                           if(search != '')
		                               {
			                             load_data(search);
		                                }
		                            else
		                             {
			                         $('#result').html(data);			
		                              }
	                                });
	                              });
	                            });
								
								//hotel search
								$(document).ready(function(){
	
	                            $("#search_hotel").keypress(function()
	                         {
	                         load_data();
	                       function load_data(query)
	                           {
		                        $.ajax({
			                    url:"fetch.php",
			                    method:"post",
			                    data:{query:query},
			                    success:function(data)
			                                 {
				                               $('#resulthotel').html(data);
			                                  }
		                                });
	                             }
	
	                           $('#search_hotel').keyup(function(){
		                       var search = $(this).val();
		                           if(search != '')
		                               {
			                             load_data(search);
		                                }
		                            else
		                             {
			                         load_data();			
		                              }
	                                });
	                              });
	                            });
</script>
<style>
#aboutus{
     background-image:url("img/main_spice2.jpg");
	 background-repeat: no-repeat;
	 background-attachment: fixed;
	  background-position: center;
  
}

ul li {list-style:none;}
ul li a{color:black; font-weight:bold;}
ul li a:hover{text-decoration:none;}


</style>
  </head>
  
    
	<body>
	

<div id="result" style="position:fixed;top:100; right:50;z-index: 3000;width:350px;background:white;"></div>

<nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">
  
    <a class="navbar-brand" href="index.php"><span style="color:green;font-family: 'Permanent Marker', cursive;">Food Hunt</span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php
	if(!empty($cust_id))
	{
	?>
	<a class="navbar-brand" style="color:white; text-decoratio:none;"><i class="far fa-user"><?php if(isset($cust_id)) { echo $qqr['fld_name']; }?></i></a>
	<?php
	}
	?>
	
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
	
      <ul class="navbar-nav ml-auto">
	      
          
		  <li class="nav-item">
		     <a href="index.php" style="color:white;" class="nav-link">Home</a>
		  </li>
		  <li class="nav-item">
		     <a href="aboutus.php" style="color:white;" class="nav-link">About Us</a>
		  </li>
		  <li class="nav-item">
		     <a href="services.php" style="color:white;" class="nav-link">Services</a>
		  </li>
		  <li class="nav-item">
		     <a href="contact.php" style="color:white;" class="nav-link">Contact Us</a>
		  </li>
		  <?php
			if(empty($cust_id))
			{
			?>
			<li class="nav-item">
			  <a href="form/index.php?msg=you must be login first" class="nav-link"><span style="color:red;  font-size:30px;"><i class="fa fa-shopping-cart" aria-hidden="true"><span style="color:red;" id="cart"  class="badge badge-light">0</span></i></span></a>
		    </li>
			
			<li class="nav-item">
			<a  class="nav-link"><form method="post"><button class="btn btn-outline-danger my-2 my-sm-0" name="login" type="submit">Log In</button></form></a>
            </li>
			<?php
			}
			else
			{
			?>
			<li class="nav-item">
			<a href="form/cart.php" class="nav-link"><form method="post"><span style=" color:green; font-size:30px;"><i class="fa fa-shopping-cart" aria-hidden="true"><span style="color:green;" id="cart"  class="badge badge-light"><?php if(isset($re)) { echo $re; }?></span></i></span></form></a>
			</li>
			<li class="nav-item">
			<a class="nav-link"><form method="post"><button class="btn btn-outline-success my-2 my-sm-0" name="logout" type="submit">Log Out</button></form></a>
			</li>
			<?php
			}
			?>
	  
		
        
      </ul>
	  
    </div>
	
</nav>
<br><br><br><br>
<!--menu ends-->

<div class="container-fluid" >
<br><br>
<div class="row">
   <div class="col-sm-3"></div>
   <div class="col-sm-6" >
   <?php
	  
	  $query=mysqli_query($con,"select tblvendor.fld_email,tblvendor.fld_name,tblvendor.fld_mob,
	  tblvendor.fld_phone,tblvendor.fld_address,tblvendor.fld_logo,tbfood.foodname,tbfood.cost,
	  tbfood.cuisines,tbfood.paymentmode,tbfood.fldimage from tblvendor inner join
	  tbfood on tblvendor.fldvendor_id=tbfood.fldvendor_id where tbfood.food_id='$fid'");
	  if(mysqli_num_rows($query))
	  {
	  while($res=mysqli_fetch_assoc($query))
	  {
		   $hotel_logo= "image/restaurant/".$res['fld_email']."/".$res['fld_logo'];
		   $food_pic= "image/restaurant/".$res['fld_email']."/foodimages/".$res['fldimage'];
	  ?>
	  <div class="container-fluid">
	  <div class="container-fluid">
	     <div class="row" style="padding-top:10px; ">
		      <div class="col-sm-2"><img src="<?php echo $hotel_logo; ?>" class="rounded-circle" height="50px" width="50px" alt="Cinque Terre"></div>
		      <div class="col-sm-6">
		                     <span style="font-family: 'Miriam Libre', sans-serif; font-size:18px;color:#CB202D;">
		 <?php echo $res['fld_name']; ?></span><span style="color:black; margin-left:10px;"><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></span>
        </div>
		 <div class="col-sm-2"><i class="fas fa-rupee-sign"></i><span style="color:green; font-size:20px;"> <?php echo $res['cost']; ?></span></div>
		 <form method="post">
		 <div class="col-sm-2" style="text-align:left;padding:10px; font-size:15px;"><button type="submit" name="addtocart" value="<?php echo $fid; ?>")" ><span style="color:green;" <i class="fa fa-shopping-cart" aria-hidden="true"></i></span></button></div>
		 </form>
		 </div>
		 
	  </div>
	  <div class="container-fluid">
	  <div class="row" style="padding:10px;padding-top:0px;padding-right:0px; padding-left:0px;">
		 <div class="col-sm-12"><img src="<?php echo $food_pic; ?>" class="rounded" height="400px" width="100%" alt="Cinque Terre"></div>
		 
		 </div>
	  </div>
	  <div class="container-fluid">
	     <div class="row" style="padding:10px; ">
		 <div class="col-sm-5">
		 <span><li><?php echo $res['cuisines']; ?></li></span>
		 <span><li><?php echo "Rs ".$res['cost']; ?>&nbsp;for 1</li></span>
		 <span><li>Up To 60 Minutes</li></span>
		 </div>
		 <div class="col-sm-6" style="">
		 <b><?php echo"(" .$res['foodname'].")"?></b>
		 </div>
		 </div>
		 
	  </div>
	
	
	<?php
	  }
	  }
	  else
	  {
	?>
	<div class="row"><div class="col-sm-12" style="color:red;"><?php echo "sorry No Record Found For This Order";?></div></div>
	<?php
	  }
	?>
	</div>

   
   </div>
   
   <div class="col-sm-3"></div>
</div>
</div>
<br><br>
<div class="container">
    <div class="row">
	    <div class="col-sm-4">
		
		</div>
		<div class="col-sm-4">
		
		</div>
		<div class="col-sm-4">
		
		</div>
	</div>
</div>
<!--footer primary-->
	     <?php
		 include("footer.php");
		 ?>
</body>

</html>