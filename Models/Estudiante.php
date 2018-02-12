<?php namespace Models;

	class Estudiante{
		private $id;
		private $nombre;
		private $edad;
		private $promedio;
		private $imagen;
		private $id_seccion;
		private $fecha;
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
			$query = 'SELECT e.*, s.nombre as seccion FROM estudiantes e INNER JOIN secciones s ON e.id_seccion = s.id';
			return $this->con->consultaRetorno($query);
		}

		public function add(){
			$query = "INSERT INTO estudiantes(id, nombre, edad, promedio, imagen, id_seccion, fecha) 
				VALUES (NULL, '{$this->nombre}', '{$this->edad}', '{$this->promedio}', '{$this->imagen}', '{$this->id_seccion}', NOW())";
			$this->con->consultaSimple($query);
		}

		public function detele(){
			$query = "DELETE FROM estudiantes WHERE id = ".$this->id;
			$this->con->consultaSimple($query);
		}

		public function edit(){
			$query = "UPDATE estudiantes SET nombre = '{$this->nombre}', edad = '{$this->edad}', promedio = '{$this->promedio}',
					id_seccion = '{$this->id_seccion}' WHERE id = ".$this->id;
			$this->con->consultaSimple($query);
		}

		public function view(){
			$query = 'SELECT e.*, s.nombre FROM estudiantes e INNER JOIN secciones s ON e.id_seccion = s.id WHERE e.id = '.$this->id;
			$datos = $this->con->consultaRetorno($query);
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}

		public function viewId($id){
			$query = 'SELECT e.*, s.nombre FROM estudiantes e INNER JOIN secciones s ON e.id_seccion = s.id WHERE e.id = '.$id;
			$datos = $this->con->consultaRetorno($query);
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}
		

	}
 ?>