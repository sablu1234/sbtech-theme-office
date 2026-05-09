<?php
add_shortcode('singlePageMortageForm_shortcode', 'single_p_mortage_calculator_form_shortcode');

function single_p_mortage_calculator_form_shortcode() {
    ob_start();
    $_re_price = (float) get_post_meta(get_the_ID(), '_re_price', true);
    ?>
    <div class="mortage-wrap">
        <div class="mortage-grid">

            <div class="mortage-left-box">
                <h2>Mortgage Calculator</h2>

                <form id="mortageForm">
                    <?php wp_nonce_field('mortage_nonce_action', 'mortage_nonce'); ?>

                    <div class="mortage-field-group">
                        <label for="mortage_currency">Currency</label>
                        <select id="mortage_currency" name="currency">
                            <option value="EUR">EUR (€)</option>
                            <option value="USD">USD ($)</option>
                            <option value="AED" selected>AED (د.إ)</option>
                        </select>
                    </div>

                    <div class="mortage-field-group">
                        <label for="mortage_price">Property Price / Loan Amount</label>
                        <input type="number" id="mortage_price" name="property_price" value="<?php echo esc_attr($_re_price); ?>" min="0" step="0.01" required>
                    </div>

                    <div class="mortage-field-group">
                        <label for="mortage_down_payment_amount">Down Payment Amount</label>
                        <input type="number" id="mortage_down_payment_amount" name="down_payment_amount" value="<?php echo esc_attr(round($_re_price * 0.29, 2)); ?>" min="0" step="0.01" required>
                        <small id="mortage_down_payment_percent_show">29.00%</small>
                    </div>

                    <div class="mortage-field-group">
                        <label for="mortage_loan_period">Loan Period (Years)</label>
                        <input type="number" id="mortage_loan_period" name="loan_period" value="20" min="1" max="40" step="1" required>
                    </div>

                    <div class="mortage-field-group">
                        <label for="mortage_interest_rate">Interest Rate (%)</label>
                        <input type="number" id="mortage_interest_rate" name="interest_rate" value="4" min="0" max="100" step="0.1" required>
                    </div>

                    <div class="mortage-field-group">
                        <label for="mortage_email">Email Address</label>
                        <input type="email" id="mortage_email" name="email" placeholder="Enter your email address" required>
                    </div>
                </form>
            </div>

            <div class="mortage-right-box">
                <div class="mortage-result-card">
                    <h3>Monthly Payment</h3>
                    <div class="mortage-result-main" id="mortage_monthly_payment">—</div>

                    <div class="mortage-result-row">
                        <span>Total Loan Amount</span>
                        <strong id="mortage_total_loan_amount">—</strong>
                    </div>

                    <div class="mortage-result-row">
                        <span>Interest</span>
                        <strong id="mortage_interest_summary">—</strong>
                    </div>

                    <div class="mortage-result-row">
                        <span>Loan Period</span>
                        <strong id="mortage_loan_period_summary">—</strong>
                    </div>

                    <button type="button" id="mortage_submit_btn" class="mortage-submit-btn">Send Application</button>
                    <div id="mortage_form_message" class="mortage-form-message"></div>
                </div>
            </div>

        </div>
    </div>

    <style>
        .mortage-wrap{
            width:100%;
            max-width:800px;
            margin:0 auto;
            padding:20px 15px;
            box-sizing:border-box;
            font-family:Arial, sans-serif;
        }

        .mortage-grid{
            display:grid;
            grid-template-columns:1fr 360px;
            gap:14px;
            align-items:stretch;
        }

        .mortage-left-box h2 {
            margin: 0 0 5px;
            font-size: 18px;
            line-height: 1.4;
            font-weight: 700;
            color: #000;
        }
        .mortage-field-group {
            margin-bottom: 5px;
        }

        .mortage-field-group label{
            display:block;
            margin-bottom:6px;
            font-size:14px;
            line-height:1.4;
            font-weight:500;
            color:#5d6f8b;
        }

        .mortage-field-group input, .mortage-field-group select {
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #d6dbe3;
            background: #fff;
            color: #000;
            border-radius: 14px;
            padding: 8px 14px;
            font-size: 16px;
            line-height: 1.5;
            outline: none;
            box-shadow: none;
            min-height: 0;
        }
        .mortage-field-group input:focus,
        .mortage-field-group select:focus{
            border-color:#ef3c26;
        }

        .mortage-field-group small{
            display:block;
            margin-top:6px;
            font-size:14px;
            line-height:1.4;
            color:#6c757d;
            font-weight:600;
        }

        .mortage-right-box{
            display:flex;
        }

        .mortage-result-card{
            width:100%;
            background:#ef3c26;
            border-radius:16px;
            padding:18px 18px 16px;
            color:#fff;
            display:flex;
            flex-direction:column;
        }

        .mortage-result-card h3 {
            margin: 0 0 10px;
            font-size: 16px;
            line-height: 1;
            font-weight: 400;
            color: #fff;
        }

        .mortage-result-main {
            font-size: 24px;
            line-height: 1.2;
            font-weight: 500;
            margin-bottom: 26px;
            color: #fff;
            word-break: break-word;
        }

        .mortage-result-row{
            margin-bottom:14px;
        }

        .mortage-result-row span{
            display:block;
            font-size:16px;
            line-height:1.5;
            color:#fff;
            margin-bottom:3px;
        }

        .mortage-result-row strong{
            display:block;
            font-size:16px;
            line-height:1.5;
            font-weight:700;
            color:#fff;
        }

        .mortage-submit-btn{
            margin-top:auto;
            width:100%;
            border:none;
            border-radius:999px;
            background:#000;
            color:#fff;
            min-height:42px;
            padding:10px 18px;
            font-size:16px;
            line-height:1.4;
            font-weight:700;
            cursor:pointer;
            transition:all .2s ease;
        }

        .mortage-submit-btn:hover{
            background:#111;
        }

        .mortage-form-message{
            margin-top:12px;
            font-size:14px;
            line-height:1.5;
            color:#fff;
        }

        @media (max-width: 767px){
            .mortage-grid{
                grid-template-columns:1fr;
            }

            .mortage-result-main{
                font-size:28px;
            }

            .mortage-field-group label{
                font-size:17px;
            }

            .mortage-field-group input,
            .mortage-field-group select{
                font-size:16px;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', async function () {
            const mortagePrice = document.getElementById('mortage_price');
            const mortageDownPaymentAmount = document.getElementById('mortage_down_payment_amount');
            const mortageLoanPeriod = document.getElementById('mortage_loan_period');
            const mortageInterestRate = document.getElementById('mortage_interest_rate');
            const mortageEmail = document.getElementById('mortage_email');
            const mortageCurrency = document.getElementById('mortage_currency');

            const mortageMonthlyPayment = document.getElementById('mortage_monthly_payment');
            const mortageTotalLoanAmount = document.getElementById('mortage_total_loan_amount');
            const mortageInterestSummary = document.getElementById('mortage_interest_summary');
            const mortageLoanPeriodSummary = document.getElementById('mortage_loan_period_summary');
            const mortageDownPaymentPercentShow = document.getElementById('mortage_down_payment_percent_show');

            const mortageSubmitBtn = document.getElementById('mortage_submit_btn');
            const mortageFormMessage = document.getElementById('mortage_form_message');
            const mortageForm = document.getElementById('mortageForm');

            const basePriceAED = <?php echo json_encode((float) $_re_price); ?>;
            const baseDownPaymentAED = <?php echo json_encode(round($_re_price * 0.25, 2)); ?>;

            let exchangeRates = {
                AED: 1,
                USD: 0,
                EUR: 0
            };

            let currentCurrency = 'AED';
            let isUpdatingFromCurrency = false;

            function mortageFormatNumber(num, decimals = 2) {
                if (isNaN(num) || num === null) {
                    return '—';
                }

                return Number(num).toLocaleString('en-US', {
                    minimumFractionDigits: decimals,
                    maximumFractionDigits: decimals
                });
            }

            function mortageGetSymbol(currency) {
                switch(currency) {
                    case 'USD':
                        return 'USD$';
                    case 'AED':
                        return 'AED';
                    default:
                        return 'EUR';
                }
            }

            function convertFromAED(amountAED, currency) {
                if (currency === 'AED') return amountAED;
                if (!exchangeRates[currency]) return amountAED;
                return amountAED * exchangeRates[currency];
            }

            function convertToAED(amount, currency) {
                if (currency === 'AED') return amount;
                if (!exchangeRates[currency]) return amount;
                return amount / exchangeRates[currency];
            }

            function mortageCalculateMortgage(principal, annualRate, years) {
                const monthlyRate = annualRate / 100 / 12;
                const totalPayments = years * 12;

                if (principal <= 0 || years <= 0) {
                    return 0;
                }

                if (monthlyRate === 0) {
                    return principal / totalPayments;
                }

                return principal * monthlyRate * Math.pow(1 + monthlyRate, totalPayments) / (Math.pow(1 + monthlyRate, totalPayments) - 1);
            }

            function updateInputValuesByCurrency(currency) {
                isUpdatingFromCurrency = true;
                mortagePrice.value = convertFromAED(basePriceAED, currency).toFixed(2);
                mortageDownPaymentAmount.value = convertFromAED(baseDownPaymentAED, currency).toFixed(2);
                isUpdatingFromCurrency = false;
            }

            function mortageUpdateCalculator() {
                const currency = mortageCurrency.value;
                const symbol = mortageGetSymbol(currency);

                const price = parseFloat(mortagePrice.value) || 0;
                const downPaymentAmount = parseFloat(mortageDownPaymentAmount.value) || 0;
                const years = parseInt(mortageLoanPeriod.value) || 0;
                const rate = parseFloat(mortageInterestRate.value) || 0;

                const downPaymentPercent = price > 0 ? (downPaymentAmount / price) * 100 : 0;
                const loanAmount = price - downPaymentAmount;
                const monthlyPayment = mortageCalculateMortgage(loanAmount, rate, years);

                mortageDownPaymentPercentShow.textContent = downPaymentPercent.toFixed(2) + '%';

                if (loanAmount > 0 && years > 0) {
                    mortageMonthlyPayment.textContent = symbol + ' ' + mortageFormatNumber(monthlyPayment, 2);
                    mortageTotalLoanAmount.textContent = symbol + ' ' + mortageFormatNumber(loanAmount, 2);
                    mortageInterestSummary.textContent = rate + '%';
                    mortageLoanPeriodSummary.textContent = years + ' years';
                } else {
                    mortageMonthlyPayment.textContent = '—';
                    mortageTotalLoanAmount.textContent = '—';
                    mortageInterestSummary.textContent = '—';
                    mortageLoanPeriodSummary.textContent = '—';
                }
            }

            async function loadRates() {
                try {
                    const response = await fetch('https://v6.exchangerate-api.com/v6/9efd8f74f342da8c3e35b705/latest/AED');
                    const data = await response.json();

                    if (data && data.result === 'success' && data.conversion_rates) {
                        exchangeRates.AED = 1;
                        exchangeRates.USD = data.conversion_rates.USD;
                        exchangeRates.EUR = data.conversion_rates.EUR;
                    } else {
                        console.error('Invalid exchange rate response:', data);
                    }
                } catch (error) {
                    console.error('Currency rate load failed:', error);
                }
            }

            await loadRates();

            mortageCurrency.addEventListener('change', function () {
                currentCurrency = this.value;
                updateInputValuesByCurrency(currentCurrency);
                mortageUpdateCalculator();
            });

            [mortagePrice, mortageDownPaymentAmount, mortageLoanPeriod, mortageInterestRate].forEach(function(input){
                input.addEventListener('input', function(){
                    if (!isUpdatingFromCurrency) {
                        mortageUpdateCalculator();
                    }
                });

                input.addEventListener('change', function(){
                    if (!isUpdatingFromCurrency) {
                        mortageUpdateCalculator();
                    }
                });
            });

            mortageSubmitBtn.addEventListener('click', function(){
                mortageFormMessage.textContent = '';

                const email = mortageEmail.value.trim();

                if (!email) {
                    mortageFormMessage.textContent = 'Please enter your email address.';
                    return;
                }

                const price = parseFloat(mortagePrice.value) || 0;
                const downPaymentAmount = parseFloat(mortageDownPaymentAmount.value) || 0;
                const years = parseInt(mortageLoanPeriod.value) || 0;
                const rate = parseFloat(mortageInterestRate.value) || 0;
                const currency = mortageCurrency.value;

                const downPaymentPercent = price > 0 ? (downPaymentAmount / price) * 100 : 0;
                const loanAmount = price - downPaymentAmount;
                const monthlyPayment = mortageCalculateMortgage(loanAmount, rate, years);

                const formData = new FormData(mortageForm);
                formData.append('action', 'mortage_submit_form');
                formData.append('loan_amount', loanAmount.toFixed(2));
                formData.append('monthly_payment', monthlyPayment.toFixed(2));
                formData.append('interest_summary', rate + '%');
                formData.append('loan_period_summary', years + ' years');
                formData.append('down_payment_percent', downPaymentPercent.toFixed(2));
                formData.append('currency', currency);

                mortageSubmitBtn.disabled = true;
                mortageSubmitBtn.textContent = 'Sending...';

                fetch('<?php echo esc_url(admin_url('admin-ajax.php')); ?>', {
                    method: 'POST',
                    body: formData
                })
                .then(function(response){
                    return response.json();
                })
                .then(function(data){
                    if (data.success) {
                        mortageFormMessage.textContent = data.data.message;
                        mortageForm.reset();

                        mortageCurrency.value = 'AED';
                        currentCurrency = 'AED';
                        updateInputValuesByCurrency('AED');

                        mortageLoanPeriod.value = 20;
                        mortageInterestRate.value = 4;

                        mortageUpdateCalculator();
                    } else {
                        mortageFormMessage.textContent = data.data.message ? data.data.message : 'Something went wrong.';
                    }
                })
                .catch(function(){
                    mortageFormMessage.textContent = 'Something went wrong. Please try again.';
                })
                .finally(function(){
                    mortageSubmitBtn.disabled = false;
                    mortageSubmitBtn.textContent = 'Send Application';
                });
            });

            updateInputValuesByCurrency('AED');
            mortageUpdateCalculator();
        });
    </script>
    <?php
    return ob_get_clean();
}

add_action('wp_ajax_mortage_submit_form', 'mortage_submit_form');
add_action('wp_ajax_nopriv_mortage_submit_form', 'mortage_submit_form');

function mortage_submit_form() {
    if (!isset($_POST['mortage_nonce']) || !wp_verify_nonce($_POST['mortage_nonce'], 'mortage_nonce_action')) {
        wp_send_json_error(array('message' => 'Security check failed.'));
    }

    $email                = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $currency             = isset($_POST['currency']) ? sanitize_text_field($_POST['currency']) : 'AED';
    $property_price       = isset($_POST['property_price']) ? floatval($_POST['property_price']) : 0;
    $down_payment_amount  = isset($_POST['down_payment_amount']) ? floatval($_POST['down_payment_amount']) : 0;
    $down_payment_percent = isset($_POST['down_payment_percent']) ? floatval($_POST['down_payment_percent']) : 0;
    $loan_amount          = isset($_POST['loan_amount']) ? floatval($_POST['loan_amount']) : 0;
    $loan_period          = isset($_POST['loan_period']) ? intval($_POST['loan_period']) : 0;
    $interest_rate        = isset($_POST['interest_rate']) ? floatval($_POST['interest_rate']) : 0;
    $monthly_payment      = isset($_POST['monthly_payment']) ? floatval($_POST['monthly_payment']) : 0;
    $interest_summary     = isset($_POST['interest_summary']) ? sanitize_text_field($_POST['interest_summary']) : '';
    $loan_period_summary  = isset($_POST['loan_period_summary']) ? sanitize_text_field($_POST['loan_period_summary']) : '';

    if (empty($email)) {
        wp_send_json_error(array('message' => 'Email address is required.'));
    }

    if (!is_email($email)) {
        wp_send_json_error(array('message' => 'Please enter a valid email address.'));
    }

    $email_list = array(
        get_option('admin_email'),
        'mdsablu36@gamil.com',
    );

    $subject = 'New Mortage Application';

    $body  = "New Mortage Application Received\n\n";
    $body .= "Customer Information\n";
    $body .= "--------------------------\n";
    $body .= "Email: {$email}\n\n";

    $body .= "Mortage Calculation Details\n";
    $body .= "--------------------------\n";
    $body .= "Currency: {$currency}\n";
    $body .= "Property Price / Loan Amount Input: " . number_format($property_price, 2) . " {$currency}\n";
    $body .= "Down Payment Amount: " . number_format($down_payment_amount, 2) . " {$currency}\n";
    $body .= "Down Payment Percent: " . number_format($down_payment_percent, 2) . "%\n";
    $body .= "Monthly Payment: " . number_format($monthly_payment, 2) . " {$currency}\n";
    $body .= "Total Loan Amount: " . number_format($loan_amount, 2) . " {$currency}\n";
    $body .= "Interest: {$interest_summary}\n";
    $body .= "Loan Period: {$loan_period_summary}\n";
    $body .= "Interest Rate Raw: {$interest_rate}%\n";
    $body .= "Loan Period Raw: {$loan_period} years\n";

    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'Reply-To: <' . $email . '>'
    );

    $sent_admin = wp_mail($email_list, $subject, $body, $headers);

    if ($sent_admin) {
        wp_send_json_success(array('message' => 'Application sent successfully.'));
    } else {
        wp_send_json_error(array('message' => 'Mail sending failed. Please check your mail configuration.'));
    }
}