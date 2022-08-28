<?php require_once('header.php'); ?>

<?php
if(!isset($_REQUEST['id'])) {
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE id=?");
	$statement->execute(array($_REQUEST['id']));
	$total = $statement->rowCount();
	if( $total == 0 ) {
		header('Location: ' . $_SERVER['HTTP_REFERER']);
		exit;
	}
}
?>

<?php
	// Delete from tbl_news
	$statement = $pdo->prepare("UPDATE tbl_payment SET payment_status = 'Completed' WHERE id=?");
	$statement->execute(array($_REQUEST['id']));

	header('location: seller-payment.php');
?>