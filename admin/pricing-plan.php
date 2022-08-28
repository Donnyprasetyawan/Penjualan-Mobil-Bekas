<?php require_once('header.php'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Daftar Paket Harga</h1>
	</div>
	<div class="content-header-right">
		<a href="pricing-plan-add.php" class="btn btn-primary btn-sm">Tambah Paket</a>
	</div>
</section>


<section class="content">

  <div class="row">
    <div class="col-md-12">

      <div class="box box-info">
        
        <div class="box-body table-responsive">

            <?php
            if(isset($_REQUEST['msg'])) {
                if($_REQUEST['msg'] == 1) {
                    echo '<div class="error">Kamu tidak bisa menghapus paket harga karena sedang digunakan dalam tabel pembayaran.</div>';
                }
            }
            ?>
            <table id="example1" class="table table-bordered table-striped">
    			<thead>
    			    <tr>
    			        <th>No</th>
    			        <th>Nama Paket</th>
    			        <th>Harga Paket</th>
    			        <th>Lama Sewa (dalam hari)</th>
                        <th>Jumlah Upload</th>
    			        <th>Aksi</th>
    			    </tr>
    			</thead>
                <tbody>
                	<?php
                	$i=0;
                	$statement = $pdo->prepare("SELECT * FROM tbl_pricing_plan ORDER BY pricing_plan_id ASC");
                	$statement->execute();
                	$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
                	foreach ($result as $row) {
                		$i++;
    	            	?>
    	                <tr>
    	                    <td><?php echo $i; ?></td>
    	                    <td><?php echo $row['pricing_plan_name']; ?></td>
    	                    <td><?php echo $row['pricing_plan_price']; ?></td>
    	                    <td><?php echo $row['pricing_plan_day']; ?></td>
                            <td><?php echo $row['pricing_plan_item_allow']; ?></td>
    	                    <td>
    	                        <a href="pricing-plan-edit.php?id=<?php echo $row['pricing_plan_id']; ?>" class="btn btn-primary btn-xs">Edit</a>
    	                        <a href="#" class="btn btn-danger btn-xs" data-href="pricing-plan-delete.php?id=<?php echo $row['pricing_plan_id']; ?>" data-toggle="modal" data-target="#confirm-delete">Hapus</a>
    	                    </td>
    	                </tr>
    	                <?php
                	}
                	?>
                </tbody>
            </table>
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
                Apakah Kamu Yakin Ingin Menghapus Item Ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batalkan</button>
                <a class="btn btn-danger btn-ok">Hapus</a>
            </div>
        </div>
    </div>
</div>


<?php require_once('footer.php'); ?>