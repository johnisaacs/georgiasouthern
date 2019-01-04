<?php
/*
Template Name: New Home Page 2018
*/
?>
<?php get_header( 'new' ); ?>
<?php dynamic_sidebar( 'Informational Bar' ); ?>

<script>
jQuery(document).ready(function($){
$('#seven img').addClass('img-responsive');
});
</script>
<div id="content">
	<div class="container-fluid" style="background-color:#eee;">
		<div class="row">			
			<?php dynamic_sidebar( 'home-banner-image' ); ?>			
		</div>
	</div>
	<section id="one" style="background-color:#eee;padding-top:45px;padding-bottom:25px;">	
		<div class="container">
			<div style="padding-bottom:20px;" class="row info-graphics">
				<?php dynamic_sidebar( 'home-row-one' ); ?>
			</div>
		</div>	
	</section>
	<section id="two" class="center intro" style="padding-top:45px;padding-bottom:60px;">
		<div class="container">
			<div class="row">				
				<?php dynamic_sidebar( 'home-row-two' ); ?>
			</div>
		</div>
	</section>
	<section id="three" style="background-color:#eee;padding-top:30px;padding-bottom:45px;">
		<div class="container">					
			<div class="row">				
				<?php dynamic_sidebar( 'home-row-three' ); ?>				
			</div>
		</div>
	</section>			
	<section id="four" class="center" style="padding-top:30px;padding-bottom:45px;">
		<div class="container">					
			<div class="row" style="padding-top:30px;padding-bottom:45px;">				
				<?php dynamic_sidebar( 'home-row-four' ); ?>				
			</div>
		</div>
	</section>
	<section id="five" style="background-color:#eee;">
		<div class="container">
			<div class="row" style="padding-top:30px;padding-bottom:45px;">
				<?php dynamic_sidebar( 'home-row-five' ); ?>	
			</div>
		</div>
	</section>
	<section id="six" class="center" style="padding-top:30px;padding-bottom:45px;">
		<div class="container">					
			<div class="row" style="padding-top:30px;padding-bottom:45px;">
				<?php dynamic_sidebar( 'home-row-six' ); ?>
			</div>
		</div>
	</section>
	<section id="seven" style="background-color:#eee;padding-top:60px;padding-bottom:60px;">
		<div class="container">					
			<div class="row">
				<?php dynamic_sidebar( 'home-row-seven' ); ?>
			</div>
		</div>
	</section>	
</div>		
<?php get_footer( 'new' ); ?>
</body>
</html>