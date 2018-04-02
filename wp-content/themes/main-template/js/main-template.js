/* global screenReaderText */
/**
 * Theme JS file.
 *
 * Contains handlers for navigation and widget area.
 */

jQuery(function($) {
  var url = window.location.hash.substr(1);
  if (url == 'howitwork') {
    scrollToHIW();
    $('#menu-main-menu .move-to-hiw').removeClass('active');
  }

  $('#btc-buy').on( "keyup", function(){
    var tgVal = $(this).val();
    if (!$.isNumeric(tgVal) || tgVal < 0) {
      clearVal();
      return false;
    }
    var sellCoin = ($('#curExc').val() == 1) ? 'sell-btc' : 'sell-eth';

    getCoinPrice(sellCoin, 'exchange', tgVal);
  });

  $('#menu-main-menu .move-to-hiw').on('click', function () {
    scrollToHIW();
    return false;
  });

  function scrollToHIW() {
    $('html, body').animate({
      scrollTop: $(".second-container").offset().top
    }, 750);
  }

  getCoinPrice('sell-btc');
  getCoinPrice('sell-eth');

  $('#selectBtc, #selectEth').on('click', function() {
    var isbtc = $(this).data('is-btc');

    var curExc = $('#curExc');
    if (isbtc ) {
      curExc.val(1);
      $('#selectEth')
        .removeClass('selected-currency')
        .addClass('disable');
      $('#selectBtc')
        .addClass('selected-currency')
        .removeClass('disable');
      $('.coin-symbol').text('BTC');
    } else {
      curExc.val(2);
      $('#selectBtc')
        .removeClass('selected-currency')
        .addClass('disable');
      $('#selectEth')
        .addClass('selected-currency')
        .removeClass('disable');
      $('.coin-symbol').text('ETH');
    }
    clearVal();
    return false;
  });

  function clearVal() {
    $('#btc-buy').val('');
    $('#usd-pay').val('');
  }

  // function _getCoinPrice(aUrl, aCoinType, aMode, aVal) {
  //   var xhr = new XMLHttpRequest();
  //   xhr.onreadystatechange = function() {
  //       if (xhr.readyState == 4) {
  //         if (xhr.status == 200) {
  //           var data = JSON.parse(xhr.responseText);
  //           if (aMode) {
  //             var usdVal = aVal * data.ask;
  //             $('#usd-pay').val(usdVal);
  //             $('#fee-usd').val(usdVal);
  //           } else {
  //             if (aCoinType == 'sell-btc') {
  //               $('.load-price-sell-bitcoin').html('$' + data.ask);
  //             } else {
  //               $('.load-price-sell-eth').html('$' + data.ask);
  //             }
  //           }
  //         }
  //       }
  //   }
  //   xhr.open('GET', aUrl, true);
  //   xhr.send(null);
  // }

  // function getCoinPrice(aCoinType, aMode, aVal) {
  //   if (aCoinType == 'sell-btc') {
  //     var url = "https://api.gemini.com/v1/pubticker/btcusd";
  //   } else {
  //     var url = "https://api.gemini.com/v1/pubticker/ethusd";
  //   }
  //
  //   _getCoinPrice(url, aCoinType, aMode, aVal);
  // }
  
  function getCoinPrice(aCoinType, aMode, aVal) {
    if (aCoinType == 'sell-btc') {
      var currency = "btcusd";
    } else {
      var currency = "ethusd";
    }

    $.ajax({
      url:"./wp-content/themes/main-template/getPriceAjax.php",
      method: "POST",
      dataType : 'json',
      data : {
        fCurrencyType: currency
      },

      success:function(data) {
        console.log(data);
        if (data.status == 'success') {
          if (aMode) {
            var usdVal = aVal * data.price;
            $('#usd-pay').val(usdVal);
            $('#fee-usd').val(usdVal);
          } else {
            if (aCoinType == 'sell-btc') {
              $('.load-price-sell-bitcoin').html('$' + data.price);
            } else {
              $('.load-price-sell-eth').html('$' + data.price);
            }
          }
        } else {
          return false;
        }
      }
    });
  }

});