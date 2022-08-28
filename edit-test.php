<?php require_once('header.php'); 
error_reporting(0);
?>


<?php
// Preventing the direct access of this page.
if(!isset($_REQUEST['id'])) {
	header('location: logout.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM tbl_pembelian WHERE id_booking=?");
	$statement->execute(array($_REQUEST['id']));
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	$total = $statement->rowCount();
	if( $total == 0 ) {
		header('location: logout.php');
		exit;
	} else {
		// Preventing one user deleting another user's data through url
		foreach ($result as $row) {
			$pembeli_id = $row['pembeli_id'];
		}
		
		if($pembeli_id != $_SESSION['pembeli']['pembeli_id']) {
			header('location: logout.php');
			exit;
		}
	}
}
?>

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_pembeli WHERE pembeli_id=?");
$statement->execute(array($_SESSION['pembeli']['pembeli_id']));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
foreach ($result as $row) {
	$pembeli_id = $row['pembeli_id'];
	$pembeli_name = $row['pembeli_name'];
	$pembeli_email = $row['pembeli_email'];
	$pembeli_phone = $row['pembeli_phone'];
	$pembeli_address = $row['pembeli_address'];
	$pembeli_city = $row['pembeli_city'];
	$pembeli_state = $row['pembeli_state'];
	$pembeli_country = $row['pembeli_country'];
	$pembeli_password = $row['pembeli_password'];
}
?>


<?php
//&& ! empty($_POST['id'])
if(isset($_POST['form1']) ) {
	$valid = 1;

		if(empty($_POST['pembayaran'])) {
		}
		if(empty($_POST['nama_bank'])) {
		}
		if(empty($_POST['lama_cicil'])) {
		} 
    if($valid == 1) {
	    // Updating data
	    if($path!=''):
	    	$statement = $pdo->prepare("UPDATE tbl_pembelian SET pembayaran=?,nama_bank=?,lama_cicil=? WHERE id_booking=?");
	    	$statement->execute(array($_POST['pembayaran'],$_POST['nama_bank'],$_POST['lama_cicil'],$_REQUEST['id'])); 
		else:
						$statement = $pdo->prepare("UPDATE tbl_pembelian SET pembayaran=?,nama_bank=?,lama_cicil=? WHERE id_booking=?");
						$statement->execute(array($_POST['pembayaran'],$_POST['nama_bank'],$_POST['lama_cicil'],$_REQUEST['id']));
		endif;
		$success_message .= "Data Anda Berhasil Diedit.";
    }
}
?>

<?php
if(!isset($_REQUEST['id'])) {
	header('location: logout.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM tbl_pembelian WHERE id_booking=?");
	$statement->execute(array($_REQUEST['id']));
	$total = $statement->rowCount();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	if( $total == 0 ) {
		header('location: logout.php');
		exit;
	}
}
?>

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_pembelian WHERE id_booking=?");
$statement->execute(array($_REQUEST['id']));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
	$pembeli_id = $row['pembeli_id'];
	$pembayaran=$row['pembayaran'];
	$nambank=$row['nama_bank'];
	$lamcil=$row['lama_cicil'];
}
?>


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

					<h1>Edit Booking Saya</h1>
					<?php
					if($error_message != '') {
						echo "<script>alert('".$error_message."')</script>";
					}
					if($success_message != '') {
						echo "<script>alert('".$success_message."')</script>";
					}
					?>
					<div style="margin-bottom: 20px;">* = Wajib Diisi</div>
					<div class="add-car-area">
						<div class="row">
							<div class="information-form">
								<form action="" method="post">
									<div class="form-row">
										<div class="form-group col-md-6 col-sm-6 option-item">
											<label for="">Metode *</label>
											<select data-placeholder="Pilih Item ..." class="form-control brand" name="pembayaran">
												<?php
												$statement = $pdo->prepare("SELECT * FROM tbl_metode ORDER BY me_pembayaran ASC");
												$statement->execute();
												$result = $statement->fetchAll(PDO::FETCH_ASSOC);
												foreach ($result as $row) {
													?>
													<option value="<?php echo $row['me_pembayaran']; ?>" <?php if($row['me_pembayaran'] == $pembayaran){echo 'selected';} ?>><?php echo $row['me_pembayaran']; ?></option>
													<?php
												}
												?>
											</select>
										</div>
										<div class="form-group col-md-6 col-sm-6 option-item">
											<label for="">Nama Bank *</label>
											<select data-placeholder="Pilih Item ..." class="form-control brand" name="nama_bank">
												<?php
												$statement = $pdo->prepare("SELECT * FROM tbl_bank ORDER BY nama_bank ASC");
												$statement->execute();
												$result = $statement->fetchAll(PDO::FETCH_ASSOC);
												foreach ($result as $row) {
													?>
													<option value="<?php echo $row['nama_bank']; ?>" <?php if($row['nama_bank'] == $nambank){echo 'selected';} ?>><?php echo $row['nama_bank']; ?></option>
													<?php
												}
												?>
											</select>
										</div>
										<div class="form-group col-md-6 col-sm-6 option-item">
											<label for="">Lama Cicil</label>
											<select data-placeholder="Pilih Item ..." class="form-control brand" name="lama_cicil">
												<?php
												$statement = $pdo->prepare("SELECT * FROM tbl_waktu_cicilan ORDER BY lama_cicilan ASC");
												$statement->execute();
												$result = $statement->fetchAll(PDO::FETCH_ASSOC);
												foreach ($result as $row) {
													?>
													<option value="<?php echo $row['lama_cicilan']; ?>" <?php if($row['lama_cicilan'] == $lamcil){echo 'selected';} ?>><?php echo $row['lama_cicilan']; ?></option>
													<?php
												}
												?>
											</select>
										</div>
										
									<div class="form-group col-md-12">
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


<?php require_once('footer.php'); ?>