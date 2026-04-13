<header class="header">
        <?php
        $call_to_label = get_theme_mod( 'call_to_label', 'Contact Us' );
        $call_to_link = get_theme_mod( 'call_to_link', '+97144286151' );
        $header_button_label = get_theme_mod( 'header_button_label', 'List Your Property' );
        $switch_call_to_action = get_theme_mod('switch_call_to_action', false);
        ?>

    <!-- TOP BAR -->
    <div class="topbar">
        <div class="container topbar-inner px-2">

            <?php sbtech_header_logo(); ?>

            <div class="top-actions">
                <?php if(!empty($switch_call_to_action)) : ?>
                <a href="tel:<?php echo esc_html( $call_to_link ); ?>" class="phone"><?php echo esc_html( $call_to_label )?></a>
                <?php endif;?>

                <?php if(!empty($header_button_label)) : ?>
                <a href="#" class="cta" id="sellOpenModal2"><span class="cta-plus">+</span><?php echo esc_html( $header_button_label )?></a>
                <!-- form start-->
                <div class="sell-modal" id="sellModal2" aria-hidden="true">
                    <div class="sell-modal__backdrop" data-sell-close2="1"></div>

                    <div class="sell-modal__dialog" role="dialog" aria-modal="true" aria-label="List your property form">
                        <button class="sell-modal__close" type="button" aria-label="Close" data-sell-close2="1">✕</button>

                        <div class="sell-modal__grid">
                            <?php echo do_shortcode('[button_contact_form_direct]'); ?>
                        </div>
                    </div>
                </div>
                <script>
                    // header nav form popup js -nav menu js
                    (function () {
                        const openBtn = document.getElementById('sellOpenModal2');
                        const modal = document.getElementById('sellModal2');

                        function openModal() {
                            modal.classList.add('is-open');
                            modal.setAttribute('aria-hidden', 'false');
                            document.body.style.overflow = 'hidden';
                            // focus first input
                            const first = modal.querySelector('input, textarea, select, button');
                            if (first) setTimeout(() => first.focus(), 50);
                        }
                        function closeModal() {
                            modal.classList.remove('is-open');
                            modal.setAttribute('aria-hidden', 'true');
                            document.body.style.overflow = '';
                            openBtn.focus();
                        }

                        openBtn.addEventListener('click', openModal);

                        modal.addEventListener('click', (e) => {
                            const el = e.target;
                            if (el && el.getAttribute && el.getAttribute('data-sell-close2') === '1') closeModal();
                        });

                        document.addEventListener('keydown', (e) => {
                            if (!modal.classList.contains('is-open')) return;
                            if (e.key === 'Escape') closeModal();
                        });
                    })();
                </script>
                <!-- form end-->
                <?php endif;?>

                <a style="display:none;" href="#" class="fav">♡</a>

                <!-- MOBILE -->
                <div class="mobile-tools">
                    <span class="mob-lang d-none">EN / USD</span>
                    <button class="burger" id="burger">
                        <span></span><span></span><span></span>
                    </button>
                </div>
            </div>

        </div>
    </div>

    <!-- NAV -->
    <nav class="navrow">
        <div class="container nav-inner">

            <?php echo sbtech_header_menu(); ?>
            <ul class="menu" id="menu">

                <!-- MOBILE CLOSE -->
                <button class="menu-close" id="menuClose">✕</button>
                <li><a href="<?php echo home_url('/buy'); ?>">Buy</a></li>

                <li><a href="<?php echo home_url('/rent'); ?>">Rent</a></li>
                <li><a href="<?php echo home_url('/commercial'); ?>">Commercial</a></li>
                <li><a href="<?php echo home_url('/sell'); ?>">Sell</a></li>
                <li><a href="<?php echo home_url('/developers'); ?>">Developers</a></li>
                <li class="has-sub">
                    <a href="#" class="sub-toggle">Services ▾</a>
                    <ul class="submenu">
                        <li><a href="<?php echo home_url('/property-management'); ?>">Property Management</a></li>
                        <li><a href="<?php echo home_url('/list-your-property'); ?>">List Your Property</a></li>
                        <li><a href="<?php echo home_url('/mortgages'); ?>">Mortgage</a></li>
                        <li><a href="<?php echo home_url('/conveyancing'); ?>">Conveyancing</a></li>
                        <li><a href="<?php echo home_url('/property-snagging'); ?>">property snagging</a></li>
                        <li><a href="<?php echo home_url('/partner-program'); ?>">Partner Program</a></li>
                    </ul>
                </li>
                
                <li class="has-sub">
                    <a href="#" class="sub-toggle">Media ▾</a>
                    <ul class="submenu">
                       <li><a href="<?php echo home_url('/media'); ?>">Market Insights</a></li>
                       <li><a href="<?php echo home_url('/press_media'); ?>">Press & Media</a></li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="#" class="sub-toggle">More ▾</a>
                    <ul class="submenu">
                        <li><a href="<?php echo home_url('/about-us'); ?>">About Us</a></li>
                        <li><a href="<?php echo home_url('/meet-the-team'); ?>">Meet The Team</a></li>
                        <li><a href="<?php echo home_url('/careers'); ?>">Careers</a></li>
                        <li><a href="<?php echo home_url('/contact-us'); ?>">Contact Us</a></li>
                        <li><a href="<?php echo home_url('/complaints-procedure'); ?>">Complaints Procedure</a></li>
                        <li><a href="<?php echo home_url('/testimonial'); ?>">Testimonial</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>

    <div class="overlay" id="overlay"></div>

</header>