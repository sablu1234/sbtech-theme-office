<?php
    $sbtech_ft_short_des = get_theme_mod( 'sbtech_ft_short_des', '36-38 Floor, Al Salam Tecom Tower, Dubai, UAE' );
    $sbtech_address = get_theme_mod( 'sbtech_address', '100 S Main St, New York, NY' );
    $sbtech_mail = get_theme_mod( 'sbtech_mail', 'contact@example.com' ); 
    $sbtech_phone = get_theme_mod( 'sbtech_phone', '+971 4 572 5273' ); 
?>
<footer class="site-footer">
    <div class="footer-wrap">

        <!-- 1 -->
        <div class="footer-col footer-brand">
            <a class="brand" href="<?php echo home_url('/'); ?>">
                <img src="https://sam91222.wpvence.com/wp-content/uploads/2026/03/logo-2.jpg" alt="Logo">
            </a>

            <?php if(!empty($sbtech_ft_short_des)) : ?>
            <p class="addr">
                <?php echo esc_html( $sbtech_ft_short_des )?>
            </p>
            <?php endif; ?>

            <div style="display:flex;gap:10px;flex-wrap:wrap;margin-top:12px;">
                <?php sbtech_social_media(); ?>
            </div>


            <div class="badges">

            </div>
        </div>

        <!-- 2 -->
        <nav class="footer-col" aria-label="Buy properties in Dubai">
            <h4>Links<br></h4>
            <a href="<?php echo home_url('/buy'); ?>">Buy</a>
            <a href="<?php echo home_url('/sell'); ?>">Sell</a>
            <a href="<?php echo home_url('/rent'); ?>">Rent</a>
            <a href="<?php echo home_url('/commercial'); ?>">Commercial</a>
            <a href="<?php echo home_url('/developers'); ?>">Developers</a>
            <a href="<?php echo home_url('/media'); ?>">Media</a>
        </nav>

        <!-- 3 -->
        <nav class="footer-col" aria-label="New projects in Dubai">
            <h4>Services<br></h4>
            <a href="<?php echo home_url('/property-management'); ?>">Property Management</a>
            <a href="<?php echo home_url('/list-your-property'); ?>">List Your Property</a>
            <a href="<?php echo home_url('/mortgages'); ?>">Mortgages</a>
            <a href="<?php echo home_url('/conveyancing'); ?>">Conveyancing</a>
            <a href="<?php echo home_url('/conveyancing'); ?>">Property Snagging</a>
            <a href="<?php echo home_url('/partner-program'); ?>">Partner Program</a>
        </nav>

        <!-- 4 -->
        <nav class="footer-col" aria-label="Media">
            <h4>More</h4>
            <a href="<?php echo home_url('/about-us'); ?>">About Us</a>
            <a href="<?php echo home_url('/about-us'); ?>">Meet The Team</a>
            <a href="<?php echo home_url('/contact-us'); ?>">Contact Us</a>
            <a href="<?php echo home_url('/complaints-procedure'); ?>">Complaints Procedure</a>
            <a href="<?php echo home_url('/Testimonial'); ?>">Testimonial</a>
        </nav>

        <!-- 5 -->
        <nav class="footer-col" aria-label="Services">
            <h4>Address</h4>
            <div class="iconlist">

                <!-- Location -->
                <?php if(!empty($sbtech_address)) : ?>
                <div class="iconlist_item">
                    <div class="iconlist_icon">
                        <svg viewBox="0 0 24 24" fill="none">
                            <path d="M12 21s7-4.4 7-10.5C19 6.1 15.9 3 12 3S5 6.1 5 10.5C5 16.6 12 21 12 21z" stroke="currentColor" stroke-width="2" />
                            <path d="M12 12a2 2 0 100-4 2 2 0 000 4z" stroke="currentColor" stroke-width="2" />
                        </svg>
                    </div>
                    
                    
                    <div class="iconlist_text">
                        <?php echo esc_html( $sbtech_address )?>
                    </div>
                    
                </div>
                <?php endif;?>

                <!-- Email -->
                <?php if(!empty($sbtech_address)) : ?>
                <div class="iconlist_item">
                    <div class="iconlist_icon">
                        <svg viewBox="0 0 24 24" fill="none">
                            <path d="M4 4h16v16H4V4z" stroke="currentColor" stroke-width="2" />
                            <path d="M22 6l-10 7L2 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                        </svg>
                    </div>
                    
                    <div class="iconlist_text">
                        <a href="mailto:<?php echo esc_url( $sbtech_mail )?>"><?php echo esc_html( $sbtech_mail )?></a>
                    </div>
                </div>
                <?php endif;?>
                <!-- Email -->
                <?php if(!empty($sbtech_address)) : ?>
                <div class="iconlist_item">
                    <div class="iconlist_icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                        </svg>

                    </div>
                    
                    <div class="iconlist_text">
                        <a href="tel:<?php echo esc_url( $sbtech_phone )?>"><?php echo esc_html( $sbtech_phone )?></a>
                    </div>
                </div>
                <?php endif;?>

            </div>
        </nav>

    </div>
</footer>

<style>
    @import url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css");

    .site-footer {
        background: #fff;
        border-top: 1px solid #e9eef5;
        padding: 40px 16px;
    }

    /* max width 1200 + responsive */
    .footer-wrap {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1.4fr 1fr 1fr 0.9fr 1.1fr;
        gap: 28px;
        align-items: start;
    }

    .footer-col h4 {
        margin: 0 0 14px;
        font-size: 18px;
        line-height: 1.2;
        color: #0f172a;
        font-weight: 800;
    }

    .footer-col a {
        display: block;
        padding: 6px 0;
        color: #475569;
        text-decoration: none;
        font-size: 14px;
        line-height: 1.35;
    }

    .footer-col a:hover {
        color: var(--clr-primary);
    }

    /* brand column */
    .footer-brand .brand img {
        height: 60px;
        width: auto;
        display: block;
        border-radius: 8px;
/*         border: 1px solid var(--clr-primary); */
    }

    .addr {
        margin: 14px 0 14px;
        color: #64748b;
        font-size: 14px;
        line-height: 1.5;
    }

    .social {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin: 10px 0 18px;
    }

    .social a {
        width: 34px;
        height: 34px;
        display: grid;
        place-items: center;
        border: 1px solid var(--clr-primary);
        color: var(--clr-primary);
        border-radius: 8px;
        font-weight: 700;
        font-size: 12px;
        text-decoration: none;
    }

    .badges {
        display: flex;
        gap: 12px;
        align-items: center;
        flex-wrap: wrap;
    }

    .badges img {
        height: 78px;
        width: auto;
        display: block;
        object-fit: contain;
    }

    /* Tablet */
    @media (max-width:1024px) {
        .footer-wrap {
            grid-template-columns: 1.2fr 1fr 1fr;
        }
    }

    /* Mobile */
    @media (max-width:640px) {
        .site-footer {
            padding: 28px 14px;
        }

        .footer-wrap {
            grid-template-columns: 1fr;
            gap: 18px;
        }

        .footer-col h4 {
            font-size: 17px;
        }
    }

    /* simple footer location */

    .iconlist_item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 0;
    }

    .iconlist_icon {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        background: rgba(2, 178, 238, .12);
        display: flex;
        align-items: center;
        justify-content: center;
        flex: 0 0 auto;
    }

    .iconlist_icon svg {
        width: 18px;
        height: 18px;
        color: var(--clr-primary);
    }

    .iconlist_text {
        font-size: 14px;
        font-weight: 600;
        color: var(--clr-black);
        line-height: 1.4;
        word-break: break-word;
    }

    .iconlist_text a {
        color: var(--clr-black);
        text-decoration: none;
    }

    .iconlist_text a:hover {
        color: var(--clr-primary);
    }

    @media(max-width:420px) {
        .iconlist_item {
            gap: 10px;
        }

        .iconlist_text {
            font-size: 13px;
        }
    }
</style>