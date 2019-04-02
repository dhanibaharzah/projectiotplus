

 <div id="map" style="height: 500px;"></div>
 
<script>
	var citymap1 = {
		semarang: {
			center: {lat: -7.000526, lng: 110.411225},
			population: 271
		},
		kudus: {
			center: {lat: -6.811960, lng: 110.842773},
			population: 840
		},
		pekalongan: {
			center: {lat: -6.894235, lng: 109.672272},
			population: 385
		},
		solo: {
			center: {lat: -7.562937, lng: 110.824262},
			population: 603
		},
		yogya_kalasan: {
			center: {lat: -7.758104, lng: 110.469627},
			population: 603
		},
		yogya_ring_road: {
			center: {lat: -7.749291, lng: 110.362362},
			population: 603
		},
		solo_ring_road: {
			center: {lat: -7.541685, lng: 110.855381},
			population: 603
		},
		solo_transformer: {
			center: {lat: -7.561690, lng: 110.768595},
			population: 603
		},
		kulon_progo_airport1: {
			center: {lat: -7.900327, lng: 110.058496},
			population: 603
		},
		kulon_progo_airport2: {
			center: {lat: -7.885397, lng: 110.074302},
			population: 603
		},
		transformer2: {
			center: {lat: -7.564006, lng: 110.768373},
			population: 603
		}
	};
	var citymap2 = {
		dupak: {
			center: {lat: -7.240807, lng:  112.718803},
			population: 271
		},
		kriyan: {
			center: {lat: -6.733068, lng: 110.724996},
			population: 840
		},
		manyar_gresik: {
			center: {lat: -7.099750, lng: 112.591934},
			population: 385
		},
		bali_gianyar: {
			center: {lat: -8.545716, lng: 115.329190},
			population: 603
		},
		kupang1: {
			center: {lat: -10.172752, lng: 123.591200},
			population: 603
		},
		sidoarjo: {
			center: {lat: -7.460783, lng: 112.701081},
			population: 603
		},
		avenue88: {
			center: {lat: -7.277752, lng: 112.693412},
			population: 603
		},
		bali_denpasar: {
			center: {lat: -8.661471, lng: 115.221181},
			population: 603
		},
		malang: {
			center: {lat: -7.971494, lng: 112.630752},
			population: 603
		},
		kediri: {
			center: {lat: -7.842750, lng: 112.019278},
			population: 603
		},
		gempol: {
			center: {lat: -7.595601, lng: 112.682838},
			population: 603
		},
		pg_rejoso: {
			center: {lat: -7.667168, lng: 112.941382},
			population: 603
		},
		tol_paspro: {
			center: {lat: -7.756010, lng: 113.212025},
			population: 603
		}
	};
	var citymap3 = {
		ciujung: {
			center: {lat: -6.145728, lng: 106.281534},
			population: 271
		},
		cilegon: {
			center: {lat: -6.012030, lng: 106.048478},
			population: 271
		},
		serpong: {
			center: {lat: -6.309661, lng: 106.682533},
			population: 271
		},
		gading_serpong: {
			center: {lat: -6.243395, lng: 106.619659},
			population: 271
		},
		ciwadang3: {
			center: {lat: -6.025918, lng: 105.962822},
			population: 271
		},
		panimbang2: {
			center: {lat: -6.535206, lng: 105.692810},
			population: 271
		},
		kebon_nanas: {
			center: {lat: -6.230929, lng: 106.880005},
			population: 271
		},
		jelambar: {
			center: {lat: -6.158785, lng: 106.785947},
			population: 271
		},
		cilincing: {
			center: {lat: -6.129456, lng: 106.946103},
			population: 271
		},
		cikupa: {
			center: {lat: -6.217299, lng: 106.515422},
			population: 271
		},
		tangerang2: {
			center: {lat: -6.170188, lng: 106.677160},
			population: 271
		},
		kebon_nanas2: {
			center: {lat: -6.214881, lng: 106.638492},
			population: 271
		},
		kp_rambutan: {
			center: {lat: -6.305268, lng: 106.874063},
			population: 271
		},
		bekasi: {
			center: {lat: -6.249718, lng: 106.984703},
			population: 271
		},
		serpong2: {
			center: {lat: -6.289186, lng: 106.673262},
			population: 271
		}
	};
	var citymap4 = {
		bogor: {
			center: {lat: -6.601662, lng: 106.805971},
			population: 271
		},
		palembang: {
			center: {lat: -2.958736, lng: 104.760218},
			population: 271
		},
		sukabumi2: {
			center: {lat: -6.914857, lng: 106.925720},
			population: 271
		},
		cianjur2: {
			center: {lat: -6.825547, lng: 107.137201},
			population: 271
		},
		lampung2: {
			center: {lat: -5.385553, lng: 105.325441},
			population: 271
		},
		palembang2: {
			center: {lat: -3.008111, lng: 104.795936},
			population: 271
		},
		sukamahi: {
			center: {lat: -6.374003, lng: 107.180009},
			population: 271
		},
		cikarang: {
			center: {lat: -6.312989, lng: 107.156666},
			population: 271
		},
		cirebon: {
			center: {lat: -6.739962, lng: 108.552322},
			population: 271
		},
		karawangtimur: {
			center: {lat: -6.313716, lng: 107.329236},
			population: 271
		},
		sadang: {
			center: {lat: -6.506583, lng: 107.452020},
			population: 271
		},
		gedebage: {
			center: {lat: -6.954313, lng: 107.698648},
			population: 271
		},
		cibitung: {
			center: {lat: -6.235437, lng: 107.102299},
			population: 271
		},
		majalengka: {
			center: {lat: -6.799281, lng: 108.282682},
			population: 271
		}
	};
	function initMap() {
		var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 7,
			center: {lat: -6.034016, lng: 108.573163},
			mapTypeId: 'terrain'
		});
		for (var city1 in citymap1) {
			var cityCircle = new google.maps.Circle({
				strokeColor: '#f44242',
				strokeOpacity: 0.8,
				strokeWeight: 2,
				fillColor: '#f44242',
				fillOpacity: 0.35,
				map: map,
				center: citymap1[city1].center,
				radius: Math.sqrt(citymap1[city1].population) * 1000
			});
		}
		for (var city2 in citymap2) {
			var cityCircle = new google.maps.Circle({
				strokeColor: '#41f477',
				strokeOpacity: 0.8,
				strokeWeight: 2,
				fillColor: '#41f477',
				fillOpacity: 0.35,
				map: map,
				center: citymap2[city2].center,
				radius: Math.sqrt(citymap2[city2].population) * 1000
			});
		}
		for (var city3 in citymap3) {
			var cityCircle = new google.maps.Circle({
				strokeColor: '#41aff4',
				strokeOpacity: 0.8,
				strokeWeight: 2,
				fillColor: '#41aff4',
				fillOpacity: 0.35,
				map: map,
				center: citymap3[city3].center,
				radius: Math.sqrt(citymap3[city3].population) * 1000
			});
		}
		for (var city4 in citymap4) {
			var cityCircle = new google.maps.Circle({
				strokeColor: '#415bf4',
				strokeOpacity: 0.8,
				strokeWeight: 2,
				fillColor: '#415bf4',
				fillOpacity: 0.35,
				map: map,
				center: citymap4[city4].center,
				radius: Math.sqrt(citymap4[city4].population) * 1000
			});
		}
	}
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGdJQZNTJ5IvfZdULrnWMkO1h0EJxgfFU&callback=initMap">
</script>
