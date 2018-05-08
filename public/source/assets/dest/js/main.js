$(document).ready(function(){
  $('.header3 ul.relative>li:first').addClass('home');
	$('li.home>a').prepend('<i class="fa fa-home" aria-hidden="true"></i>');
     $('.content-cate>.title-cate>.form>button.list-style').click(function(){
      $('.item-list').addClass('list-style-block');
    });

  $('.click-giohang').click(function(e){
         
        
        $(this).children('.giohang-hiddent').show();
    });


    $(document).click(function(event) {

 
      if (!$(event.target).closest(".click-giohang").length) {
       $(".click-giohang").children('.giohang-hiddent').hide();
        }
     });

  $('#payment_method_bacs').click(function(){
    $(this).parent().children('.payment_box payment_method_bacs').slideToggle("fast");
  })
   $('#payment_method_cheque').click(function(){
    $(this).parent().children('.payment_box payment_method_cheque').slideToggle("fast");
  })

  
});

// category
$(document).ready(function(){
	
	$('button.grid-style').click(function(){
		$('.item-list').removeClass('list-style-block')
	});
  $('.content-cate .form > button').click(function(){
    $(this).parent().children('button').removeClass('Orange');
    $(this).addClass('Orange');
  });

});

//slide
$(document).ready(function() {

    var sync1 = $("#sync1");
    var sync2 = $("#sync2");

    sync1.owlCarousel({
       items : 1,
        singleItem : true,
        slideSpeed : 1000,
        navigation: false,
        pagination:false,
        afterAction : syncPosition,
        // responsiveRefreshRate : 200,
    });

    sync2.owlCarousel({
        items : 4,
        itemsDesktop      : [1199,10],
        itemsDesktopSmall     : [979,10],
        itemsTablet       : [768,4],
        itemsMobile       : [479,2],
        pagination:false,
        responsiveRefreshRate : 100,
        afterInit : function(el){
            el.find(".owl-item").eq(0).addClass("synced");
        }
    });

    function syncPosition(el){
        var current = this.currentItem;
        $("#sync2")
            .find(".owl-item")
            .removeClass("synced")
            .eq(current)
            .addClass("synced")
        if($("#sync2").data("owlCarousel") !== undefined){
            center(current)
        }
    }

    $("#sync2").on("click", ".owl-item", function(e){
        e.preventDefault();
        var number = $(this).data("owlItem");
        sync1.trigger("owl.goTo",number);
    });

    function center(number){
        var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
        var num = number;
        var found = false;
        for(var i in sync2visible){
            if(num === sync2visible[i]){
                var found = true;
            }
        }

        if(found===false){
            if(num>sync2visible[sync2visible.length-1]){
                sync2.trigger("owl.goTo", num - sync2visible.length+2)
            }else{
                if(num - 1 === -1){
                    num = 0;
                }
                sync2.trigger("owl.goTo", num);
            }
        } else if(num === sync2visible[sync2visible.length-1]){
            sync2.trigger("owl.goTo", sync2visible[1]);
        } else if(num === sync2visible[0]){
            sync2.trigger("owl.goTo", num-1);
        }

    }
});

// Starrr plugin (https://github.com/dobtco/starrr)
var __slice = [].slice;

(function($, window) {
  var Starrr;

  Starrr = (function() {
    Starrr.prototype.defaults = {
      rating: void 0,
      numStars: 5,
      change: function(e, value) {}
    };

    function Starrr($el, options) {
      var i, _, _ref,
        _this = this;

      this.options = $.extend({}, this.defaults, options);
      this.$el = $el;
      _ref = this.defaults;
      this.createStars();
      this.syncRating();
      this.$el.on('mouseover.starrr', 'span', function(e) {
        return _this.syncRating(_this.$el.find('span').index(e.currentTarget) + 1);
      });
      this.$el.on('mouseout.starrr', function() {
        return _this.syncRating();
      });
      this.$el.on('click.starrr', 'span', function(e) {
        return _this.setRating(_this.$el.find('span').index(e.currentTarget) + 1);
      });
      this.$el.on('starrr:change', this.options.change);
    }

    Starrr.prototype.createStars = function() {
      var _i, _ref, _results;

      _results = [];
      for (_i = 1, _ref = this.options.numStars; 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--) {
        _results.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"));
      }
      return _results;
    };

    Starrr.prototype.setRating = function(rating) {
      if (this.options.rating === rating) {
        rating = void 0;
      }
      this.options.rating = rating;
      this.syncRating();
    };

    Starrr.prototype.syncRating = function(rating) {
      var i, _i, _j, _ref;

      rating || (rating = this.options.rating);
      if (rating) {
        for (i = _i = 0, _ref = rating - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
          this.$el.find('span').eq(i).removeClass('glyphicon-star-empty').addClass('glyphicon-star');
        }
      }
      if (rating && rating < 5) {
        for (i = _j = rating; rating <= 4 ? _j <= 4 : _j >= 4; i = rating <= 4 ? ++_j : --_j) {
          this.$el.find('span').eq(i).removeClass('glyphicon-star').addClass('glyphicon-star-empty');
        }
      }
      if (!rating) {
        return this.$el.find('span').removeClass('glyphicon-star').addClass('glyphicon-star-empty');
      }
    };

    return Starrr;

  })();
  return $.fn.extend({
    starrr: function() {
      var args, option;

      option = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
      return this.each(function() {
        var data;

        data = $(this).data('star-rating');
        if (!data) {
          $(this).data('star-rating', (data = new Starrr($(this), option)));
        }
        if (typeof option === 'string') {
          return data[option].apply(data, args);
        }
      });
    }
  });
})(window.jQuery, window);

$(function() {
  return $(".starrr").starrr();
});


// slide detai top
 $(document).ready(function() {
  $('.same-slide').owlCarousel({
    loop: true,
    margin: 0,
    responsiveClass: true,
    itemsCustom: [
      [0,2],
      [767,3],
      [992,5],
      [1400,6]
    ],
    autoPlay: 3000,
    navigation: true,
    pagination: false
  });
 



});

// header 

$(document).ready(function() {
  if($(window).width()>=992){
    $('.header3').scrollToFixed();
    $('.category>.content-category>ul>.menu-item-has-children>a').append('<i class="fa fa-caret-right" aria-hidden="true"></i>');

    $('.menu>.menu-item-has-children>a').append('<i class="fa fa-angle-down" aria-hidden="true"></i>');
    
    $('.menu>.menu-item-has-children').hover(function(){
        $(this).children('.sub-menu').slideToggle( "show");
    });

    $('.same-slide-header').owlCarousel({
      loop: true,
      margin: 10,
      esponsiveClass: true,
      items: 1, 
      autoPlay: 3000,
      navigation: true 
    })

  }
});

$(document).ready(function(){
  if($(window).width()<992){
    $('.menu>.menu-item-has-children>a').append('<i class="fa fa-plus" aria-hidden="true"></i>');

    $('.header2').append('<button type="button" class="danh-muc"><i class="fa fa-bars fa-2x" aria-hidden="true"></i></button>');
    
     $('.fa-home').addClass('home-home');
    $('.navigation').prepend('<button type="button" class="cancel" ><i class="fa fa-times" aria-hidden="true"></i> </button>');

    $('#danh-muc-trai').append('<button type="button" class="cancel-danh-muc-trai"><i class="fa fa-times" aria-hidden="true"></i> </button>');

    $('.category>.content-category>ul>.menu-item-has-children>a').append('<i class="fa fa-caret-down" aria-hidden="true"></i>');
    $('.fa-caret-down').addClass('down');

    $('.danh-muc').scrollToFixed();

    $('.cate-cart-bottom>span:last').addClass('gia-bottom');
    $('.owl-item').addClass('owl-img');

    $('button.danh-muc').click(function(){
      $('.bg-menu-mobile').css({"width": "100%"});
      $('#danh-muc-trai').css({"width": "80%"}); 
    });

    $('.menu>.menu-item-has-children>a>i').click(function(){
      if($(this).hasClass('fa-plus')){
          $(this).parent().parent().children(".sub-menu").slideDown();
          $(this).removeClass('fa-plus');
          $(this).addClass('fa-minus');
      }else{
          $(this).parent().parent().children(".sub-menu").slideUp();
          $(this).removeClass('fa-minus');
          $(this).addClass('fa-plus');
      }
       // $(this).parent().parent().children(".sub-menu").slideToggle('show');
    });

      $('.bg-menu-mobile, .cancel, .cancel-danh-muc-trai').click(function(){
         $('.bg-menu-mobile').css({"width": "0"});
         $('.navigation').css({"width": "0"});
         $('#danh-muc-trai').css({"width": "0"});
      })


    $('.but .menu-reposive').click(function(){
      $('.bg-menu-mobile').css({"width": "100%"});
      $('.navigation').css({"width": "80%"});
    });

    //
    $('i.down').click(function(){
      $(this).parent().parent().children(".sub-menu").slideToggle('fast');    // dùng this....  để tránh bị gọi biến nhiều lần
    });

    // xoa button list và grid
    $('.grid-style, .list-style').remove();
    $('.same-slide-header').owlCarousel({
      loop: true,
      margin: 10,
      esponsiveClass: true,
      items: 1, 
      autoPlay: 3000,
      navigation: true 
    })
   
  }

});
