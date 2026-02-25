<?php
function property_management_hello_shortcode() {
    ob_start();
    ?>
    <section class="property-management-section" aria-label="Property Management CTA">
    <div class="property-management-container">
        <div class="property-management-grid">
        
        <!-- Left Content -->
        <div class="property-management-content">
            <p class="property-management-kicker">Property Management</p>

            <h2 class="property-management-title">
            Do you need a premium real estate platform that scales?
            </h2>

            <div class="property-management-text">
            <p>
                We’re building a high-end WordPress real estate website inspired by metropolitan.realestate—designed for
                speed, clean UX, and long-term growth.
            </p>
            <p>
                The platform supports Buy & Rent listings with AJAX filtering, New Projects (off-plan) modules, Area/Community
                guides, Developer profiles, and lead capture—structured for large inventory and expansion.
            </p>
            <p>
                It’s built to be performance-focused, Cloudflare compatible, SEO-ready (schema + structured content), and
                capable of pulling listings from external APIs/CRMs for automation.
            </p>
            </div>

            <div class="property-management-actions">
            <a class="property-management-btn property-management-btn--primary" href="#">
                Get a Quote
                <span class="property-management-btn-icon" aria-hidden="true">→</span>
            </a>
            </div>

            
        </div>

        <!-- Right Image -->
        <div class="property-management-media">
            <div class="property-management-media-frame">
            <!-- Replace this image url with your own -->
            <img
                class="property-management-image"
                src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=1400&q=80"
                alt="Professional real estate team discussing a project"
                loading="lazy"
            />
            </div>
        </div>

        </div>
    </div>
    </section>
    <style>
            /* =========================
        Property Management Section
        Prefix: property-management-
        ========================= */

        .property-management-section{
        font-family: "Poppins", system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
        background: #ffffff;
        color: #0b0b0b;
        padding: clamp(28px, 4vw, 64px) 16px;
        }

        .property-management-container{
        max-width: 1200px;
        margin: 0 auto;
        }

        .property-management-grid{
        display: grid;
        grid-template-columns: 1.05fr 0.95fr;
        gap: clamp(18px, 3vw, 48px);
        align-items: center;
        }

        .property-management-content{
        padding: clamp(10px, 1vw, 18px);
        }

        .property-management-kicker{
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-size: 14px;
        font-weight: 600;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: #ef3c26;
        margin-bottom: 12px;
        }

        .property-management-kicker::before{
        content: "";
        width: 28px;
        height: 2px;
        background: #ef3c26;
        border-radius: 99px;
        display: inline-block;
        }

        .property-management-title{
        font-size: clamp(26px, 3.2vw, 44px);
        line-height: 1.15;
        font-weight: 700;
        margin: 0 0 14px;
        color: #0b0b0b;
        }

        .property-management-text{
        font-size: 15.5px;
        line-height: 1.85;
        color: #1b1b1b;
        }

        .property-management-text p{
        margin: 0 0 14px;
        }

        .property-management-actions{
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: 18px;
        }

        .property-management-btn{
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 12px 18px;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 600;
        font-size: 14.5px;
        transition: transform 160ms ease, box-shadow 160ms ease, background 160ms ease, border-color 160ms ease;
        will-change: transform;
        }

        .property-management-btn--primary{
        background: #ef3c26;
        color: #ffffff;
        border: 1px solid #ef3c26;
        box-shadow: 0 12px 24px rgba(239, 60, 38, 0.18);
        }

        .property-management-btn--primary:hover{
        transform: translateY(-1px);
        box-shadow: 0 16px 34px rgba(239, 60, 38, 0.22);
        }

        .property-management-btn--ghost{
        background: #ffffff;
        color: #0b0b0b;
        border: 1px solid rgba(0,0,0,0.14);
        }

        .property-management-btn--ghost:hover{
        transform: translateY(-1px);
        border-color: rgba(239, 60, 38, 0.55);
        box-shadow: 0 10px 22px rgba(0,0,0,0.08);
        }

        .property-management-btn-icon{
        display: inline-flex;
        width: 24px;
        height: 24px;
        border-radius: 999px;
        align-items: center;
        justify-content: center;
        background: rgba(255,255,255,0.18);
        }

        .property-management-badges{
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 18px;
        }

        .property-management-badge{
        font-size: 12.5px;
        padding: 8px 10px;
        border-radius: 999px;
        border: 1px solid rgba(0,0,0,0.10);
        background: #ffffff;
        color: #0b0b0b;
        }

        .property-management-media{
        padding: clamp(10px, 1vw, 18px);
        }

        .property-management-media-frame{
        position: relative;
        border-radius: 18px;
        overflow: hidden;
        background: #ffffff;
        border: 1px solid rgba(0,0,0,0.10);
        box-shadow: 0 18px 44px rgba(0,0,0,0.12);
        }

        .property-management-media-frame::after{
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(239,60,38,0.12), rgba(0,0,0,0) 55%);
        pointer-events: none;
        }

        .property-management-image{
        width: 100%;
        height: clamp(260px, 34vw, 420px);
        object-fit: cover;
        display: block;
        }

        /* =========================
        Responsive
        ========================= */

        /* Tablet */
        @media (max-width: 992px){
        .property-management-grid{
            grid-template-columns: 1fr;
        }
        .property-management-image{
            height: clamp(240px, 48vw, 420px);
        }
        }

        /* Mobile */
        @media (max-width: 576px){
        .property-management-actions{
            gap: 10px;
        }
        .property-management-btn{
            width: 100%;
        }
        }
    </style>
    <?php
    return ob_get_clean();
}
add_shortcode('property_management_hello', 'property_management_hello_shortcode');