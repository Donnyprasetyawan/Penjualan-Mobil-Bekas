<?php
include 'admin/config.php';

    if ($_GET['action'] == 'cancel') {
        $id_testdrive = $_GET['id_testdrive'];
        $statement = $pdo->prepare("UPDATE tbl_testdrive SET status='Dibatalkan' WHERE id_testdrive=?");
        $statement->execute(array($id_testdrive));

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    if ($_GET['action'] == 'accept') {
        $id_testdrive = $_GET['id_testdrive'];
        $statement = $pdo->prepare("UPDATE tbl_testdrive SET status='Disetujui' WHERE id_testdrive=?");
        $statement->execute(array($id_testdrive));

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

?>