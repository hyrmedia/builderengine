﻿(function(){var g=new L.Map("map",{zoomControl:!1,center:[48,-3],zoom:5}),m=L.TileLayer.prototype.initialize;L.TileLayer.include({initialize:function(a,b){this._options=b;m.apply(this,arguments)}});var n=L.TileLayer.Provider.prototype.initialize;L.TileLayer.Provider.include({initialize:function(a){this._providerName=a;n.apply(this,arguments)}});var h={},k={},l=function(a){null!==a.match("(^(OpenWeatherMap|OpenSeaMap)|OpenMapSurfer.AdminBounds|Stamen.Toner(Hybrid|Lines|Labels)|Acetate.(foreground|labels|roads))")?
k[a]=L.tileLayer.provider(a):h[a]=L.tileLayer.provider(a)},e;for(e in L.TileLayer.Provider.providers)if(null===e.match(/^(MapBox|OpenSeaMap)/))if(L.TileLayer.Provider.providers[e].variants)for(var o in L.TileLayer.Provider.providers[e].variants)l(e+"."+o);else l(e);L.control.layers.minimap(h,k,{collapsed:!1}).addTo(g);h["OpenStreetMap.Mapnik"].addTo(g);g.addControl(new (L.Control.extend({options:{position:"topleft"},onAdd:function(a){var b=L.DomUtil.get("info");L.DomEvent.disableClickPropagation(b);
L.DomUtil.create("h4",null,b).innerHTML="Provider names for <code>leaflet-providers.js</code>";var e=L.DomUtil.create("code","provider-names",b);L.DomUtil.create("h4","",b).innerHTML="Plain JavaScript:";var f=L.DomUtil.create("pre",null,b),j=L.DomUtil.create("code","javascript",f),f=function(b){j.innerHTML="";var f=[],g;for(g in a._layers){var d=a._layers[g];f.push(d._providerName);var c=d._providerName.replace(".","_");if(!b||!("layerremove"===b.type&&d===b.layer)){var c="var "+c+" = L.tileLayer('"+
d._url+"', {\n",d=d._options,h=!0,i;for(i in d)h?h=!1:c+=",\n",c+="\t"+i+": ",c="string"===typeof d[i]?c+("'"+d[i].replace(/&/g,"&amp;").replace(/</g,"&lt;").replace(/>/g,"&gt;").replace(/"/g,"&quot;").replace(/'/g,"&#039;")+"'"):c+d[i];c+="\n});\n";j.innerHTML+=c;e.innerHTML=f.join(", ")}}hljs.highlightBlock(j)};a.on({layeradd:f,layerremove:f});f();return b}})))})();