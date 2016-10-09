<?php
class banner_index{
	private $db;
	public $table;
	public $tId;
	
	public function __construct(){
		include_once('consultas.class.php');
		$this->table = "banner_index";
		$this->tId = "ID_Banner_index";
		$this->db = new Consultas($this->table, $this->tId);
		$this->db->fields = array (
			array ('private',	'ID_Banner_index', "''"),
			array ('public',    'Nombre'),
			array ('public',    'img'),
			array ('public',    'pagina_siguiente'),
		);
	}
	
	public function listar($where=false,$orden=false,$count=false,$start=false){
		return $this->db->getRecords($where,$orden,$count,$start);
	}
	
	public function agregar($nombre, $img, $pagina_siguiente){
		$data[] = $nombre;
		$data[] = $img;
		$data[] = $pagina_siguiente;
		$this->db->insertRecord($data);
		$id = $this->db->return_id();
		return $id;
	}
	
	public function consultar($id){
		return $this->db->getRecord($id);
	}
	
	public function editar($id, $nombre,$img, $pagina_siguiente){
		$data[] = $nombre;
		$data[] = $img;
		$data[] = $pagina_siguiente;
		$this->db->updateRecord($id,$data);
	}
	
	public function borrar($id){
		$this->db->deleteRecord($id);
	}
}
?>