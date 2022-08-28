<?php require_once('header.php'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Daftar Mobil Disetujui</h1>
	</div>
	<div class="content-header-right">
		<a href="car-pending.php" class="btn btn-primary btn-sm">Mobil Pending</a>
	</div>
</section>


<section class="content">

  <div class="row">
    <div class="col-md-12">

      <div class="box box-info">
        
        <div class="box-body table-responsive">
          <table id="example1" class="table table-bordered table-striped">
			<thead>
			    <tr>
			        <th>Serial</th>
                    <th>Nama Mobil</th>
                    <th>Merek</th>
                    <th>Model</th>
                    <th>Foto Utama</th>
                    <th>Aksi</th>
			    </tr>
			</thead>
            <tbody>
            	<?php
            	$i=0;
            	$statement = $pdo->prepare("SELECT * FROM tbl_car WHERE status=?");
                $statement->execute(array(1));
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);           
                foreach ($result as $row) {
            		$i++;
	            	?>
	                <tr>
	                    <td><?php echo $i; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td>
                            <?php
                            $statement1 = $pdo->prepare("SELECT * FROM tbl_brand WHERE brand_id=?");
                            $statement1->execute(array($row['brand_id']));
                            $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($result1 as $row1) {
                                $brand_name = $row1['brand_name'];
                            }
                            echo $brand_name;
                            ?>
                        </td>
                        <td>
                            <?php
                            $statement1 = $pdo->prepare("SELECT * FROM tbl_model WHERE model_id=?");
                            $statement1->execute(array($row['model_id']));
                            $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($result1 as $row1) {
                                $model_name = $row1['model_name'];
                            }
                            echo $model_name;
                            ?>
                        </td>
                        <td>
                            <img src="<?php echo BASE_URL; ?>assets/uploads/cars/<?php echo $row['featured_photo']; ?>" alt="" style="width:150px;">
                        </td>
	                    <td>
                            <a href="" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModalDetail<?php echo $i; ?>">Detail</a>
                            <a href="#" class="btn btn-danger btn-xs" data-href="car-delete.php?id=<?php echo $row['car_id']; ?>" data-toggle="modal" data-target="#confirm-delete">Hapus</a>
        

        <!-- Modal Start -->
        <div class="modal fade" id="myModalDetail<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">
                          Detail Informasi
                        </h4>
                    </div>
                    <div class="modal-body">
                        <div class="rTable">
                            <div class="rTableRow">
                                <div class="rTableHead">Foto Unggulan</div>
                                <div class="rTableCell">
                                    <img src="<?php echo BASE_URL; ?>assets/uploads/cars/<?php echo $row['featured_photo']; ?>" alt="" style="width:250px;">
                                </div>
                            </div>              
                            <div class="rTableRow">
                                <div class="rTableHead">Nama</div>
                                <div class="rTableCell"><?php echo $row['title']; ?></div>
                            </div>
                            <div class="rTableRow">
                                <div class="rTableHead">Merek</div>
                                <div class="rTableCell"><?php echo $brand_name; ?></div>
                            </div>
                            <div class="rTableRow">
                                <div class="rTableHead">Model</div>
                                <div class="rTableCell"><?php echo $model_name; ?></div>
                            </div>

                            <?php
                                $statement1 = $pdo->prepare("SELECT * FROM tbl_car_category WHERE car_category_id=?");
                                $statement1->execute(array($row['car_category_id']));
                                $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);     
                                foreach ($result1 as $row1) {
                                    $car_category_name = $row1['car_category_name'];
                                }
                            ?>
                            <?php if(!empty($car_category_name)): ?>
                            <div class="rTableRow">
                                <div class="rTableHead">Kategori Mobil</div>
                                <div class="rTableCell">
                                    <?php echo $car_category_name; ?>
                                </div>
                            </div>
                            <?php endif; ?>

                            
                            <?php
                                $statement1 = $pdo->prepare("SELECT * FROM tbl_body_type WHERE body_type_id=?");
                                $statement1->execute(array($row['body_type_id']));
                                $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);     
                                foreach ($result1 as $row1) {
                                    $body_type_name = $row1['body_type_name'];
                                }
                            ?>
                            <?php if(!empty($body_type_name)): ?>
                            <div class="rTableRow">
                                <div class="rTableHead">Tipe Body</div>
                                <div class="rTableCell">
                                    <?php echo $body_type_name; ?>
                                </div>
                            </div>
                            <?php endif; ?>

                            
                            <?php
                                $statement1 = $pdo->prepare("SELECT * FROM tbl_fuel_type WHERE fuel_type_id=?");
                                $statement1->execute(array($row['fuel_type_id']));
                                $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);     
                                foreach ($result1 as $row1) {
                                    $fuel_type_name = $row1['fuel_type_name'];
                                }
                            ?>
                            <?php if(!empty($fuel_type_name)): ?>
                            <div class="rTableRow">
                                <div class="rTableHead">Jenis Bahan Bakar</div>
                                <div class="rTableCell">
                                    <?php echo $fuel_type_name; ?>
                                </div>
                            </div>
                            <?php endif; ?>

                            
                            <?php
                                $statement1 = $pdo->prepare("SELECT * FROM tbl_transmission_type WHERE transmission_type_id=?");
                                $statement1->execute(array($row['transmission_type_id']));
                                $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);     
                                foreach ($result1 as $row1) {
                                    $transmission_type_name = $row1['transmission_type_name'];
                                }
                            ?>
                            <?php if(!empty($transmission_type_name)): ?>
                            <div class="rTableRow">
                                <div class="rTableHead">Tipe Transmisi</div>
                                <div class="rTableCell">
                                    <?php echo $transmission_type_name; ?>
                                </div>
                            </div>
                            <?php endif; ?>

                            
                            <?php if(!empty($row['vin'])): ?>
                            <div class="rTableRow">
                                <div class="rTableHead">VIN</div>
                                <div class="rTableCell">
                                    <?php echo $row['vin']; ?>
                                </div>
                            </div>
                            <?php endif; ?>

                            
                         <!--   <div class="rTableRow">
                                <div class="rTableHead">Kondisi Mobil</div>
                                <div class="rTableCell">
                                    <?php //echo $row['car_condition']; ?>
                                </div>
                            </div>-->

                            <?php if(!empty($row['engine'])): ?>
                            <div class="rTableRow">
                                <div class="rTableHead">Engine</div>
                                <div class="rTableCell">
                                    <?php echo $row['engine']; ?>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if(!empty($row['engine_size'])): ?>
                            <div class="rTableRow">
                                <div class="rTableHead">Ukuran Mesin</div>
                                <div class="rTableCell">
                                    <?php echo $row['engine_size']; ?>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if(!empty($row['exterior_color'])): ?>
                            <div class="rTableRow">
                                <div class="rTableHead">Warna Luar</div>
                                <div class="rTableCell">
                                    <?php echo $row['exterior_color']; ?>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if(!empty($row['interior_color'])): ?>
                            <div class="rTableRow">
                                <div class="rTableHead">Warna Dalam</div>
                                <div class="rTableCell">
                                    <?php echo $row['interior_color']; ?>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if(!empty($row['seat'])): ?>
                            <div class="rTableRow">
                                <div class="rTableHead">Jumlah Kursi</div>
                                <div class="rTableCell">
                                    <?php echo $row['seat']; ?>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if(!empty($row['door'])): ?>
                            <div class="rTableRow">
                                <div class="rTableHead">Jumlah Pintu</div>
                                <div class="rTableCell">
                                    <?php echo $row['door']; ?>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if(!empty($row['top_speed'])): ?>
                            <div class="rTableRow">
                                <div class="rTableHead">Kecepatan Max</div>
                                <div class="rTableCell">
                                    <?php echo $row['top_speed']; ?>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if(!empty($row['kilometer'])): ?>
                            <div class="rTableRow">
                                <div class="rTableHead">Kilometers</div>
                                <div class="rTableCell">
                                    <?php echo $row['kilometer']; ?>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if(!empty($row['mileage'])): ?>
                            <div class="rTableRow">
                                <div class="rTableHead">Jarak Tempuh</div>
                                <div class="rTableCell">
                                    <?php echo $row['mileage']; ?>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if(!empty($row['year'])): ?>
                            <div class="rTableRow">
                                <div class="rTableHead">Tahun Pembuatan</div>
                                <div class="rTableCell">
                                    <?php echo $row['year']; ?>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if(!empty($row['warranty'])): ?>
                            <div class="rTableRow">
                                <div class="rTableHead">Garansi</div>
                                <div class="rTableCell">
                                    <?php echo $row['warranty']; ?>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if(!empty($row['country'])): ?>
                            <div class="rTableRow">
                                <div class="rTableHead">Garansi</div>
                                <div class="rTableCell">
                                    <?php echo $row['country']; ?>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if(!empty($row['state'])): ?>
                            <div class="rTableRow">
                                <div class="rTableHead">Provinsi</div>
                                <div class="rTableCell">
                                    <?php echo $row['state']; ?>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if(!empty($row['city'])): ?>
                            <div class="rTableRow">
                                <div class="rTableHead">Kota</div>
                                <div class="rTableCell">
                                    <?php echo $row['city']; ?>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if(!empty($row['zip_code'])): ?>
                            <div class="rTableRow">
                                <div class="rTableHead">Kode POS</div>
                                <div class="rTableCell">
                                    <?php echo $row['zip_code']; ?>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if(!empty($row['address'])): ?>
                            <div class="rTableRow">
                                <div class="rTableHead">Alamat</div>
                                <div class="rTableCell">
                                    <?php echo $row['address']; ?>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if(!empty($row['map'])): ?>
                            <div class="rTableRow">
                                <div class="rTableHead">Map</div>
                                <div class="rTableCell">
                                    <?php echo $row['map']; ?>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if(!empty($row['regular_price'])): ?>
                            <div class="rTableRow">
                                <div class="rTableHead">Harga Reguler</div>
                                <div class="rTableCell">
                                    <?php echo $row['regular_price']; ?>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if(!empty($row['sale_price'])): ?>
                            <div class="rTableRow">
                                <div class="rTableHead">Harga Jual</div>
                                <div class="rTableCell">
                                    <?php echo $row['sale_price']; ?>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if(!empty($row['description'])): ?>
                            <div class="rTableRow">
                                <div class="rTableHead">Deskripsi Dari Penjual</div>
                                <div class="rTableCell">
                                    <?php echo nl2br($row['description']); ?>
                                </div>
                            </div>
                            <?php endif; ?>

                            <div class="rTableRow">
                                <div class="rTableHead">Gambar</div>
                                <div class="rTableCell">
                                    <?php
                                    $statement1 = $pdo->prepare("SELECT * FROM tbl_car_photo WHERE car_id=?");
                                    $statement1->execute(array($row['car_id']));
                                    $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($result1 as $row1) {
                                        ?>
                                        <img src="<?php echo BASE_URL; ?>assets/uploads/other-cars/<?php echo $row1['photo']; ?>" alt="" style="width:250px;margin-bottom:10px;"><br>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>                                    
            </div>                                
        </div>
        <!-- Modal End -->


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