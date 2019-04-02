<!DOCTYPE html>

		<div class="col-md-12 col-xs-12">
			<h5>
				<b><?php echo $mc_name_1; ?></b>
				<span class="label pull-right" id="col<?php echo $mc_name_1; ?>"></span>
			</h5>
			<div class="progress progress-xxs bg-gray">
				<div id="bar1<?php echo $mc_name_1; ?>" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
			</div>
		<?php if($ena > 1){?>
			<h5>
				<b><?php echo $mc_name_2; ?></b>
				<span class="label pull-right" id="col<?php echo $mc_name_2; ?>"></span>
			</h5>
			<div class="progress progress-xxs bg-gray">
				<div id="bar2<?php echo $mc_name_2; ?>" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
			</div>
		<?php }if($ena > 2){?>
			<h5>
				<b><?php echo $mc_name_3; ?></b>
				<span class="label pull-right" id="col<?php echo $mc_name_3; ?>"></span>
			</h5>
			<div class="progress progress-xxs bg-gray">
				<div id="bar3<?php echo $mc_name_3; ?>" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
			</div>
		<?php } ?>
		</div>
<script>
	var elem1<?php echo $ajax_link; ?> = document.getElementById("bar1<?php echo $mc_name_1; ?>");
	var span1<?php echo $ajax_link; ?> = document.getElementById("col<?php echo $mc_name_1; ?>");
<?php if($ena > 1){?>
	var elem2<?php echo $ajax_link; ?> = document.getElementById("bar2<?php echo $mc_name_2; ?>");
	var span2<?php echo $ajax_link; ?> = document.getElementById("col<?php echo $mc_name_2; ?>");
<?php }if($ena > 2){?>
	var elem3<?php echo $ajax_link; ?> = document.getElementById("bar3<?php echo $mc_name_3; ?>");
	var span3<?php echo $ajax_link; ?> = document.getElementById("col<?php echo $mc_name_3; ?>");
<?php } ?>
	var lim1_1<?php echo $ajax_link; ?> = <?php echo $limit1_1; ?>;
	var lim1_2<?php echo $ajax_link; ?> = <?php echo $limit1_2; ?>;
	var lim1_3<?php echo $ajax_link; ?> = <?php echo $limit1_3; ?>;
<?php if($ena > 1){?>
	var lim2_1<?php echo $ajax_link; ?> = <?php echo $limit2_1; ?>;
	var lim2_2<?php echo $ajax_link; ?> = <?php echo $limit2_2; ?>;
	var lim2_3<?php echo $ajax_link; ?> = <?php echo $limit2_3; ?>;
<?php }if($ena > 2){?>
	var lim3_1<?php echo $ajax_link; ?> = <?php echo $limit3_1; ?>;
	var lim3_2<?php echo $ajax_link; ?> = <?php echo $limit3_2; ?>;
	var lim3_3<?php echo $ajax_link; ?> = <?php echo $limit3_3; ?>;
<?php } ?>
	function request_ajax<?php echo $ajax_link; ?>(){
		$.ajax({
			url: '<?php echo base_url(); ?><?php echo $ajax_link; ?>',
			success: function(point){
				$('#col<?php echo $mc_name_1; ?>').html(point['bar1<?php echo $ajax_link; ?>'] + ' <?php echo $unit_1; ?>');
				var bar1<?php echo $ajax_link; ?> = point['bar1<?php echo $ajax_link; ?>'] / lim1_3<?php echo $ajax_link; ?> * 100;
				elem1<?php echo $ajax_link; ?>.style.width = bar1<?php echo $ajax_link; ?> + '%';
				if(point['bar1<?php echo $ajax_link; ?>'] < lim1_1<?php echo $ajax_link; ?>){
				<?php if(!empty($revert1)){ ?>
					elem1<?php echo $ajax_link; ?>.classList.add('progress-bar-red');
					span1<?php echo $ajax_link; ?>.classList.add('label-danger');
					elem1<?php echo $ajax_link; ?>.classList.remove('progress-bar-green');
					elem1<?php echo $ajax_link; ?>.classList.remove('progress-bar-yellow');
					span1<?php echo $ajax_link; ?>.classList.remove('label-success');
					span1<?php echo $ajax_link; ?>.classList.remove('label-warning');
				<?php }else{ ?>
					elem1<?php echo $ajax_link; ?>.classList.add('progress-bar-green');
					span1<?php echo $ajax_link; ?>.classList.add('label-success');
					elem1<?php echo $ajax_link; ?>.classList.remove('progress-bar-yellow');
					elem1<?php echo $ajax_link; ?>.classList.remove('progress-bar-red');
					span1<?php echo $ajax_link; ?>.classList.remove('label-warning');
					span1<?php echo $ajax_link; ?>.classList.remove('label-danger');
				<?php } ?>
				}
				if(point['bar1<?php echo $ajax_link; ?>'] >= lim1_1<?php echo $ajax_link; ?> && point['bar1<?php echo $ajax_link; ?>'] <= lim1_2<?php echo $ajax_link; ?>){
					elem1<?php echo $ajax_link; ?>.classList.add('progress-bar-yellow');
					span1<?php echo $ajax_link; ?>.classList.add('label-warning');
					elem1<?php echo $ajax_link; ?>.classList.remove('progress-bar-green');
					elem1<?php echo $ajax_link; ?>.classList.remove('progress-bar-red');
					span1<?php echo $ajax_link; ?>.classList.remove('label-success');
					span1<?php echo $ajax_link; ?>.classList.remove('label-danger');
				}
				if(point['bar1<?php echo $ajax_link; ?>'] > lim1_2<?php echo $ajax_link; ?>){
				<?php if(!empty($revert1)){ ?>
					elem1<?php echo $ajax_link; ?>.classList.add('progress-bar-green');
					span1<?php echo $ajax_link; ?>.classList.add('label-success');
					elem1<?php echo $ajax_link; ?>.classList.remove('progress-bar-yellow');
					elem1<?php echo $ajax_link; ?>.classList.remove('progress-bar-red');
					span1<?php echo $ajax_link; ?>.classList.remove('label-warning');
					span1<?php echo $ajax_link; ?>.classList.remove('label-danger');
				<?php }else{ ?>
					elem1<?php echo $ajax_link; ?>.classList.add('progress-bar-red');
					span1<?php echo $ajax_link; ?>.classList.add('label-danger');
					elem1<?php echo $ajax_link; ?>.classList.remove('progress-bar-green');
					elem1<?php echo $ajax_link; ?>.classList.remove('progress-bar-yellow');
					span1<?php echo $ajax_link; ?>.classList.remove('label-success');
					span1<?php echo $ajax_link; ?>.classList.remove('label-warning');
				<?php } ?>
				}
			<?php if($ena > 1){ ?>
				$('#col<?php echo $mc_name_2; ?>').text(point['bar2<?php echo $ajax_link; ?>'] + ' <?php echo $unit_2; ?>');
				var bar2<?php echo $ajax_link; ?> = point['bar2<?php echo $ajax_link; ?>'] / lim2_3<?php echo $ajax_link; ?> * 100;
				elem2<?php echo $ajax_link; ?>.style.width = bar2<?php echo $ajax_link; ?> + '%';
				if(point['bar2<?php echo $ajax_link; ?>'] < lim2_1<?php echo $ajax_link; ?>){
				<?php if(!empty($revert2)){ ?>
					elem2<?php echo $ajax_link; ?>.classList.add('progress-bar-red');
					span2<?php echo $ajax_link; ?>.classList.add('label-danger');
					elem2<?php echo $ajax_link; ?>.classList.remove('progress-bar-green');
					elem2<?php echo $ajax_link; ?>.classList.remove('progress-bar-yellow');
					span2<?php echo $ajax_link; ?>.classList.remove('label-success');
					span2<?php echo $ajax_link; ?>.classList.remove('label-warning');
				<?php }else{ ?>
					elem2<?php echo $ajax_link; ?>.classList.add('progress-bar-green');
					span2<?php echo $ajax_link; ?>.classList.add('label-success');
					elem2<?php echo $ajax_link; ?>.classList.remove('progress-bar-yellow');
					elem2<?php echo $ajax_link; ?>.classList.remove('progress-bar-red');
					span2<?php echo $ajax_link; ?>.classList.remove('label-warning');
					span2<?php echo $ajax_link; ?>.classList.remove('label-danger');
				<?php } ?>
				}
				if(point['bar2<?php echo $ajax_link; ?>'] >= lim2_1<?php echo $ajax_link; ?> && point['bar2<?php echo $ajax_link; ?>'] <= lim2_2<?php echo $ajax_link; ?>){
					elem2<?php echo $ajax_link; ?>.classList.add('progress-bar-yellow');
					span2<?php echo $ajax_link; ?>.classList.add('label-warning');
					elem2<?php echo $ajax_link; ?>.classList.remove('progress-bar-green');
					elem2<?php echo $ajax_link; ?>.classList.remove('progress-bar-red');
					span2<?php echo $ajax_link; ?>.classList.remove('label-success');
					span2<?php echo $ajax_link; ?>.classList.remove('label-danger');
				}
				if(point['bar2<?php echo $ajax_link; ?>'] > lim2_2<?php echo $ajax_link; ?>){
				<?php if(!empty($revert2)){ ?>
					elem2<?php echo $ajax_link; ?>.classList.add('progress-bar-green');
					span2<?php echo $ajax_link; ?>.classList.add('label-success');
					elem2<?php echo $ajax_link; ?>.classList.remove('progress-bar-yellow');
					elem2<?php echo $ajax_link; ?>.classList.remove('progress-bar-red');
					span2<?php echo $ajax_link; ?>.classList.remove('label-warning');
					span2<?php echo $ajax_link; ?>.classList.remove('label-danger');
				<?php }else{ ?>
					elem2<?php echo $ajax_link; ?>.classList.add('progress-bar-red');
					span2<?php echo $ajax_link; ?>.classList.add('label-danger');
					elem2<?php echo $ajax_link; ?>.classList.remove('progress-bar-green');
					elem2<?php echo $ajax_link; ?>.classList.remove('progress-bar-yellow');
					span2<?php echo $ajax_link; ?>.classList.remove('label-success');
					span2<?php echo $ajax_link; ?>.classList.remove('label-warning');
				<?php } ?>
				}
			<?php }if($ena > 2){ ?>
				$('#col<?php echo $mc_name_3; ?>').html(point['bar3<?php echo $ajax_link; ?>'] + ' <?php echo $unit_3; ?>');
				var bar3<?php echo $ajax_link; ?> = point['bar3<?php echo $ajax_link; ?>'] / lim3_3<?php echo $ajax_link; ?> * 100;
				elem3<?php echo $ajax_link; ?>.style.width = bar3<?php echo $ajax_link; ?> + '%';
				if(point['bar3<?php echo $ajax_link; ?>'] < lim3_1<?php echo $ajax_link; ?>){
				<?php if(!empty($revert3)){ ?>
					elem3<?php echo $ajax_link; ?>.classList.add('progress-bar-red');
					span3<?php echo $ajax_link; ?>.classList.add('label-danger');
					elem3<?php echo $ajax_link; ?>.classList.remove('progress-bar-green');
					elem3<?php echo $ajax_link; ?>.classList.remove('progress-bar-yellow');
					span3<?php echo $ajax_link; ?>.classList.remove('label-success');
					span3<?php echo $ajax_link; ?>.classList.remove('label-warning');
				<?php }else{ ?>
					elem3<?php echo $ajax_link; ?>.classList.add('progress-bar-green');
					span3<?php echo $ajax_link; ?>.classList.add('label-success');
					elem3<?php echo $ajax_link; ?>.classList.remove('progress-bar-yellow');
					elem3<?php echo $ajax_link; ?>.classList.remove('progress-bar-red');
					span3<?php echo $ajax_link; ?>.classList.remove('label-warning');
					span3<?php echo $ajax_link; ?>.classList.remove('label-danger');
				<?php } ?>
				}
				if(point['bar3<?php echo $ajax_link; ?>'] >= lim3_1<?php echo $ajax_link; ?> && point['bar3<?php echo $ajax_link; ?>'] <= lim3_2<?php echo $ajax_link; ?>){
					elem3<?php echo $ajax_link; ?>.classList.add('progress-bar-yellow');
					span3<?php echo $ajax_link; ?>.classList.add('label-warning');
					elem3<?php echo $ajax_link; ?>.classList.remove('progress-bar-green');
					elem3<?php echo $ajax_link; ?>.classList.remove('progress-bar-red');
					span3<?php echo $ajax_link; ?>.classList.remove('label-success');
					span3<?php echo $ajax_link; ?>.classList.remove('label-danger');
				}
				if(point['bar3<?php echo $ajax_link; ?>'] > lim3_2<?php echo $ajax_link; ?>){
				<?php if(!empty($revert3)){ ?>
					elem3<?php echo $ajax_link; ?>.classList.add('progress-bar-green');
					span3<?php echo $ajax_link; ?>.classList.add('label-success');
					elem3<?php echo $ajax_link; ?>.classList.remove('progress-bar-yellow');
					elem3<?php echo $ajax_link; ?>.classList.remove('progress-bar-red');
					span3<?php echo $ajax_link; ?>.classList.remove('label-warning');
					span3<?php echo $ajax_link; ?>.classList.remove('label-danger');
				<?php }else{ ?>
					elem3<?php echo $ajax_link; ?>.classList.add('progress-bar-red');
					span3<?php echo $ajax_link; ?>.classList.add('label-danger');
					elem3<?php echo $ajax_link; ?>.classList.remove('progress-bar-green');
					elem3<?php echo $ajax_link; ?>.classList.remove('progress-bar-yellow');
					span3<?php echo $ajax_link; ?>.classList.remove('label-success');
					span3<?php echo $ajax_link; ?>.classList.remove('label-warning');
				<?php } ?>
				}
			<?php } ?>
			}
		});
	}
	request_ajax<?php echo $ajax_link; ?>();
	setInterval(function(){
		request_ajax<?php echo $ajax_link; ?>();
	}, <?php echo $ajax_delay; ?>)
</script>

