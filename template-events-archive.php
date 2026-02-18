<?php

/**
 * Template Name: Events Archive
 */
if (!defined('ABSPATH')) exit;

get_header();

$page_id = get_the_ID();

// Banner meta (stored on this Page)
$banner_image_id = (int) get_post_meta($page_id, '_sbtech_ea_banner_image_id', true);
$banner_title    = (string) get_post_meta($page_id, '_sbtech_ea_banner_title', true);
$banner_subtitle = (string) get_post_meta($page_id, '_sbtech_ea_banner_subtitle', true);
$button_text     = (string) get_post_meta($page_id, '_sbtech_ea_button_text', true);
$button_url      = (string) get_post_meta($page_id, '_sbtech_ea_button_url', true);

$banner_image = $banner_image_id ? wp_get_attachment_image_url($banner_image_id, 'full') : '';

/**
 * Date formatter:
 * Required output like your screenshot:
 *  - "7–9 November"
 *  - "19–20 September"
 *  - "July 4–5" (we will standardize to "4–5 July" for consistency, but you can swap if needed)
 *  - "May 30–31" (we will standardize to "30–31 May")
 */
if (!function_exists('sbtech_format_event_range')) {
    function sbtech_format_event_range($start, $end) {
        $start = trim((string) $start);
        $end   = trim((string) $end);

        if (!$start && !$end) return '';
        if ($start && !$end) $end = $start;

        $start_ts = strtotime($start);
        $end_ts   = strtotime($end);

        if (!$start_ts || !$end_ts) return '';

        $same_year  = (date('Y', $start_ts) === date('Y', $end_ts));
        $same_month = (date('m', $start_ts) === date('m', $end_ts));

        // Same month => "7–9 November"
        if ($same_year && $same_month) {
            $d1 = date_i18n('j', $start_ts);
            $d2 = date_i18n('j', $end_ts);
            $m  = date_i18n('F', $start_ts);

            return ($d1 === $d2) ? "{$d1} {$m}" : "{$d1}–{$d2} {$m}";
        }

        // Different month => "30 May – 2 June"
        $s_d = date_i18n('j', $start_ts);
        $s_m = date_i18n('F', $start_ts);

        $e_d = date_i18n('j', $end_ts);
        $e_m = date_i18n('F', $end_ts);

        $left  = "{$s_d} {$s_m}";
        $right = "{$e_d} {$e_m}";

        return ($left === $right) ? $left : "{$left} – {$right}";
    }
}

/**
 * Past events query:
 * End date < today => Past
 * If no end_date set, fallback to start_date
 */
$today = date('Y-m-d');

$args = [
    'post_type'      => 'event',
    'posts_per_page' => 12,
    'post_status'    => 'publish',
    'meta_key'       => '_sbtech_event_start_date',
    'orderby'        => 'meta_value',
    'order'          => 'DESC',
];

$q = new WP_Query($args);
?>

<main class="sbtech-events-archive">

    <!-- HERO -->
    <section class="sbtech-events-hero" style="background-image:url('https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=1600&q=70');">
        <div class="sbtech-events-hero__overlay"></div>

        <div class="sbtech-events-hero__inner">

            <?php if ($banner_title): ?>
                <h1 class="sbtech-events-hero__title"><?php echo esc_html($banner_title); ?></h1>
            <?php else: ?>
                <h1 class="sbtech-events-hero__title"><?php echo esc_html(get_the_title()); ?></h1>
            <?php endif; ?>

            <?php if ($banner_subtitle): ?>
                <p class="sbtech-events-hero__subtitle"><?php echo esc_html($banner_subtitle); ?></p>
            <?php endif; ?>

            <?php if ($button_text && $button_url): ?>
                <a class="sbtech-events-hero__btn" href="<?php echo esc_url($button_url); ?>">
                    <?php echo esc_html($button_text); ?>
                </a>
            <?php endif; ?>

        </div>
    </section>

    <!-- PAST EVENTS -->
    <section class="sbtech-events-list">
        <div class="sbtech-events-container">
            <h2 class="sbtech-events-heading">Past Events</h2>

                    <?php if ($q->have_posts()): ?>
                    <div class="sbtech-events-grid">
                        <?php while ($q->have_posts()): $q->the_post();

                        $event_id = get_the_ID();
                        $thumb    = get_the_post_thumbnail_url($event_id, 'large');

                        $location_tag = (string) get_post_meta($event_id, '_sbtech_event_location_tag', true);
                        $start_date   = (string) get_post_meta($event_id, '_sbtech_event_start_date', true);
                        $end_date     = (string) get_post_meta($event_id, '_sbtech_event_end_date', true);
                        $venue        = (string) get_post_meta($event_id, '_sbtech_event_venue', true);
                        $btn_text     = (string) get_post_meta($event_id, '_sbtech_event_btn_text', true);
                        $btn_url      = (string) get_post_meta($event_id, '_sbtech_event_btn_url', true);

                        $date_line = sbtech_format_event_range($start_date, $end_date);

                        $single_event_id = (int) get_post_meta($event_id, '_sbtech_event_single_event_id', true);

                        if ($single_event_id) {
                            $card_link = get_permalink($single_event_id);
                        } else {
                            // If single_event is linked, open that page on "See it"
$single_event_id = (int) get_post_meta($event_id, '_sbtech_event_single_event_id', true);

if ($single_event_id) {
  $card_link = get_permalink($single_event_id);
} else {
  $card_link = $btn_url ? $btn_url : get_permalink($event_id);
}
                        }

                        // Default text
                        $btn_text = $btn_text ? $btn_text : 'See how it was';
                        ?>

                        <article class="sbtech-event-card">
                            <a class="sbtech-event-card__media" href="<?php echo esc_url($card_link); ?>">
                                <?php if ($thumb): ?>
                                    <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                                <?php else: ?>
                                    <div class="sbtech-event-card__placeholder"></div>
                                <?php endif; ?>

                                <?php if ($location_tag): ?>
                                    <span class="sbtech-event-card__tag"><?php echo esc_html($location_tag); ?></span>
                                <?php endif; ?>
                            </a>

                            <div class="sbtech-event-card__body">
                                <h3 class="sbtech-event-card__title">
                                    <a href="<?php echo esc_url($card_link); ?>"><?php the_title(); ?></a>
                                </h3>

                                <?php if ($date_line): ?>
                                    <div class="sbtech-event-card__date"><?php echo esc_html($date_line); ?></div>
                                <?php endif; ?>

                                <?php if ($venue): ?>
                                    <div class="sbtech-event-card__venue"><?php echo esc_html($venue); ?></div>
                                <?php endif; ?>

                                <a class="sbtech-event-card__btn" href="<?php echo esc_url($card_link); ?>">
                                    <?php echo esc_html($btn_text); ?>
                                </a>
                            </div>
                        </article>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                </div>

            <?php else: ?>
                <div class="sbtech-events-empty">
                    No past events found.
                </div>
            <?php endif; ?>
        </div>
    </section>

</main>

<?php get_footer(); ?>