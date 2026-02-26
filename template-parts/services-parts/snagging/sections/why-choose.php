<?php

function why_choose_function() {
    ob_start();
    ?>
    <section class="property-snagging-why-section" aria-label="Why choose our snagging service">
    <div class="property-snagging-why-container">
        <div class="property-snagging-why-wrap">

        <!-- Left image -->
        <div class="property-snagging-why-media">
            <div class="property-snagging-why-frame">
            <!-- Replace with your image -->
            <img
                class="property-snagging-why-img"
                src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=1600&q=80"
                alt="Property inspection discussion"
                loading="lazy"
            />
            </div>
        </div>

        <!-- Right content -->
        <div class="property-snagging-why-content">
            <p class="property-snagging-why-kicker">Property Snagging</p>
            <h2 class="property-snagging-why-title">Why Choose Us?</h2>

            <ul class="property-snagging-why-list">
            <li class="property-snagging-why-item">
                <span class="property-snagging-why-dot" aria-hidden="true"></span>
                <div class="property-snagging-why-text">
                <strong>Experienced Inspectors:</strong> Our team understands real-world handover issues and knows what to check—so defects don’t get missed.
                </div>
            </li>

            <li class="property-snagging-why-item">
                <span class="property-snagging-why-dot" aria-hidden="true"></span>
                <div class="property-snagging-why-text">
                <strong>Thorough & Detailed:</strong> We inspect finishes, fittings, doors/windows, plumbing points, electrical outlets, and visible workmanship to ensure quality standards.
                </div>
            </li>

            <li class="property-snagging-why-item">
                <span class="property-snagging-why-dot" aria-hidden="true"></span>
                <div class="property-snagging-why-text">
                <strong>Clear Reporting:</strong> You receive an actionable snag list with priorities—making it easy to request rectifications from the developer or contractor.
                </div>
            </li>

            <li class="property-snagging-why-item">
                <span class="property-snagging-why-dot" aria-hidden="true"></span>
                <div class="property-snagging-why-text">
                <strong>Peace of Mind:</strong> Move in with confidence, knowing your property was checked properly and issues were identified before handover.
                </div>
            </li>
            </ul>

            <div class="property-snagging-why-actions d-none">
            <a class="property-snagging-why-btn" href="#">
                Book an Inspection
                <span class="property-snagging-why-arrow" aria-hidden="true">→</span>
            </a>
            </div>
        </div>

        </div>
    </div>
    </section>
    <style>
            /* =========================
        Property Snagging - Why Choose Us (Dark)
        Prefix: property-snagging-
        ========================= */

        .property-snagging-why-section{
        --clr-primary:#ef3c26;
        --clr-black:#050505;
        --clr-white:#ffffff;

        font-family:"Poppins",system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif;
        background: var(--clr-black);
        color: var(--clr-white);
        padding: clamp(28px, 4vw, 64px) 16px;
        }

        .property-snagging-why-section *{
        box-sizing: border-box;
        }

        .property-snagging-why-container{
        max-width: 1200px;
        margin: 0 auto;
        }

        .property-snagging-why-wrap{
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: clamp(18px, 3vw, 46px);
        }

        /* Left */
        .property-snagging-why-media{
        flex: 1 1 48%;
        }

        .property-snagging-why-frame{
        border-radius: 18px;
        overflow: hidden;
        border: 1px solid rgba(255,255,255,0.10);
        box-shadow: 0 18px 44px rgba(0,0,0,0.35);
        position: relative;
        }

        .property-snagging-why-frame::after{
        content:"";
        position:absolute;
        inset:0;
        background: linear-gradient(135deg, rgba(239,60,38,0.22), rgba(0,0,0,0) 55%);
        pointer-events:none;
        }

        .property-snagging-why-img{
        width: 100%;
        height: clamp(280px, 34vw, 520px);
        object-fit: cover;
        display: block;
        }

        /* Right */
        .property-snagging-why-content{
        flex: 1 1 52%;
        padding: 6px 0;
        }

        .property-snagging-why-kicker{
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-size: 14px;
        font-weight: 600;
        letter-spacing: .08em;
        text-transform: uppercase;
        color: var(--clr-primary); /* colot= var(--clr-primary) */
        margin: 0 0 10px;
        }

        .property-snagging-why-kicker::before{
        content:"";
        width: 28px;
        height: 2px;
        background: var(--clr-primary);
        border-radius: 99px;
        display: inline-block;
        }

        .property-snagging-why-title{
        margin: 0 0 14px;
        font-size: clamp(26px, 3vw, 46px);
        line-height: 1.12;
        font-weight: 800;
        letter-spacing: -0.02em;
        }

        .property-snagging-why-list{
        list-style: none;
        padding: 0;
        margin: 0 0 18px;
        display: flex;
        flex-direction: column;
        gap: 14px;
        }

        .property-snagging-why-item{
        display: flex;
        gap: 12px;
        align-items: flex-start;
        }

        .property-snagging-why-dot{
        width: 10px;
        height: 10px;
        border-radius: 999px;
        background: var(--clr-primary);
        margin-top: 10px;
        flex: 0 0 10px;
        box-shadow: 0 0 0 6px rgba(239,60,38,0.18);
        }

        .property-snagging-why-text{
        font-size: 14.8px;
        line-height: 1.85;
        color: rgba(255,255,255,0.82);
        }

        .property-snagging-why-text strong{
        color: var(--clr-white);
        font-weight: 800;
        }

        /* Button */
        .property-snagging-why-actions{
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: 14px;
        }

        .property-snagging-why-btn{
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 12px 18px;
        border-radius: 12px;
        background: var(--clr-primary);
        border: 1px solid var(--clr-primary);
        color: var(--clr-white);
        text-decoration: none;
        font-weight: 700;
        font-size: 14.5px;
        box-shadow: 0 16px 30px rgba(239, 60, 38, 0.20);
        transition: transform 160ms ease, box-shadow 160ms ease;
        }

        .property-snagging-why-btn:hover{
        transform: translateY(-1px);
        box-shadow: 0 20px 38px rgba(239, 60, 38, 0.26);
        }

        .property-snagging-why-arrow{
        width: 26px;
        height: 26px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 999px;
        background: rgba(255,255,255,0.18);
        }

        /* Tablet */
        @media (max-width: 992px){
        .property-snagging-why-wrap{
            flex-direction: column;
            align-items: stretch;
        }
        .property-snagging-why-img{
            height: clamp(240px, 56vw, 520px);
        }
        }

        /* Mobile */
        @media (max-width: 576px){
        .property-snagging-why-btn{
            width: 100%;
        }
        }
    </style>
    <?php
    return ob_get_clean();
}
add_shortcode('why_choose_shortcode', 'why_choose_function');