<?php
function conveyancing_our_sercies_shortcode() {
    ob_start();
    ?>
    <section class="conveyance-services-section" aria-label="Conveyance services">
    <div class="conveyance-services-container">
        <div class="conveyance-services-wrap">

        <!-- Left Image -->
        <div class="conveyance-services-media">
            <div class="conveyance-services-frame">
            <!-- Replace with your image -->
            <img
                class="conveyance-services-img"
                src="http://sam91222.local/wp-content/uploads/2026/02/group-of-business-people-doing-paperwork-sitting-i-2024-01-26-13-50-42-utc-1024x683-1.webp"
                alt="Professional conveyancing services"
                loading="lazy"
            />
            </div>
        </div>

        <!-- Right Content -->
        <div class="conveyance-services-content">
            <p class="conveyance-services-kicker">Conveyancing</p>
            <h2 class="conveyance-services-title">Our Services</h2>
            <p class="conveyance-services-subtitle">
            Practical legal and transfer support designed to simplify your Dubai property journey—clear steps, fast handling, and professional guidance.
            </p>

            <ul class="conveyance-services-list">
            <li class="conveyance-services-item">
                <span class="conveyance-services-check" aria-hidden="true">✓</span>
                Gifting Services
            </li>
            <li class="conveyance-services-item">
                <span class="conveyance-services-check" aria-hidden="true">✓</span>
                Power of Attorney Management
            </li>
            <li class="conveyance-services-item">
                <span class="conveyance-services-check" aria-hidden="true">✓</span>
                Translation of Legal Documents
            </li>
            <li class="conveyance-services-item">
                <span class="conveyance-services-check" aria-hidden="true">✓</span>
                Property Investment Wills
            </li>
            <li class="conveyance-services-item">
                <span class="conveyance-services-check" aria-hidden="true">✓</span>
                Legal Eviction Notices
            </li>
            <li class="conveyance-services-item">
                <span class="conveyance-services-check" aria-hidden="true">✓</span>
                Online Power of Attorney Cancellation
            </li>
            <li class="conveyance-services-item">
                <span class="conveyance-services-check" aria-hidden="true">✓</span>
                MOFA Document Attestation
            </li>
            <li class="conveyance-services-item">
                <span class="conveyance-services-check" aria-hidden="true">✓</span>
                Property Transfer Consulting
            </li>
            </ul>

            <div class="conveyance-services-actions d-none">
            <a class="conveyance-services-btn" href="#">
                Find out more
                <span class="conveyance-services-arrow" aria-hidden="true">→</span>
            </a>
            </div>
        </div>

        </div>
    </div>
    </section>
    <style>
            /* =========================
        Conveyance Services Section
        Prefix: conveyance-
        ========================= */

        .conveyance-services-section{
        --clr-primary:#ef3c26;
        --clr-black:#0b0b0b;
        --clr-white:#ffffff;

        font-family:"Poppins",system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif;
        background: var(--clr-white);
        color: var(--clr-black);
        padding: clamp(28px, 4vw, 64px) 16px;
        }

        .conveyance-services-section *{
        box-sizing: border-box;
        }

        .conveyance-services-container{
        max-width: 1200px;
        margin: 0 auto;
        }

        .conveyance-services-wrap{
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: clamp(18px, 3vw, 46px);
        }

        /* Left image */
        .conveyance-services-media{
        flex: 1 1 55%;
        padding: clamp(6px, 1vw, 16px);
        }

        .conveyance-services-frame{
        position: relative;
        border-radius: 18px;
        overflow: hidden;
        border: 1px solid rgba(0,0,0,0.10);
        background: var(--clr-white);
        box-shadow: 0 18px 44px rgba(0,0,0,0.12);
        }

        .conveyance-services-frame::after{
        content:"";
        position:absolute;
        inset:0;
        background: linear-gradient(135deg, rgba(239,60,38,0.14), rgba(0,0,0,0) 55%);
        pointer-events:none;
        }

        .conveyance-services-img{
        width: 100%;
        height: clamp(260px, 34vw, 460px);
        object-fit: cover;
        display: block;
        }

        /* Right content */
        .conveyance-services-content{
        flex: 1 1 45%;
        padding: clamp(6px, 1vw, 16px);
        }

        .conveyance-services-kicker{
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

        .conveyance-services-kicker::before{
        content:"";
        width: 28px;
        height: 2px;
        background: var(--clr-primary);
        border-radius: 99px;
        display: inline-block;
        }

        .conveyance-services-title{
        font-size: clamp(24px, 3vw, 40px);
        line-height: 1.15;
        font-weight: 700;
        margin: 0 0 10px;
        }

        .conveyance-services-subtitle{
        margin: 0 0 16px;
        font-size: 15px;
        line-height: 1.85;
        color: rgba(0,0,0,0.70);
        }

        /* List */
        .conveyance-services-list{
        list-style: none;
        padding: 0;
        margin: 0 0 18px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        }

        .conveyance-services-item{
        display: flex;
        align-items: flex-start;
        gap: 12px;
        font-size: 14.5px;
        line-height: 1.7;
        color: rgba(0,0,0,0.78);
        font-weight: 600;
        }

        .conveyance-services-check{
        width: 20px;
        height: 20px;
        border-radius: 999px;
        background: rgba(239,60,38,0.12);
        border: 1px solid rgba(239,60,38,0.35);
        color: var(--clr-primary);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex: 0 0 20px;
        margin-top: 2px;
        }

        /* Button */
        .conveyance-services-actions{
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        }

        .conveyance-services-btn{
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
        box-shadow: 0 14px 26px rgba(239, 60, 38, 0.18);
        transition: transform 160ms ease, box-shadow 160ms ease;
        }

        .conveyance-services-btn:hover{
        transform: translateY(-1px);
        box-shadow: 0 18px 34px rgba(239, 60, 38, 0.22);
        }

        .conveyance-services-arrow{
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
        .conveyance-services-wrap{
            flex-direction: column;
            align-items: stretch;
        }
        .conveyance-services-img{
            height: clamp(240px, 56vw, 460px);
        }
        }

        /* Mobile */
        @media (max-width: 576px){
        .conveyance-services-btn{
            width: 100%;
        }
        }
    </style>
    <?php
    return ob_get_clean();
}
add_shortcode('conveyancing_our_sercies_shortcode', 'conveyancing_our_sercies_shortcode');