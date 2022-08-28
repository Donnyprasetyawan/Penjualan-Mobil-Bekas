<?php require_once('header.php'); ?>

<?php
// Preventing the direct access of this page.
if(!isset($_REQUEST['id'])) {
	header('location: logout.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM tbl_booking WHERE id_booking=?");
	$statement->execute(array($_REQUEST['id']));
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	$total = $statement->rowCount();
	if( $total == 0 ) {
		header('location: logout.php');
		exit;
	} else {
		// Preventing one user deleting another user's data through url
		foreach ($result as $row) {
			$pembeli_id = $row['pembeli_id'];
		}
		if($pembeli_id != $_SESSION['pembeli']['pembeli_id']) {
			header('location: logout.php');
			exit;
		}
	}
}

$statement = $pdo->prepare("SELECT * FROM tbl_pembeli WHERE pembeli_id=? AND pembeli_access=?");
$statement->execute(array($_SESSION['pembeli']['pembeli_id'],0));
$total = $statement->rowCount();
if($total) {
	header('location: '.BASE_URL.'logout.php');
	exit;
}
?>

<?php

	// Delete from tbl_car
	$statement = $pdo->prepare("DELETE FROM tbl_booking WHERE id_booking=?");
	$statement->execute(array($_REQUEST['id']));


	header('location: car-view.php');
?>