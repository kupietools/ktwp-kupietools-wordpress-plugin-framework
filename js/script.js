(function() {
    'use strict';


    function oncePanelOpen(panel) {/* put any steps here that have to be run whenever the panel is opened... whether by clicking a tab or displayed by a shortcode */
};

    document.addEventListener('DOMContentLoaded', function() {
        /* Show/hide panel by clicking tab icon, if desired. Remove this section if you don't want that. */
        const icon = document.querySelector('.PLUGIN_PREFIX-icon');
        if (icon) {
            icon.addEventListener('click', function(e) {
                e.preventDefault();
                const panel = document.querySelector('.PLUGIN_PREFIX-panel');
                if (panel) {
                    panel.style.display = getComputedStyle(panel).display === 'none' ? 'block' : 'none';
                }
                const button = document.getElementById("ktwp_eyesHaveIt-control")
				if (!panel.classList.contains("ktwp-de-beenDragged")) {
					panel.style.top = parseInt(getComputedStyle(button).top)+20+"px";
					 panel.style.left = "20px";}
			    oncePanelOpen(panel);
            });
        }
        /* end Show/hide panel by clicking tab icon */
        
        /* make sure panel starts hidden... plugins such as KTWP Draggable Elements may make it visible at page load even if the css file in this plugin sets it to be hidden. You can remove this if you're not using the panel in this plugin*/
        const panel = document.querySelector('.PLUGIN_PREFIX-panel');
        if (panel) {panel.style.display="none !important";}
        /* end make sure panel starts hidden */

        /* hide panel by clicking panel close icon, if desired. Remove this section if you don't want that. */
        const closeButton = document.querySelector('.PLUGIN_PREFIX-close-button');
        if (closeButton) {
            closeButton.addEventListener('click', function(e) {
                e.preventDefault();
                ktwp_closePanelScript(e);
            });
        }
        /* End panel by clicking panel close icon. */

        /* Hide panel by clicking outside it, if desired. Remove this section if you don't want that. */
        document.addEventListener('click', function(e) {
            const control = document.querySelector('.PLUGIN_PREFIX-control');
            const panel = document.querySelector('.PLUGIN_PREFIX-panel');

            // Check if the click occurred outside the control area AND the panel is visible
             if ( ((control  && !control.contains(e.target)) || !control) && panel && getComputedStyle(panel).display !== 'none') {
                ktwp_closePanelScript(e);
            }
        });
        /* End hide panel by clicking outside it, if desired. */

        /* Functionality for tab panel reset button, if desired. Remove this if you don't need that. */
        const resetButton = document.getElementById('PLUGIN_PREFIX-reset-button');
        if (resetButton) {
            resetButton.addEventListener('click', function(e) {
                /* whatever the reset button should do goes here */
                // Example: console.log('Reset button clicked!');
            });
        }
        /* End functionality for tab panel reset button */

        function ktwp_closePanelScript(e) {
            /* put any steps here that need to run when the panel closes */
            const panel = document.querySelector('.PLUGIN_PREFIX-panel');
            if (panel) {
                panel.style.display = 'none';
            }
        }
    });
})();
