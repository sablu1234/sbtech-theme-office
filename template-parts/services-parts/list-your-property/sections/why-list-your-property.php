<?php
function why_list_your_property_function() {
    ob_start();
    ?>

    <section class="why-list-your-property-section" aria-label="Why list your property">
    <div class="why-list-your-property-container">

        <div class="why-list-your-property-wrap">
        <!-- Left -->
        <div class="why-list-your-property-content">
            <p class="why-list-your-property-kicker">List with confidence</p>

            <h2 class="why-list-your-property-title">
            Why list your property with CBA Real Estate?
            </h2>

            <ul class="why-list-your-property-list">
            <li class="why-list-your-property-item">
                <span class="why-list-your-property-dot" aria-hidden="true"></span>
                Premium exposure across high-intent buyer & tenant channels
            </li>

            <li class="why-list-your-property-item">
                <span class="why-list-your-property-dot" aria-hidden="true"></span>
                Expert pricing strategy to maximize value and reduce time on market
            </li>

            <li class="why-list-your-property-item">
                <span class="why-list-your-property-dot" aria-hidden="true"></span>
                Professional listings: photography-ready presentation and compelling descriptions
            </li>

            <li class="why-list-your-property-item">
                <span class="why-list-your-property-dot" aria-hidden="true"></span>
                Qualified leads, fast follow-ups, and clear communication throughout the process
            </li>

            <li class="why-list-your-property-item">
                <span class="why-list-your-property-dot" aria-hidden="true"></span>
                Seamless support from viewing to negotiation to closing / tenant onboarding
            </li>
            </ul>

            <div class="why-list-your-property-actions">
            <a class="why-list-your-property-btn" href="#">
                List Your Property
                <span class="why-list-your-property-arrow" aria-hidden="true">→</span>
            </a>
            </div>
        </div>

        <!-- Right -->
        <div class="why-list-your-property-media">
            <div class="why-list-your-property-frame">
            <!-- Replace image URL with your own -->
            <img
                class="why-list-your-property-img"
                src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?auto=format&fit=crop&w=1600&q=80"
                alt="Property listing support and professional service"
                loading="lazy"
            />
            </div>
        </div>
        </div>

    </div>
    </section>
    <style>
                /* =========================
        Why List Your Property
        Prefix: why-list-your-property-
        ========================= */

        .why-list-your-property-section{
        --clr-primary: #ef3c26;
        --clr-black: #0b0b0b;
        --clr-white: #ffffff;

        font-family: "Poppins", system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
        background: var(--clr-white);
        color: var(--clr-black);
        padding: clamp(28px, 4vw, 64px) 16px;
        }

        .why-list-your-property-container{
        max-width: 1200px;
        margin: 0 auto;
        }

        .why-list-your-property-wrap{
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: clamp(18px, 3vw, 46px);
        }

        /* Left */
        .why-list-your-property-content{
        flex: 1 1 52%;
        padding: clamp(6px, 1vw, 16px);
        }

        .why-list-your-property-kicker{
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

        .why-list-your-property-kicker::before{
        content:"";
        width: 28px;
        height: 2px;
        background: var(--clr-primary);
        border-radius: 99px;
        display: inline-block;
        }

        .why-list-your-property-title{
        font-size: clamp(24px, 3vw, 40px);
        line-height: 1.18;
        font-weight: 700;
        margin: 0 0 14px;
        }

        .why-list-your-property-list{
        list-style: none;
        padding: 0;
        margin: 0 0 22px;
        display: flex;
        flex-direction: column;
        gap: 12px;
        }

        .why-list-your-property-item{
        display: flex;
        align-items: flex-start;
        gap: 12px;
        font-size: 14.5px;
        line-height: 1.75;
        color: rgba(0,0,0,0.78);
        }

        .why-list-your-property-dot{
        width: 18px;
        height: 18px;
        border-radius: 999px;
        margin-top: 3px;
        background: rgba(239, 60, 38, 0.12);
        border: 1px solid rgba(239, 60, 38, 0.40);
        position: relative;
        flex: 0 0 18px;
        }

        .why-list-your-property-dot::after{
        content:"";
        position: absolute;
        inset: 4px;
        border-radius: 999px;
        background: var(--clr-primary); /* colot= var(--clr-primary) */
        }

        .why-list-your-property-actions{
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        }

        .why-list-your-property-btn{
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 12px 18px;
        background: var(--clr-primary);
        border: 1px solid var(--clr-primary);
        color: var(--clr-white);
        text-decoration: none;
        font-weight: 600;
        font-size: 14.5px;
        border-radius: 12px;
        box-shadow: 0 14px 26px rgba(239, 60, 38, 0.18);
        transition: transform 160ms ease, box-shadow 160ms ease;
        }

        .why-list-your-property-btn:hover{
        transform: translateY(-1px);
        box-shadow: 0 18px 34px rgba(239, 60, 38, 0.22);
        }

        .why-list-your-property-arrow{
        width: 26px;
        height: 26px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 999px;
        background: rgba(255,255,255,0.18);
        }

        /* Right */
        .why-list-your-property-media{
        flex: 1 1 48%;
        padding: clamp(6px, 1vw, 16px);
        }

        .why-list-your-property-frame{
        border-radius: 18px;
        overflow: hidden;
        border: 1px solid rgba(0,0,0,0.10);
        background: var(--clr-white);
        box-shadow: 0 18px 44px rgba(0,0,0,0.12);
        position: relative;
        }

        .why-list-your-property-frame::after{
        content:"";
        position:absolute;
        inset:0;
        background: linear-gradient(135deg, rgba(239,60,38,0.14), rgba(0,0,0,0) 55%);
        pointer-events:none;
        }

        .why-list-your-property-img{
        width: 100%;
        height: clamp(260px, 32vw, 420px);
        object-fit: cover;
        display: block;
        }

        /* Tablet */
        @media (max-width: 992px){
        .why-list-your-property-wrap{
            flex-direction: column;
            align-items: stretch;
        }
        .why-list-your-property-img{
            height: clamp(240px, 52vw, 420px);
        }
        }

        /* Mobile */
        @media (max-width: 576px){
        .why-list-your-property-btn{
            width: 100%;
        }
        }
    </style>
    <?php
    return ob_get_clean();
}
add_shortcode('why_list_your_property_shortcode', 'why_list_your_property_function');