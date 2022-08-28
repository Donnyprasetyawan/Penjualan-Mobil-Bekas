<?php 
include "header.php";
// include "admin/config.php";

$stmt = $pdo->prepare("INSERT INTO tbl_credit 
(nama_mobil, harga_mobil, cicilan, bunga, total_harga, 
lama_cicilan, pembeli_id, down_payment) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->execute(array($_POST['carname'], $_POST['harga_mobil'], $_POST['cicilanfix'], 
$_POST['bunga_fix'], $_POST['total_harga'], $_POST['lama_cicilan'], 
$_POST['pembeli_id'], $_POST['dp']));

$params = array(
    'transaction_details' => array(
        'order_id' => rand(),
        'gross_amount' => $_POST['total_harga'],
    )
);


try {
    // Get Snap Payment Page URL
    $paymentUrl = \Midtrans\Snap::createTransaction($params)->redirect_url;

    // Redirect to Snap Payment Page
    header('Location: ' . $paymentUrl);
} catch (Exception $e) {
    echo $e->getMessage();
}
                                                
exit();

?>