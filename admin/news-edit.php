<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;

	if(empty($_POST['news_title'])) {
		$valid = 0;
		$error_message .= 'Judul Berita Tidak Boleh Kosong.<br>';
	} else {
		// Duplicate Category checking
    	// current news title that is in the database
    	$statement = $pdo->prepare("SELECT * FROM tbl_news WHERE news_id=?");
		$statement->execute(array($_REQUEST['id']));
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $row) {
			$current_news_title = $row['news_title'];
		}

		$statement = $pdo->prepare("SELECT * FROM tbl_news WHERE news_title=? and news_title!=?");
    	$statement->execute(array($_POST['news_title'],$current_news_title));
    	$total = $statement->rowCount();							
    	if($total) {
    		$valid = 0;
        	$error_message .= 'Judul Berita Tersebut Sudah Ada.<br>';
    	}
	}

	if(empty($_POST['news_content'])) {
		$valid = 0;
		$error_message .= 'Artikel Berita Tidak Boleh Kosong.<br>';
	}

	if(empty($_POST['news_date'])) {
		$valid = 0;
		$error_message .= 'Tanggal Publikasi Berita Tidak Boleh Kosong.<br>';
	}

	// if(empty($_POST['category_id'])) {
	// 	$valid = 0;
	// 	$error_message .= 'Kamu Harus Memilih Kategori.<br>';
	// }

	if($_POST['publisher'] == '') {
		$publisher = $_SESSION['user']['full_name'];
	} else {
		$publisher = $_POST['publisher'];	
	}


	$path = $_FILES['photo']['name'];
    $path_tmp = $_FILES['photo']['tmp_name'];

    $previous_photo = $_POST['previous_photo'];

	if($path!='') {
        $ext = pathinfo( $path, PATHINFO_EXTENSION );
        $file_name = basename( $path, '.' . $ext );
        if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
            $valid = 0;
            $error_message .= 'Kamu harus mengupload file dengan format jpg, jpeg, gif atau png file.<br>';
        }
    }

	if($valid == 1) {

		if($_POST['news_slug'] == '') {
    		// generate slug
    		$temp_string = strtolower($_POST['news_title']);
    		$news_slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $temp_string);;
    	} else {
    		$temp_string = strtolower($_POST['news_slug']);
    		$news_slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $temp_string);
    	}

    	// if slug already exists, then rename it
		$statement = $pdo->prepare("SELECT * FROM tbl_news WHERE news_slug=? AND news_title!=?");
		$statement->execute(array($news_slug,$current_news_title));
		$total = $statement->rowCount();
		if($total) {
			$news_slug = $news_slug.'-1';
		}

		// If previous image not found and user do not want to change the photo
	    if($previous_photo == '' && $path == '') {
	    	$statement = $pdo->prepare("UPDATE tbl_news SET news_title=?, news_slug=?, news_content=?, news_date=?, publisher=?, meta_title=?, meta_keyword=?, meta_description=? WHERE news_id=?");
	    	$statement->execute(array($_POST['news_title'],$news_slug,$_POST['news_content'],$_POST['news_date'],$publisher,$_POST['meta_title'],$_POST['meta_keyword'],$_POST['meta_description'],$_REQUEST['id']));
	    }

		// If previous image found and user do not want to change the photo
	    if($previous_photo != '' && $path == '') {
	    	$statement = $pdo->prepare("UPDATE tbl_news SET news_title=?, news_slug=?, news_content=?, news_date=?, publisher=?, meta_title=?, meta_keyword=?, meta_description=? WHERE news_id=?");
	    	$statement->execute(array($_POST['news_title'],$news_slug,$_POST['news_content'],$_POST['news_date'],$publisher,$_POST['meta_title'],$_POST['meta_keyword'],$_POST['meta_description'],$_REQUEST['id']));
	    }


	    // If previous image not found and user want to change the photo
	    if($previous_photo == '' && $path != '') {

	    	$final_name = 'news-'.$_REQUEST['id'].'.'.$ext;
            move_uploaded_file( $path_tmp, '../assets/uploads/'.$final_name );

	    	$statement = $pdo->prepare("UPDATE tbl_news SET news_title=?, news_slug=?, news_content=?, news_date=?, photo=?, publisher=?, meta_title=?, meta_keyword=?, meta_description=? WHERE news_id=?");
	    	$statement->execute(array($_POST['news_title'],$news_slug,$_POST['news_content'],$_POST['news_date'],$final_name,$publisher,$_POST['meta_title'],$_POST['meta_keyword'],$_POST['meta_description'],$_REQUEST['id']));
	    }

	    
	    // If previous image found and user want to change the photo
		if($previous_photo != '' && $path != '') {

	    	unlink('../assets/uploads/'.$previous_photo);

	    	$final_name = 'news-'.$_REQUEST['id'].'.'.$ext;
            move_uploaded_file( $path_tmp, '../assets/uploads/'.$final_name );

	    	$statement = $pdo->prepare("UPDATE tbl_news SET news_title=?, news_slug=?, news_content=?, news_date=?, photo=?, publisher=?, meta_title=?, meta_keyword=?, meta_description=? WHERE news_id=?");
	    	$statement->execute(array($_POST['news_title'],$news_slug,$_POST['news_content'],$_POST['news_date'],$final_name,$publisher,$_POST['meta_title'],$_POST['meta_keyword'],$_POST['meta_description'],$_REQUEST['id']));
	    }

	    $success_message = 'Berita Berhasil Di Update.!';
	}
}
?>

<?php
if(!isset($_REQUEST['id'])) {
	header('location: logout.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM tbl_news WHERE news_id=?");
	$statement->execute(array($_REQUEST['id']));
	$total = $statement->rowCount();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	if( $total == 0 ) {
		header('location: logout.php');
		exit;
	}
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Edit Berita</h1>
	</div>
	<div class="content-header-right">
		<a href="news.php" class="btn btn-primary btn-sm">Lihat Semua</a>
	</div>
</section>

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_news WHERE news_id=?");
$statement->execute(array($_REQUEST['id']));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
	$news_title       = $row['news_title'];
	$news_slug        = $row['news_slug'];
	$news_content     = $row['news_content'];
	$news_date        = $row['news_date'];
	$photo            = $row['photo'];
	$category_id      = $row['category_id'];
	$publisher        = $row['publisher'];
	$meta_title       = $row['meta_title'];
	$meta_keyword     = $row['meta_keyword'];
	$meta_description = $row['meta_description'];
}
?>

<section class="content">

	<div class="row">
		<div class="col-md-12">

			<?php if($error_message): ?>
			<div class="callout callout-danger">
			
			<p>
			<?php echo $error_message; ?>
			</p>
			</div>
			<?php endif; ?>

			<?php if($success_message): ?>
			<div class="callout callout-success">
			
			<p><?php echo $success_message; ?></p>
			</div>
			<?php endif; ?>

			<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Judul Berita <span>*</span></label>
							<div class="col-sm-6">
								<input type="text" class="form-control" name="news_title" value="<?php echo $news_title; ?>">
							</div>
						</div>
						<div class="form-group">
		                    <label for="" class="col-sm-2 control-label">Slug Berita</label>
		                    <div class="col-sm-6">
		                        <input type="text" class="form-control" name="news_slug" value="<?php echo $news_slug; ?>">
		                    </div>
		                </div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Artikel Berita <span>*</span></label>
							<div class="col-sm-9">
								<textarea class="form-control" name="news_content" id="editor1"><?php echo $news_content; ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Tanggal Publikasi <span>*</span></label>
							<div class="col-sm-2">
								<input type="text" class="form-control" name="news_date" id="datepicker" value="<?php echo $news_date; ?>">(Format: dd-mm-yy)
							</div>
						</div>
						<div class="form-group">
				            <label for="" class="col-sm-2 control-label">Foto Unggulan Saat Ini</label>
				            <div class="col-sm-6" style="padding-top:6px;">
				            	<?php
				            	if($photo == '') {
				            		echo 'No photo found';
				            	} else {
				            		echo '<img src="../assets/uploads/'.$photo.'" class="existing-photo" style="width:200px;">';	
				            	}
				            	?>
				                <input type="hidden" name="previous_photo" value="<?php echo $photo; ?>">
				            </div>
				        </div>
						<div class="form-group">
				            <label for="" class="col-sm-2 control-label">Ganti Foto Unggulan</label>
				            <div class="col-sm-6" style="padding-top:6px;">
				                <input type="file" name="photo">
				            </div>
				        </div>
						<!-- <div class="form-group">
				            <label for="" class="col-sm-2 control-label">Kategori <span>*</span></label>
				            <div class="col-sm-3">
				            	<select class="form-control select2" name="category_id">
								<?php
				            	// $i=0;
				            	// $statement = $pdo->prepare("SELECT * FROM tbl_category ORDER BY category_name ASC");
				            	// $statement->execute();
				            	// $result = $statement->fetchAll(PDO::FETCH_ASSOC);
				            	// foreach ($result as $row) {
									?>
									<option value="<?php // echo $row['category_id']; ?>" <?php //if($row['category_id']==$category_id){echo 'selected';} ?>><?php //echo $row['category_name']; ?></option>
	                                <?php
								// }
								?>
								</select>
				            </div>
				        </div> -->
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Publisher </label>
							<div class="col-sm-6">
								<input type="text" class="form-control" name="publisher" value="<?php echo $publisher; ?>"> (Jika kamu membiarkan Ini Kosong, Maka User Yang Sedang Login Akan Dijadikan Pembuat Berita)
							</div>
						</div>
						<h3 class="seo-info">Informasi SEO</h3>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Judul Meta </label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="meta_title" value="<?php echo $meta_title; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Kata Kunci Meta </label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="meta_keyword" value="<?php echo $meta_keyword; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Deskripsi Meta </label>
							<div class="col-sm-9">
								<textarea class="form-control" name="meta_description" style="height:200px;"><?php echo $meta_description; ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form1">Update</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

</section>

<?php require_once('footer.php'); ?>