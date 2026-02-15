<?php

/**
 * Developers CPT + Single Page Dynamic Sections (Metropolitan-like)
 * - Developer meta fields (hero, logo, founded, price, button, contact shortcode)
 * - Project relation (select developer in project CPT)
 * - Agent relation (optional)
 * - Helpers for querying related projects/areas/agents
 */

if (!defined('ABSPATH')) exit;

// -----------------------------
// CONFIG (adjust later if you want strict)
// -----------------------------
define('SBTECH_DEV_CPT', 'developer');

// developer meta keys
define('SBTECH_DEV_META_SUBTITLE', '_sbtech_dev_subtitle');
define('SBTECH_DEV_META_FOUNDED',  '_sbtech_dev_founded');
define('SBTECH_DEV_META_PRICE',    '_sbtech_dev_price_from');
define('SBTECH_DEV_META_HERO_IMG', '_sbtech_dev_hero_image_id');
define('SBTECH_DEV_META_LOGO',     '_sbtech_dev_logo_id');
define('SBTECH_DEV_META_BTN_TEXT', '_sbtech_dev_btn_text');
define('SBTECH_DEV_META_BTN_URL',  '_sbtech_dev_btn_url');
define('SBTECH_DEV_META_CONTACT_SC', '_sbtech_dev_contact_shortcode');

// relation meta keys on other CPTs
define('SBTECH_PROJECT_META_DEVELOPER_ID', '_sbtech_project_developer_id');
define('SBTECH_AGENT_META_DEVELOPER_ID',   '_sbtech_agent_developer_id');

// try these post types for projects (auto-detect: only existing ones will be used)
function sbtech_get_possible_project_post_types() {
    return [
        'property',
        'properties',
        'porpertypi',     // your earlier CPT constant
        'project',
        'projects',
        'new_project',
        'new_projects',
        'newprojects',
    ];
}

// try these for agent CPT (optional)
function sbtech_get_possible_agent_post_types() {
    return [
        'agent',
        'agents',
    ];
}

// try these taxonomies for areas/districts (optional)
function sbtech_get_possible_area_taxonomies() {
    return [
        'areas',
        'area',
        'district',
        'districts',
    ];
}

// try these post types for areas (if you built Areas as CPT instead of taxonomy)
function sbtech_get_possible_area_cpts() {
    return [
        'areas',
        'area',
        'districts',
        'district',
    ];
}

// -----------------------------
// 1) Developer CPT registration (only if not already registered)
// If you already register Developer CPT somewhere else, keep it there.
// This block is safe: it won’t re-register if exists.
// -----------------------------
add_action('init', function () {
    if (post_type_exists(SBTECH_DEV_CPT)) return;

    register_post_type(SBTECH_DEV_CPT, [
        'labels' => [
            'name' => 'Developers',
            'singular_name' => 'Developer',
        ],
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-building',
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        'rewrite' => ['slug' => 'developers'],
        'show_in_rest' => true,
    ]);
}, 5);

// -----------------------------
// 2) Developer Meta Box (admin fields)
// -----------------------------
add_action('add_meta_boxes', function () {
    if (!post_type_exists(SBTECH_DEV_CPT)) return;

    add_meta_box(
        'sbtech_dev_details',
        'Developer Page Settings',
        'sbtech_dev_details_metabox_html',
        SBTECH_DEV_CPT,
        'normal',
        'high'
    );
});

function sbtech_dev_details_metabox_html($post) {
    wp_nonce_field('sbtech_dev_save_meta', 'sbtech_dev_meta_nonce');

    $subtitle = get_post_meta($post->ID, SBTECH_DEV_META_SUBTITLE, true);
    $founded  = get_post_meta($post->ID, SBTECH_DEV_META_FOUNDED, true);
    $price    = get_post_meta($post->ID, SBTECH_DEV_META_PRICE, true);

    $hero_id  = (int) get_post_meta($post->ID, SBTECH_DEV_META_HERO_IMG, true);
    $logo_id  = (int) get_post_meta($post->ID, SBTECH_DEV_META_LOGO, true);

    $btn_text = get_post_meta($post->ID, SBTECH_DEV_META_BTN_TEXT, true);
    $btn_url  = get_post_meta($post->ID, SBTECH_DEV_META_BTN_URL, true);

    $contact_sc = get_post_meta($post->ID, SBTECH_DEV_META_CONTACT_SC, true);

    $hero_url = $hero_id ? wp_get_attachment_image_url($hero_id, 'large') : '';
    $logo_url = $logo_id ? wp_get_attachment_image_url($logo_id, 'medium') : '';

?>
    <style>
        .sbtech-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .sbtech-field label {
            display: block;
            font-weight: 600;
            margin: 0 0 6px;
        }

        .sbtech-field input[type="text"],
        .sbtech-field input[type="url"],
        .sbtech-field textarea {
            width: 100%;
            max-width: 100%;
        }

        .sbtech-media-row {
            display: flex;
            gap: 14px;
            align-items: flex-start;
        }

        .sbtech-media-preview {
            width: 220px;
            height: 120px;
            background: #f3f4f6;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .sbtech-media-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .sbtech-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .sbtech-note {
            color: #6b7280;
            font-size: 12px;
            margin-top: 6px;
        }

        .sbtech-full {
            grid-column: 1/-1;
        }
    </style>

    <div class="sbtech-grid">

        <div class="sbtech-field">
            <label>Subtitle (e.g. About Developer)</label>
            <input type="text" name="sbtech_dev_subtitle" value="<?php echo esc_attr($subtitle); ?>" placeholder="About Developer">
        </div>

        <div class="sbtech-field">
            <label>Founded (e.g. 2002)</label>
            <input type="text" name="sbtech_dev_founded" value="<?php echo esc_attr($founded); ?>" placeholder="2002">
        </div>

        <div class="sbtech-field">
            <label>Price From (e.g. 109,600 EUR)</label>
            <input type="text" name="sbtech_dev_price_from" value="<?php echo esc_attr($price); ?>" placeholder="109,600 EUR">
        </div>

        <div class="sbtech-field">
            <label>Contact Form Shortcode (optional)</label>
            <input type="text" name="sbtech_dev_contact_shortcode" value="<?php echo esc_attr($contact_sc); ?>" placeholder='[contact-form-7 id="123" title="Contact"]'>
        </div>

        <div class="sbtech-field">
            <label>Hero Button Text</label>
            <input type="text" name="sbtech_dev_btn_text" value="<?php echo esc_attr($btn_text); ?>" placeholder="Find Property">
        </div>

        <div class="sbtech-field">
            <label>Hero Button URL</label>
            <input type="url" name="sbtech_dev_btn_url" value="<?php echo esc_attr($btn_url); ?>" placeholder="https://...">
        </div>

        <div class="sbtech-field sbtech-full">
            <label>Hero Right Image (Media)</label>
            <div class="sbtech-media-row">
                <div class="sbtech-media-preview" id="sbtech-hero-preview">
                    <?php if ($hero_url): ?>
                        <img src="<?php echo esc_url($hero_url); ?>" alt="">
                    <?php else: ?>
                        <span>No image</span>
                    <?php endif; ?>
                </div>

                <div>
                    <input type="hidden" id="sbtech_dev_hero_image_id" name="sbtech_dev_hero_image_id" value="<?php echo esc_attr($hero_id); ?>">
                    <div class="sbtech-actions">
                        <button type="button" class="button" id="sbtech-hero-upload">Upload / Select</button>
                        <button type="button" class="button" id="sbtech-hero-remove">Remove</button>
                    </div>
                    <div class="sbtech-note"> single developer page hero right side</div>
                </div>
            </div>
        </div>

        <div class="sbtech-field sbtech-full">
            <label>Developer Logo (optional)</label>
            <div class="sbtech-media-row">
                <div class="sbtech-media-preview" style="width:220px;height:120px;" id="sbtech-logo-preview">
                    <?php if ($logo_url): ?>
                        <img src="<?php echo esc_url($logo_url); ?>" alt="" style="object-fit:contain;background:#fff;">
                    <?php else: ?>
                        <span>No logo</span>
                    <?php endif; ?>
                </div>

                <div>
                    <input type="hidden" id="sbtech_dev_logo_id" name="sbtech_dev_logo_id" value="<?php echo esc_attr($logo_id); ?>">
                    <div class="sbtech-actions">
                        <button type="button" class="button" id="sbtech-logo-upload">Upload / Select</button>
                        <button type="button" class="button" id="sbtech-logo-remove">Remove</button>
                    </div>
                    <div class="sbtech-note">Logo “Latest Projects” heading show </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        (function($) {
            function openMedia(setIdCb) {
                const frame = wp.media({
                    title: 'Select Image',
                    button: {
                        text: 'Use this image'
                    },
                    multiple: false
                });
                frame.on('select', function() {
                    const att = frame.state().get('selection').first().toJSON();
                    setIdCb(att.id, att.url);
                });
                frame.open();
            }

            $('#sbtech-hero-upload').on('click', function(e) {
                e.preventDefault();
                openMedia(function(id, url) {
                    $('#sbtech_dev_hero_image_id').val(id);
                    $('#sbtech-hero-preview').html('<img src="' + url + '" alt="">');
                });
            });

            $('#sbtech-hero-remove').on('click', function(e) {
                e.preventDefault();
                $('#sbtech_dev_hero_image_id').val('');
                $('#sbtech-hero-preview').html('<span>No image</span>');
            });

            $('#sbtech-logo-upload').on('click', function(e) {
                e.preventDefault();
                openMedia(function(id, url) {
                    $('#sbtech_dev_logo_id').val(id);
                    $('#sbtech-logo-preview').html('<img src="' + url + '" alt="" style="object-fit:contain;background:#fff;">');
                });
            });

            $('#sbtech-logo-remove').on('click', function(e) {
                e.preventDefault();
                $('#sbtech_dev_logo_id').val('');
                $('#sbtech-logo-preview').html('<span>No logo</span>');
            });

        })(jQuery);
    </script>
<?php
}

add_action('admin_enqueue_scripts', function ($hook) {
    // load media uploader only on developer edit screen
    $screen = get_current_screen();
    if (!$screen) return;

    if ($screen->post_type === SBTECH_DEV_CPT) {
        wp_enqueue_media();
    }
});

add_action('save_post', function ($post_id) {
    if (get_post_type($post_id) !== SBTECH_DEV_CPT) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    if (!isset($_POST['sbtech_dev_meta_nonce']) || !wp_verify_nonce($_POST['sbtech_dev_meta_nonce'], 'sbtech_dev_save_meta')) {
        return;
    }

    $map = [
        'sbtech_dev_subtitle' => SBTECH_DEV_META_SUBTITLE,
        'sbtech_dev_founded' => SBTECH_DEV_META_FOUNDED,
        'sbtech_dev_price_from' => SBTECH_DEV_META_PRICE,
        'sbtech_dev_btn_text' => SBTECH_DEV_META_BTN_TEXT,
        'sbtech_dev_btn_url' => SBTECH_DEV_META_BTN_URL,
        'sbtech_dev_contact_shortcode' => SBTECH_DEV_META_CONTACT_SC,
    ];

    foreach ($map as $field => $meta_key) {
        $val = isset($_POST[$field]) ? wp_unslash($_POST[$field]) : '';
        $val = is_string($val) ? trim($val) : $val;
        update_post_meta($post_id, $meta_key, $val);
    }

    $hero_id = isset($_POST['sbtech_dev_hero_image_id']) ? (int) $_POST['sbtech_dev_hero_image_id'] : 0;
    $logo_id = isset($_POST['sbtech_dev_logo_id']) ? (int) $_POST['sbtech_dev_logo_id'] : 0;

    if ($hero_id) update_post_meta($post_id, SBTECH_DEV_META_HERO_IMG, $hero_id);
    else delete_post_meta($post_id, SBTECH_DEV_META_HERO_IMG);

    if ($logo_id) update_post_meta($post_id, SBTECH_DEV_META_LOGO, $logo_id);
    else delete_post_meta($post_id, SBTECH_DEV_META_LOGO);
}, 20);


// -----------------------------
// 3) Project → Developer relation meta box
// -----------------------------
add_action('add_meta_boxes', function () {
    $pts = sbtech_get_possible_project_post_types();
    foreach ($pts as $pt) {
        if (!post_type_exists($pt)) continue;

        add_meta_box(
            'sbtech_project_developer',
            'Developer (for auto sections)',
            'sbtech_project_developer_metabox_html',
            $pt,
            'side',
            'high'
        );
    }
});

function sbtech_project_developer_metabox_html($post) {
    wp_nonce_field('sbtech_project_dev_save', 'sbtech_project_dev_nonce');

    $selected = (int) get_post_meta($post->ID, SBTECH_PROJECT_META_DEVELOPER_ID, true);

    $developers = get_posts([
        'post_type' => SBTECH_DEV_CPT,
        'post_status' => 'publish',
        'numberposts' => -1,
        'orderby' => 'title',
        'order' => 'ASC',
    ]);

?>
    <p style="margin:0 0 8px;">project Developer under Developer single page auto show </p>
    <select name="sbtech_project_developer_id" style="width:100%;">
        <option value="0">— Select Developer —</option>
        <?php foreach ($developers as $dev): ?>
            <option value="<?php echo (int) $dev->ID; ?>" <?php selected($selected, $dev->ID); ?>>
                <?php echo esc_html($dev->post_title); ?>
            </option>
        <?php endforeach; ?>
    </select>
<?php
}

add_action('save_post', function ($post_id) {
    $pt = get_post_type($post_id);
    if (!$pt) return;

    if (!in_array($pt, sbtech_get_possible_project_post_types(), true)) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    if (!isset($_POST['sbtech_project_dev_nonce']) || !wp_verify_nonce($_POST['sbtech_project_dev_nonce'], 'sbtech_project_dev_save')) {
        return;
    }

    $dev_id = isset($_POST['sbtech_project_developer_id']) ? (int) $_POST['sbtech_project_developer_id'] : 0;

    if ($dev_id) update_post_meta($post_id, SBTECH_PROJECT_META_DEVELOPER_ID, $dev_id);
    else delete_post_meta($post_id, SBTECH_PROJECT_META_DEVELOPER_ID);
}, 20);


// -----------------------------
// 4) Agent → Developer relation meta box (optional if agent CPT exists)
// -----------------------------
add_action('add_meta_boxes', function () {
    $pts = sbtech_get_possible_agent_post_types();
    foreach ($pts as $pt) {
        if (!post_type_exists($pt)) continue;

        add_meta_box(
            'sbtech_agent_developer',
            'Developer (Agent Relation)',
            'sbtech_agent_developer_metabox_html',
            $pt,
            'side',
            'high'
        );
    }
});

function sbtech_agent_developer_metabox_html($post) {
    wp_nonce_field('sbtech_agent_dev_save', 'sbtech_agent_dev_nonce');
    $selected = (int) get_post_meta($post->ID, SBTECH_AGENT_META_DEVELOPER_ID, true);

    $developers = get_posts([
        'post_type' => SBTECH_DEV_CPT,
        'post_status' => 'publish',
        'numberposts' => -1,
        'orderby' => 'title',
        'order' => 'ASC',
    ]);
?>
    <select name="sbtech_agent_developer_id" style="width:100%;">
        <option value="0">— Select Developer —</option>
        <?php foreach ($developers as $dev): ?>
            <option value="<?php echo (int) $dev->ID; ?>" <?php selected($selected, $dev->ID); ?>>
                <?php echo esc_html($dev->post_title); ?>
            </option>
        <?php endforeach; ?>
    </select>
<?php
}

add_action('save_post', function ($post_id) {
    $pt = get_post_type($post_id);
    if (!$pt) return;

    if (!in_array($pt, sbtech_get_possible_agent_post_types(), true)) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    if (!isset($_POST['sbtech_agent_dev_nonce']) || !wp_verify_nonce($_POST['sbtech_agent_dev_nonce'], 'sbtech_agent_dev_save')) {
        return;
    }

    $dev_id = isset($_POST['sbtech_agent_developer_id']) ? (int) $_POST['sbtech_agent_developer_id'] : 0;

    if ($dev_id) update_post_meta($post_id, SBTECH_AGENT_META_DEVELOPER_ID, $dev_id);
    else delete_post_meta($post_id, SBTECH_AGENT_META_DEVELOPER_ID);
}, 20);


// -----------------------------
// 5) Helper: get existing project post types
// -----------------------------
function sbtech_get_project_post_types_existing() {
    $possible = sbtech_get_possible_project_post_types();
    $existing = [];
    foreach ($possible as $pt) {
        if (post_type_exists($pt)) $existing[] = $pt;
    }
    // fallback: none found => avoid breaking
    return $existing ?: ['post'];
}

// -----------------------------
// 6) Helper: query related projects
// -----------------------------
function sbtech_get_developer_projects($developer_id, $limit = 6) {
    $pts = sbtech_get_project_post_types_existing();

    return get_posts([
        'post_type' => $pts,
        'post_status' => 'publish',
        'numberposts' => $limit,
        'meta_key' => SBTECH_PROJECT_META_DEVELOPER_ID,
        'meta_value' => (int) $developer_id,
        'orderby' => 'date',
        'order' => 'DESC',
    ]);
}

function sbtech_get_developer_projects_count($developer_id) {
    $pts = sbtech_get_project_post_types_existing();

    $q = new WP_Query([
        'post_type' => $pts,
        'post_status' => 'publish',
        'posts_per_page' => 1,
        'fields' => 'ids',
        'meta_key' => SBTECH_PROJECT_META_DEVELOPER_ID,
        'meta_value' => (int) $developer_id,
    ]);

    return (int) $q->found_posts;
}

// -----------------------------
// 7) Helper: get developer areas/districts from related projects
// - If taxonomy exists on projects -> collect unique terms
// - Else fallback (no areas)
// -----------------------------
function sbtech_get_area_taxonomy_existing() {
    foreach (sbtech_get_possible_area_taxonomies() as $tax) {
        if (taxonomy_exists($tax)) return $tax;
    }
    return '';
}

function sbtech_get_developer_areas_terms($developer_id, $limit = 2) {
    $tax = sbtech_get_area_taxonomy_existing();
    if (!$tax) return [];

    $projects = sbtech_get_developer_projects($developer_id, 200);
    if (!$projects) return [];

    $all = [];
    foreach ($projects as $p) {
        $terms = wp_get_post_terms($p->ID, $tax);
        if (is_wp_error($terms) || empty($terms)) continue;

        foreach ($terms as $t) {
            $all[$t->term_id] = $t;
        }
    }

    $terms = array_values($all);
    return array_slice($terms, 0, $limit);
}

// -----------------------------
// 8) Helper: agents (optional)
// -----------------------------
function sbtech_get_agent_post_type_existing() {
    foreach (sbtech_get_possible_agent_post_types() as $pt) {
        if (post_type_exists($pt)) return $pt;
    }
    return '';
}

function sbtech_get_developer_agents($developer_id, $limit = 3) {
    $pt = sbtech_get_agent_post_type_existing();
    if (!$pt) return [];

    return get_posts([
        'post_type' => $pt,
        'post_status' => 'publish',
        'numberposts' => $limit,
        'meta_key' => SBTECH_AGENT_META_DEVELOPER_ID,
        'meta_value' => (int) $developer_id,
        'orderby' => 'date',
        'order' => 'DESC',
    ]);
}
