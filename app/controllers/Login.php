<?php
/**
 * 
 */
class Login extends Controller
{
	
	//tampil halaman login
	public function index()
	{
		$data['judul'] = 'Login';
		$this->view('login', $data);
	}

	//fungsi ambil data post login
	public function loginUser()
	{
		if (isset($_POST['login'])) {

			$user = $_POST['nim'];
			$pass = $_POST['pass'];

			if ($this->model('Murid')->cekLogin($user, $pass)) {
				header('Location:'.BASEURL.'');
			}else{
				?>
				<script>
					alert('Nomor Induk atau Password salah. Silahkan coba lagi');
					document.location.href="<?= BASEURL ?>/login";
				</script>
				<?php
			}
		}
	}

}