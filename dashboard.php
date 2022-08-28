<?php require_once('header.php'); ?>

<?php
// Check if the pembeli is logged in or not
if(!isset($_SESSION['pembeli'])) {
	header('location: '.BASE_URL.'logout.php');
	exit;
} else {
	// If pembeli is logged in, but admin make him inactive, then force logout this user.
	$statement = $pdo->prepare("SELECT * FROM tbl_pembeli WHERE pembeli_id=? AND pembeli_access=?");
	$statement->execute(array($_SESSION['pembeli']['pembeli_id'],0));
	$total = $statement->rowCount();
	if($total) {
		header('location: '.BASE_URL.'logout.php');
		exit;
	}
}
?>

<!--Dashboard Start-->
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

					<h1>Halo, <?php echo $_SESSION['pembeli']['pembeli_name']; ?></h1>

					<h3>Selamat Datang Di Dashboardmu.</h3>

					
					<div class="row">
						<div class="col-md-4 col-sm-12 col-xs-12">
							<table class="table table-bordered">
								<tr>
									<td>Status:</td>
									<td> Pembeli </td>
								</tr>
								<tr>
									<td>Booking Saya:</td>
									<td><a href="<?php echo BASE_URL; ?>car-add.php">Lihat Daftar Booking Saya</a></td>
								</tr>
								<tr>
									<td>Pembelian Saya:</td>
									<td><a href="<?php echo BASE_URL; ?>car-view.php">Lihat Daftar Pembelian Saya</a></td>
								</tr>
							</table>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php require_once('footer.php'); ?>