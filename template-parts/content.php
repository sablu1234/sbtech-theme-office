<?php

use Kirki\Field\Image;

if (is_single()) : ?>

    <?php
    $post_id = get_the_ID();

    $_re_price = get_post_meta($post_id, '_re_price', true);

    $_re_size_sqft = get_post_meta($post_id, '_re_size_sqft', true);
    if (empty($_re_size_sqft)) {
        $_re_size_sqft = get_post_meta($post_id, 'spec_size_sqft', true);
    }

    $_re_beds = get_post_meta($post_id, '_re_beds', true);
    if (empty($_re_beds)) {
        $_re_beds = get_post_meta($post_id, 'spec_rooms', true);
    }

    $_re_baths = get_post_meta($post_id, '_re_baths', true);
    if (empty($_re_baths)) {
        $_re_baths = get_post_meta($post_id, 'spec_bathrooms', true);
    }

    $parking = get_post_meta($post_id, 'parking', true);
    $unit_reference = get_post_meta($post_id, 'unit_reference', true);

    $pp_address = get_post_meta($post_id, 'pp_address', true);
    $pp_area = get_post_meta($post_id, 'pp_area', true);
    $pp_property_name = get_post_meta($post_id, 'pp_property_name', true);
    $pp_unit_reference = get_post_meta($post_id, 'pp_unit_reference', true);
    $pp_purpose = get_post_meta($post_id, 'pp_purpose', true);
    $pp_status = get_post_meta($post_id, 'pp_status', true);
    $pp_emirate = get_post_meta($post_id, 'pp_emirate', true);
    $pp_parking_slot = get_post_meta($post_id, 'pp_parking_slot', true);
    $pp_added_on = get_post_meta($post_id, 'pp_added_on', true);
    $pp_expired_date = get_post_meta($post_id, 'pp_expired_date', true);
    $pp_offering_type = get_post_meta($post_id, '_reaf_offering_type', true);
    $pp_offering_type = get_post_meta($post_id, 'pp_offering_type', true);
    if (empty($pp_offering_type)) {
        $pp_offering_type = get_post_meta($post_id, '_reaf_offering_type', true);
    }

    $pp_property_category = get_post_meta($post_id, '_property_category_prod', true);
    if (empty($pp_property_category)) {
        $pp_property_category = get_post_meta($post_id, 'pp_property_category', true);
    }

    $pp_property_type = get_post_meta($post_id, 'pp_property_type', true);
    $pp_property_type_res = get_post_meta($post_id, '_property_type_res', true);
    $pp_property_type_com = get_post_meta($post_id, '_property_type_com', true);

    if (empty($pp_property_type)) {
        $pp_property_type = $pp_property_category === 'Commercial'
            ? $pp_property_type_com
            : $pp_property_type_res;
    }

    $pp_rental_period = get_post_meta($post_id, '_reaf_rental_period', true);
    $pp_furnishing = get_post_meta($post_id, 'spec_furnishing_type', true);
    $pp_floor_number = get_post_meta($post_id, 'spec_floor_number', true);
    $pp_project_status = get_post_meta($post_id, 'spec_project_status', true);
    $pp_parking_spaces = get_post_meta($post_id, 'spec_parking_spaces', true);
    $pp_property_age = get_post_meta($post_id, 'spec_property_age', true);
    $developer_id = get_post_meta($post_id, 'spec_developer_id', true);
    $developer_name = $developer_id ? get_the_title($developer_id) : '';
    $availability = get_post_meta($post_id, 'property_availability', true);
    $availability_date = get_post_meta($post_id, 'availability_date', true);
    $community_description = get_post_meta($post_id, 'community_description', true);
    $qr_image_id = (int) get_post_meta($post_id, '_porpertypi_qr_img_id', true);

    $phone = get_post_meta($post_id, '_re_phone', true);
    $email = get_post_meta($post_id, '_re_email', true);
    $whatsapp = get_post_meta($post_id, '_re_whatsapp', true);
    $phone_link = $phone ? preg_replace('/[^0-9+]/', '', $phone) : '';
    $whatsapp_link = $whatsapp ? preg_replace('/[^0-9]/', '', $whatsapp) : '';

    $assigned_agent_id = get_post_meta($post_id, 'spec_agent_id', true);
    $agent_name = '';
    $agent_photo = '';
    $agent_designation = '';
    $agent_brn = '';

    if ($assigned_agent_id) {
        $agent_name = get_the_title($assigned_agent_id);
        $agent_photo = get_the_post_thumbnail_url($assigned_agent_id, 'medium');
        $agent_designation = get_post_meta($assigned_agent_id, 'agent_designation', true);
        $agent_brn = get_post_meta($assigned_agent_id, 'agent_brn', true);

        $agent_phone = get_post_meta($assigned_agent_id, 'agent_phone', true);
        $agent_email = get_post_meta($assigned_agent_id, 'agent_email', true);
        $agent_whatsapp = get_post_meta($assigned_agent_id, 'agent_whatsapp', true);

        if (!empty($agent_phone)) {
            $phone = $agent_phone;
            $phone_link = preg_replace('/[^0-9+]/', '', $phone);
        }
        if (!empty($agent_email)) {
            $email = $agent_email;
        }
        if (!empty($agent_whatsapp)) {
            $whatsapp = $agent_whatsapp;
            $whatsapp_link = preg_replace('/[^0-9]/', '', $whatsapp);
        }
    }

    $price = is_numeric($_re_price) ? (float) $_re_price : 0;
    $size = is_numeric($_re_size_sqft) ? (float) $_re_size_sqft : 0;
    $per_square_price = ($price > 0 && $size > 0) ? ($price / $size) : 0;
    $subprice_formatted = ($per_square_price < 10 && $per_square_price > 0) ? number_format($per_square_price, 2) : number_format($per_square_price, 0);
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
                    <div class="mp-topline">
                        <?php if (!empty($pp_offering_type)) : ?>
                            <span class="mp-badge"><?php echo esc_html($pp_offering_type); ?></span>
                        <?php endif; ?>
                        <?php if (!empty($pp_property_category)) : ?>
                            <span class="mp-badge mp-badge--type"><?php echo esc_html($pp_property_category); ?></span>
                        <?php endif; ?>
                        <?php if (!empty($pp_status)) : ?>
                            <span class="mp-badge"><?php echo esc_html($pp_status); ?></span>
                        <?php endif; ?>
                        <?php if (!empty($pp_project_status)) : ?>
                            <span class="mp-badge"><?php echo esc_html($pp_project_status); ?></span>
                        <?php endif; ?>
                    </div>

                    <h1 class="mp-title"><?php the_title(); ?></h1>

                    <?php if ($pp_property_name || $pp_address || $pp_area) : ?>
                        <div class="mp-loc">
                            <?php if ($pp_property_name) : ?>
                                <span><?php echo esc_html($pp_property_name); ?></span>
                            <?php endif; ?>
                            <?php if ($pp_address || $pp_area) : ?>
                                <span class="mp-dot"></span>
                                <span><?php echo esc_html(trim($pp_address ? $pp_address : $pp_area)); ?></span>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <div class="mp-priceRow">
                        <div>
                            <div class="mp-price" id="mpPrice"><?php echo number_format($price, 0); ?> AED</div>
                            <div class="mp-subprice" id="subprice"><?php echo $subprice_formatted; ?> AED per ft²</div>
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

                            const basePriceAED = <?php echo json_encode($price, JSON_NUMERIC_CHECK); ?>;
                            const perSquarePriceAED = <?php echo json_encode($per_square_price, JSON_NUMERIC_CHECK); ?>;

                            let exchangeRates = {
                                AED: 1,
                                USD: 0.272294, // Fallback rate (1 AED = 0.27 USD)
                                EUR: 0.251475  // Fallback rate (1 AED = 0.25 EUR)
                            };

                            function formatPrice(amount) {
                                return new Intl.NumberFormat('en-US', {
                                    minimumFractionDigits: 0,
                                    maximumFractionDigits: 0
                                }).format(amount);
                            }

                            function formatSubPrice(amount) {
                                if (amount < 10 && amount > 0) {
                                    return new Intl.NumberFormat('en-US', {
                                        minimumFractionDigits: 2,
                                        maximumFractionDigits: 2
                                    }).format(amount);
                                }
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
                                subpriceEl.textContent = `${formatSubPrice(convertedPerSqft)} ${currency} per ft²`;
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

                    <div class="mp-headMeta">
                        <?php if (!empty($pp_unit_reference)) : ?>
                            <span><strong>Reference</strong> <?php echo esc_html($pp_unit_reference); ?></span>
                        <?php endif; ?>
                        <?php if (!empty($pp_property_type)) : ?>
                            <span><strong>Type</strong> <?php echo esc_html($pp_property_type); ?></span>
                        <?php endif; ?>
                        <?php if (!empty($pp_rental_period) && $pp_offering_type === 'Rent') : ?>
                            <span><strong>Rental</strong> <?php echo esc_html($pp_rental_period); ?></span>
                        <?php endif; ?>
                        <?php if (!empty($availability)) : ?>
                            <span><strong>Available</strong> <?php echo esc_html($availability === 'From date' && $availability_date ? $availability_date : $availability); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="mp-stats">
                        <div class="mp-stat"><span class="mp-stat__n"><?php echo esc_html($_re_beds); ?></span><span class="mp-stat__t">Bedrooms</span></div>
                        <div class="mp-stat"><span class="mp-stat__n"><?php echo esc_html($_re_baths); ?></span><span class="mp-stat__t">Baths</span></div>
                        <div class="mp-stat"><span class="mp-stat__n"><?php echo esc_html($_re_size_sqft); ?></span><span class="mp-stat__t">Sq. ft</span></div>
                        <div class="mp-stat"><span class="mp-stat__n"><?php echo esc_html($pp_parking_spaces); ?></span><span class="mp-stat__t">Parking</span></div>
                    </div>
                </section>

                <!-- OVERVIEW -->
                <section class="mp-card">
                    <div class="mp-card__header">
                        <h2 class="mp-h2">Overview</h2>
                    </div>

                    <div class="mp-overview-text mp-text">
                        <?php the_content(); ?>
                    </div>

                    <div class="mp-split mp-detail-grid">
                        <div>
                            <h3 class="mp-h3">Property Details</h3>
                            <ul class="mp-list">
                                <?php if (!empty($pp_unit_reference)) : ?>
                                    <li><strong>Unit Reference:</strong> <?php echo esc_html($pp_unit_reference); ?></li>
                                <?php endif; ?>
                                <?php if (!empty($pp_offering_type)) : ?>
                                    <li><strong>Offering Type:</strong> <?php echo esc_html($pp_offering_type); ?></li>
                                <?php endif; ?>
                                <?php if (!empty($pp_property_category)) : ?>
                                    <li><strong>Category:</strong> <?php echo esc_html($pp_property_category); ?></li>
                                <?php endif; ?>
                                <?php if (!empty($pp_property_type)) : ?>
                                    <li><strong>Property Type:</strong> <?php echo esc_html($pp_property_type); ?></li>
                                <?php endif; ?>
                                <?php if (!empty($pp_purpose)) : ?>
                                    <li><strong>Purpose:</strong> <?php echo esc_html($pp_purpose); ?></li>
                                <?php endif; ?>
                                <?php if (!empty($pp_status)) : ?>
                                    <li><strong>Status:</strong> <?php echo esc_html($pp_status); ?></li>
                                <?php endif; ?>
                                <?php if (!empty($pp_emirate)) : ?>
                                    <li><strong>Emirate:</strong> <?php echo esc_html($pp_emirate); ?></li>
                                <?php endif; ?>
                                <?php if (!empty($pp_area)) : ?>
                                    <li><strong>Area:</strong> <?php echo esc_html($pp_area); ?></li>
                                <?php endif; ?>
                                <?php if (!empty($pp_address)) : ?>
                                    <li><strong>Address:</strong> <?php echo esc_html($pp_address); ?></li>
                                <?php endif; ?>
                            </ul>
                        </div>

                        <div>
                            <h3 class="mp-h3">More Information</h3>
                            <ul class="mp-list">
                                <?php if (!empty($pp_property_name)) : ?>
                                    <li><strong>Property Name:</strong> <?php echo esc_html($pp_property_name); ?></li>
                                <?php endif; ?>
                                <?php if (!empty($pp_added_on)) : ?>
                                    <li><strong>Added On:</strong> <?php echo esc_html($pp_added_on); ?></li>
                                <?php endif; ?>
                                <?php if (!empty($pp_expired_date)) : ?>
                                    <li><strong>Expired Date:</strong> <?php echo esc_html($pp_expired_date); ?></li>
                                <?php endif; ?>
                                <?php if (!empty($pp_furnishing)) : ?>
                                    <li><strong>Furnishing:</strong> <?php echo esc_html($pp_furnishing); ?></li>
                                <?php endif; ?>
                                <?php if (!empty($pp_floor_number)) : ?>
                                    <li><strong>Floor Number:</strong> <?php echo esc_html($pp_floor_number); ?></li>
                                <?php endif; ?>
                                <?php if (!empty($pp_parking_spaces)) : ?>
                                    <li><strong>Parking Spaces:</strong> <?php echo esc_html($pp_parking_spaces); ?></li>
                                <?php endif; ?>
                                <?php if (!empty($pp_property_age)) : ?>
                                    <li><strong>Property Age:</strong> <?php echo esc_html($pp_property_age); ?></li>
                                <?php endif; ?>
                                <?php if (!empty($developer_name)) : ?>
                                    <li><strong>Developer:</strong> <?php echo esc_html($developer_name); ?></li>
                                <?php endif; ?>
                            </ul>
                        </div>

                        <div>
                            <?php if ($qr_image_id) : ?>
                                <div class="mp-qr-image">
                                    <?php echo wp_get_attachment_image($qr_image_id, 'medium', false, ['style' => 'max-width:100%;height:auto;']); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>

                <!-- AMENITIES -->
                <?php
                $saved_amenities = get_post_meta($post_id, 'cba_property_amenities', true);
                if (!is_array($saved_amenities)) {
                    $saved_amenities = maybe_unserialize($saved_amenities);
                }
                if (!is_array($saved_amenities)) {
                    $saved_amenities = [];
                }

                $amenity_labels = [
                    'balcony' => 'Balcony',
                    'barbecue_area' => 'Barbecue Area',
                    'built_in_wardrobes' => 'Built-in Wardrobes',
                    'central_ac' => 'Central A/C',
                    'covered_parking' => 'Covered Parking',
                    'private_gym' => 'Private Gym',
                    'private_jacuzzi' => 'Private Jacuzzi',
                    'kitchen_appliances' => 'Kitchen Appliances',
                    'maids_room' => 'Maids Room',
                    'pets_allowed' => 'Pets Allowed',
                    'private_garden' => 'Private Garden',
                    'private_pool' => 'Private Pool',
                    'shared_pool' => 'Shared Pool',
                    'study' => 'Study',
                    'view_of_water' => 'View of Water',
                    'security' => 'Security',
                    'concierge' => 'Concierge',
                    'shared_spa' => 'Shared Spa',
                    'shared_gym' => 'Shared Gym',
                    'maid_service' => 'Maid Service',
                    'walk_in_closet' => 'Walk-in Closet',
                    'view_of_landmark' => 'View of Landmark',
                    'childrens_play_area' => 'Children’s Play Area',
                    'lobby_in_building' => 'Lobby in Building',
                    'childrens_pool' => 'Children’s Pool',
                    'vastu_compliant' => 'Vastu-compliant',
                ];

                $amenity_groups = [
                    'Indoor' => [
                        'built_in_wardrobes',
                        'central_ac',
                        'kitchen_appliances',
                        'private_gym',
                        'private_jacuzzi',
                        'walk_in_closet',
                        'study',
                    ],
                    'Outdoor' => [
                        'balcony',
                        'barbecue_area',
                        'covered_parking',
                        'private_garden',
                        'private_pool',
                        'shared_pool',
                        'childrens_play_area',
                        'childrens_pool',
                        'view_of_water',
                        'view_of_landmark',
                        'lobby_in_building',
                    ],
                    'Services' => [
                        'pets_allowed',
                        'security',
                        'concierge',
                        'shared_spa',
                        'shared_gym',
                        'maid_service',
                        'maids_room',
                    ],
                ];

                $amenities_by_group = [];
                foreach ($amenity_groups as $group => $keys) {
                    foreach ($keys as $key) {
                        if (in_array($key, $saved_amenities, true) && isset($amenity_labels[$key])) {
                            $amenities_by_group[$group][] = $amenity_labels[$key];
                        }
                    }
                }

                if (empty($amenities_by_group)) {
                    $legacy_indoor = [];
                    $legacy_outdoor = [];
                    $legacy_services = [];

                    foreach (range(1, 8) as $index) {
                        $value = get_post_meta($post_id, 'indor_' . $index, true);
                        if (!empty($value)) {
                            $legacy_indoor[] = $value;
                        }
                    }
                    foreach (range(1, 10) as $index) {
                        $value = get_post_meta($post_id, 'outdoor_' . $index, true);
                        if (!empty($value)) {
                            $legacy_outdoor[] = $value;
                        }
                    }
                    foreach (range(1, 10) as $index) {
                        $value = get_post_meta($post_id, 'services_' . $index, true);
                        if (!empty($value)) {
                            $legacy_services[] = $value;
                        }
                    }

                    if (!empty($legacy_indoor)) {
                        $amenities_by_group['Indoor'] = $legacy_indoor;
                    }
                    if (!empty($legacy_outdoor)) {
                        $amenities_by_group['Outdoor'] = $legacy_outdoor;
                    }
                    if (!empty($legacy_services)) {
                        $amenities_by_group['Services'] = $legacy_services;
                    }
                }

                if (!empty($amenities_by_group)) : ?>
                    <section class="mp-card" id="amenities">
                        <h2 class="mp-h2">Features and Amenities</h2>
                        <div class="mp-amenGrid">
                            <?php foreach ($amenity_groups as $group_name => $keys) : ?>
                                <?php $items = $amenities_by_group[$group_name] ?? []; ?>
                                <?php if (empty($items)) : continue; endif; ?>
                                <div class="mp-amen">
                                    <h3 class="mp-h3"><?php echo esc_html($group_name); ?></h3>
                                    <ul class="mp-list">
                                        <?php foreach ($items as $item) : ?>
                                            <li><?php echo esc_html($item); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </section>
                <?php endif; ?>

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
                <style>
                    /* Premium Agent Card Styles */
                    .mp-premium-agent-card {
                        background: #ffffff !important;
                        border: 1px solid #eef1f4 !important;
                        border-radius: 16px !important;
                        padding: 24px !important;
                        box-shadow: 0 10px 30px rgba(16,24,40,.04) !important;
                        font-family: 'Poppins', sans-serif !important;
                    }
                    .mp-premium-contact-grid {
                        display: grid !important;
                        grid-template-columns: 1fr 1fr !important;
                        gap: 12px !important;
                        margin-bottom: 20px !important;
                    }
                    .mp-premium-btn {
                        height: 44px !important;
                        display: flex !important;
                        align-items: center !important;
                        justify-content: center !important;
                        gap: 8px !important;
                        border-radius: 30px !important;
                        font-weight: 700 !important;
                        font-size: 14px !important;
                        text-decoration: none !important;
                        transition: all .2s ease !important;
                        border: none !important;
                        cursor: pointer !important;
                    }
                    .mp-premium-btn svg {
                        fill: currentColor !important;
                        margin-right: 2px !important;
                    }
                    .mp-premium-btn--call {
                        background: #e66533 !important;
                        color: #ffffff !important;
                    }
                    .mp-premium-btn--call:hover {
                        background: #d45625 !important;
                        transform: translateY(-1px) !important;
                        box-shadow: 0 4px 12px rgba(230,101,51,.2) !important;
                    }
                    .mp-premium-btn--wa {
                        background: #25d366 !important;
                        color: #ffffff !important;
                    }
                    .mp-premium-btn--wa:hover {
                        background: #1ebe57 !important;
                        transform: translateY(-1px) !important;
                        box-shadow: 0 4px 12px rgba(37,211,102,.2) !important;
                    }
                    .mp-premium-divider {
                        border: none !important;
                        height: 1px !important;
                        background-color: #eef1f4 !important;
                        margin: 20px 0 !important;
                    }
                    .mp-premium-agent {
                        display: flex !important;
                        gap: 16px !important;
                        align-items: center !important;
                        margin-bottom: 24px !important;
                    }
                    .mp-premium-agent__photo {
                        width: 72px !important;
                        height: 72px !important;
                        border-radius: 50% !important;
                        object-fit: cover !important;
                        background: #f8fafc !important;
                        border: 2px solid #ffffff !important;
                        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08) !important;
                        flex-shrink: 0 !important;
                    }
                    .mp-premium-agent__logo-placeholder {
                        width: 72px !important;
                        height: 72px !important;
                        border-radius: 50% !important;
                        background: rgba(11,99,206,.1) !important;
                        display: grid !important;
                        place-items: center !important;
                        font-size: 28px !important;
                        border: 2px solid #ffffff !important;
                        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08) !important;
                        flex-shrink: 0 !important;
                    }
                    .mp-premium-agent__meta {
                        display: flex !important;
                        flex-direction: column !important;
                        min-width: 0 !important;
                    }
                    .mp-premium-agent__name {
                        font-size: 15px !important;
                        font-weight: 600 !important;
                        color: #0f172a !important;
                        margin: 0 0 4px !important;
                        line-height: 1.3 !important;
                    }
                    .mp-premium-agent__designation {
                        font-size: 12px !important;
                        color: #64748b !important;
                        font-weight: 400 !important;
                        margin-bottom: 2px !important;
                    }
                    .mp-premium-agent__brn {
                        font-size: 11px !important;
                        color: #0b63ce !important;
                        font-weight: 600 !important;
                    }
                    .mp-premium-agent__label {
                        font-size: 11px !important;
                        color: #94a3b8 !important;
                        text-transform: uppercase !important;
                        letter-spacing: 0.5px !important;
                    }

                    /* Inquiry Form Overrides */
                    .property-sidebar-inquiry-wrap {
                        background: #faf8f5 !important;
                        border: 1px solid #ebdcd0 !important;
                        border-radius: 12px !important;
                        padding: 24px 20px !important;
                        box-shadow: none !important;
                    }
                    .property-sidebar-inquiry-title {
                        font-size: 15px !important;
                        font-weight: 800 !important;
                        color: #0b1d33 !important;
                        margin-bottom: 4px !important;
                        display: block !important;
                    }
                    .property-sidebar-inquiry-subtitle {
                        font-size: 12px !important;
                        color: #64748b !important;
                        margin-bottom: 12px !important;
                        display: block !important;
                    }
                    .property-sidebar-inquiry-heading {
                        font-size: 13px !important;
                        font-weight: 700 !important;
                        color: #0b1d33 !important;
                        text-transform: uppercase !important;
                        letter-spacing: 0.5px !important;
                        margin-bottom: 14px !important;
                        display: block !important;
                    }
                    .property-sidebar-inquiry-field {
                        margin-bottom: 12px !important;
                    }
                    .property-sidebar-inquiry-label {
                        font-size: 12px !important;
                        font-weight: 600 !important;
                        color: #64748b !important;
                        margin-bottom: 4px !important;
                        display: block !important;
                    }
                    .property-sidebar-inquiry-input,
                    .property-sidebar-inquiry-select {
                        border-radius: 30px !important;
                        border: 1px solid #cbd5e1 !important;
                        height: 42px !important;
                        font-size: 13px !important;
                        padding: 0 16px !important;
                        background: #ffffff !important;
                        color: #0f172a !important;
                    }
                    .property-sidebar-inquiry-textarea {
                        border-radius: 12px !important;
                        border: 1px solid #cbd5e1 !important;
                        padding: 12px 16px !important;
                        min-height: 90px !important;
                        font-size: 13px !important;
                        background: #ffffff !important;
                        color: #0f172a !important;
                    }
                    .property-sidebar-inquiry-submit {
                        background: #0b2240 !important;
                        color: #ffffff !important;
                        font-weight: 700 !important;
                        border-radius: 30px !important;
                        height: 44px !important;
                        font-size: 13px !important;
                        border: none !important;
                        box-shadow: none !important;
                        cursor: pointer !important;
                        transition: all 0.2s ease !important;
                    }
                    .property-sidebar-inquiry-submit:hover {
                        background: #051429 !important;
                        transform: translateY(-1px) !important;
                    }
                    .select2-container--default .select2-selection--single {
                        border-radius: 30px !important;
                        border: 1px solid #cbd5e1 !important;
                        height: 42px !important;
                    }
                    .select2-container--default .select2-selection--single .select2-selection__rendered {
                        line-height: 42px !important;
                        padding-left: 16px !important;
                        color: #0f172a !important;
                    }
                    .select2-container--default .select2-selection--single .select2-selection__arrow {
                        height: 40px !important;
                        right: 8px !important;
                    }
                    .property-sidebar-inquiry-field-checkbox {
                        font-size: 11px !important;
                        color: #64748b !important;
                        line-height: 1.4 !important;
                        display: flex !important;
                        align-items: flex-start !important;
                        gap: 8px !important;
                    }
                    .property-sidebar-inquiry-field-checkbox a {
                        color: #0b2240 !important;
                        font-weight: 600 !important;
                    }
                </style>

                <div class="mp-sideCard mp-premium-agent-card">
                    <!-- Call & WhatsApp Grid -->
                    <div class="mp-premium-contact-grid">
                        <?php if ($phone_link) : ?>
                            <a class="mp-premium-btn mp-premium-btn--call" href="tel:<?php echo esc_attr($phone_link); ?>">
                                <svg class="btn-icon" viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M6.62 10.79a15.15 15.15 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.11-.27 11.72 11.72 0 0 0 3.7.59 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1 11.72 11.72 0 0 0 .59 3.7 1 1 0 0 1-.27 1.1l-2.2 2.2a.03.03 0 0 0 0 .09z"/></svg>
                                Call
                            </a>
                        <?php endif; ?>
                        <?php if ($whatsapp_link) : ?>
                            <a class="mp-premium-btn mp-premium-btn--wa" href="https://wa.me/<?php echo esc_attr($whatsapp_link); ?>" target="_blank" rel="noopener">
                                <svg class="btn-icon" viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.003 5.324 5.328 0 11.91 0c3.19.001 6.189 1.242 8.444 3.498 2.256 2.255 3.497 5.253 3.496 8.444-.003 6.585-5.328 11.91-11.91 11.91-2.01 0-3.987-.507-5.741-1.466L0 24zm6.09-3.323c1.654.981 3.284 1.498 4.908 1.499 5.378 0 9.754-4.374 9.757-9.755.002-2.607-1.011-5.059-2.853-6.902C16.12 3.676 13.673 2.66 11.07 2.66c-5.377 0-9.752 4.375-9.755 9.757-.001 1.705.467 3.371 1.354 4.887l-.997 3.642 3.734-.977zm13.11-7.142c-.22-.11-1.3-.642-1.502-.715-.202-.073-.349-.11-.497.11-.147.22-.57.715-.698.86-.128.147-.257.166-.477.056-.22-.11-.929-.342-1.77-1.09-1.025-.913-1.417-1.512-1.516-1.685-.1-.173-.01-.267.078-.354.08-.078.175-.203.262-.305.088-.102.116-.173.175-.347.058-.173.029-.323-.014-.433-.043-.11-.349-.84-.477-1.15-.125-.303-.251-.262-.349-.267-.09-.004-.19-.004-.29-.004s-.263.037-.402.188c-.139.15-5.28 5.155-5.28 12.569 0 7.414 5.394 14.568 5.614 14.869.22.3 10.61 16.206 17.208 22.06 6.598 5.854 13.167 5.854 15.367 5.854s4.402-1.5 5.502-3.15c1.1-1.65 1.1-3.075 1.1-3.375s-.22-.487-.44-.597z"/></svg>
                                WhatsApp
                            </a>
                        <?php endif; ?>
                    </div>

                    <!-- Divider -->
                    <hr class="mp-premium-divider">

                    <!-- Agent Profile Box -->
                    <div class="mp-premium-agent">
                        <?php if ($assigned_agent_id) : ?>
                            <?php if ($agent_photo) : ?>
                                <img src="<?php echo esc_url($agent_photo); ?>" alt="<?php echo esc_attr($agent_name); ?>" class="mp-premium-agent__photo">
                            <?php else : ?>
                                <div class="mp-premium-agent__logo-placeholder">👤</div>
                            <?php endif; ?>
                            <div class="mp-premium-agent__meta">
                                <h4 class="mp-premium-agent__name"><?php echo esc_html($agent_name); ?></h4>
                                <?php if ($agent_designation) : ?>
                                    <div class="mp-premium-agent__designation"><?php echo esc_html($agent_designation); ?></div>
                                <?php endif; ?>
                                <?php if ($agent_brn) : ?>
                                    <div class="mp-premium-agent__brn">BRN No: <?php echo esc_html($agent_brn); ?></div>
                                <?php endif; ?>
                            </div>
                        <?php else : ?>
                            <div class="mp-premium-agent__logo-placeholder">🏢</div>
                            <div class="mp-premium-agent__meta">
                                <div class="mp-premium-agent__label">Listing by</div>
                                <h4 class="mp-premium-agent__name"><?php echo esc_html($developer_name ?: 'CBA Real Estate'); ?></h4>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <?php if ($pp_emirate || $pp_property_type || $pp_property_category) : ?>
                    <div class="mp-sideCard">
                        <div class="mp-property-meta">
                            <?php if ($pp_property_category) : ?>
                                <div><strong>Category:</strong> <?php echo esc_html($pp_property_category); ?></div>
                            <?php endif; ?>
                            <?php if ($pp_property_type) : ?>
                                <div><strong>Property type:</strong> <?php echo esc_html($pp_property_type); ?></div>
                            <?php endif; ?>
                            <?php if ($pp_emirate) : ?>
                                <div><strong>Emirate:</strong> <?php echo esc_html($pp_emirate); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>

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