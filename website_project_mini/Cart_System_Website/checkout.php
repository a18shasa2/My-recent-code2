<?php
require_once "dbconfig.php";

$grand_total = 0;
$allItems = "";
$items = array();

$select_stmt=$db->prepare("SELECT CONCAT(product_name, '(', quantity,')') AS ItemQty, total_price FROM cart");
$select_stmt->execute();  
while($row=$select_stmt->fetch(PDO::FETCH_ASSOC))
{
	$grand_total = $grand_total + $row["total_price"];
	$items[] = $row["ItemQty"];
}
$allItems = implode(", ", $items);

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Checkout</title>

  <!-- Bootstrap core CSS -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"> 
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  
  <!-- Template Custom CSS -->
  <style type="text/css">
  
	body 
	{
		padding-top: 56px;
	}

  </style>

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Home</a>
      <a class="navbar-brand active" href="https://www.onlyxcodes.com/2020/10/add-to-cart-and-checkout-in-php.html">Back to Tutorial</a>
	  
      
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
		
      </button>
		
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="checkout.php">Checkout</a>
          </li>
		  <li class="nav-item active">
			<a class="btn btn-success btn-sm mt-1" href="cart.php">
                <i class="fa fa-shopping-cart"></i> 
                <span class="badge badge-light" id="cart-item"></span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  
  <div class="container">
	
	<div class="row justify-content-center">
		<div class="col-lg-6 px-4 pb-4" id="showOrder">
		
			<h4 class="text-center text-info p-2">Complete your order!</h4>
			<div class="jumbotron p-3 mb-2 text-center">
				<h6 class="load"><b>Product(s) : </b> <?php echo $allItems; ?></h6>
				<h6 class="lead"><b>Delivery Charge : </b>Free</h6>
				<h5><b>Total Amount Payable : </b><?php echo number_format($grand_total,2)?>/- </h5>
			</div>
			
			<form method="post" id="placeOrder">
			
				<input type="hidden" name="products" value="<?php echo $allItems ?>">
				<input type="hidden" name="grand_total" value="<?php echo $grand_total ?>">
				
				<div class="form-group">
					<input type="text" name="name" class="form-control" placeholder="enter name" required>
				</div>	
				
				<div class="form-group">
					<input type="email" name="email" class="form-control" placeholder="enter email" required>
				</div>
				
				<div class="form-group">
					<input type="tel" name="phone" class="form-control" placeholder="enter phone" required>
				</div>
				
				<div class="form-group">
					<textarea name="address" class="form-control" rows="3" cols="10" placeholder="enter address"></textarea>
				</div>
				
				<h6 class="text-center lead">Select Payment Mode</h6>
				<div class="form-group">
					<select name="pmode" class="form-control">
						<option value="">-- select payment --</option>
						<option value="cod">Cash On Delivery</option>
						<option value="netbanking">Net Banking</option>
						<option value="card">Debit/credit Card</option>
					</select>
				</div>
				
				<div class="form-group">
					<input type="submit" name="submit" class="btn btn-danger btn-block" value="Place Order">
				</div>
			</form>
		</div>
    </div>

  </div>
  <!-- /.container -->
  
  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Onlyxcodes 2020</p>
    </div>
    <!-- /.container -->
  </footer>


  <!-- Bootstrap core JavaScript -->
  <script src="jquery/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  
  <script type="text/javascript">
	$(document).ready(function(){ 
		$("#placeOrder").submit(function(e){
			
			e.preventDefault();
			
			$.ajax({
				url: "action.php",
				method: "post",
				data: $("form").serialize()+"&action=order",
				success: function(response){
					$("#showOrder").html(response);
				}
			});	 
		});
	
	load_cart_item_number();
		
	function load_cart_item_number(){
		$.ajax({
			url: "action.php",
			method: "get",
			data: {cartItem:"cart_item"},
			success:function(response){
				$("#cart-item").html(response);
			}
				
		});
	}	
	
	});
  </script>

</body>

</html>
 