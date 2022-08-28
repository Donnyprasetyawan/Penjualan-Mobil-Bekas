<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;

    if(empty($_POST['fuel_type_name'])) {
        $valid = 0;
        $error_message .= "Nama Jenis Bahan Bakar Tidak Boleh Kosong.<br>";
    } else {
		// Duplicate checking
    	// current name that is in the database
    	$statement = $pdo->prepare("SELECT * FROM tbl_fuel_type WHERE fuel_type_id=?");
		$statement->execute(array($_REQUEST['id']));
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $row) {
			$current_fuel_type_name = $row['fuel_type_name'];
		}

		$statement = $pdo->prepare("SELECT * FROM tbl_fuel_type WHERE fuel_type_name=? and fuel_type_name!=?");
    	$statement->execute(array($_POST['fuel_type_name'],$current_fuel_type_name));
    	$total = $statement->rowCount();							
    	if($total) {
    		$valid = 0;
        	$error_message .= 'Nama Jenis Bahan Bakar Tersebut Sudah Ada.<br>';
    	}
    }

    if($valid == 1) {

    	// updating into the database
		$statement = $pdo->prepare("UPDATE tbl_fuel_type SET fuel_type_name=? WHERE fuel_type_id=?");
		$statement->execute(array($_POST['fuel_type_name'],$_REQUEST['id']));

    	$success_message = 'Jenis Bahan Bakar Berhasil Di Update..';
    }
}
?>

<?php
if(!isset($_REQUEST['id'])) {
	header('location: logout.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM tbl_fuel_type WHERE fuel_type_id=?");
	$statement->execute(array($_REQUEST['id']));
	$total = $statement->rowCount();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	if( $total == 0 ) {
		header('location: logout.php');
		exit;
	}
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Edit Jenis Bahan Bakar</h1>
	</div>
	<div class="content-header-right">
		<a href="fuel-type.php" class="btn btn-primary btn-sm">Lihat Semua</a>
	</div>
</section>

<?php							
foreach ($result as $row) {
	$fuel_type_name = $row['fuel_type_name'];
}
?>


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
								<input type="text" class="form-control" name="fuel_type_name" value="<?php echo $fuel_type_name; ?>" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form1">Update</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

</section>

<?php require_once('footer.php'); ?>