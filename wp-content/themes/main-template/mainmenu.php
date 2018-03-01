<?php
/**
 * The template for displaying the main menu
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<div class="row header">
  <div class="col-lg-6">
    <a href="<?=get_home_url()?>">
      <img src="<?=get_template_directory_uri()?>/img/logo.png">
    </a></div>
  <div class="col-lg-6">
    <?php if ( has_nav_menu( 'primary' ) ) : ?>
      <nav id="site-navigation" class="main-navigation" role="navigation">
        <?php
        // Primary navigation menu.
        wp_nav_menu( array(
          'menu_class'     => 'nav-menu',
          'theme_location' => 'primary',
        ) );
        ?>
      </nav><!-- .main-navigation -->
    <?php endif; ?>
  </div>
</div>



