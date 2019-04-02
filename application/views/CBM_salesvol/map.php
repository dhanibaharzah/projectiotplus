

 <div id="map" style="height: 500px;"></div>
 
<script>
	var citymap1 = {
		semarang: {
			center: {lat: -7.000526, lng: 110.411225},
			population: <?php echo $area_33; ?>
		},
		kudus: {
			center: {lat: -6.811960, lng: 110.842773},
			population: <?php echo $area_34; ?>
		},
		pekalongan: {
			center: {lat: -6.894235, lng: 109.672272},
			population: <?php echo $area_35; ?>
		},
		solo: {
			center: {lat: -7.562937, lng: 110.824262},
			population: <?php echo $area_36; ?>
		},
		yogya_kalasan: {
			center: {lat: -7.758104, lng: 110.469627},
			population: <?php echo $area_37; ?>
		},
		yogya_ring_road: {
			center: {lat: -7.749291, lng: 110.362362},
			population: <?php echo $area_38; ?>
		},
		solo_ring_road: {
			center: {lat: -7.541685, lng: 110.855381},
			population: <?php echo $area_39; ?>
		},
		solo_transformer: {
			center: {lat: -7.561690, lng: 110.768595},
			population: <?php echo $area_40; ?>
		},
		kulon_progo_airport1: {
			center: {lat: -7.900327, lng: 110.058496},
			population: <?php echo $area_41; ?>
		},
		kulon_progo_airport2: {
			center: {lat: -7.885397, lng: 110.074302},
			population: <?php echo $area_42; ?>
		},
		transformer2: {
			center: {lat: -7.564006, lng: 110.768373},
			population: <?php echo $area_43; ?>
		}
	};
	var citymap2 = {
		dupak: {
			center: {lat: -7.240807, lng:  112.718803},
			population: <?php echo $area_44; ?>
		},
		kriyan: {
			center: {lat: -6.733068, lng: 110.724996},
			population: <?php echo $area_45; ?>
		},
		manyar_gresik: {
			center: {lat: -7.099750, lng: 112.591934},
			population: <?php echo $area_46; ?>
		},
		bali_gianyar: {
			center: {lat: -8.545716, lng: 115.329190},
			population: <?php echo $area_47; ?>
		},
		kupang1: {
			center: {lat: -10.172752, lng: 123.591200},
			population: <?php echo $area_48; ?>
		},
		sidoarjo: {
			center: {lat: -7.460783, lng: 112.701081},
			population: <?php echo $area_49; ?>
		},
		avenue88: {
			center: {lat: -7.277752, lng: 112.693412},
			population: <?php echo $area_50; ?>
		},
		bali_denpasar: {
			center: {lat: -8.661471, lng: 115.221181},
			population: <?php echo $area_51; ?>
		},
		malang: {
			center: {lat: -7.971494, lng: 112.630752},
			population: <?php echo $area_52; ?>
		},
		kediri: {
			center: {lat: -7.842750, lng: 112.019278},
			population: <?php echo $area_53; ?>
		},
		gempol: {
			center: {lat: -7.595601, lng: 112.682838},
			population: <?php echo $area_54; ?>
		},
		pg_rejoso: {
			center: {lat: -7.667168, lng: 112.941382},
			population: <?php echo $area_55; ?>
		},
		tol_paspro: {
			center: {lat: -7.756010, lng: 113.212025},
			population: <?php echo $area_56; ?>
		}
	};
	var citymap3 = {
		ciujung: {
			center: {lat: -6.145728, lng: 106.281534},
			population: <?php echo $area_1; ?>
		},
		cilegon: {
			center: {lat: -6.012030, lng: 106.048478},
			population: <?php echo $area_2; ?>
		},
		serpong: {
			center: {lat: -6.309661, lng: 106.682533},
			population: <?php echo $area_3; ?>
		},
		gading_serpong: {
			center: {lat: -6.243395, lng: 106.619659},
			population: <?php echo $area_4; ?>
		},
		ciwadang3: {
			center: {lat: -6.025918, lng: 105.962822},
			population: <?php echo $area_5; ?>
		},
		panimbang2: {
			center: {lat: -6.535206, lng: 105.692810},
			population: <?php echo $area_6; ?>
		},
		kebon_nanas: {
			center: {lat: -6.230929, lng: 106.880005},
			population: <?php echo $area_7; ?>
		},
		jelambar: {
			center: {lat: -6.158785, lng: 106.785947},
			population: <?php echo $area_8; ?>
		},
		cilincing: {
			center: {lat: -6.129456, lng: 106.946103},
			population: <?php echo $area_9; ?>
		},
		cikupa: {
			center: {lat: -6.217299, lng: 106.515422},
			population: <?php echo $area_10; ?>
		},
		tangerang2: {
			center: {lat: -6.170188, lng: 106.677160},
			population: <?php echo $area_11; ?>
		},
		kebon_nanas2: {
			center: {lat: -6.214881, lng: 106.638492},
			population: <?php echo $area_14; ?>
		},
		kp_rambutan: {
			center: {lat: -6.305268, lng: 106.874063},
			population: <?php echo $area_15; ?>
		},
		bekasi: {
			center: {lat: -6.249718, lng: 106.984703},
			population: <?php echo $area_16; ?>
		},
		serpong2: {
			center: {lat: -6.289186, lng: 106.673262},
			population: <?php echo $area_17; ?>
		}
	};
	var citymap4 = {
		bogor: {
			center: {lat: -6.601662, lng: 106.805971},
			population: <?php echo $area_18; ?>
		},
		palembang: {
			center: {lat: -2.958736, lng: 104.760218},
			population: <?php echo $area_19; ?>
		},
		sukabumi2: {
			center: {lat: -6.914857, lng: 106.925720},
			population: <?php echo $area_20; ?>
		},
		cianjur2: {
			center: {lat: -6.825547, lng: 107.137201},
			population: <?php echo $area_21; ?>
		},
		lampung2: {
			center: {lat: -5.385553, lng: 105.325441},
			population: <?php echo $area_23; ?>
		},
		palembang2: {
			center: {lat: -3.008111, lng: 104.795936},
			population: <?php echo $area_24; ?>
		},
		sukamahi: {
			center: {lat: -6.374003, lng: 107.180009},
			population: <?php echo $area_25; ?>
		},
		cikarang: {
			center: {lat: -6.312989, lng: 107.156666},
			population: <?php echo $area_26; ?>
		},
		cirebon: {
			center: {lat: -6.739962, lng: 108.552322},
			population: <?php echo $area_27; ?>
		},
		karawangtimur: {
			center: {lat: -6.313716, lng: 107.329236},
			population: <?php echo $area_28; ?>
		},
		sadang: {
			center: {lat: -6.506583, lng: 107.452020},
			population: <?php echo $area_29; ?>
		},
		gedebage: {
			center: {lat: -6.954313, lng: 107.698648},
			population: <?php echo $area_30; ?>
		},
		cibitung: {
			center: {lat: -6.235437, lng: 107.102299},
			population: <?php echo $area_31; ?>
		},
		majalengka: {
			center: {lat: -6.799281, lng: 108.282682},
			population: <?php echo $area_32; ?>
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
				radius: Math.sqrt(citymap1[city1].population) * 500
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
				radius: Math.sqrt(citymap2[city2].population) * 500
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
				radius: Math.sqrt(citymap3[city3].population) * 500
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
				radius: Math.sqrt(citymap4[city4].population) * 500
			});
			
		}
		
	}
	
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGdJQZNTJ5IvfZdULrnWMkO1h0EJxgfFU&callback=initMap">
</script>
