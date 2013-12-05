<?php 
	class AnimalsController {
		public function getAction($request) {
			$data["animals"] = AnimalsModel::getAll();
			return $data;
		}
	}
?>