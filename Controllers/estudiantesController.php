<?php namespace Controllers;
	
	use Models\Estudiante as Estudiante;

	class estudiantesController{

		private $estudiante;

		public function __construct(){
			$this->estudiante = new Estudiante();
		}

		public function index(){
			$datos = $this->estudiante->listar();
			return $datos;
		}
	} 


 ?>