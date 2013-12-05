<?php

$db = new mysqli("mysql.cs.au.dk", "spjer", "R8TxusRB", "spjer");

$query = $db->query("SHOW TABLES FROM spjer");

?>
<form method="post">
<select name="table">
	<?php while($result = $query->fetch_assoc()): ?>
		<option><?= $result["Tables_in_spjer"] ?></option>
	<?php endwhile ?>
	<input type="text" name="className" />
	<input type="submit" value="generer" />
</select>
</form>
	
<?php 
if (isset($_POST["table"])) {
$name = $_POST["className"];
$classString = "<?php

class $name{
	public ";

$table = $_POST["table"];
$fields = array();

$query = $db->query("SHOW COLUMNS FROM $table");

while($result = $query->fetch_assoc()) {
	var_dump($result);
	array_push($fields, $result["Field"]);
}

$i = 1;
foreach ($fields as $field){
	if ($i < count($fields)) $classString .= "$".$field.", ";
	else $classString .= "$".$field.";";
	$i++;
}

$classString .= "

	public function __construct(";

$i = 1;	
foreach ($fields as $field){
	if ($i < count($fields)) $classString .= "$".$field." = NULL, ";
	else $classString .= "$".$field." = NULL";
	$i++;
}

$classString .= "){
	";

foreach ($fields as $field){
		$classString .= '$this->'.$field.' = $'.$field.';
		';			
}

$classString .= '
	}

	public function __get($property) {
		if (property_exists($this, $property)) {return $this->$property;  }
	}
}
';

$classString .= "
?>";

$file = fopen($name.".php", 'w');
fwrite($file, $classString);
chmod($name.".php", 0777);
}
?>
