<?php require_once('header.php'); ?>

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
foreach ($result as $row) {
	$banner_forget_password = $row['banner_forget_password'];
}
?>

<?php
if( !isset($_GET['email']) || !isset($_GET['token']) )
{
	header('location: '.BASE_URL.'login.php');
	exit;
}

$statement = $pdo->prepare("SELECT * FROM tbl_pembeli WHERE pembeli_email=? AND pembeli_token=?");
$statement->execute(array($_GET['email'],$_GET['token']));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
$tot = $statement->rowCount();
if($tot == 0)
{
	header('location: '.BASE_URL.'login.php');
	exit;
}
foreach ($result as $row) {
	$saved_time = $row['pembeli_time'];
}

$error_message2 = '';
if(time() - $saved_time > 86400)
{
	$error_message2 = 'The password reset email time (24 hours) has expired. Please again try to reset your password.';
}

if(isset($_POST['form1'])) {

	$valid = 1;
	
	if( empty($_POST['pembeli_new_password']) || empty($_POST['pembeli_re_password']) )
	{
		$valid = 0;
        $error_message .= 'Please enter new and retype passwords.\\n';
	}
	else
	{
		if($_POST['pembeli_new_password'] != $_POST['pembeli_re_password'])
        {
            $valid = 0;
            $error_message .= 'Passwords do not match.\\n';
        }
	}	

	if($valid == 1) {
		$statement = $pdo->prepare("UPDATE tbl_pembeli SET pembeli_password=?, pembeli_token=?, pembeli_time=? WHERE pembeli_email=?");
		$statement->execute(array(md5($_POST['pembeli_new_password']),'','',$_GET['email']));
		
		header('location: '.BASE_URL.'reset-password-success.php');
	}

	
}
?>

<div class="banner-slider" style="background-image: url(<?php echo BASE_URL.'assets/uploads/'.$banner_forget_password; ?>)">
	<div class="bg"></div>
	<div class="bannder-table">
		<div class="banner-text">
			<h1>Reset Password</h1>
		</div>
	</div>
</div>

<div class="login-area bg-area">
	<div class="container">
		<div class="row">

			<?php
			if($error_message != '') {
				echo "<script>alert('".$error_message."')</script>";
			}
			?>

			<?php if($error_message2 != ''): ?>
				<div class="col-md-12">
					<div class="error"><?php echo $error_message2; ?></div>
				</div>
			<?php else: ?>
				<div class="col-md-offset-3 col-md-6 col-md-offset-3">
					<div class="login-form">
						<form action="" method="post">
							<div class="form-row">
								<div class="form-group">
									<label for="">Password Baru</label>
									<input type="password" class="form-control" name="pembeli_new_password" placeholder="New Password">
								</div>
								<div class="form-group">
									<label for="">Ulangi Password</label>
									<input type="password" class="form-control" name="pembeli_re_password" placeholder="Confirm Password">
								</div>
								<button type="submit" class="btn btn-primary" name="form1">Update</button>
							</div>
						</form>
					</div>
				</div>
			<?php endif; ?>

			
		</div>
	</div>
</div>

<?php require_once('footer.php'); ?>