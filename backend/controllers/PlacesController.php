<?php 
	class PlacesController {
		public function getAction($request) {
			$data["places"] = PlacesModel::getAll();
			return $data;
		}
	}
?>