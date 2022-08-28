<?php require_once('header.php'); ?>

<?php
// Check if the seller is logged in or not
if(!isset($_SESSION['pembeli'])) {
	header('location: '.BASE_URL.'logout.php');
	exit;
} else {
	// If seller is logged in, but admin make him inactive, then force logout this user.
	$statement = $pdo->prepare("SELECT * FROM tbl_pembeli WHERE pembeli_id=? AND pembeli_access=?");
	$statement->execute(array($_SESSION['pembeli']['pembeli_id'],0));
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

					<h1>Daftar Test Drive Saya</h1>

					<table id="example" class="display" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>ID Test Drive</th>
								<th>Pengaju</th>
								<th>Mobil</th>
								<th>Tanggal</th>
								<th>Lokasi</th>
								<th>Status</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 0;
							$statement = $pdo->prepare("SELECT * FROM tbl_testdrive WHERE pembeli_id=?");
							$statement->execute(array($_SESSION['pembeli']['pembeli_id']));
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);	
							foreach ($result as $row) {
								$idbook = $row['id_testdrive'];
								$pengaju = $row['pengaju'];
								$tanggal = $row['tanggal'];
								$lokasi = $row['lokasi'];
								$mobil = $row['mobil'];
								$status = $row['status'];
								$i++;
								?>
									<tr>
										<td><?php echo $idbook; ?></td>
										<td><?php echo $pengaju; ?></td>
										<td><?php echo $mobil; ?></td>
										<td><?php echo $tanggal; ?></td>
										<td><?php echo $lokasi; ?></td>
										<td><?php echo $status; ?></td>
										<td>
											<a href="https://api.whatsapp.com/send?phone=6281949714893" class="btn btn-sm btn-success"><i class="fa fa-whatsapp"></i></a>
											<?php if ($status == 'Menunggu Persetujuan'): ?>
											<a href="<?php echo BASE_URL; ?>testdrive_action.php?action=cancel&id_testdrive=<?php echo $idbook; ?>" class="btn btn-sm btn-danger"><i class="fa fa-close"></i></a>
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