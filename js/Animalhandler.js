jQuery.extend({
	
	Animalhandler: function(){
		var that = this;
		
		this.resetAnimal = function(animal){
			animal.css("top", "0").css("left", "0");
		}
				
		this.doFlight = function(animal, path){
			var bPath = {
				curviness: 1.5,
				values: $.parseJSON(path)
			};
						
			var flightTween = TweenMax.to(animal, 5, {
				zIndex: 0,
				bezier: bPath,
				onComplete: that.resetAnimal,
				onCompleteParams: [animal]
			});
		}
	
	}
});