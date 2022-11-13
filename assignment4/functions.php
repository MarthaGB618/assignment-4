<?php 
/*---------------
Add stylesheets and javascript files
--------------------------*/
function custom_theme_scripts(){
    //Bootstrap CSS
    wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap-grid', get_stylesheet_directory_uri() . '/css/bootstrap-grid.min.css');

//Main stylesheet
wp_enqueue_style('main-styles', get_stylesheet_uri());

//Javascript files
wp_enqueue_script('bootstrap-js',  get_stylesheet_directory_uri() . '/js/bootstrap.min.cjs'); 
wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/js/scripts.js');
}

add_action('wp_enqueue_scripts', 'custom_theme_scripts');


/*------------------------
Add featured images
--------------------------*/
add_theme_support('post-thumbnails');

/*------------------------
Custom header image
--------------------------*/

$custom_image_header = array(
    'width'   => 1100,
    'height'  => 150,   
    'uploads' => true
);

add_theme_support('custom-header', $custom_image_header);

/*--------------------------
Post data information
---------------------------*/
function post_data(){
    $archive_year = get_the_time('Y');
    $archive_month = get_the_time('m');
    $archive_day = get_the_time('m');
?>
<p>Written by: <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo
get_the_author(); ?></a> | Published on: <a href="<?php echo get_day_link($archive_year, $archive_month,
$archive_day); ?>"><?php echo "$archive_month/$archive_day/$archive_year"; ?></a></p>


<?php
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' )
     )
   );
 }
 add_action( 'init', 'register_my_menus' );

 wp_nav_menu( array( 'theme_location' => 'header-menu' ) );


}
remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );
?>
