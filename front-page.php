<?php 
/*
*Esta es el front-page (Ajustes/lectura/Página frontal muestra/Tus ultimas entradas o pagina estatica selecionada)
*/
?>
<?php get_header(); ?>
<!--Front Page-->
<div class="slider" style="width: 100%;"><?php wdp_slider(3); ?></div>
<section class="post_container">

<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
  <div class="loop_tres_column">
        
    <?php
      //Si existe imagen
      if ( has_post_thumbnail() ) { 
        ?>
           <!--Titulo-->
          <div class="loop_post_header">
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="loop_post_title">
             <?php the_title(); ?>
            </a>
          </div>
          <!--Imagen cabecera-->
          <div class="loop_imagen">
            <a href="<?php the_permalink(); ?>">
              <?php
                the_post_thumbnail();
              ?>
            </a>
          </div>
        <?php
      }else{
        ?>
         <!--Titulo-->
          <div class="loop_post_header no_imagen">
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="loop_post_title">
            <h3> <?php the_title(); ?></h3>
            </a>
          </div>
        <?php
      }
    ?>

    <!--excerpt-->
    <div class="loop_excerpt">
      <?php the_excerpt(); ?>
    </div>
    <!--Meta Info-->
    <div class="loop_meta_info"><?= lemus_meta_info();?> &nbsp;<i class="fa fa-folder-o"></i> <?php the_category(', ');?></div>

  </div><!--fin loop_two_column-->
    
  <!--Fin del While; si no hay entradas se muesta lo sig-->
  <?php endwhile; 

  lemus_pagination();

  else: ?>


  <!--Si no hay entradas-->
    <?php get_template_part( 'template-parts/content', 'nopostblog' ); ?>


  <!--Fin del If have posts-->
    
  <?php endif; ?>


</section> <!-- Fin de post_container -->

<?php get_sidebar();?>

<?php get_footer(); ?>


