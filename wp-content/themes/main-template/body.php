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
  <div class="body-wrap">
    <!--  INIT PAGE-->
    <?php get_bodyheader(true);?>

    <!--   EXCHANGE BOX-->
    <div class="container-fluid second-container pagewidth">
      <div class="row crypto-howwork">
        <div class="col-lg-2 col-md-2"></div>
        <div class="col-lg-4 col-md-4">
          <div class="exchange-box">
            <div class="switch-currency">
              <div class="row">
                <div class="col-lg-6 col-md-6" style="padding-right: 0;">
                  <div class=" Buy-BTC selected-currency" id="selectBtc" data-is-btc="1">
                    Buy BTC<i class="fa fa-btc"></i>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6" style="padding-left: 0;">
                  <div class=" Buy-ETH disable" id="selectEth" data-is-btc="0">
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
                    <input type="tel" name="buybtc" class="form-control left" id="btc-buy">
                    <div class="right coin-symbol">BTC</div>
                    <div class="clearfix"></div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="usd-pay" class="Keywords">You will pay:</label>
                  <div>
                    <input type="number" name="payusd" class="form-control left" id="usd-pay" disabled="disabled">
                    <div class="right usd-symbol">USD</div>
                    <input type="hidden" name="fFee" id="fee-usd" value="0">
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