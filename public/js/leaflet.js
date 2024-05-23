var map = L.map("map", {
    mapTypeId: "terrain",
    mapTypeIds: ["osm", "terrain", "satellite", "topo"],
    gestureHandling: false,
    zoomControl: true,
    pegmanControl: false,
    locateControl: true,
    fullscreenControl: true,
    layersControl: false,
    minimapControl: true,
    editInOSMControl: true,
    loadingControl: true,
    searchControl: true,
    disableDefaultUI: false
});

map.once("idle", function() {
    /* Waiting for map init */
});

if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(position => {
        localCoord = position.coords;

        let lat = localCoord.latitude;
        let lon = localCoord.longitude;

        map.setView([lat, lon], 9);

        function dragableMarker(lat, lon) {
            var geocodeService = L.esri.Geocoding.geocodeService();

            var marker = new L.marker([lat, lon], {
                draggable: true,
                autoPan: true
            })
                .addTo(map)
                .bindTooltip("Drag Pin!", {
                    permanent: true,
                    className: "Drag Pin!"
                });
            marker.on("dragend", function(event) {
                var marker = event.target;
                var position = marker.getLatLng();
                geocodeService
                    .reverse()
                    .latlng(position)
                    .run(function(error, result) {
                        if (error) {
                            return;
                        }

                        $("#alamat").val(result.address.Match_addr);
                    });
                $("#latitude").val(position.lat);
                $("#longitude").val(position.lng);
            });
        }

        if (window.action == "submit") {
            dragableMarker(lat, lon);
        } else {
            myLocation(lat, lon);
            addLegend();
        }

        function myLocation(lat, lon) {
            // L.circle([lat, lon], {
            //     color: 'blue',
            //     radius: 1000
            // }).addTo(map)
            // L.marker([lat, lon]).addTo(map)
            //     .bindTooltip("Your Location", { permanent: true, className: "Your Location" });
        }

        function addLegend() {}
    });
} else {
    console.error("Geolocation is not supported by this browser!");
}

// Screenshot
L.simpleMapScreenshoter().addTo(map);

// Search on /map
if (window.location.href.indexOf("/fibermap") == -1) {
    var markersLayer = new L.LayerGroup();
    // map.addLayer(markersLayer);

    // add the search bar to the map
    // var controlSearch = new L.Control.Search({
    //     position:'topright',    // where do you want the search bar?
    //     layer: markersLayer,  // name of the layer
    //     initial: false,
    //     zoom: 16,        // set zoom to found location when searched
    //     marker: false,
    //     textPlaceholder: window.location.href.indexOf("/fibermap") == -1 ? 'Pencarian...' : 'Cari Kecamatan' // placeholder while nothing is searched
    // });

    // map.addControl(controlSearch); // add it to the map
} else {
    // L.control.scale().addTo(map);

    // var searchControl = new L.esri.Geocoding.Geosearch({
    //     position: 'topright',
    //     placeholder: 'Cari Fiber...'
    // }).addTo(map);

    // var results = new L.LayerGroup().addTo(map);

    // searchControl.on('results', function(data) {
    //     results.clearLayers();
    //     for (var i = data.results.length - 1; i >= 0; i--) {
    //         results.addLayer(L.marker(data.results[i].latlng));
    //     }
    // });

    setTimeout(function() {
        $(".pointer").fadeOut("slow");
    }, 3400);
    // results.clearLayers();
}
//

L.tileLayer(
    "https://tile.thunderforest.com/cycle/{z}/{x}/{y}.png?apikey=" + thunderforestApiKey,
    {
        maxZoom: 18,
        attribution:
            window.matchMedia("(max-width: 700px)").matches == false
                ? 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                  '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                  'Imagery © <a href="https://www.mapbox.com/">Mapbox</a> ' +
                  '| <a href="https://www.radmila.co.id/">PT Radmilaa</a>'
                : '<a href="https://www.radmila.co.id/">PT Radmila</a>',
        id: "mapbox/streets-v11",
        tileSize: 512,
        zoomOffset: -1
    }
).addTo(map);

function getColor(d) {
    return d === "ODC"
        ? "orange"
        : d === "ODP"
        ? "green"
        : d === "Pelanggan"
        ? "blue"
        : "red";
}

function style(feature) {
    return {
        weight: 1.5,
        opacity: 1,
        fillOpacity: 1,
        radius: 6,
        fillColor: getColor(feature.properties.TypeOfIssue),
        color: "grey"
    };
}

if (window.location.href.indexOf("/fibermap") == -1) {
    // Legend on Top Right
    var legend = L.control({ position: "bottomleft" });
    legend.onAdd = function(map) {
        var div = L.DomUtil.create("div", "info legend");
        (labels = ["<strong>Keterangan</strong>"]),
            (categories = ["ODC", "ODP", "Pelanggan", "Gangguan"]);

        for (var i = 0; i < categories.length; i++) {
            div.innerHTML += labels.push(
                '<i class="fa fa-circle text-' +
                    getColor(categories[i]) +
                    '"></i> ' +
                    (categories[i] ? categories[i] : "+")
            );
        }

        div.innerHTML = labels.join("<br>");
        return div;
    };
    legend.addTo(map);

    // warning activates location
    var legend = L.control({ position: "bottomleft" });
    legend.onAdd = function(map) {
        var div = L.DomUtil.create("div", "info legend");
        (labels = [" "]),
            (categories = ["ODC", "ODP", "Pelanggan", "Gangguan"]);

        div.innerHTML += labels.push("");
        div.innerHTML = labels.join("<br>");
        return div;
    };
    legend.addTo(map);
} else {
    // warning activates location
    var legend = L.control({ position: "bottomleft" });
    legend.onAdd = function(map) {
        var div = L.DomUtil.create("div", "info legend");
        (labels = [" "]), (categories = ["Radius Jangkauan"]);

        div.innerHTML += labels.push(
            '<strong>Keterangan</strong><br><i class="fa fa-circle-o text-blue" style="color: blue;"></i> Radius Jangkauan ODP Ke Pelanggan<br>'
        );
        div.innerHTML = labels.join("<br>");
        return div;
    };
    legend.addTo(map);
}

var myIcon = L.icon({
    iconUrl: "/images/logo-circle.png",
    iconSize: [1, 1] // size of the icon
});

// Loop data and display it
function tampilDataODC(data) {
    data.forEach(element => {
        // Search
        var title = element.nama, //value searched
            loc = [element.latitude, element.longitude], //position found
            marker = new L.Marker(new L.latLng(loc), {
                title: title,
                icon: myIcon
            }); //se property searched
        markersLayer.addLayer(marker);

        L.marker([element.latitude, element.longitude], {
            icon: L.divIcon({
                className: "custom-div-icon",
                html: `<div style='background-color: ${
                    element.keterangan == "Gangguan" ? "red" : "orange"
                };' class='marker-pin'></div><i class='fa fa-server awesome'>`,
                iconSize: [30, 42],
                iconAnchor: [15, 42]
            })
        }).addTo(map).bindPopup(`
            <container>
                <row>
                    <col>
                        <img src='/data_file/${
                            element.foto
                        }' height="100" width="100"><br><br>
                    </col>
                    <col>    
                        <b>
                            Nama: ${element.nama}<br>
                            Provinsi: ${element.nama_provinsi}<br>
                            Kota: ${element.nama_kota}<br>
                            Alamat: ${element.alamat}<br>
                            Core: ${element.core} Core<br>
                            Keterangan: ${element.keterangan}<br><hr>
                            <a href=${"/pemetaan-odc/" +
                                element.id +
                                "/edit/"} class="">Edit</a> | 
                            <a href=${"/pemetaan-odc/" +
                                element.id} class="">Detail</a>
                        </b>
                    </col>
                </row>
            </container>
        `);
        // `).bindTooltip(element.nama, { permanent: false, className: element.alamat });
    });
}

// Loop data and display it
function tampilDataODP(data) {
    data.forEach(element => {
        // Search
        var title = element.nama, //value searched
            loc = [element.latitude, element.longitude], //position found
            marker = new L.Marker(new L.latLng(loc), { title: title }); //se property searched
        // markersLayer.addLayer(marker);

        markerKecamatan = new L.Marker(new L.latLng(loc), {
            title: title,
            icon: L.divIcon({
                className: "custom-div-icon",
                html: `<div style='background-color: ${
                    element.keterangan == "Gangguan" ? "red" : "green"
                };' class='marker-pin'></div><i class='fa fa-microchip awesome'>`,
                iconSize: [30, 42],
                iconAnchor: [15, 42]
            })
        }).addTo(map).bindPopup(`
        <container>
            <row>
                <col>
                    <img src='/data_file/${
                        element.foto
                    }' height="100" width="100"><br><br>
                </col>
                <col>
                    <b>
                        Nama: ${element.nama}<br>
                        Provinsi: ${element.nama_provinsi}<br>
                        Kota: ${element.nama_kota}<br>
                        Kecamatan: ${element.nama_kecamatan}<br>
                        Alamat: ${element.alamat}<br>
                        core: ${element.core} Core<br>
                        Keterangan: ${element.keterangan}<br><hr>
                        ODC: ${element.nama_odc}<br>
                        Port: ${element.port}<br><hr>
                        <a href=${"/pemetaan-odp/" +
                            element.id +
                            "/edit/"} class="">Edit</a> | 
                        <a href=${"/pemetaan-odp/" +
                            element.id} class="">Detail</a>
                    </b>
                </col>
            </row>
        </container>
        `);

        markersLayer.addLayer(markerKecamatan);

        L.circle([element.latitude, element.longitude], {
            radius: 250,
            color: element.keterangan == "Gangguan" ? "red" : "green"
        }).addTo(map);
    });
}

// Loop data and display it
function tampilDataODPFiber(data) {
    data.forEach(element => {
        if (window.location.href.indexOf("/fibermap") == -1) {
            // Search
            var title = element.nama_kecamatan, //value searched
                loc = [element.latitude, element.longitude], //position found
                marker = new L.Marker(new L.latLng(loc), {
                    title: title,
                    icon: myIcon
                }); //se property searched
            markersLayer.addLayer(marker);
        }

        L.circle([element.latitude, element.longitude], {
            radius: 250,
            color: "blue"
        }).addTo(map);

        L.marker([element.latitude, element.longitude], {}).addTo(map)
            .bindPopup(`
            <container>
                <row>
                    <col>
                        Radmila Fiber<br><br>
                    </col>
                </row>
                <row>
                    <col>
                        Provinsi: ${element.nama_provinsi}<br>
                        Kota: ${element.nama_kota}<br>
                        Kecamatan: ${element.nama_kecamatan}<br>
                        Alamat: ${element.alamat}<br>
                    </col>
                </row><hr>
                <row>
                    <col>
                    *Untuk mendapatkan informasi yang lebih akurat mengenai
                      ketersediaan layanan, dapat di cek
                      pada menu Berlangganan di www.rekadata.net.id.
                    </col>
                </row>
            </container>
        `);
        // `).bindTooltip(element.nama, { permanent: false, className: element.alamat });
    });
}

function tampilDataPelanggan(data) {
    data.forEach(element => {
        // Search
        var title = element.nama, //value searched
            loc = [element.latitude, element.longitude], //position found
            marker = new L.Marker(new L.latLng(loc), {
                title: title,
                icon: myIcon
            }); //se property searched
        markersLayer.addLayer(marker);

        L.marker([element.latitude, element.longitude], {
            // radius: 50,
            // color: 'green',
            icon: L.divIcon({
                className: "custom-div-icon",
                html: `<div style='background-color: ${
                    element.keterangan == "Gangguan" ? "red" : "blue"
                };' class='marker-pin'></div><i class='fa fa-user awesome'>`,
                iconSize: [30, 42],
                iconAnchor: [15, 42]
            })
        }).addTo(map).bindPopup(`
            <container>
                <row>
                    <col>
                        <b>
                            Nama: ${element.nama}<br>
                            Provinsi: ${element.nama_provinsi}<br>
                            Kota: ${element.nama_kota}<br>
                            Alamat: ${element.alamat}<br>
                            Kontak: ${element.kontak}<br>
                            Keterangan: ${element.keterangan}<br><hr>
                            ODP: ${element.nama_petaodp}<br>
                            Port: ${element.port}<br><hr>
                            <a href=${"/pemetaan-pelanggan/" +
                                element.id +
                                "/edit/"} class="">Edit</a> | 
                            <a href=${"/pemetaan-pelanggan/" +
                                element.id} class="">Detail</a>
                        </b>
                    </col>
                </row>
            </container>
        `);

        // var pointA = new L.LatLng(element.odp_lat, element.odp_lon);
        // var pointB = new L.LatLng(element.latitude, element.longitude);
        // var pointList = [pointA, pointB];

        // var firstpolyline = new L.Polyline(pointList, {
        //     color: 'black',
        //     weight: 3,
        //     opacity: 0.5,
        //     smoothFactor: 1
        // });
        // firstpolyline.addTo(map);
    });
}

map.on("click", function(e) {
    // alert("Lat, Lon : " + e.latlng.lat + ", " + e.latlng.lng)
    console.log(e.latlng.lat + ", " + e.latlng.lng);
});

// var legend = L.control({ position: 'topright'} );
// legend.onAdd = function (map) {
//     var div = L.DomUtil.create('div', 'info legend');
//     div.innerHTML = `
//         <b>Filter By Kecamatan</b><br>
//         <select>
//             <option>Arjasari</option>
//             <option>2</option>
//             <option>3</option>
//         </select>`;
//     div.firstChild.onmousedown = div.firstChild.ondblclick = L.DomEvent.stopPropagation;
//     return div;
// };

// legend.addTo(map);
function geoJson(currentKecamatan) {
    // if (window.location.href.indexOf("/map2") !== -1) {
    var geojsonLayer = new L.GeoJSON.AJAX("/js/jabar-by-kec.json", {
        filter: function(feature, layer) {
            // console.log(feature.properties.KECAMATAN === "CIPARAY");
            return (
                feature.properties.KECAMATAN === currentKecamatan.toUpperCase()
            );
        }
    });
    geojsonLayer.addTo(map);
    // }
}
