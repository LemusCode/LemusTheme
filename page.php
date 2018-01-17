
<?php get_header(); ?>
<section class="post_container">
    <?php if(have_posts()) : ?>
      <?php while(have_posts()) : the_post(); ?>
         <?php
            if ( has_post_thumbnail() ) { 

              ?>
              <div class="img_destacada">
              <?php
                 the_post_thumbnail();
              ?>
              </div>
              <div class="post_contenido">
              <?php
              }else{
                ?>
                <div class="post_contenido no-image">
                <?php
              }
        ?>
      

          <!--Titulo del Post-->
          <div class="post_title">
           <h1> <?php the_title(); ?></h1>
          </div>

           <!--Contenido del Post-->
          <div class="post_content">
            <?php the_content(); ?>
          </div>

          <div class="post_share_buttons">
            <h3>Comparte con tus amigos! </h3>
            <?= lemus_compartir();?> 
          </div>
         
        </div>


    <?php endwhile; ?>
  <?php endif; ?>

</section> <!-- Fin de main -->

<?php get_sidebar();?>

<?php get_footer(); ?>
