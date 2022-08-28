<?php require_once('header.php'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Pembayaran Kredit</h1>
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
                                <th>IDs</th>
								<th>Pengaju</th>
								<th>No.Hp</th>
								<th>Email</th>
								<th>Nama Mobil</th>
                                <th>Bank</th>
                                <th>Status</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 0;
							$statement = $pdo->prepare("SELECT * FROM tbl_pembelian WHERE pembayaran='Kredit'");
							$statement->execute();
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);	
							foreach ($result as $row) {
                                $idbook = $row['id_booking'];
								$pembook = $row['pembooking'];
								$nope = $row['nope'];
								$email = $row['email'];
								$idbook = $row['id_booking'];
								$car_id = $row['car_id'];
								$mobil = $row['mobil'];
                                $bank = $row['nama_bank'];
                                $status = $row['status'];
                                $bukti_pembayaran = $row['bukti_pembayaran'];
								$i++;
								?>
									<tr>
										<td><?php echo $idbook; ?></td>
										<td><?php echo $pembook; ?></td>
										<td><?php echo $nope; ?></td>
										<td><?php echo $email; ?></td>
										<td><?php echo $mobil; ?></td>
                                        <td><?php echo $bank; ?></td>
                                        <td><?php echo $status; ?></td>
                                        <td class="text-center">
											<?php if ($status == 'Terverifikasi'): ?>
											<a href="<?php echo BASE_URL . 'admin/pembayaran-kredit-detail.php?id=' . $idbook ?>" class="btn btn-primary btn-xs">Lihat Cicilan</a>
											<?php endif ?>

											<?php if ($status == 'Menunggu Konfirmasi'): ?>
											<a href="<?php echo BASE_URL . $bukti_pembayaran ?>" target="_blank" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a>
                                            <a href="payment_action.php?action=kredit_first_accept&id_booking=<?php echo $idbook ?>&car_id=<?php echo $car_id ?>" onclick="confirmPembayaran('accept')" class="btn btn-success btn-xs"><i class="fa fa-check"></i></a>
                                            <a href="payment_action.php?action=kredit_reject&id_booking=<?php echo $idbook ?>" onclick="confirmPembayaran('reject')" class="btn btn-danger btn-xs"><i class="fa fa-close"></i></a>
                                            <?php endif ?>

											<?php if ($status == 'Ditolak'): ?>
											<a href="<?php echo BASE_URL . $bukti_pembayaran ?>" target="_blank" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a>
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
</section>

<?php require_once('footer.php'); ?>