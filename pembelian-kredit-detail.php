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

        $data_credit = $pdo->prepare("SELECT * FROM tbl_credit WHERE pembelian_id=?");
        $data_credit->execute(array($_GET['id']));
        $result = $data_credit->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $credit_id = $row['id'];
            $cicilan = $row['cicilan'];
            $credit_lama_cicilan = $row['lama_cicilan'];
        }

        $statement_item = $pdo->prepare("SELECT * FROM tbl_credit_items WHERE pembelian_id=?");
        $statement_item->execute(array($_GET['id']));
        $total_item_credit = $statement_item->rowCount();
    }


    if (isset($_POST['lunasi_cicilan'])) {
        $file_name_kredit = $_FILES['bukti_pembayaran_kredit']['name'];
        $temp_name_kredit = $_FILES['bukti_pembayaran_kredit']['tmp_name'];
        $dir_bukti_pembayaran_kredit = "uploads/bukti_pembayaran/";
        $path_bukti_pembayaran_kredit = $dir_bukti_pembayaran_kredit . time() . '_' . $file_name_kredit;
        $upload_bukti_pembayaran_kredit = move_uploaded_file($temp_name_kredit, $path_bukti_pembayaran_kredit);

        $credit_item = $pdo->prepare("INSERT INTO tbl_credit_items
            (credit_id, pembelian_id, nominal, nama_bank, bukti_pembayaran) VALUES (?, ?, ?, ?, ?)");
        
        $credit_item->execute(array(
            $_POST['credit_id'], $_POST['pembelian_id'], $_POST['nominal'], $_POST['nama_bank'], $path_bukti_pembayaran_kredit
        ));

        header('Location: ' . $_SERVER['HTTP_REFERER']);
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

                    <div class="row justify-content-between align-items-center">
                        <div class="col-6">
                            <h1>Daftar Cicilan Pembelian Saya </h1>
                        </div>
                        <div class="col-6">
                            <?php if($total_item_credit < $credit_lama_cicilan): ?>
                            <button class="btn btn-success float-end" data-toggle="modal" id= "buttonLunasiModal"data-target="#lunasiModal">Lunasi Cicilan</button>
                            <?php endif; ?>
                        </div>
                    </div>

					<table id="example" class="display" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>IDs</th>
								<th>Nominal</th>
                                <th>Bank</th>
                                <th>Tanggal</th>
                                <th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 0;
							$result = $statement_item->fetchAll(PDO::FETCH_ASSOC);	
							foreach ($result as $row) {
								$id = $row['id'];
                                $nominal = $row['nominal'];
                                $bank = $row['nama_bank'];
                                $status = $row['status'];
                                $tanggal = $row['created_at'];
								$i++;
								?>
									<tr>
										<td><?php echo $id; ?></td>
										<td>Rp. <?php echo number_format($nominal); ?></td>
                                        <td><?php echo $bank; ?></td>
                                        <td><?php echo $tanggal; ?></td>									
                                        <td><?php echo $status; ?></td>
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

<!-- Modal -->
<div class="modal fade" id="lunasiModal" tabindex="-1" aria-labelledby="lunasiModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="lunasi_cicilan">
            <input type="hidden" name="pembelian_id" value="<?php echo $_GET['id']; ?>">
            <input type="hidden" name="credit_id" value="<?php echo $credit_id; ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lunasiModalLabel">Lunasi Cicilan</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Nominal *</label>
                        <input type="number" class="form-control" id="nominal" readonly name="nominal" placeholder="Nominal">
                    </div>
                    <div class="mb-3">
                        <label for="">Nama Bank *</label>
                        <select data-placeholder="Pilih Item ..." class="form-control" name="nama_bank">
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
                    <div class="mb-3">
                        <label for="">Bukti Pembayaran  *</label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="bukti_pembayaran_kredit" id="bukti_pembayaran_kredit" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
   console.log(<?=$cicilan?>);
   let buttonLunasiModal = document.getElementById('buttonLunasiModal');
   buttonLunasiModal.addEventListener('click', function(e){
    let nominal =  document.getElementById('nominal');
    nominal.value =<?=$cicilan?>;
   });
</script>
<?php require_once('footer.php'); ?>