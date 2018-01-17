<?php 

function lemus_compartir(){
  global $post;
    $post_url = get_permalink();

  // El titulo de la pagina actual
  $post_title = str_replace( ' ', '%20', get_the_title());
  
  // la imagen del post para pinterest
  $post_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

  // Arma los links de compartir
  $twitterURL = 'https://twitter.com/intent/tweet?text='.$post_title.'&amp;url='.$post_url;
  $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$post_url;
  $googleURL = 'https://plus.google.com/share?url='.$post_url;
  $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$post_url.'&amp;media='.$post_thumbnail[0].'&amp;description='.$post_title;
  $mailURL = 'mailto:?Subject='.$post_title.'&amp;Body='.$post_url;
  $whatsapp = 'whatsapp://send?text='.$post_url;

  $content = '<div class="lemus_share_buttons">';
  $content .= '<span>Compartir: </span> &nbsp;';
  $content .= ' <a target="_blank" href="'.$facebookURL.'" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>';
  $content .= '<a target="_blank" href="'. $twitterURL .'" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>';
  $content .= '<a target="_blank" href="'. $whatsapp .'" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>';
  $content .= '<a target="_blank" href="'.$googleURL.'" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>';
  $content .= '<a target="_blank" href="'.$pinterestURL.'" target="_blank"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>';
  $content .= '<a target="_blank" href="'.$mailURL.'"><i class="fa fa-envelope" aria-hidden="true"></i></a>';
  $content .= '</div>';
    
    echo $content;
}


//Funcion para los comentarios y la meta descripcion del post
function lemus_meta_info(){

	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	
	//Fecha
	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);
	//Fecha del post
	$posted_on = sprintf(
		esc_html_x( ' %s', 'post date', 'lemus' ),
		'<a rel="bookmark">' . $time_string . '</a>'
	);
	//Posteado por 
	/*$byline = sprintf(
		esc_html_x( '%s', 'post author', 'lemus' ),
		'<span class="author vcard" style="display:inline-block"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);*/

	$comment_count = get_comments_number(); // Solo regresa valor numerico

	if ( comments_open() ) {
		if ( $comment_count == 0 ) {

			$comments = __('Sin comentarios', 'lemus' );

		} elseif ( $comment_count > 1 ) {

			$comments = $comment_count . __(' comentarios', 'lemus' );

		} else {

			$comments = __('1 comentario', 'lemus' );

		}

		$comment_link = '<a href="' . get_comments_link() .'">'. $comments.'</a>';

		echo '<div class="meta_data">

          <span class="posted_on"><i class="fa fa-clock-o"></i>' . $posted_on . '</span>
          <span class="comment_count"><i class="fa fa-comments-o"></i> &nbsp;' . $comment_link ."</span>
          </div>
          "
         ;
	}else{

		//echo '<span class="posted-on"><i class="fa fa-clock-o"></i> ' . $posted_on . '</span> <span class="byline"> ' . $byline . '</span>';
	}

	
}


function lemus_pagination($pages = '', $range = 2)
{  
     $showitems = ($range * 2)+1;  
 
     global $paged;
     if(empty($paged)) $paged = 1;
 
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   
 
     if(1 != $pages)
     {
         echo "<div class='pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";
 
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }
 
         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
         echo "</div>\n";
     }
}

// Registro del menú de WordPress

add_theme_support( 'nav-menus' );

if ( function_exists( 'register_nav_menus' ) ) {
    register_nav_menus(
        array(
          'top' => __( 'Principal', 'lemuscode' ),
          'disclaimer' => __( 'Disclaimer', 'lemuscode' ),
        )
    );
}

 //  Main Sidebar
 if(function_exists('register_sidebar')){
    register_sidebar(array(
          'name'          => 'Right-Sidebar',
          'id'            => 'right-sidebar',
          'before_widget' => '<div class="widget">',
          'after_widget'  => '</div>',
          'before_title'  => '<h4>',
          'after_title'   => '</h4>',
    ));
 }
          


//Habilitar thumbnails
add_theme_support('post-thumbnails');

// Permitir comentarios encadenados
function enable_threaded_comments(){
    if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
       wp_enqueue_script('comment-reply');
    }
}
add_action('get_header', 'enable_threaded_comments');


//Cambiar los puntos del excepert
function mqw_trim_excerpt($text) {
  $text = str_replace('[&hellip;]', '...', $text);
     return $text;
}
add_filter('get_the_excerpt', 'mqw_trim_excerpt');


//modifica longitud del excerpt
function longitud_excerpt($length) {
    return 30;
}
add_filter('excerpt_length', 'longitud_excerpt');



if( function_exists('register_sidebar') ){

    register_sidebar(array(
      'name' => 'Footer 1',
      'before_widget' => '<div class="widget">',
      'after_widget' => '</div>',
      'before_title' => '<h3>',
      'after_title' => '</h3>',
    ));
}
if( function_exists('register_sidebar') ){
    register_sidebar(array(
      'name' => 'Footer 2',
      'before_widget' => '<div class="widget">',
      'after_widget' => '</div>',
      'before_title' => '<h3>',
      'after_title' => '</h3>',
    ));
}

if( function_exists('register_sidebar') ){
    register_sidebar(array(
      'name' => 'Footer 3',
      'before_widget' => '<div class="widget">',
      'after_widget' => '</div>',
      'before_title' => '<h3>',
      'after_title' => '</h3>',
    ));
}

if( function_exists('register_sidebar') ){
    register_sidebar(array(
      'name' => 'Footer 4',
      'before_widget' => '<div class="widget">',
      'after_widget' => '</div>',
      'before_title' => '<h3>',
      'after_title' => '</h3>',
    ));
}
if( function_exists('register_sidebar') ){
    register_sidebar(array(
      'name' => 'Mas Contenido',
      'before_widget' => '<div class="widget">',
      'after_widget' => '</div>',
      'before_title' => '<h3>',
      'after_title' => '</h3>',
    ));
}
if( function_exists('register_sidebar') ){
    register_sidebar(array(
      'name' => 'Lista 1',
      'before_widget' => '<div class="widget">',
      'after_widget' => '</div>',
      'before_title' => '<h3>',
      'after_title' => '</h3>',
    ));
}
if( function_exists('register_sidebar') ){
    register_sidebar(array(
      'name' => 'Lista 2',
      'before_widget' => '<div class="widget">',
      'after_widget' => '</div>',
      'before_title' => '<h3>',
      'after_title' => '</h3>',
    ));
}
if( function_exists('register_sidebar') ){
    register_sidebar(array(
      'name' => 'Lista 3',
      'before_widget' => '<div class="widget">',
      'after_widget' => '</div>',
      'before_title' => '<h3>',
      'after_title' => '</h3>',
    ));
}


add_filter( 'jetpack_development_mode', '__return_false' );
?>