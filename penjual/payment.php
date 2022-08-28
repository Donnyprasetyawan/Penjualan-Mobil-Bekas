<?php require_once('header.php'); ?>

<?php
	// Check if the seller is logged in or not
	if(!isset($_SESSION['seller'])) {
		header('location: '.BASE_URL.'logout.php');
		exit;
	} else {
		// If seller is logged in, but admin make him inactive, then force logout this user.
		$statement = $pdo->prepare("SELECT * FROM tbl_seller WHERE seller_id=? AND seller_access=?");
		$statement->execute(array($_SESSION['seller']['seller_id'],0));
		$total = $statement->rowCount();
		if($total) {
			header('location: '.BASE_URL.'logout.php');
			exit;
		}
	}

	if (isset($_POST['form_payment'])) {
		$file_name = $_FILES['bukti_pembayaran']['name'];
		$temp_name = $_FILES['bukti_pembayaran']['tmp_name'];
		$dir_bukti_pembayaran = "uploads/bukti_pembayaran/";
		$path_bukti_pembayaran = $dir_bukti_pembayaran . time() . '_' . $file_name;

		$statement = $pdo->prepare("SELECT * FROM tbl_pricing_plan WHERE pricing_plan_id=?");
		$statement->execute(array($_POST['pricing_plan_id']));
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
		foreach ($result as $row) {
			$item_name = $row['pricing_plan_name'];
			$item_amount = $row['pricing_plan_price'];
			$valid_day = $row['pricing_plan_day'];
		}

		$payment_date = $_POST['payment_date'];
		$ts = strtotime($payment_date);
		$item_number = time();
		$expire_date = date('Y-m-d',strtotime('+'.$valid_day.' days',$ts));

		$statement2 = $pdo->prepare("INSERT INTO tbl_payment (
							seller_id,
							payment_date,
							expire_date,
							txnid, 
							paid_amount,
							pricing_plan_id,
							payment_status, 
							payment_id,
							bukti_pembayaran
						) VALUES (?,?,?,?,?,?,?,?,?)");
		$sql = $statement2->execute(array(
					$_SESSION['seller']['seller_id'],
					$payment_date,
					$expire_date,
					'',
					$item_amount,
					$_POST['pricing_plan_id'],
					'Pending',
					$item_number,
					$path_bukti_pembayaran
				));

		if($sql){
			move_uploaded_file($temp_name, "../".$path_bukti_pembayaran);
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			exit();
		}
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

					<h1>Buat Pembayaran</h1>
					<?php
					if($error_message != '') {
						echo "<script>alert('".$error_message."')</script>";
					}
					if($success_message != '') {
						echo "<script>alert('".$success_message."')</script>";
					}
					?>
					<div style="margin-bottom: 20px;">
					<p>
						Pilihan Paket :<br>
Paket Basic -> Lama Sewa 10 Hari & Jumlah Maksimal Upload 10 Mobil<br>
Paket Gold -> Lama Sewa 20 Hari & Jumlah Maksimal Upload 40 Mobil<br>
Paket Platinum -> Lama Sewa 30 Hari & Jumlah Maksimal Upload 60 Mobil<br>
				</p></div>
					<div class="add-car-area">
						<div class="row">
							<div class="information-form">
								
								<?php
								if(isset($_REQUEST['msg'])) {
									echo '<div class="error" style="padding-left: 15px;padding-bottom:15px;">'.$_REQUEST['msg'].'</div>';
								}
								?>

								<form action="" method="post" id="paypal_form" enctype="multipart/form-data">
									
									<input type="hidden" name="cmd" value="_xclick" />
									<input type="hidden" name="no_note" value="1" />
									<input type="hidden" name="lc" value="UK" />
									<input type="hidden" name="currency_code" value="USD" />
									<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />

									<div class="form-row">
										<div class="form-group col-md-6 col-sm-6 option-item">
											<label for="">Pilih Paket *</label>
											<select data-placeholder="Pilih Paket" class="form-control chosen-select" name="pricing_plan_id">
												<option></option>
												<?php
												$statement = $pdo->prepare("SELECT * FROM tbl_pricing_plan ORDER BY pricing_plan_name ASC");
												$statement->execute();
												$result = $statement->fetchAll(PDO::FETCH_ASSOC);
												foreach ($result as $row) {
													?>			
													<option value="<?php echo $row['pricing_plan_id']; ?>"><?php echo $row['pricing_plan_name'].' Rp.'.$row['pricing_plan_price'].''; ?></option>
													<?php
												}
												?>
											</select>
										</div>					
										<div class="form-group col-md-6 col-sm-6">
											<label for="">Pilih Tanggal Pembayaran *</label>
											<input autocomplete="off" type="text" class="form-control datepicker" name="payment_date" placeholder="Tanggal Pembayaran" value="<?php echo date('Y-m-d'); ?>">
										</div>
										<div class="form-group col-md-6">
											<label for="">Nama Bank *</label>
											<select class="form-control" name="nama_bank">
												<option selected>Pilih Bank</option>
												<?php
													$statement = $pdo->prepare("SELECT * FROM tbl_bank ORDER BY nama_bank ASC");
													$statement->execute();
													$result = $statement->fetchAll(PDO::FETCH_ASSOC);
													foreach ($result as $row) {
												?>
												<option value="<?php echo $row['nama_bank']; ?>"><?php echo $row['nama_bank']; ?></option>
												<?php
													}
												?>
											</select>
										</div>
										<div class="form-group col-md-6">
											<label for="">Bukti Pembayaran  *</label>
											<div class="input-group mb-3">
												<input type="file" class="form-control" name="bukti_pembayaran" id="bukti_pembayaran" required>
											</div>
										</div>
									</div>
									<div class="form-group col-md-12">
										<input type="submit" class="btn btn-primary" value="Bayar Sekarang" name="form_payment">
									</div>

								</form>

							</div>
						</div>
					</div>


					<h1>Histori Pembayaran</h1>
					<?php
					$statement = $pdo->prepare("
											SELECT
											t1.payment_date,
											t1.expire_date,
											t1.txnid,
											t1.paid_amount,
											t1.pricing_plan_id,
											t1.payment_status,
											t2.pricing_plan_id,
											t2.pricing_plan_name

											FROM tbl_payment t1
											JOIN tbl_pricing_plan t2
											ON t1.pricing_plan_id = t2.pricing_plan_id
											WHERE t1.seller_id=?");
					$statement->execute(array($_SESSION['seller']['seller_id']));
					$total = $statement->rowCount();
					$result = $statement->fetchAll(PDO::FETCH_ASSOC);
					?>
					<?php if(!$total): ?>
					<div class="error">Result Not Found</div>
					<?php else: ?>
					<table id="example" class="display" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Serial</th>
								<th>Tanggal Pembayaran</th>
								<th>Kadaluarsa</th>
								<th>Jumlah</th>
								<th>Paket</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=0;				
							foreach ($result as $row) {
								$i++;
								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $row['payment_date']; ?></td>
									<td><?php echo $row['expire_date']; ?></td>
									<td><?php echo $row['paid_amount']; ?></td>
									<td><?php echo $row['pricing_plan_name']; ?></td>
									<td><?php echo $row['payment_status']; ?></td>
								</tr>	
								<?php
							}
							?>
						</tbody>
					</table>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="paymentModal">
	<div class="modal-dialog">
		<form action="" method="post">
			<div class="modal-content">
				<!-- header-->
				<div class="modal-header">
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Pembayaran</h4>
				</div>
				<!--body-->
				<div class="modal-body">
					<input type="hidden" id="seller_id" name="seller_id" value="">
					<input type="hidden" name="form-verifikasi" value="true">
					<div class="form-group">
						<label for="image-ktp">Foto KTP </label>
						<img src="" class="thumbnail" alt="Tidak dapat memuat gambar" id="image-ktp" style="height: 180px;">
					</div>
				</div>
				<!--footer-->
				<div class="modal-footer">
					<button class="btn btn-danger" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">Verifikasi</button>
				</div>
			</div>
		</form>
	</div>
</div>

<?php require_once('footer.php'); ?>