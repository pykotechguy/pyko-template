$(function(){
  function filterPath(string) {
    return string
      .replace(/^\//,'')
      .replace(/(index|default).[a-zA-Z]{3,4}$/,'')
      .replace(/\/$/,'');
  }

  var locationPath = filterPath(location.pathname);
  var scrollElem = scrollableElement('html', 'body');

  // use the first element that is "scrollable"
  function scrollableElement(els) {
    for (var i = 0, argLength = arguments.length; i < argLength; i++) {
      var el = arguments[i];
      var $scrollElement = $(el);

      if ($scrollElement.scrollTop() > 0) {

        return el;

      } else {

        $scrollElement.scrollTop(1);
        var isScrollable = $scrollElement.scrollTop() > 0;
        $scrollElement.scrollTop(0);

        if (isScrollable) {
          return el;
        }
      } // else
    } // for
    return [];
  } // function

  // Get all anchor elements with # targets
  $('.smooth-scroll').each(function() {
    var thisPath = filterPath(this.pathname) || locationPath;
    if ( locationPath == thisPath &&
       ( location.hostname == this.hostname || !this.hostname) &&
         this.hash.replace(/#/,'') ) {
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
  }); //$('a[href*=#]').each()

  $("a", "#static-sidebar").click(function(){
    var $parent = $(this).parent();

    if( ! $parent.hasClass('active') && ! $parent.hasClass('brand') ) {
      $("li", "#static-sidebar").removeClass('active');
      $parent.addClass('active');
    }
  });
}); // $(function)