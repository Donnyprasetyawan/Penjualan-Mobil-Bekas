<?php require_once('header.php'); ?>

<?php
// Check if the pembeli is logged in or not
if(!isset($_SESSION['pembeli'])) {
	header('location: '.BASE_URL.'logout.php');
	exit;
} else {
	// If pembeli is logged in, but admin make him inactive, then force logout this user.
	$statement = $pdo->prepare("SELECT * FROM tbl_pembeli WHERE pembeli_id=? AND pembeli_access=?");
	$statement->execute(array($_SESSION['pembeli']['pembeli_id'],0));
	$total = $statement->rowCount();
	if($total) {
		header('location: '.BASE_URL.'logout.php');
		exit;
	}
}
?>

<?php
if (isset($_POST['form1'])) {

    $valid = 1;

    if(empty($_POST['pembeli_name'])) {
        $valid = 0;
        $error_message .= "Name can not be empty.\\n";
    }

    if(empty($_POST['pembeli_address'])) {
        $valid = 0;
        $error_message .= "Address can not be empty.\\n";
    }

    if(empty($_POST['pembeli_city'])) {
        $valid = 0;
        $error_message .= "City can not be empty.\\n";
    }

    if(empty($_POST['pembeli_country'])) {
        $valid = 0;
        $error_message .= "Country can not be empty.\\n";
    }

    if( !(empty($_POST['pembeli_password']) && empty($_POST['pembeli_re_password'])) ) {
        if($_POST['pembeli_password'] != $_POST['pembeli_re_password']) {
	    	$valid = 0;
	        $error_message .= "Passwords do not match. Try again.\\n";	
    	}
    }

    if($valid == 1) {

		// update data into the database
		if(empty($_POST['pembeli_password'])) {
			$statement = $pdo->prepare("UPDATE tbl_pembeli SET pembeli_name=?, pembeli_phone=?, pembeli_address=?, pembeli_city=?, pembeli_state=?, pembeli_country=? WHERE pembeli_id=?");
			$statement->execute(array($_POST['pembeli_name'],$_POST['pembeli_phone'],$_POST['pembeli_address'],$_POST['pembeli_city'],$_POST['pembeli_state'],$_POST['pembeli_country'],$_SESSION['pembeli']['pembeli_id']));	
		} else {
			$statement = $pdo->prepare("UPDATE tbl_pembeli SET pembeli_name=?, pembeli_phone=?, pembeli_address=?, pembeli_city=?, pembeli_state=?, pembeli_country=?, pembeli_password=? WHERE pembeli_id=?");
			$statement->execute(array($_POST['pembeli_name'],$_POST['pembeli_phone'],$_POST['pembeli_address'],$_POST['pembeli_city'],$_POST['pembeli_state'],$_POST['pembeli_country'],md5($_POST['pembeli_password']),$_SESSION['pembeli']['pembeli_id']));

			$_SESSION['pembeli']['pembeli_password'] = md5($_POST['pembeli_password']);
		}

    	$success_message = 'Profile Berhasil Di Update..';

    	$_SESSION['pembeli']['pembeli_name'] = $_POST['pembeli_name'];
    	$_SESSION['pembeli']['pembeli_phone'] = $_POST['pembeli_phone'];
    	$_SESSION['pembeli']['pembeli_address'] = $_POST['pembeli_address'];
    	$_SESSION['pembeli']['pembeli_city'] = $_POST['pembeli_city'];
    	$_SESSION['pembeli']['pembeli_state'] = $_POST['pembeli_state'];
    	$_SESSION['pembeli']['pembeli_country'] = $_POST['pembeli_country'];
    }
}
?>

<!--Banner Start-->
<div class="banner-slider" style="background-image: url(img/banner.jpg)">
	<div class="bg"></div>
	<div class="bannder-table">
		<div class="banner-text">
			<h1>Update Profil</h1>
		</div>
	</div>
</div>
<!--Banner End-->


<div class="dashboard-area bg-area">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-12">
				<div class="option-board">
					<?php require_once('dashboard-menu.php'); ?>
				</div>
			</div>
			<div class="col-md-9 col-sm-12">
				<div class="detail-dashboard">

					<h1>Update Profil</h1>

					<div class="login-area bg-area" style="padding-top: 0;margin-top: -30px;">
						<div class="row">
						
							<div class="col-md-6">
								
								<?php
								if($error_message != '') {
									echo "<script>alert('".$error_message."')</script>";
								}
								if($success_message != '') {
									echo "<script>alert('".$success_message."')</script>";
								}
								?>
								<div class="login-form">
									
									<form action="" method="post">

										<div class="form-row">
											
											<div class="form-group">
												<label for="">Nama Lengkap *</label>
												<input type="text" class="form-control" name="pembeli_name" placeholder="Nama Lengkap" value="<?php echo $_SESSION['pembeli']['pembeli_name']; ?>">
											</div>

											<div class="form-group">
												<label for="">Alamat Email (tidak bisa diganti)</label>
												<input type="email" class="form-control" name="pembeli_email" placeholder="Alamat Email" value="<?php echo $_SESSION['pembeli']['pembeli_email']; ?>" disabled>
											</div>

											<div class="form-group">
												<label for="">Handphone </label>
												<input type="text" class="form-control" name="pembeli_phone" placeholder="Handphone" value="<?php echo $_SESSION['pembeli']['pembeli_phone']; ?>">
											</div>

											<div class="form-group">
												<label for="">Alamat *</label>
												<textarea name="pembeli_address" class="form-control" cols="30" rows="10" placeholder="Alamat" style="height:120px;"><?php echo $_SESSION['pembeli']['pembeli_address']; ?></textarea>
											</div>

											<div class="form-group">
												<label for="">Kota *</label>
												<input type="text" class="form-control" name="pembeli_city" placeholder="Kota" value="<?php echo $_SESSION['pembeli']['pembeli_city']; ?>">
											</div>

											<div class="form-group">
												<label for="">Provinsi</label>
												<input type="text" class="form-control" name="pembeli_state" placeholder="Provinsi" value="<?php echo $_SESSION['pembeli']['pembeli_state']; ?>">
											</div>

											<div class="form-group">
												<label for="">Negara *</label>
												<input type="text" class="form-control" name="pembeli_country" placeholder="Negara" value="<?php echo $_SESSION['pembeli']['pembeli_country']; ?>">
											</div>
											
											<div class="form-group">
												<label for="">Password</label>
												<input type="password" class="form-control" name="pembeli_password" placeholder="Password">
											</div>

											<div class="form-group">
												<label for="">Ulangi Password</label>
												<input type="password" class="form-control" name="pembeli_re_password" placeholder="Ulangi Password">
											</div>
											
											<button type="submit" class="btn btn-primary" name="form1">Update Informasi</button>
											
										</div>

									</form>

								</div>
							</div>		
								
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



	
<?php require_once('footer.php'); ?>