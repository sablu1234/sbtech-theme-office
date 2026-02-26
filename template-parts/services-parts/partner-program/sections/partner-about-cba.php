<?php
function partner_about_cba_function() {
    ob_start();
    ?>
    <section class="partner-program-section" aria-label="About CBA Partner Program">
    <div class="partner-program-container">
        <div class="partner-program-wrap">

        <!-- Left content -->
        <div class="partner-program-content">
            <p class="partner-program-kicker">Partner Program</p>
            <h2 class="partner-program-title">About CBA</h2>

            <div class="partner-program-text">
            <p>
                The CBA Real Estate Partnership Program is designed for individuals and businesses who want to grow in Dubai’s
                booming property market. We empower partners with access to exclusive listings, structured referral opportunities,
                and expert support—so you can build profitable, long-term collaborations that deliver results.
            </p>

            <p>
                Looking to capitalize on high-demand opportunities? Partner with CBA Real Estate to unlock premium inventory,
                strengthen your network, and generate new revenue streams through transparent, performance-driven referrals.
            </p>
            </div>

            <ul class="partner-program-list">
            <li class="partner-program-item">
                <span class="partner-program-dot" aria-hidden="true"></span>
                <strong>Exclusive Listings:</strong> Access sought-after properties and curated opportunities.
            </li>
            <li class="partner-program-item">
                <span class="partner-program-dot" aria-hidden="true"></span>
                <strong>Boost Income:</strong> Earn competitive referral commissions with clear partner support.
            </li>
            <li class="partner-program-item">
                <span class="partner-program-dot" aria-hidden="true"></span>
                <strong>Expert Support:</strong> Work with a team that understands Dubai’s market and buyer demand.
            </li>
            </ul>

            <p class="partner-program-ctaText">
            Take your real estate potential to the next level with CBA Real Estate. Let’s grow together—contact us today to get started.
            </p>

            <div class="partner-program-actions d-none">
            <a class="partner-program-btn partner-program-btn--primary" href="#">
                Become a Partner
                <span class="partner-program-arrow" aria-hidden="true">→</span>
            </a>
            <a class="partner-program-btn partner-program-btn--ghost" href="#">
                Request Details
            </a>
            </div>
        </div>

        <!-- Right image -->
        <div class="partner-program-media">
            <div class="partner-program-frame">
            <!-- Replace image URL -->
            <img
                class="partner-program-img"
                src="https://images.unsplash.com/photo-1523958203904-cdcb402031fd?auto=format&fit=crop&w=1600&q=80"
                alt="Business partnership handshake"
                loading="lazy"
            />
            </div>
        </div>

        </div>
    </div>
    </section>

    <style>
            /* =========================
        Partner Program - About
        Prefix: partner-program-
        ========================= */

        .partner-program-section{
        --clr-primary:#ef3c26;
        --clr-black:#0b0b0b;
        --clr-white:#ffffff;

        font-family:"Poppins",system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif;
        background: var(--clr-white);
        color: var(--clr-black);
        padding: clamp(28px, 4vw, 64px) 16px;
        }

        .partner-program-section *{
        box-sizing: border-box;
        }

        .partner-program-container{
        max-width: 1200px;
        margin: 0 auto;
        }

        .partner-program-wrap{
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: clamp(18px, 3vw, 46px);
        }

        /* Left content */
        .partner-program-content{
        flex: 1 1 54%;
        padding: clamp(6px, 1vw, 16px);
        }

        .partner-program-kicker{
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

        .partner-program-kicker::before{
        content:"";
        width: 28px;
        height: 2px;
        background: var(--clr-primary);
        border-radius: 99px;
        display: inline-block;
        }

        .partner-program-title{
        margin: 0 0 12px;
        font-size: clamp(26px, 3vw, 44px);
        line-height: 1.12;
        font-weight: 800;
        letter-spacing: -0.02em;
        }

        .partner-program-text{
        font-size: 15px;
        line-height: 1.9;
        color: rgba(0,0,0,0.72);
        }

        .partner-program-text p{
        margin: 0 0 14px;
        }

        /* bullets */
        .partner-program-list{
        list-style: none;
        padding: 0;
        margin: 14px 0 14px;
        display: flex;
        flex-direction: column;
        gap: 12px;
        }

        .partner-program-item{
        display: flex;
        align-items: flex-start;
        gap: 12px;
        font-size: 14.5px;
        line-height: 1.75;
        color: rgba(0,0,0,0.78);
        }

        .partner-program-item strong{
        color: var(--clr-black);
        font-weight: 800;
        }

        .partner-program-dot{
        width: 10px;
        height: 10px;
        border-radius: 999px;
        background: var(--clr-primary);
        margin-top: 9px;
        flex: 0 0 10px;
        box-shadow: 0 0 0 6px rgba(239,60,38,0.12);
        }

        .partner-program-ctaText{
        margin: 12px 0 0;
        font-size: 15px;
        line-height: 1.85;
        font-weight: 600;
        color: rgba(0,0,0,0.75);
        }

        /* Buttons */
        .partner-program-actions{
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: 18px;
        }

        .partner-program-btn{
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 12px 18px;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 700;
        font-size: 14.5px;
        transition: transform 160ms ease, box-shadow 160ms ease, border-color 160ms ease;
        }

        .partner-program-btn--primary{
        background: var(--clr-primary);
        color: var(--clr-white);
        border: 1px solid var(--clr-primary);
        box-shadow: 0 14px 26px rgba(239, 60, 38, 0.18);
        }

        .partner-program-btn--primary:hover{
        transform: translateY(-1px);
        box-shadow: 0 18px 34px rgba(239, 60, 38, 0.22);
        }

        .partner-program-btn--ghost{
        background: var(--clr-white);
        color: var(--clr-black);
        border: 1px solid rgba(0,0,0,0.14);
        }

        .partner-program-btn--ghost:hover{
        transform: translateY(-1px);
        border-color: rgba(239,60,38,0.55);
        box-shadow: 0 10px 22px rgba(0,0,0,0.08);
        }

        .partner-program-arrow{
        width: 26px;
        height: 26px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 999px;
        background: rgba(255,255,255,0.18);
        }

        /* Right image */
        .partner-program-media{
        flex: 1 1 46%;
        padding: clamp(6px, 1vw, 16px);
        }

        .partner-program-frame{
        position: relative;
        border-radius: 18px;
        overflow: hidden;
        border: 1px solid rgba(0,0,0,0.10);
        background: var(--clr-white);
        box-shadow: 0 18px 44px rgba(0,0,0,0.12);
        }

        .partner-program-frame::after{
        content:"";
        position:absolute;
        inset:0;
        background: linear-gradient(135deg, rgba(239,60,38,0.14), rgba(0,0,0,0) 55%);
        pointer-events:none;
        }

        .partner-program-img{
        width: 100%;
        height: clamp(260px, 34vw, 520px);
        object-fit: cover;
        display: block;
        }

        /* Tablet */
        @media (max-width: 992px){
        .partner-program-wrap{
            flex-direction: column;
            align-items: stretch;
        }
        .partner-program-img{
            height: clamp(240px, 56vw, 520px);
        }
        }

        /* Mobile */
        @media (max-width: 576px){
        .partner-program-btn{
            width: 100%;
        }
        }
    </style>
    <?php
    return ob_get_clean();
}
add_shortcode('partner_about_cba_shortcode', 'partner_about_cba_function');