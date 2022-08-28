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

					<h1>Daftar Booking Saya</h1>

					<table id="example" class="display" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>ID Booking</th>
								<th>Nama Mobil</th>
								<!-- <th>Pembayaran</th> -->
								<th>Nama Bank</th>
								<th>Lama Cicil</th>
								<th>Lama Booking</th>
								<th>Status</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 0;
							$statement = $pdo->prepare("SELECT * FROM tbl_booking WHERE pembooking=?");
							$statement->execute(array($_SESSION['pembeli']['pembeli_name']));
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);	
							foreach ($result as $row) {
								$idbook = $row['id_booking'];
								$pembayaran = $row['pembayaran'];
								$mobil = $row['mobil'];
								$nambank = $row['nama_bank'];
								$lamcil = $row['lama_cicil'];
								$lambok = $row['lama_book'];
								$status = $row['status'];
								$i++;
								?>
									<tr>
										<td><?php echo $idbook; ?></td>
										<td><?php echo $mobil; ?></td>
										<!-- <td><?php //echo $pembayaran; ?></td> -->
										<td><?php echo $nambank; ?></td>
										<td><?php echo $lamcil ?></td>
										<td><?php echo $lambok; ?></td>
										<td><?php echo $status; ?></td>
										<td>
											<?php
											if ($status == 'Terverifikasi'):
											?>
											<a href="<?php echo BASE_URL.'car.php?id='.$row['car_id']; ?>" target="_blank" class="btn btn-info btn-xs" style="width:100%;margin-bottom:3px;">Beli</a>
											<?php
											else:
											?>
											-
											<?php
											endif;
											?>
											<!-- <a href="car-edit.php?id=<?php //echo $row['id_booking']; ?>" class="btn btn-warning btn-xs" style="width:100%;margin-bottom:3px;">Edit</a><br>
											<a onclick="return confirmDelete();" href="car-delete.php?id=<?php //echo $row['id_booking']; ?>" class="btn btn-danger btn-xs" style="width:100%;margin-bottom:3px;">Hapus</a> -->
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