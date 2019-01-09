<?php
add_action( 'after_setup_theme', 'blankslate_setup' );
function blankslate_setup()
{
load_theme_textdomain( 'blankslate', get_template_directory() . '/languages' );
add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
add_image_size( 'top-banner', 1420, 500, array( 'center', 'center' ) ); // Hard crop left top
global $content_width;
if ( ! isset( $content_width ) ) $content_width = 1024;
register_nav_menus(
array( 'main-menu' => __( 'Main Menu', 'blankslate' ) )
);
}
add_action( 'wp_enqueue_scripts', 'blankslate_load_scripts' );
function blankslate_load_scripts()
{
wp_enqueue_script( 'jquery' );
}
add_action( 'comment_form_before', 'blankslate_enqueue_comment_reply_script' );
function blankslate_enqueue_comment_reply_script()
{
if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_filter( 'the_title', 'blankslate_title' );
function blankslate_title( $title ) {
if ( $title == '' ) {
return '&rarr;';
} else {
return $title;
}
}
add_filter( 'wp_title', 'blankslate_filter_wp_title' );
function blankslate_filter_wp_title( $title )
{
return $title . esc_attr( get_bloginfo( 'name' ) );
}
add_action( 'widgets_init', 'blankslate_widgets_init' );
function blankslate_widgets_init()
{
register_sidebar( array (
'name' => __( 'Sidebar Widget Area', 'blankslate' ),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
function blankslate_custom_pings( $comment )
{
$GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php 
}
add_filter( 'get_comments_number', 'blankslate_comments_number' );
function blankslate_comments_number( $count )
{
if ( !is_admin() ) {
global $id;
$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}

function get_excerpt($count){
  $permalink = get_permalink($post->ID);
  $excerpt = get_the_content();
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, $count);
  $excerpt = $excerpt.'...';
  return $excerpt;
}

add_filter( 'post_thumbnail_html', 'my_post_image_html', 10, 3 );
function my_post_image_html( $html, $post_id, $post_image_id ) {
	$html = '<a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_post_field( 'post_title', $post_id ) ) . '">' . $html . '</a>';
	return $html;
}

add_filter('next_posts_link_attributes', 'posts_link_attributes_1');
add_filter('previous_posts_link_attributes', 'posts_link_attributes_2');

function posts_link_attributes_1() {
    return 'class="button button-read-more button-read-more-cat hvr-sweep-to-right"';
}
function posts_link_attributes_2() {
    return 'class="button button-read-more button-read-more-cat hvr-sweep-to-right"';
}



///////audio

add_action( 'add_meta_boxes', 'camplayer_meta_box_add' );
function camplayer_meta_box_add()
{
    add_meta_box( 'camplayer', 'Cambrian Audio Player', 'camplayer_meta_box_cb', 'post', 'side', 'high' );
}

function camplayer_meta_box_cb()
{
    // $post is already set, and contains an object: the WordPress post
    global $post;
    $values = get_post_custom( $post->ID );
    $playertitle = isset( $values['camplayer_title'] ) ? esc_attr( $values['camplayer_title'][0] ) : '';
    $playerurl = isset( $values['camplayer_url'] ) ? esc_attr( $values['camplayer_url'][0] ) : '';



     
    // We'll use this nonce field later on when saving.
    wp_nonce_field( 'camplayer_meta_box_nonce', 'meta_box_nonce' );
    ?>
    <p>
        <label for="camplayer_title">Title</label>
        <input input class="widefat" type="text" name="camplayer_title" id="camplayer_title" value="<?php echo $playertitle; ?>" />
    </p>
    <p>
        <label for="camplayer_url">URL</label>
        <input input class="widefat" type="text" name="camplayer_url" id="camplayer_url" value="<?php echo $playerurl; ?>" />
    </p>
     
    
    <?php    
}


add_action( 'save_post', 'camplayer_meta_box_save' );
function camplayer_meta_box_save( $post_id )
{
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'camplayer_meta_box_nonce' ) ) return;
     
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post', $post_id ) ) return;

    

    // Make sure your data is set before trying to save it
    if( isset( $_POST['camplayer_title'] ) )
        update_post_meta( $post_id, 'camplayer_title', esc_attr( $_POST['camplayer_title'] ) );
    if( isset( $_POST['camplayer_url'] ) )
        update_post_meta( $post_id, 'camplayer_url', esc_attr( $_POST['camplayer_url']) );  
}
 



///////mixcloud

add_action( 'add_meta_boxes', 'mixcloud_meta_box_add' );
function mixcloud_meta_box_add()
{
    add_meta_box( 'mixcloud', 'Mixcloud Embedder', 'mixcloud_meta_box_cb', 'post', 'side', 'high' );
}

function mixcloud_meta_box_cb()
{
    // $post is already set, and contains an object: the WordPress post
    global $post;
    $values = get_post_custom( $post->ID );
    $playerurl = isset( $values['mixcloud_url'] ) ? esc_attr( $values['mixcloud_url'][0] ) : '';



     
    // We'll use this nonce field later on when saving.
    wp_nonce_field( 'mixcloud_meta_box_nonce', 'meta_box_nonce' );
    ?>
    <p>
        <label for="mixcloud_url">Embed Code</label>
        <input input class="widefat" type="text" name="mixcloud_url" id="mixcloud_url" value="<?php echo $playerurl; ?>" />
    </p>
     
    
    <?php    
}


add_action( 'save_post', 'mixcloud_meta_box_save' );
function mixcloud_meta_box_save( $post_id )
{
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'mixcloud_meta_box_nonce' ) ) return;
     
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post', $post_id ) ) return;

    

    // Make sure your data is set before trying to save it
    if( isset( $_POST['mixcloud_url'] ) )
        update_post_meta( $post_id, 'mixcloud_url', esc_attr( $_POST['mixcloud_url']) );  
}
 





