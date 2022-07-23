<?php 
session_start();
require_once '../config/connect.php'; 
if(isset($_POST) & !empty($_POST)){
	$email = mysqli_real_escape_string($connection, $_POST['email']);
	$password = md5($_POST['password']);
	$sql = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
	$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
	$count = mysqli_num_rows($result);
	if($count == 1){
		//echo "User exits, create session";
		$_SESSION['email'] = $email;
		header("location: index.php");
	}else{
		$fmsg = "Invalid Login Credentials";
	}
}

?>

<?php include 'inc/header.php'; ?>

<?php //include '../inc/nav.php'; ?>
<br><br><br>
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog">
			<div class="container">
				<div class="row">
					<div class="page_header text-center">
						<h2>Login</h2>
						<p>Admin Login</p>
					</div>
					<div class="col-md-12">
				<div class="row shop-login">
				<div class="col-md-6 col-md-offset-3">
					<div class="box-content">
						
						<div class="clearfix space40"></div>
						<form class="logregform" method="post">
							<div class="row">
								<div class="form-group">
									<div class="col-md-12">
										<label>Username or E-mail Address</label>
										<input name="email" type="text" value="" class="form-control">
									</div>
								</div>
							</div>
							<div class="clearfix space20"></div>
							<div class="row">
								<div class="form-group">
									<div class="col-md-12">
										<a class="pull-right" href="#">(Lost Password?)</a>
										<label>Password</label>
										<input name="password" type="password" value="" class="form-control">
									</div>
								</div>
							</div>
							<div class="clearfix space20"></div>
							<div class="row">
								<div class="col-md-6">
									<span class="remember-box checkbox">
									<label for="rememberme">
									<input type="checkbox" id="rememberme" name="rememberme">Remember Me
									</label>
									</span>
								</div>
								<div class="col-md-6">
									<button type="submit" class="button btn-md pull-right">Login</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			
			</div>
	
					</div>
				</div>
			</div>
		</div>
	</section>

    <?php include 'inc/footer.php'; ?>
