        <div class="col-md-8">
        	<div class="box box-success">
	            <div class="box-header with-border">
	              <h3 class="box-title">Murid</h3>
	          	</div>
	          	<div class="box-body">
	          		<ul class="products-list product-list-in-box">
	          			<?php foreach ($data['mrd'] as $mrd) { 
	          				if (empty($mrd['gambar'])) {
				                    $data['img'] = ''.BASEURL.'/assets/dist/img/user.png';
				                }else{
				                    $data['img'] = ''.BASEURL.'/assets/dist/img/'.$mrd['gambar'].'';
				                }
	          				?>
		                <li class="item">
		                  <div class="product-img">
		                    <img src="<?= $data['img'] ?>" class="img-circle" alt="User Image">
		                  </div>
		                  <div class="product-info">
		                    <a href="<?= BASEURL ?>/profil/<?= $mrd['id_user'] ?>" class="product-title"><?= $mrd['nama'] ?>
		                      <span class="label label-success pull-right"><?= 'Rp. ' .number_format($mrd['jumlah']) ?></span></a>
		                    <span class="product-description">
		                          <?= $value = ($mrd['jumlah'] != "") ? 'Terakhir bayar kas pada ' .$mrd['tgl']. '' : 'Belum pernah membayar uang kas.'; ?>
		                        </span>
		                  </div>
		                </li>
		            	<?php } ?>
		            </ul>

		            <?php
		            if (empty($_GET['hal'])) {
		              $halaman_aktif = '1';
		            } else {
		              $halaman_aktif = $_GET['hal'];
		            }
		            ?>

		            <div style="text-align: center;">
		            	<nav>
			              <ul class="pagination">
			              <!-- Button untuk halaman sebelumnya -->
			              <?php 
			              if ($halaman_aktif<='1') { ?>
			                <li class="disabled">
			                  <a href="" aria-label="Previous">
			                    <span aria-hidden="true">&laquo;</span>
			                  </a>
			                </li>
			              <?php
			              } else { ?>
			                <li>
			                  <a href="?hal=<?= $data['page'] - 1 ?>" aria-label="Previous">
			                    <span aria-hidden="true">&laquo;</span>
			                  </a>
			                </li>
			              <?php
			              }
			              ?>

			              <!-- Link halaman 1 2 3 ... -->
			              <?php 
			              for($x=1; $x<=$data['halaman']; $x++) { ?>
			                <li class="">
			                  <a href="?hal=<?= $x ?>"><?php echo $x ?></a>
			                </li>
			              <?php
			              }
			              ?>

			              <!-- Button untuk halaman selanjutnya -->
			              <?php 
			              if ($halaman_aktif >= $data['halaman']) { ?>
			                <li class="disabled">
			                  <a href="" aria-label="Next">
			                    <span aria-hidden="true">&raquo;</span>
			                  </a>
			                </li>
			              <?php
			              } else { ?>
			                <li>
			                  <a href="?hal=<?= $data['page'] +1 ?>" aria-label="Next">
			                    <span aria-hidden="true">&raquo;</span>
			                  </a>
			                </li>
			              <?php
			              }
			              ?>
			              </ul>
			            </nav>
		            </div>
	          	</div>
	        </div>
        </div>
    </div>