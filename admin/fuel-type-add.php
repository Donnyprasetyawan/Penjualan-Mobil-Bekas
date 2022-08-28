<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;

    if(empty($_POST['fuel_type_name'])) {
        $valid = 0;
        $error_message .= "Nama Jenis Bahan Bakar Tidak Boleh Kosong.<br>";
    } else {
    	// Duplicate Category checking
    	$statement = $pdo->prepare("SELECT * FROM tbl_fuel_type WHERE fuel_type_name=?");
    	$statement->execute(array($_POST['fuel_type_name']));
    	$total = $statement->rowCount();
    	if($total) {
    		$valid = 0;
        	$error_message .= "Nama Jenis Bahan Bakar Tersebut Sudah Ada.<br>";
    	}
    }


    if($valid == 1) {

		// saving into the database
		$statement = $pdo->prepare("INSERT INTO tbl_fuel_type (fuel_type_name) VALUES (?)");
		$statement->execute(array($_POST['fuel_type_name']));

    	$success_message = 'Jenis Bahan Bakar Berhasil Ditambahkan.';
    }
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Tambah Jenis Bahan Bakar</h1>
	</div>
	<div class="content-header-right">
		<a href="fuel-type.php" class="btn btn-primary btn-sm">Lihat Semua</a>
	</div>
</section>


<section class="content">

	<div class="row">
		<div class="col-md-12">

			<?php if($error_message): ?>
			<div class="callout callout-danger">
			
			<p>
			<?php echo $error_message; ?>
			</p>
			</div>
			<?php endif; ?>

			<?php if($success_message): ?>
			<div class="callout callout-success">
			
			<p><?php echo $success_message; ?></p>
			</div>
			<?php endif; ?>

			<form class="form-horizontal" action="" method="post">

				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Nama Jenis Bahan Bakar <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="fuel_type_name" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form1">Tambahkan</button>
							</div>
						</div>
					</div>
				</div>

			</form>


		</div>
	</div>

</section>

<?php require_once('footer.php'); ?>