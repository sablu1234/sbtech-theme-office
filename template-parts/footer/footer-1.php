<footer class="site-footer">
    <div class="footer-wrap">

        <!-- 1 -->
        <div class="footer-col footer-brand">
            <a class="brand" href="<?php echo home_url('/'); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/header/logo-main.jpg" alt="Logo">
            </a>

            <p class="addr">
                36-38 Floor, Al Salam Tecom<br>
                Tower, Dubai, UAE
            </p>

            <div style="display:flex;gap:10px;flex-wrap:wrap;margin-top:12px;">
                <a href="facebook.com/" style="width:36px;height:36px;display:flex;align-items:center;justify-content:center;
     border:1px solid #cfe3ff;border-radius:8px;color:#0b63ce;text-decoration:none;">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>

                <a href="https://www.instagram.com/" style="width:36px;height:36px;display:flex;align-items:center;justify-content:center;
     border:1px solid #cfe3ff;border-radius:8px;color:#0b63ce;text-decoration:none;">
                    <i class="fab fa-instagram"></i>
                </a>

                <a href="https://youtube.com/" style="width:36px;height:36px;display:flex;align-items:center;justify-content:center;
     border:1px solid #cfe3ff;border-radius:8px;color:#0b63ce;text-decoration:none;">
                    <i class="fab fa-youtube"></i>
                </a>

                <a href="https://x.com/" style="width:36px;height:36px;display:flex;align-items:center;justify-content:center;
     border:1px solid #cfe3ff;border-radius:8px;color:#0b63ce;text-decoration:none;">
                    <i class="fab fa-twitter"></i>
                </a>

                <a href="linkedin.com" style="width:36px;height:36px;display:flex;align-items:center;justify-content:center;
     border:1px solid #cfe3ff;border-radius:8px;color:#0b63ce;text-decoration:none;">
                    <i class="fab fa-linkedin-in"></i>
                </a>

                <a href="https://web.telegram.org/" style="width:36px;height:36px;display:flex;align-items:center;justify-content:center;
     border:1px solid #cfe3ff;border-radius:8px;color:#0b63ce;text-decoration:none;">
                    <i class="fab fa-telegram-plane"></i>
                </a>
            </div>


            <div class="badges">

            </div>
        </div>

        <!-- 2 -->
        <nav class="footer-col" aria-label="Buy properties in Dubai">
            <h4>Buy properties<br>in Dubai</h4>
            <a href="#">Buy properties in UAE</a>
            <a href="#">Abu Dhabi</a>
            <a href="#">Sharjah</a>
            <a href="#">Ajman</a>
            <a href="#">Ras Al Khaimah</a>
            <a href="#">Austria</a>
        </nav>

        <!-- 3 -->
        <nav class="footer-col" aria-label="New projects in Dubai">
            <h4>New projects in<br>Dubai</h4>
            <a href="#">Off-plan properties in</a>
            <a href="#">Abu Dhabi</a>
            <a href="#">Oman</a>
            <a href="#">Sharjah</a>
            <a href="#">Ajman</a>
            <a href="#">Ras Al Khaimah</a>
            <a href="#">Maldives</a>
        </nav>

        <!-- 4 -->
        <nav class="footer-col" aria-label="Media">
            <h4>Media</h4>
            <a href="#">Dubai real estate blog</a>
            <a href="#">Media</a>
            <a href="#">News</a>
            <a href="#">Press about us</a>
        </nav>

        <!-- 5 -->
        <nav class="footer-col" aria-label="Services">
            <h4>Services</h4>
            <a href="#">Mortgage Assistance</a>
            <a href="#">Interior Design and Furnishing</a>
            <a href="#">Residency Visas</a>
            <a href="#">Second Citizenship</a>
            <a href="#">Developer Services</a>
            <a href="#">Vienna Sales & Leasing</a>
            <a href="#">Partnership Program</a>
            <a href="#">Repairs and Cleaning</a>
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
        color: #0b63ce;
    }

    /* brand column */
    .footer-brand .brand img {
        height: 60px;
        width: auto;
        display: block;
        border-radius: 8px;
        border: 1px solid var(--clr-primary);
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
        border: 1px solid #cfe3ff;
        color: #0b63ce;
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
</style>