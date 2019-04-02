

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
        <strong> <a href="<?php echo base_url();?>about">Automated<b>RAWR</b></a> </strong>
        </div>
        <strong>&copy; 2019 <a href="<?php echo base_url();?>about">Automated<b>RAWR</b></a>.</strong> All rights reserved.
    </footer>
    
    <!-- jQuery UI 1.11.2 -->
    <!-- <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script> -->
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/app.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.validate.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/validation.js" type="text/javascript"></script>
    <script type="text/javascript">
        var windowURL = window.location.href;
        pageURL = windowURL.substring(0, windowURL.lastIndexOf('/'));
        var x= $('a[href="'+pageURL+'"]');
            x.addClass('active');
            x.parent().addClass('active');
        var y= $('a[href="'+windowURL+'"]');
            y.addClass('active');
            y.parent().addClass('active');
		
		$('.getbugpersen').load('<?php echo base_url();?>getbugpersen');
	<?php if($appmode == 0){ ?>
		$('.notif1').load('<?php echo base_url();?>notif1');
		$('.notif2').load('<?php echo base_url();?>notif2');
		$('.notif3').load('<?php echo base_url();?>notif3');
		$('.notif4').load('<?php echo base_url();?>notif4');
		$('.notif5').load('<?php echo base_url();?>notif5');
		$('.notif6').load('<?php echo base_url();?>notif6');
		$('.notif7').load('<?php echo base_url();?>notif7');
		$('.notif8').load('<?php echo base_url();?>notif8');
		$('.notif9').load('<?php echo base_url();?>notif9');
		$('.notif10').load('<?php echo base_url();?>notif10');
		$('.notif11').load('<?php echo base_url();?>notif11');
		$('.notifa').load('<?php echo base_url();?>notifa');
		$('.notifb').load('<?php echo base_url();?>notifb');
		$('.notif_h1').load('<?php echo base_url();?>notif_h1');
		//setInterval(function(){
		//	$('.notif1').load('<?php echo base_url();?>notif1');
		//	$('.notif2').load('<?php echo base_url();?>notif2');
		//	$('.notif3').load('<?php echo base_url();?>notif3');
		//	$('.notif4').load('<?php echo base_url();?>notif4');
		//	$('.notif5').load('<?php echo base_url();?>notif5');
	//	$('.notif_h1').load('<?php echo base_url();?>notif_h1');
		//}, 60000)
	<?php } ?>
	<?php if($appmode == 3){ ?>
		$('.notiftodayjsa').load('<?php echo base_url();?>notiftodayjsa');
		$('.notifappjsa').load('<?php echo base_url();?>notifappjsa');
		$('.notifmyjsa').load('<?php echo base_url();?>notifmyjsa');
	<?php } ?>	
	<?php if($appmode == 2){ ?>
		setInterval(function(){
			$('.myorder').load('<?php echo base_url(); ?>myorderedtool');
			$('.jqongoinvoice').load('<?php echo base_url(); ?>jqongoinvoice');
			$('.jqnewinvoice').load('<?php echo base_url(); ?>jqnewinvoice');
			$('.jqbrokinvoice').load('<?php echo base_url(); ?>jqbrokinvoice');
		}, 1000)
    <?php } ?>
	$('#server_update').load('<?php echo base_url(); ?>server_update');
	function lettersOnly(input) {
		var regex = /[^a-z0-9~!@#$%^&*_`+;:?.,()\/-\s]/gi;
		input.value = input.value.replace(regex, "");
	}
	function filter_type1(input) {
		var regex = /[^a-z0-9_\s]/gi;
		input.value = input.value.replace(regex, "");
	}
	var imgs = document.getElementsByTagName('img')
    for(var i=0,j=imgs.length;i<j;i++){
        imgs[i].onerror = function(e){
        this.parentNode.removeChild(this);
    }}
	$(function() {
		$(".knob").knob();
	});
	
</script>
	
  </body>
</html>
<!--
Server Set-up:
> Prepare, Ubuntu 18.04 Server or above
> Install apache2 webserver
> Install php7.2 or above
> Install Composer
> sudo apt-get install php-mysql
edit override on apache2.conf to enable routing
> sudo nano /etc/apache2/apache2.conf
> sudo a2enmod rewrite
> sudo service apache2 restart
> sudo apt-get update
> sudo apt-get install php-dom or sudo apt-get install php-xml
> sudo apt-get install php-mbstring
> sudo apt-get install php-curl
> sudo service apache2 restart
edit php.ini to increase max upload file, set to 20MB
> sudo nano /etc/php/7.2/cli/php.ini or based on your php version
> sudo service apache2 restart
done
====================================================================================
           +
         ( ')<    //PFFFTTTTTTTT...\\
	    / _ \     
      /| / \ |    
     /_|/   \|\        ======================
	 V |\___/|V        ||_|                  
       \  _  )         ||x| AutomatedRAWR 
        \/ \/          ||v| Free to distribute, use with your own risk
        ^  ^           ||v| More info, akbar.kurnia.p@gmail.com
		               ||v| Please mail me if you has better penguin in notepad
====================================================================================
-->