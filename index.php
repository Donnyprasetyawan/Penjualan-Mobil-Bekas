<?php require_once('header.php'); ?>

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
	$total_recent_news_home_page = $row['total_recent_news_home_page'];
	$search_title = $row['search_title'];
	$search_photo = $row['search_photo'];
	$testimonial_photo = $row['testimonial_photo'];
}
?>

	<!--Slider-Area Start-->
	<div class="slider-area">
		<div class="slider-item" style="background-image: url(<?php echo BASE_URL.'assets/uploads/'.$search_photo; ?>)">
			<div class="bg-3"></div>
			<div class="container">
				<div class="row">
					<div class="slider-text">
						<h1><?php echo $search_title; ?></h1>
					</div>
					<div class="searchbox">
						
						<form action="<?php echo BASE_URL . 'check-get.php'; ?>" method="get">

							<div class="col-md-8 col-sm-8 option-item">
								<input placeholder="Cari mobil BMW..." class="form-control model" name="query" style="height: 38px;" />
							</div>

							<div class="col-md-4 col-sm-4">
								<input type="submit" value="Cari" name="form_search">
							</div>

						</form>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!--Slider-Area End-->

	

	<!--Featured Old Car Start-->
	<div class="featured-area">
		<div class="container">
			<div class="row">
				<div class="headline">
					<h2><span>Mobil Bekas</span> Terupdate</h2>
				</div>
				<div class="featured-gallery owl-carousel">
					
					<?php
					$statement = $pdo->prepare("SELECT * 
											FROM tbl_car
											WHERE car_condition=? and status=?
											ORDER BY car_id DESC");
					$statement->execute(array('Old Car',1));
					$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
					foreach ($result as $row) {
						?>
						<div class="featured-item">
							<div class="featured-car-name">
								<h2><?php echo $row['title']; ?></h2>
							</div>
							<div class="featured-photo" style="background-image: url(<?php echo BASE_URL.'assets/uploads/cars/'.$row['featured_photo']; ?>)"></div>
							<div class="featured-price">
								<h2>
									<?php if($row['regular_price']!=$row['sale_price']): ?>
										<del><?php echo $row['regular_price']; ?> Jt</del>
										<?php echo $row['sale_price']; ?>Jt
									<?php else: ?>
										<?php echo $row['sale_price']; ?>Jt
									<?php endif; ?>
								</h2>
							</div>
							<div class="car-type">
								<ul>
									<?php
									$statement1 = $pdo->prepare("SELECT * FROM tbl_car_category WHERE car_category_id=?");
									$statement1->execute(array($row['car_category_id']));
									$tot = $statement1->rowCount();
									$result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);			
									foreach ($result1 as $row1) {
										$car_category_name = $row1['car_category_name'];
									}
									?>
									<li>Kategori: <span><?php if($tot){echo $car_category_name;} else{echo 'Not Specified';} ?></span></li>
									<li>Jarak Tempuh: <span><?php if($row['mileage']!=''){echo $row['mileage'];} else{echo 'Not Specified';} ?></span></li>
									<li>Tahun: <span><?php if($row['year']!=0){echo $row['year'];} else{echo 'Not Specified';} ?></span></li>
								</ul>
							</div>
							<div class="featured-link">
								<a href="<?php echo BASE_URL.URL_CAR.$row['car_id']; ?>">Lihat Detail</a>
							</div>
						</div>
						
						<?php
					}
					?>
					
				</div>
			</div>
		</div>
	</div>


	<!--Testimonial Area Start-->
	<!-- <div class="testimonial-area" style="background-image: url(<?php echo BASE_URL.'assets/uploads/'.$testimonial_photo; ?>)">
		<div class="bg-2" style="background-color: #333;"></div>
		<div class="container">
			<div class="row">
				<div class="headline headline-white">
					<h2>Tanggapan Mereka</h2>
				</div>
				<div class="testimonial-gallery owl-carousel">
					<?php
					$statement = $pdo->prepare("SELECT * FROM tbl_testimonial");
					$statement->execute();
					$result = $statement->fetchAll(PDO::FETCH_ASSOC);						
					foreach ($result as $row) {
						?>
						<div class="testimonial-item">
							<div class="testimonial-photo" style="background-image: url(<?php echo BASE_URL; ?>assets/uploads/<?php echo $row['photo']; ?>)"></div>
							<div class="testimonial-text">
								<h2><?php echo $row['name']; ?></h2>
								<h3><?php echo $row['designation'].'('.$row['company'].')'; ?></h3>
								<div class="testimonial-pra">
									<p>
										<?php echo $row['comment']; ?>
									</p>
								</div>
							</div>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</div> -->
	<!--Testimonial Area End-->

	<!--Latest News Start-->
	<div class="latest-news">
		<div class="container">
			<div class="row">
				<div class="headline">
					<h2><span>Berita</span> Terbaru</h2>
				</div>
				<div class="latest-gallery owl-carousel">
					<?php
					$i=0;
					$statement = $pdo->prepare("SELECT
									   t1.news_title,
			                           t1.news_slug,
			                           t1.news_content,
			                           t1.news_date,
			                           t1.photo,
			                           t1.category_id,

			                           t2.category_id,
			                           t2.category_name,
			                           t2.category_slug
			                           FROM tbl_news t1
			                           JOIN tbl_category t2
			                           ON t1.category_id = t2.category_id 		                           
			                           ORDER BY t1.news_id DESC");
					$statement->execute();
					$result = $statement->fetchAll(PDO::FETCH_ASSOC);					
					foreach ($result as $row) {
						$i++;
						if($i>$total_recent_news_home_page) {break;}
						?>
						<div class="latest-item">
							<div class="latest-photo" style="background-image: url(<?php echo BASE_URL; ?>assets/uploads/<?php echo $row['photo']; ?>)"></div>
							<div class="latest-text">
								<h2><?php echo $row['news_title']; ?></h2>
								<ul>
									<!-- <li>Kategori: <a href="<?php //echo BASE_URL.URL_CATEGORY.$row['category_slug']; ?>"><?php //echo $row['category_name']; ?></a></li> -->
									<li>Tanggal: <?php echo $row['news_date']; ?></li>
								</ul>
								<div class="latest-pra">
									<p>
										<?php echo substr($row['news_content'],0,120).' ...'; ?>
									</p>
									<a href="<?php echo BASE_URL.URL_NEWS.$row['news_slug']; ?>">Selengkapnya</a>
								</div>
							</div>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>

<?php require_once('footer.php'); ?>	