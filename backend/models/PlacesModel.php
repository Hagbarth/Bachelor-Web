<?php

class PlacesModel{
	public $id, $areaID, $name, $area;
	public function __construct($id = NULL, $areaID = NULL, $name = NULL, $x = NULL, $y = NULL){
		$this->id = $id;
		$this->areaID = $areaID;
		$this->name = $name;
		$this->x = $x;
		$this->y = $y;
	}

	public function __get($property) {
		if (property_exists($this, $property)) {
			return $this->$property;  }
	}
	
	public function get($id = NULL){
		if ($id) $this -> id = $id;
		$db = DB::getInstance();
		$stmt = $db -> prepare("SELECT * FROM bc_places WHERE id = ?");
		if ($stmt === FALSE || $stmt->errno) die ($db -> error);
		$stmt -> bind_param("i", $this -> id);
		if ($stmt -> execute() === FALSE) die ($db -> error);
		$stmt -> bind_result($this -> id, $this -> areaID, $this -> name, $this->x, $this->y);
		$stmt -> fetch();
		$stmt -> close();
		$db -> close();
		$areaModel = new AreasModel($this -> areaID);
		$this -> area = $areaModel -> get();
		return $this;
	}
	
	public static function getAll(){
		$db = DB::getInstance();
		$query = $db -> query("SELECT * FROM bc_places");
		if ($query == FALSE) die($db->error);
		$result = array();
		while ($assoc = $query->fetch_assoc()) {
			$place = new self($assoc["id"], $assoc["areaID"], $assoc["name"]);
			$areaModel = new AreasModel($place -> areaID);
			$place -> area = $areaModel -> get();
			array_push($result, $place);			
		}
		return $result;
	}

}

?>