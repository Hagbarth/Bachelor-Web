jQuery.extend({
	
	Peoplehandler: function(){
		that = this;
			
		this.loadPeople = function(areaID){
			console.log(areaID);
		}	
			
		this.doWalk = function(person, path){
			var bPath = {
				curviness: 1.5,
				values: $.parseJSON(path)
			};
						
			var flightTween = TweenMax.to(animal, 5, {
				zIndex: 0,
				bezier: bPath,
				onComplete: that.resetAnimal(animal)
			});
		}
	
	}
});