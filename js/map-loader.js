$(document).ready(function(){ 

	var styles = [
	  {
	    "featureType": "road",
	    "stylers": [
	      { "lightness": 100 }
	    ]
	  },{
	    "featureType": "road",
	    "elementType": "labels.text.fill",
	    "stylers": [
	      { "lightness": -61 }
	    ]
	  },{
	    "featureType": "administrative.land_parcel",
	    "elementType": "geometry.stroke",
	    "stylers": [
	      { "saturation": 100 },
	      { "hue": "#00ffc4" },
	      { "lightness": 100 }
	    ]
	  },{
	    "featureType": "water",
	    "stylers": [
	      { "hue": "#00d4ff" },
	      { "lightness": -20 }
	    ]
	  },{
	    "featureType": "landscape",
	    "elementType": "geometry.fill",
	    "stylers": [
	      { "lightness": -6 },
	      { "hue": "#00ffe6" }
	    ]
	  },{
	    "featureType": "poi",
	    "elementType": "geometry.fill",
	    "stylers": [
	      { "saturation": 32 },
	      { "hue": "#00ffcc" }
	    ]
	  },{
	    "featureType": "road.arterial",
	    "elementType": "geometry.fill",
	    "stylers": [
	      { "gamma": 1 },
	      { "lightness": -30 }
	    ]
	  }
	];     

	function initialize() {
		var styledMap = new google.maps.StyledMapType(styles,
   			{name: "Styled Map"});

		var mapOptions = {
		  zoom: 11,
		  center: new google.maps.LatLng(55.6468, 37.581),
		  mapTypeControlOptions: {
		    mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
		  }
		};
  		
  		var map = new google.maps.Map(document.getElementById('valley-map'),
    		mapOptions);

		map.mapTypes.set('map_style', styledMap);
  		map.setMapTypeId('map_style');
	}
	google.maps.event.addDomListener(window, 'load', initialize);
});