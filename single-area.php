<?php get_header(); ?>


<!-- single page ares hero start -->
<section class="new_projects_area_hero">
    <div class="new_projects_container">
        <div class="new_projects_area_banner">

            <div class="new_projects_area_left">
                <div class="new_projects_area_kicker">
                    <span class="new_projects_area_dot" aria-hidden="true"></span>
                    Featured Area
                </div>

                <h1 class="new_projects_area_title">
                    Properties for Sale<br>in Dubai Marina
                </h1>

                <p class="new_projects_area_sub">
                    Clean, fast, and mobile-first layout. Filter listings, view details, and enquire in seconds.
                </p>

                <div class="new_projects_area_actions">
                    <a class="sell-cta-btn" id="sellOpenModal" class="new_projects_area_btn new_projects_area_btn_primary" href="#">
                        Find Property
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M5 12h14M13 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>


                </div>
            </div>

            <div class="new_projects_area_right" style="background-image:url('<?php echo get_the_post_thumbnail_url(); ?>'); 
            background-size:cover; background-position:center; background-repeat:no-repeat;" aria-label="Area image"></div>

        </div>
    </div>
</section>

<!-- form start-->
<div class="sell-modal" id="sellModal" aria-hidden="true">
    <div class="sell-modal__backdrop" data-sell-close="1"></div>

    <div class="sell-modal__dialog" role="dialog" aria-modal="true" aria-label="List your property form">
        <button class="sell-modal__close" type="button" aria-label="Close" data-sell-close="1">✕</button>

        <div class="sell-modal__grid">
            <!-- LEFT: form -->
            <div class="sell-modal__left">
                <h3 class="sell-modal__title">List your property with <span>Metropolitan</span></h3>

                <form class="sell-form" action="#" method="post">
                    <label class="<!-- SELL MODAL CONTACT FORM (Pro) | Prefix: sell- | Button -> Modal with animatsell-field">
                        <span class="sell-label">Full Name<span class="sell-req">*</span></span>
                        <input class="sell-input" type="text" name="full_name" required placeholder="Your full name">
                    </label>

                    <label class="sell-field">
                        <span class="sell-label">E-Mail<span class="sell-req">*</span></span>
                        <input class="sell-input" type="email" name="email" required placeholder="name@email.com">
                    </label>

                    <label class="sell-field">
                        <span class="sell-label">Phone<span class="sell-req">*</span></span>
                        <div class="sell-phone">
                            <select class="sell-select" name="country_code" aria-label="Country code">
                                <option value="+971">🇦🇪 +971</option>
                                <option value="+880" selected>🇧🇩 +880</option>
                                <option value="+91">🇮🇳 +91</option>
                                <option value="+1">🇺🇸 +1</option>
                                <option value="+44">🇬🇧 +44</option>
                            </select>
                            <input class="sell-input sell-input--phone" type="tel" name="phone" required placeholder="1812-345678">
                        </div>
                    </label>

                    <label class="sell-field">
                        <span class="sell-label">Message</span>
                        <textarea class="sell-textarea" name="message" rows="4"
                            placeholder="Tell us about your property; location, size, price..."></textarea>
                    </label>

                    <label class="sell-check">
                        <input type="checkbox" name="offers">
                        <span>I agree to receive information about offers, deals and services from this website (optional).</span>
                    </label>

                    <button class="sell-submit" type="submit">Get In Touch</button>

                    <p class="sell-legal">
                        By clicking the submit button, I accept and provide my personal information,
                        and agree to the Metropolitan Group <a href="#">Privacy Policy</a>, applicable data
                        protection laws, and <a href="#">Terms of Use</a>.
                    </p>
                </form>
            </div>

            <!-- RIGHT: image -->
            <div class="sell-modal__right" aria-hidden="true">
                <div class="sell-agent">
                    <img class="sell-agent__img"
                        src="https://images.unsplash.com/photo-1551836022-deb4988cc6c0?auto=format&fit=crop&w=1200&q=80"
                        alt="">
                    <div class="sell-agent__shape"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- form end-->
<!-- single page ares hero end -->


<!-- Office for sate start -->
<section class="np-wrap np-sec">
    <div class="np-container">

        <div class="np-head">
            <h2 class="np-title">Offices for Sale</h2>
            <div class="np-nav">
                <button class="np-btn" id="npPrev">‹</button>
                <button class="np-btn" id="npNext">›</button>
            </div>
        </div>

        <div class="np-slider">
            <div class="np-track" id="npTrack">
                <!-- loop wp for new-projects -->
                <?php
                $area_id = get_queried_object_id(); // current area post ID

                $q_new_projects = new WP_Query([
                    'post_type'      => 'porpertypi',
                    'posts_per_page' => 12,
                    'post_status'    => 'publish',
                    'orderby'        => 'date',
                    'order'          => 'DESC',

                    'meta_query' => [[
                        'key'     => '_area_id',   // porpertypi তে save করা area relation meta key
                        'value'   => $area_id,
                        'compare' => '='
                    ]],
                ]);
                ?>
                <!-- Card -->
                <?php



                while ($q_new_projects->have_posts()) : $q_new_projects->the_post();

                    $purpose = get_post_meta(get_the_ID(), 'pp_purpose', true);
                    $status = get_post_meta(get_the_ID(), 'pp_status', true);
                    $price = get_post_meta(get_the_ID(), '_re_price', true);
                    $beds = get_post_meta(get_the_ID(), '_re_beds', true);
                    $baths = get_post_meta(get_the_ID(), '_re_baths', true);
                    $size = get_post_meta(get_the_ID(), '_re_size_sqft', true);
                    $location = get_post_meta(get_the_ID(), 'pp_address', true);


                ?>
                    <div class="np-card">
                        <div class="np-img bg-cover" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>);">
                            <div class="np-badges">
                                <?php if (!empty($status)) :  ?>
                                    <span class="np-badge primary"><?php echo $status; ?></span>
                                <?php endif; ?>

                                <?php if (!empty($purpose)) :  ?>
                                    <span class="np-badge"><?php echo $purpose; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="np-body">
                            <div class="np-price"><?php echo $price; ?> AED</div>
                            <div class="np-specs"><?php echo $baths; ?> Bath • <?php echo $size; ?> ft²</div>
                            <div class="np-name"><?php the_title(); ?></div>
                            <div class="np-loc"><?php echo $location; ?></div>
                            <div class="np-agent">
                                <div class="np-avatar"><?php echo get_avatar(get_the_author_meta('ID')); ?></div>
                                <div>
                                    <small>Listing by</small><br>
                                    <strong><?php echo get_the_author_meta('display_name', get_the_author_meta("ID")); ?></strong>
                                </div>
                            </div>
                            <div class="np-cta"><button><a href="<?php the_permalink(); ?>">Enquire Now</a></button></div>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </div>
        </div>

    </div>
</section>
<!-- Office for sate end -->


<!-- Newsletter section start -->
<section class="rent-newsletter" aria-label="rent newsletter">
    <div class="rent-container">
        <div class="rent-newsletter__box">
            <div class="rent-newsletter__left">
                <h3 class="rent-newsletter__title">Our newsletter</h3>
                <p class="rent-newsletter__sub">Sign up for weekly market updates, new rentals, and area insights.</p>
            </div>

            <form class="rent-newsletter__form" action="#" method="post">
                <label class="rent-newsletter__field" aria-label="Name">
                    <input class="rent-newsletter__input" type="text" name="name" placeholder="Enter your Name*" required />
                </label>

                <label class="rent-newsletter__field" aria-label="Email">
                    <input class="rent-newsletter__input" type="email" name="email" placeholder="Enter your E-mail*" required />
                </label>

                <button class="rent-newsletter__btn" type="submit">
                    <span>SUBSCRIBE</span>
                    <svg class="rent-newsletter__icon" viewBox="0 0 24 24" width="18" height="18" aria-hidden="true">
                        <path d="M4 8l8 5 8-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                        <path d="M4 8v10h16V8" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</section>
<!-- Newsletter section end -->




<?php get_footer();
