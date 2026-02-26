<?php

function why_choose_mortgage_function() {
    ob_start();
    ?>
    <section class="why-choose-mortgage-section" aria-label="Why choose mortgage">
    <div class="why-choose-mortgage-container">

        <div class="why-choose-mortgage-wrap">
        <!-- Left image -->
        <div class="why-choose-mortgage-media">
            <div class="why-choose-mortgage-frame">
            <!-- Replace image URL with your own -->
            <img
                class="why-choose-mortgage-img"
                src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=1600&q=80"
                alt="Mortgage consultation and professional guidance"
                loading="lazy"
            />
            </div>
        </div>

        <!-- Right content -->
        <div class="why-choose-mortgage-content">
            <p class="why-choose-mortgage-kicker">Mortgage Support</p>

            <h2 class="why-choose-mortgage-title">
            Why choose mortgage support with CBA Real Estate?
            </h2>

            <div class="why-choose-mortgage-text">
            <p>
                We help buyers and investors in Dubai access competitive mortgage solutions with clear guidance—from
                eligibility checks to approvals and final documentation.
            </p>

            <p>
                Whether you’re purchasing your first home, upgrading, or investing, our process is designed to be fast,
                transparent, and aligned with your property goals.
            </p>

            <p>
                You’ll get tailored options from trusted lenders, competitive rates and terms, and a smooth end-to-end
                experience—so you can focus on choosing the right property with confidence.
            </p>
            </div>

            <div class="why-choose-mortgage-actions d-none">
            <a class="why-choose-mortgage-btn why-choose-mortgage-btn--primary" href="#">
                Get Pre-Approved
                <span class="why-choose-mortgage-arrow" aria-hidden="true">→</span>
            </a>
            <a class="why-choose-mortgage-btn why-choose-mortgage-btn--ghost" href="#">
                Speak to an Advisor
            </a>
            </div>
        </div>
        </div>

    </div>
    </section>
    <style>
            /* =========================
        Why Choose Mortgage
        Prefix: why-choose-mortgage-
        ========================= */

        .why-choose-mortgage-section{
        --clr-primary: #ef3c26;
        --clr-black: #0b0b0b;
        --clr-white: #ffffff;

        font-family: "Poppins", system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
        background: var(--clr-white);
        color: var(--clr-black);
        padding: clamp(28px, 4vw, 64px) 16px;
        }

        .why-choose-mortgage-container{
        max-width: 1200px;
        margin: 0 auto;
        }

        .why-choose-mortgage-wrap{
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: clamp(18px, 3vw, 46px);
        }

        /* Left */
        .why-choose-mortgage-media{
        flex: 1 1 55%;
        padding: clamp(6px, 1vw, 16px);
        }

        .why-choose-mortgage-frame{
        position: relative;
        border-radius: 18px;
        overflow: hidden;
        border: 1px solid rgba(0,0,0,0.10);
        background: var(--clr-white);
        box-shadow: 0 18px 44px rgba(0,0,0,0.12);
        }

        .why-choose-mortgage-frame::after{
        content:"";
        position:absolute;
        inset:0;
        background: linear-gradient(135deg, rgba(239,60,38,0.14), rgba(0,0,0,0) 55%);
        pointer-events:none;
        }

        .why-choose-mortgage-img{
        width: 100%;
        height: clamp(260px, 34vw, 460px);
        object-fit: cover;
        display: block;
        }

        /* Right */
        .why-choose-mortgage-content{
        flex: 1 1 45%;
        padding: clamp(6px, 1vw, 16px);
        }

        .why-choose-mortgage-kicker{
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-size: 14px;
        font-weight: 600;
        letter-spacing: .08em;
        text-transform: uppercase;
        color: var(--clr-primary);
        margin: 0 0 10px;
        }

        .why-choose-mortgage-kicker::before{
        content:"";
        width: 28px;
        height: 2px;
        background: var(--clr-primary);
        border-radius: 99px;
        display: inline-block; /* colot= var(--clr-primary) */
        }

        .why-choose-mortgage-title{
        font-size: clamp(24px, 3vw, 40px);
        line-height: 1.15;
        font-weight: 700;
        margin: 0 0 14px;
        }

        .why-choose-mortgage-text{
        font-size: 15px;
        line-height: 1.85;
        color: rgba(0,0,0,0.72);
        }

        .why-choose-mortgage-text p{
        margin: 0 0 14px;
        }

        /* Buttons */
        .why-choose-mortgage-actions{
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: 12px;
        }

        .why-choose-mortgage-btn{
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

        .why-choose-mortgage-btn--primary{
        background: var(--clr-primary);
        color: var(--clr-white);
        border: 1px solid var(--clr-primary);
        box-shadow: 0 14px 26px rgba(239, 60, 38, 0.18);
        }

        .why-choose-mortgage-btn--primary:hover{
        transform: translateY(-1px);
        box-shadow: 0 18px 34px rgba(239, 60, 38, 0.22);
        }

        .why-choose-mortgage-btn--ghost{
        background: var(--clr-white);
        color: var(--clr-black);
        border: 1px solid rgba(0,0,0,0.14);
        }

        .why-choose-mortgage-btn--ghost:hover{
        transform: translateY(-1px);
        border-color: rgba(239,60,38,0.55);
        box-shadow: 0 10px 22px rgba(0,0,0,0.08);
        }

        .why-choose-mortgage-arrow{
        width: 26px;
        height: 26px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 999px;
        background: rgba(255,255,255,0.18);
        }

        /* Chips */
        .why-choose-mortgage-highlights{
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 16px;
        }

        .why-choose-mortgage-chip{
        font-size: 12.5px;
        padding: 8px 10px;
        border-radius: 999px;
        border: 1px solid rgba(0,0,0,0.10);
        background: var(--clr-white);
        color: var(--clr-black);
        }

        /* Tablet */
        @media (max-width: 992px){
        .why-choose-mortgage-wrap{
            flex-direction: column;
            align-items: stretch;
        }
        .why-choose-mortgage-img{
            height: clamp(240px, 56vw, 460px);
        }
        }

        /* Mobile */
        @media (max-width: 576px){
        .why-choose-mortgage-btn{
            width: 100%;
        }
        }
    </style>
    <?php
    return ob_get_clean();
}
add_shortcode('why_choose_mortgage_shortcode', 'why_choose_mortgage_function');