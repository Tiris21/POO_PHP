<?php namespace Models;

	class Seccion{
		private $id;
		private $nombre;
		private $con;

		public function __construct(){
			$this->con = new Conexion();
		}

		public function set($atributo, $contenido){
			$this->$atributo = $contenido;
		}

		public function get($atributo){
			return $this->$atributo;
		}

		public function listar(){
			$query = 'SELECT * FROM secciones';
			return $this->con->consultaRetorno($query);
		}

		public function add(){
			$query = "INSERT INTO secciones(id, nombre) VALUES (NULL, '{$this->nombre}'"
			$this->con->consultaSimple($query);
		}

		public function detele(){
			$query = "DELETE FROM secciones WHERE id = ".$this->id;
			$this->con->consultaSimple($query);
		}

		public function edit(){
			$query = "UPDATE secciones SET nombre = '{$this->nombre}' WHERE id = ".$this->id;
			$this->con->consultaSimple($query);
		}

		public function view(){
			$query = 'SELECT * FROM secciones WHERE id = '.$this->id;
			$datos = $this->con->consultaRetorno($query);
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}
		

	}
 ?>