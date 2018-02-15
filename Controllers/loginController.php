<?php 
	namespace Controllers;

	use Models\Estudiante as Estudiante;

	class loginController{

		private $estudiante;

		public function __construct(){
			$this->estudiante = new Estudiante();
		}

		public function index(){
			// $datos = $this->estudiante->listar();

			// if ($_POST) {
			
			// $correo = $_POST['correo'];
			// $password = $_POST['password'];

			// 	foreach ($datos as $key ) {
			// 		if ($key['email']==$correo && $key['pass']==$password) {
			// 			session_start();
			// 			// $_SESSION['login'] = true;
			// 			// $_SESSION['correo_admin'] = $correo;
			// 			// $_SESSION['usuario'] = $key['usuario'];

			// 			// header("Location: " . URL . "home");	
			// 		}
			// 	}

			// }
			
			return '$datos';
		}

		public function logout(){
			session_start();
			if (isset($_SESSION['cliente'])) {
				unset($_SESSION['correo_admin']);
			}else{	
				session_unset(); 
				session_destroy();
			} 
			header("Location: " . URL . "login");
			return ['vista' => 'false'];
		}

	}

?>