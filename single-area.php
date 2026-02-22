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
<section class="rent-faqs" aria-label="rent faq">
    <div class="rent-container">

        <div class="rent-faqs__wrap" id="rentFaq">
            <?php
            $faqs = get_post_meta(get_the_ID(), 'area_faqs', true);

            if (!empty($faqs) && is_array($faqs)) :
            ?>
                <div class="area-faq">
                    <?php foreach ($faqs as $faq) : ?>
                        <div class="faq-item">
                            <h4><?php echo esc_html($faq['question']); ?></h4>
                            <p><?php echo esc_html($faq['answer']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="rent-faq" data-open="true">
                    <button class="rent-faq__q" type="button" aria-expanded="true">
                        <?php echo esc_html($faq['question']); ?>
                        <span class="rent-faq__icon" aria-hidden="true"></span>
                    </button>
                    <div class="rent-faq__a" role="region">
                        <div class="rent-faq__aInner">
                            <?php echo esc_html($faq['answer']); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- Faq section end -->



<!-- Newsletter section start -->
<?php echo do_shortcode('[newsletter_form]'); ?>
<!-- Newsletter section end -->
<?php get_footer();
