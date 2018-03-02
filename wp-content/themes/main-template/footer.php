<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

      <footer id="main-footer" class="container-fluid site-footer" role="contentinfo">
        <div class="site-info row">
          <div class="col-lg-1 col-md-1"></div>
          <div class="col-lg-5 col-md-5">
            <div class="footer-logo">
              <a href="<?=get_home_url()?>">
                <img src="<?=wp_get_attachment_image_src(get_post_thumbnail_id(183), 'single-post-thumbnail')[0];?>"/>
              </a>
            </div>
            <div class="footer-logo">
              <?=get_post(183)->post_content;?>
            </div>
          </div>
          <div class="col-lg-5 col-md-5">
            <?php
              print do_shortcode(get_post(189)->post_content);
            ?>
          </div>
          <div class="col-lg-1 col-md-1"></div>
          <div class="clearfix"></div>
        </div><!-- .site-info -->
      </footer><!-- .site-footer -->
    </div>
  </body>
</html>
