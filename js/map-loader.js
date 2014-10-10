$(document).ready(function(){ 

	// var styles = [
	//   {
	//     "featureType": "road",
	//     "stylers": [
	//       { "lightness": 100 }
	//     ]
	//   },{
	//     "featureType": "road",
	//     "elementType": "labels.text.fill",
	//     "stylers": [
	//       { "lightness": -61 }
	//     ]
	//   },{
	//     "featureType": "administrative.land_parcel",
	//     "elementType": "geometry.stroke",
	//     "stylers": [
	//       { "saturation": 100 },
	//       { "hue": "#00ffc4" },
	//       { "lightness": 100 }
	//     ]
	//   },{
	//     "featureType": "water",
	//     "stylers": [
	//       { "hue": "#00d4ff" },
	//       { "lightness": -20 }
	//     ]
	//   },{
	//     "featureType": "landscape",
	//     "elementType": "geometry.fill",
	//     "stylers": [
	//       { "lightness": -6 },
	//       { "hue": "#00ffe6" }
	//     ]
	//   },{
	//     "featureType": "poi",
	//     "elementType": "geometry.fill",
	//     "stylers": [
	//       { "saturation": 32 },
	//       { "hue": "#00ffcc" }
	//     ]
	//   },{
	//     "featureType": "road.arterial",
	//     "elementType": "geometry.fill",
	//     "stylers": [
	//       { "gamma": 1 },
	//       { "lightness": -30 }
	//     ]
	//   }
	// ];     

	var styles = [
	  {
	    stylers: [
	      { hue: '#00A362' },
	      { visibility: 'simplified' },
	      { gamma: 0.5 },
	      { weight: 0.5 }
	    ]
	  },
	  // {
	  //   elementType: 'labels',
	  //   stylers: [
	  //     { visibility: 'off' }
	  //   ]
	  // },
	  {
	    featureType: 'water',
	    stylers: [
	      { color: '#00A362' }
	    ]
	  }
	];

	function initialize() {
		var styledMap = new google.maps.StyledMapType(styles,
   			{name: "Styled Map"});

		var valleyLocation = new google.maps.LatLng(58.3738,-134.577);

		var downtownLocation = new google.maps.LatLng(58.303901,-134.419142);

		var valleyMapOptions = {
		  zoom: 15,
		  center: valleyLocation,
		  mapTypeControlOptions: {
		    mapTypeIds: [
		    	google.maps.MapTypeId.ROADMAP,
		    	google.maps.MapTypeId.SATELLITE
		    ]
		  },
		  scrollwheel: false
		};

		var downtownMapOptions = {
		  zoom: 15,
		  center: downtownLocation,
		  mapTypeControlOptions: {
		    mapTypeIds: [
		    	google.maps.MapTypeId.ROADMAP,
		    	google.maps.MapTypeId.SATELLITE
		    ]
		  },
		  scrollwheel: false
		};
  		
  		var valleyMap = new google.maps.Map(document.getElementById('valley-map'),
    		valleyMapOptions);

  		var downtownMap = new google.maps.Map(document.getElementById('downtown-map'),
  			downtownMapOptions);


		//valleyMap.mapTypes.set('map_style', styledMap);
   		//valleyMap.setMapTypeId('map_style');
   		valleyMap.setOptions({styles: styles});

   		//downtownMap.mapTypes.set('map_style', styledMap);
  		//downtownMap.setMapTypeId('map_style');
  		downtownMap.setOptions({styles: styles});

  		var valleyMarker = new google.maps.Marker({
      		position: valleyLocation,
      		map: valleyMap
  		});

  		var downtownMarker = new google.maps.Marker({
      		position: downtownLocation,
      		map: downtownMap
  		});
	}

	google.maps.event.addDomListener(window, 'load', initialize);
});