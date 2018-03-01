/* global screenReaderText */
/**
 * Theme JS file.
 *
 * Contains handlers for navigation and widget area.
 */

jQuery(function($){
  $('#btc-buy').on( "keyup keydown change", function(){
    var tgVal = $(this).val();
    var sellCoin = ($('#curExc').val() == 1) ? 'sell-btc' : 'sell-eth';

    getCoinPrice(sellCoin, 'exchange', tgVal);
  });

  $('#menu-main-menu .move-to-hiw').on('click', function () {
    $('html, body').animate({
       scrollTop: $(".second-container").offset().top
    }, 750);
    return false;
  });

  getCoinPrice('sell-btc');
  getCoinPrice('sell-eth');

  function switchToCurrency(aIsBtc) {
    var curExc = $('#curExc');
    if (aIsBtc) {
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
  }

  function clearVal() {
    $('#btc-buy').val(0);
    $('#usd-pay').val(0);
  }

  function _getCoinPrice(aUrl, aCoinType, aMode, aVal) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4) {
          if (xhr.status == 200) {
            var data = JSON.parse(xhr.responseText);
            if (aMode) {
              var usdVal = aVal * data.ask;
              $('#usd-pay').val(usdVal);
            }else {
              if (aCoinType == 'sell-btc') {
                $('.load-price-sell-bitcoin').html('$' + data.ask);
              } else {
                $('.load-price-sell-eth').html('$' + data.ask);
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

});