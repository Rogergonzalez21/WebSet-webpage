// 
//  jQuery Validate example script
//
//  Prepared by David Cochran
//  
//  Free for your use -- No warranties, no guarantees!
//

$(document).ready(function(){
  // Validate
  // http://bassistance.de/jquery-plugins/jquery-plugin-validation/
  // http://docs.jquery.com/Plugins/Validation/
  // http://docs.jquery.com/Plugins/Validation/validate#toptions
  
  $('#contact-form').validate({
    rules: {
      first_name: {
        minlength: 2
      , required: true
      }

    , last_name: {
        minlength: 2
      , required: true
      }

    , email: {
        required: true
      , email: true
      }

    , telephone: {
        minlength: 2
      , required: false
      }

    , comments: {
        minlength: 20
      , required: true
      }

    }

  , highlight: function(label) {
      $(label).closest('.control-group').addClass('error');
      }
  , success: function(label) {
      label
        .text('Campo correcto').addClass('valid')
        .closest('.control-group').addClass('success');
      }

    });

  function filterPath(string) {
    return string
      .replace(/^\//,'')
      .replace(/(index|default).[a-zA-Z]{3,4}$/,'')
      .replace(/\/$/,'');
  }

  var locationPath = filterPath(location.pathname);
  var scrollElem = scrollableElement('html', 'body');
 
  $('a[href*=#]').each(function() {
    var thisPath = filterPath(this.pathname) || locationPath;
    if (  locationPath == thisPath
    && (location.hostname == this.hostname || !this.hostname)
    && this.hash.replace(/#/,'') ) {
      var $target = $(this.hash), target = this.hash;
      if (target) {
        var targetOffset = $target.offset().top;
        $(this).click(function(event) {
          event.preventDefault();
          $(scrollElem).animate({scrollTop: targetOffset}, 400, function() {
            location.hash = target;
          });
        });
      }
    }   
  });
    // use the first element that is "scrollable"
  function scrollableElement(els) {
    for (var i = 0, argLength = arguments.length; i <argLength; i++) {
      var el = arguments[i],
          $scrollElement = $(el);
      if ($scrollElement.scrollTop()> 0) {
        return el;
      } else {
        $scrollElement.scrollTop(1);
        var isScrollable = $scrollElement.scrollTop()> 0;
        $scrollElement.scrollTop(0);
        if (isScrollable) {
          return el;
        }
      }
    }
    return [];
  }


 

// fix sub nav on scroll
  var $win = $(window)
      , $nav = $('.subnav')
      , navTop = $('.subnav').length && $('.subnav').offset().top - 40
      , isFixed = 0

  processScroll()

    // hack sad times - holdover until rewrite for 2.1
  $nav.on('click', function () {
    if (!isFixed) setTimeout(function () {  $win.scrollTop($win.scrollTop() - 47) }, 10)
  })

  $win.on('scroll', processScroll)

  function processScroll() {
    var i, scrollTop = $win.scrollTop()
    if (scrollTop >= navTop && !isFixed) {
      isFixed = 1
      $nav.addClass('subnav-fixed')
    } else if (scrollTop <= navTop && isFixed) {
        isFixed = 0
        $nav.removeClass('subnav-fixed')
      }
    }

  $(function() {
     $("#popover").popover();
     $("#popover2").popover();
     $("#popover3").popover();
     $("#popover4").popover();
     $("#RmailPopover").popover();
     $("#AmailPopover").popover();
     $("#SmailPopover").popover();
  });
  
  ! function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (!d.getElementById(id)) {
      js = d.createElement(s);
      js.id = id;
      js.src = "//platform.twitter.com/widgets.js";
      fjs.parentNode.insertBefore(js, fjs);
    }
  }(document, "script", "twitter-wjs");

});