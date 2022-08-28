<?php
    include 'config.php';

    // Booking
    if ($_GET['action'] == 'booking_accept') {
        $id_booking = $_GET['id_booking'];
        $statement = $pdo->prepare("UPDATE tbl_booking SET status='Terverifikasi' WHERE id_booking=?");
        $statement->execute(array($id_booking));

        $car_id = $_GET['car_id'];
        $statement2 = $pdo->prepare("UPDATE tbl_car SET availability_status='Terbooking' WHERE car_id=?");
        $statement2->execute(array($car_id));

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    if ($_GET['action'] == 'booking_reject') {
        $id_booking = $_GET['id_booking'];
        $statement = $pdo->prepare("UPDATE tbl_booking SET status='Ditolak' WHERE id_booking=?");
        $statement->execute(array($id_booking));

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }


    // Tunai
    if ($_GET['action'] == 'tunai_accept') {
        $id_booking = $_GET['id_booking'];
        $statement = $pdo->prepare("UPDATE tbl_pembelian SET status='Terverifikasi' WHERE id_booking=?");
        $statement->execute(array($id_booking));

        $car_id = $_GET['car_id'];
        $statement2 = $pdo->prepare("UPDATE tbl_car SET availability_status='Terjual' WHERE car_id=?");
        $statement2->execute(array($car_id));

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    if ($_GET['action'] == 'tunai_reject') {
        $id_booking = $_GET['id_booking'];
        $statement = $pdo->prepare("UPDATE tbl_pembelian SET status='Ditolak' WHERE id_booking=?");
        $statement->execute(array($id_booking));

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }


    // Kredit
    if ($_GET['action'] == 'kredit_first_accept') {
        $id_booking = $_GET['id_booking'];
        $car_id = $_GET['car_id'];
        $statement = $pdo->prepare("UPDATE tbl_pembelian SET status='Terverifikasi' WHERE id_booking=?");
        $statement2 = $pdo->prepare("UPDATE tbl_credit_items SET status='Completed' WHERE pembelian_id=?");
        $statement3 = $pdo->prepare("UPDATE tbl_car SET availability_status='Terjual' WHERE car_id=?");
        
        $statement->execute(array($id_booking));
        $statement2->execute(array($id_booking));
        $statement3->execute(array($car_id));

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    if ($_GET['action'] == 'kredit_cicilan_accept') {
        $credit_item_id = $_GET['credit_item_id'];
        $statement = $pdo->prepare("UPDATE tbl_credit_items SET status='Completed' WHERE id=?");
        $statement->execute(array($credit_item_id));

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    if ($_GET['action'] == 'kredit_cicilan_reject') {
        $credit_item_id = $_GET['credit_item_id'];
        $statement = $pdo->prepare("UPDATE tbl_credit_items SET status='Reject' WHERE id=?");
        $statement->execute(array($credit_item_id));

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }


    if ($_GET['action'] == 'kredit_reject') {
        $id_booking = $_GET['id_booking'];
        $statement = $pdo->prepare("UPDATE tbl_pembelian SET status='Ditolak' WHERE id_booking=?");
        $statement->execute(array($id_booking));

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

?>