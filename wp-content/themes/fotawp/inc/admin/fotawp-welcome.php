<?php

/**
 * Adding Admin Notice for recommended plugins
 */
if (!function_exists('is_fr_plugin_installed')) {
    function is_fr_plugin_installed($plugin_slug)
    {
        $plugin_path = WP_PLUGIN_DIR . '/' . $plugin_slug;
        return file_exists($plugin_path);
    }
}
if (!function_exists('is_fr_plugin_activated')) {
    function is_fr_plugin_activated($plugin_slug)
    {
        return is_plugin_active($plugin_slug);
    }
}

if (!function_exists('fotawp_welcome_notice')) :
    function fotawp_welcome_notice()
    {
        global $pagenow;
        // $theme_args      = wp_get_theme();
        // $name            = $theme_args->__get( 'Name' );
        $meta            = get_option('fotawp-welcome-notice-update');
        $current_screen  = get_current_screen();

        if (is_admin() && !$meta) {

            if ($current_screen->id !== 'dashboard' && $current_screen->id !== 'themes') {
                return;
            }

            if (is_network_admin()) {
                return;
            }

            if (!current_user_can('manage_options')) {
                return;
            }
            $theme = wp_get_theme();

            if (is_child_theme()) {
                $theme = wp_get_theme()->parent();
            }
            $fotawp_version = $theme->get('Version');

?>
            <div class="fotawp-admin-notice notice notice-info is-dismissible content-install-plugin theme-info-notice">

                <div class="theme-screen">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/inc/admin/images/dashboard_theme_screen.png'); ?>" />
                </div>
                <div class="info-content">
                    <h6><span class="theme-name"><span><?php echo __('FotaWP', 'fotawp') . ' ' . esc_html($fotawp_version); ?> - <?php echo __('FSE Theme', 'fotawp'); ?></span></h6>
                    <h2><?php echo __('Congratulations! FotaWP has been installed and ready to build your website!', 'fotawp'); ?></h2>

                    <h3><?php echo __('Get 100% control of your site,', 'fotawp'); ?> <?php echo __('No limit at all! Full Site Editing block builder and Elementor make it happened!, 20+ pre-built demos are avilable for one click demo import, start with importing stater demos?', 'fotawp'); ?>
                    </h3>
                    <a href="#" id="install-activate-button" class="button admin-button info-button"><?php echo __('Getting start importing demo', 'fotawp') ?></a>
                    <a href="<?php echo admin_url(); ?>themes.php?page=about-fotawp" class="admin-button info-button"><?php echo __('Explore FotaWP', 'fotawp'); ?></a>
                    <a href="<?php echo admin_url(); ?>themes.php?fotawp-welcome-notice-update=true" class="admin-button dismiss-notice btn-notice-dismiss"><?php echo __('Dismiss Notice', 'fotawp'); ?></a>


                </div>

            </div>
    <?php

        }
    }
endif;
add_action('admin_notices', 'fotawp_welcome_notice');

if (!function_exists('fotawp_ignore_admin_notice')) :
    /**
     * ignore notice if dismissed!
     */
    function fotawp_ignore_admin_notice()
    {

        if (isset($_GET['fotawp-welcome-notice-update']) && $_GET['fotawp-welcome-notice-update'] = 'true') {
            update_option('fotawp-welcome-notice-update', true);
        }
    }
endif;
add_action('admin_init', 'fotawp_ignore_admin_notice');



// Hook into a custom action when the button is clicked
add_action('wp_ajax_fotawp_install_and_activate_plugins', 'fotawp_install_and_activate_plugins');
add_action('wp_ajax_nopriv_fotawp_install_and_activate_plugins', 'fotawp_install_and_activate_plugins');
add_action('wp_ajax_fotawp_rplugin_activation', 'fotawp_rplugin_activation');
add_action('wp_ajax_nopriv_fotawp_rplugin_activation', 'fotawp_rplugin_activation');

// Function to install and activate the plugins



function check_plugin_installed_status($pugin_slug, $plugin_file)
{
    return file_exists(ABSPATH . 'wp-content/plugins/' . $pugin_slug . '/' . $plugin_file) ? true : false;
}

/* Check if plugin is activated */


function check_plugin_active_status($pugin_slug, $plugin_file)
{
    return is_plugin_active($pugin_slug . '/' . $plugin_file) ? true : false;
}

require_once(ABSPATH . 'wp-admin/includes/plugin-install.php');
require_once(ABSPATH . 'wp-admin/includes/file.php');
require_once(ABSPATH . 'wp-admin/includes/misc.php');
require_once(ABSPATH . 'wp-admin/includes/class-wp-upgrader.php');
function fotawp_install_and_activate_plugins()
{
    // Define the plugins to be installed and activated
    $recommended_plugins = array(
        array(
            'slug' => 'elementor',
            'file' => 'elementor.php',
            'name' => 'Elementor'
        ),
        array(
            'slug' => 'cozy-addons',
            'file' => 'cozy-addons.php',
            'name' => 'Cozy Addons'
        ),
        array(
            'slug' => 'advanced-import',
            'file' => 'advanced-import.php',
            'name' => 'Advanced Imporrt'
        ),
        array(
            'slug' => 'cozy-essential-addons',
            'file' => 'cozy-essential-addons.php',
            'name' => 'Cozy Essential Addons'
        ),
        // Add more plugins here as needed
    );

    // Include the necessary WordPress functions


    // Set up a transient to store the installation progress
    set_transient('install_and_activate_progress', array(), MINUTE_IN_SECONDS * 10);

    // Loop through each plugin
    foreach ($recommended_plugins as $plugin) {
        $plugin_slug = $plugin['slug'];
        $plugin_file = $plugin['file'];
        $plugin_name = $plugin['name'];

        // Check if the plugin is active
        if (is_plugin_active($plugin_slug . '/' . $plugin_file)) {
            update_install_and_activate_progress($plugin_name, 'Already Active');
            continue; // Skip to the next plugin
        }

        // Check if the plugin is installed but not active
        if (is_plugin_installed($plugin_slug . '/' . $plugin_file)) {
            $activate = activate_plugin($plugin_slug . '/' . $plugin_file);
            if (is_wp_error($activate)) {
                update_install_and_activate_progress($plugin_name, 'Error');
                continue; // Skip to the next plugin
            }
            update_install_and_activate_progress($plugin_name, 'Activated');
            continue; // Skip to the next plugin
        }

        // Plugin is not installed or activated, proceed with installation
        update_install_and_activate_progress($plugin_name, 'Installing');

        // Fetch plugin information
        $api = plugins_api('plugin_information', array(
            'slug' => $plugin_slug,
            'fields' => array('sections' => false),
        ));

        // Check if plugin information is fetched successfully
        if (is_wp_error($api)) {
            update_install_and_activate_progress($plugin_name, 'Error');
            continue; // Skip to the next plugin
        }

        // Set up the plugin upgrader
        $upgrader = new Plugin_Upgrader();
        $install = $upgrader->install($api->download_link);

        // Check if installation is successful
        if ($install) {
            // Activate the plugin
            $activate = activate_plugin($plugin_slug . '/' . $plugin_file);

            // Check if activation is successful
            if (is_wp_error($activate)) {
                update_install_and_activate_progress($plugin_name, 'Error');
                continue; // Skip to the next plugin
            }
            update_install_and_activate_progress($plugin_name, 'Activated');
        } else {
            update_install_and_activate_progress($plugin_name, 'Error');
        }
    }

    // Delete the progress transient
    $redirect_url = admin_url('themes.php?page=advanced-import');

    // Delete the progress transient
    delete_transient('install_and_activate_progress');
    // Return JSON response
    wp_send_json_success(array('redirect_url' => $redirect_url));
}

// Function to check if a plugin is installed but not active
function is_plugin_installed($plugin_slug)
{
    $plugins = get_plugins();
    return isset($plugins[$plugin_slug]);
}

// Function to update the installation and activation progress
function update_install_and_activate_progress($plugin_name, $status)
{
    $progress = get_transient('install_and_activate_progress');
    $progress[] = array(
        'plugin' => $plugin_name,
        'status' => $status,
    );
    set_transient('install_and_activate_progress', $progress, MINUTE_IN_SECONDS * 10);
}


function fotawp_rplugin_activation()
{
    $frp_plugins = '';
    if (isset($_POST['get_slug']) && isset($_POST['get_filename'])) {
        // Get the additional parameters
        $plugin_slug = $_POST['get_slug'];
        $plugin_filename = $_POST['get_filename'];
        $frp_plugins = $plugin_slug . '/' . $plugin_filename;

        if (is_plugin_installed($frp_plugins)) {
            $activate = activate_plugin($frp_plugins);
            if (is_wp_error($activate)) {
                update_install_and_activate_progress('Cozy Essential Addons', 'Error');
            }
            update_install_and_activate_progress('Cozy Essential Addons', 'Activated');
        }
        wp_send_json_success();
    } else {
        wp_send_json_error('Error: Missing parameters.');
    }
}

/**
 * Add dashboard menu for theme page
 */
function fotawp_dashboard_menu()
{
    add_theme_page(esc_html__('FotaWP', 'fotawp'), esc_html__('FotaWP', 'fotawp'), 'edit_theme_options', 'about-fotawp', 'fotawp_theme_info_display');
}
add_action('admin_menu', 'fotawp_dashboard_menu');
/**
 * Display info page for fotawp
 */
function fotawp_theme_info_display()
{
    $theme = wp_get_theme();

    if (is_child_theme()) {
        $theme = wp_get_theme()->parent();
    }
    $fotawp_version = $theme->get('Version');
    ?>
    <div class="fotawp-dashboard">
        <div class="container">
            <div class="fotawp-dashboard-header">
                <div class="theme-screen">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/inc/admin/images/dashboard_theme_screen.png'); ?>" />
                </div>
                <div class="theme-details">
                    <h6><span class="theme-name"><span><?php echo __('FotaWP', 'fotawp') . ' ' . esc_html($fotawp_version); ?> - <?php echo __('FSE Theme', 'fotawp'); ?></span></h6>

                    <h1><?php echo __('Congratulations! FotaWP has been installed and ready to build your website!!', 'fotawp') ?></h1>
                    <div class="welcome-buttons">
                        <a href="https://cozythemes.com/fotawp-pro/"><?php echo __('Check FotaWP Pro', 'fotawp') ?></a>
                    </div>
                </div>
            </div>
            <div class="fotawp-dashboard-content">

                <ul id="fotawp-dashboard-tabs-nav">
                    <li><a href="#fotawp-welcome"><?php echo __('Welcome', 'fotawp') ?></a></li>
                    <li><a href="#fotawp-support"><?php echo __('Support', 'fotawp') ?></a></li>
                    <li><a href="#fotawp-comparision"><?php echo __('FREE VS PRO', 'fotawp') ?></a></li>
                </ul> <!-- END tabs-nav -->
                <div id="tabs-content">
                    <div id="fotawp-welcome" class="tab-content">
                        <h2><?php echo __('Full Site Editing, Full Control Over Site! No Limit at All.', 'fotawp') ?></h2>
                        <p><?php echo __('Welcome to FOTAWP! Our multipurpose theme offers you the flexibility to create any type of website for any niche you desire. With 20+ pre-built demo templates and a one-click demo import option, you can easily customize your website to suit your needs and have your business up and running in no time. Our theme is user-friendly and easy to customize, with an intuitive interface that does not require coding expertise. It is also fully responsive and offers a range of features and options, including customizable headers and footers, custom widgets, social media integration, and more. With our theme, you can create a unique and professional-looking website without the need for expensive designers or developers.', 'fotawp') ?></p>
                        <h2><?php echo __('Recommended Plugins', 'fotawp') ?></h2>
                        <p><?php echo __('To get fully advantage of theme please install and activate recommended plugins listed below at recommended plugin section. These plugins are complementary that adds more features to the theme.', 'fotawp') ?></p>
                        <h4 class="highlight-text"><?php echo __('Install and activate all recommended plugins and getting start with starter templates demo with one click : ', 'fotawp'); ?></h4>
                        </h3>
                        <a href="#" id="install-activate-button" class="button admin-button info-button"><?php echo __('Getting Started with One Click', 'fotawp') ?></a>
                        <h4 class="highlight-text">
                            <?php echo __('Or you can install and activate mannually as your requirement one by one : ', 'fotawp') ?>
                        </h4>
                        <div class="plugin-list">

                            <div class="frp_holder">
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/inc/admin/images/frp_elementor.png'); ?>" />
                                <div class="frp_holder_footer">
                                    <?php
                                    function fotawp_recommend_pluigns_activation_status($frp_slug, $frp_file)
                                    {
                                        $frp_button_activation_id = '';
                                        if (!is_fr_plugin_installed($frp_slug . '/' . $frp_file)) {
                                            $frp_activation_link = get_admin_url() . 'plugin-install.php?tab=plugin-information&plugin=' . $frp_slug . '&TB_iframe=true&width=600&height=550';
                                            $frp_activation_text = __('Install and Activate', 'fotawp');
                                        } elseif (is_fr_plugin_installed($frp_slug . '/' . $frp_file) && !is_fr_plugin_activated($frp_slug . '/' . $frp_file)) {
                                            $frp_activation_link = get_admin_url() . 'plugins.php?action=active&plugin=' . $frp_slug;
                                            $frp_activation_text = __('Activate', 'fotawp');
                                            $frp_button_activation_id = $frp_slug;
                                        } else {
                                            if (is_fr_plugin_activated($frp_slug . '/' . $frp_file)) {
                                                $frp_activation_link = '#';
                                                $frp_button_activation_id = 'activation-disabled';
                                                $frp_activation_text = __('Installed', 'fotawp');
                                            }
                                        }
                                        $output = '<a id="frp-activation-button" data-rpslug="' . $frp_slug . '" data-filename="' . $frp_file . '"  href="' . esc_url($frp_activation_link) . '" class="frp_plugin_action ' . esc_attr($frp_button_activation_id) . ' ">' . esc_html($frp_activation_text) . '</a>';
                                        echo  $output;
                                    }

                                    fotawp_recommend_pluigns_activation_status('elementor', 'elementor.php');
                                    ?>
                                </div>
                            </div>
                            <div class="frp_holder">
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/inc/admin/images/frp_cozyaddons.png'); ?>" />
                                <div class="frp_holder_footer">
                                    <?php fotawp_recommend_pluigns_activation_status('cozy-addons', 'cozy-addons.php'); ?>
                                </div>
                            </div>
                            <div class="frp_holder">
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/inc/admin/images/frp_cea.png'); ?>" />
                                <div class="frp_holder_footer">
                                    <?php
                                    fotawp_recommend_pluigns_activation_status('cozy-essential-addons', 'cozy-essential-addons.php');

                                    ?>
                                </div>
                            </div>
                            <div class="frp_holder">
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/inc/admin/images/frp_ai.png'); ?>" />
                                <div class="frp_holder_footer">
                                    <?php fotawp_recommend_pluigns_activation_status('advanced-import', 'advanced-import.php'); ?>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div id="fotawp-support" class="tab-content">
                        <h2><?php echo __('Support Tickets', 'fotawp') ?></h2>
                        <p><?php echo __('Still, having problems after reading all the documentation? No Problem!! Please create a support ticket. Our dedicated support team will help you to solve your problem.', 'fotawp') ?></p>
                        <a href="https://cozythemes.com/support" target="_blank" class="ticket-create">
                            <?php echo __('Create Ticket', 'fotawp'); ?>
                        </a>
                        <span class="support-note">
                            <p><?php echo __('Note: The support ticket has generally been responded to within 24 hours.', 'fotawp') ?></p>
                        </span>
                    </div>
                    <div id="fotawp-comparision" class="tab-content">
                        <h4><?php
                            echo __('Premium version comes with 20+ demos, Advanced Patterns, 40+ Elementor widgets, Header Footer Builder for Elementor, custom CSS, custom header & footer scripts option and all powerful premium features with just single license!', 'fotawp')
                            ?></h4>
                        <a href="https://cozythemes.com/fotawp-pro/" target="_blank" class="more-button">
                            <?php echo __('View More Features', 'fotawp'); ?>
                        </a>
                    </div>
                </div> <!-- END tabs-content -->
            </div> <!-- END tabs -->
        </div>
    </div>
<?php }
