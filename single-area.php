<?php get_header(); ?>


<!-- hero area start  -->
<section class="new_projects_area_hero">
    <div class="new_projects_container">
        <div class="new_projects_area_banner">

            <div class="new_projects_area_left">
                <div class="new_projects_area_kicker">
                    <span class="new_projects_area_dot" aria-hidden="true"></span>
                    Featured Area
                </div>

                <h1 class="new_projects_area_title">
                    <?php the_title(); ?>
                </h1>

                <p class="new_projects_area_sub">
                    Clean, fast, and mobile-first layout. Filter listings, view details, and enquire in seconds.
                </p>

                <div class="new_projects_area_actions">
                    <a class="new_projects_area_btn new_projects_area_btn_primary" href="<?php echo esc_url(home_url('/')); ?>">
                        Find Property
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M5 12h14M13 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>

                </div>
            </div>

            <div class="new_projects_area_right" style="background-image:url('<?php echo get_the_post_thumbnail_url(); ?>'); 
            background-size:cover;background-position:center;background-repeat:no-repeat;" aria-label="Area image"></div>

        </div>
    </div>
</section>
<!-- hero area end -->

<!-- about area start -->
<section class="area_single_section">
    <div class="area_single_container">

        <?php if (!empty(get_the_title())): ?>
            <div class="area_single_header">
                <span class="area_single_label">Community Overview</span>
                <h2 class="area_single_title">About <?php the_title(); ?></h2>
            </div>
        <?php endif; ?>

        <?php if (!empty(get_the_content())): ?>
            <div class="area_single_content">
                <p>
                    <?php the_content(); ?>
                </p>
            </div>
        <?php endif; ?>

    </div>
</section>
<!-- about area end -->

<!-- slider start -->
<section class="area_single_slider">
    <?php
    $ids = get_post_meta(get_the_ID(), 'area_gallery', true);
    if (!empty($ids)) : ?>
        <div class="wrap-anywhere" style="height:420px;">
            <div class="box-slider" data-autoplay="true" data-interval="3500">
                <div class="box-slider__viewport">
                    <div class="box-slider__track">
                        <?php
                        $ids = get_post_meta(get_the_ID(), 'area_gallery', true);

                        if ($ids) {
                            foreach (array_filter(array_map('absint', explode(',', $ids))) as $id) {

                        ?>

                                <figure class="box-slide"><img src="<?php echo wp_get_attachment_url($id); ?>" alt=""></figure>
                        <?php
                            }
                        }
                        ?>


                    </div>

                    <button class="box-nav box-prev" type="button" aria-label="Previous"></button>
                    <button class="box-nav box-next" type="button" aria-label="Next"></button>

                    <div class="box-dots" aria-label="Pagination"></div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</section>
<script>
    (() => {
        const root = document.querySelector(".box-slider");
        if (!root) return;

        const track = root.querySelector(".box-slider__track");
        const slides = Array.from(root.querySelectorAll(".box-slide"));
        const prevBtn = root.querySelector(".box-prev");
        const nextBtn = root.querySelector(".box-next");
        const dotsWrap = root.querySelector(".box-dots");

        const autoplay = root.dataset.autoplay === "true";
        const interval = parseInt(root.dataset.interval || "3500", 10);

        let index = 0,
            timer = null,
            hover = false;

        // build dots
        slides.forEach((_, i) => {
            const b = document.createElement("button");
            b.type = "button";
            b.className = "box-dot" + (i === 0 ? " is-active" : "");
            b.setAttribute("aria-label", "Go to slide " + (i + 1));
            b.addEventListener("click", () => goTo(i, true));
            dotsWrap.appendChild(b);
        });

        const dots = Array.from(root.querySelectorAll(".box-dot"));
        const setDot = (i) => dots.forEach((d, di) => d.classList.toggle("is-active", di === i));

        function goTo(i, fromUser = false) {
            index = (i + slides.length) % slides.length;
            track.style.transform = `translateX(-${index * 100}%)`;
            setDot(index);
            if (fromUser) restart();
        }

        const next = () => goTo(index + 1);
        const prev = () => goTo(index - 1);

        prevBtn.addEventListener("click", () => {
            prev();
            restart();
        });
        nextBtn.addEventListener("click", () => {
            next();
            restart();
        });

        // hover pause
        root.addEventListener("mouseenter", () => {
            hover = true;
            stop();
        });
        root.addEventListener("mouseleave", () => {
            hover = false;
            start();
        });

        // touch swipe
        let sx = 0,
            dx = 0,
            dragging = false;
        root.addEventListener("touchstart", (e) => {
            dragging = true;
            sx = e.touches[0].clientX;
            dx = 0;
            stop();
        }, {
            passive: true
        });
        root.addEventListener("touchmove", (e) => {
            if (!dragging) return;
            dx = e.touches[0].clientX - sx;
        }, {
            passive: true
        });
        root.addEventListener("touchend", () => {
            dragging = false;
            if (Math.abs(dx) > 50) {
                dx < 0 ? next() : prev();
                restart();
            } else start();
        });

        function start() {
            if (!autoplay || hover) return;
            stop();
            timer = setInterval(next, interval);
        }

        function stop() {
            if (timer) {
                clearInterval(timer);
                timer = null;
            }
        }

        function restart() {
            stop();
            start();
        }

        goTo(0);
        start();

        document.addEventListener("visibilitychange", () => document.hidden ? stop() : start());
    })();
</script>
<!-- slider end -->

<!-- Faq section start -->
<?php
$faqs = get_post_meta(get_the_ID(), 'area_faqs', true);
if (!empty($faqs)): ?>
    <section class="area_faq_section">
        <div class="area_faq_container">

            <div class="area_faq_header d-none">
                <div>
                    <h2 class="area_faq_title">Frequently Asked Questions</h2>
                    <p class="area_faq_subtitle">Answers based on your selected area details.</p>
                </div>
            </div>

            <?php
            $faqs = get_post_meta(get_the_ID(), 'area_faqs', true);
            $has_valid = false;

            if (!empty($faqs) && is_array($faqs)) {
                foreach ($faqs as $f) {
                    $q = isset($f['question']) ? trim($f['question']) : '';
                    $a = isset($f['answer']) ? trim($f['answer']) : '';
                    if ($q !== '' && $a !== '') {
                        $has_valid = true;
                        break;
                    }
                }
            }

            if ($has_valid) :
            ?>

                <div class="acc_list" id="accFAQ">
                    <?php
                    $i = 1;
                    foreach ($faqs as $faq) :

                        $question = isset($faq['question']) ? trim($faq['question']) : '';
                        $answer   = isset($faq['answer']) ? trim($faq['answer']) : '';

                        if ($question === '' || $answer === '') continue;

                        $is_open = ($i === 1) ? ' is-open' : '';
                        $aria    = ($i === 1) ? 'true' : 'false';
                        $path_d  = ($i === 1) ? 'M6 12H18' : 'M12 6V18M6 12H18';
                    ?>

                        <div class="acc_item<?php echo esc_attr($is_open); ?>">
                            <button class="acc_btn" type="button" aria-expanded="<?php echo esc_attr($aria); ?>">
                                <h3 class="acc_title"><?php echo esc_html($i . '. ' . $question); ?></h3>

                                <span class="acc_icon" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" fill="none">
                                        <path d="<?php echo esc_attr($path_d); ?>" stroke-width="2.6" stroke-linecap="round"></path>
                                    </svg>
                                </span>
                            </button>

                            <div class="acc_panel">
                                <div class="acc_content">
                                    <?php echo wp_kses_post(wpautop($answer)); ?>
                                </div>
                            </div>
                        </div>

                    <?php
                        $i++;
                    endforeach;
                    ?>
                </div>

            <?php else : ?>

                <div class="area_faq_empty">
                    <h4>No FAQs Found</h4>
                    <p>Please add FAQs from the Area post editor (Question + Answer).</p>
                </div>

            <?php endif; ?>

        </div>
    </section>
<?php endif; ?>
<script>
    (function() {
        const acc = document.getElementById('accFAQ');
        if (!acc) return;

        acc.addEventListener('click', (e) => {
            const btn = e.target.closest('.acc_btn');
            if (!btn) return;

            const item = btn.closest('.acc_item');
            const isOpen = item.classList.contains('is-open');

            // ✅ Single open at a time
            acc.querySelectorAll('.acc_item').forEach(i => {
                i.classList.remove('is-open');
                const b = i.querySelector('.acc_btn');
                if (b) b.setAttribute('aria-expanded', 'false');
                const path = i.querySelector('.acc_icon svg path');
                if (path) path.setAttribute('d', 'M12 6V18M6 12H18'); // plus
            });

            if (!isOpen) {
                item.classList.add('is-open');
                btn.setAttribute('aria-expanded', 'true');
                const path = item.querySelector('.acc_icon svg path');
                if (path) path.setAttribute('d', 'M6 12H18'); // minus
            }
        });
    })();
</script>
<!-- Faq section end -->

<!-- Newsletter section start -->
<?php echo do_shortcode('[newsletter_form]'); ?>
<!-- Newsletter section end -->
<?php get_footer();
