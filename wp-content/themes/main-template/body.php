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

<body <?php body_class(); ?>>
  <!--  INIT PAGE-->
  <div class="container-fluid main-container pagewidth">
    <?php get_mainmenu()?>
    <div class="row crypto-description">
      <div class="col-lg-2"></div>
      <div class="col-lg-8">
        <?=get_post(43)->post_content ?>
      </div>
      <div class="col-lg-2"></div>
    </div>
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
                print "<p>" . get_category(30)->name . "</p>";
                print "<p>{$post->post_content}</p>";
                print "<p class='load-price-{$post->post_name}'></p>";
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
  </div>

  <!--   EXCHANGE BOX-->
  <div class="container-fluid second-container pagewidth">
    <div class="row crypto-howwork">
      <div class="col-lg-2 col-md-2"></div>
      <div class="col-lg-4 col-md-4">
        <div class="exchange-box">
          <div class="switch-currency">
            <div class="row">
              <div class="col-lg-6 col-md-6" style="padding-right: 0;">
                <div class=" Buy-BTC selected-currency" id="selectBtc" onclick="switchToCurrency(true);">
                  Buy BTC<i class="fa fa-btc"></i>
                </div>
              </div>
              <div class="col-lg-6 col-md-6" style="padding-left: 0;">
                <div class=" Buy-ETH disable" id="selectEth"  onclick="switchToCurrency(false);">
                  Buy Ether<i class="fa fa-ethereum"></i>
                </div>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
          <div class="exchange-exe">
            <form method="POST" name="" id="exchangeForm">
              <input type="hidden" name="" id="curExc" value="1">
              <div class="form-group">
                <label for="btc-buy" class="Keywords">You want to buy:</label>
                <div>
                  <input type="number" name="buybtc" class="form-control left" id="btc-buy" value="0">
                  <div class="right coin-symbol">BTC</div>
                  <div class="clearfix"></div>
                </div>
              </div>
              <div class="form-group">
                <label for="usd-pay" class="Keywords">You will pay:</label>
                <div>
                  <input type="number" name="payusd" class="form-control left" id="usd-pay"  value="0" disabled="disabled">
                  <div class="right usd-symbol">USD</div>
                  <div class="clearfix"></div>
                </div>
              </div>
              <div>
                <button type="button" class="btn btn-primary fullwidth" id="exchangebtn">BUY NOW</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4">
        <div class="exchange-description">
          <div class="exchange-header">
            <span><?php print get_category(8)->name ?></span>
          </div>
          <div class="exchange-steps">
            <?php
              $myposts = _getAllPostByCate(8);
              foreach ($myposts as $key => $post) {
                print "<div class=\"step{$key}\">";
                print "<div class=\"oval\">{$post->post_title}</div>";
                print "<div class=\"step-text\">{$post->post_content}</div>";
                print "</div>";

                if ($key < 2) {
                  print "<div class=\"separate\"></div>";
                }
              }
            ?>
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-2"></div>
      <div class="clearfix"></div>
    </div>
  </div>

  <!--  WHY CRYPTO-->
  <div class="container-fluid second-container pagewidth" style="border-top: solid 2px #d2dbdf;">
    <div class="why-crypto">
      <div class="h4"><?php print get_category(12)->name ?></div>
      <div>
        <div class="row">
          <?php
            $myposts = _getAllPostByCate(12);

            foreach ($myposts as $key => $post) {
              $reasonClass = "";
              if ($key%2 == 0) {
                $reasonClass = 'reason-left';
              } else {
                $reasonClass = 'reason-right';
              }
              if ($key%2 == 0) {
                print "<div class='col-lg-1 col-md-1'></div>";
              }
              print "<div class='col-lg-5 col-md-5'>";
              print "<div class='{$reasonClass}'>";
              print "<div class='row'>";
              print "<div class='col-lg-2 col-md-2 image'>";
              $imgDisp = _getPostFeaturedImg($post->ID);
              print "<img src='{$imgDisp}'>";
              print "</div>";
              print "<div class=\"col-lg-10 col-md-10 phrase\">";
              print "<div class=\"h5\">{$post->post_title}</div>";
              print "<div>{$post->post_content}</div>";
              print "</div>";
              print "</div>";
              print "</div>";
              print "</div>";
              if ($key%2 != 0) {
                print "<div class='col-lg-1 col-md-1'></div>";
              }

            }
          ?>
        </div>
      </div>
    </div>
  </div>

  <!--  OTHER CURRENCIES WE OFFER-->
  <div class="container-fluid second-container pagewidth" style="border-top: solid 2px #d2dbdf;">
    <div class="others">
      <div class="h4"><?php print get_category(17)->name ?></div>
      <div class="row list-currency">
        <?php
          $othersCur = _getAllPostByCate(17, array('orderby' => 'ID', 'order' => 'ASC', 'numberposts' => 999));
          $imgPath = get_template_directory_uri() . "/img/";

          foreach ($othersCur as $k => $post) {
            print "<div class='col-lg-2 col-md-2 txtcenter' >";
            print $post->post_content;
            print "</div>";
            if ($k == 5) {
              print "<div class='clearfix' style='height: 80px;'></div>";
            }
          }

        ?>
      </div>
    </div>
  </div>
  <!--  Book an Appointment-->
  <div class="container-fluid second-container pagewidth" style="background-color: #1565c0;">
    <div class="booking">
      <div class="h4">Get Cryptocurrency from us cheap and quickly today.</div>
      <div class="txtcenter">
        <button type="button" class="btn btn-primary bookbtn">Book an Appointment</button>
      </div>
    </div>
  </div>

<?php

function _getAllPostByCate($aCateId, $aParams = array('orderby' => 'ID', 'order' => 'ASC')) {

  $args = array('category' => $aCateId);

  foreach ($aParams as $k => $v) {
    $args[$k] = $v;
  }
  $myposts = get_posts($args);

  return $myposts;
}

function _getPostFeaturedImg($aPostID, $aImgType = 'single-post-thumbnail') {
  return wp_get_attachment_image_src(get_post_thumbnail_id($aPostID), $aImgType)[0];
}

?>

<script type="text/javascript">
  var jQuery = jQuery.noConflict();
  jQuery(document).ready(function() {
    jQuery('#btc-buy').on( "keyup keydown change", function(){
      var tgVal = jQuery(this).val();
      var sellCoin = (jQuery('#curExc').val() == 1) ? 'sell-btc' : 'sell-eth';

      getCoinPrice(sellCoin, 'exchange', tgVal);
    });

    getCoinPrice('sell-btc');
    getCoinPrice('sell-eth');
  });

  function switchToCurrency(aIsBtc) {
    var curExc = jQuery('#curExc');
    if (aIsBtc) {
      curExc.val(1);
      jQuery('#selectEth')
        .removeClass('selected-currency')
        .addClass('disable');
      jQuery('#selectBtc')
        .addClass('selected-currency')
        .removeClass('disable');
      jQuery('.coin-symbol').text('BTC');
    } else {
      curExc.val(2);
      jQuery('#selectBtc')
        .removeClass('selected-currency')
        .addClass('disable');
      jQuery('#selectEth')
        .addClass('selected-currency')
        .removeClass('disable');
      jQuery('.coin-symbol').text('ETH');
    }

    clearVal();
  }

  function clearVal() {
    jQuery('#btc-buy').val(0);
    jQuery('#usd-pay').val(0);
  }

  function _getCoinPrice(aUrl, aCoinType, aMode, aVal) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4) {
          if (xhr.status == 200) {
            var data = JSON.parse(xhr.responseText);
            if (aMode) {
              var usdVal = aVal * data.ask;
              jQuery('#usd-pay').val(usdVal);
            }else {
              if (aCoinType == 'sell-btc') {
                jQuery('.load-price-sell-bitcoin').html(data.ask);
              } else {
                jQuery('.load-price-sell-eth').html(data.ask);
              }
            }
          }
        }
    }
    xhr.open('GET', aUrl, true);
    xhr.send(null);
  }

  function getCoinPrice(aCoinType, aMode, aVal) {
    if (aCoinType == 'sell-btc') {
      var url = "https://api.gemini.com/v1/pubticker/btcusd";
    } else {
      var url = "https://api.gemini.com/v1/pubticker/ethusd";
    }

    _getCoinPrice(url, aCoinType, aMode, aVal);
  }
</script>
