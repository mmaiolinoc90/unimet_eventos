<?php
class usuario_interno{
	private $db;
	public $table;
	public $tId;
	
	public function __construct(){
		include_once('consultas.class.php');
		$this->table = "usuario_interno";
		$this->tId = "id_usuario_interno";
		$this->db = new Consultas($this->table, $this->tId);
		$this->db->fields = array (
			array ('private',	'id_usuario_interno', "''"),
			array ('public',    'nombre'),
			array ('public',    'apellido'),
			array ('public',    'cedula'),
			array ('public',    'correo'),
			array ('public',    'dependencia'),
			array ('public',    'nro_ext'),
			array ('public',    'otro_num')
		);
	}
	
	public function listar($where=false,$orden=false,$count=false,$start=false){
		return $this->db->getRecords($where,$orden,$count,$start);
	}
	
	public function agregar($nombre, $Logo_img){
		$data[] = $Logo_img;
		$this->db->insertRecord($data);
		$id = $this->db->return_id();
		return $id;
	}
	
	public function consultar($id){
		return $this->db->getRecord($id);
	}
	
	public function editar($id,$Logo_img){
		$data[] = $Logo_img;
		$this->db->updateRecord($id,$data);
	}
	
	public function borrar($id){
		$this->db->deleteRecord($id);
	}
}
?>