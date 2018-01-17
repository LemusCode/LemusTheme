</div><!--fin cuerpo general-->
<div class="go-up">
	<i class="fa fa-chevron-up"></i>
</div>
<footer>
	<div class="row categories">
		<div class="column">
			<?php dynamic_sidebar('Lista 1'); ?>
		</div>
		<div class="column">
			<?php dynamic_sidebar('Lista 2'); ?>
		</div>
		<div class="column">
			<?php dynamic_sidebar('Lista 3'); ?>
		</div>
	</div>
	<div class="row more-content">
		<div class="column">
			<?php dynamic_sidebar('Mas Contenido'); ?>
		</div>
	</div>
	<div class="row">
		<div class="column">
			<?php dynamic_sidebar('Footer 1'); ?>
		</div>
		<div class="column">
			<?php dynamic_sidebar('Footer 2'); ?>
		</div>
		<div class="column">
			<?php dynamic_sidebar('Footer 3'); ?>
		</div>
		<div class="column">
			<?php dynamic_sidebar('Footer 4'); ?>
		</div>
	</div>
	<div class="social">
		<div class="follow">Síguenos:</div> 
		<div class="social_links">
			<a href="http://www.facebook.com/lemuscode"><i class="fa fa-facebook-official"></i></a>
			<a href="http://www.facebook.com/lemuscode"><i class="fa fa-instagram"></i></a>
			<a href="http://www.facebook.com/lemuscode"><i class="fa fa-twitter"></i></a>
			<a href="https://lemuscode.mx/feed/"><i class="fa fa-feed"></i></a>
		</div>
		<div class="site_desc">LemusCode - Expandiendo tu mente</div>
	</div>
	<div class="copy">
		<i class="fa fa-copyright"></i> LemusCode <?php echo date("Y");?> <small>Realizado por AngelLemus</small>
	</div>
</footer>
<?php wp_footer(); ?>