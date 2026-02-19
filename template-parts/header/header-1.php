<header class="header">

    <!-- TOP BAR -->
    <div class="topbar">
        <div class="container topbar-inner px-2">

            <a class="logo" href="<?php echo home_url('/'); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/header/logo-main.jpg" alt="Logo">
            </a>

            <div class="top-actions">
                <a href="tel:+97144286151" class="phone">+971 4 428 6151</a>

                <a href="<?php echo home_url(''); ?>" class="cta">
                    <span class="cta-plus">+</span>
                    List Your Property
                </a>

                <a style="display:none;" href="#" class="fav">♡</a>

                <!-- MOBILE -->
                <div class="mobile-tools">
                    <span class="mob-lang">EN / USD</span>
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
                <li><a href="<?php echo home_url('/sell'); ?>">Sell</a></li>
                <li><a href="<?php echo home_url('/rent'); ?>">Rent</a></li>
                <li><a href="<?php echo home_url('/commercial'); ?>">Commercial</a></li>
                <li><a href="<?php echo home_url('/new-projects'); ?>">New Projects</a></li>
                <li><a href="<?php echo home_url('/areas'); ?>">Areas</a></li>
                <li><a href="<?php echo home_url('/developer'); ?>">Developers</a></li>
                <li><a href="<?php echo home_url('/services'); ?>">Services</a></li>
                <li><a href="<?php echo home_url('/events'); ?>">Events</a></li>
                <li><a href="<?php echo home_url('/media'); ?>">Media</a></li>
                <li><a href="<?php echo home_url('/about-us'); ?>">About Us</a></li>
                <li><a href="<?php echo home_url('/careers'); ?>">Careers</a></li>

            </ul>
        </div>
    </nav>

    <div class="overlay" id="overlay"></div>

</header>