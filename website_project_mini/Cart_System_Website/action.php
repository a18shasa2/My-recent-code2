<?php
session_start();
require_once "dbconfig.php";

if(isset($_POST["pid"]) && isset($_POST["pname"]) && isset($_POST["pprice"]) && isset($_POST["pimage"]) && isset($_POST["pcode"]))
{
	$id		= $_POST["pid"];
	$name 	= $_POST["pname"];
	$price 	= $_POST["pprice"];
	$image 	= $_POST["pimage"];
	$code 	= $_POST["pcode"];
	$qty = 1 ;
	
	$select_stmt=$db->prepare("SELECT product_code FROM cart WHERE product_code=:code");
	$select_stmt->execute(array(":code"=>$code));  
	$row=$select_stmt->fetch(PDO::FETCH_ASSOC);
	
	$check_code = $row["product_code"];
		
	if(!$check_code)
	{
		$insert_stmt=$db->prepare("INSERT INTO cart(product_name,
													product_price,
													product_image, 
													quantity,
													total_price,
													product_code) 
												VALUES
													(:name,
													:price,
													:image,
													:qty,
													:ttl_price,
													:code)"); 					
		$insert_stmt->bindParam(":name",$name);	
		$insert_stmt->bindParam(":price",$price);	
		$insert_stmt->bindParam(":image",$image);	
		$insert_stmt->bindParam(":qty",$qty);	 
		$insert_stmt->bindParam(":ttl_price",$price);	
		$insert_stmt->bindParam(":code",$code);	
		$insert_stmt->execute();
				
		echo '<div class="alert alert-success alert-dismissible mt-2">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Item added to your cart</strong> 
			  </div>';				
	}
	else
	{
		echo '<div class="alert alert-danger alert-dismissible mt-2">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Item already added to your cart!</strong> 
			  </div>';
	}
}

if(isset($_GET["cartItem"]) && isset($_GET["cartItem"])=="cart_item")
{
	$select_stmt=$db->prepare("SELECT * FROM cart");
	$select_stmt->execute();  
	$row=$select_stmt->rowCount();
	echo $row;
}

if(isset($_GET["remove"]))
{
	$id = $_GET["remove"];
	$delete_stmt = $db->prepare("DELETE FROM cart WHERE cart_id =:cid");
	$delete_stmt->execute(array(":cid"=>$id));
	
	$_SESSION["showAlert"] = "block";	
	$_SESSION["message"] = "Item removed from the cart";
	header("location:cart.php");
}

if(isset($_GET["clear"]))
{
	$id = $_GET["clear"];
	$delete_stmt = $db->prepare("DELETE FROM cart");
	$delete_stmt->execute();
	
	$_SESSION["showAlert"] = "block";	
	$_SESSION["message"] = "All item removed from the cart";
	header("location:cart.php");
}

if(isset($_POST["pqty"]))
{
	$qty	= $_POST["pqty"];
	$id		= $_POST["pid"];
	$price	= $_POST["pprice"];
	
	$total_price = $qty * $price;
	
	$update_stmt=$db->prepare("UPDATE cart SET quantity=:qty, total_price=:ttl_price WHERE cart_id=:cid");
	$update_stmt->execute(array(":qty"=>$qty, 
								":ttl_price"=>$total_price, 
								":cid"=>$id));
}
if(isset($_POST["action"]) && isset($_POST["action"])=="order")
{
	$name = $_POST["name"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$address = $_POST["address"];
	$pmode = $_POST["pmode"];
	$products = $_POST["products"];
	$grand_total = $_POST["grand_total"];
	
	$data = "";
	
	$insert_stmt=$db->prepare("INSERT INTO orders(username,
												  email,
												  phone, 
												  address,
												  payment_mode,
												  products,
												  paid_amount) 
											VALUES
												 (:uname,
												  :email,
												  :phone,
											      :address,
												  :pmode,
												  :products,
												  :pamount)"); 					
	$insert_stmt->bindParam(":uname",$name);	
	$insert_stmt->bindParam(":email",$email);	
	$insert_stmt->bindParam(":phone",$phone);	
	$insert_stmt->bindParam(":address",$address);	 
	$insert_stmt->bindParam(":pmode",$pmode);	
	$insert_stmt->bindParam(":products",$products);	
	$insert_stmt->bindParam(":pamount",$grand_total);	
	$insert_stmt->execute();
	
	$data.='<div class="text-center">
				<h1 class="display-4 mt-2 text-danger">Thank You!</h1>
				<h2>Your Order Placed Successfully!</h2>
				<h4 class="bg-danger text-light rounded p-2">Items Purchased : '.$products.'</h4>
				<h4>Your Name : '.$name.' </h4>			
				<h4>Your E-mail : '.$email.' </h4>			
				<h4>Your Phone : '.$phone.'  </h4>			
				<h4>Total Amount Paid : '.number_format($grand_total,2).' </h4>			
				<h4>Payment Mode : '.$pmode.' </h4>			
				
			</div>';
			
	echo $data;		
}
?>