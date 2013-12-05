<?php

class FeedingsModel{
	public $id, $animalID, $description, $placeID, $time, $type, $place, $animal;

	public function __construct($id = NULL, $animalID = NULL, $description = NULL, $placeID = NULL, $time = NULL, $type = NULL){
		$this->id = $id;
		$this->animalID = $animalID;
		$this->description = $description;
		$this->placeID = $placeID;
		$this->time = $time;
		$this->type = $type;
	}
	
	/*
	 *Instance methods
	 */
	public function get($id = NULL){
		if ($id) $this -> id = $id;
		$db = DB::getInstance();
		$stmt = $db -> prepare("SELECT * FROM bc_feedings WHERE id = ?");
		if ($stmt === FALSE || $stmt->errno) die ($db -> error);
		$stmt -> bind_param("i", $this -> id);
		if ($stmt -> execute() === FALSE) die ($db -> error);
		$stmt -> bind_result($this -> id, $this -> animalID, $this -> description, $this -> placeID);
		$stmt -> fetch();
		$db -> close();
		return $this;
	}
	
	public function add() {
		$db = DB::getInstance();
		$stmt = $db -> prepare("INSERT INTO bc_feedings (animalID, description, placeID, time, type) VALUES (?,?,?,?,?)");
		if ($stmt === FALSE || $stmt->errno) die ($db -> error);
		$stmt -> bind_param("isiss", $this -> animalID, $this -> description, $this -> placeID, $this -> time, $this -> type);
		$result = $stmt -> execute();
		$db -> close();
		return $result;
	}
	
	public function remove($id = NULL) {
		if ($id) $this -> id = $id;
		$db = DB::getInstance();
		$stmt = $db -> prepare("DELETE FROM bc_feedings WHERE id = ?");
		if ($stmt === FALSE || $stmt->errno) die ($db -> error);
		$stmt -> bind_param("i", $this -> id);
		$result = $stmt -> execute();
		$db -> close();
		$this -> id = NULL;
		return $result ? true : false;
	}
	
	/*
	 *Class methods
	 */
	public static function getAll($areaID = null, $between = null, $and = null){
		$db = DB::getInstance();
		if ($between && $and) $query = $db -> query("SELECT * FROM bc_feedings WHERE time BETWEEN '$between' AND '$and' ORDER BY time ASC");
		else $query = $db -> query("SELECT * FROM bc_feedings ORDER BY time ASC");
		if ($query == FALSE) die($db->error);
		$result = array();
		while ($assoc = $query->fetch_assoc()) {
			$feeding = new self($assoc["id"], $assoc["animalID"], $assoc["description"], $assoc["placeID"], $assoc["time"], $assoc["type"]);
			$placesModel = new PlacesModel($feeding -> placeID);
			$animalsModel = new AnimalsModel($feeding -> animalID);
			$feeding -> animal = $animalsModel -> get();
			$feeding -> place = $placesModel -> get();
			array_push($result, $feeding);			
		}
		return $result;
	}

}

?>
