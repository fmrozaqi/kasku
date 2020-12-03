<div class="box">
	<div class="box-header with-border">
    	<h3 class="box-title" style="margin-right: 10px;">Data Murid</h3>
    	<a href="<?= BASEURL ?>/admin/tambah_murid" class="btn btn-primary btn-xs">Tambah</a>
    	<a href="<?= BASEURL ?>/admin/import_murid" class="btn btn-warning btn-xs">Import</a>
      <a href="<?= BASEURL ?>/admin/delAllMurid" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ingin menghapus semua data ?')">Hapus Semua Data</a>
    </div>
    <div class="box-body">
    	<div class="table-responsive">
          <table id="datatable" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nomor Induk</th>
                  <th>Nama</th>
                  <th>Kelas</th>
                  <th>Total Kas</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                	<?php 
                		$no = 1;
                		foreach ($data['mrd'] as $mrd) {
                	?>
                  <tr>
	                  <td><?= $no++; ?></td>
	                  <td><?= $mrd['username'] ?></td>
	                  <td><?= $mrd['nama'] ?></td>
	                  <td><?= $mrd['kelas'] ?></td>
                    <td><?= 'Rp. ' .number_format($mrd['jumlah']) ?></td>
	                  <td>
	                  	<a href="<?= BASEURL; ?>/admin/ubah_murid/<?= $mrd['id_user'] ?>"><button class="btn btn-primary btn-xs">Edit</button></a>
	                  	<a href="<?= BASEURL; ?>/admin/hapus_murid/<?= $mrd['id_user'] ?>"><button class="btn btn-danger btn-xs">Hapus</button></a>
	                  </td>
	              </tr>
	          	  <?php } ?>
              	</tbody>
            </table>
    </div>
</div>