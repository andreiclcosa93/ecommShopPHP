<?php

    session_start();
    require_once '../config/connect.php';
    if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
        // header('location: login.php');
    }

?>

<?php include 'inc/header.php'; ?>

<?php include 'inc/nav.php'; ?>

<section id="content">
	<div class="content-blog">
		<div class="container">
		<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Category Name</th>
						<th>Operations</th>
					</tr>
				</thead>
				<tbody>
				<?php 	
					$sql = "SELECT * FROM category";
					$res = mysqli_query($connection, $sql); 
					while ($r = mysqli_fetch_assoc($res)) {
				?>
					<tr>
						<th scope="row"><?php echo $r['id']; ?></th>
						<td><?php echo $r['name']; ?></td>
						<td><a href="editcategory.php?id=<?php echo $r['id']; ?>">Edit</a> | <a href="delcategory.php?id=<?php echo $r['id']; ?>">Delete</a></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</section>

<!-- 	
	<section id="content">
		<div class="content-blog">
			<div class="container">
				<div class="row">
					<div class="page_header text-center">
						<h2>Shop</h2>
						<p>You can order products from here</p>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div id="shop-mason" class="shop-mason-4col">
								<div class="sm-item isotope-item">
									<div class="product">
										<div class="product-thumb">
											<img src="images/shop/1.png" class="img-responsive" alt="">
											<div class="product-overlay">
												<span>
												<a href="./shop-single-full.html" class="fa fa-link"></a>
												<a href="./shop-single-full.html" class="fa fa-shopping-cart"></a>
												</span>					
											</div>
										</div>
										<div class="rating">
											<span class="fa fa-star act"></span>
											<span class="fa fa-star act"></span>
											<span class="fa fa-star act"></span>
											<span class="fa fa-star act"></span>
											<span class="fa fa-star act"></span>
										</div>
										<h2 class="product-title"><a href="#">Shave Knives</a></h2>
										<div class="product-price">$79.00<span>$200.00</span></div>
									</div>
								</div>
								
							</div>
						</div>
						<div class="clearfix"></div>
						
						<div class="page_nav">
							<a href=""><i class="fa fa-angle-left"></i></a>
							<a href="" class="active">1</a>
							<a href="">2</a>
							<a href="">3</a>
							<a class="no-active">...</a>
							<a href="">9</a>
							<a href=""><i class="fa fa-angle-right"></i></a>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</section> -->
	
    <?php include 'inc/footer.php'; ?>