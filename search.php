<?php get_header(); ?>
<section id="content" role="main">
<?php if ( have_posts() ) : ?>

<div class="container searchpage">
    <div class="row"><?php printf( __( 'Search Results for: %s', 'blankslate' ), get_search_query() ); ?><br><br></div>
<div class="row">
<?php while ( have_posts() ) : the_post(); ?><div class="four columns side-by-side">
<figure>
                        <?php the_post_thumbnail( 'full', array( 'class' => 'u-full-width' ) ); ?>
                        <figcaption>
                           <a href="<?php the_permalink(); ?>"><span><?php the_title('<h2>', '</h2>'); ?></span></a><br><br>
<p><?php echo get_excerpt('150') ?></p>
                        </figcaption>
                    </figure>

    <div class="row">
        <div class="six columns foot"><a class="link" href="<?php the_permalink(); ?> ">read more</a></div>
        </div>
    </div>
    
   
    
<?php endwhile; ?> </div>
    <div class="row">
<?php next_posts_link(); ?> 
<?php previous_posts_link(); ?> 
</div>

<?php else : ?>
<section id="content" role="main" class="fuller">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <section class="entry-content" class="container">
            <div class="row offset-by-three six columns ">
                <div class="twelve columns row post centered"><h1 class="centered">ahhh bollocks</h1>
                        <p class="">Nuffin came up for the search terms you entered. Maybe try somethin' else</p>
                   
                </div> 
            </div>
        </section>
    </article>
</section>
<?php endif; ?></div>
    
</section>
    
<?php get_sidebar(); ?>
<?php get_footer(); ?>