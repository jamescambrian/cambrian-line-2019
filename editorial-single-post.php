<?php
/*
 * Template Name: Editorial Article
 * Template Post Type: post, page, product
 */
  
get_header(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<section class="entry-content">
		<!--
 
-->
		<?php 
		      $banner = get_post_meta($post->ID, 'banner_url', true);
		      if ($banner) {
		        include 'includes/banner.php';
		      } ?>
		<section id="content" role="main">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?><!--    //fix title-->
			<div class="container">
				<div class="eight columns offset-by-two">
					<!-- Shares on Dt -->
					<!-- Content section -->
					<div class="twelve columns post fade-in-element post-content">
						<div class="row">
							<!--      <h2><?php the_title(); ?></h2>-->
							<h1><?php the_title(); ?></h1><?php 
							      $subhead = get_post_meta($post->ID, 'subhead', true);
							      if ($subhead) {
							      echo "<h2>";
							      echo $subhead;
							      echo "</h2>";
							      } ?>
						</div><?php 
						      $trackurl = get_post_meta($post->ID, 'camplayer_url', true);
						      if ($trackurl) {
						        include 'includes/player.php';
						      } ?><?php 
						      $trackurl = get_post_meta($post->ID, 'mixcloud_url', true);
						      if ($trackurl) {
						        include 'includes/mixcloud.php';
						      } ?><p><strong>Written by</strong> &#183; <?php echo get_the_author_link(); ?></p><?php the_content(); ?><?php echo get_the_tag_list('<p class="post__tags"><br>',' , ','</p>');?><?php edit_post_link('edit', '<p class="edit">', '</p>'); ?><?php next_post_link( $format, $link, $in_same_term = true, $excluded_terms = '', $taxonomy = 'category' ); ?>
					</div>
					<div class="twelve columns desktop">
						<!--
        <?php $postfeat = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full-size', array( 1000,1000 ),  true, '' ); ?>
        <img src="<?php echo $postfeat[0]; ?>" class="u-full-width"><br><br>
-->
					</div>
				</div><!-- End container -->
			</div>
		</section><?php endwhile; endif; ?>
		<footer class="footer"></footer>
	</section><?php get_footer(); ?>
</body>
</html>