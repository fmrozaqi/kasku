
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title" style="margin-right: 10px;">Ubah Data Murid </h3>
          <a href="<?= BASEURL ?>/admin/data_murid" class="btn btn-success btn-xs">Kembali</a>
        </div>
        <form class="form-horizontal" action="<?= BASEURL; ?>/admin/ubah_data_murid" method="POST">
          <div class="box-body">
          	<input type="hidden" name="id" value="<?= $data['mrd']['id_user'] ?>">
            <div class="form-group">
                  <label class="col-sm-3 control-label">Nomor Induk</label>
                  <div class="col-sm-5">
                    <input type="text" name="nim" class="form-control" value="<?= $data['mrd']['username'] ?>" readonly="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama</label>
                  <div class="col-sm-5">
                    <input type="text" name="nama" class="form-control" value="<?= $data['mrd']['nama'] ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Kelas</label>
                  <div class="col-sm-5">
                    <input type="text" name="kls" class="form-control" value="<?= $data['mrd']['kelas'] ?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-10">
                    <div class="checkbox">
                      <button type="submit" name="ubah" class="btn btn-primary">Simpan</button>
                      <!-- <a href="index.php?page=siswa"><button class="btn btn-warning">Kembali</button></a> -->
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
            </form>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->