<?php get_header(); ?>
<?php
if ( is_home() ) {
    // This is the blog posts index
    echo "<section id=";
    echo "content";
    echo " role=";
    echo "main";
    echo ">";
    get_template_part( 'homepage' );
    echo "</section>";
} else {
    // This is not the blog posts index
    echo "<section id=";
    echo "content";
    echo " role=";
    echo "main";
    echo ">";
    get_template_part( 'entry' );
    echo "</section>";
}
?>
<?php get_footer(); ?>