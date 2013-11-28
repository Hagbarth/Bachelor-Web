<?php

class AnimalsModel{
	public $id, $name;

	public function __construct($id = NULL, $name = NULL){
		$this->id = $id;
		$this->name = $name;
	}

	public function __get($property) {
		if (property_exists($this, $property)) {return $this->$property;  }
	}
	
	public function get($id = NULL){
		if ($id) $this -> id = $id;
		$db = DB::getInstance();
		$stmt = $db -> prepare("SELECT * FROM bc_animals WHERE id = ?");
		if ($stmt === FALSE || $stmt->errno) die ($db -> error);
		$stmt -> bind_param("i", $this -> id);
		if ($stmt -> execute() === FALSE) die ($db -> error);
		$stmt -> bind_result($this -> id, $this -> name);
		$stmt -> fetch();
		$stmt -> close();
		$db -> close();
		return $this;
	}
	
	public static function getAll() {
		$db = DB::getInstance();
		$query = $db -> query("SELECT * FROM bc_animals");
		if ($query == FALSE) die($db->error);
		$result = array();
		while ($assoc = $query->fetch_assoc()) {
			$animal = new self($assoc["id"], $assoc["name"]);
			array_push($result, $animal);			
		}
		return $result;
	}

}

?>