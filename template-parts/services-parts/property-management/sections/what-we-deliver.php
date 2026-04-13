<?php
function property_management_what_we_deliver() {
    ob_start();
    $property_management_wwd_card_1 = get_theme_mod('property_management_wwd_card_1', get_template_directory_uri().'/assets/services/property-management/card_p_1.avif');
    $property_management_wwd_card_2 = get_theme_mod('property_management_wwd_card_2', get_template_directory_uri().'/assets/services/property-management/card_p_2.avif');
    $property_management_wwd_card_3 = get_theme_mod('property_management_wwd_card_3', get_template_directory_uri().'/assets/services/property-management/card_p_3.avif');
    $property_management_wwd_card_4 = get_theme_mod('property_management_wwd_card_4', get_template_directory_uri().'/assets/services/property-management/card_p_4.avif');
    $property_management_wwd_card_5 = get_theme_mod('property_management_wwd_card_5', get_template_directory_uri().'/assets/services/property-management/card_p_5.avif');
    $property_management_wwd_card_6 = get_theme_mod('property_management_wwd_card_6', get_template_directory_uri().'/assets/services/property-management/card_p_6.avif');

    $wwd_sub_title = get_theme_mod( 'wwd_sub_title', 'What we deliver' );
    $wwd_title = get_theme_mod( 'wwd_title', 'Explore what we do Real estate property management' );
    $wwd_desc = get_theme_mod( 'wwd_desc', 'A scalable WordPress build inspired by metropolitan.realestate—focused on speed, clean UX, advanced search, and API-ready data automation.' );

    $property_management_wwd_card_1_title = get_theme_mod( 'property_management_wwd_card_1_title', 'Property Marketing and Listing' );
    $property_management_wwd_card_1_desc = get_theme_mod( 'property_management_wwd_card_1_desc', 'We use advanced marketing strategies to ensure your property stands out in a competitive market. From professional photography to targeted online advertising, we effectively showcase your property to attract the right tenants.' );

    $property_management_wwd_card_2_title = get_theme_mod( 'property_management_wwd_card_2_title', 'Tenant Search and Selection' );
    $property_management_wwd_card_2_desc = get_theme_mod( 'property_management_wwd_card_2_desc', 'Securing the right tenants is key to the success of your property investment. We perform comprehensive background checks and screenings to ensure that we find reliable and responsible tenants for your property.' );

    $property_management_wwd_card_3_title = get_theme_mod( 'property_management_wwd_card_3_title', 'Tenancy Contract Management' );
    $property_management_wwd_card_3_desc = get_theme_mod( 'property_management_wwd_card_3_desc', 'Our team expertly manages all legal aspects of tenancy contracts to ensure full compliance with local regulations and safeguard your interests. We handle lease agreements, renewals, and terminations efficiently and transparently, providing you with peace of mind throughout the tenancy lifecycle.' );

    $property_management_wwd_card_4_title = get_theme_mod( 'property_management_wwd_card_4_title', 'Maintenance and Repairs' );
    $property_management_wwd_card_4_desc = get_theme_mod( 'property_management_wwd_card_4_desc', 'We provide round-the-clock maintenance services to address any issues swiftly and effectively. Our extensive network of reliable contractors guarantees that your property remains well-maintained and that all repairs meet the highest standards of quality.' );

    $property_management_wwd_card_5_title = get_theme_mod( 'property_management_wwd_card_5_title', 'Financial Management' );
    $property_management_wwd_card_5_desc = get_theme_mod( 'property_management_wwd_card_5_desc', 'We handle all financial aspects of your property management, from collecting rent to managing utility payments and producing financial reports. Our approach to transparent, real-time financial reporting ensures you are always well-informed about the performance of your property.' );

    $property_management_wwd_card_6_title = get_theme_mod( 'property_management_wwd_card_6_title', 'Regular Inspections' );
    $property_management_wwd_card_6_desc = get_theme_mod( 'property_management_wwd_card_6_desc', 'To preserve and enhance the value of your property, we conduct regular inspections and provide comprehensive reports. This proactive strategy allows us to identify and resolve potential issues early, preventing them from escalating into significant problems.' );


    ?>
    

    <section class="what-we-deliver-section" aria-label="What We Deliver">
    <div class="what-we-deliver-container">
        
        <div class="what-we-deliver-head">
        <?php if(!empty($wwd_sub_title)) : ?>
        <p class="what-we-deliver-kicker"><?php echo esc_html( $wwd_sub_title )?></p>
        <?php endif;?>

        <?php if(!empty($wwd_title)) : ?>
        <h2 class="what-we-deliver-title"><?php echo esc_html( $wwd_title )?></h2>
        <?php endif;?>

        <?php if(!empty($wwd_desc)) : ?>
        <p class="what-we-deliver-subtitle"><?php echo esc_html( $wwd_desc )?> </p>
        <?php endif;?>

        </div>

        <div class="what-we-deliver-grid">
        
        <article class="what-we-deliver-card">
            <div class="what-we-deliver-media">
            <img class="what-we-deliver-img" 
                src="<?php echo $property_management_wwd_card_1; ?>"
                alt="Team planning a premium real estate platform" loading="lazy">
            </div>
            <div class="what-we-deliver-body">
            
            <?php if(!empty($property_management_wwd_card_1_title)) : ?>
            <h3 class="what-we-deliver-card-title"><?php echo $property_management_wwd_card_1_title; ?></h3>
            <?php endif;?>

            <?php if(!empty($property_management_wwd_card_1_desc)) : ?>
            <p class="what-we-deliver-text"><?php echo $property_management_wwd_card_1_desc; ?> </p>
            <?php endif;?>

            </div>
        </article>

        <article class="what-we-deliver-card">
            <div class="what-we-deliver-media">
            <img class="what-we-deliver-img" 
                src="<?php echo $property_management_wwd_card_2; ?>"
                alt="Advanced property search experience" loading="lazy">
            </div>
            <div class="what-we-deliver-body">
            <?php if(!empty($property_management_wwd_card_2_title)) : ?>
            <h3 class="what-we-deliver-card-title"><?php echo $property_management_wwd_card_2_title; ?></h3>
            <?php endif;?>

            <?php if(!empty($property_management_wwd_card_2_desc)) : ?>
            <p class="what-we-deliver-text"><?php echo $property_management_wwd_card_2_desc; ?> </p>
            <?php endif;?>
            </div>
        </article>

        <article class="what-we-deliver-card">
            <div class="what-we-deliver-media">
            <img class="what-we-deliver-img" 
                src="<?php echo $property_management_wwd_card_3; ?>"
                alt="API and CRM integration" loading="lazy">
            </div>
            <div class="what-we-deliver-body">
            <?php if(!empty($property_management_wwd_card_3_title)) : ?>
            <h3 class="what-we-deliver-card-title"><?php echo $property_management_wwd_card_3_title; ?></h3>
            <?php endif;?>

            <?php if(!empty($property_management_wwd_card_3_desc)) : ?>
            <p class="what-we-deliver-text"><?php echo $property_management_wwd_card_3_desc; ?> </p>
            <?php endif;?>
            </div>
        </article>

        <article class="what-we-deliver-card">
            <div class="what-we-deliver-media">
            <img class="what-we-deliver-img" 
                src="<?php echo $property_management_wwd_card_4; ?>"
                alt="SEO content and analytics growth" loading="lazy">
            </div>
            <div class="what-we-deliver-body">
            <?php if(!empty($property_management_wwd_card_4_title)) : ?>
            <h3 class="what-we-deliver-card-title"><?php echo $property_management_wwd_card_4_title; ?></h3>
            <?php endif;?>

            <?php if(!empty($property_management_wwd_card_4_desc)) : ?>
            <p class="what-we-deliver-text"><?php echo $property_management_wwd_card_4_desc; ?> </p>
            <?php endif;?>
            </div>
        </article>

        <article class="what-we-deliver-card">
            <div class="what-we-deliver-media">
            <img class="what-we-deliver-img" 
                src="<?php echo $property_management_wwd_card_5; ?>"
                alt="New projects and off-plan module" loading="lazy">
            </div>
            <div class="what-we-deliver-body">
            <?php if(!empty($property_management_wwd_card_5_title)) : ?>
            <h3 class="what-we-deliver-card-title"><?php echo $property_management_wwd_card_5_title; ?></h3>
            <?php endif;?>

            <?php if(!empty($property_management_wwd_card_5_desc)) : ?>
            <p class="what-we-deliver-text"><?php echo $property_management_wwd_card_5_desc; ?> </p>
            <?php endif;?>
            </div>
        </article>

        <article class="what-we-deliver-card">
            <div class="what-we-deliver-media">
            <img class="what-we-deliver-img" 
                src="<?php echo $property_management_wwd_card_6; ?>"
                alt="Lead capture and enquiry management" loading="lazy">
            </div>
            <div class="what-we-deliver-body">
            <?php if(!empty($property_management_wwd_card_6_title)) : ?>
            <h3 class="what-we-deliver-card-title"><?php echo $property_management_wwd_card_6_title; ?></h3>
            <?php endif;?>

            <?php if(!empty($property_management_wwd_card_6_desc)) : ?>
            <p class="what-we-deliver-text"><?php echo $property_management_wwd_card_6_desc; ?> </p>
            <?php endif;?>
            </div>
        </article>

        </div>

    </div>
    </section>
    <style>
                /* =========================
        What We Deliver Section
        Prefix: what-we-deliver-
        ========================= */

        .what-we-deliver-section{
        font-family: "Poppins", system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
        background: #ffffff;
        color: #0b0b0b;
        padding: clamp(28px, 4vw, 64px) 16px;
        }

        .what-we-deliver-container{
        max-width: 1200px;
        margin: 0 auto;
        }

        .what-we-deliver-head{
        max-width: 720px;
        margin-bottom: clamp(18px, 3vw, 32px);
        }

        .what-we-deliver-kicker{
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-size: 14px;
        font-weight: 600;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: #ef3c26;
        margin: 0 0 10px;
        }

        .what-we-deliver-kicker::before{
        content:"";
        width: 28px;
        height: 2px;
        background:#ef3c26;
        border-radius: 99px;
        display:inline-block;
        }

        .what-we-deliver-title{
        font-size: clamp(24px, 3vw, 38px);
        line-height: 1.2;
        font-weight: 700;
        margin: 0 0 10px;
        }

        .what-we-deliver-subtitle{
        font-size: 15.5px;
        line-height: 1.8;
        margin: 0;
        color: rgba(0,0,0,0.70);
        }

        .what-we-deliver-grid{
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: clamp(14px, 2vw, 20px);
        }

        .what-we-deliver-card{
        background: #ffffff;
        border: 1px solid rgba(0,0,0,0.10);
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 14px 38px rgba(0,0,0,0.08);
        transition: transform 160ms ease, box-shadow 160ms ease, border-color 160ms ease;
        }

        .what-we-deliver-card:hover{
        transform: translateY(-2px);
        border-color: rgba(239, 60, 38, 0.45);
        box-shadow: 0 18px 44px rgba(0,0,0,0.12);
        }

        .what-we-deliver-media{
        position: relative;
        overflow: hidden;
        background: #ffffff;
        }

        .what-we-deliver-media::after{
        content:"";
        position:absolute;
        inset:0;
        background: linear-gradient(135deg, rgba(239,60,38,0.16), rgba(0,0,0,0) 55%);
        pointer-events:none;
        }

        .what-we-deliver-img{
        width: 100%;
        height: 190px;
        object-fit: cover;
        display: block;
        transform: scale(1.01);
        }

        .what-we-deliver-body{
        padding: 16px 16px 18px;
        }

        .what-we-deliver-card-title{
        margin: 0 0 8px;
        font-size: 16px;
        font-weight: 700;
        color: #0b0b0b;
        }

        .what-we-deliver-text{
        margin: 0;
        font-size: 13.8px;
        line-height: 1.7;
        color: rgba(0,0,0,0.72);
        }

        /* Tablet */
        @media (max-width: 992px){
        .what-we-deliver-grid{
            grid-template-columns: repeat(2, 1fr);
        }
        .what-we-deliver-img{
            height: 200px;
        }
        }

        /* Mobile */
        @media (max-width: 576px){
        .what-we-deliver-grid{
            grid-template-columns: 1fr;
        }
        .what-we-deliver-img{
            height: 210px;
        }
        }
    </style>
    <?php
    return ob_get_clean();
}
add_shortcode('property_management_what_we_deliver', 'property_management_what_we_deliver');