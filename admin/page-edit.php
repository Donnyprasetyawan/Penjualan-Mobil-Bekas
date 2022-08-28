<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;

    if(empty($_POST['page_name'])) {
        $valid = 0;
        $error_message .= "Nama Halaman Tidak Boleh Kosong.<br>";
    } else {
		// Duplicate Page checking
    	// current page name that is in the database
    	$statement = $pdo->prepare("SELECT * FROM tbl_page WHERE page_id=?");
		$statement->execute(array($_REQUEST['id']));
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $row) {
			$current_page_name = $row['page_name'];
		}

		$statement = $pdo->prepare("SELECT * FROM tbl_page WHERE page_name=? and page_name!=?");
    	$statement->execute(array($_POST['page_name'],$current_page_name));
    	$total = $statement->rowCount();							
    	if($total) {
    		$valid = 0;
        	$error_message .= 'Nama Halaman Tersebut Sudah Ada.<br>';
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
    }

    if($valid == 1) {

    	if($_POST['page_slug'] == '') {
    		// generate slug
    		$temp_string = strtolower($_POST['page_name']);
    		$page_slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $temp_string);;
    	} else {
    		$temp_string = strtolower($_POST['page_slug']);
    		$page_slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $temp_string);
    	}

    	// if slug already exists, then rename it
		$statement = $pdo->prepare("SELECT * FROM tbl_page WHERE page_slug=? AND page_name!=?");
		$statement->execute(array($page_slug,$current_page_name));
		$total = $statement->rowCount();
		if($total) {
			$page_slug = $page_slug.'-1';
		}
   

   		if($path == '') {
			// updating into the database
			$statement = $pdo->prepare("UPDATE tbl_page SET page_name=?, page_slug=?, page_content=?,page_layout=?, status=?, meta_title=?, meta_keyword=?, meta_description=? WHERE page_id=?");
			$statement->execute(array($_POST['page_name'],$page_slug,$_POST['page_content'],$_POST['page_layout'],$_POST['status'],$_POST['meta_title'],$_POST['meta_keyword'],$_POST['meta_description'],$_REQUEST['id']));
   		} else {

   			unlink('../assets/uploads/'.$_POST['current_banner']);

			$final_name = 'page-banner-'.$_REQUEST['id'].'.'.$ext;
        	move_uploaded_file( $path_tmp, '../assets/uploads/'.$final_name );

   			// updating into the database
			$statement = $pdo->prepare("UPDATE tbl_page SET page_name=?, page_slug=?, page_content=?,page_layout=?, banner=?, status=?, meta_title=?, meta_keyword=?, meta_description=? WHERE page_id=?");
			$statement->execute(array($_POST['page_name'],$page_slug,$_POST['page_content'],$_POST['page_layout'],$final_name,$_POST['status'],$_POST['meta_title'],$_POST['meta_keyword'],$_POST['meta_description'],$_REQUEST['id']));
   		}

    	$success_message = 'Halaman Berhasil Di Update..';
    }
}
?>

<?php
if(!isset($_REQUEST['id'])) {
	header('location: logout.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM tbl_page WHERE page_id=?");
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
		<h1>Edit Halaman</h1>
	</div>
	<div class="content-header-right">
		<a href="page.php" class="btn btn-primary btn-sm">Lihat Semua</a>
	</div>
</section>


<?php							
foreach ($result as $row) {
	$page_name        = $row['page_name'];
	$page_slug        = $row['page_slug'];
	$page_content     = $row['page_content'];
	$page_layout      = $row['page_layout'];
	$banner           = $row['banner'];
	$status           = $row['status'];
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
		<input type="hidden" name="current_banner" value="<?php echo $banner; ?>">
        <div class="box box-info">

            <div class="box-body">
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Nama Halaman <span>*</span></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="page_name" value="<?php echo $page_name; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Slug Halaman</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="page_slug" value="<?php echo $page_slug; ?>">
                    </div>
                </div>
                <div class="form-group">
					<label for="" class="col-sm-2 control-label">Layout Halaman </label>
					<div class="col-sm-2">
						<select class="form-control select2" name="page_layout" style="width:300px;" onchange="showContentInputArea(this)">
							<option value="Full Width Page Layout" <?php if($page_layout=='Full Width Page Layout') {echo 'selected';} ?>>Layout Halaman Ukuran Penuh</option>
							<option value="FAQ Page Layout" <?php if($page_layout=='FAQ Page Layout') {echo 'selected';} ?>>Layout Halaman FAQ</option>
							<option value="Testimonial Page Layout" <?php if($page_layout=='Testimonial Page Layout') {echo 'selected';} ?>>Layout Halaman Testimonial</option>
							<option value="New Car Page Layout" <?php if($page_layout=='New Car Page Layout') {echo 'selected';} ?>>Layout Halaman Mobil Baru</option>
							<option value="Old Car Page Layout" <?php if($page_layout=='Old Car Page Layout') {echo 'selected';} ?>>Layout Halaman Mobil Lama</option>
							<option value="Pricing Page Layout" <?php if($page_layout=='Pricing Page Layout') {echo 'selected';} ?>>Layout Halaman Harga</option>
							<option value="Blog Page Layout" <?php if($page_layout=='Blog Page Layout') {echo 'selected';} ?>>Layout Halaman Blog</option>
							<option value="Contact Us Page Layout" <?php if($page_layout=='Contact Us Page Layout') {echo 'selected';} ?>>Layout Halaman Kontak Kami</option>
						</select>
					</div>
				</div>
                <div class="form-group" id="showPageContent" style="<?php if($page_layout=='Full Width Page Layout') {echo 'display:block';}else{echo 'display:none;';} ?>">
					<label for="" class="col-sm-2 control-label">Artikel Halaman </label>
					<div class="col-sm-9">
						<textarea class="form-control" name="page_content" id="editor1"><?php echo $page_content; ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">Banner Saat Ini</label>
					<div class="col-sm-9" style="padding-top:5px">
						<img src="<?php echo BASE_URL; ?>assets/uploads/<?php echo $banner; ?>" alt="Page Banner" style="width:200px;">
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">Banner <span>*</span></label>
					<div class="col-sm-9" style="padding-top:5px">
						<input type="file" name="banner">(Hanya dipebolehkan jpg, jpeg, gif dan png)
					</div>
				</div>			
                <div class="form-group">
		            <label for="" class="col-sm-2 control-label">Aktif? </label>
		            <div class="col-sm-6">
		                <label class="radio-inline">
		                    <input type="radio" name="status" value="Active" <?php if($status == 'Active') { echo 'checked'; } ?>>Ya
		                </label>
		                <label class="radio-inline">
		                    <input type="radio" name="status" value="Inactive" <?php if($status == 'Inactive') { echo 'checked'; } ?>>Tidak
		                </label>
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
						<textarea class="form-control" name="meta_keyword" style="height:100px;"><?php echo $meta_keyword; ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">Deskripsi Meta </label>
					<div class="col-sm-9">
						<textarea class="form-control" name="meta_description" style="height:100px;"><?php echo $meta_description; ?></textarea>
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

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Konfirmasi Penghapusan</h4>
            </div>
            <div class="modal-body">
                Apakah Kamu Yakin Ingin Menghapus Item Ini ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batalkan</button>
                <a class="btn btn-danger btn-ok">Hapus</a>
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>