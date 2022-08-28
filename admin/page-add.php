<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;

    if(empty($_POST['page_name'])) {
        $valid = 0;
        $error_message .= "Nama Halaman Tidak Boleh Kosong.<br>";
    } else {
    	// Duplicate Page checking
    	$statement = $pdo->prepare("SELECT * FROM tbl_page WHERE page_name=?");
    	$statement->execute(array($_POST['page_name']));
    	$total = $statement->rowCount();
    	if($total) {
    		$valid = 0;
        	$error_message .= "Nama Halaman Tersebut Sudah Ada.<br>";
    	}
    }

    $path = $_FILES['banner']['name'];
    $path_tmp = $_FILES['banner']['tmp_name'];

    if($path!='') {
        $ext = pathinfo( $path, PATHINFO_EXTENSION );
        $file_name = basename( $path, '.' . $ext );
        if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
            $valid = 0;
            $error_message .= 'Kamu harus mengupload file dengan format jpg, jpeg, gif atau png file.<br>';
        }
    } else {
    	$valid = 0;
        $error_message .= 'Kamu Harus Memilih Foto.<br>';
    }

    if($valid == 1) {

    	// getting auto increment id
		$statement = $pdo->prepare("SHOW TABLE STATUS LIKE 'tbl_page'");
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row) {
			$ai_id=$row[10];
		}

    	if($_POST['page_slug'] == '') {
    		// generate slug
    		$temp_string = strtolower($_POST['page_name']);
    		$page_slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $temp_string);
    	} else {
    		$temp_string = strtolower($_POST['page_slug']);
    		$page_slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $temp_string);
    	}

    	// if slug already exists, then rename it
		$statement = $pdo->prepare("SELECT * FROM tbl_page WHERE page_slug=?");
		$statement->execute(array($page_slug));
		$total = $statement->rowCount();
		if($total) {
			$page_slug = $page_slug.'-1';
		}

		$final_name = 'page-banner-'.$ai_id.'.'.$ext;
        move_uploaded_file( $path_tmp, '../assets/uploads/'.$final_name );
    	
		// saving into the database
		$statement = $pdo->prepare("INSERT INTO tbl_page (page_name,page_slug,page_content,page_layout,banner,status,meta_title,meta_keyword,meta_description) VALUES (?,?,?,?,?,?,?,?,?)");
		$statement->execute(array($_POST['page_name'],$page_slug,$_POST['page_content'],$_POST['page_layout'],$final_name,$_POST['status'],$_POST['meta_title'],$_POST['meta_keyword'],$_POST['meta_description']));

    	$success_message = 'Halaman Berhasil Ditambahkan.';
    }
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Tambah Halaman</h1>
	</div>
	<div class="content-header-right">
		<a href="page.php" class="btn btn-primary btn-sm">Lihat Semua</a>
	</div>
</section>


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
							<label for="" class="col-sm-2 control-label">Nama Halaman <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="page_name" placeholder="Contoh: Tentang Kami">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Slug Halaman </label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="page_slug" placeholder="Contoh: tentang-kami">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Layout Halaman </label>
							<div class="col-sm-2">
								<select class="form-control select2" name="page_layout" style="width:300px;" onchange="showContentInputArea(this)">
									<option value="Full Width Page Layout">Layout Halaman Ukuran Penuh</option>
									<option value="FAQ Page Layout">Layout Halaman FAQ</option>
									<option value="Testimonial Page Layout">Layout Halaman Testimonial</option>
									<option value="New Car Page Layout">Layout Halaman Mobil Baru</option>
									<option value="Old Car Page Layout">Layout Halaman Mobil Lama</option>
									<option value="Pricing Page Layout">Layout Halaman Harga</option>
									<option value="Blog Page Layout">Layout Halaman Blog</option>
									<option value="Contact Us Page Layout">Layout Halaman Hubungi Kami</option>
								</select>
							</div>
						</div>
						
						<div class="form-group" id="showPageContent">
							<label for="" class="col-sm-2 control-label">Artikel Halaman </label>
							<div class="col-sm-9">
								<textarea class="form-control" name="page_content" id="editor1"></textarea>
							</div>
						</div>	
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Banner <span>*</span></label>
							<div class="col-sm-9" style="padding-top:5px">
								<input type="file" name="banner">(Hanya diperbolehkan jpg, jpeg, gif dan png)
							</div>
						</div>					
						<div class="form-group">
				            <label for="" class="col-sm-2 control-label">Aktif? </label>
				            <div class="col-sm-6">
				                <label class="radio-inline">
				                    <input type="radio" name="status" value="Active" checked>Ya
				                </label>
				                <label class="radio-inline">
				                    <input type="radio" name="status" value="Inactive">Tidak
				                </label>
				            </div>
				        </div>
						<h3 class="seo-info">Informasi SEO</h3>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Judul Meta </label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="meta_title">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Kata Kunci Meta </label>
							<div class="col-sm-9">
								<textarea class="form-control" name="meta_keyword" style="height:100px;"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Deskripsi Meta </label>
							<div class="col-sm-9">
								<textarea class="form-control" name="meta_description" style="height:100px;"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form1">Tambahkan</button>
							</div>
						</div>
					</div>
				</div>

			</form>


		</div>
	</div>

</section>

<?php require_once('footer.php'); ?>