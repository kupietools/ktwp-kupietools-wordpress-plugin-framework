(function() {
    'use strict';

    document.addEventListener('DOMContentLoaded', function() {
        /* Show/hide panel by clicking tab icon, if desired. Remove this section if you don't want that. */
        const icon = document.querySelector('.PLUGIN_PREFIX-icon');
        if (icon) {
            icon.addEventListener('click', function(e) {
                e.preventDefault();
                const panel = document.querySelector('.PLUGIN_PREFIX-panel');
                if (panel) {
                    panel.style.display = panel.style.display === 'none' ? 'block' : 'none';
                }
            });
        }
        /* end Show/hide panel by clicking tab icon */

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
            if (control && panel && !control.contains(e.target) && panel.style.display !== 'none') {
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
