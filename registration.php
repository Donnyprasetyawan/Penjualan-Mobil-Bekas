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
		empty($_POST['pembeli_email']) ||
		empty($_POST['pembeli_nama']) ||
		empty($_POST['pembeli_hp']) ||
		empty($_POST['pembeli_alamat']) ||
		empty($_POST['pembeli_kota']) ||
		empty($_POST['pembeli_provinsi']) ||
		empty($_POST['pembeli_negara']) ||
		empty($_POST['pembeli_password'])
	) {
        $error_message = 'Data tidak boleh ada yang kosong.\\n';
    } else {
		
		$pembeli_id = strip_tags(rand(10000, 99999));
		$pembeli_email = strip_tags($_POST['pembeli_email']);
		$pembeli_nama = strip_tags($_POST['pembeli_nama']);
		$pembeli_hp = strip_tags($_POST['pembeli_hp']);
		$pembeli_alamat = strip_tags($_POST['pembeli_alamat']);
		$pembeli_kota = strip_tags($_POST['pembeli_kota']);
		$pembeli_provinsi = strip_tags($_POST['pembeli_provinsi']);
		$pembeli_country = strip_tags($_POST['pembeli_negara']);
		$pembeli_password = strip_tags(md5($_POST['pembeli_password']));
		$pembeli_token = strip_tags(md5(rand(10000, 99999)));
		$pembeli_time = time();
		$pembeli_access =1;

		$file_name = $_FILES['pembeli_ktp']['name'];
		$temp_name = $_FILES['pembeli_ktp']['tmp_name'];
		$dir_pembeli_ktp = "uploads/data_ktp/";
		$path_pembeli_ktp = $dir_pembeli_ktp . time() . '_' . $file_name;

    	$statement = $pdo->prepare("
			INSERT INTO tbl_pembeli (pembeli_id, pembeli_name, pembeli_email, pembeli_phone, pembeli_address, pembeli_city, pembeli_state, pembeli_country, pembeli_ktp, pembeli_password, pembeli_token, pembeli_time, pembeli_access)
			VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)
		");

    	if ($statement->execute(array($pembeli_id, $pembeli_nama, $pembeli_email, $pembeli_hp, $pembeli_alamat, $pembeli_kota, $pembeli_provinsi, $pembeli_country, $path_pembeli_ktp, $pembeli_password, $pembeli_token, $pembeli_time, $pembeli_access))) {
			$upload_pembeli_ktp = move_uploaded_file($temp_name, $path_pembeli_ktp);
			header("location: login.php");
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
			<h1>Registrasi Pembeli</h1>
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
								<input autocomplete="off" type="email" class="form-control" name="pembeli_email" placeholder="Email">
							</div>
							<div class="form-group">
								<label for="">Nama </label>
								<input autocomplete="off" type="text" class="form-control" name="pembeli_nama" placeholder="Nama">
							</div>
							<div class="form-group">
								<label for="">No HP </label>
								<input autocomplete="off" type="text" class="form-control" name="pembeli_hp" placeholder="Nomor HP" >
							</div>
							<div class="form-group">
								<label for="">Alamat </label>
								<input autocomplete="off" type="text" class="form-control" name="pembeli_alamat" placeholder="Alamat">
							</div>
							<div class="form-group">
								<label for="">Kota </label>
								<input autocomplete="off" type="text" class="form-control" name="pembeli_kota" placeholder="Kota">
							</div>
							<div class="form-group">
								<label for="">Provinsi </label>
								<input autocomplete="off" type="text" class="form-control" name="pembeli_provinsi" placeholder="Provinsi">
							</div>
							<div class="form-group">
								<label for="">Negara </label>
								<input autocomplete="off" type="text" class="form-control" name="pembeli_negara" placeholder="Negara">
							</div>
							<div class="form-group">
								<label for="">Password</label>
								<input autocomplete="off" type="password" class="form-control" name="pembeli_password" placeholder="Password">
							</div>
							<div class="form-group">
								<label for="">Foto KTP </label>
								<div class="input-group mb-3">
									<input type="file" class="form-control" name="pembeli_ktp" id="pembeli_ktp" required>
								</div>
							</div>
							<button type="submit" class="btn btn-primary" name="form_register_user">Daftar</button>
						</div>
					</form>
				</div>
			</div>
			
			<div class="login-here">
				<h3><i class="fa fa-user-circle-o"></i> Sudah punya akun? <a href="login.php">Masuk Disini</a></h3>
				<h3 style="margin-top:15px;"><i class="fa fa-user-circle-o"></i> Lupa Password? <a href="forget-password.php">Klik Disini</a></h3>
			</div>
			
		</div>
	</div>
</div>


	
<?php require_once('footer.php'); ?>
<script>
	let latPhoneInput = '' ;
$("input[name='pembeli_hp']").keyup(function(){
	if($(this).val().match('^[0-9]*$')){
		if($(this).val().length < 15){
			latPhoneInput = $(this).val()
			$(this).val(latPhoneInput)
		}else
		$(this).val(latPhoneInput)
	}else
	$(this).val(latPhoneInput)
});
</script>