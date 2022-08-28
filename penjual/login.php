<?php require_once('header.php'); ?>

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
foreach ($result as $row) {
	$banner_login = $row['banner_login'];
}
?>

<?php
if(isset($_POST['form1'])) {
        
    if(empty($_POST['seller_email']) || empty($_POST['seller_password'])) {
        $error_message = 'Email dan/atau password tidak boleh kosong.\\n';
    } else {
		
		$seller_email = strip_tags($_POST['seller_email']);
		$seller_password = strip_tags($_POST['seller_password']);

    	$statement = $pdo->prepare("SELECT * FROM tbl_seller WHERE seller_email=?");
    	$statement->execute(array($seller_email));
    	$total = $statement->rowCount();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row) {
            $seller_access = $row['seller_access'];
			$seller_status = $row['seller_status'];
            $row_password = $row['seller_password'];
        }

        if($total==0) {
            $error_message .= 'Email Salah.\\n';
        } else {
        	if($seller_access == 0) {
        		$error_message .= 'Maaf! Akunmu Dinonaktifkan. Silahkan Hubungi Admin.';
        	} 
			else if($seller_status == 0) {
        		$error_message .= 'Akunmu Sedang diverifikasi Oleh Admin.';
        	} 
			else {
        		if( $row_password != md5($seller_password) ) {
	                $error_message .= 'Password Salah.\\n';
	            } else {            
					$_SESSION['seller'] = $row;
	                header("location: dashboard.php");
	            }
        	}
            
        }
    }
}
?>

<div class="banner-slider" style="background-image: url(<?php echo BASE_URL.'assets/uploads/'.$banner_login; ?>)">
	<div class="bg"></div>
	<div class="bannder-table">
		<div class="banner-text">
			<h1>Login Penjual</h1>
		</div>
	</div>
</div>

<div class="login-area bg-area">
	<div class="container">
		<div class="row">

	
			<div class="col-md-offset-4 col-md-5">
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
								<label for="">Email </label>
								<input autocomplete="off" type="email" class="form-control" name="seller_email" placeholder="Email">
							</div>
							<div class="form-group">
								<label for="">Password</label>
								<input autocomplete="off" type="password" class="form-control" name="seller_password" placeholder="Password">
							</div>
							<button type="submit" class="btn btn-primary" name="form1">Login</button>
						</div>
					</form>
				</div>
			</div>
			
			<div class="login-here">
				<h3><i class="fa fa-user-circle-o"></i> Belum punya akun? <a href="registration.php">Daftar Disini</a></h3>
				<h3 style="margin-top:15px;"><i class="fa fa-user-circle-o"></i> Lupa Password? <a href="forget-password.php">Klik Disini</a></h3>
			</div>
			
		</div>
	</div>
</div>
	
<?php require_once('footer.php'); ?>