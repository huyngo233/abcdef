<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<div class="row">
  <div class="col-lg-2 col-md-2"></div>
  <div class="col-lg-8 col-md-8" id="show-page" >
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
      </header><!-- .entry-header -->
      <div class="entry-content">
        <?php the_content(); ?>
      </div><!-- .entry-content -->
    </article><!-- #post-## -->
  </div>
  <div class="col-lg-2 col-md-2"></div>
</div>