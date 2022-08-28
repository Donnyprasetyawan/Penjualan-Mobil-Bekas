<?php
$cur_page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
?>
<ul>
	<li class="<?php if($cur_page == 'dashboard.php'){echo 'active';} ?>"><a href="dashboard.php"><span><i class="fa fa-arrow-circle-o-right "></i></span>Dashboard</a></li>
	<li class="<?php if($cur_page == 'daftar_testdrive.php'){echo 'active';} ?>"><a href="daftar_testdrive.php"><span><i class="fa fa-arrow-circle-o-right "></i></span>Daftar Test Drive Saya</a></li>
	<li class="<?php if($cur_page == 'car-add.php'){echo 'active';} ?>"><a href="car-add.php"><span><i class="fa fa-arrow-circle-o-right "></i></span>Daftar Booking Saya</a></li>
	<li class="<?php if($cur_page == 'car-view.php'){echo 'active';} ?>">
		<a class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><span><i class="fa fa-arrow-circle-o-right "></i></span>Daftar Pembelian Saya</a>
		<ul class="dropdown-menu">
			<li><a class="text-dark" href="car-view.php">Pembelian Tunai</a></li>
			<li><a class="text-dark" href="pembelian-kredit.php">Pembelian Kredit</a></li>
		</ul>
	</li>
	<li class="<?php if($cur_page == 'profile-edit.php'){echo 'active';} ?>"><a href="profile-edit.php"><span><i class="fa fa-arrow-circle-o-right "></i></span>Update Profil</a></li>
	<!-- <li class="<?php if($cur_page == 'payment.php'){echo 'active';} ?>"><a href="payment.php"><span><i class="fa fa-arrow-circle-o-right "></i></span>Pembayaran</a></li> -->
	<li><a href="logout.php"><span><i class="fa fa-arrow-circle-o-right "></i></span>Logout</a></li>
</ul>