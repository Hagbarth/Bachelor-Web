<?php 
	class AreasController {
		public function getAction($request) {
			$data["areas"] = AreasModel::getAll();
			return $data;
		}
	}
?>