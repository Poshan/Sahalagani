//
/*********************** Base map ******************************/

// Let's set some basemap options
//var tile_options = {
//    subdomains: '1234',
  //  attribution: 'Map data OpenStreeMaps and MapQuest'
//};

// Now we add the actual tile layer
//var basemap = L.tileLayer('https://{s}.tiles.mapbox.com/v4/poshan.dist-nepal/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoicG9zaGFuIiwiYSI6InZ5a0dsLVkifQ.DGY81ha1q5VQpj3QA-REew',tile_options);
//basemap.addTo(map);


/*config = {
	"mapDOMId": "map",
	"mapName": "Mines Site Nepal",
	"osmTiles": "http://{s}.tile.osm.org/{z}/{x}/{y}.png",
	"mapOptions": {
		"zoomLevelMin": 7,
		"initialCenter": [28.35, 84.25]
	},

"districtTiles": "https://{s}.tiles.mapbox.com/v4/poshan.dist-nepal/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoicG9zaGFuIiwiYSI6InZ5a0dsLVkifQ.DGY81ha1q5VQpj3QA-REew",
}
*/

/*
var mapbox = L.tileLayer(config["districtTiles"]);
  mapbox.addTo(map);

var mabvdc = L.tileLayer(config["vdcTiles"]);
mabvdc.addTo(map);


var geojsonFeature = {
    "type": "Feature",
    "properties": {
        "name": "Coors Field",
        "amenity": "Baseball Stadium",
        "popupContent": "This is where the Rockies play!"
    },
    "geometry": {
        "type": "Point",
        "coordinates": [28.35,84.25]
    }
};



var teardrop = L.icon({
    iconUrl: 'img/marker.png',
    iconSize: [38, 38],
});
function basemap (Feature,layer) {

  layer.bindPopup("<h1>Hi, I'm GeoJSON</h1>"+" <h2>"+ Feature.geometry.coordinates +"</h2>");
  layer.setIcon(teardrop);
};


var myLines = [{
    "type": "LineString",
    "coordinates": [[84.25,28.35], [83.25,28.35], [86.25,28.35]]
}, {
    "type": "LineString",
    "coordinates": [[83.25,26.35], [82.25,24.35], [84.25,29.35]]
}];

var myStyle = {
    "color": "#ff7800",
    "weight": 5,
    "opacity": 0.65
};

L.geoJson(myLines, {
    style: myStyle
}).addTo(map);







*/



var map = L.map('map').setView([28.35,84.25], 7);
var osm = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png');

var myLayer = new OpenLayers.Layer.XYZ('My Map Layer',
    ['https://a.tiles.mapbox.com/v4/mapbox.streets/${z}/${x}/${y}.png?access_token=<your access token here>'], {
    sphericalMercator: true,
    tileSize: new OpenLayers.Size({ 512, 512 })
    wrapDateLine: true
});

var mapbox = L.tileLayer(config["districtTiles"]);
var mapboxvdc = L.tileLayer(config["vdcTiles"]);
var rivers = L.tileLayer(config["riversTiles"]);
var road = L.tileLayer(config["roadTiles"]);
var national = L.tileLayer(config["nationalparkTiles"]);
var chure = L.tileLayer(config["chureTiles"]);


var BaseLayer  = {
    "Districts": mapbox,
    "osmTiles":osm
};

var groupedOverlays = {
    "Administrative Data" : {
      "VDC Boundaries":mapboxvdc,
      "Road": road,
      //"Utility": Utility,
      "Rivers": rivers,
      "National Park": national,
      "Chure Hills": chure,
    },

};
/*
var geojsonFeature = {
    "type": "Feature",
    "properties": {
        "name": "Coors Field",
        "amenity": "Baseball Stadium",
        "popupContent": "This is where the Rockies play!"
    },
    "geometry": {
        "type": "Point",
        "coordinates": [84.25,29.35]
    }
};
L.geoJson(geojsonFeature).addTo(map);

*/
  L.control.mousePosition({
    position: 'bottomright'
  }).addTo(map);

var myIcon1 = L.divIcon({className: 'my-div-icon'});
// you can set .my-div-icon styles in CSS

L.marker([27.39,84.29], {icon: myIcon1}).addTo(map);
var myIcon = L.icon({
    iconUrl: 'img/marker.png',
    iconSize: [22, 35 ],
    draggable: true,
   // iconAnchor: [84.29,28.39],
});
//L.marker(myIcon).addTo(map);

L.marker([28.39,84.29], {icon: myIcon}).addTo(map).bindPopup("<h1>"+'I am a green leaf.'+"</h1>");

 var attribution = config["attribution"];
  map.attributionControl.setPrefix('');
  L.control.attribution({
    position: 'bottomright',
  }).addAttribution(attribution).setPrefix('<a href= "http://www.leafletjs.com">leaflet</a>').addTo(map);



  //addition of overlays and set the collapsed false
  // L.control.layers(baseLayers,overlays,{collapsed:false}).addTo(map);

var options = {
    collapsed: false,
  };
var layerControl = L.control.groupedLayers(BaseLayer, groupedOverlays, options);
//L.control.layers(BaseLayer,groupedOverlays,options).addTo(map);
map.addControl(layerControl);
