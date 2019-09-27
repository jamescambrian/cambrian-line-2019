for later.php


<?php 
if ( in_category( 'featured' )) {
	// They have long trunks...
	echo "you are a cunt you spazz";
} elseif ( in_category( array( 'Tropical Birds', 'small-mammals' ) )) {
	// They are warm-blooded...
} else {
	// etc.
}
?>


<!--Multiple queries for posts with updated new content-->
<?php $query1 = new WP_Query( 'category_name=labels&post_type=post&posts_per_page=1' );

// The Loop
while ( $query1->have_posts() ) {
    $query1->the_post();
    echo '<li>' . get_the_title() . 'CUNT</li>';
    
    
}
wp_reset_postdata(); ?>

<?php $query2 = new WP_Query( 'category_name=labels&post_type=post&posts_per_page=100&offset=1' );

while( $query2->have_posts() ) {
    $query2->next_post();
    echo '<li>' . get_the_title( $query2->post->ID ) . '</li>';
}

wp_reset_postdata(); ?>