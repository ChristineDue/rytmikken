jQuery(document).ready(function() {
   var window_width = jQuery(window).width();
   jQuery(".fullwidth-element").each(function() {
      var parent_offset = jQuery(this).parent().offset();
      jQuery(this).css({ "margin-left" : -parent_offset.left, "width" : window_width });
   });
});

jQuery(function() {
    var $thewindow = jQuery(window);
    var thewidth = $thewindow.width();

    setInterval(function () {
        if ( thewidth != $thewindow.width() ) {
            thewidth = $thewindow.width();
        
           jQuery(".fullwidth-element").each(function() {
               var parent_offset = jQuery(this).parent().offset();
               jQuery(this).css({ "margin-left" : -parent_offset.left, "width" : thewidth });
           });

        }
    }, 500);
}); 
