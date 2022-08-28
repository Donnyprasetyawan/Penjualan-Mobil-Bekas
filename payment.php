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
					<h1>Histori Pembayaran</h1>
					<?php
					$statement = $pdo->prepare("
											SELECT

											t1.payment_date,
											t1.expire_date,
											t1.txnid,
											t1.paid_amount,
											t1.pricing_plan_id,
											t2.pricing_plan_id,
											t2.pricing_plan_name

											FROM tbl_payment_pembeli t1
											JOIN tbl_pricing_plan t2
											ON t1.pricing_plan_id = t2.pricing_plan_id
											WHERE t1.pembeli_id=? AND t1.payment_status=?");
					$statement->execute(array($_SESSION['pembeli']['pembeli_id'],'Completed'));
					$total = $statement->rowCount();
					$result = $statement->fetchAll(PDO::FETCH_ASSOC);
					?>
					<?php if(!$total): ?>
					<div class="error">Result Not Found</div>
					<?php else: ?>
					<table id="example" class="display" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Serial</th>
								<th>Tanggal Pembayaran</th>
								<th>Kadaluarsa</th>
								<th>ID Transaksi</th>
								<th>DP Awal</th>
								<th>Paket</th>
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
									<td><?php echo $row['payment_date']; ?></td>
									<td><?php echo $row['expire_date']; ?></td>
									<td><?php echo $row['txnid']; ?></td>
									<td><?php echo $row['paid_amount']; ?> Jt</td>
									<td><?php echo $row['pricing_plan_name']; ?></td>
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
</div>

<?php require_once('footer.php'); ?>