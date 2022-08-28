<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form-verifikasi'])) {
	$statement = $pdo->prepare("UPDATE tbl_pembeli SET pembeli_access=?, pembeli_status=? WHERE pembeli_id=?");
	$statement->execute(array(1,1,$_POST['pembeli_id']));
}
if(isset($_POST['form1'])) {
	$statement = $pdo->prepare("UPDATE tbl_pembeli SET pembeli_access=? WHERE pembeli_id=?");
	$statement->execute(array(0,$_POST['pembeli_id']));
}
if(isset($_POST['form2'])) {
	$statement = $pdo->prepare("UPDATE tbl_pembeli SET pembeli_access=? WHERE pembeli_id=?");
	$statement->execute(array(1,$_POST['pembeli_id']));
}
if (isset($_POST['delete'])) {
	$statement = $pdo->prepare("DELETE FROM tbl_pembeli WHERE pembeli_id=?");
	$statement->execute(array($_POST['pembeli_id']));
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Daftar Pembeli</h1>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-body table-responsive">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="50">SL</th>
								<th>Nama</th>
								<th>Email</th>
								<th>Handphone</th>
								<th>Alamat</th>
								<th>Negara</th>
								<th>Provinsi</th>
								<th>Kota</th>
								<th>Status</th>
								<th width="140" class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=0;
							$statement = $pdo->prepare("SELECT * FROM tbl_pembeli ORDER BY pembeli_name ASC");
							$statement->execute();
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);
							foreach ($result as $row) {
								$i++;
								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $row['pembeli_name']; ?></td>
									<td><?php echo $row['pembeli_email']; ?></td>
									<td><?php echo $row['pembeli_phone']; ?></td>
									<td><?php echo $row['pembeli_address']; ?></td>
									<td><?php echo $row['pembeli_city']; ?></td>
									<td><?php echo $row['pembeli_state']; ?></td>
									<td><?php echo $row['pembeli_country']; ?></td>
									<td>
										<?php
											if($row['pembeli_access'] == '1') {
												echo 'Aktif';
											} else {
												echo 'Tidak Aktif';
											}
										?>
									</td>
									<td class="text-center">
										<?php if($row['pembeli_status']=='0'): ?>
											<button class="btn btn-success btn-xs btnVerifPembeli" data-toggle="modal" data-target="#verifModal"
													data-id="<?php echo $row['pembeli_id']; ?>" data-ktp="<?php echo BASE_URL . $row['pembeli_ktp']; ?>">
												Verifikasi
											</button>
										<?php else: ?>
											<form action="" method="post">
												<input type="hidden" name="pembeli_id" value="<?php echo $row['pembeli_id']; ?>">
												<?php if($row['pembeli_access']=='1'): ?>
													<input onclick="return confirmInactive();" type="submit" value="Nonaktifkan" class="btn btn-danger btn-xs" name="form1">
												<?php else: ?>
													<input onclick="return confirmActive();" type="submit" value="Aktifkan" class="btn btn-success btn-xs" name="form2">
												<?php endif; ?>
											</form>
										<?php endif; ?>

										<form action="" method="post">
											<input type="hidden" name="pembeli_id" value="<?php echo $row['pembeli_id']; ?>">
											<input type="hidden" name="form_delete" value="true">
											<button type="submit" onclick="return confirmDelete();" class="btn btn-danger btn-xs" name="delete"><i class="fa fa-trash"></i></button>
										</form>
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
</section>

<!-- Modal -->
<div class="modal fade" id="verifModal">
	<div class="modal-dialog">
		<form action="" method="post">
			<div class="modal-content">
				<!-- header-->
				<div class="modal-header">
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Verifikasi Pembeli</h4>
				</div>
				<!--body-->
				<div class="modal-body">
					<input type="hidden" id="pembeli_id" name="pembeli_id" value="">
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