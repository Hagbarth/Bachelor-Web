<?php

class AreasModel{
	public $id, $name, $visitors;
	
	public function __construct($id = NULL, $name = NULL, $visitors = NULL){
		$this -> id = $id;
		$this -> name = $name;
		$this -> visitors = $visitors;

	}

	public function __get($property) {
		if (property_exists($this, $property)) {
			return $this -> $property;  }
	}
	
	public function get($id = NULL){
		if ($id) $this -> id = $id;
		$db = DB::getInstance();
		$stmt = $db -> prepare("SELECT * FROM bc_areas WHERE id = ?");
		if ($stmt === FALSE || $stmt->errno) die ($db -> error);
		$stmt -> bind_param("i", $this -> id);
		if ($stmt -> execute() === FALSE) die ($db -> error);
		$stmt -> bind_result($this -> id, $this -> name, $this -> visitors);
		$stmt -> fetch();
		$stmt -> close();
		$db -> close();
		return $this;
	}
	
	public static function getAll() {
		$db = DB::getInstance();
		$query = $db -> query("SELECT * FROM bc_areas");
		if ($query == FALSE) die($db->error);
		$result = array();
		while ($assoc = $query->fetch_assoc()) {
			$area = new self($assoc["id"], $assoc["name"], $assoc["visitors"]);
			array_push($result, $area);			
		}
		return $result;
	}
}

?>