<?php namespace Config;

	class Enrutador{

		public static function run(Request $request){
			$controlador = $request->getControlador() . 'Controller';
			$ruta = ROOT . 'Controllers' . DS . $controlador . '.php';

			$metodo = $request->getMetodo();
			$argumento = $request->getArgumento();

			if (is_readable($ruta)) {
				require_once $ruta;
				$aux = "Controllers\\" . $controlador;
				$controlador = new $aux;

				if (!isset($argumento)) {
					$datos = call_user_func( array($controlador, $metodo));
				}else{
					$datos = call_user_func_array( array($controlador, $metodo), $argumento);
				}

			}else{
				echo "error 404 file dont found";
			}


			// Cargar vista
			session_start();
			$_SESSION['id_usuario'] = 124;
			// SI NO ESTA LOGGEADO O ENTRA AL INDEX CONTROLADOR DEL LOGIN
			if ( ($request->getControlador() == 'login' &&  $metodo == 'index') || ( !isset($_SESSION['id_usuario'])) ) {
				$ruta_login = ROOT . 'Views' . DS . 'template' . DS . 'login.php';
				require_once $ruta_login;
			}else{

				$ruta_vista = ROOT . 'Views' . DS . $request->getControlador() . DS . $metodo . '.php';
				if (is_readable($ruta_vista)) {
					
					$ruta_head = ROOT . 'Views' . DS . 'template' . DS . 'head.php';
					require_once $ruta_head;
					
					$ruta_menu = ROOT . 'Views' . DS . 'template' . DS . 'menu.php';
					require_once $ruta_menu;

					$ruta_prueba = ROOT . 'Views' . DS . 'template' . DS . 'blank.php';
					require_once $ruta_prueba;

					//require_once $ruta_vista;

					$ruta_footer = ROOT . 'Views' . DS . 'template' . DS . 'footer.php';
					require_once $ruta_footer;

				

				}else{
					echo 'no se encontro el archivo: ' . $ruta_vista;
				}
			}


		}
	}


 ?>