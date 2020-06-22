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

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

add_filter( 'post_thumbnail_html', 'my_post_image_html', 10, 3 );
function my_post_image_html( $html, $post_id, $post_image_id ) {
	$html = '<a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_post_field( 'post_title', $post_id ) ) . '">' . $html . '</a>';
	return $html;
}



//pagination numbers
function wpbeginner_numeric_posts_nav() {
 
    if( is_singular() )
        return;
 
    global $wp_query;
 
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<div class="number-nav"><ul>' . "\n";
 
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
 
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }
 
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";
 
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link() );
 
    echo '</ul></div>' . "\n";
 
}




//////banner embed

add_action( 'add_meta_boxes', 'banner_meta_box_add' );
function banner_meta_box_add()
{
    add_meta_box( 'banner', 'Xtras', 'banner_meta_box_cb', 'post', 'side', 'high' );
}

function banner_meta_box_cb()
{
    // $post is already set, and contains an object: the WordPress post
    global $post;
    $values = get_post_custom( $post->ID );
    $bannerurl = isset( $values['banner_url'] ) ? esc_attr( $values['banner_url'][0] ) : '';
    $youtubeurl = isset( $values['youtube_url'] ) ? esc_attr( $values['youtube_url'][0] ) : '';
    $subhead = isset( $values['subhead'] ) ? esc_attr( $values['subhead'][0] ) : '';
    $playerurl = isset( $values['mixcloud_url'] ) ? esc_attr( $values['mixcloud_url'][0] ) : '';
    $labelname = isset( $values['labelname'] ) ? esc_attr( $values['labelname'][0] ) : '';
    $releasedate = isset( $values['releasedate'] ) ? esc_attr( $values['releasedate'][0] ) : '';


     
    // We'll use this nonce field later on when saving.
    wp_nonce_field( 'banner_meta_box_nonce', 'meta_box_nonce' );
    ?>
    <p>
        <label for="banner_url">Banner URL (min-size 1250x550):</label>
        <input input class="widefat" type="text" name="banner_url" id="banner_url" value="<?php echo $bannerurl; ?>" />
    </p>
    <p>
        <label for="subhead">Subheader:</label>
        <input input class="widefat" type="text" name="subhead" id="subhead" value="<?php echo $subhead; ?>" />
    </p>
    <p>
        <label for="mixcloud_url">Mixcloud URL:</label>
        <input input class="widefat" type="text" name="mixcloud_url" id="mixcloud_url" value="<?php echo $playerurl; ?>" />
    </p>
    <p>
        <label for="youtube_url">Youtube URL:</label>
        <input input class="widefat" type="text" name="youtube_url" id="youtube_url" value="<?php echo $youtubeurl; ?>" />
    </p>
    <p>
        <label for="labelname">Label Name:</label>
        <input input class="widefat" type="text" name="labelname" id="labelname" value="<?php echo $labelname; ?>" />
    </p>
    <p>
        <label for="releasedate">Released (DD/MM/YY):</label>
        <input input class="releasedate" type="text" name="releasedate" id="releasedate" value="<?php echo $releasedate; ?>" />
    </p>
    
    <?php    
}


add_action( 'save_post', 'banner_meta_box_save' );
function banner_meta_box_save( $post_id )
{
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'banner_meta_box_nonce' ) ) return;
     
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post', $post_id ) ) return;

    

    // Make sure your data is set before trying to save it
    if( isset( $_POST['banner_url'] ) )
        update_post_meta( $post_id, 'banner_url', esc_attr( $_POST['banner_url']) ); 
    if( isset( $_POST['youtube_url'] ) )
        update_post_meta( $post_id, 'youtube_url', esc_attr( $_POST['youtube_url']) ); 
    if( isset( $_POST['subhead'] ) )
        update_post_meta( $post_id, 'subhead', esc_attr( $_POST['subhead']) ); 
    if( isset( $_POST['mixcloud_url'] ) )
        update_post_meta( $post_id, 'mixcloud_url', esc_attr( $_POST['mixcloud_url']) ); 
    if( isset( $_POST['labelname'] ) )
        update_post_meta( $post_id, 'labelname', esc_attr( $_POST['labelname']) ); 
    if( isset( $_POST['releasedate'] ) )
        update_post_meta( $post_id, 'releasedate', esc_attr( $_POST['releasedate']) ); 
    
}




 