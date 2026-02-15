<?php
if (!defined('ABSPATH')) exit;

/**
 * Developers Settings page (under Developers menu)
 * Hero Background Image uploader using WP Media
 */

add_action('admin_menu', function () {
    add_submenu_page(
        'edit.php?post_type=developer',
        'Developers Settings',
        'Settings',
        'manage_options',
        'sbtech-developers-settings',
        'sbtech_developers_settings_page'
    );
});

add_action('admin_init', function () {
    register_setting('sbtech_developers_settings', 'sbtech_developers_hero_bg');
});

function sbtech_developers_settings_page() {
    if (!current_user_can('manage_options')) return;

    $hero = get_option('sbtech_developers_hero_bg', '');
?>
    <div class="wrap">
        <h1>Developers Settings</h1>

        <form method="post" action="options.php">
            <?php settings_fields('sbtech_developers_settings'); ?>

            <table class="form-table" role="presentation">
                <tr>
                    <th scope="row">Hero Background Image</th>
                    <td>
                        <div style="display:flex; gap:16px; align-items:flex-start;">
                            <div>
                                <input type="text" id="sbtech_developers_hero_bg" name="sbtech_developers_hero_bg"
                                    value="<?php echo esc_attr($hero); ?>" style="width:420px;" />
                                <p>
                                    <button type="button" class="button" id="sbtech_developers_hero_bg_btn">Upload / Select</button>
                                    <button type="button" class="button" id="sbtech_developers_hero_bg_remove">Remove</button>
                                </p>
                                <p class="description">This image will be used as Developers page hero background.</p>
                            </div>

                            <div>
                                <div id="sbtech_developers_hero_bg_preview" style="width:320px; height:160px; background:#f1f1f1; border:1px solid #ddd; display:flex; align-items:center; justify-content:center; overflow:hidden;">
                                    <?php if ($hero): ?>
                                        <img src="<?php echo esc_url($hero); ?>" style="width:100%; height:100%; object-fit:cover;" />
                                    <?php else: ?>
                                        <span>No image selected</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>

            <?php submit_button(); ?>
        </form>
    </div>

    <script>
        (function($) {
            let frame;

            $('#sbtech_developers_hero_bg_btn').on('click', function(e) {
                e.preventDefault();

                if (frame) {
                    frame.open();
                    return;
                }

                frame = wp.media({
                    title: 'Select Hero Background',
                    button: {
                        text: 'Use this image'
                    },
                    multiple: false
                });

                frame.on('select', function() {
                    const attachment = frame.state().get('selection').first().toJSON();
                    $('#sbtech_developers_hero_bg').val(attachment.url);
                    $('#sbtech_developers_hero_bg_preview').html(
                        '<img src="' + attachment.url + '" style="width:100%; height:100%; object-fit:cover;" />'
                    );
                });

                frame.open();
            });

            $('#sbtech_developers_hero_bg_remove').on('click', function() {
                $('#sbtech_developers_hero_bg').val('');
                $('#sbtech_developers_hero_bg_preview').html('<span>No image selected</span>');
            });
        })(jQuery);
    </script>
<?php
}

add_action('admin_enqueue_scripts', function ($hook) {
    // only load media on our settings page
    if ($hook !== 'developer_page_sbtech-developers-settings') return;
    wp_enqueue_media();
});
