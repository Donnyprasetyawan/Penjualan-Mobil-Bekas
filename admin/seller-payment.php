<?php require_once('header.php'); ?>


<section class="content-header">
	<div class="content-header-left">
		<h1>Daftar Pembayaran Penjual</h1>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-body table-responsive">
					
					<?php
					$statement = $pdo->prepare("
											SELECT
											t1.id,
											t1.seller_id,
											t1.payment_date,
											t1.expire_date,
											t1.txnid,
											t1.paid_amount,
											t1.pricing_plan_id,
											t1.payment_status,
											t1.bukti_pembayaran,

											t2.pricing_plan_id,
											t2.pricing_plan_name,

											t3.seller_id,
											t3.seller_name,
											t3.seller_email,
											t3.seller_phone

											FROM tbl_payment t1

											JOIN tbl_pricing_plan t2
											ON t1.pricing_plan_id = t2.pricing_plan_id

											JOIN tbl_seller t3
											ON t1.seller_id = t3.seller_id");
					$statement->execute();
					$total = $statement->rowCount();
					$result = $statement->fetchAll(PDO::FETCH_ASSOC);
					?>
					<?php if(!$total): ?>
					<div class="error">Tidak Ditemukan Hasil</div>
					<?php else: ?>
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Serial</th>
								<th>Data Penjual</th>
								<th>Tanggal Pembayaran</th>
								<th>Kadaluarsa</th>
								<th>ID Transaksi</th>
								<th>Harga Paket Dan Jumlah</th>
								<th>Status Pembayaran</th>
								<th>Aksi</th>
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
									<td>
										Id: <?php echo $row['seller_id']; ?><br>
										Nama: <?php echo $row['seller_name']; ?><br>
										Email: <?php echo $row['seller_email']; ?><br>
										Handphone: <?php echo $row['seller_phone']; ?>
									</td>
									<td><?php echo $row['payment_date']; ?></td>
									<td><?php echo $row['expire_date']; ?></td>
									<td><?php echo $row['txnid']; ?></td>
									<td><?php echo 'Paket: '.$row['pricing_plan_name'].'<br>Jumlah: $'.$row['paid_amount']; ?></td>
									<td>
										<?php
										if($row['payment_status']=='Pending'):
											echo '<span style="color:red;">'.$row['payment_status'].'</span>';
										else:
											echo '<span style="color:green;">'.$row['payment_status'].'</span>';
										endif;	
										?>
									</td>
									<td class="text-center">
										<?php
										if($row['payment_status']=='Pending') {
										?>
											<a href="#" class="btn btn-success btn-xs" data-href="seller-payment-verif.php?id=<?php echo $row['id']; ?>" data-bukti="<?php echo BASE_URL . $row['bukti_pembayaran']; ?>" data-toggle="modal" data-target="#confirm-verif">Verifikasi</a>
											<a href="#" class="btn btn-danger btn-xs" data-href="seller-payment-delete.php?id=<?php echo $row['id']; ?>" data-toggle="modal" data-target="#confirm-delete">Hapus</a>
										<?php
										}
										?>
									</td>
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
</section>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Konfirmasi Penghapusan</h4>
            </div>
            <div class="modal-body">
                Apakah Kamu Yakin Ingin Menghapus Item Ini ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batalkan</button>
                <a class="btn btn-danger btn-ok">Hapus</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirm-verif" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Konfirmasi Verifikasi</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
					<label for="image-bukti">Bukti Pembayaran </label>
					<img src="" class="thumbnail" alt="Tidak dapat memuat gambar" id="image-bukti" style="height: 250px;">
				</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batalkan</button>
                <a class="btn btn-success" id="btn-verif">Verifikasi</a>
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>