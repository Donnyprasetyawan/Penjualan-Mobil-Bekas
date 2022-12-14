<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;

    if(empty($_POST['pricing_plan_name'])) {
        $valid = 0;
        $error_message .= "Nama Paket Tidak Boleh Kosong.<br>";
    } else {
		// Duplicate checking
    	// current name that is in the database
    	$statement = $pdo->prepare("SELECT * FROM tbl_pricing_plan WHERE pricing_plan_id=?");
		$statement->execute(array($_REQUEST['id']));
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $row) {
			$current_pricing_plan_name = $row['pricing_plan_name'];
		}

		$statement = $pdo->prepare("SELECT * FROM tbl_pricing_plan WHERE pricing_plan_name=? and pricing_plan_name!=?");
    	$statement->execute(array($_POST['pricing_plan_name'],$current_pricing_plan_name));
    	$total = $statement->rowCount();							
    	if($total) {
    		$valid = 0;
        	$error_message .= 'Nama Paket Tersebut Sudah Ada.<br>';
    	}
    }

    if(empty($_POST['pricing_plan_price'])) {
        $valid = 0;
        $error_message .= "Harga Paket Tidak Boleh Kosong.<br>";
    } else {
    	if(!is_numeric($_POST['pricing_plan_price'])) {
    		$valid = 0;
        	$error_message .= "Harga Paket Harus Dalam Bentuk Angka.<br>";
    	}
    }

    if(empty($_POST['pricing_plan_day'])) {
        $valid = 0;
        $error_message .= "Lama Sewa Tidak Boleh Kosong.<br>";
    } else {
    	if(!is_numeric($_POST['pricing_plan_day'])) {
    		$valid = 0;
        	$error_message .= "Lama Sewa Harus Dalam Bentuk Angka.<br>";
    	}
    }

    if(empty($_POST['pricing_plan_item_allow'])) {
        $valid = 0;
        $error_message .= "Jumlah Upload Tidak Boleh Kosong<br>";
    } else {
    	if(!is_numeric($_POST['pricing_plan_item_allow'])) {
    		$valid = 0;
        	$error_message .= "Jumlah Upload Harus Dalam Bentuk Angka.<br>";
    	}
    }

    if($valid == 1) {

    	// updating into the database
		$statement = $pdo->prepare("UPDATE tbl_pricing_plan SET pricing_plan_name=?, pricing_plan_price=?, pricing_plan_day=?, pricing_plan_item_allow=?, pricing_plan_description=? WHERE pricing_plan_id=?");
		$statement->execute(array($_POST['pricing_plan_name'],$_POST['pricing_plan_price'],$_POST['pricing_plan_day'],$_POST['pricing_plan_item_allow'],$_POST['pricing_plan_description'],$_REQUEST['id']));

    	$success_message = 'Paket Harga Berhasil Di Update..';
    }
}
?>

<?php
if(!isset($_REQUEST['id'])) {
	header('location: logout.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM tbl_pricing_plan WHERE pricing_plan_id=?");
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
		<h1>Edit Paket Harga</h1>
	</div>
	<div class="content-header-right">
		<a href="pricing-plan.php" class="btn btn-primary btn-sm">Lihat Semua</a>
	</div>
</section>

<?php							
foreach ($result as $row) {
	$pricing_plan_name        = $row['pricing_plan_name'];
	$pricing_plan_price       = $row['pricing_plan_price'];
	$pricing_plan_day         = $row['pricing_plan_day'];
	$pricing_plan_item_allow  = $row['pricing_plan_item_allow'];
	$pricing_plan_description = $row['pricing_plan_description'];
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
							<label for="" class="col-sm-2 control-label">Nama Paket <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="pricing_plan_name" value="<?php echo $pricing_plan_name; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Harga Paket <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="pricing_plan_price" value="<?php echo $pricing_plan_price; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Lama Sewa <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="pricing_plan_day" value="<?php echo $pricing_plan_day; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Jumlah Upload <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="pricing_plan_item_allow" value="<?php echo $pricing_plan_item_allow; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Deskripsi Paket </label>
							<div class="col-sm-9">
								<textarea name="pricing_plan_description" class="form-control" cols="30" rows="10" style="height: 150px;" id="editor1"><?php echo $pricing_plan_description; ?></textarea>
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