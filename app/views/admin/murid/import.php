
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title" style="margin-right: 10px;">Import Data Murid </h3>
          <a href="<?= BASEURL ?>/admin/data_murid" class="btn btn-success btn-xs">Kembali</a>
        </div>
        <form class="form-horizontal" action="<?= BASEURL; ?>/admin/import_data_murid" method="POST" enctype="multipart/form-data">
          <div class="box-body">
            <div class="form-group">
                  <label class="col-sm-3 control-label">Import Data Murid</label>
                  <div class="col-sm-5">
                    <input type="file" name="file" class="form-control" required="">
                    <div class="alert alert-info alert-dismissible" style="margin-top: 10px;">
			                <h4><i class="icon fa fa-check"></i> Petunjuk</h4>
			                Tambah data murid dengan mengimport file. File yang boleh di import adalah Microsoft Excel dengan format .xlsx. Silahkan download contoh file ini, <a href="<?= BASEURL; ?>/assets/contoh/contoh.xlsx">Download.</a>
		              </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-10">
                    <div class="checkbox">
                      <button type="submit" name="import" class="btn btn-primary">Import</button>
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