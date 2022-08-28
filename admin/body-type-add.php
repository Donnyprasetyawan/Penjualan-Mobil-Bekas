<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;

    if(empty($_POST['body_type_name'])) {
        $valid = 0;
        $error_message .= "Tipe Body Tidak Boleh Kosong.<br>";
    } else {
    	// Duplicate Category checking
    	$statement = $pdo->prepare("SELECT * FROM tbl_body_type WHERE body_type_name=?");
    	$statement->execute(array($_POST['body_type_name']));
    	$total = $statement->rowCount();
    	if($total) {
    		$valid = 0;
        	$error_message .= "Tipe Body Tersebut Sudah Ada.<br>";
    	}
    }


    if($valid == 1) {

		// saving into the database
		$statement = $pdo->prepare("INSERT INTO tbl_body_type (body_type_name) VALUES (?)");
		$statement->execute(array($_POST['body_type_name']));

    	$success_message = 'Tipe Body Berhasil Ditambahkan.';
    }
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Tambahkan Tipe Body</h1>
	</div>
	<div class="content-header-right">
		<a href="body-type.php" class="btn btn-primary btn-sm">Lihat Semua</a>
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
							<label for="" class="col-sm-2 control-label">Nama Tipe Body <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="body_type_name" autocomplete="off">
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