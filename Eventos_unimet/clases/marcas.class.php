<?php
class marcas{
	private $db;
	public $table;
	public $tId;
	
	public function __construct(){
		include_once('consultas.class.php');
		$this->table = "header";
		$this->tId = "ID_header";
		$this->db = new Consultas($this->table, $this->tId);
		$this->db->fields = array (
			array ('private',	'ID_header', "''"),
			array ('public',    'Logo_img'),
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