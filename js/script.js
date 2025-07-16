(function($) {
    'use strict';
	
	$(document).ready(function() {
	/* Show/hide panel by clicking tab icon, if desired. Remove this section if you don't want that. */
        $('.PLUGIN_PREFIX-icon').on('click', function(e) {
            e.preventDefault();
            $('.PLUGIN_PREFIX-panel').toggle();
        });
        
        $('.PLUGIN_PREFIX-close-button').on('click', function() {
            $('.PLUGIN_PREFIX-panel').hide();
        });
    /* End show/hide panel by clicking tab icon. */ 
    
    /* Hide panel by clicking outside it, if desired. Remove this section if you don't want that. */
        $(document).on('click', function(event) {
            if (!$(event.target).closest('.PLUGIN_PREFIX-control').length && 
                $('.PLUGIN_PREFIX-panel').is(':visible')) {
                $('.PLUGIN_PREFIX-panel').hide();
            }
        }); 
  /* End hide panel by clicking outside it, if desired. */
 
  
  /* Functionality for tab panel reset button, if desired. Remove this if you don't need that. */
        $('#PLUGIN_PREFIX-reset-button').on('click', function(e) {
          /* whatever the reset button should do goes here */
        });
  /* End functionality for tab panel reset button */        
     
    });
})(jQuery);