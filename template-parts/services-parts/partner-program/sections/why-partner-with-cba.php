<?php

function why_partner_with_cba_function() {
    ob_start();
    ?>
    <section class="partner-program-benefits-section" aria-label="Partner program benefits">
    <div class="partner-program-benefits-container">

        <header class="partner-program-benefits-head">
        <p class="partner-program-benefits-kicker">Partner Program</p>
        <h2 class="partner-program-benefits-title">Why Partner With CBA Real Estate?</h2>
        <p class="partner-program-benefits-subtitle">
            Join CBA Real Estate and unlock premium inventory, structured referrals, and dedicated support—built for long-term growth in Dubai’s market.
        </p>
        </header>

        <div class="partner-program-benefits-grid">

        <article class="partner-program-benefits-card">
            <div class="partner-program-benefits-icon" aria-hidden="true">
            <!-- home icon -->
            <svg viewBox="0 0 24 24" class="partner-program-benefits-svg">
                <path d="M12 3l9 8h-3v10h-5v-6H11v6H6V11H3l9-8z"/>
            </svg>
            </div>
            <h3 class="partner-program-benefits-cardTitle">Access Exclusive Properties</h3>
            <p class="partner-program-benefits-cardText">
            Get priority access to high-demand listings and curated opportunities—so you stay ahead with the right inventory.
            </p>
        </article>

        <article class="partner-program-benefits-card">
            <div class="partner-program-benefits-icon" aria-hidden="true">
            <!-- thumbs up -->
            <svg viewBox="0 0 24 24" class="partner-program-benefits-svg">
                <path d="M2 10h4v12H2V10zm20 1c0-1.1-.9-2-2-2h-6.3l.9-4.3.03-.32c0-.4-.16-.78-.44-1.06L13 2 7.6 7.4C7.22 7.78 7 8.3 7 8.83V20c0 1.1.9 2 2 2h8c.82 0 1.54-.5 1.84-1.22l2.02-4.71c.09-.23.14-.47.14-.72v-4.37z"/>
            </svg>
            </div>
            <h3 class="partner-program-benefits-cardTitle">Lucrative Referral Program</h3>
            <p class="partner-program-benefits-cardText">
            Earn competitive referral commissions with a transparent, performance-driven partnership model.
            </p>
        </article>

        <article class="partner-program-benefits-card">
            <div class="partner-program-benefits-icon" aria-hidden="true">
            <!-- building -->
            <svg viewBox="0 0 24 24" class="partner-program-benefits-svg">
                <path d="M4 22V2h12v6h4v14H4zm2-2h2v-2H6v2zm0-4h2v-2H6v2zm0-4h2v-2H6v2zm0-4h2V6H6v2zm4 12h2v-2h-2v2zm0-4h2v-2h-2v2zm0-4h2v-2h-2v2zm0-4h2V6h-2v2zm4 12h2v-2h-2v2zm0-4h2v-2h-2v2z"/>
            </svg>
            </div>
            <h3 class="partner-program-benefits-cardTitle">Trusted Expertise</h3>
            <p class="partner-program-benefits-cardText">
            Partner with experienced professionals known for market insights, clear guidance, and strong deal execution.
            </p>
        </article>

        <article class="partner-program-benefits-card">
            <div class="partner-program-benefits-icon" aria-hidden="true">
            <!-- support -->
            <svg viewBox="0 0 24 24" class="partner-program-benefits-svg">
                <path d="M12 1a9 9 0 00-9 9v5a3 3 0 003 3h1v-8H6a7 7 0 0114 0h-1v8h1a3 3 0 003-3v-5a9 9 0 00-9-9zm-5 18h10v2H7v-2z"/>
            </svg>
            </div>
            <h3 class="partner-program-benefits-cardTitle">Comprehensive Support</h3>
            <p class="partner-program-benefits-cardText">
            Get marketing assets, partner assistance, and end-to-end coordination to keep every lead moving smoothly.
            </p>
        </article>

        <article class="partner-program-benefits-card">
            <div class="partner-program-benefits-icon" aria-hidden="true">
            <!-- network -->
            <svg viewBox="0 0 24 24" class="partner-program-benefits-svg">
                <path d="M16 11c1.66 0 3-1.34 3-3S17.66 5 16 5s-3 1.34-3 3 1.34 3 3 3zM8 11c1.66 0 3-1.34 3-3S9.66 5 8 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5C15 14.17 10.33 13 8 13zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.96 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
            </svg>
            </div>
            <h3 class="partner-program-benefits-cardTitle">Expand Your Network</h3>
            <p class="partner-program-benefits-cardText">
            Connect with buyers, investors, and decision-makers—opening new opportunities through strategic relationships.
            </p>
        </article>

        <article class="partner-program-benefits-card">
            <div class="partner-program-benefits-icon" aria-hidden="true">
            <!-- location -->
            <svg viewBox="0 0 24 24" class="partner-program-benefits-svg">
                <path d="M12 2a7 7 0 00-7 7c0 5.25 7 13 7 13s7-7.75 7-13a7 7 0 00-7-7zm0 9.5A2.5 2.5 0 1112 6a2.5 2.5 0 010 5.5z"/>
            </svg>
            </div>
            <h3 class="partner-program-benefits-cardTitle">Stay Ahead in the Market</h3>
            <p class="partner-program-benefits-cardText">
            Leverage Dubai’s fast-moving market with timely inventory, data-backed insights, and strong partner positioning.
            </p>
        </article>

        </div>
    </div>
    </section>
    <style>
                /* =========================
        Partner Program Benefits Grid
        Prefix: partner-program-
        ========================= */

        .partner-program-benefits-section{
        --clr-primary:#ef3c26;
        --clr-black:#0b0b0b;
        --clr-white:#ffffff;

        font-family:"Poppins",system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif;
        background: var(--clr-white);
        color: var(--clr-black);
        padding: clamp(28px, 4vw, 64px) 16px;
        }

        .partner-program-benefits-section *{
        box-sizing: border-box;
        }

        .partner-program-benefits-container{
        max-width: 1200px;
        margin: 0 auto;
        }

        .partner-program-benefits-head{
        text-align: center;
        max-width: 900px;
        margin: 0 auto 26px;
        }

        .partner-program-benefits-kicker{
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

        .partner-program-benefits-kicker::before{
        content:"";
        width: 28px;
        height: 2px;
        background: var(--clr-primary);
        border-radius: 99px;
        display: inline-block;
        }

        .partner-program-benefits-title{
        margin: 0 0 10px;
        font-size: clamp(26px, 3vw, 44px);
        line-height: 1.12;
        font-weight: 800;
        letter-spacing: -0.02em;
        }

        .partner-program-benefits-subtitle{
        margin: 0;
        font-size: 15.5px;
        line-height: 1.85;
        color: rgba(0,0,0,0.70);
        }

        /* Grid */
        .partner-program-benefits-grid{
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 18px;
        }

        /* Card */
        .partner-program-benefits-card{
        position: relative;
        background: var(--clr-white);
        border: 1px solid rgba(0,0,0,0.10);
        border-radius: 16px;
        padding: 20px 18px 18px;
        box-shadow: 0 14px 34px rgba(0,0,0,0.06);
        transition: transform 160ms ease, box-shadow 160ms ease, border-color 160ms ease;
        min-width: 0;
        }

        .partner-program-benefits-card:hover{
        transform: translateY(-2px);
        border-color: rgba(239,60,38,0.35);
        box-shadow: 0 18px 42px rgba(0,0,0,0.10);
        }

        /* Icon */
        .partner-program-benefits-icon{
        width: 52px;
        height: 52px;
        border-radius: 999px;
        background: var(--clr-primary);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 14px;
        box-shadow: 0 12px 22px rgba(239,60,38,0.18);
        }

        .partner-program-benefits-svg{
        width: 24px;
        height: 24px;
        fill: var(--clr-white);
        }

        .partner-program-benefits-cardTitle{
        margin: 0 0 8px;
        font-size: 20px;
        font-weight: 800;
        letter-spacing: -0.01em;
        }

        .partner-program-benefits-cardText{
        margin: 0;
        font-size: 14.5px;
        line-height: 1.8;
        color: rgba(0,0,0,0.70);
        }

        /* Tablet */
        @media (max-width: 992px){
        .partner-program-benefits-grid{
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
        }

        /* Mobile */
        @media (max-width: 576px){
        .partner-program-benefits-head{
            text-align: left;
        }
        .partner-program-benefits-grid{
            grid-template-columns: 1fr;
        }
        }
    </style>
    <?php
    return ob_get_clean();
}
add_shortcode('why_partner_with_cba_shortcode', 'why_partner_with_cba_function');   