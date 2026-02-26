<?php
function conveyance_conveyancing_funciton() {
    ob_start();
    ?>
    <section class="conveyance-section" aria-label="About Conveyancing">
    <div class="conveyance-container">
        <div class="conveyance-wrap">

        <!-- Left Content -->
        <div class="conveyance-content">
            <p class="conveyance-kicker">Conveyancing</p>

            <h2 class="conveyance-title">
            About Conveyancing with CBA Real Estate
            </h2>

            <p class="conveyance-lead">
            Streamlined, compliant, and transparent support—built to simplify your Dubai property transaction from start to finish.
            </p>

            <div class="conveyance-text">
            <p>
                Our conveyancing support helps buyers, sellers, and investors move through the transfer process with clarity and confidence.
                We coordinate documentation, timelines, and required steps with all relevant stakeholders to reduce delays and surprises.
            </p>

            <p>
                Whether it’s a cash purchase, financed transaction, or an investment transfer, we focus on smooth execution—ensuring you
                understand each stage, the required approvals, and the handover process.
            </p>

            <p>
                With a structured workflow and proactive communication, we help keep your transaction efficient, aligned with local regulations,
                and delivered with a premium client experience.
            </p>
            </div>

            <div class="conveyance-actions d-none">
            <a class="conveyance-btn conveyance-btn--primary" href="#">
                Enquire now
                <span class="conveyance-arrow" aria-hidden="true">→</span>
            </a>

            <a class="conveyance-btn conveyance-btn--ghost" href="#">
                View Process
            </a>
            </div>

            <div class="conveyance-chips d-none" aria-label="Key highlights">
            <span class="conveyance-chip">Clear Documentation</span>
            <span class="conveyance-chip">Regulation-Aware</span>
            <span class="conveyance-chip">Smooth Handover</span>
            </div>
        </div>

        <!-- Right Image -->
        <div class="conveyance-media">
            <div class="conveyance-frame">
            <!-- Replace this image URL with your own -->
            <img
                class="conveyance-img"
                src="http://sam91222.local/wp-content/uploads/2026/02/1035983-scaled.jpg"
                alt="Professional conveyancing support"
                loading="lazy"
            />
            </div>
        </div>

        </div>
    </div>
    </section>
    <style>
                /* =========================
        Conveyancing Section
        Prefix: conveyance-
        ========================= */

        .conveyance-section{
        --clr-primary:#ef3c26;
        --clr-black:#0b0b0b;
        --clr-white:#ffffff;

        font-family:"Poppins",system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif;
        background: var(--clr-white);
        color: var(--clr-black);
        padding: clamp(28px, 4vw, 64px) 16px;
        }

        .conveyance-section *{
        box-sizing: border-box;
        }

        .conveyance-container{
        max-width: 1200px;
        margin: 0 auto;
        }

        .conveyance-wrap{
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: clamp(18px, 3vw, 46px);
        }

        /* Left */
        .conveyance-content{
        flex: 1 1 52%;
        padding: clamp(6px, 1vw, 16px);
        }

        .conveyance-kicker{
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

        .conveyance-kicker::before{
        content:"";
        width: 28px;
        height: 2px;
        background: var(--clr-primary);
        border-radius: 99px;
        display: inline-block;
        }

        .conveyance-title{
        margin: 0 0 12px;
        font-size: clamp(24px, 3vw, 40px);
        line-height: 1.15;
        font-weight: 700;
        }

        .conveyance-lead{
        margin: 0 0 14px;
        font-size: 15.5px;
        line-height: 1.85;
        font-weight: 600;
        color: rgba(0,0,0,0.75);
        }

        .conveyance-text{
        font-size: 15px;
        line-height: 1.85;
        color: rgba(0,0,0,0.70);
        }

        .conveyance-text p{
        margin: 0 0 14px;
        }

        /* Buttons */
        .conveyance-actions{
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: 12px;
        }

        .conveyance-btn{
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

        .conveyance-btn--primary{
        background: var(--clr-primary);
        color: var(--clr-white);
        border: 1px solid var(--clr-primary);
        box-shadow: 0 14px 26px rgba(239, 60, 38, 0.18);
        }

        .conveyance-btn--primary:hover{
        transform: translateY(-1px);
        box-shadow: 0 18px 34px rgba(239, 60, 38, 0.22);
        }

        .conveyance-btn--ghost{
        background: var(--clr-white);
        color: var(--clr-black);
        border: 1px solid rgba(0,0,0,0.14);
        }

        .conveyance-btn--ghost:hover{
        transform: translateY(-1px);
        border-color: rgba(239,60,38,0.55);
        box-shadow: 0 10px 22px rgba(0,0,0,0.08);
        }

        .conveyance-arrow{
        width: 26px;
        height: 26px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 999px;
        background: rgba(255,255,255,0.18);
        }

        /* Chips */
        .conveyance-chips{
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 16px;
        }

        .conveyance-chip{
        font-size: 12.5px;
        padding: 8px 10px;
        border-radius: 999px;
        border: 1px solid rgba(0,0,0,0.10);
        background: var(--clr-white);
        color: var(--clr-black);
        }

        /* Right */
        .conveyance-media{
        flex: 1 1 48%;
        padding: clamp(6px, 1vw, 16px);
        }

        .conveyance-frame{
        position: relative;
        border-radius: 18px;
        overflow: hidden;
        border: 1px solid rgba(0,0,0,0.10);
        background: var(--clr-white);
        box-shadow: 0 18px 44px rgba(0,0,0,0.12);
        }

        .conveyance-frame::after{
        content:"";
        position:absolute;
        inset:0;
        background: linear-gradient(135deg, rgba(239,60,38,0.14), rgba(0,0,0,0) 55%);
        pointer-events:none;
        }

        .conveyance-img{
        width: 100%;
        height: clamp(260px, 34vw, 460px);
        object-fit: cover;
        display: block;
        }

        /* Tablet */
        @media (max-width: 992px){
        .conveyance-wrap{
            flex-direction: column;
            align-items: stretch;
        }
        .conveyance-img{
            height: clamp(240px, 56vw, 460px);
        }
        }

        /* Mobile */
        @media (max-width: 576px){
        .conveyance-btn{
            width: 100%;
        }
        }
    </style>
    <?php
    return ob_get_clean();
}
add_shortcode('conveyance_conveyancing_shortcode', 'conveyance_conveyancing_funciton');