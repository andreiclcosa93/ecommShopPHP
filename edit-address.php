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

		$country = filter_var($_POST['country']);
		$fname = filter_var($_POST['fname']);
		$lname = filter_var($_POST['lname']);
		$company = filter_var($_POST['company']);
		$address1 = filter_var($_POST['address1']);
		$address2 = filter_var($_POST['address2']);
		$city = filter_var($_POST['city']);
		$state = filter_var($_POST['state']);
		$phone = filter_var($_POST['phone']);
		
		$zip = filter_var($_POST['zipcode']);

	
			$usql = "UPDATE usersmeta SET country='$country', firstname='$fname', lastname='$lname', address1='$address1', address2='$address2', city='$city', state='$state',  zip='$zip', company='$company', mobile='$phone' WHERE uid=$uid";

			$ures = mysqli_query($connection, $usql);
			if($ures){

				
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
						<h2>Shop - Checkout</h2>
						<p>Get the best kit for smooth shave</p>
					</div>
	<form method="post">
        <div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="billing-details">
						<h3 class="uppercase">Update My Address</h3>
						<?php  ?>
						<div class="space30"></div>
					
							<label class="">Country </label>
							<select name="country" class="form-control">
								<option value="">Select Country</option>
								<option value="AX">Aland Islands</option>
								<option value="AF">Afghanistan</option>
								<option value="AL">Albania</option>
								<option value="DZ">Algeria</option>
								<option value="AD">Andorra</option>
								<option value="AO">Angola</option>
								<option value="AI">Anguilla</option>
								<option value="AQ">Antarctica</option>
								<option value="AG">Antigua and Barbuda</option>
								<option value="AR">Argentina</option>
								<option value="AM">Armenia</option>
								<option value="AW">Aruba</option>
								<option value="AU">Australia</option>
								<option value="AT">Austria</option>
								<option value="AZ">Azerbaijan</option>
								<option value="BS">Bahamas</option>
								<option value="BH">Bahrain</option>
								<option value="BD">Bangladesh</option>
								<option value="BB">Barbados</option>
							</select>
							<div class="clearfix space20"></div>
							<div class="row">
								<div class="col-md-6">
									<label>First Name </label>
									<input class="form-control" name="fname" placeholder="" value="<?php if(!empty($R['firstname'])){ echo $r['firstname']; }elseif(isset($fname)){ echo $fname; } ?>" type="text">
								</div>
								<div class="col-md-6">
									<label>Last Name </label>
									<input class="form-control" name="lname" placeholder="" value="<?php if(!empty($R['lastname'])){ echo $r['lastname']; }elseif(isset($lname)) { echo $lname; } ?>" type="text">
								</div>
							</div>
							<div class="clearfix space20"></div>
							<label>Company Name</label>
							<input class="form-control" name="company" placeholder="" value="<?php if(!empty($R['company'])){ echo $r['company']; }elseif(isset($company)) { echo $company; } ?>" type="text">
							<div class="clearfix space20"></div>
							<label>Address </label>
							<input class="form-control" name="address" placeholder="Street address" value="<?php if(!empty($R['address'])){ echo $r['address']; }elseif(isset($address1)) { echo $address1; } ?>" type="text">
							<div class="clearfix space20"></div>
							<input class="form-control" name="address2" placeholder="Apartment, suite, unit etc. (optional)" value="<?php if(!empty($R['address2'])){ echo $r['address2']; }elseif(isset($address2)) { echo $address2; } ?>" type="text">
							<div class="clearfix space20"></div>
							<div class="row">
								<div class="col-md-4">
									<label>City </label>
									<input class="form-control" name="city" placeholder="City" value="<?php if(!empty($R['city'])){ echo $r['city']; }elseif(isset($city)) { echo $city; } ?>" type="text">
								</div>
								<div class="col-md-4">
									<label>County</label>
									<input class="form-control" name="state" value="<?php if(!empty($R['state'])){ echo $r['state']; }elseif(isset($state)) { echo $state; } ?>" placeholder="State / County" type="text">
								</div>
								<div class="col-md-4">
									<label>Postcode </label>
									<input class="form-control" name="zipcode" placeholder="Postcode / Zip" value="<?php if(!empty($R['zip'])){ echo $r['zip']; }elseif(isset($zip)) { echo $zip; } ?>" type="text">
								</div>
							</div>
							<div class="clearfix space20"></div>
							<label>Phone </label>
							<input class="form-control" name="phone" id="billing_phone" placeholder="" value="<?php if(!empty($R['phone'])){ echo $r['mobile']; }elseif(isset($phone)) { echo $phone; } ?>" type="text">
                            
                            <div class="space30"></div>
				        <input type="submit" class="button btn-lg" value="Update Address" >
					</div>
				</div>
				
			</div>
		
		</div>		
	</form>
		</div>
	</section>
	
    <?php include 'inc/footer.php'; ?>