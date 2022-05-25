<?php
include("../connection.php");
echo $cust_id=$_GET['cust_id'];

$query=mysqli_query($con,"select tbfood.food_id,tbfood.foodname,tbfood.fldvendor_id,tbfood.cost,tbfood.cuisines,tbfood.fldimage,tblcart.fld_cart_id,tblcart.fld_product_id,tblcart.fld_customer_id from tbfood inner  join tblcart on tbfood.food_id=tblcart.fld_product_id where tblcart.fld_customer_id='$cust_id'");
$re=mysqli_num_rows($query);
while($row=mysqli_fetch_array($query))
{
	echo "<br>";
	echo "cart id is".$cart_id=$row['fld_cart_id'];
	echo "vendor id is".$ven_id=$row['fldvendor_id'];
	echo "food_id is".$food_id=$row['food_id'];
	echo "cost is".$cost=$row['cost'];
	//$em_id=$row['fld_email'];
	echo 'payment status is'.$paid="In Process";
	
	if(mysqli_query($con,"insert into tblorder
	(fld_cart_id,fldvendor_id,fld_food_id,fld_email_id,fld_payment,fldstatus) values
	('$cart_id','$ven_id','$food_id','$cust_id','$cost','$paid')"))
	{
		if(mysqli_query($con,"delete from tblcart where fld_cart_id='$cart_id'"))
		{
			header("location:customerupdate.php");
		}
	}
	else
	{
		echo "failed";
	}
	//$row['food_id']."<br>";
}
?>