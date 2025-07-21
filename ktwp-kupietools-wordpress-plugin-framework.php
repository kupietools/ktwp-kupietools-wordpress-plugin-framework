<?php
/*
Plugin Name: Kupietools PLUGIN TITLE HERE
Description: DESCRIPTION HERE
Version: 1.0
Author: Michael Kupietz
*/

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}


/* add section for this plugin to KupieTools admin area menu, if desired, otherwise remove this section */

add_action('admin_menu', function () {
    global $menu;
    $exists = false;
    
    if ($menu) {
        foreach($menu as $item) {
            if (isset($item[0]) && $item[0] === 'KupieTools') {
                $exists = true;
                break;
            }
        }
    }
    
    if (!$exists) {
        add_menu_page(
            'KupieTools Settings',
            'KupieTools',
            'manage_options',
            'kupietools',
            function() {
                echo '<div class="wrap"><h1>KupieTools</h1>';
                do_action('kupietools_sections');
                echo '</div>';
            },
            'dashicons-admin-tools'
        );
    }
});


// Register settings
    add_action('admin_init', function() {
        register_setting('PLUGIN_PREFIX_options', 'PLUGIN_PREFIX_checkbox_1');
        register_setting('PLUGIN_PREFIX_options', 'PLUGIN_PREFIX_checkbox_2');
        register_setting('PLUGIN_PREFIX_options', 'PLUGIN_PREFIX_text_area_1');
        register_setting('PLUGIN_PREFIX_options', 'PLUGIN_PREFIX_text_area_2');
    });
    

// Add THIS plugin's section
    add_action('kupietools_sections', function() {
        ?>
        <details class="card ktwpcache" style="max-width: 800px; padding: 20px; margin-top: 20px;" open="true">
            <summary style="font-weight:bold;"><!-- SETTINGS SECTION TITLE --></summary>
            <!-- SETTINGS SECTION DESCRIPTION OR INSTRUCTIONS GO HERE -->
            <form method="post" action="options.php">
                <?php
                settings_fields('PLUGIN_PREFIX_options');
                ?>
                <div>
                    <p>
                        <label>
                            <input type="checkbox" name="PLUGIN_PREFIX_checkbox_1" value="1" 
                                <?php checked(get_option('PLUGIN_PREFIX_checkbox_1', '1'), '1'); /* default checked */ ?>> 
                            <strong>Checkbox_1 label</strong>
                        </label>
                    </p>
                    <p>
                        <label>
                            <input type="checkbox" name="PLUGIN_PREFIX_checkbox_2" value="1"
                                <?php checked(get_option('PLUGIN_PREFIX_checkbox_2', '0'), '1'); /* default unchecked */ ?>>
                            <strong>Checkbox_2 label</strong>
                        </label>
                    </p>
                    <p>
                        <label>
							<strong>Text area 1:</strong><br>
							<textarea rows="4" name="PLUGIN_PREFIX_text_area_1" style="width: 100%; margin-top: 10px;"><?php echo esc_attr(get_option('PLUGIN_PREFIX_text_area_1', "TEXT_AREA_1_DEFAULT_VALUE")); ?></textarea> 
                           
                        </label>
                    </p>
                   <p>
                        <label>
							<strong>Text area 2:</strong><br>
							<textarea rows="4" name="PLUGIN_PREFIX_text_area_2" style="width: 100%; margin-top: 10px;"><?php echo esc_attr(get_option('PLUGIN_PREFIX_text_area_2', "TEXT_AREA_2_DEFAULT_VALUE")); ?></textarea> 
                           
                        </label>
                    </p>
                  
                </div>
                <?php submit_button('Save Settings'); ?>
            </form>
        </details>
        <?php
    });
//}); 

$checkbox_1 = get_option('PLUGIN_PREFIX_checkbox_1','1'); /* default checked, if never set before */
$checkbox_2 = get_option('PLUGIN_PREFIX_checkbox_2','0'); /* default unchecked, if never set before */
// Each will return '1' if checked, '0' if unchecked
$text_area_1 = get_option('PLUGIN_PREFIX_text_area_1',"TEXT_AREA_1_DEFAULT_VALUE");
$text_area_2 = get_option('PLUGIN_PREFIX_text_area_2',"TEXT_AREA_2_DEFAULT_VALUE"); 
 
 /* End Kupietools menu entry */


/* Create UI Tab if desired. Otherwise remove this section */

// Add the control panel HTML and required scripts/styles
function PLUGIN_PREFIX_enqueue_assets() {
    wp_enqueue_style('PLUGIN_PREFIX-styles', plugins_url('css/style.css', __FILE__));
    wp_enqueue_script('PLUGIN_PREFIX-script', plugins_url('js/script.js', __FILE__), array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'PLUGIN_PREFIX_enqueue_assets');



/* if you want to display the panel in a wordpress page with a shortcode, this will let you. Remove this if not needed. */
add_shortcode("SHORTCODE-HERE","PLUGIN_PREFIX_plugin_content");
/* end shortcode */


//function to generate the plugin visual content
function PLUGIN_PREFIX_plugin_content($args = [], $content = null /* you can remove these parameters if you're not using a shortcode */) {
/* you can remove this shortcode parameter block if you're not using a shortcode */
$args = shortcode_atts(
        [
            "shortcode-parameter-1" => "parameter-1-default-value",
            "shortcode-parameter-2" => "parameter-2-default-value"
			
        ],
        $args,
        "PLUGIN_PREFIX_plugin_content"
    );
 /* end of shortcode parameter block */   
?>

            <div class="PLUGIN_PREFIX-panel-content">
              <!-- PANEL CONTENT HERE -->
		
            </div>
			<!-- <button id="PLUGIN_PREFIX-reset-button" style="width: 100%; padding: 8px; background: #808080; color: white; border: none; border-radius: 3px; cursor: pointer; margin-top: 10px;">RESET BUTTON TEXT, IF YOU WANT ONE</button> -->
    
       <?php
}


// Add the popup control panel HTML to the footer
function PLUGIN_PREFIX_add_control_panel_popup() {
/*note: ktwp-kupietabs-tab-div class will identify all tabs created this way so other instances of this framework—or any other plugin, like KupieTools Draggable Elements for instance—can find them. */
    ?>
    <div id="PLUGIN_PREFIX-control" class="PLUGIN_PREFIX-control">
       <button class="PLUGIN_PREFIX-icon"><!-- TO-DO NOTE: maybe add a title attribute here later, and make KupieTools Draggable Elements add its "drag me" text, rather than just replacing it, if it doesn't do that already. Or, um, does it do that on the parent #PLUGIN_PREFIX-control div? Check this. -->
    <!-- ICON GOES HERE, INCLUDING EITHER AN HREF, A JAVASCRIPT CALL TO  -->
    <span class="PLUGIN_PREFIX-hover-text"><!-- POPOUT-ON-HOVER DESCRIPTIVE TEXT GOES HERE --></span>
</button>
 
    </div>
    <div ID="PLUGIN_PREFIX-panel" class="PLUGIN_PREFIX-panel ktwp-kupietabs-panel-div">
            <div class="PLUGIN_PREFIX-panel-header">
               <!--  <span>PANEL TITLE GOES HERE</span>  -->
                <button class="PLUGIN_PREFIX-close-button">&times;</button>
            </div>
<?php PLUGIN_PREFIX_plugin_content() ?>
       </div>
<script id="PLUGIN_PREFIX_inline_script">
/* stop event listeners from bubbling */	/* stop event listeners from bubbling */	['mousedown','mouseover','mousemove','dragstart','touchstart','touchmove','click'].forEach(thisAction => {
const thisPan=document.getElementById("ktwp_eyesHaveIt-panel");
if(thisPan) {thisPan.addEventListener(thisAction, function(event) { event.stopPropagation();});}



});

/* I originally created a parent container so I could have a flexbox to append the divs to as children so multiple plugins' tabs stacked automatically; but I decided that's not needed, I'll just count the kupietab elements and multiply to calculate the right top, so it's set explicitly. 
*/

/* move the new tab to stack under tabs from other KupieTools plugins, if desired (which it probably is.) Remove this section if you don't want that. */ 



const PLUGIN_PREFIX_numOfKupieTabs=document.getElementsByClassName("ktwp-kupietabs-tab-div").length; /* start at 0 so no offset from 130px */
const PLUGIN_PREFIX_thisTab=document.getElementById("PLUGIN_PREFIX-control");

if(PLUGIN_PREFIX_thisTab) {
PLUGIN_PREFIX_thisTab.classList.add("ktwp-kupietabs-tab-div"); /* have to do it this way because sometimes page optimizers defer scripts... this might not run at all until after all tabs have been added to the page */
PLUGIN_PREFIX_thisTab.style.top = (130+ PLUGIN_PREFIX_numOfKupieTabs * 38) + "px";
/* end move the new tab to stack under tabs from other KupieTools plugins */}
const PLUGIN_PREFIX_thisPanel=document.getElementById("PLUGIN_PREFIX-panel");
if(PLUGIN_PREFIX_thisPanel) {
PLUGIN_PREFIX_thisPanel.style.top = (140 + PLUGIN_PREFIX_numOfKupieTabs * 38) + "px";
	PLUGIN_PREFIX_thisPanel.style.left="20px";}
</script>
    <?php
}
add_action('wp_footer', 'PLUGIN_PREFIX_add_control_panel_popup');

/* End create UI Tab */

