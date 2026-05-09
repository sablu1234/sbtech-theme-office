<?php

use Kirki\Field\Image;

if (is_single()) : ?>

    <?php
    $_re_price = get_post_meta(get_the_ID(), '_re_price', true);
    $_re_size_sqft = get_post_meta(get_the_ID(), '_re_size_sqft', true);
    $_re_beds = get_post_meta(get_the_ID(), '_re_beds', true);
    $_re_baths = get_post_meta(get_the_ID(), '_re_baths', true);
    $parking = get_post_meta(get_the_ID(), 'parking', true);
    $unit_reference = get_post_meta(get_the_ID(), 'unit_reference', true);
    ?>
    <div class="mp-wrap">
        <section class="mp-media" aria-label="Property media">
            <?php echo do_shortcode('[single_page_shortcode]'); ?>
        </section>

        <div class="mp-grid">

            <!-- LEFT -->
            <main class="mp-main">

                <!-- HEADER -->
                <section class="mp-head">
                    <h1 class="mp-title"><?php the_title(); ?></h1>

                    <div class="mp-priceRow">
                        <div>
                            <div class="mp-price" id="mpPrice"><?php echo number_format((float)$_re_price, 0); ?> AED</div>

                            <?php
                            if ($_re_price > 0 && $_re_size_sqft > 0) {
                                $per_square_price = $_re_price / $_re_size_sqft;
                            } else {
                                $per_square_price = 0;
                            }

                            $per_square_price_rounded = round($per_square_price, 0);
                            ?>

                            <div class="mp-subprice" id="subprice"><?php echo number_format($per_square_price_rounded, 0); ?> AED per ft²</div>
                        </div>

                        <div class="mp-pill">
                            <span>Payout Currency</span>

                            <form action="">
                                <select class="mp-select" id="mpCurrency" aria-label="Payout currency">
                                    <option value="AED" selected>AED</option>
                                    <option value="USD">USD</option>
                                    <option value="EUR">EUR</option>
                                </select>
                            </form>
                        </div>
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', async function () {
                            const currencySelect = document.getElementById('mpCurrency');
                            const priceEl = document.getElementById('mpPrice');
                            const subpriceEl = document.getElementById('subprice');

                            const basePriceAED = <?php echo (float) $_re_price; ?>;
                            const perSquarePriceAED = <?php echo (float) $per_square_price_rounded; ?>;

                            let exchangeRates = {
                                AED: 1,
                                USD: null,
                                EUR: null
                            };

                            function formatPrice(amount) {
                                return new Intl.NumberFormat('en-US', {
                                    minimumFractionDigits: 0,
                                    maximumFractionDigits: 0
                                }).format(amount);
                            }

                            function updatePrices(currency) {
                                let convertedMainPrice = basePriceAED;
                                let convertedPerSqft = perSquarePriceAED;

                                if (currency !== 'AED' && exchangeRates[currency]) {
                                    convertedMainPrice = basePriceAED * exchangeRates[currency];
                                    convertedPerSqft = perSquarePriceAED * exchangeRates[currency];
                                }

                                priceEl.textContent = `${formatPrice(convertedMainPrice)} ${currency}`;
                                subpriceEl.textContent = `${formatPrice(convertedPerSqft)} ${currency} per ft²`;
                            }

                            async function loadRates() {
                                try {
                                    const response = await fetch('https://v6.exchangerate-api.com/v6/9efd8f74f342da8c3e35b705/latest/AED');
                                    const data = await response.json();

                                    if (data && data.result === 'success' && data.conversion_rates) {
                                        exchangeRates.AED = 1;
                                        exchangeRates.USD = data.conversion_rates.USD;
                                        exchangeRates.EUR = data.conversion_rates.EUR;
                                    } else {
                                        console.error('Invalid exchange rate API response:', data);
                                    }
                                } catch (error) {
                                    console.error('Currency rate load failed:', error);
                                }
                            }

                            await loadRates();

                            currencySelect.addEventListener('change', function () {
                                updatePrices(this.value);
                            });

                            updatePrices(currencySelect.value);
                        });
                    </script>

                    <div class="mp-stats">
                        <div class="mp-stat"><span class="mp-stat__n"><?php echo $_re_beds ?></span><span class="mp-stat__t">Bedrooms</span></div>
                        <div class="mp-stat"><span class="mp-stat__n"><?php echo $_re_baths ?></span><span class="mp-stat__t">Baths</span></div>
                        <div class="mp-stat"><span class="mp-stat__n"><?php echo $_re_size_sqft ?></span><span class="mp-stat__t">Sq. ft</span></div>
                        <div class="mp-stat"><span class="mp-stat__n"><?php echo $parking ?></span><span class="mp-stat__t">Parking</span></div>
                    </div>
                </section>

                <!-- OVERVIEW -->
                <section class="mp-card">
                    <h2 class="mp-h2">Overview</h2>
                    <p class="mp-text">
                        <?php the_content(); ?>
                    </p>
                    <div class="mp-split">
                        <div>
                            <?php
                            $pp_unit_reference = get_post_meta(get_the_ID(), 'pp_unit_reference', true);
                            $pp_purpose = get_post_meta(get_the_ID(), 'pp_purpose', true);
                            $pp_status = get_post_meta(get_the_ID(), 'pp_status', true);
                            $pp_emirate = get_post_meta(get_the_ID(), 'pp_emirate', true);
                            $pp_property_name = get_post_meta(get_the_ID(), 'pp_property_name', true);
                            $pp_parking_slot = get_post_meta(get_the_ID(), 'pp_parking_slot', true);
                            $pp_added_on = get_post_meta(get_the_ID(), 'pp_added_on', true);
                            ?>
                            <h3 class="mp-h3">Property Details</h3>
                            <ul class="mp-list">
                                <?php if (!empty($pp_unit_reference)) : ?>
                                    <li><strong>Unit Reference:</strong> <?php echo $pp_unit_reference; ?> </li>
                                <?php endif; ?>

                                <?php if (!empty($pp_purpose)) : ?>
                                    <li><strong>Purpose:</strong> <?php echo $pp_purpose; ?></li>
                                <?php endif; ?>

                                <?php if (!empty($pp_status)) : ?>
                                    <li><strong>Status:</strong> <?php echo $pp_status; ?></li>
                                <?php endif; ?>

                                <?php if (!empty($pp_emirate)) : ?>
                                    <li><strong>Emirate:</strong> <?php echo $pp_emirate; ?></li>
                                <?php endif; ?>
                            </ul>
                        </div>

                        <div>
                            <ul class="mp-list">
                                <?php if (!empty($pp_property_name)) : ?>
                                    <li><strong>Property Name:</strong> <?php echo $pp_property_name; ?></li>
                                <?php endif; ?>

                                <?php if (!empty($pp_parking_slot)) : ?>
                                    <li><strong>Parking Slot:</strong> <?php echo $pp_parking_slot; ?></li>
                                <?php endif; ?>

                                <?php if (!empty($pp_added_on)) : ?>
                                    <li><strong>Added On:</strong> <?php echo $pp_added_on; ?></li>
                                <?php endif; ?>
                            </ul>
                        </div>

                        <div>
                            <?php
                            $img_id = (int) get_post_meta(get_the_ID(), '_porpertypi_qr_img_id', true);

                            if ($img_id) {
                                echo wp_get_attachment_image($img_id, 'medium', false, [
                                    'style' => 'max-width:150px;height:auto;'
                                ]);
                            }
                            ?>
                        </div>
                    </div>
                </section>

                <!-- AMENITIES -->
                <section class="mp-card" id="amenities">
                    <h2 class="mp-h2">Features and Amenities</h2>
                    <div class="mp-amenGrid">
                        <div class="mp-amen">
                            <h3 class="mp-h3">Indoor</h3>
                            <?php
                            $indor_1 = get_post_meta(get_the_ID(), 'indor_1', true);
                            $indor_2 = get_post_meta(get_the_ID(), 'indor_2', true);
                            $indor_3 = get_post_meta(get_the_ID(), 'indor_3', true);
                            $indor_4 = get_post_meta(get_the_ID(), 'indor_4', true);
                            $indor_5 = get_post_meta(get_the_ID(), 'indor_5', true);
                            $indor_6 = get_post_meta(get_the_ID(), 'indor_6', true);
                            $indor_7 = get_post_meta(get_the_ID(), 'indor_7', true);
                            $indor_8 = get_post_meta(get_the_ID(), 'indor_8', true);
                            ?>
                            <ul class="mp-list">
                                <?php if (!empty($indor_1)) : ?>
                                    <li><?php echo $indor_1; ?></li>
                                <?php endif; ?>

                                <?php if (!empty($indor_2)) : ?>
                                    <li><?php echo $indor_2; ?></li>
                                <?php endif; ?>

                                <?php if (!empty($indor_3)) : ?>
                                    <li><?php echo $indor_3; ?></li>
                                <?php endif; ?>

                                <?php if (!empty($indor_4)) : ?>
                                    <li><?php echo $indor_4; ?></li>
                                <?php endif; ?>

                                <?php if (!empty($indor_5)) : ?>
                                    <li><?php echo $indor_5; ?></li>
                                <?php endif; ?>

                                <?php if (!empty($indor_6)) : ?>
                                    <li><?php echo $indor_6; ?></li>
                                <?php endif; ?>

                                <?php if (!empty($indor_7)) : ?>
                                    <li><?php echo $indor_7; ?></li>
                                <?php endif; ?>

                                <?php if (!empty($indor_8)) : ?>
                                    <li><?php echo $indor_8; ?></li>
                                <?php endif; ?>
                            </ul>
                        </div>

                        <div class="mp-amen">
                            <h3 class="mp-h3">Outdoor</h3>
                            <?php
                            $outdoor_1 = get_post_meta(get_the_ID(), 'outdoor_1', true);
                            $outdoor_2 = get_post_meta(get_the_ID(), 'outdoor_2', true);
                            $outdoor_3 = get_post_meta(get_the_ID(), 'outdoor_3', true);
                            $outdoor_4 = get_post_meta(get_the_ID(), 'outdoor_4', true);
                            $outdoor_5 = get_post_meta(get_the_ID(), 'outdoor_5', true);
                            $outdoor_6 = get_post_meta(get_the_ID(), 'outdoor_6', true);
                            $outdoor_7 = get_post_meta(get_the_ID(), 'outdoor_7', true);
                            $outdoor_8 = get_post_meta(get_the_ID(), 'outdoor_8', true);
                            $outdoor_9 = get_post_meta(get_the_ID(), 'outdoor_9', true);
                            $outdoor_10 = get_post_meta(get_the_ID(), 'outdoor_10', true);
                            ?>
                            <ul class="mp-list">
                                <?php if (!empty($outdoor_1)) : ?>
                                    <li><?php echo $outdoor_1; ?></li>
                                <?php endif; ?>

                                <?php if (!empty($outdoor_2)) : ?>
                                    <li><?php echo $outdoor_2; ?></li>
                                <?php endif; ?>

                                <?php if (!empty($outdoor_3)) : ?>
                                    <li><?php echo $outdoor_3; ?></li>
                                <?php endif; ?>

                                <?php if (!empty($outdoor_4)) : ?>
                                    <li><?php echo $outdoor_4; ?></li>
                                <?php endif; ?>

                                <?php if (!empty($outdoor_5)) : ?>
                                    <li><?php echo $outdoor_5; ?></li>
                                <?php endif; ?>

                                <?php if (!empty($outdoor_6)) : ?>
                                    <li><?php echo $outdoor_6; ?></li>
                                <?php endif; ?>

                                <?php if (!empty($outdoor_7)) : ?>
                                    <li><?php echo $outdoor_7; ?></li>
                                <?php endif; ?>

                                <?php if (!empty($outdoor_8)) : ?>
                                    <li><?php echo $outdoor_8; ?></li>
                                <?php endif; ?>

                                <?php if (!empty($outdoor_9)) : ?>
                                    <li><?php echo $outdoor_9; ?></li>
                                <?php endif; ?>

                                <?php if (!empty($outdoor_10)) : ?>
                                    <li><?php echo $outdoor_10; ?></li>
                                <?php endif; ?>
                            </ul>
                        </div>

                        <div class="mp-amen">
                            <h3 class="mp-h3">Services</h3>
                            <?php
                            $services_1 = get_post_meta(get_the_ID(), 'services_1', true);
                            $services_2 = get_post_meta(get_the_ID(), 'services_2', true);
                            $services_3 = get_post_meta(get_the_ID(), 'services_3', true);
                            $services_4 = get_post_meta(get_the_ID(), 'services_4', true);
                            $services_5 = get_post_meta(get_the_ID(), 'services_5', true);
                            $services_6 = get_post_meta(get_the_ID(), 'services_6', true);
                            $services_7 = get_post_meta(get_the_ID(), 'services_7', true);
                            $services_8 = get_post_meta(get_the_ID(), 'services_8', true);
                            $services_9 = get_post_meta(get_the_ID(), 'services_9', true);
                            $services_10 = get_post_meta(get_the_ID(), 'services_10', true);
                            ?>
                            <ul class="mp-list">
                                <?php if (!empty($services_1)) : ?>
                                    <li><?php echo $services_1; ?></li>
                                <?php endif; ?>

                                <?php if (!empty($services_2)) : ?>
                                    <li><?php echo $services_2; ?></li>
                                <?php endif; ?>

                                <?php if (!empty($services_3)) : ?>
                                    <li><?php echo $services_3; ?></li>
                                <?php endif; ?>

                                <?php if (!empty($services_4)) : ?>
                                    <li><?php echo $services_4; ?></li>
                                <?php endif; ?>

                                <?php if (!empty($services_5)) : ?>
                                    <li><?php echo $services_5; ?></li>
                                <?php endif; ?>

                                <?php if (!empty($services_6)) : ?>
                                    <li><?php echo $services_6; ?></li>
                                <?php endif; ?>

                                <?php if (!empty($services_7)) : ?>
                                    <li><?php echo $services_7; ?></li>
                                <?php endif; ?>

                                <?php if (!empty($services_8)) : ?>
                                    <li><?php echo $services_8; ?></li>
                                <?php endif; ?>

                                <?php if (!empty($services_9)) : ?>
                                    <li><?php echo $services_9; ?></li>
                                <?php endif; ?>

                                <?php if (!empty($services_10)) : ?>
                                    <li><?php echo $services_10; ?></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </section>

                <!-- COMMUNITY -->
                <?php
                $community_description = get_post_meta(get_the_ID(), 'community_description', true);
                if (!empty($community_description)) : ?>
                    <section class="mp-card" id="community">
                        <h2 class="mp-h2">Community Description</h2>
                        <p class="mp-text">
                            <?php echo $community_description; ?>
                        </p>
                    </section>
                <?php endif; ?>

                <!-- MORTGAGE (DYNAMIC) -->
                <section class="mp-card" id="mortgage">
                    <?php echo do_shortcode('[singlePageMortageForm_shortcode]'); ?>
                </section>
                

            </main>

            <!-- RIGHT -->
            <aside class="mp-side">
                <div class="mp-sideCard">
                    <div class="mp-agent">
                        <div class="mp-agent__logo" aria-hidden="true">🏢</div>
                        <div class="mp-agent__meta">
                            <div class="mp-agent__label">Listing by</div>
                            <div class="mp-agent__name">CBA Real Estate</div>
                        </div>
                    </div>
                    <?php
                    $_re_email = get_post_meta($post->ID, '_re_email', true);
                    $_re_whatsapp = get_post_meta($post->ID, '_re_whatsapp', true);
                    ?>
                    <!-- <a class="mp-btn mp-btn--primary mp-btn--full" href="mailto:<?php echo $_re_email; ?>"><?php echo $_re_email; ?></a> -->
                </div>

                <div class="mp-sideCard">
                    <div class="mp-fin d-none">
                        <div class="mp-fin__title">Own this property from just</div>
                        <div class="mp-fin__price" id="mpSideFrom">— <span>/ month</span></div>
                        <div class="mp-fin__note">Fixed rates from: <strong id="mpSideRate">—</strong></div>
                    </div>
                    <a class="mp-btn mp-btn--primary mp-btn--full" href="<?php echo home_url('buy'); ?>">Back TO Property</a>
                </div>

                <?php echo do_shortcode('[property_sidebar_inquiry_safe]'); ?>
                
            </aside>

        </div>
    </div>

    <!-- LIGHTBOX -->
    <div class="mp-lightbox" id="mpLightbox" aria-hidden="true">
        <div class="mp-lightbox__backdrop" data-close="1"></div>
        <div class="mp-lightbox__panel" role="dialog" aria-modal="true" aria-label="Photo viewer">
            <button class="mp-x" type="button" data-close="1" aria-label="Close">✕</button>
            <img id="mpLightboxImg" alt="Large property photo" />
            <div class="mp-lightbox__nav">
                <button class="mp-btn mp-btn--ghost" type="button" data-nav="prev">Prev</button>
                <button class="mp-btn mp-btn--ghost" type="button" data-nav="next">Next</button>
            </div>
        </div>
    </div>

<?php else : ?>

    <div id="post-<?php the_ID(); ?>" <?php post_class('post format-standard-image'); ?>>
        <?php if (has_post_thumbnail()) : ?>
            <div class="entry-media">
                <?php the_post_thumbnail(); ?>
            </div>
        <?php endif; ?>
        <?php echo get_template_part('template-parts/blog/meta') ?>
        <div class="entry-details">
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <?php the_excerpt(); ?>
            <?php echo get_template_part('template-parts/blog/button') ?>
        </div>
    </div>

<?php endif; ?>