
<?php get_header(); ?>
<section class="post_container single_post">
 
    <?php if( have_posts() ): ?>
         <div class="bread_crumbs"><?php breadcrumb_trail(); ?>  </div>

         <?php while( have_posts() ) : the_post()  ?>
            <?php if( has_post_thumbnail() ){ ?>
                  <div class="img_destacada">
                    <div class="post_title_over">
                      <h1> <?php the_title(); ?></h1>
                    </div>
                  <?php
                    the_post_thumbnail();
                  ?>
                   </div>
                  <?php
                  }else{
                    ?>
                    <div class="post_title_over">
                      <h1> <?php the_title(); ?></h1>
                    </div>
                    <?php
                  }
            ?>  
         
          <div class="post_contenido">
            <div class="post_body">

              <div class="post_title">
              
               <div class="post_meta_info">
                  <?= lemus_meta_info();?>
                  <span><i class="fa fa-folder-o"></i> <?php the_category(', '); ?> </span>
                </div>
              </div>


              <div class="post_content">
                <?php the_content(); ?>
              </div>


               <div class="post_share_buttons">
                <?= lemus_compartir();?> 
               </div>

              <div class="post_meta_info post_footer">
                  <?= lemus_meta_info();?>
                  <span><i class="fa fa-folder-o"></i> <?php the_category(', '); ?> </span>
              </div>

              <div class="post_tags">
                 <?php the_tags('<ul><li class="etiqueta_post"><i class="fa fa-tags"></i> ','</li> <li class="etiqueta_post"><i class="fa fa-tags"></i> ','</li></ul>'); ?>
              </div>
            </div>


            <div class="sidebar_post">
               <?php get_sidebar();?>
            </div>
          </div>
          <?php endwhile; ?>
    <?php endif; ?>
 
	
</section> <!-- Fin de post_container -->





<?php get_footer(); ?>
