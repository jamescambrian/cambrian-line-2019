<?php get_header(); ?>
<section id="content" role="main" class="fuller">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <section class="entry-content" class="container">
            <div class="row offset-by-two eight columns ">
                <div class="twelve columns row">
                    <div class="centered six columns post"><h1 class="centered">404 M8!</h1>
                        <p class="centered">Sorry, This page is as empty as empty can be. There's loads of good shit on pages that do exist though, so..</p>
                        <p><a class="buybutton" href="<?php echo site_url(); ?>">Return home</a></p>
                    </div>
                    <div class="six columns">
                        <img class="u-full-width" src="<?php echo get_bloginfo('template_directory'); ?>/images/404.jpg">
                    </div>
                </div> 
            </div>
        </section>
    </article>
</section>
<?php get_footer(); ?>