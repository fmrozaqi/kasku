<div class="col-md-8">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title" style="margin-right: 10px;">Bayar Kas</h3>
    </div>
    <div class="box-body" style="text-align: center;">
      <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <!-- <h4><i class="icon fa fa-ban"></i> Alert!</h4> -->
        Silahkan lakukan transfer GOPAY ke nomor 08122614615 atau dengan scan QR CODE di bawah ini
      </div>
      <div class="row">
        <img src="<?= BASEURL ?>/assets/dist/img/qrcode.jpg" style="width:50%" class="mx-auto d-block" alt="Nomor Gopay">
      </div>
      <div class="row" style="margin-top: 10px;">
        <button class="btn btn-primary mt-4" data-clipboard-text="08122614615" id="copy_nomor">Copy nomor</button>
      </div>

      <hr>

      <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <!-- <h4><i class="icon fa fa-ban"></i> Alert!</h4> -->
        Silahkan masukkan nominal uang kas yang ingin di bayarkan. Selanjutnya Admin (bendahara) akan mengkonfirmasi pembayaran kas Anda dan akan tampil di halaman Rincian Kas.
      </div>
      
      <form class="form-horizontal" action="<?= BASEURL; ?>/bayar/proses/<?= $data['user']['username'] ?>" method="POST">
        <h4>Masukkan Jumlah</h4>
        <div class="row">
          <div class="col-sm-3"></div>
          <div class="col-sm-6">
            <input type="number" name="jlh" class="form-control" placeholder="10000" required>
            <button type="submit" name="bayar" class="btn btn-success btn-lg" style="margin-top: 15px;margin-bottom: 15px;">Bayar</button>
          </div>
          <div class="col-sm-3"></div>
        </div>
      </form>
    </div>
    <!-- /.box-body -->
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>
</div>