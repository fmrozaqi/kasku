</section>
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <strong>Copyright &copy; <?= date('Y') ?> <a href="<?= BASEURL ?>">Ka$Ku</a>.</strong> All rights
      reserved.
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->

<!-- Clipboard -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.10/clipboard.min.js"></script>
<!-- jQuery 3 -->
<script src="<?= BASEURL ?>/assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= BASEURL ?>/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?= BASEURL ?>/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= BASEURL ?>/assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= BASEURL ?>/assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= BASEURL ?>/assets/dist/js/demo.js"></script>

<script src="<?= BASEURL ?>/app/librarys/Pagination/vendor/stefangabos/zebra_pagination/public/javascript/zebra_pagination.js"></script>

<!-- DataTables -->
<script src="<?= BASEURL ?>/assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= BASEURL ?>/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#datatable').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : false
    })
  })
</script>

<script>
  $('#copy_nomor').tooltip({
    trigger: 'click',
    placement: 'bottom'
  });

  function setTooltip(message) {
    $('#copy_nomor').tooltip('hide')
      .attr('data-original-title', message)
      .tooltip('show');
  }

  function hideTooltip() {
    setTimeout(function() {
      $('#copy_nomor').tooltip('hide');
    }, 1000);
  }

  // Clipboard

  var clipboard = new Clipboard('#copy_nomor');

  clipboard.on('success', function(e) {
    setTooltip('Copied!');
    hideTooltip();
  });

  clipboard.on('error', function(e) {
    setTooltip('Failed!');
    hideTooltip();
  });
</script>
</body>
</html>
