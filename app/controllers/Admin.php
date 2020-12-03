<?php

/**
 * 
 */
class Admin extends Controller
{
	
	//tampil dashboar
	public function index()
	{

		if (!isset($_SESSION['idAdmin'])) {
			header('Location:'.BASEURL.'/admin/login');
		}else{
			$data['judul'] = 'Administrator';
			$data['countTunggu'] = $this->model('KasMasuk')->getDataByStatusMenunggu();
			if ($data['countTunggu'] >= 1) {
				$data['count'] = '<span class="pull-right-container">
	              <span class="label label-primary pull-right">'.$data['countTunggu'].'</span>
	            </span>';
			}else{
				$data['count'] = '';
			}

			$data['masuk'] = $this->model('KasMasuk')->getLimitData(4);
			$data['mrd'] = $this->model('Murid')->getLimitData(0,3);
			$data['countSiswa'] = $this->model('Murid')->getRowCount();
            $data['keluar'] = $this->model('Kaskeluar')->getAllData();
                foreach ($data['keluar'] as $dd) {
                    $data['jlhKeluar'] = $data['jlhKeluar'] + $dd['jumlah'];
                }
            $data['jumlahMasuk'] = $this->model('KasMasuk')->getDataByStatus();
                foreach ($data['jumlahMasuk'] as $d) {
                    $data['jlhMasuk'] = $data['jlhMasuk'] + $d['jumlah'];
                }
            $data['saldo'] = $data['jlhMasuk'] - $data['jlhKeluar'];

			$this->view('admin/header', $data);
			$this->view('admin/dashboard/index', $data);
			$this->view('admin/footer');
		}
	}

	//login admin
	public function login()
	{
		$data['judul'] = 'Login Administrator | Ka$Ku';
		$this->view('admin/login', $data);
	}

	//login process
	public function login_proses()
	{
		if (isset($_POST['login'])) {
			
			if ($this->model('admin_model')->login()) {
				
				header('Location:'.BASEURL.'/admin');
			}else{
				?>
				<script>
					alert('Username atau Password Salah. Silahkan coba lagi.');
					document.location.href="<?= BASEURL ?>/admin";
				</script>
				<?php
			}
		}
	}

	//logout
	public function logout()
	{
		if ($this->model('admin_model')->logout()) {
			header('Location:'.BASEURL.'/admin');
		}
	}

	//tampil form ubah password
	public function ubah_password()
	{
		if (!isset($_SESSION['idAdmin'])) {
			header('Location:'.BASEURL.'/admin/login');
		}else{
			$data['judul'] = 'Ubah Password';
			$data['countTunggu'] = $this->model('KasMasuk')->getDataByStatusMenunggu();
			$data['id'] = $this->model('admin_model')->getUser();
			if ($data['countTunggu'] >= 1) {
				$data['count'] = '<span class="pull-right-container">
	              <span class="label label-primary pull-right">'.$data['countTunggu'].'</span>
	            </span>';
			}else{
				$data['count'] = '';
			}
			$this->view('admin/header', $data);
			$this->view('admin/ubah-password/index', $data);
			$this->view('admin/footer');
		}
	}

	//proses ubah password
	public function ubah_password_proses($id)
	{
		if (isset($_POST['ubah_password'])) {
			
			if ($this->model('admin_model')->ubahPassword($id)) {
				?>
				<script>
					alert('Password berhasil di ubah.');
					document.location.href="<?= BASEURL ?>/admin/ubah_password";
				</script>
				<?php
			}else{
				?>
				<script>
					alert('Password gagal di ubah. Silahkan coba lagi.');
					document.location.href="<?= BASEURL ?>/admin/ubah_password";
				</script>
				<?php
			}
		}
	}

	//tampil data kas masuk
	public function kas_masuk()
	{

		if (!isset($_SESSION['idAdmin'])) {
			header('Location:'.BASEURL.'/admin/login');
		}else{
			$data['judul'] = 'Data Kas Masuk - Administrator';
			$data['masuk'] = $this->model('KasMasuk')->getAllData();
			$data['countTunggu'] = $this->model('KasMasuk')->getDataByStatusMenunggu();
			if ($data['countTunggu'] >= 1) {
				$data['count'] = '<span class="pull-right-container">
	              <span class="label label-primary pull-right">'.$data['countTunggu'].'</span>
	            </span>';
			}else{
				$data['count'] = '';
			}
			$data['byStatus'] = $this->model('KasMasuk')->getDataByStatus();
			foreach ($data['byStatus'] as $d) {
				$data['total'] = $data['total'] + $d['jumlah'];
			}

			$this->view('admin/header', $data);
			$this->view('admin/kas-masuk/tampil', $data);
			$this->view('admin/footer');
		}
		
	}

	//konfirmasi kas
	public function konfirmasi($id)
	{
		$data = $this->model('KasMasuk')->getSingleData($id);
		$nim = $data['nim'];

		if ($this->model('KasMasuk')->konfirmasi($id)) {

			$jumlah = $this->model('KasMasuk')->getSingleJlh($nim);
                foreach ($jumlah as $da) {
                        $jlh = $jlh + $da['jumlah'];
                    }
            if ($this->model('KasMasuk')->ubahJumlahKasUser($nim, $jlh)) {
            	?>
				<script>
					alert('Berhasil.');
					document.location.href="<?= BASEURL ?>/admin/kas_masuk";
				</script>
				<?php
            }
		}
	}

	//hapus kas masuk
	public function hapus_kas_masuk($id)
	{
		if ($this->model('KasMasuk')->hapus_masuk($id)) {
				?>
				<script>
					alert('Data berhasil di hapus. ');
					document.location.href="<?= BASEURL; ?>/admin/kas_masuk"
				</script>
				<?php
		}else{
				?>
				<script>
					alert('Data gagal di hapus. ');
					document.location.href="<?= BASEURL; ?>/admin/kas_masuk"
				</script>
				<?php
			}
	}

	//tampil data kas keluar
	public function kas_keluar()
	{

		if (!isset($_SESSION['idAdmin'])) {
			header('Location:'.BASEURL.'/admin/login');
		}else{
			$data['judul'] = 'Data Kas Keluar - Administrator';
			$data['countTunggu'] = $this->model('KasMasuk')->getDataByStatusMenunggu();
			if ($data['countTunggu'] >= 1) {
				$data['count'] = '<span class="pull-right-container">
	              <span class="label label-primary pull-right">'.$data['countTunggu'].'</span>
	            </span>';
			}else{
				$data['count'] = '';
			}
			$data['keluar'] = $this->model('KasKeluar')->getAllData();
			foreach ($data['keluar'] as $d) {
				$data['total'] = $data['total'] + $d['jumlah'];
			}
			$this->view('admin/header', $data);
			$this->view('admin/kas-keluar/tampil', $data);
			$this->view('admin/footer');
		}
	}

	//tampil form tambah kas keluar
	public function tambah_keluar()
	{
		if (!isset($_SESSION['idAdmin'])) {
			header('Location:'.BASEURL.'/admin/login');
		}else{
			$data['judul'] = 'Tambah Data Kas Keluar - Administrator';
			$data['countTunggu'] = $this->model('KasMasuk')->getDataByStatusMenunggu();
			if ($data['countTunggu'] >= 1) {
				$data['count'] = '<span class="pull-right-container">
	              <span class="label label-primary pull-right">'.$data['countTunggu'].'</span>
	            </span>';
			}else{
				$data['count'] = '';
			}
			$this->view('admin/header', $data);
			$this->view('admin/kas-keluar/tambah');
			$this->view('admin/footer');
		}
	}

	//tampil form ubah kas keluar
	public function ubah_keluar($id)
	{
		if (!isset($_SESSION['idAdmin'])) {
			header('Location:'.BASEURL.'/admin/login');
		}else{
			$data['judul'] = 'Ubah Data Kas Keluar - Administrator';
			$data['countTunggu'] = $this->model('KasMasuk')->getDataByStatusMenunggu();
			if ($data['countTunggu'] >= 1) {
				$data['count'] = '<span class="pull-right-container">
	              <span class="label label-primary pull-right">'.$data['countTunggu'].'</span>
	            </span>';
			}else{
				$data['count'] = '';
			}
			$data['keluar'] = $this->model('KasKeluar')->getSingleData($id);
			$this->view('admin/header', $data);
			$this->view('admin/kas-keluar/ubah', $data);
			$this->view('admin/footer');
		}
	}

	//insert ke tb kas keluar
	public function tambah_kas_keluar()
	{
		if (isset($_POST['tambah'])) {

			if ($this->model('KasKeluar')->tambah_keluar($_POST)) {
				?>
				<script>
					alert('Data berhasil di tambahkan. ');
					document.location.href="<?= BASEURL; ?>/admin/kas_keluar"
				</script>
				<?php
			}else{
				?>
				<script>
					alert('Data gagal di tambahkan. ');
					document.location.href="<?= BASEURL; ?>/admin/kas_keluar"
				</script>
				<?php
			}
		}
	}

	//update ke tb kas keluar
	public function ubah_kas_keluar()
	{
		if (isset($_POST['ubah'])) {

			if ($this->model('KasKeluar')->ubah_keluar($_POST)) {
				?>
				<script>
					alert('Data berhasil di ubah. ');
					document.location.href="<?= BASEURL; ?>/admin/kas_keluar"
				</script>
				<?php
			}else{
				?>
				<script>
					alert('Data gagal di ubah. ');
					document.location.href="<?= BASEURL; ?>/admin/kas_keluar"
				</script>
				<?php
			}
		}
	}

	//delete ke tb kas keluar
	public function hapus_kas_keluar($id)
	{
		if ($this->model('KasKeluar')->hapus_keluar($id)) {
				?>
				<script>
					alert('Data berhasil di hapus. ');
					document.location.href="<?= BASEURL; ?>/admin/kas_keluar"
				</script>
				<?php
		}else{
				?>
				<script>
					alert('Data gagal di hapus. ');
					document.location.href="<?= BASEURL; ?>/admin/kas_keluar"
				</script>
				<?php
			}
	}

	//tampil data murid
	public function data_murid()
	{
		if (!isset($_SESSION['idAdmin'])) {
			header('Location:'.BASEURL.'/admin/login');
		}else{
			$data['judul'] = 'Data Murid - Administrator';
			$data['countTunggu'] = $this->model('KasMasuk')->getDataByStatusMenunggu();
			if ($data['countTunggu'] >= 1) {
				$data['count'] = '<span class="pull-right-container">
	              <span class="label label-primary pull-right">'.$data['countTunggu'].'</span>
	            </span>';
			}else{
				$data['count'] = '';
			}
			$data['mrd'] = $this->model('Murid')->getAllData();
			$this->view('admin/header', $data);
			$this->view('admin/murid/tampil', $data);
			$this->view('admin/footer');
		}
	}

	//tampil form tambah murid
	public function tambah_murid()
	{
		if (!isset($_SESSION['idAdmin'])) {
			header('Location:'.BASEURL.'/admin/login');
		}else{
			$data['judul'] = 'Tambah Data Murid - Administrator';
			$data['countTunggu'] = $this->model('KasMasuk')->getDataByStatusMenunggu();
			if ($data['countTunggu'] >= 1) {
				$data['count'] = '<span class="pull-right-container">
	              <span class="label label-primary pull-right">'.$data['countTunggu'].'</span>
	            </span>';
			}else{
				$data['count'] = '';
			}
			$this->view('admin/header', $data);
			$this->view('admin/murid/tambah');
			$this->view('admin/footer');
		}
	}

	//tampil form ubah murid
	public function ubah_murid($id)
	{
		if (!isset($_SESSION['idAdmin'])) {
			header('Location:'.BASEURL.'/admin/login');
		}else{
			$data['judul'] = 'Ubah Data Murid - Administrator';
			$data['countTunggu'] = $this->model('KasMasuk')->getDataByStatusMenunggu();
			if ($data['countTunggu'] >= 1) {
				$data['count'] = '<span class="pull-right-container">
	              <span class="label label-primary pull-right">'.$data['countTunggu'].'</span>
	            </span>';
			}else{
				$data['count'] = '';
			}
			$data['mrd'] = $this->model('Murid')->getSingleData($id);
			$this->view('admin/header', $data);
			$this->view('admin/murid/ubah', $data);
			$this->view('admin/footer');
		}
	}

	//tampil form import murid
	public function import_murid()
	{
		if (!isset($_SESSION['idAdmin'])) {
			header('Location:'.BASEURL.'/admin/login');
		}else{
			$data['judul'] = 'Import Data Murid - Administrator';
			$data['countTunggu'] = $this->model('KasMasuk')->getDataByStatusMenunggu();
			if ($data['countTunggu'] >= 1) {
				$data['count'] = '<span class="pull-right-container">
	              <span class="label label-primary pull-right">'.$data['countTunggu'].'</span>
	            </span>';
			}else{
				$data['count'] = '';
			}
			$this->view('admin/header', $data);
			$this->view('admin/murid/import', $data);
			$this->view('admin/footer');
		}
	}

	//insert ke tb user/murid
	public function tambah_data_murid()
	{
		if (isset($_POST['tambah'])) {

			if ($this->model('Murid')->tambah_murid($_POST)) {
				?>
				<script>
					alert('Data berhasil di tambahkan. ');
					document.location.href="<?= BASEURL; ?>/admin/data_murid"
				</script>
				<?php
			}else{
				?>
				<script>
					alert('Data gagal di tambahkan. ');
					document.location.href="<?= BASEURL; ?>/admin/data_murid"
				</script>
				<?php
			}
		}
	}

	//update ke tb user/murid
	public function ubah_data_murid()
	{
		if (isset($_POST['ubah'])) {

			if ($this->model('Murid')->ubah_murid($_POST)) {
				?>
				<script>
					alert('Data berhasil di ubah. ');
					document.location.href="<?= BASEURL; ?>/admin/data_murid"
				</script>
				<?php
			}else{
				?>
				<script>
					alert('Data gagal di ubah. ');
					document.location.href="<?= BASEURL; ?>/admin/data_murid"
				</script>
				<?php
			}
		}
	}

	//hapus ke tb user/murid
	public function hapus_murid($id)
	{
		if ($this->model('Murid')->hapus_murid($id)) {
				?>
				<script>
					alert('Data berhasil di hapus. ');
					document.location.href="<?= BASEURL; ?>/admin/data_murid"
				</script>
				<?php
		}else{
				?>
				<script>
					alert('Data gagal di hapus. ');
					document.location.href="<?= BASEURL; ?>/admin/data_murid"
				</script>
				<?php
			}
		}

	//import data murid
	public function import_data_murid()
	{
		if (isset($_POST['import'])) {
			if (!$this->model('Murid')->import_murid()) {
				?>
				<script>
					alert('Data berhasil di import dan di tambahkan. ');
					document.location.href="<?= BASEURL; ?>/admin/data_murid"
				</script>
				<?php
			}else{
				?>
				<script>
					alert('Data gagal di import dan di tambahkan. ');
					document.location.href="<?= BASEURL; ?>/admin/data_murid"
				</script>
				<?php
			}
		}
	}

	public function delAllKasMasuk()
	{
		if ($this->model('KasMasuk')->delAllData()) {
			
			?>
			<script>
				alert('Data berhasil di hapus.');
				document.location.href="<?= BASEURL ?>/admin/kas_masuk";
			</script>
			<?php
		}else{
			?>
			<script>
				alert('Terjadi keasalahan. Silahkan coba lagi.');
				document.location.href="<?= BASEURL ?>/admin/kas_masuk";
			</script>
			<?php
		}
	}

	public function delAllKasKeluar()
	{
		if ($this->model('KasKeluar')->delAllData()) {
			
			?>
			<script>
				alert('Data berhasil di hapus.');
				document.location.href="<?= BASEURL ?>/admin/kas_keluar";
			</script>
			<?php
		}else{
			?>
			<script>
				alert('Terjadi keasalahan. Silahkan coba lagi.');
				document.location.href="<?= BASEURL ?>/admin/kas_keluar";
			</script>
			<?php
		}
	}

	public function delAllMurid()
	{
		if ($this->model('Murid')->delAllData()) {
			
			?>
			<script>
				alert('Data berhasil di hapus.');
				document.location.href="<?= BASEURL ?>/admin/data_murid";
			</script>
			<?php
		}else{
			?>
			<script>
				alert('Terjadi keasalahan. Silahkan coba lagi.');
				document.location.href="<?= BASEURL ?>/admin/data_murid";
			</script>
			<?php
		}
	}
}