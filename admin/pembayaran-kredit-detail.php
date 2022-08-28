<?php require_once('header.php'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Detal Pembayaran Cicilan Kredit</h1>
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
								<th>Nominal</th>
                                <th>Bank</th>
                                <th>Status</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 0;
							$statement = $pdo->prepare("SELECT * FROM tbl_credit_items WHERE pembelian_id=?");
							$statement->execute(array($_GET['id']));
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);	
							foreach ($result as $row) {
                                $id = $row['id'];
                                $nominal = $row['nominal'];
                                $bank = $row['nama_bank'];
                                $status = $row['status'];
                                $bukti_pembayaran = $row['bukti_pembayaran'];
								$i++;
								?>
									<tr>
										<td><?php echo $id; ?></td>
										<td>Rp. <?php echo number_format($nominal); ?></td>
                                        <td><?php echo $bank; ?></td>
                                        <td><?php echo $status; ?></td>
                                        <td class="text-center">
                                            <a href="<?php echo BASE_URL . $bukti_pembayaran ?>" target="_blank" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a>

											<?php if ($status == 'Pending'): ?>
                                            <a href="payment_action.php?action=kredit_cicilan_accept&credit_item_id=<?php echo $id ?>" onclick="confirmPembayaran('accept')" class="btn btn-success btn-xs"><i class="fa fa-check"></i></a>
                                            <a href="payment_action.php?action=kredit_cicilan_reject&credit_item_id=<?php echo $id ?>" onclick="confirmPembayaran('reject')" class="btn btn-danger btn-xs"><i class="fa fa-close"></i></a>
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