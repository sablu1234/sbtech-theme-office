<?php
function property_management_what_we_deliver() {
    ob_start();
    ?>

    <section class="what-we-deliver-section" aria-label="What We Deliver">
    <div class="what-we-deliver-container">
        
        <div class="what-we-deliver-head">
        <p class="what-we-deliver-kicker">What we deliver</p>
        <h2 class="what-we-deliver-title">Explore what we deliver for a premium real estate platform</h2>
        <p class="what-we-deliver-subtitle">
            A scalable WordPress build inspired by metropolitan.realestate—focused on speed, clean UX, advanced search, and API-ready data automation.
        </p>
        </div>

        <div class="what-we-deliver-grid">
        
        <article class="what-we-deliver-card">
            <div class="what-we-deliver-media">
            <img class="what-we-deliver-img" 
                src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=1600&q=80"
                alt="Team planning a premium real estate platform" loading="lazy">
            </div>
            <div class="what-we-deliver-body">
            <h3 class="what-we-deliver-card-title">Custom WordPress Theme</h3>
            <p class="what-we-deliver-text">
                Fully custom, modern UI built for a luxury property brand—clean layout, mobile-first responsiveness, and maintainable code.
            </p>
            </div>
        </article>

        <article class="what-we-deliver-card">
            <div class="what-we-deliver-media">
            <img class="what-we-deliver-img" 
                src="https://images.unsplash.com/photo-1554774853-b414d0c11b35?auto=format&fit=crop&w=1600&q=80"
                alt="Advanced property search experience" loading="lazy">
            </div>
            <div class="what-we-deliver-body">
            <h3 class="what-we-deliver-card-title">AJAX Buy & Rent Search</h3>
            <p class="what-we-deliver-text">
                Fast filtering and pagination for large inventories—location, type, beds, price ranges, amenities, and more.
            </p>
            </div>
        </article>

        <article class="what-we-deliver-card">
            <div class="what-we-deliver-media">
            <img class="what-we-deliver-img" 
                src="https://images.unsplash.com/photo-1526304640581-d334cdbbf45e?auto=format&fit=crop&w=1600&q=80"
                alt="API and CRM integration" loading="lazy">
            </div>
            <div class="what-we-deliver-body">
            <h3 class="what-we-deliver-card-title">API / CRM Integration Ready</h3>
            <p class="what-we-deliver-text">
                Structured for syncing listings from external sources (CRM/portals), enabling automation and scalable content updates.
            </p>
            </div>
        </article>

        <article class="what-we-deliver-card">
            <div class="what-we-deliver-media">
            <img class="what-we-deliver-img" 
                src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=1600&q=80"
                alt="SEO content and analytics growth" loading="lazy">
            </div>
            <div class="what-we-deliver-body">
            <h3 class="what-we-deliver-card-title">SEO-Driven Area Pages</h3>
            <p class="what-we-deliver-text">
                Community/area guides designed for organic growth with structured content, internal linking, and related properties.
            </p>
            </div>
        </article>

        <article class="what-we-deliver-card">
            <div class="what-we-deliver-media">
            <img class="what-we-deliver-img" 
                src="https://images.unsplash.com/photo-1523952578875-e6bb18b26645?auto=format&fit=crop&w=1600&q=80"
                alt="New projects and off-plan module" loading="lazy">
            </div>
            <div class="what-we-deliver-body">
            <h3 class="what-we-deliver-card-title">New Projects Module</h3>
            <p class="what-we-deliver-text">
                Dedicated off-plan/projects section with bulk upload options (CSV/admin/API), developer association, and detail pages.
            </p>
            </div>
        </article>

        <article class="what-we-deliver-card">
            <div class="what-we-deliver-media">
            <img class="what-we-deliver-img" 
                src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?auto=format&fit=crop&w=1600&q=80"
                alt="Lead capture and enquiry management" loading="lazy">
            </div>
            <div class="what-we-deliver-body">
            <h3 class="what-we-deliver-card-title">Lead Capture & Management</h3>
            <p class="what-we-deliver-text">
                Enquiry forms across listings/projects with backend management and export-ready lead records—built for sales workflows.
            </p>
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