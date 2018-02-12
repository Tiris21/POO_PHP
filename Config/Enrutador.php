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
			$ruta = ROOT . 'Views' . DS . $request->getControlador() . DS . $metodo . '.php';
			if (is_readable($ruta)) {
				require_once $ruta;
			}else{
				echo 'no se encontro la ruta';
			}

		}
	}


 ?>