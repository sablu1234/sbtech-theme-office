<?php
function why_snagging_function() {
    ob_start();
    ?>
    <section class="property-snagging-section" aria-label="Property snagging and inspection">
    <div class="property-snagging-container">
        <div class="property-snagging-wrap">

        <!-- Left Content -->
        <div class="property-snagging-content">
            <p class="property-snagging-kicker">Property Snagging</p>

            <h2 class="property-snagging-title">
            Why Snagging & Inspection with CBA Real Estate?
            </h2>

            <p class="property-snagging-lead">
            Protect your investment before handover with a detailed snagging inspection—clear reporting, actionable fixes, and total peace of mind.
            </p>

            <div class="property-snagging-text">
            <p>
                Our snagging service identifies finishing defects, functional issues, and quality gaps before you take ownership.
                We inspect key areas such as walls and paintwork, flooring, doors and windows, plumbing, electrical points,
                HVAC performance, and visible workmanship details.
            </p>

            <p>
                You receive a structured snagging report with prioritized items, so you can request rectifications from the
                developer or contractor quickly and confidently—reducing post-handover surprises.
            </p>
            </div>

            <div class="property-snagging-actions d-none">
            <a class="property-snagging-btn property-snagging-btn--primary" href="#">
                Enquire now
                <span class="property-snagging-arrow" aria-hidden="true">→</span>
            </a>

            <a class="property-snagging-btn property-snagging-btn--ghost" href="#">
                View Inspection Checklist
            </a>
            </div>

            <div class="property-snagging-chips d-none" aria-label="Key highlights">
            <span class="property-snagging-chip">Pre-Handover Inspection</span>
            <span class="property-snagging-chip">Detailed Report</span>
            <span class="property-snagging-chip">Actionable Fix List</span>
            </div>
        </div>

        <!-- Right Image -->
        <div class="property-snagging-media">
            <div class="property-snagging-frame">
            <!-- Replace this image URL with your own -->
            <img
                class="property-snagging-img"
                src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1600&q=80"
                alt="Property inspection and snagging"
                loading="lazy"
            />
            </div>
        </div>

        </div>
    </div>
    </section>
    <style>
            /* =========================
        Property Snagging Section
        Prefix: property-snagging-
        ========================= */

        .property-snagging-section{
        --clr-primary:#ef3c26;
        --clr-black:#0b0b0b;
        --clr-white:#ffffff;

        font-family:"Poppins",system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif;
        background: var(--clr-white);
        color: var(--clr-black);
        padding: clamp(28px, 4vw, 64px) 16px;
        }

        .property-snagging-section *{
        box-sizing: border-box;
        }

        .property-snagging-container{
        max-width: 1200px;
        margin: 0 auto;
        }

        .property-snagging-wrap{
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: clamp(18px, 3vw, 46px);
        }

        /* Left */
        .property-snagging-content{
        flex: 1 1 52%;
        padding: clamp(6px, 1vw, 16px);
        }

        .property-snagging-kicker{
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

        .property-snagging-kicker::before{
        content:"";
        width: 28px;
        height: 2px;
        background: var(--clr-primary);
        border-radius: 99px;
        display: inline-block;
        }

        .property-snagging-title{
        margin: 0 0 12px;
        font-size: clamp(24px, 3vw, 40px);
        line-height: 1.15;
        font-weight: 700;
        color: var(--clr-black);
        }

        .property-snagging-lead{
        margin: 0 0 14px;
        font-size: 15.5px;
        line-height: 1.85;
        font-weight: 600;
        color: rgba(0,0,0,0.75);
        }

        .property-snagging-text{
        font-size: 15px;
        line-height: 1.85;
        color: rgba(0,0,0,0.70);
        }

        .property-snagging-text p{
        margin: 0 0 14px;
        }

        /* Buttons */
        .property-snagging-actions{
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: 12px;
        }

        .property-snagging-btn{
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 12px 18px;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 600;
        font-size: 14.5px;
        transition: transform 160ms ease, box-shadow 160ms ease, border-color 160ms ease;
        }

        .property-snagging-btn--primary{
        background: var(--clr-primary);
        color: var(--clr-white);
        border: 1px solid var(--clr-primary);
        box-shadow: 0 14px 26px rgba(239, 60, 38, 0.18);
        }

        .property-snagging-btn--primary:hover{
        transform: translateY(-1px);
        box-shadow: 0 18px 34px rgba(239, 60, 38, 0.22);
        }

        .property-snagging-btn--ghost{
        background: var(--clr-white);
        color: var(--clr-black);
        border: 1px solid rgba(0,0,0,0.14);
        }

        .property-snagging-btn--ghost:hover{
        transform: translateY(-1px);
        border-color: rgba(239,60,38,0.55);
        box-shadow: 0 10px 22px rgba(0,0,0,0.08);
        }

        .property-snagging-arrow{
        width: 26px;
        height: 26px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 999px;
        background: rgba(255,255,255,0.18);
        }

        /* Chips */
        .property-snagging-chips{
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 16px;
        }

        .property-snagging-chip{
        font-size: 12.5px;
        padding: 8px 10px;
        border-radius: 999px;
        border: 1px solid rgba(0,0,0,0.10);
        background: var(--clr-white);
        color: var(--clr-black);
        }

        /* Right */
        .property-snagging-media{
        flex: 1 1 48%;
        padding: clamp(6px, 1vw, 16px);
        }

        .property-snagging-frame{
        position: relative;
        border-radius: 18px;
        overflow: hidden;
        border: 1px solid rgba(0,0,0,0.10);
        background: var(--clr-white);
        box-shadow: 0 18px 44px rgba(0,0,0,0.12);
        }

        .property-snagging-frame::after{
        content:"";
        position:absolute;
        inset:0;
        background: linear-gradient(135deg, rgba(239,60,38,0.14), rgba(0,0,0,0) 55%);
        pointer-events:none;
        }

        .property-snagging-img{
        width: 100%;
        height: clamp(260px, 34vw, 460px);
        object-fit: cover;
        display: block;
        }

        /* Tablet */
        @media (max-width: 992px){
        .property-snagging-wrap{
            flex-direction: column;
            align-items: stretch;
        }
        .property-snagging-img{
            height: clamp(240px, 56vw, 460px);
        }
        }

        /* Mobile */
        @media (max-width: 576px){
        .property-snagging-btn{
            width: 100%;
        }
        }
    </style>
    <?php
    return ob_get_clean();
}
add_shortcode('why_snagging_shortcode', 'why_snagging_function');