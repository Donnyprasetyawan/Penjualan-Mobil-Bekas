<?php require_once('header.php'); 
error_reporting(0);
?>



<?php
	$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
	$statement->execute();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
	foreach ($result as $row) 
	{
		$banner_car = $row['banner_car'];
	}
?>

<?php
if(!isset($_REQUEST['id'])) {
	header('location: index.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM tbl_car WHERE car_id=?");
	$statement->execute(array($_REQUEST['id']));
	$total = $statement->rowCount();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	if( $total == 0 ) {
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
}

$statement = $pdo->prepare("SELECT * FROM tbl_car_category WHERE car_category_id=?");
$statement->execute(array($car_category_id));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
$total = $statement->rowCount();
if($total) {
	foreach ($result as $row) {
		$car_category_name = $row['car_category_name'];
	}
} else {
	$car_category_name = 'Not Specified';
}						


$statement = $pdo->prepare("SELECT * FROM tbl_brand WHERE brand_id=?");
$statement->execute(array($brand_id));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
$total = $statement->rowCount();
if($total) {
	foreach ($result as $row) {
		$brand_name = $row['brand_name'];
	}
} else {
	$brand_name = 'Not Specified';
}

$statement = $pdo->prepare("SELECT * FROM tbl_model WHERE model_id=?");
$statement->execute(array($model_id));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
$total = $statement->rowCount();
if($total) {
	foreach ($result as $row) {
		$model_name = $row['model_name'];
	}
} else {
	$model_name = 'Not Specified';
}

$statement = $pdo->prepare("SELECT * FROM tbl_body_type WHERE body_type_id=?");
$statement->execute(array($body_type_id));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
$total = $statement->rowCount();
if($total) {
	foreach ($result as $row) {
		$body_type_name = $row['body_type_name'];
	}
} else {
	$body_type_name = 'Not Specified';
}

$statement = $pdo->prepare("SELECT * FROM tbl_fuel_type WHERE fuel_type_id=?");
$statement->execute(array($fuel_type_id));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
$total = $statement->rowCount();
if($total) {
	foreach ($result as $row) {
		$fuel_type_name = $row['fuel_type_name'];
	}
} else {
	$fuel_type_name = 'Not Specified';
}

$statement = $pdo->prepare("SELECT * FROM tbl_transmission_type WHERE transmission_type_id=?");
$statement->execute(array($transmission_type_id));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
$total = $statement->rowCount();
if($total) {
	foreach ($result as $row) {
		$transmission_type_name = $row['transmission_type_name'];
	}
} else {
	$transmission_type_name = 'Not Specified';
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
?>

<div class="banner-slider" style="background-image: url(<?php echo BASE_URL.'assets/uploads/'.$banner_car; ?>);">
	<div class="bg"></div>
	<div class="bannder-table">
		<div class="banner-text">
			<h1>Beli Mobil</h1>
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
						<h2><?php echo $title; ?></h2>
						<div class="car-detail-price">
							<p>
								<?php if($regular_price == $sale_price): ?>
									<?php echo $sale_price; ?> JT
								<?php else: ?>
									<del><?php echo $regular_price; ?> JT</del> <?php echo $sale_price; ?> JT
								<?php endif; ?>								
							</p>
						</div>
					</div>

					<div class="car-detail-gallery owl-carousel">
						<div class="car-detail-photo" style="background-image: url(<?php echo BASE_URL; ?>assets/uploads/cars/<?php echo $featured_photo; ?>)">
							<div class="lightbox-item">
								<a href="<?php echo BASE_URL; ?>assets/uploads/cars/<?php echo $featured_photo; ?>" data-lightbox="lightbox-item"><i class="fa fa-search-plus"></i></a>
							</div>
						</div>
						<?php
						$statement = $pdo->prepare("SELECT * FROM tbl_car_photo WHERE car_id=?");
						$statement->execute(array($_REQUEST['id']));
						$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
						foreach ($result as $row) {
							?>
							<div class="car-detail-photo" style="background-image: url(<?php echo BASE_URL; ?>assets/uploads/other-cars/<?php echo $row['photo']; ?>)">
								<div class="lightbox-item">
									<a href="<?php echo BASE_URL; ?>assets/uploads/other-cars/<?php echo $row['photo']; ?>" data-lightbox="lightbox-item"><i class="fa fa-search-plus"></i></a>
								</div>
							</div>
							<?php
						}
						?>
						
					</div>

					<div class="car-info-tab">

						<ul class="car-main-tab">
							<li class="active"><a href="#seller_description" data-toggle="tab" aria-expanded="true">Deskripsi</a></li>
							<li class=""><a href="#seller_contact" data-toggle="tab" aria-expanded="false">Kontak Penjual</a></li>
							<li class=""><a href="#booking" data-toggle="tab" aria-expanded="false">Beli Mobil</a></li>
						</ul>

						<div class="tab-content car-content">

							<div class="tab-pane active" id="seller_description">
								<div class="car-tab-text">
									<h2>Seller Description</h2>
									<div class="car-tab-pre">
										<p>
											<?php if($description!=''): ?>
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
									<h2>Contact Information</h2>
									<div class="car-tab-pre">
										<p>
											Address: <?php echo $seller_address; ?><br>
											Phone: <?php echo $seller_phone; ?><br>
											Email: <?php echo $seller_email; ?>
										</p>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="booking">
								<div class="car-tab-text">
									<h2>Beli Mobil Ini</h2>
									<div class="car-tab-pre">
										<p>
										<?php
											if(isset($_POST['booking'])) {
												$valid = 1;
												if(empty($_POST['pembooking'])) {
												}
												if(empty($_POST['pembeli_id'])) {
												}
												if(empty($_POST['nope'])) {
												}
												if(empty($_POST['email'])) {
												}
												if(empty($_POST['penjual'])) {
												}
												if(empty($_POST['mobil'])) {
												}
												
												if(empty($_POST['metode'])) {
													$valid = 0;
													$error_message .= "Metode Wajib Diisi.<br>";
												} 

												if(empty($_POST['bank'])) {
													$valid = 0;
													$error_message .= "Kamu Harus Memilih Bank.<br>";
												}
												if(empty($_POST['cicilan'])) {
													$valid = 0;
													$error_message .= "Lama Cicilan Wajib Diisi.<br>";
												} 
												if($valid == 1) {

													// saving into the database
													$statement = $pdo->prepare("INSERT INTO tbl_pembelian (pembeli_id,pembayaran,pembooking,nope,email,penjual,mobil,nama_bank,lama_cicil) VALUES (?,?,?,?,?,?,?,?,?)");
													$statement->execute(array($_POST['pembeli_id'],$_POST['metode'],$_POST['pembooking'],$_POST['nope'],$_POST['email'],$_POST['penjual'],$_POST['mobil'],$_POST['bank'],$_POST['cicilan']));
											
													$success_message = 'Sip, Pembelian Mu Berhasil. Silahkan Menunggu Konfirmasi Penjual';
												}
											}
											?>

										<?php if($success_message): ?>
										<div class="callout callout-success">
										
										<p><?php echo "<script>alert('".$success_message."')</script>"; ?></p>
										</div>
										<?php endif; ?>
										<?php
										$allowed = 0;
										// Check if the seller is logged in or not
										if(!isset($_SESSION['pembeli'])) {
											header('location: '.BASE_URL.'logout.php');
											exit;
										} else {
											// If seller is logged in, but admin make him inactive, then force logout this user.
											$statement = $pdo->prepare("SELECT * FROM tbl_pembeli WHERE pembeli_id=? AND pembeli_access=?");
											$statement->execute(array($_SESSION['pembeli']['pembeli_id'],0));
											$total = $statement->rowCount();
											if($total) {
												header('location: '.BASE_URL.'logout.php');
												exit;
											}
										}
										?>

										<?php
										if($error_message != '') {
											echo "<script>alert('".$error_message."')</script>";
										}
										if($success_message != '') {
											echo "<script>alert('".$success_message."')</script>";
										}
										?>
										<?php if($allowed == 0): ?>
										<div class="error">Silahkan Login Terlebih Dahulu. <a href="<?php echo BASE_URL; ?>payment.php" style="color:red;text-decoration:underline;">klik Disini</a> Untuk Login.</div>
										<?php else: ?>
										<form class="form-horizontal" action="" method="post">
											<div class="box box-info">
												<div style="margin-left:180px;" class="box-body">

															<input style="display:none;" type="text" class="form-control" name="pembooking" placeholder="<?php echo $pembeli_name; ?>" value="<?php echo $pembeli_name; ?>">
															<input style="display:none;" type="text" class="form-control" name="nope" placeholder="<?php echo $pembeli_phone; ?>" value="<?php echo $pembeli_phone; ?>">
															<input style="display:none;" type="text" class="form-control" name="email" placeholder="<?php echo $pembeli_email; ?>" value="<?php echo$pembeli_email; ?>">
															<input style="display:none;" type="text" class="form-control" name="penjual" placeholder="<?php echo $seller_id; ?>" value="<?php echo $seller_id; ?>">
															<input style="display:none;" type="text" class="form-control" name="pembeli_id" placeholder="<?php echo $pembeli_id; ?>" value="<?php echo $pembeli_id; ?>">

													<div style="display:flex;flex-direction:column;width:1000px;"  class="form-group">
														<label for="" style="text-align:center;" class="col-md-4 control-label">Nama Mobil <span>*</span></label>
														<div class="col-sm-4">
															<input autocomplete="off" type="text" class="form-control" name="mobil" placeholder="<?php echo $title; ?>" value="<?php echo $title; ?>">
														</div>
													</div>
													<div style="display:flex;flex-direction:column;width:1000px;"  class="form-group">
														<label for="" style="text-align:center;" class="col-md-4 control-label">Metode Pembayaran <span>*</span></label>
														<div class="col-sm-4">
														<select class="form-control select2" name="metode">
															<option value="">Pilih Metode</option>
															<?php
															$statement = $pdo->prepare("SELECT * FROM tbl_metode ORDER BY me_pembayaran ASC");
															$statement->execute();
															$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
															foreach ($result as $row) {
																echo '<option value="'.$row['me_pembayaran'].'">'.$row['me_pembayaran'].'</option>';
															}
															?>
														</select>
														</div>
													</div>
													<div style="display:flex;flex-direction:column;width:1000px;"  class="form-group">
														<label for="" style="text-align:center;" class="col-md-4 control-label">VIA Bank<span> (Wajib diisi jika memilih manual)</span></label>
														<div class="col-sm-4">
														<select class="form-control select2" name="bank">
															<option value="">Pilih Bank</option>
															<?php
															$statement = $pdo->prepare("SELECT * FROM tbl_bank ORDER BY nama_bank ASC");
															$statement->execute();
															$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
															foreach ($result as $row) {
																echo '<option value="'.$row['nama_bank'].'">'.$row['nama_bank'].'</option>';
															}
															?>
														</select>
														</div>
													</div>
													<div style="display:flex;flex-direction:column;width:1000px;"  class="form-group">
														<label for="" style="text-align:center;" class="col-md-4 control-label">Lama Cicilan<span> (Wajib diisi jika ingin pembayaran lanjutan dengan kredit)</span></label>
														<div class="col-sm-4">
														<select class="form-control select2" name="cicilan">
															<option value="">Pilih Lama Cicilan</option>
															<?php
															$statement = $pdo->prepare("SELECT * FROM tbl_waktu_cicilan ORDER BY lama_cicilan ASC");
															$statement->execute();
															$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
															foreach ($result as $row) {
																echo '<option value="'.$row['lama_cicilan'].'">'.$row['lama_cicilan'].'</option>';
															}
															?>
														</select>
														</div>
													</div>													


													<div class="form-group">
														<label for="" class="col-sm-2 control-label"></label>
														<div class="col-sm-6">
															<button type="submit" class="btn btn-success pull-left" name="booking">Beli Sekarang</button>
														</div>
													</div>
												</div>
											</div>
										</form><?php endif; ?>
										</p>
									</div>
									
								</div>
							</div>

						</div>
					</div>
				</div>

				<!-- Related Cars -->
				<div class="related-ads">
					<div class="related-ads-headline">
						<h2>Related Cars</h2>
					</div>
					<?php
					$statement = $pdo->prepare("SELECT * FROM tbl_car WHERE brand_id=? AND car_id!=?");
					$statement->execute(array($brand_id,$_REQUEST['id']));
					$result = $statement->fetchAll(PDO::FETCH_ASSOC);
					$total = $statement->rowCount();
					if($total):
					foreach ($result as $row) {
						?>
						<div class="row listing-item">
							<div class="col-md-4 col-sm-4 listing-photo" style="background-image: url(<?php echo BASE_URL; ?>assets/uploads/cars/<?php echo $row['featured_photo']; ?>)"></div>
							
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
									<li>Type: <span><?php if($tot!=''){echo $car_category_name;} else{echo 'Not Specified';} ?></span></li>
									<li>Mileage: <span><?php if($row['mileage']!=''){echo $row['mileage'];} else{echo 'Not Specified';} ?></span></li>
									<li>Year: <span><?php if($row['year']!=0){echo $row['year'];} else{echo 'Not Specified';} ?></span></li>
								</ul>
							</div>
							<div class="col-md-4 col-sm-4 listing-price">
								<h2>
									<?php if($row['regular_price']!=$row['sale_price']): ?>
										<del><?php echo $row['regular_price']; ?> JT</del>
										<?php echo $row['sale_price']; ?> JT
									<?php else: ?>
										<?php echo $row['sale_price']; ?> JT
									<?php endif; ?>
								</h2>
								<a href="<?php echo BASE_URL.URL_CAR.$row['car_id']; ?>">View Detail</a>
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

			<div class="col-md-4 col-sm-12">
				<div class="car-detail-sidebar">
					<div class="detail-item car-detail-list">
						<h3>Detail Mobil</h3>
						<table>
							<tbody>
								<tr>
									<td><span>Category</span></td>
									<td><?php echo $car_category_name; ?></td>
								</tr>
								<tr>
									<td><span>Brand</span></td>
									<td><?php echo $brand_name; ?></td>
								</tr>
								<tr>
									<td><span>Model</span></td>
									<td><?php echo $model_name; ?></td>
								</tr>								 
								<tr>
									<td><span>Body Type</span></td>
									<td><?php echo $body_type_name; ?></td>
								</tr>
								<tr>
									<td><span>Fuel Type</span></td>
									<td><?php echo $fuel_type_name; ?></td>
								</tr>
								<tr>
									<td><span>Transmission Type</span></td>
									<td><?php echo $transmission_type_name; ?></td>
								</tr>
								<tr>
									<td><span>VIN</span></td>
									<td>
										<?php if($vin!=''): ?>
											<?php echo $vin; ?>
										<?php else: ?>
											Not Specified
										<?php endif; ?>
									</td>
								</tr>
								<tr>
									<td><span>Condition</span></td>
									<td><?php echo $car_condition; ?></td>
								</tr>
								<tr>
									<td><span>Engine</span></td>
									<td>
										<?php if($engine!=''): ?>
											<?php echo $engine; ?>
										<?php else: ?>
											Not Specified
										<?php endif; ?>
									</td>
								</tr>
								<tr>
									<td><span>Engine Size</span></td>
									<td>
										<?php if($engine_size!=''): ?>
											<?php echo $engine_size; ?>
										<?php else: ?>
											Not Specified
										<?php endif; ?>
									</td>
								</tr>
								<tr>
									<td><span>Exterior Color</span></td>
									<td>
										<?php if($exterior_color!=''): ?>
											<?php echo $exterior_color; ?>
										<?php else: ?>
											Not Specified
										<?php endif; ?>
									</td>
								</tr>
								<tr>
									<td><span>Interior Color</span></td>
									<td>
										<?php if($interior_color!=''): ?>
											<?php echo $interior_color; ?>
										<?php else: ?>
											Not Specified
										<?php endif; ?>
									</td>
								</tr>
								<tr>
									<td><span>Number of Seats</span></td>
									<td>
										<?php if($seat!=''): ?>
											<?php echo $seat; ?>
										<?php else: ?>
											Not Specified
										<?php endif; ?>
									</td>
								</tr>
								<tr>
									<td><span>Number of Doors</span></td>
									<td>
										<?php if($door!=''): ?>
											<?php echo $door; ?>
										<?php else: ?>
											Not Specified
										<?php endif; ?>
									</td>
								</tr>
								<tr>
									<td><span>Top Speed</span></td>
									<td>
										<?php if($top_speed!=''): ?>
											<?php echo $top_speed; ?>
										<?php else: ?>
											Not Specified
										<?php endif; ?>
									</td>
								</tr>
								<tr>
									<td><span>Kilometer</span></td>
									<td>
										<?php if($kilometer!=''): ?>
											<?php echo $kilometer; ?>
										<?php else: ?>
											Not Specified
										<?php endif; ?>
									</td>
								</tr>
								<tr>
									<td><span>Mileage</span></td>
									<td>
										<?php if($mileage!=''): ?>
											<?php echo $mileage; ?>
										<?php else: ?>
											Not Specified
										<?php endif; ?>
									</td>
								</tr>
								<tr>
									<td><span>Year</span></td>
									<td>
										<?php if($year!=0): ?>
											<?php echo $year; ?>
										<?php else: ?>
											Not Specified
										<?php endif; ?>
									</td>
								</tr>
								<tr>
									<td><span>Warranty</span></td>
									<td>
										<?php if($warranty!=''): ?>
											<?php echo $warranty; ?>
										<?php else: ?>
											Not Specified
										<?php endif; ?>
									</td>
								</tr>
							</tbody>
						</table>
					</div>

					
				</div>
			</div>
		</div>
	</div>
</div>
<!--Car Detail End-->

<?php require_once('footer.php'); ?>