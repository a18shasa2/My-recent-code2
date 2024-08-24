<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Cart</title>

  <!-- Bootstrap core CSS -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"> 
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous" />
  
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
			<a class="btn btn-success btn-sm mt-1" href="cart.php">
                <i class="fa fa-shopping-cart"></i> 
                <span class="badge badge-light" id="cart-item"></span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
    
	<div style="display:<?php if(isset($_SESSION["showAlert"])){echo $_SESSION["showAlert"];} 
	else { echo "none"; } unset($_SESSION["showAlert"])?>" class="alert alert-success alert-dismissible mt-2">
	
	<button type="button" class="close" data-dismiss="alert">&times;</button>
		
	<strong><?php if(isset($_SESSION["message"])){echo $_SESSION["message"];} unset($_SESSION["showAlert"]);?></strong> 
		
	</div>
	
  <div class="container">
	<div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-right">Total Price</th>
                            <th scope="col" class="text-right">
							<a href="action.php?clear=all" onClick="return confirm('Are you sure to clear you cart?');" class="btn btn-sm btn-danger">Empty Cart</a>
							</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php
						require_once "dbconfig.php";
						$select_stmt=$db->prepare("SELECT * FROM cart");
						$select_stmt->execute();
						$grand_total = 0;
						while($row=$select_stmt->fetch(PDO::FETCH_ASSOC))
						{
						?>
                        <tr>
                            <td><img src="images/<?php echo $row["product_image"]; ?>" width="50" height="50"/> </td>
							
                            <td><?php echo $row["product_name"]; ?></td>
							
                            <td><?php echo number_format($row["product_price"],2); ?></td>
							
                            <td><input type="number" class="form-control itemQty" value="<?php echo $row['quantity']; ?>" style="width:75px;"></td>
							
                            <td class="text-right"><?php echo number_format($row["total_price"],2); ?></td>
							
                            <td class="text-right">
							<a href="action.php?remove=<?php echo $row["cart_id"];?>" onClick="return confirm('Are you sure want to remove this item?');"  class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a> 
							</td>
							
							<input type="hidden" class="pid" value="<?php echo $row["cart_id"]; ?>"> 
							<input type="hidden" class="pprice" value="<?php echo $row["product_price"]; ?>">
							
							<?php $grand_total +=$row["total_price"]; ?>
                        </tr>
						<?php
						}
						?> 
                        
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Sub-Total</td>
                            <td class="text-right"><?php echo number_format($grand_total,2); ?></td>
                        </tr>
						
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td> 
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong><?php echo number_format($grand_total,2); ?></strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <a href="index.php" class="btn btn-block btn-light"><i class="fa fa-shopping-cart"></i> Continue Shopping</a>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
					<a href="checkout.php" class="btn btn-md btn-block btn-success text-uppercase <?=($grand_total > 1)?"":"disabled"; ?>"> Checkout </a>
                </div>
            </div>
        </div>
    </div>

  </div>
  <!-- /.container -->
  
  <!-- Footer -->
  <br /><br />
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
	
		$(".itemQty").on("change", function(){
            location.reload(true);			
			var hide = $(this).closest("tr");
            location.reload(true);
			
			var id = hide.find(".pid").val();
            location.reload(true);
			var price = hide.find(".pprice").val();
            location.reload(true);
			var qty = hide.find(".itemQty").val();
			location.reload(true);
			$.ajax({
				url: "action.php",
				method: "post",
				cache: false,
				data: {pqty:qty, pid:id, pprice:price},
				success:function(response){ 
					console.log(response);		
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
