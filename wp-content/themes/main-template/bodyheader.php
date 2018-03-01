<?php
/**
 * The template for displaying the body
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<!--  INIT PAGE-->
<div class="container-fluid main-container pagewidth">
  <?php get_mainmenu()?>
  <div class="row crypto-description">
    <?php if (!is_page()) { ?>
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
      <?=get_post(43)->post_content ?>
    </div>
    <div class="col-lg-2"></div>
    <?php } ?>
  </div>
  <?php  if (!is_page()) { ?>
  <div class="row crypto-currency">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
      <div class="row">
        <div class="col-lg-1 col-md-1"></div>
          <?php
            $sellFor = _getAllPostByCate(30);

            foreach ($sellFor as $k => $post) {
              print "<div class=\"col-lg-4 col-md-4\">";
              print "<div class=\"currency-box row\">";
              print "<div class=\"col-lg-5 col-md-5 currency-img \">";
              $img = _getPostFeaturedImg($post->ID);
              print "<img class=\"img-responsive coin-icon\" src=\"{$img}\">";
              print "</div>";
              print "<div class=\"col-lg-7 col-md-7\">";
              print "<div class='intro-coin-box'>";
              print "<p class='intro-coin'>" . get_category(30)->name . "</p>";
              print "<p class='intro-symbol'>{$post->post_content}</p>";
              print "<p class='intro-price load-price-{$post->post_name}'></p>";
              print "</div>";
              print "</div>";
              print "</div>";
              print "</div>";
              if ($k % 2 == 0) {
                print "<div class=\"col-lg-2 col-md-2\"></div>";
              }
            }
          ?>
        <div class="col-lg-1 col-md-1"></div>
      </div>
    </div>
    <div class="col-lg-2"></div>
  </div>
  <?php } ?>
</div>
