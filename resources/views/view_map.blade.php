@extends('indexFE')

@section('content')


<div id="map" style="width: 100%; height: 100vh;"></div>


<style>
	.info {
		padding: 6px 8px;
		background: white;
		background: rgba(255, 255, 255, 0.8);
		box-shadow: 0 0 0 15px rgba(0, 0, 0, 0.2);
	}

	.info h4 {
		margin: 0 0 5px;
		color: #777;
	}


	.legend {
		text-align: left;
		line-height: 18px;
		color: #555;
	}


	.legend i {
		width: 18px;
		height: 18px;
		float: left;
		margin-right: 8px;
		opacity: 0.7;

	}

	.btn-map {
		position: absolute;
		z-index: 1;
		left: 15vw;
		transform: translateX(-50%);
		text-align: center;
		margin-top: 5px;
	}


	.about {
		font-weight: bold;
		background-color: white;
		color: black;
		border-radius: 5px;
		padding: 0.5rem;
		box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
	}

	@media (min-width: 360px) {
		.leaflet-bottom.leaflet-left {
			margin-bottom: 50px !important;
		}

		.info.legend.leaflet-control {
			margin-bottom: 50px !important;
		}

		.menu-small {
			display: none;
		}

		.menu-large {
			display: none;
		}

		.btn-map-small {
			position: absolute;
			z-index: 500;
			left: 32%;
			-webkit-transform: translateX(-50%);
			transform: translateX(-50%);
			bottom: 0;
			margin-bottom: 10px;
		}

	}

	@media (min-width: 576px) {
		.leaflet-bottom.leaflet-left {
			margin-bottom: 50px !important;
		}

		.info.legend.leaflet-control {
			margin-bottom: 60px !important;
		}

		.menu-large {
			display: none;
		}

		.menu-small-small {
			display: none;
		}

		.menu-small {
			display: block;
		}

		.btn-map {
			position: absolute;
			z-index: 500;
			left: 22%;
			-webkit-transform: translateX(-50%);
			transform: translateX(-50%);
			bottom: 0;
			margin-bottom: 10px;

		}

	}

	@media (min-width: 768px) {
		.leaflet-bottom.leaflet-left {
			margin-bottom: 0px !important;
		}

		.info.legend.leaflet-control {
			margin-bottom: 0px !important;
		}


		.menu-small {
			display: none;
		}

		.menu-small-small {
			display: none;
		}

		.menu-large {
			display: block;
		}

		.btn-map-large {
			position: absolute;
			z-index: 500;
			left: 20%;
			-webkit-transform: translateX(-50%);
			transform: translateX(-50%);
			margin-top: 5px;
		}

	}

	@media (min-width: 992px) {
		.leaflet-bottom.leaflet-left {
			margin-bottom: 0px;
		}

		.menu-small {
			display: none;
		}

		.menu-small-small {
			display: none;
		}

		.menu-large {
			display: block;
		}

		.btn-map-large {
			position: absolute;
			z-index: 500;
			left: 17%;
			-webkit-transform: translateX(-50%);
			transform: translateX(-50%);
			margin-top: 5px;
		}

		.btn-about-large {
			position: absolute;
			z-index: 500;
			left: 77%;
			transform: translateX(-50%);
			top: 0;

		}

		.btn-login-large {
			position: absolute;
			z-index: 500;
			transform: translateX(-50%);
			top: 0;
			left: 91%;
		}
	}

	@media (min-width: 1200px) {
		.leaflet-bottom.leaflet-left {
			margin-bottom: 0px;
		}

		.menu-small {
			display: none;
		}

		.menu-small-small {
			display: none;
		}

		.menu-large {
			display: block;
		}

		.btn-map-large {
			position: absolute;
			z-index: 500;
			left: 15%;
			-webkit-transform: translateX(-50%);
			transform: translateX(-50%)
		}

		.btn-about-large {
			position: absolute;
			z-index: 500;
			left: 80%;
			transform: translateX(-50%);
			top: 0;

		}

		.btn-login-large {
			position: absolute;
			z-index: 500;
			transform: translateX(-50%);
			top: 0;
			left: 91%;
		}
	}

	@media (min-width: 1400px) {
		.leaflet-bottom.leaflet-left {
			margin-bottom: 0px;
		}

		.menu-small {
			display: none;
		}

		.menu-small-small {
			display: none;
		}

		.menu-large {
			display: block;
		}

		.btn-map-large {
			position: absolute;
			z-index: 500;
			left: 12%;
			-webkit-transform: translateX(-50%);
			transform: translateX(-50%)
		}

		.btn-about-large {
			position: absolute;
			z-index: 500;
			left: 83%;
			transform: translateX(-50%);
			top: 0;

		}

		.btn-login-large {
			position: absolute;
			z-index: 500;
			transform: translateX(-50%);
			top: 0;
			left: 93%;
		}
	}
</style>

<script>
	var data_Count = Object.values(JSON.parse('<?= json_encode($dataProvinsi) ?>'));

	function dev(arr) {
		// membuat nilai rata-rata dengan array.reduce
		let mean = arr.reduce((acc, curr) => {
			return acc + curr
		}, 0) / arr.length;

		// menghitung (value tiap data - rata2) ^2
		arr = arr.map((k) => {
			return (k - mean) ** 2
		})

		// menjumlahkan data pada array
		let sum = arr.reduce((acc, curr) => acc + curr, 0);

		// menghitung variansi
		let variance = sum / arr.length

		// mengembalikan nilai standar deviasi
		return Math.sqrt(sum / ((arr.length) - 1))
	}

	// console.log(dev(data_Count))
	const std = dev(data_Count);

	let average = (array) => array.reduce((a, b) => a + b) / array.length;
	// console.log(average(data_Count));
	const avg = average(data_Count);

	const n = parseFloat(prompt('Masukan nilai n untuk menampilkan sebaran kuliner tradisional: '));
	
	var x = (n * std);
	var positif = (avg + x);
	var negatif	= (avg - x);
	

	var format_positif = math.round(positif);
	var format_negatif = math.round(negatif);
	

	var PROVINSI = <?= json_encode($dataProvinsi) ?>;

	var map = L.map('map', {
		zoomControl: false,
	}).setView([-3.35123, 118.0186], 5);

	var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 6,
		minZoom: 5,
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	}).addTo(map);
	L.control.zoom({
		position: 'bottomleft'
	}).addTo(map);

	@foreach($budaya as $bdy)

	L.geoJSON(<?= $bdy->provinsi->geojson ?>, {
		style: style,
		onEachFeature: onEachFeature
	}).addTo(map)

	@endforeach


	var info = L.control();

	info.onAdd = function(map) {
		this._div = L.DomUtil.create('div', 'info');
		this.update();
		return this._div;
	};

	info.update = function(props) {
		this._div.innerHTML = '<h4>Jumlah Kuliner Tradisional </h4>' + (props ?
			'<b>' + props.nama_provinsi + '</b><br />' + 'x = ' + PROVINSI[props.kode] + ' Data ' : 'Dekatkan Mouse Anda Pada Peta' +
			'<br/>' + 'Rata-rata mininimum (RRMin) =' + format_negatif +
			'<br/>' + 'Rata-rata maksimum (RRMax) =' + format_positif +
			'<br/>' + 'x = Jumlah Data Kuliner Tiap Provinsi'
		);
	};
	info.addTo(map);

	function getColor(test) {
		return test > format_positif ? '#39fe15' :
			test < format_negatif ? '#fe0a01' :
			'#fbfe36';

	}
	var legend = L.control({
		position: 'bottomright'
	});

	legend.onAdd = function(map) {

		var format2_negatif = ' < ' + format_negatif
		var format2_positif = ' > ' + format_positif
		var range = format_negatif + ' - ' + format_positif
		var div = L.DomUtil.create('div', 'info legend');
		var grades = [format2_negatif, range, format2_positif];
		var labels = ['<strong>Keterangan: </strong>'];

		for (var i = 0; i < grades.length; i++) {
			if (i == 0) {
				div.innerHTML +=
					labels.push(
						'<i style="background:#fe0a01"></i>  ' + ('x' + ' < ' + ' <strong>RRMin</strong>'));
			} else if (i == 1) {
				div.innerHTML +=
					labels.push(
						'<i style="background:#fbfe36"></i> ' + '<strong>RRmin</strong>' + ' ≤ ' + 'x' + ' ≤ ' + ' <strong>RRMax</strong>');
			} else {
				div.innerHTML +=
					labels.push(
						'<i style="background:#39fe15"></i> ' + 'x' + ' >' + ' <strong>RRMax</strong>')
			}
		}

		div.innerHTML = labels.join('<br>');
		return div;
	};

	legend.addTo(map);


	function style(feature) {
		return {
			weight: 2,
			opacity: 1,
			color: 'black',
			dashArray: '3',
			fillOpacity: 0.7,
			fillColor: getColor(PROVINSI[feature.properties.kode])
		};
	}

	function highlightFeature(e) {
		var layer = e.target;

		layer.setStyle({
			weight: 5,
			color: '#666',
			dashArray: '',
			fillOpacity: 0.7
		});

		if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
			layer.bringToFront();
		}

		info.update(layer.feature.properties);
	}


	function resetHighlight(e) {
		var layer = e.target;

		layer.setStyle({
			weight: 2,
			opacity: 1,
			color: 'black',
			dashArray: '3',
		});

		info.update();
	}

	function zoomToFeature(e) {
		map.fitBounds(e.target.getBounds());
	}

	function onEachFeature(feature, layer) {
		layer.on({
			mouseover: highlightFeature,
			mouseout: resetHighlight,
			click: zoomToFeature
		});
	}
</script>
@endsection