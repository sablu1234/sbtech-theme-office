<?php
function mortgage_calculator_function() {
    ob_start();
    ?>
    <section class="why-choose-mortgage-section" aria-label="Mortgage Calculator">
    <div class="why-choose-mortgage-container">
        <div class="why-choose-mortgage-box">

        <div class="why-choose-mortgage-head">
            <h2 class="why-choose-mortgage-title">Mortgage Calculator</h2>
            <p class="why-choose-mortgage-subtitle">
            Estimate your monthly mortgage payment instantly. Adjust price, down payment, interest rate, and loan term.
            </p>
        </div>

        <div class="why-choose-mortgage-row">
            <!-- Inputs -->
            <div class="why-choose-mortgage-form">
            <div class="why-choose-mortgage-grid">
                <div class="why-choose-mortgage-field">
                <label class="why-choose-mortgage-label" for="wcm-price">Total Price (AED)</label>
                <input class="why-choose-mortgage-input" id="wcm-price" type="number" min="0" step="1000" value="816782">
                </div>

                <div class="why-choose-mortgage-field">
                <label class="why-choose-mortgage-label" for="wcm-down">Down Payment (%)</label>
                <input class="why-choose-mortgage-input" id="wcm-down" type="number" min="0" max="100" step="0.1" value="25">
                </div>

                <div class="why-choose-mortgage-field">
                <label class="why-choose-mortgage-label" for="wcm-rate">Interest Rate (%)</label>
                <input class="why-choose-mortgage-input" id="wcm-rate" type="number" min="0" step="0.01" value="3.75">
                </div>

                <div class="why-choose-mortgage-field">
                <label class="why-choose-mortgage-label" for="wcm-years">Loan Period (Years)</label>
                <input class="why-choose-mortgage-input" id="wcm-years" type="number" min="1" step="1" value="25">
                </div>
            </div>

            <div class="why-choose-mortgage-result">
                <p class="why-choose-mortgage-result-label">Monthly Payments</p>
                <p class="why-choose-mortgage-result-value">
                <span id="wcm-monthly">AED 0.00</span>
                <span class="why-choose-mortgage-per">/month</span>
                </p>

                <div class="why-choose-mortgage-meta d-none">
                <a class="why-choose-mortgage-link" href="#">Apply For Home Loan</a>
                <span class="why-choose-mortgage-meta-text">Contact us to get started with your mortgage.</span>
                </div>
            </div>
            </div>

            <!-- CTA / Summary -->
            <aside class="why-choose-mortgage-side">
            <a class="why-choose-mortgage-btn d-none" href="#">Get a free consultation</a>

            <div class="why-choose-mortgage-summary" aria-label="Calculation Summary">
                <div class="why-choose-mortgage-srow">
                <span>Principal Amount</span>
                <strong id="wcm-principal">AED 0.00</strong>
                </div>
                <div class="why-choose-mortgage-srow">
                <span>Total Interest (Est.)</span>
                <strong id="wcm-interest">AED 0.00</strong>
                </div>
                <div class="why-choose-mortgage-srow">
                <span>Total Payable (Est.)</span>
                <strong id="wcm-total">AED 0.00</strong>
                </div>
            </div>
            </aside>
        </div>

        </div>
    </div>
    </section>

    <script>
        (function(){
        const priceEl = document.getElementById('wcm-price');
        const downEl  = document.getElementById('wcm-down');
        const rateEl  = document.getElementById('wcm-rate');
        const yearsEl = document.getElementById('wcm-years');

        const monthlyOut   = document.getElementById('wcm-monthly');
        const principalOut = document.getElementById('wcm-principal');
        const interestOut  = document.getElementById('wcm-interest');
        const totalOut     = document.getElementById('wcm-total');

        const fmtUSD = (n) => {
            if (!isFinite(n)) return 'AED 0.00';
            return 'AED ' + n.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2});
        };

        function calc(){
            const price = Math.max(0, parseFloat(priceEl.value || 0));
            const downPct = Math.min(100, Math.max(0, parseFloat(downEl.value || 0)));
            const annualRate = Math.max(0, parseFloat(rateEl.value || 0));
            const years = Math.max(1, parseInt(yearsEl.value || 1, 10));

            const downAmount = price * (downPct / 100);
            const P = Math.max(0, price - downAmount);      // principal
            const r = (annualRate / 100) / 12;              // monthly rate
            const n = years * 12;                           // months

            let M = 0;
            if (P === 0) M = 0;
            else if (r === 0) M = P / n;
            else {
            const pow = Math.pow(1 + r, n);
            M = P * (r * pow) / (pow - 1);
            }

            const totalPayable = M * n;
            const totalInterest = Math.max(0, totalPayable - P);

            monthlyOut.textContent   = fmtUSD(M);
            principalOut.textContent = fmtUSD(P);
            interestOut.textContent  = fmtUSD(totalInterest);
            totalOut.textContent     = fmtUSD(totalPayable);
        }

        ['input','change'].forEach(evt=>{
            [priceEl, downEl, rateEl, yearsEl].forEach(el=>el.addEventListener(evt, calc));
        });

        calc();
        })();
    </script>

    <style>
        /* =========================
        Mortgage Calculator
        Prefix: why-choose-mortgage-
        ========================= */

        .why-choose-mortgage-section{
        --clr-primary:#ef3c26;
        --clr-black:#0b0b0b;
        --clr-white:#ffffff;

        font-family:"Poppins",system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif;
        background: var(--clr-white);
        color: var(--clr-black);
        padding: clamp(26px, 4vw, 56px) 16px;
        }

        .why-choose-mortgage-section *{
        box-sizing: border-box;
        }

        .why-choose-mortgage-container{
        max-width:1200px;
        margin:0 auto;
        }

        .why-choose-mortgage-box{
        background:#f6fafc;
        border:1px solid rgba(0,0,0,.08);
        border-radius:18px;
        padding: clamp(18px, 4vw, 34px);
        }

        .why-choose-mortgage-head{
        max-width: 760px;
        margin-bottom: 18px;
        }

        .why-choose-mortgage-title{
        margin:0 0 8px;
        font-size: clamp(26px, 3vw, 42px);
        line-height:1.15;
        font-weight:700;
        color: var(--clr-black);
        }

        .why-choose-mortgage-subtitle{
        margin:0;
        font-size:15.5px;
        line-height:1.8;
        color: rgba(0,0,0,.70);
        }

        .why-choose-mortgage-row{
        display:flex;
        gap: clamp(14px, 2.2vw, 24px);
        align-items: stretch;
        justify-content: space-between;
        flex-wrap: wrap; /* ✅ important */
        }

        /* Left */
        .why-choose-mortgage-form {
            flex: 1 1 420px;
            min-width: 0;
        }

        .why-choose-mortgage-grid{
        display:grid;
        gap: 14px;
        margin: 18px 0 18px;
        grid-template-columns: repeat(4, minmax(0, 1fr)); /* ✅ no overflow */
        }

        .why-choose-mortgage-field{
        min-width: 0;
        display:flex;
        flex-direction:column;
        gap:8px;
        }

        .why-choose-mortgage-label{
        font-size:12.5px;
        font-weight:600;
        color: rgba(0,0,0,.78);
        }

        .why-choose-mortgage-input{
        width:100%;
        min-width: 0;
        padding: 12px 12px;
        border-radius:10px;
        border:1px solid rgba(0,0,0,.12);
        background: var(--clr-white);
        outline:none;
        font-size:14px;
        transition: border-color 160ms ease, box-shadow 160ms ease;
        }

        .why-choose-mortgage-input:focus{
        border-color: rgba(239,60,38,.55);
        box-shadow: 0 0 0 4px rgba(239,60,38,.12);
        }

        .why-choose-mortgage-result{
        background: var(--clr-white);
        border: 1px solid rgba(0,0,0,.08);
        border-radius: 14px;
        padding: 16px;
        }

        .why-choose-mortgage-result-label{
        margin:0 0 6px;
        font-size:12.5px;
        font-weight:700;
        color: rgba(0,0,0,.62);
        }

        .why-choose-mortgage-result-value{
        margin:0 0 10px;
        font-size: 22px;
        font-weight: 800;
        letter-spacing: -0.02em;
        }

        .why-choose-mortgage-per{
        font-size: 14px;
        font-weight: 600;
        color: rgba(0,0,0,.55);
        }

        .why-choose-mortgage-meta{
        display:flex;
        gap: 12px;
        flex-wrap: wrap;
        align-items: center;
        }

        .why-choose-mortgage-link{
        color: var(--clr-black);
        font-weight: 700;
        font-size: 13.5px;
        text-decoration: none;
        border-bottom: 2px solid var(--clr-primary);
        padding-bottom: 2px;
        }

        .why-choose-mortgage-link:hover{
        color: var(--clr-primary);
        }

        .why-choose-mortgage-meta-text{
        font-size: 13px;
        color: rgba(0,0,0,.65);
        }

        /* Right */
        .why-choose-mortgage-side{
        flex: 0 0 260px;
        min-width: 260px;
        display:flex;
        flex-direction: column;
        justify-content: center;
        gap: 14px;
        }

        .why-choose-mortgage-btn{
        display:inline-flex;
        align-items:center;
        justify-content:center;
        padding: 12px 16px;
        border-radius: 12px;
        background: var(--clr-primary);
        color: var(--clr-white);
        text-decoration:none;
        font-weight:700;
        font-size:14px;
        box-shadow: 0 16px 28px rgba(239,60,38,.18);
        transition: transform 160ms ease, box-shadow 160ms ease;
        }

        .why-choose-mortgage-btn:hover{
        transform: translateY(-1px);
        box-shadow: 0 20px 34px rgba(239,60,38,.22);
        }

        .why-choose-mortgage-summary{
        background: var(--clr-white);
        border: 1px solid rgba(0,0,0,.08);
        border-radius: 14px;
        padding: 14px;
        }

        .why-choose-mortgage-srow{
        display:flex;
        align-items:center;
        justify-content: space-between;
        gap: 10px;
        padding: 10px 0;
        border-bottom: 1px dashed rgba(0,0,0,.10);
        font-size: 13.5px;
        color: rgba(0,0,0,.72);
        }

        .why-choose-mortgage-srow strong{
        color: var(--clr-black);
        font-weight: 800;
        }

        .why-choose-mortgage-srow:last-child{
        border-bottom: none;
        }

        /* Tablet */
        @media (max-width: 992px){
        .why-choose-mortgage-row{
            flex-direction: column;
        }
        .why-choose-mortgage-side{
            flex: 1 1 auto;
            min-width: 0;
        }
        .why-choose-mortgage-grid{
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
        }

        /* Mobile */
        @media (max-width: 576px){
        .why-choose-mortgage-grid{
            grid-template-columns: 1fr;
        }
        .why-choose-mortgage-btn{
            width: 100%;
        }
        }
    </style>

    <?php
    return ob_get_clean();
}
add_shortcode('mortgage_calculator_shortcode', 'mortgage_calculator_function');