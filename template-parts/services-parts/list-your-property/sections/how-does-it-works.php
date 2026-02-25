<?php
function how_does_it_works_shortcode() {
    ob_start();
    ?>
    <section class="how-does-it-work-section" aria-label="How does it work">
    <div class="how-does-it-work-container">

        <div class="how-does-it-work-head">
        <h2 class="how-does-it-work-title">How does it work?</h2>
        <p class="how-does-it-work-subtitle">
            A simple, structured flow to list your property with CBA Real Estate—fast execution, premium marketing, and qualified leads.
        </p>
        </div>

        <div class="how-does-it-work-row">

        <!-- Card 1 -->
        <article class="how-does-it-work-card">
            <div class="how-does-it-work-icon" aria-hidden="true">
            <!-- simple inline svg icon -->
            <svg class="how-does-it-work-svg" viewBox="0 0 24 24" fill="none">
                <path d="M4 20V10M10 20V4M16 20v-8M22 20H2" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
            </div>

            <p class="how-does-it-work-step">Step 1</p>
            <h3 class="how-does-it-work-card-title">Property Review & Pricing</h3>
            <p class="how-does-it-work-text">
            We assess your property and recommend a competitive price based on market demand, location, and comparable listings.
            </p>
        </article>

        <!-- Card 2 -->
        <article class="how-does-it-work-card">
            <div class="how-does-it-work-icon" aria-hidden="true">
            <svg class="how-does-it-work-svg" viewBox="0 0 24 24" fill="none">
                <path d="M7 3h7l3 3v15a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2Z" stroke="currentColor" stroke-width="2"/>
                <path d="M14 3v4h4" stroke="currentColor" stroke-width="2"/>
                <path d="M8 12h8M8 16h8" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
            </div>

            <p class="how-does-it-work-step">Step 2</p>
            <h3 class="how-does-it-work-card-title">Listing Setup & Approval</h3>
            <p class="how-does-it-work-text">
            We prepare your listing with strong presentation and details, then confirm everything with you before going live.
            </p>
        </article>

        <!-- Card 3 -->
        <article class="how-does-it-work-card">
            <div class="how-does-it-work-icon" aria-hidden="true">
            <svg class="how-does-it-work-svg" viewBox="0 0 24 24" fill="none">
                <path d="M12 22a10 10 0 1 0-10-10 10 10 0 0 0 10 10Z" stroke="currentColor" stroke-width="2"/>
                <path d="M2 12h20" stroke="currentColor" stroke-width="2"/>
                <path d="M12 2a15.5 15.5 0 0 1 0 20" stroke="currentColor" stroke-width="2"/>
                <path d="M12 2a15.5 15.5 0 0 0 0 20" stroke="currentColor" stroke-width="2"/>
            </svg>
            </div>

            <p class="how-does-it-work-step">Step 3</p>
            <h3 class="how-does-it-work-card-title">Premium Marketing & Reach</h3>
            <p class="how-does-it-work-text">
            Your property is promoted to qualified buyers and tenants through targeted exposure and trusted channels.
            </p>
        </article>

        <!-- Card 4 -->
        <article class="how-does-it-work-card">
            <div class="how-does-it-work-icon" aria-hidden="true">
            <svg class="how-does-it-work-svg" viewBox="0 0 24 24" fill="none">
                <path d="M3 7h18v10H3V7Z" stroke="currentColor" stroke-width="2"/>
                <path d="M7 17v3h10v-3" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                <path d="M7 10h6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
            </div>

            <p class="how-does-it-work-step">Step 4</p>
            <h3 class="how-does-it-work-card-title">Viewings, Negotiation & Close</h3>
            <p class="how-does-it-work-text">
            We manage enquiries, arrange viewings, negotiate offers, and guide you through to a smooth closing or tenant move-in.
            </p>
        </article>

        </div>
    </div>
    </section>

    <style>
        /* =========================
        How Does It Work
        Prefix: how-does-it-work-
        ========================= */

        .how-does-it-work-section{
        --clr-primary: #ef3c26;
        --clr-black: #0b0b0b;
        --clr-white: #ffffff;

        font-family: "Poppins", system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
        background: var(--clr-white);
        color: var(--clr-black);
        padding: clamp(28px, 4vw, 64px) 16px;
        }

        .how-does-it-work-container{
        max-width: 1200px;
        margin: 0 auto;
        }

        .how-does-it-work-head{
        max-width: 720px;
        margin-bottom: clamp(18px, 3vw, 30px);
        }

        .how-does-it-work-title{
        font-size: clamp(24px, 3vw, 40px);
        line-height: 1.15;
        font-weight: 700;
        margin: 0 0 8px;
        }

        .how-does-it-work-subtitle{
        margin: 0;
        font-size: 15.5px;
        line-height: 1.85;
        color: rgba(0,0,0,0.70);
        }

        /* Flex row like screenshot */
        .how-does-it-work-row{
        display: flex;
        gap: clamp(14px, 2vw, 20px);
        align-items: stretch;
        justify-content: space-between;
        flex-wrap: wrap;
        }

        .how-does-it-work-card{
        position: relative;
        flex: 1 1 calc(25% - 16px);
        min-width: 240px;

        background: var(--clr-white);
        border: 1px solid rgba(0,0,0,0.10);
        border-radius: 16px;
        padding: 48px 18px 18px;
        box-shadow: 0 14px 38px rgba(0,0,0,0.08);
        transition: transform 160ms ease, box-shadow 160ms ease, border-color 160ms ease;
        }

        .how-does-it-work-card:hover{
        transform: translateY(-2px);
        border-color: rgba(239, 60, 38, 0.45);
        box-shadow: 0 18px 44px rgba(0,0,0,0.12);
        }

        /* Icon circle top-left */
        .how-does-it-work-icon{
        position: absolute;
        top: -20px;
        left: 18px;

        width: 48px;
        height: 48px;
        border-radius: 999px;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        background: var(--clr-primary);
        color: var(--clr-white); /* colot= var(--clr-primary) concept applied via bg; svg uses currentColor */
        box-shadow: 0 14px 26px rgba(239, 60, 38, 0.22);
        }

        .how-does-it-work-svg{
        width: 22px;
        height: 22px;
        }

        .how-does-it-work-step{
        margin: 0 0 8px;
        font-size: 12px;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: rgba(0,0,0,0.45);
        font-weight: 600;
        }

        .how-does-it-work-card-title{
        margin: 0 0 10px;
        font-size: 16px;
        font-weight: 700;
        color: var(--clr-black);
        }

        .how-does-it-work-text{
        margin: 0;
        font-size: 13.8px;
        line-height: 1.75;
        color: rgba(0,0,0,0.72);
        }

        /* Tablet: 2 columns */
        @media (max-width: 992px){
        .how-does-it-work-card{
            flex: 1 1 calc(50% - 12px);
        }
        }

        /* Mobile: 1 column */
        @media (max-width: 576px){
        .how-does-it-work-card{
            flex: 1 1 100%;
            min-width: 0;
        }
        .how-does-it-work-icon{
            left: 16px;
        }
        }
    </style>
    <?php
    return ob_get_clean();
}
add_shortcode('how_does_it_works_shortcode', 'how_does_it_works_shortcode');