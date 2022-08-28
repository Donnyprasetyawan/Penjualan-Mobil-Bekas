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
if(isset($_POST['form_register_user'])) {
      
    if (
		empty($_POST['seller_email']) ||
		empty($_POST['seller_name']) ||
		empty($_POST['seller_phone']) ||
		empty($_POST['seller_address']) ||
		empty($_POST['seller_city']) ||
		empty($_POST['seller_state']) ||
		empty($_POST['seller_country']) ||
		empty($_POST['seller_password']) ||
		empty($_FILES['seller_ktp'])
	) {
        $error_message = 'Data tidak boleh ada yang kosong.\\n';
    } else {
		
		$seller_id = strip_tags(rand(10000, 99999));
		$seller_email = strip_tags($_POST['seller_email']);
		$seller_name = strip_tags($_POST['seller_name']);
		$seller_phone = strip_tags($_POST['seller_phone']);
		$seller_address = strip_tags($_POST['seller_address']);
		$seller_city = strip_tags($_POST['seller_city']);
		$seller_state = strip_tags($_POST['seller_state']);
		$seller_country = strip_tags($_POST['seller_country']);
		$seller_password = strip_tags(md5($_POST['seller_password']));
		$seller_token = strip_tags(md5(rand(10000, 99999)));
		$seller_time = time();
		$seller_access = 1;

		$file_name = $_FILES['seller_ktp']['name'];
		$temp_name = $_FILES['seller_ktp']['tmp_name'];
		$dir_seller_ktp = "uploads/data_ktp/";
		$path_seller_ktp = $dir_seller_ktp . time() . '_' . $file_name;

    	$statement = $pdo->prepare("
			INSERT INTO tbl_seller (seller_id, seller_name, seller_email, seller_phone, seller_address, seller_city, seller_state, seller_country, seller_ktp, seller_password, seller_token, seller_time, seller_access)
			VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)
		");

    	if ($statement->execute(array($seller_id, $seller_name, $seller_email, $seller_phone, $seller_address, $seller_city, $seller_state, $seller_country, $path_seller_ktp, $seller_password, $seller_token, $seller_time, $seller_access))) {
			move_uploaded_file($temp_name, "../".$path_seller_ktp);
			header("location: ".BASE_URL."penjual/login.php");
		} else {
			$error_message .= 'Maaf! Terjadi kesalahan.';
		}
    	
    }
}
?>

<div class="banner-slider" style="background-image: url(<?php echo BASE_URL.'assets/uploads/'.$banner_login; ?>)">
	<div class="bg"></div>
	<div class="bannder-table">
		<div class="banner-text">
			<h1>Registrasi Penjual</h1>
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
					<form action="" method="post" enctype="multipart/form-data">
						<div class="form-row">							
							<div class="form-group">
								<label for="">Email </label>
								<input autocomplete="off" type="email" class="form-control" name="seller_email" placeholder="Email">
							</div>
							<div class="form-group">
								<label for="">Nama </label>
								<input autocomplete="off" type="text" class="form-control" name="seller_name" placeholder="Nama">
							</div>
							<div class="form-group">
								<label for="">No HP </label>
								<input autocomplete="off" type="text" class="form-control" name="seller_phone" placeholder="Nomor HP">
							</div>
							<div class="form-group">
								<label for="">Alamat </label>
								<input autocomplete="off" type="text" class="form-control" name="seller_address" placeholder="Alamat">
							</div>
							<div class="form-group">
								<label for="">Kota </label>
								<input autocomplete="off" type="text" class="form-control" name="seller_city" placeholder="Kota">
							</div>
							<div class="form-group">
								<label for="">Provinsi </label>
								<input autocomplete="off" type="text" class="form-control" name="seller_state" placeholder="Provinsi">
							</div>
							<div class="form-group">
								<label for="">Negara </label>
								<input autocomplete="off" type="text" class="form-control" name="seller_country" placeholder="Negara">
							</div>
							<div class="form-group">
								<label for="">Password</label>
								<input autocomplete="off" type="password" class="form-control" name="seller_password" placeholder="Password">
							</div>
							<div class="form-group">
								<label for="">Foto KTP </label>
								<div class="input-group mb-3">
									<input type="file" class="form-control" name="seller_ktp" id="seller_ktp" required>
								</div>
							</div>
							<button type="submit" class="btn btn-primary" name="form_register_user">Daftar</button>
						</div>
					</form>
				</div>
			</div>
			
			<div class="login-here">
				<h3><i class="fa fa-user-circle-o"></i> Sudah punya akun? <a href="<?php echo BASE_URL; ?>penjual/login.php">Masuk Disini</a></h3>
				<h3 style="margin-top:15px;"><i class="fa fa-user-circle-o"></i> Lupa Password? <a href="forget-password.php">Klik Disini</a></h3>
			</div>
			
		</div>
	</div>
</div>
	
<?php require_once('footer.php'); ?>