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
					<h1>Daftar Pembeli Booking</h1>

					<table class="table table-responsive">
						<thead>
							<tr>
								<th>ID Pembelian</th>
								<th>Pengaju</th>
								<th>No.Hp</th>
								<th>Email</th>
								<th>Nama Mobil</th>
								<th>Pembayaran</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 0;
							$statement = $pdo->prepare("SELECT * FROM tbl_booking WHERE penjual=?");
							$statement->execute(array($_SESSION['seller']['seller_id']));
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);	
							foreach ($result as $row) {
								$pembook = $row['pembooking'];
								$nope = $row['nope'];
								$email = $row['email'];
								$idbook = $row['id_booking'];
								$pembayaran = $row['pembayaran'];
								$mobil = $row['mobil'];
								$i++;
								?>
									<tr>
										<td><?php echo $idbook; ?></td>
										<td><?php echo $pembook; ?></td>
										<td><?php echo $nope; ?></td>
										<td><?php echo $email; ?></td>
										<td><?php echo $mobil; ?></td>
										<td><?php echo $pembayaran; ?></td>
										
									</tr>
								<?php
							}
							?>
							
							
						</tbody>
					</table>

					<h1>History Penjualan</h1>

					<table class="table table-responsive">
						<thead>
							<tr>
								<th>ID Pembelian</th>
								<th>Pengaju</th>
								<th>No.Hp</th>
								<th>Email</th>
								<th>Nama Mobil</th>
								<th>Pembayaran</th>
								<!-- <th>Lama Cicil</th> -->
								
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 0;
							$statement = $pdo->prepare("SELECT * FROM tbl_pembelian WHERE penjual=?");
							$statement->execute(array($_SESSION['seller']['seller_id']));
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);	
							foreach ($result as $row) {
								$pembook = $row['pembooking'];
								$nope = $row['nope'];
								$email = $row['email'];
								$idbook = $row['id_booking'];
								$pembayaran = $row['pembayaran'];
								$mobil = $row['mobil'];
								$lamcil = $row['lama_cicil'];
								$i++;
								?>
									<tr>
										<td><?php echo $idbook; ?></td>
										<td><?php echo $pembook; ?></td>
										<td><?php echo $nope; ?></td>
										<td><?php echo $email; ?></td>
										<td><?php echo $mobil; ?></td>
										<td><?php echo $pembayaran; ?></td>
										<!-- <td><?php echo $lamcil ?></td> -->
										
									</tr>
								<?php
							}
							?>
							
							
						</tbody>
					</table>


					<h1>Daftar Test Drive Masuk</h1>

					<table class="table table-responsive">
						<thead>
							<tr>
								<th>ID Test Drive</th>
								<th>Pengaju</th>
								<!-- <th>No.Hp</th> -->
								<!-- <th>Email</th> -->
								<th>Alamat</th>
								<th>Mobil</th>
								<th>Tanggal</th>
								<th>Status</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 0;
							$statement = $pdo->prepare("SELECT * FROM tbl_testdrive WHERE penjual=?");
							$statement->execute(array($_SESSION['seller']['seller_id']));
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);	
							foreach ($result as $row) {
								$idbook = $row['id_testdrive'];
								$pengaju = $row['pengaju'];
								$tanggal = $row['tanggal'];
								$lokasi = $row['lokasi'];
								$mobil = $row['mobil'];
								$nope = $row['nope'];
								$email = $row['email'];
								$alamat = $row['lokasi'];
								$status = $row['status'];
								$i++;
								?>
									<tr>
										<td><?php echo $idbook; ?></td>
										<td><?php echo $pengaju; ?></td>
										<!-- <td><?php //echo $nope; ?></td> -->
										<!-- <td><?php //echo $email; ?></td> -->
										<td><?php echo $alamat; ?></td>
										<td><?php echo $mobil; ?></td>
										<td><?php echo $tanggal; ?></td>
										<td><?php echo $status; ?></td>
										<td>
											<a href="https://api.whatsapp.com/send?phone=<?php echo $nope; ?>" target="_blank" class="btn btn-sm btn-success"><i class="fa fa-whatsapp"></i></a>
											<?php if ($status == 'Menunggu Persetujuan'): ?>
											<a href="<?php echo BASE_URL; ?>testdrive_action.php?action=accept&id_testdrive=<?php echo $idbook; ?>" class="btn btn-sm btn-success"><i class="fa fa-check"></i></a>
											<?php endif ?>
										</td>
									</tr>
								<?php
							}
							?>
							
							
						</tbody>
					</table>
				</div>
			</div>

		</div>
	</div>
</div>

<?php require_once('footer.php'); ?>