<?php 
	class FeedingsController {
		public function getAction($request) {
			if (isset($request->url_elements[1])) {
				switch ($request->url_elements[1]) {
					case "current":
						$data["feedings"] = FeedingsModel::getAll(NULL, date("Y-m-d H:i:s"), date("Y-m-d H:i:s", time() + 900));
						break;
					case "atTime":
						if (isset($request->url_elements[2])) {
							$time = strtotime($request->url_elements[2]);
							$date = date("Y-m-d H:i:s", $time);
							$later = date("Y-m-d H:i:s", $time + 900);
							$data["feedings"] = FeedingsModel::getAll(NULL, $date, $later);
						} else {
							$data["success"] = false;
						}
						break;
				} 
			} else {
				$data["feedings"] = FeedingsModel::getAll();
			}
			return $data;
		}
		
		public function postAction($request) {
			if (isset($request->url_elements[1])) {
				$in_data = $request->parameters;
				$feeding_id = intval($in_data["id"]);
				$feeding = new FeedingsModel($feeding_id);
				$data["success"] = $feeding -> remove();
				$data["message"] = $data["success"] ? "Feeding $feeding_id deleted" : "An unknown error happened";
			} else {
				$attributes = $request->parameters;
				$feed = new FeedingsModel();
				$errorNumber = 1;
				foreach (get_object_vars($feed) as $variable => $value) {
					if ($variable != "id" && $variable != "animal" && $variable != "place") {
						if ( !isset($attributes[$variable]) ) {
							$data["success"] = false;
							$data["message"] = "You are missing $i variables, see 'errors' for more info";
							$i++;
							$data["errors"][$i] = "Variable '$variable' is missing";
						} else {
							$feed->$variable = $attributes[$variable];
						}
					}
				}
				
				$feed->time = str_replace("/", "-", $feed->time);
				$feed->time = date("Y-m-d H:i:s", strtotime($feed->time));
				$data["success"] = $feed->add() ? true : false;
				$data["message"] = $data["success"] ? "Feeding added" : "An unknown error happened";
			}
		
			return $data;
		}
	}
?>