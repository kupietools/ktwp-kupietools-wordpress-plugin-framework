(function($) {
    'use strict';
	
	$(document).ready(function() {
	/* Show/hide panel by clicking tab icon, if desired. Remove this section if you don't want that. */
        $('.PLUGIN_PREFIX-icon').on('click', function(e) {
            e.preventDefault();
            $('.PLUGIN_PREFIX-panel').toggle();
        });
    /* end Show/hide panel by clicking tab icon */
    
    /* hide panel by clicking panel close icon, if desired. Remove this section if you don't want that. */
        $('.PLUGIN_PREFIX-close-button').on('click', function(e) {
             e.preventDefault();
             ktwp_closePanelScript(e);
        });
    /* End panel by clicking panel close icon. */ 
    
    /* Hide panel by clicking outside it, if desired. Remove this section if you don't want that. */
        $(document).on('click', function(e) {
            if (!$(event.target).closest('.PLUGIN_PREFIX-control').length && 
                $('.PLUGIN_PREFIX-panel').is(':visible')) {
                ktwp_closePanelScript(e);
            }
        }); 
    /* End hide panel by clicking outside it, if desired. */
 
    /* Functionality for tab panel reset button, if desired. Remove this if you don't need that. */
        $('#PLUGIN_PREFIX-reset-button').on('click', function(e) {
          /* whatever the reset button should do goes here */
        });
    /* End functionality for tab panel reset button */        
     
     function ktwp_closePanelScript(e) { 
    /* put any steps here that need to run when the panel closes */
       $('.PLUGIN_PREFIX-panel').hide();
     }
     
    });
})(jQuery);
