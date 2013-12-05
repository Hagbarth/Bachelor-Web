var rainforestApp = angular.module('rainforestApp', []);


rainforestApp.controller('RainforestController', function($scope, $http, $timeout) {
	$scope.areas = [];
	
	
	$scope.loadAreas = function() {
		var httpRequest = $http.get("resources/json/areas.json").success(function(data, status) {
			$scope.areas = angular.fromJson(data).areas;
		});
	};
	
	$scope.loadAreas();
});
