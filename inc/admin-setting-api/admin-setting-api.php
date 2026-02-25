<?php
class About_Pages_Dynamic_Data {

    public function __construct() {
        add_action('admin_menu', [$this, 'register_menu']);
    }

    public function register_menu() {

        // Parent Menu
        add_menu_page(
            'Theme Settings',// page title
            'Theme Settings',// menu title
            'manage_options',// capability
            'theme-settings',// menu slug
            [$this, 'parent_page'], // fixed callback
            'dashicons-admin-generic',// icon
            25// position
        );

        // Submenu (sell Page)
        add_submenu_page(
            'theme-settings',// parent slug
            'Sell Pages',// page title
            'Sell Pages',// menu title
            'manage_options',//capability
            'sell-pages-dynamic-data',//menu slug
            [$this, 'admin_sell_page_content']// callback
        );
        // Submenu (sell Page)
        add_submenu_page(
            'theme-settings',// parent slug
            'Commercial Pages',// page title
            'Commercial Pages',// menu title
            'manage_options',//capability
            'commercial-pages-dynamic-data',//menu slug
            [$this, 'admin_commercial_page_content']// callback
        );
        

    }
    
    // Parent Page Content
    public function parent_page() {
        echo '<div class="wrap"><h1>Theme Settings</h1></div>';
    }

    // Submenu sell Content
    public function admin_sell_page_content() {
        $saved = false;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                if (isset($_POST['sell_property_percent'])) {
                update_option('sell_property_percent', sanitize_text_field($_POST['sell_property_percent']));
                }

                if (isset($_POST['sell_experience'])) {
                update_option('sell_experience', sanitize_text_field($_POST['sell_experience']));
                }

                if (isset($_POST['sell_successful_properties'])) {
                update_option('sell_successful_properties', sanitize_text_field($_POST['sell_successful_properties']));
                }

                if (isset($_POST['sell_active_buyers'])) {
                update_option('sell_active_buyers', sanitize_text_field($_POST['sell_active_buyers']));
                }

                if (isset($_POST['sell_client_support'])) {
                update_option('sell_client_support', sanitize_text_field($_POST['sell_client_support']));
                }

                if (isset($_POST['sell_transparent_selling'])) {
                update_option('sell_transparent_selling', sanitize_text_field($_POST['sell_transparent_selling']));
                }
                $saved = true;
            }

            if ($saved) {
            echo '<div class="updated notice is-dismissible"><p>Saved Successfully</p></div>';
            }else{
            echo '<div class="notice notice-info is-dismissible"><p>Make changes and click save to update the values.</p></div>';
            }
            
        ?>
        <div class="wrap">
            <h1>Sell Pages Dynamic Data</h1>
            <form method="post">
                <table class="form-table">
                    <tr>
                        <th scope="row">Sell Percent</th>
                        <td>
                            <input type="number" name="sell_property_percent"
                            value="<?php echo esc_attr(get_option('sell_property_percent')); ?>"
                            class="regular-text">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Sell Percent</th>
                        <td>
                            <input type="text" name="sell_experience"
                            value="<?php echo esc_attr(get_option('sell_experience')); ?>"
                            class="regular-text">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Successful property</th>
                        <td>
                            <input type="number" name="sell_successful_properties"
                            value="<?php echo esc_attr(get_option('sell_successful_properties')); ?>"
                            class="regular-text">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Active buyers</th>
                        <td>
                            <input type="number" name="sell_active_buyers"
                            value="<?php echo esc_attr(get_option('sell_active_buyers')); ?>"
                            class="regular-text">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Client support</th>
                        <td>
                            <input type="text" name="sell_client_support"
                            value="<?php echo esc_attr(get_option('sell_client_support')); ?>"
                            class="regular-text">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Transparent selling</th>
                        <td>
                            <input type="number" name="sell_transparent_selling"
                            value="<?php echo esc_attr(get_option('sell_transparent_selling')); ?>"
                            class="regular-text">
                        </td>
                    </tr>
                </table>
                <?php submit_button(); ?>
            </form>
        </div>
        <?php
    }
    // Submenu commercial Content
    public function admin_commercial_page_content() {
        $saved = false;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (isset($_POST['commercial_experience'])) {
            update_option('commercial_experience', sanitize_text_field($_POST['commercial_experience']));
            }

            if (isset($_POST['commercial_Verified_listings'])) {
            update_option('commercial_Verified_listings', sanitize_text_field($_POST['commercial_Verified_listings']));
            }

            if (isset($_POST['commercial_worldwide'])) {
            update_option('commercial_worldwide', sanitize_text_field($_POST['commercial_worldwide']));
            }

            if (isset($_POST['commercial_quick_shortlist'])) {
            update_option('commercial_quick_shortlist', sanitize_text_field($_POST['commercial_quick_shortlist']));
            }
            $saved = true;
            }

            if ($saved) {
            echo '<div class="updated notice is-dismissible"><p>Saved Successfully</p></div>';
            }else{
                echo '<div class="notice notice-info is-dismissible"><p>Make changes and click save to update the values.</p></div>';
            }
        ?>
        <div class="wrap">
            <h1>Sell Pages Dynamic Data</h1>
            <form method="post">
                <table class="form-table">
                    <tr>
                        <th scope="row">Commercial Experience</th>
                        <td>
                            <input type="text" name="commercial_experience"
                            value="<?php echo esc_attr(get_option('commercial_experience')); ?>"
                            class="regular-text">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Verified Listings</th>
                        <td>
                            <input type="text" name="commercial_Verified_listings"
                            value="<?php echo esc_attr(get_option('commercial_Verified_listings')); ?>"
                            class="regular-text">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Worldwide Presence</th>
                        <td>
                            <input type="text" name="commercial_worldwide"
                            value="<?php echo esc_attr(get_option('commercial_worldwide')); ?>"
                            class="regular-text">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Quick Shortlist</th>
                        <td>
                            <input type="text" name="commercial_quick_shortlist"
                            value="<?php echo esc_attr(get_option('commercial_quick_shortlist')); ?>"
                            class="regular-text">
                        </td>
                    </tr>
                    
                </table>
                <?php submit_button(); ?>
            </form>
        </div>
        <?php
    }
    
}

new About_Pages_Dynamic_Data();
