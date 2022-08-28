<?php require_once('header.php'); ?>


<?php
error_reporting(error_reporting() & ~E_NOTICE);

$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
    $banner_car = $row['banner_car'];
}
?>
<?php
$statement = $pdo->prepare("SELECT * FROM tbl_pembeli WHERE pembeli_id=?");
$statement->execute(array($_SESSION['pembeli']['pembeli_id']));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
    $pembeli_id = $row['pembeli_id'];
    $pembeli_name = $row['pembeli_name'];
    $pembeli_email = $row['pembeli_email'];
    $pembeli_phone = $row['pembeli_phone'];
    $pembeli_address = $row['pembeli_address'];
    $pembeli_city = $row['pembeli_city'];
    $pembeli_state = $row['pembeli_state'];
    $pembeli_country = $row['pembeli_country'];
    $pembeli_password = $row['pembeli_password'];
}

$statement2 = $pdo->prepare("SELECT * FROM tbl_booking WHERE pembeli_id=? AND car_id=?");
$statement2->execute(array($pembeli_id, $_GET['id']));
$result = $statement2->fetchAll(PDO::FETCH_ASSOC);
$is_already_booking = $statement2->rowCount();

$statement3 = $pdo->prepare("SELECT * FROM tbl_booking WHERE pembeli_id=? AND car_id=? ORDER BY id_booking DESC LIMIT 1");
$statement3->execute(array($pembeli_id, $_GET['id']));
$result = $statement3->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
    $booking_id = $row['id_booking'];
    $booking_status = $row['status'];
}
?>

<?php
if (!isset($_REQUEST['id'])) {
    header('location: index.php');
    exit;
} else {
    // Check the id is valid or not
    $statement = $pdo->prepare("SELECT * FROM tbl_car WHERE car_id=?");
    $statement->execute(array($_REQUEST['id']));
    $total = $statement->rowCount();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    if ($total == 0) {
        header('location: index.php');
        exit;
    }
}
?>
<?php
foreach ($result as $row) {
    $title = $row['title'];
    $description = $row['description'];
    $address = $row['address'];
    $city = $row['city'];
    $state = $row['state'];
    $zip_code = $row['zip_code'];
    $country = $row['country'];
    $map = $row['map'];
    $car_category_id = $row['car_category_id'];
    $brand_id = $row['brand_id'];
    $model_id = $row['model_id'];
    $body_type_id = $row['body_type_id'];
    $fuel_type_id = $row['fuel_type_id'];
    $transmission_type_id = $row['transmission_type_id'];
    $vin = $row['vin'];
    $car_condition = $row['car_condition'];
    $engine = $row['engine'];
    $engine_size = $row['engine_size'];
    $exterior_color = $row['exterior_color'];
    $interior_color = $row['interior_color'];
    $seat = $row['seat'];
    $door = $row['door'];
    $top_speed = $row['top_speed'];
    $kilometer = $row['kilometer'];
    $mileage = $row['mileage'];
    $year = $row['year'];
    $warranty = $row['warranty'];
    $featured_photo = $row['featured_photo'];
    $regular_price = $row['regular_price'];
    $sale_price = $row['sale_price'];
    $seller_id = $row['seller_id'];
    $availability_status = $row['availability_status'];
}

$statement = $pdo->prepare("SELECT * FROM tbl_car_category WHERE car_category_id=?");
$statement->execute(array($car_category_id));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
$total = $statement->rowCount();
if ($total) {
    foreach ($result as $row) {
        $car_category_name = $row['car_category_name'];
    }
} else {
    $car_category_name = 'Tidak Ditentukan';
}


$statement = $pdo->prepare("SELECT * FROM tbl_brand WHERE brand_id=?");
$statement->execute(array($brand_id));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
$total = $statement->rowCount();
if ($total) {
    foreach ($result as $row) {
        $brand_name = $row['brand_name'];
    }
} else {
    $brand_name = 'Tidak Ditentukan';
}

$statement = $pdo->prepare("SELECT * FROM tbl_model WHERE model_id=?");
$statement->execute(array($model_id));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
$total = $statement->rowCount();
if ($total) {
    foreach ($result as $row) {
        $model_name = $row['model_name'];
    }
} else {
    $model_name = 'Tidak Ditentukan';
}


$statement = $pdo->prepare("SELECT * FROM tbl_body_type WHERE body_type_id=?");
$statement->execute(array($body_type_id));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
$total = $statement->rowCount();
if ($total) {
    foreach ($result as $row) {
        $body_type_name = $row['body_type_name'];
    }
} else {
    $body_type_name = 'Tidak Ditentukan';
}

$statement = $pdo->prepare("SELECT * FROM tbl_fuel_type WHERE fuel_type_id=?");
$statement->execute(array($fuel_type_id));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
$total = $statement->rowCount();
if ($total) {
    foreach ($result as $row) {
        $fuel_type_name = $row['fuel_type_name'];
    }
} else {
    $fuel_type_name = 'Tidak Ditentukan';
}

$statement = $pdo->prepare("SELECT * FROM tbl_transmission_type WHERE transmission_type_id=?");
$statement->execute(array($transmission_type_id));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
$total = $statement->rowCount();
if ($total) {
    foreach ($result as $row) {
        $transmission_type_name = $row['transmission_type_name'];
    }
} else {
    $transmission_type_name = 'Tidak Ditentukan';
}

$statement = $pdo->prepare("SELECT * FROM tbl_seller WHERE seller_id=?");
$statement->execute(array($seller_id));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
    $seller_name = $row['seller_name'];
    $seller_email = $row['seller_email'];
    $seller_phone = $row['seller_phone'];
    $seller_address = $row['seller_address'];
    $seller_city = $row['seller_city'];
    $seller_state = $row['seller_state'];
    $seller_country = $row['seller_country'];
    $seller_password = $row['seller_password'];
}
?>

<div class="banner-slider" style="background-image: url(<?php echo BASE_URL . 'assets/uploads/' . $banner_car; ?>);">
    <div class="bg"></div>
    <div class="bannder-table">
        <div class="banner-text">
            <h1>Detail Mobil</h1>
        </div>
    </div>
</div>

<!--Car Detail Start-->
<div class="car-detail bg-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div class="car-detail-mainbar">
                    <div class="car-detail-name">
                        <h2><?php echo $title; ?> <?php echo ($availability_status != 'Tersedia') ? '('.$availability_status.')' : ''; ?></h2>
                        <div class="car-detail-price">
                            <p>
                                <?php if ($regular_price == $sale_price): ?>
                                <?php echo $sale_price; ?> JT
                                <?php else: ?>
                                <del><?php echo $regular_price; ?> JT</del> <?php echo $sale_price; ?> JT
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>

                    <div class="car-detail-gallery owl-carousel">
                        <div class="car-detail-photo"
                            style="background-image: url(<?php echo BASE_URL; ?>assets/uploads/cars/<?php echo $featured_photo; ?>)">
                            <div class="lightbox-item">
                                <a href="<?php echo BASE_URL; ?>assets/uploads/cars/<?php echo $featured_photo; ?>"
                                    data-lightbox="lightbox-item"><i class="fa fa-search-plus"></i></a>
                            </div>
                        </div>
                        <?php
                            $statement = $pdo->prepare("SELECT * FROM tbl_car_photo WHERE car_id=?");
                            $statement->execute(array($_REQUEST['id']));
                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($result as $row) {
                                ?>
                        <div class="car-detail-photo"
                            style="background-image: url(<?php echo BASE_URL; ?>assets/uploads/other-cars/<?php echo $row['photo']; ?>)">
                            <div class="lightbox-item">
                                <a href="<?php echo BASE_URL; ?>assets/uploads/other-cars/<?php echo $row['photo']; ?>"
                                    data-lightbox="lightbox-item"><i class="fa fa-search-plus"></i></a>
                            </div>
                        </div>
                        <?php
                            }
                            ?>

                    </div>

                    <div class="car-info-tab">

                        <ul class="car-main-tab">
                            <li class="active"><a href="#seller_description" data-toggle="tab"
                                    aria-expanded="true">Deskripsi</a>
                            </li>
                            <li class=""><a href="#seller_contact" data-toggle="tab" aria-expanded="false">Kontak
                                    Penjual</a></li>
                            <?php if($availability_status != 'Terjual'): ?>
                            <li class=""><a href="#test_drive" data-toggle="tab" aria-expanded="false">Test
                                    Drive</a></li>
                            <?php if($availability_status != 'Terbooking'): ?>
                            <li class=""><a href="#booking" data-toggle="tab" aria-expanded="false">Booking</a></li>
                            <?php endif; ?>
                            <li class=""><a href="#beli" data-toggle="tab" aria-expanded="false">Beli Mobil</a></li>
                            <?php endif; ?>
                        </ul>

                        <div class="tab-content car-content">

                            <div class="tab-pane active" id="seller_description">
                                <div class="car-tab-text">
                                    <h2>Deskripsi Penjual</h2>
                                    <div class="car-tab-pre">
                                        <p>
                                            <?php if ($description != ''): ?>
                                            <?php echo nl2br($description); ?>
                                            <?php else: ?>
                                            No Description Found.
                                            <?php endif; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="seller_contact">
                                <div class="car-tab-text">
                                    <h2>Informasi Kontak</h2>
                                    <div class="car-tab-pre">
                                        <p>
                                            Address: <?php echo $seller_address; ?><br>
                                            Phone: <a
                                                href="http://wa.me/<?php echo $seller_phone; ?>"><?php echo $seller_phone; ?></a>
                                            <br>
                                            Email: <?php echo $seller_email; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="test_drive">
                                <div class="car-tab-text">
                                    <h2>Ajukan Test Drive</h2>
                                    <?php if(isset($_SESSION['pembeli'])): ?>
                                    <div class="car-tab-pre">
                                        <?php if($is_already_booking > 0): ?>
                                            <?php if($booking_status == 'Terverifikasi'): ?>
                                            <p>
                                                <?php
                                                    if (isset($_POST['testdrive'])) {
                                                        $valid = 1;
                                                        if (empty($_POST['pembeli_id'])) {
                                                        }
                                                        if (empty($_POST['mobil'])) {
                                                        }
                                                        if (empty($_POST['penjual'])) {
                                                        }
                                                        if (empty($_POST['lokasi'])) {
                                                            $valid = 0;
                                                            $error_message .= "Lokasi Tidak Boleh Kosong.<br>";
                                                        }
                                                        if (empty($_POST['buyer'])) {
                                                        }
                                                        if (empty($_POST['nope'])) {
                                                        }
                                                        if (empty($_POST['email'])) {
                                                        }
                                                        if (empty($_POST['alamat'])) {
                                                            $valid = 0;
                                                            $error_message .= "Alamat Tidak Boleh Kosong.<br>";
                                                        }
                                                        if (empty($_POST['tanggal'])) {
                                                            $valid = 0;
                                                            $error_message .= "Tanggal Tidak Boleh Kosong.<br>";
                                                        }
                                                        if ($valid == 1) {

                                                            // saving into the database
                                                            $statement = $pdo->prepare("INSERT INTO tbl_testdrive (pembeli_id,pengaju,nope,email,
                                                                                        tanggal,penjual,lokasi,mobil,alamat) VALUES (?,?,?,?,?,?,?,?,?)");
                                                            $statement->execute(array($_POST['pembeli_id'], $_POST['buyer'],
                                                                $_POST['nope'], $_POST['email'], $_POST['tanggal'], $_POST['penjual'],
                                                                $_POST['lokasi'], $_POST['mobil'], $_POST['alamat']));

                                                            $success_message .= 'Sip,pengajuan test drive sedang menunggu konfirmasi.';
                                                        }
                                                    }
                                                ?>

                                                <?php if ($success_message): ?>
                                                <div class="callout callout-success">

                                                    <p><?php echo "<script> alert('" . $success_message . "') </script>"; ?>
                                                    </p>
                                                </div>
                                                <?php endif; ?>

                                                <form class="form-horizontal" action="" method="post">
                                                    <div class="box box-info">
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <input style="display:none;" type="text"
                                                                    class="form-control" name="buyer"
                                                                    placeholder="<?php echo $pembeli_name; ?>"
                                                                    value="<?php echo $pembeli_name; ?>">
                                                                <input style="display:none;" type="text"
                                                                    class="form-control" name="nope"
                                                                    placeholder="<?php echo $pembeli_phone; ?>"
                                                                    value="<?php echo $pembeli_phone; ?>">
                                                                <input style="display:none;" type="text"
                                                                    class="form-control" name="email"
                                                                    placeholder="<?php echo $pembeli_email; ?>"
                                                                    value="<?php echo $pembeli_email; ?>">
                                                                <input style="display:none;" type="text"
                                                                    class="form-control" name="penjual"
                                                                    placeholder="<?php echo $seller_id; ?>"
                                                                    value="<?php echo $seller_id; ?>">
                                                                <input style="display:none;" type="text"
                                                                    class="form-control" name="pembeli_id"
                                                                    placeholder="<?php echo $pembeli_id; ?>"
                                                                    value="<?php echo $pembeli_id; ?>">

                                                                <div class="form-group">
                                                                    <label for=""
                                                                        class="col-sm-2 control-label">Mobil<span>*</span></label>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control" name="mobil"
                                                                            placeholder="<?php echo $title; ?>"
                                                                            value="<?php echo $title; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for=""
                                                                        class="col-sm-2 control-label">Lokasi<span>*</span></label>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control"
                                                                            name="lokasi" autocomplete="off" required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="" class="col-sm-2 control-label">Tanggal
                                                                        <span>*</span></label>
                                                                    <div class="col-sm-4">
                                                                        <input type="date" class="form-control"
                                                                            name="tanggal" autocomplete="off" required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="" class="col-sm-2 control-label">Alamat
                                                                        <span>*</span></label>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control"
                                                                            name="alamat" autocomplete="off" required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="" class="col-sm-2 control-label"></label>
                                                                    <div class="col-sm-6">
                                                                        <button type="submit"
                                                                            class="btn btn-success pull-left"
                                                                            name="testdrive">Ajukan Sekarang
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </p>
                                            <?php else: ?>
                                                <?php if($booking_status == 'Menunggu Konfirmasi'): ?>
                                                    <div class="callout callout-danger">
                                                        <div class="error">Booking sedang ditinjau, silahkan menunggu konfirmasi</div>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="callout callout-danger">
                                                        <div class="error">Booking ditolak, silahkan mengajukan booking kembali!</div>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <div class="callout callout-danger">
                                                <div class="error">Anda harus mem-booking terlebih dahulu untuk test drive!</div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <?php else: ?>
                                    <div class="callout callout-danger">
                                        <div class="error">Silahkan Login Terlebih Dahulu. <a
                                                href="<?php echo BASE_URL; ?>login.php"
                                                style="color:red;text-decoration:underline;">klik Disini</a> Untuk
                                            Login.
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="tab-pane" id="booking">
                                <div class="car-tab-text">
                                    <h2>Booking Mobil Ini</h2>
                                    <?php if(isset($_SESSION['pembeli'])): ?>
                                    <div class="car-tab-pre">
                                        <p>
                                            <?php
                                                if (isset($_POST['booking'])) {
                                                    $valid = 1;
                                                    if (empty($_POST['pembooking'])) {
                                                    }
                                                    if (empty($_POST['pembeli_id'])) {
                                                    }
                                                    if (empty($_POST['nope'])) {
                                                    }
                                                    if (empty($_POST['email'])) {
                                                    }
                                                    if (empty($_POST['penjual'])) {
                                                    }
                                                    if (empty($_POST['mobil'])) {
                                                    }
    
                                                    // if (empty($_POST['metode'])) {
                                                    //     $valid = 0;
                                                    //     $error_message .= "Metode Wajib Diisi.<br>";
                                                    // }
    
                                                    if (empty($_POST['lama'])) {
                                                        $valid = 0;
                                                        $error_message .= "Lama Booking Wajib Diisi.<br>";
                                                    }
                                                    // if (empty($_POST['bukti_pembayaran'])) {
                                                    //     $valid = 0;
                                                    //     $error_message .= "Bukti pembayaran wajib diisi.<br>";
                                                    // }
                                                    if ($valid == 1) {
                                                        $file_name = $_FILES['bukti_pembayaran']['name'];
                                                        $temp_name = $_FILES['bukti_pembayaran']['tmp_name'];
                                                        $dir_bukti_pembayaran = "uploads/bukti_pembayaran/";
                                                        $path_bukti_pembayaran = $dir_bukti_pembayaran . time() . '_' . $file_name;
                                                        $upload_bukti_pembayaran = move_uploaded_file($temp_name, $path_bukti_pembayaran);
    
                                                        if ($upload_bukti_pembayaran) {
                                                            // saving into the database
                                                            $statement = $pdo->prepare("INSERT INTO tbl_booking (pembeli_id,pembayaran,pembooking,nope,email,penjual,car_id,mobil,nama_bank,lama_cicil,lama_book,bukti_pembayaran) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
                                                            $statement->execute(array($_POST['pembeli_id'], 'Manual', $_POST['pembooking'], $_POST['nope'], $_POST['email'], $_POST['penjual'], $_POST['car_id'], $_POST['mobil'], $_POST['nama_bank'],'-', $_POST['lama'], $path_bukti_pembayaran));
    
                                                            header('Location: ' . $_SERVER['HTTP_REFERER']);
                                                        }
    
                                                        // $params = array(
                                                        //     'transaction_details' => array(
                                                        //         'order_id' => rand(),
                                                        //         'gross_amount' => 10000,
                                                        //     )
                                                        // );
    
                                                        // try {
                                                        //     // Get Snap Payment Page URL
                                                        //     $paymentUrl = \Midtrans\Snap::createTransaction($params)->redirect_url;
    
                                                        //     // Redirect to Snap Payment Page
                                                        //     header('Location: ' . $paymentUrl);
                                                        // } catch (Exception $e) {
                                                        //     echo $e->getMessage();
                                                        // }
                                                    }
                                                }
                                                ?>

                                            <?php
                                                $allowed = 1; // Sebelumnya = 0, tapi jika 0 booking dan beli tidak bisa
                                                $today = date('Y-m-d');
                                                $statement = $pdo->prepare("SELECT * 
                                                                        FROM tbl_payment_pembeli
                                                                        WHERE pembeli_id=? AND payment_status=?
                                                                    ");
                                                $statement->execute(array($_SESSION['pembeli']['pembeli_id'], 'Completed'));
                                                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                                foreach ($result as $row) {
                                                    if (($today >= $row['payment_date']) && ($today <= $row['expire_date'])) {
                                                        $allowed = 1;
                                                    }
                                                }
                                                ?>

                                            <?php
                                                if ($error_message != '') {
                                                    echo "<script>alert('" . $error_message . "')</script>";
                                                }
    
                                                ?>
                                            <?php if ($allowed == 0): ?>
                                            <div class="error">Form Booking Mobil Akan Muncul Setelah Anda Melakukan
                                                Pembayaran Uang Muka. <a href="<?php echo BASE_URL; ?>payment.php"
                                                    style="color:red;text-decoration:underline;">klik
                                                    Disini</a> Untuk Melakukan Pembayaran.
                                            </div>
                                            <?php else: ?>
                                            
                                            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                                <div class="box box-info">
                                                    <div style="margin-left:180px;" class="box-body">

                                                        <input style="display:none;" type="text" class="form-control"
                                                            name="pembooking" placeholder="<?php echo $pembeli_name; ?>"
                                                            value="<?php echo $pembeli_name; ?>">
                                                        <input style="display:none;" type="text" class="form-control"
                                                            name="nope" placeholder="<?php echo $pembeli_phone; ?>"
                                                            value="<?php echo $pembeli_phone; ?>">
                                                        <input style="display:none;" type="text" class="form-control"
                                                            name="email" placeholder="<?php echo $pembeli_email; ?>"
                                                            value="<?php echo $pembeli_email; ?>">
                                                        <input style="display:none;" type="text" class="form-control"
                                                            name="penjual" placeholder="<?php echo $seller_id; ?>"
                                                            value="<?php echo $seller_id; ?>">
                                                        <input style="display:none;" type="text" class="form-control"
                                                            name="pembeli_id" placeholder="<?php echo $pembeli_id; ?>"
                                                            value="<?php echo $pembeli_id; ?>">
                                                        <input type="hidden" name="car_id" value="<?php echo $_GET['id']; ?>">

                                                        <div style="display:flex;flex-direction:column;width:1000px;"
                                                            class="form-group">
                                                            <label for="" style="text-align:center;"
                                                                class="col-md-4 control-label">Nama Mobil
                                                                <span>*</span></label>
                                                            <div class="col-sm-4">
                                                                <input readonly autocomplete="off" type="text"
                                                                    class="form-control" name="mobil"
                                                                    placeholder="<?php echo $title; ?>"
                                                                    value="<?php echo $title; ?>">
                                                            </div>
                                                        </div>

                                                        <div style="display:flex;flex-direction:column;width:1000px;"
                                                            class="form-group">
                                                            <label for="" style="text-align:center;"
                                                                class="col-md-4 control-label">Lama
                                                                Booking<span> *</span></label>
                                                            <div class="col-sm-4">
                                                                <select class="form-control select2" name="lama">
                                                                    <option value="">Pilih Lama Booking</option>
                                                                    <?php
                                                                    $statement = $pdo->prepare("SELECT * FROM tbl_waktu_booking ORDER BY lama_booking ASC");
                                                                    $statement->execute();
                                                                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                                                    foreach ($result as $row) {
                                                                        echo '<option value="' . $row['lama_booking'] . '">' . $row['lama_booking'] . '</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <!-- <label for="" style="text-align:center;"
                                                                class="col-md-4 control-label">Metode Pembayaran
                                                                <span>*</span></label>
                                                            <div class="col-sm-4">
                                                                <select class="form-control select2" name="metode">
                                                                    <option value="">Pilih Metode</option>
                                                                    <?php
                                                                    // $statement = $pdo->prepare("SELECT * FROM tbl_metode ORDER BY me_pembayaran ASC");
                                                                    // $statement->execute();
                                                                    // $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                                                    // foreach ($result as $row) {
                                                                    //     echo '<option value="' . $row['me_pembayaran'] . '">' . $row['me_pembayaran'] . '</option>';
                                                                    // }
                                                                    ?>
                                                                </select>
                                                            </div> -->
                                                        </div>

                                                        <div style="display:flex;flex-direction:column;width:1000px;" class="form-group">
                                                            <label style="text-align:center;" class="col-md-4 control-label">Nama Bank *</label>
                                                            <div class="col-sm-4">
                                                                <div class="input-group">
                                                                    <select data-placeholder="Pilih Item ..." class="form-control" name="nama_bank">
                                                                        <?php
                                                                            $statement = $pdo->prepare("SELECT * FROM tbl_bank ORDER BY nama_bank ASC");
                                                                            $statement->execute();
                                                                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                                                            foreach ($result as $row) {
                                                                        ?>
                                                                        <option value="<?php echo $row['nama_bank']; ?>" <?php if($row['nama_bank'] == $nambank){echo 'selected';} ?>><?php echo $row['nama_bank']; ?></option>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div style="display:flex;flex-direction:column;width:1000px;"
                                                            class="form-group">
                                                            <label for="" style="text-align:center;"
                                                                class="col-md-4 control-label">Bukti Pembayaran<span> *</span></label>
                                                            <div class="col-sm-4">
                                                                <div class="input-group mb-3">
                                                                    <input type="file" class="form-control" name="bukti_pembayaran" id="bukti_pembayaran" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="mb-3">
                                                            <b>Note: </b>Harga booking adalah Rp. 3.000.000,-
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="" class="col-sm-2 control-label"></label>
                                                            <div class="col-sm-6">
                                                                <button type="submit" class="btn btn-success pull-left"
                                                                    name="booking">Booking Sekarang
                                                                </button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </form><?php endif; ?>
                                        </p>
                                    </div>
                                    <?php else: ?>
                                    <div class="callout callout-danger">
                                        <div class="error">Silahkan Login Terlebih Dahulu. <a
                                                href="<?php echo BASE_URL; ?>login.php"
                                                style="color:red;text-decoration:underline;">klik Disini</a> Untuk
                                            Login.
                                        </div>
                                    </div>
                                    <?php endif ?>
                                </div>
                            </div>

                            <div class="tab-pane" id="beli">
                                <div class="car-tab-text">
                                    <h2>Beli Mobil Ini</h2>
                                    <?php if ($allowed == 0): ?>
                                    <div class="error">Silahkan Login Terlebih Dahulu. <a
                                            href="<?php echo BASE_URL; ?>payment.php"
                                            style="color:red;text-decoration:underline;">klik Disini</a> Untuk
                                        Login.
                                    </div>
                                    <?php else: ?>
                                    <div class="box box-info">
                                        <div class="box-body">
                                            <div style="padding: 8px; border: 1px solid #e3e3e3;">
                                                <?php
                                                    // Disini isinin input pembelian ke database
                                                    // kalo ini udah berhasil. uncomment yang di bawah ini
                                                    if(isset($_POST['buy_car'])){
                                                        $stmt = $pdo->prepare("INSERT INTO tbl_tunai (id_pembeli, total_bayar) VALUES (?, ?)");

                                                        $file_name_tunai = $_FILES['bukti_pembayaran_tunai']['name'];
                                                        $temp_name_tunai = $_FILES['bukti_pembayaran_tunai']['tmp_name'];
                                                        $dir_bukti_pembayaran_tunai = "uploads/bukti_pembayaran/";
                                                        $path_bukti_pembayaran_tunai = $dir_bukti_pembayaran_tunai . time() . '_' . $file_name_tunai;
                                                        $upload_bukti_pembayaran_tunai = move_uploaded_file($temp_name_tunai, $path_bukti_pembayaran_tunai);
                                                        
                                                        $stmt2 = $pdo->prepare("INSERT INTO tbl_pembelian (pembeli_id,pembayaran,pembooking,nope,email,penjual,car_id,mobil,nama_bank,lama_cicil,bukti_pembayaran) VALUES (?,?,?,?,?,?,?,?,?,?,?)");

                                                        $stmt->execute(array($pembeli_id, $_POST['buy_car']));
                                                        $stmt2->execute(array($pembeli_id,'Tunai',$pembeli_name,$pembeli_phone,$pembeli_email,$seller_id,$_POST['car_id'],$title,$_POST['nama_bank'],'0 Tahun',$path_bukti_pembayaran_tunai));

                                                        header('Location: ' . $_SERVER['HTTP_REFERER']);
                                                        
                                                        // $params = array(
                                                        //     'transaction_details' => array(
                                                        //         'order_id' => rand(),
                                                        //         'gross_amount' => $_POST['buy_car'],
                                                        //     )
                                                        // );
                                                        
                                                        // try {
                                                        //     // Get Snap Payment Page URL
                                                        //     $paymentUrl = \Midtrans\Snap::createTransaction($params)->redirect_url;
                                                        
                                                        //     // Redirect to Snap Payment Page
                                                        //     header('Location: ' . $paymentUrl);
                                                        // } catch (Exception $e) {
                                                        //     echo $e->getMessage();
                                                        // }
                                                        // exit();
                                                    }
    
                                                ?>
                                                <div class="form-horizontal">
                                                    <h4>Bayar Tunai</h4>
                                                    <p>Kamu bisa melakukan pembayaran tunai secara online. Dan Mobil dapat kamu ambil atau kami antar.</p>
                                                    <div class="text-right">
                                                        <!-- <button type="submit" class="btn btn-success">Proses</button> -->
                                                        <button type="button" class="btn btn-primary" onclick="prosesBayarTunai()">
                                                            Proses
                                                        </button>
                                                    </div>
                                                    <div class="hidden flex-column" id="prosesBayarTunai">
                                                        <form action="" method="post" enctype="multipart/form-data">
                                                            <input type="hidden" name="car_id" value="<?php echo $_GET['id']; ?>">
                                                            <input type="hidden" name="buy_car" value="<?= $sale_price . "000000" ?>" />
                                                            <div class="mb-3">
                                                                <label for="">Nama Bank *</label>
                                                                <select data-placeholder="Pilih Item ..." class="form-control" name="nama_bank">
                                                                    <?php
                                                                        $statement = $pdo->prepare("SELECT * FROM tbl_bank ORDER BY nama_bank ASC");
                                                                        $statement->execute();
                                                                        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                                                        foreach ($result as $row) {
                                                                    ?>
                                                                    <option value="<?php echo $row['nama_bank']; ?>" <?php if($row['nama_bank'] == $nambank){echo 'selected';} ?>><?php echo $row['nama_bank']; ?></option>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="">Bukti Pembayaran  *</label>
                                                                <div class="input-group mb-3">
                                                                    <input type="file" class="form-control" name="bukti_pembayaran_tunai" id="bukti_pembayaran_tunai" required>
                                                                </div>
                                                            </div>
                                                            <button type="submit" class="btn btn-success">Bayar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br />
                                        <div class="box-body">
                                            <?php
                                                // Cek kelayakan buatin kalkuratorkayak referensinya itu
                                                // Abistu sama checkout kayak yang di atas
                                            ?>

                                            <?php

                                                if (isset($_POST['bayar_kredit'])) {
                                                    $file_name_kredit = $_FILES['bukti_pembayaran_kredit']['name'];
                                                    $temp_name_kredit = $_FILES['bukti_pembayaran_kredit']['tmp_name'];
                                                    $dir_bukti_pembayaran_kredit = "uploads/bukti_pembayaran/";
                                                    $path_bukti_pembayaran_kredit = $dir_bukti_pembayaran_kredit . time() . '_' . $file_name_kredit;
                                                    $upload_bukti_pembayaran_kredit = move_uploaded_file($temp_name_kredit, $path_bukti_pembayaran_kredit);

                                                    $stmt2 = $pdo->prepare("INSERT INTO tbl_pembelian (pembeli_id,pembayaran,pembooking,nope,email,penjual,car_id,mobil,nama_bank,lama_cicil,bukti_pembayaran) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
                                                    $stmt2->execute(array($pembeli_id,'Kredit',$pembeli_name,$pembeli_phone,$pembeli_email,$seller_id,$_POST['car_id'],$title,$_POST['nama_bank'],$_POST['lama_cicilan'].' Bulan',$path_bukti_pembayaran_kredit));
    

                                                    $stmt = $pdo->prepare("INSERT INTO tbl_credit 
                                                    (pembelian_id, nama_mobil, harga_mobil, cicilan, bunga, total_harga, 
                                                    lama_cicilan, pembeli_id, down_payment) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

                                                    $pembelian_id = $pdo->lastInsertId();
                                                    $stmt->execute(array(
                                                        $pembelian_id, $_POST['carname'], $_POST['harga_mobil'],
                                                        $_POST['cicilanfix'], $_POST['bunga_fix'], $_POST['total_harga'],
                                                        $_POST['lama_cicilan'], $_POST['pembeli_id'], $_POST['dp']
                                                    ));


                                                    $credit_item = $pdo->prepare("INSERT INTO tbl_credit_items
                                                        (credit_id, pembelian_id, nominal, nama_bank, bukti_pembayaran) VALUES (?, ?, ?, ?, ?)");
                                                    
                                                    $credit_id = $pdo->lastInsertId();
                                                    $credit_item->execute(array(
                                                        $credit_id, $pembelian_id, $_POST['dp'], $_POST['nama_bank'], $path_bukti_pembayaran_kredit
                                                    ));


                                                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                                                }

                                            ?>

                                            <div style="padding: 8px; border: 1px solid #e3e3e3;">
                                                <h4>Bayar Kredit</h4>
                                                <p>Untuk pembelian kredit ini kamu harus melakukan pembayaran Total
                                                    Down Payment (TDP) secara online. Dan untuk proses pengajuan
                                                    kredit dapat dilakukan dengan online.</p>
                                                <div class="text-right">
                                                    <button type="button" class="btn btn-success"
                                                        onclick="cekKelayakan()">Cek Kelayakan
                                                        Kredit
                                                    </button>
                                                </div>

                                                <form action="" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="bayar_kredit">
                                                <input type="hidden" name="car_id" value="<?php echo $_GET['id']; ?>">
                                                <div class="hidden flex-column" id="cekkredit">
                                                    <div class="fw-semibold fs-2 mb-2">Harga Unit</div>
                                                        <div class="d-flex flex-column">
                                                            <div class="fs-2 fw-semibold">Rp.</div>
                                                            <input type="text" class="form-control" id="harga_mobil" value="<?= $sale_price . "000000" ?>">
                                                        </div>

                                                        <div class="row p-2">
                                                            <div class="mb-3 col">
                                                                <label for="exampleInputEmail1" class="form-label">Down
                                                                    Payment(Rp.)</label>
                                                                <input type="text" name="dp" class="form-control"
                                                                    id="dp" aria-describedby="emailHelp"
                                                                    onchange="getDepe()">
                                                            </div>
                                                            <div class="mb-3 col">
                                                                <label for="exampleInputPassword1"
                                                                    class="form-label">%dari Total Harga</label>
                                                                <input type="text" class="form-control" id="persen"
                                                                    onchange="getPersen()">
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Tenor (Bulan) *</label>
                                                            <select class="form-select" name="lama_cicilan" id="tenor"
                                                                aria-label="Default select example" onchange="getTenor()">
                                                                <option selected>Tenor bulan</option>
                                                                <option value="12">12 bulan</option>
                                                                <option value="24">24 bulan</option>
                                                            </select>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="">Nama Bank *</label>
                                                            <select class="form-control" name="nama_bank">
                                                                <option selected>Pilih Bank</option>
                                                                <?php
                                                                    $statement = $pdo->prepare("SELECT * FROM tbl_bank ORDER BY nama_bank ASC");
                                                                    $statement->execute();
                                                                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                                                    foreach ($result as $row) {
                                                                ?>
                                                                <option value="<?php echo $row['nama_bank']; ?>" <?php if($row['nama_bank'] == $nambank){echo 'selected';} ?>><?php echo $row['nama_bank']; ?></option>
                                                                <?php
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="">Bukti Pembayaran  *</label>
                                                            <div class="input-group mb-3">
                                                                <input type="file" class="form-control" name="bukti_pembayaran_kredit" id="bukti_pembayaran_kredit" required>
                                                            </div>
                                                        </div>


                                                        <div class="d-flex flex-column">
                                                            <input hidden type="text" id="car_harga" name="harga_mobil"
                                                                value="<?= $sale_price . "000000" ?>">
                                                            <input hidden type="text" id="car_name" name="carname"
                                                                value="<?php echo $title ?>">
                                                            <input hidden type="text" name="pembeli_id"
                                                                value="<?php echo $pembeli_id ?>">
                                                            <input hidden type="text" id="bungafix" name="bunga_fix">
                                                            <input hidden type="text" id="cicilan_fix"
                                                                name="cicilanfix">
                                                            <input hidden type="text" id="car_total" name="total_harga">
                                                        </div>

                                                        <hr>
                                                        <div class="card mb-2">
                                                            <div class="card-header d-flex justify-content-between">
                                                                <div class=" fs-2 fw-semibold "><?php echo $title ?></div>
                                                                <div class="">Rp. <?= $sale_price . "000000" ?></div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="d-flex justify-content-between">
                                                                    <div>Down Payment (<span id="bunga"></span>%)
                                                                </div>
                                                                <div>Rp. <span id="downpay"></span></div>
                                                            </div>
                                                            <div class="d-flex justify-content-between">
                                                                <div>Cicilan bulanan</div>
                                                                <div>Rp. <span id="cicilan"></span></div>
                                                            </div>
                                                            <div class="d-flex justify-content-between">
                                                                <div>Total bayar</div>
                                                                <div>Rp. <span id="total"></span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-success">Simpan</button>
                                                </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="col-md-4 col-sm-12">
    <div class="car-detail-sidebar">
        <div class="detail-item car-detail-list">
            <h3>Detail Mobil</h3>
            <table>
                <tbody>
                    <tr>
                        <td><span>Kategori</span></td>
                        <td><?php echo $car_category_name; ?></td>
                    </tr>
                    <tr>
                        <td><span>Merek</span></td>
                        <td><?php echo $brand_name; ?></td>
                    </tr>
                    <tr>
                        <td><span>Model</span></td>
                        <td><?php echo $model_name; ?></td>
                    </tr>
                    <tr>
                        <td><span>Jenis Body</span></td>
                        <td><?php echo $body_type_name; ?></td>
                    </tr>
                    <tr>
                        <td><span>Jenis Bahan Bakar</span></td>
                        <td><?php echo $fuel_type_name; ?></td>
                    </tr>
                    <tr>
                        <td><span>Jenis Transmisi</span></td>
                        <td><?php echo $transmission_type_name; ?></td>
                    </tr>
                    <tr>
                        <td><span>VIN</span></td>
                        <td>
                            <?php if ($vin != ''): ?>
                            <?php echo $vin; ?>
                            <?php else: ?>
                            Tidak Ditentukan
                            <?php endif; ?>
                        </td>
                    </tr>
                    <!--<tr>
                        <td><span>Kondisi</span></td>
                        <td><?php //echo $car_condition; ?></td>
                    </tr>-->
                    <tr>
                        <td><span>Mesin</span></td>
                        <td>
                            <?php if ($engine != ''): ?>
                            <?php echo $engine; ?>
                            <?php else: ?>
                            Tidak Ditentukan
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><span>Engine Size</span></td>
                        <td>
                            <?php if ($engine_size != ''): ?>
                            <?php echo $engine_size; ?>
                            <?php else: ?>
                            Tidak Ditentukan
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><span>Warna Exterior</span></td>
                        <td>
                            <?php if ($exterior_color != ''): ?>
                            <?php echo $exterior_color; ?>
                            <?php else: ?>
                            Tidak Ditentukan
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><span>Warna Interior</span></td>
                        <td>
                            <?php if ($interior_color != ''): ?>
                            <?php echo $interior_color; ?>
                            <?php else: ?>
                            Tidak Ditentukan
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><span>Jumlah Tempat Duduk</span></td>
                        <td>
                            <?php if ($seat != ''): ?>
                            <?php echo $seat; ?>
                            <?php else: ?>
                            Tidak Ditentukan
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><span>Jumlah Pintu</span></td>
                        <td>
                            <?php if ($door != ''): ?>
                            <?php echo $door; ?>
                            <?php else: ?>
                            Tidak Ditentukan
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><span>Kecepatan Tertinggi</span></td>
                        <td>
                            <?php if ($top_speed != ''): ?>
                            <?php echo $top_speed; ?>
                            <?php else: ?>
                            Tidak Ditentukan
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><span>Kilometer</span></td>
                        <td>
                            <?php if ($kilometer != ''): ?>
                            <?php echo $kilometer; ?>
                            <?php else: ?>
                            Tidak Ditentukan
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><span>Jarak Tempuh</span></td>
                        <td>
                            <?php if ($mileage != ''): ?>
                            <?php echo $mileage; ?>
                            <?php else: ?>
                            Tidak Ditentukan
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><span>Tahun</span></td>
                        <td>
                            <?php if ($year != 0): ?>
                            <?php echo $year; ?>
                            <?php else: ?>
                            Tidak Ditentukan
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><span>Garansi</span></td>
                        <td>
                            <?php if ($warranty != ''): ?>
                            <?php echo $warranty; ?>
                            <?php else: ?>
                            Tidak Ditentukan
                            <?php endif; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>


    </div>
</div>
</div>


<!-- Related Cars -->
<div class="related-ads">
    <div class="related-ads-headline">
        <h2>Mobil Terkait</h2>
    </div>
    <?php
                $statement = $pdo->prepare("SELECT * FROM tbl_car WHERE brand_id=? AND car_id!=?");
                $statement->execute(array($brand_id, $_REQUEST['id']));
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                $total = $statement->rowCount();
                if ($total):
                    foreach ($result as $row) {
                        ?>
    <div class="row listing-item">
        <div class="col-md-4 col-sm-4 listing-photo"
            style="background-image: url(<?php echo BASE_URL; ?>assets/uploads/cars/<?php echo $row['featured_photo']; ?>)">
        </div>

        <div class="col-md-4 col-sm-4 listing-text">
            <h2><?php echo $row['title']; ?></h2>
            <?php
                                $statement1 = $pdo->prepare("SELECT * FROM tbl_car_category WHERE car_category_id=?");
                                $statement1->execute(array($row['car_category_id']));
                                $tot = $statement1->rowCount();
                                $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($result1 as $row1) {
                                    $car_category_name = $row1['car_category_name'];
                                }
                                ?>
            <ul>
                <li>Jenis: <span><?php if ($tot != '') {
                                                echo $car_category_name;
                                            } else {
                                                echo 'Tidak Ditentukan';
                                            } ?></span></li>
                <li>Jarak Tempuh: <span><?php if ($row['mileage'] != '') {
                                                echo $row['mileage'];
                                            } else {
                                                echo 'Tidak Ditentukan';
                                            } ?></span></li>
                <li>Tahun: <span><?php if ($row['year'] != 0) {
                                                echo $row['year'];
                                            } else {
                                                echo 'Tidak Ditentukan';
                                            } ?></span></li>
            </ul>
        </div>
        <div class="col-md-4 col-sm-4 listing-price">
            <h2>
                <?php if ($row['regular_price'] != $row['sale_price']): ?>
                <del><?php echo $row['regular_price']; ?> JT</del>
                <?php echo $row['sale_price']; ?> JT
                <?php else: ?>
                <?php echo $row['sale_price']; ?> JT
                <?php endif; ?>
            </h2>
            <a href="<?php echo BASE_URL . URL_CAR . $row['car_id']; ?>">View Detail</a>
        </div>

    </div>
    <?php
                    }
                else:
                    echo '<div class="listing-item">No Result Found</div>';
                endif;
                ?>
</div>
</div>
</div>
</div>
</div>
<!--Car Detail End-->


<div class="modal fade" id="modalBeliTunai" tabindex="-1" aria-labelledby="modalBeliTunaiLabel" aria-hidden="true">
    <form action="" method="post">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalBeliTunaiLabel">Pilih Bank</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="buy_car" value="<?= $sale_price . "000000" ?>" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Proses</button>
                </div>
            </div>
        </div>
    </form>
</div>

<?php require_once('footer.php'); ?>