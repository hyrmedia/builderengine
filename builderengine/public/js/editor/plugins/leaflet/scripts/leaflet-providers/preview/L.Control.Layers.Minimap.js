﻿(function(){var g=function(a){var b=a.options;if(a instanceof L.TileLayer)return L.tileLayer(a._url,b);if(a instanceof L.ImageOverlay)return L.imageOverlay(a._url,a._bounds,b);if(a instanceof L.Polygon||a instanceof L.Rectangle)return L.polygon(a.getLatLngs(),b);if(a instanceof L.Marker)return L.marker(a.getLatLng(),b);if(a instanceof L.circleMarker)return L.circleMarker(a.getLatLng(),b);if(a instanceof L.Polyline||a instanceof L.MultiPolyline)return L.polyline(a.getLatLngs(),b);if(a instanceof L.MultiPolygon)return L.MultiPolygon(a.getLatLngs(),
b);if(a instanceof L.Circle)return L.circle(a.getLatLng(),a.getRadius(),b);if(a instanceof L.GeoJSON)return L.geoJson(a.toGeoJSON(),b);if(a instanceof L.LayerGroup||a instanceof L.FeatureGroup){var e=L.layerGroup();a.eachLayer(function(a){e.addLayer(g(a))});return e}};L.Control.Layers.Minimap=L.Control.Layers.extend({options:{position:"topright",topPadding:10,bottomPadding:40,overlayBackgroundLayer:L.tileLayer("http://a{s}.acetate.geoiq.com/tiles/acetate-base/{z}/{x}/{y}.png",{attribution:"&copy;2012 Esri & Stamen, Data from OSM and Natural Earth",
subdomains:"0123",minZoom:2,maxZoom:18})},isCollapsed:function(){return!L.DomUtil.hasClass(this._container,"leaflet-control-layers-expanded")},_expand:function(){L.Control.Layers.prototype._expand.call(this);this._onListScroll()},_initLayout:function(){L.Control.Layers.prototype._initLayout.call(this);L.DomUtil.addClass(this._container,"leaflet-control-layers-minimap");L.DomEvent.on(this._container,"scroll",this._onListScroll,this)},_update:function(){L.Control.Layers.prototype._update.call(this);
this._map.on("resize",this._onResize,this);this._onResize();this._map.whenReady(this._onListScroll,this)},_addItem:function(a){var b=L.DomUtil.create("label","leaflet-minimap-container",a.overlay?this._overlaysList:this._baseLayersList),e=this._map.hasLayer(a.layer);this._createMinimap(L.DomUtil.create("div","leaflet-minimap",b),a.layer,a.overlay);var d=L.DomUtil.create("span","leaflet-minimap-label",b),c;a.overlay?(c=document.createElement("input"),c.type="checkbox",c.className="leaflet-control-layers-selector",
c.defaultChecked=e):c=this._createRadioElement("leaflet-base-layers",e);c.layerId=L.stamp(a.layer);d.appendChild(c);L.DomEvent.on(b,"click",this._onInputClick,this);L.DomUtil.create("span","",d).innerHTML=" "+a.name;return b},_onResize:function(){var a=this._map.getContainer().clientHeight;this._container.clientHeight>a-this.options.bottomPadding&&(this._container.style.overflowY="scroll");this._container.style.maxHeight=a-this.options.bottomPadding-this.options.topPadding+"px"},_onListScroll:function(){var a=
document.getElementsByClassName("leaflet-minimap-container");if(0!==a.length){var b,e;if(this.isCollapsed())b=e=-1;else{e=a.item(0).clientHeight;b=this._container;var d=b.clientHeight,c=b.scrollTop;b=Math.floor(c/e);e=Math.ceil((c+d)/e)}for(d=0;d<a.length;++d){var c=a[d].childNodes.item(0)._miniMap,f=c._layer;f&&(d>=b&&d<=e?(c.hasLayer(f)||f.addTo(c),c.invalidateSize()):c.hasLayer(f)&&c.removeLayer(f))}}},_createMinimap:function(a,b,e){var d=a._miniMap=L.map(a,{attributionControl:!1,zoomControl:!1});
d.dragging.disable();d.touchZoom.disable();d.doubleClickZoom.disable();d.scrollWheelZoom.disable();d._layer=e?L.layerGroup([g(this.options.overlayBackgroundLayer),g(b)]):g(b);var c=this._map;c.whenReady(function(){d.setView(c.getCenter(),c.getZoom());c.sync(d)})}});L.control.layers.minimap=function(a,b,e){return new L.Control.Layers.Minimap(a,b,e)}})();