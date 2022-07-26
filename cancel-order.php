<?php
	ob_start();
	session_start();
	require_once 'config/connect.php'; 
	if(!isset($_SESSION['customer']) & empty($_SESSION['customer'])){
		header('location: login.php');
	}


include 'inc/header.php'; 
include 'inc/nav.php'; 
$uid = $_SESSION['customerid'];
$cart = $_SESSION['cart'];

if(isset($_POST) & !empty($_POST)){

		$cancel = filter_var($_POST['cancel']);
		$id = filter_var($_POST['orderid']);

	
			$cansql = "INSERT INTO ordertracking (orderid, status, message) VALUES ('$id', 'Cancelled', '$cancel')";

			$canres = mysqli_query($connection, $cansql);
			if($canres){

                $ordupd = "UPDATE orders SET orderstatus='Cancelled' WHERE id=$id";
				if(mysqli_query($connection, $ordupd)){
                    header('location: my-account.php');
                }
			}
		} else {
			
			$isql = "INSERT INTO usersmeta (country, firstname, lastname, address1, address2, city, state, zip, company, mobile, uid) VALUES ('$country', '$fname', '$lname', '$address1', '$address2', '$city', '$state', '$zip', '$company', '$phone', '$uid')";

			$ires = mysqli_query($connection, $isql);
			if($ires){

		
	}
}

		$sql = "SELECT * FROM usermeta WHERE uid=$uid";
		$res = mysqli_query($connection, $sql);
		$r = mysqli_fetch_assoc($res);

?>

	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog">
					<div class="page_header text-center">
						<h2>Shop - Cancel Order</h2>
						<p>Do you want to cancel order?</p>
					</div>
	<form method="post">
        <div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="billing-details">
						<h3 class="uppercase">Cancel Orders</h3>
						
                        <table class="cart-table account-table table table-bordered">
				<thead>
					<tr>
						<th>Order</th>
						<th>Date</th>
						<th>Status</th>
						<th>Payment Mode</th>
						<th>Total</th>
				
					</tr>
				</thead>
				<tbody>

				<?php

            if(isset($_GET['id']) & !empty($_GET['id'])){
                $oid = $_GET['id'];
            } else {
                header('location: my-account.php');
            }

					$ordsql = "SELECT * FROM orders WHERE id='$oid'";
					$ordres = mysqli_query($connection, $ordsql);
					while($ordr = mysqli_fetch_array($ordres)){ 
				
				?>
					<tr>
						<td>
							<?php echo $ordr['id']; ?>
						</td>
						<td>
						<?php echo $ordr['timestamp']; ?>
						</td>
						<td>
						<?php echo $ordr['orderstatus']; ?>			
						</td>
						<td>
						<?php echo $ordr['paymentmode']; ?>			
						</td>
						<td>
						<?php echo $ordr['totalprice']; ?>			
						</td>
						
					</tr>
			
					<?php } ?>
		
				</tbody>
			</table>		


						<div class="space30"></div>
							<div class="clearfix space20"></div>
							<label>Reason</label>
                            <textarea class="form-control" name="cancel" id="" cols="16" rows=""></textarea>
							
                        <input type="hidden" name="orderid" value="<?php echo $_GET['id']; ?>">
                            <div class="space30"></div>
				        <input type="submit" class="button btn-lg" value="Cancel Order" >
					</div>
				</div>
				
			</div>
		
		</div>		
	</form>
		</div>
	</section>
	
    <?php include 'inc/footer.php'; ?>