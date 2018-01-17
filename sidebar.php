<section class="sidebar">
<?php 
	if( is_single() ){
		 echo "<div class='gravatar'>" 
				 . get_avatar( get_the_author_meta( 'ID' ) ) .
			  "</div>";
		 echo "<div class='grav_author'><a href='".get_author_posts_url( get_the_author_meta( 'ID' ) )."'>".get_the_author()."</a></div>";
	}
	dynamic_sidebar('Right-Sidebar');
?>
</section>
