<?php

function careers_section_what_makes_funciton() {
    ob_start();

    $what_makes_title = get_theme_mod( 'what_makes_title', __('What Makes CBA Real Estate <br>A Great Place To Work?', 'sbtech') );
    $what_makes_subtitle = get_theme_mod( 'what_makes_subtitle', __('Inspiring People. Stronger Culture.', 'sbtech') );
    $what_makes_desc = get_theme_mod( 'what_makes_desc', __('Meet the people behind our culture. Passionate professionals, bold thinkers, and a team that makes work feel meaningful every single day.', 'sbtech') );

    $what_makes_team_1 = get_theme_mod('what_makes_team_1', get_template_directory_uri().'/assets/team_member/1.jpg');
    $what_makes_team_2 = get_theme_mod('what_makes_team_2', get_template_directory_uri().'/assets/team_member/2.jpg');
    $what_makes_team_3 = get_theme_mod('what_makes_team_3', get_template_directory_uri().'/assets/team_member/3.jpg');
    $what_makes_team_4 = get_theme_mod('what_makes_team_4', get_template_directory_uri().'/assets/team_member/4.jpg');
    $what_makes_team_5 = get_theme_mod('what_makes_team_5', get_template_directory_uri().'/assets/team_member/5.jpg');
    $what_makes_team_6 = get_theme_mod('what_makes_team_6', get_template_directory_uri().'/assets/team_member/6.jpg');

    $what_makes_team_name_1 = get_theme_mod( 'what_makes_team_name_1', __('Aitolkyn Durimkhan', 'sbtech') );
    $what_makes_team_name_2 = get_theme_mod( 'what_makes_team_name_2', __('Michael Stone', 'sbtech') );
    $what_makes_team_name_3 = get_theme_mod( 'what_makes_team_name_3', __('Sarah Johnson', 'sbtech') );
    $what_makes_team_name_4 = get_theme_mod( 'what_makes_team_name_4', __('David Wilson', 'sbtech') );
    $what_makes_team_name_5 = get_theme_mod( 'what_makes_team_name_5', __('Lisa Anderson', 'sbtech') );
    $what_makes_team_name_6 = get_theme_mod( 'what_makes_team_name_6', __('John Doe', 'sbtech') );

    $what_makes_team_role_1 = get_theme_mod( 'what_makes_team_role_1', __('HR Business Partner', 'sbtech') );
    $what_makes_team_role_2 = get_theme_mod( 'what_makes_team_role_2', __('Operations Lead', 'sbtech') );
    $what_makes_team_role_3 = get_theme_mod( 'what_makes_team_role_3', __('Sales Manager', 'sbtech') );
    $what_makes_team_role_4 = get_theme_mod( 'what_makes_team_role_4', __('Marketing Specialist', 'sbtech') );
    $what_makes_team_role_5 = get_theme_mod( 'what_makes_team_role_5', __('Finance Analyst', 'sbtech') );
    $what_makes_team_role_6 = get_theme_mod( 'what_makes_team_role_6', __('IT Support Specialist', 'sbtech') );

    $what_makes_video_url = get_theme_mod( 'what_makes_video_url', __('https://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=1', 'sbtech') );
    $what_makes_background_img = get_theme_mod('what_makes_background_img', get_template_directory_uri().'/assets/team_member/background_what.png');

    ?>

    <section class="team-section">
        <div class="container">
            <div class="showcase">

                <div class="hero">
                    <div class="floating-shape shape-1"></div>
                    <div class="floating-shape shape-2"></div>
                    <div class="floating-shape shape-3"></div>

                    <div class="hero-content">

                        <?php if (!empty($what_makes_subtitle)) : ?>
                            <div class="badge">
                                <span></span>
                                <?php echo esc_html($what_makes_subtitle); ?>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($what_makes_title)) : ?>
                            <h2><?php echo function_exists('sbtech_kses') ? sbtech_kses($what_makes_title) : wp_kses_post($what_makes_title); ?></h2>
                        <?php endif; ?>

                        <?php if (!empty($what_makes_desc)) : ?>
                            <p><?php echo esc_html($what_makes_desc); ?></p>
                        <?php endif; ?>

                        <?php if (!empty($what_makes_video_url)) : ?>
                            <div class="hero-actions">
                                <a href="#" class="btn btn-primary" id="openVideo">Watch the Video</a>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>

                <div class="members-wrap">
                    <div class="members">

                        <div class="member-card" tabindex="0">
                            <?php if (!empty($what_makes_team_1)) : ?>
                                <div class="member-image-wrap">
                                    <img class="member-image" src="<?php echo esc_url($what_makes_team_1); ?>" alt="<?php echo esc_attr($what_makes_team_name_1); ?>">
                                    <div class="member-overlay">
                                        <div class="member-info">
                                            <?php if (!empty($what_makes_team_name_1)) : ?>
                                                <div class="member-name"><?php echo esc_html($what_makes_team_name_1); ?></div>
                                            <?php endif; ?>

                                            <?php if (!empty($what_makes_team_role_1)) : ?>
                                                <div class="member-role"><?php echo esc_html($what_makes_team_role_1); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="member-glow"></div>
                        </div>

                        <div class="member-card" tabindex="0">
                            <?php if (!empty($what_makes_team_2)) : ?>
                                <div class="member-image-wrap">
                                    <img class="member-image" src="<?php echo esc_url($what_makes_team_2); ?>" alt="<?php echo esc_attr($what_makes_team_name_2); ?>">
                                    <div class="member-overlay">
                                        <div class="member-info">
                                            <?php if (!empty($what_makes_team_name_2)) : ?>
                                                <div class="member-name"><?php echo esc_html($what_makes_team_name_2); ?></div>
                                            <?php endif; ?>

                                            <?php if (!empty($what_makes_team_role_2)) : ?>
                                                <div class="member-role"><?php echo esc_html($what_makes_team_role_2); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="member-glow"></div>
                        </div>

                        <div class="member-card" tabindex="0">
                            <?php if (!empty($what_makes_team_3)) : ?>
                                <div class="member-image-wrap">
                                    <img class="member-image" src="<?php echo esc_url($what_makes_team_3); ?>" alt="<?php echo esc_attr($what_makes_team_name_3); ?>">
                                    <div class="member-overlay">
                                        <div class="member-info">
                                            <?php if (!empty($what_makes_team_name_3)) : ?>
                                                <div class="member-name"><?php echo esc_html($what_makes_team_name_3); ?></div>
                                            <?php endif; ?>

                                            <?php if (!empty($what_makes_team_role_3)) : ?>
                                                <div class="member-role"><?php echo esc_html($what_makes_team_role_3); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="member-glow"></div>
                        </div>

                        <div class="member-card featured" tabindex="0">
                            <?php if (!empty($what_makes_team_4)) : ?>
                                <div class="member-image-wrap">
                                    <img class="member-image" src="<?php echo esc_url($what_makes_team_4); ?>" alt="<?php echo esc_attr($what_makes_team_name_4); ?>">
                                    <div class="member-overlay">
                                        <div class="member-info">
                                            <?php if (!empty($what_makes_team_name_4)) : ?>
                                                <div class="member-name"><?php echo esc_html($what_makes_team_name_4); ?></div>
                                            <?php endif; ?>

                                            <?php if (!empty($what_makes_team_role_4)) : ?>
                                                <div class="member-role"><?php echo esc_html($what_makes_team_role_4); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="member-glow"></div>
                        </div>

                        <div class="member-card" tabindex="0">
                            <?php if (!empty($what_makes_team_5)) : ?>
                                <div class="member-image-wrap">
                                    <img class="member-image" src="<?php echo esc_url($what_makes_team_5); ?>" alt="<?php echo esc_attr($what_makes_team_name_5); ?>">
                                    <div class="member-overlay">
                                        <div class="member-info">
                                            <?php if (!empty($what_makes_team_name_5)) : ?>
                                                <div class="member-name"><?php echo esc_html($what_makes_team_name_5); ?></div>
                                            <?php endif; ?>

                                            <?php if (!empty($what_makes_team_role_5)) : ?>
                                                <div class="member-role"><?php echo esc_html($what_makes_team_role_5); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="member-glow"></div>
                        </div>

                        <div class="member-card" tabindex="0">
                            <?php if (!empty($what_makes_team_6)) : ?>
                                <div class="member-image-wrap">
                                    <img class="member-image" src="<?php echo esc_url($what_makes_team_6); ?>" alt="<?php echo esc_attr($what_makes_team_name_6); ?>">
                                    <div class="member-overlay">
                                        <div class="member-info">
                                            <?php if (!empty($what_makes_team_name_6)) : ?>
                                                <div class="member-name"><?php echo esc_html($what_makes_team_name_6); ?></div>
                                            <?php endif; ?>

                                            <?php if (!empty($what_makes_team_role_6)) : ?>
                                                <div class="member-role"><?php echo esc_html($what_makes_team_role_6); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="member-glow"></div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- VIDEO MODAL -->
    <div class="video-modal" id="videoModal">
        <div class="video-overlay" id="videoOverlay"></div>

        <div class="video-content">
            <button class="close-video" id="closeVideo" aria-label="Close video">&times;</button>

            <div class="video-wrapper">
                <iframe
                    id="videoFrame"
                    src=""
                    title="Team Video"
                    frameborder="0"
                    allow="autoplay; encrypted-media; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>

    <style>
        :root {
            --primary: #ef3c26;
            --black: #0f0f10;
            --white: #ffffff;
            --muted: #f5f5f5;
            --text-soft: rgba(255, 255, 255, 0.78);
            --shadow: 0 20px 50px rgba(0, 0, 0, 0.18);
            --radius: 28px;
            --transition: all 0.4s ease;
            --max-width: 1200px;
        }

        .team-section,
        .team-section *,
        .video-modal,
        .video-modal * {
            box-sizing: border-box;
        }

        .team-section {
            padding: 70px 20px;
        }

        .team-section img {
            max-width: 100%;
            display: block;
        }

        .team-section a {
            text-decoration: none;
        }

        .team-section .container {
            max-width: var(--max-width);
            margin: 0 auto;
        }

        .showcase {
            position: relative;
            overflow: hidden;
            border-radius: 32px;
            background: linear-gradient(135deg, #111 0%, #1e1e1e 100%);
            box-shadow: var(--shadow);
            isolation: isolate;
        }

        .hero {
            position: relative;
            min-height: 520px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px 30px 170px;
            text-align: center;
            overflow: hidden;
        }

        .hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                linear-gradient(rgba(0, 0, 0, 0.35), rgba(0, 0, 0, 0.55)),
                url("<?php echo esc_url($what_makes_background_img); ?>") center/cover no-repeat;
            transform: scale(1.03);
            z-index: -3;
        }

        .hero::after {
            content: "";
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at center, rgba(239, 60, 38, 0.18), transparent 35%),
                linear-gradient(to bottom, rgba(0,0,0,0.05), rgba(0,0,0,0.45));
            z-index: -2;
        }

        .floating-shape {
            position: absolute;
            border-radius: 50%;
            filter: blur(4px);
            opacity: 0.22;
            z-index: -1;
            animation: float 8s ease-in-out infinite;
        }

        .shape-1 {
            width: 180px;
            height: 180px;
            background: var(--primary);
            top: 8%;
            left: 5%;
        }

        .shape-2 {
            width: 240px;
            height: 240px;
            background: #ffffff;
            top: 10%;
            right: 7%;
            animation-delay: 1.5s;
        }

        .shape-3 {
            width: 120px;
            height: 120px;
            background: var(--primary);
            bottom: 25%;
            right: 20%;
            animation-delay: 3s;
        }

        .hero-content {
            max-width: 760px;
            color: var(--white);
            z-index: 2;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: rgba(255,255,255,0.12);
            border: 1px solid rgba(255,255,255,0.14);
            color: var(--white);
            padding: 10px 18px;
            border-radius: 999px;
            font-size: 14px;
            font-weight: 700;
            backdrop-filter: blur(10px);
            margin-bottom: 18px;
        }

        .badge span {
            width: 10px;
            height: 10px;
            background: var(--primary);
            border-radius: 50%;
            box-shadow: 0 0 0 8px rgba(239, 60, 38, 0.12);
            flex: 0 0 auto;
        }

        .hero h2 {
            font-size: clamp(2rem, 4vw, 4rem);
            line-height: 1.08;
            margin: 0 0 14px;
            font-weight: 800;
            letter-spacing: -0.03em;
        }

        .hero p {
            font-size: clamp(1rem, 2vw, 1.1rem);
            color: var(--text-soft);
            max-width: 640px;
            margin: 0 auto 28px;
        }

        .hero-actions {
            display: flex;
            justify-content: center;
            gap: 14px;
            flex-wrap: wrap;
        }

        .btn {
            border: none;
            cursor: pointer;
            padding: 14px 22px;
            border-radius: 999px;
            font-size: 15px;
            font-weight: 700;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-primary {
            background: var(--primary);
            color: var(--white);
            box-shadow: 0 10px 25px rgba(239, 60, 38, 0.35);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 18px 35px rgba(239, 60, 38, 0.4);
            color: var(--white);
        }

        .members-wrap {
            position: relative;
            margin-top: -110px;
            padding: 0 22px 28px;
            z-index: 5;
        }

        .members {
            display: grid;
            grid-template-columns: repeat(6, minmax(0, 1fr));
            gap: 18px;
            align-items: end;
        }

        .member-card {
            position: relative;
            cursor: pointer;
            transition: transform 0.35s ease;
            outline: none;
            min-width: 0;
        }

        .member-card:hover {
            transform: translateY(-10px);
        }

        .member-card.featured {
            transform: translateY(-18px);
        }

        .member-card.featured:hover {
            transform: translateY(-30px);
        }

        .member-image-wrap {
            position: relative;
            width: 100%;
            aspect-ratio: 1 / 1.1;
            border-radius: 999px;
            overflow: hidden;
            background: #f2f2f2;
            border: 6px solid rgba(255, 255, 255, 0.92);
            box-shadow: 0 18px 40px rgba(0, 0, 0, 0.16);
        }

        .member-card.featured .member-image-wrap {
            aspect-ratio: 1 / 1.18;
            border-width: 8px;
        }

        .member-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .member-card:hover .member-image,
        .member-card.active .member-image {
            transform: scale(1.08);
        }

        .member-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.88) 0%, rgba(0,0,0,0.10) 58%, rgba(0,0,0,0) 100%);
            opacity: 0;
            transition: var(--transition);
            display: flex;
            align-items: flex-end;
            justify-content: center;
            text-align: center;
            padding: 25px;
        }

        .member-card:hover .member-overlay,
        .member-card.active .member-overlay {
            opacity: 1;
        }

        .member-info {
            width: 100%;
            max-width: 100%;
            transform: translateY(16px);
            transition: var(--transition);
        }

        .member-card:hover .member-info,
        .member-card.active .member-info {
            transform: translateY(0);
        }

        .member-name {
            color: var(--white);
            font-size: 1rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 4px;
            word-break: normal;
            overflow-wrap: break-word;
        }

        .member-role {
            color: rgba(255,255,255,0.82);
            font-size: 0.84rem;
            line-height: 1.25;
            font-weight: 500;
            word-break: normal;
            overflow-wrap: break-word;
        }

        .member-glow {
            position: absolute;
            inset: auto 20% -16px 20%;
            height: 30px;
            background: rgba(239, 60, 38, 0.22);
            filter: blur(18px);
            border-radius: 999px;
            opacity: 0;
            transition: var(--transition);
            pointer-events: none;
        }

        .member-card:hover .member-glow,
        .member-card.active .member-glow {
            opacity: 1;
        }

        .video-modal {
            position: fixed;
            inset: 0;
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            padding: 20px;
        }

        .video-modal.active {
            display: flex;
        }

        .video-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.88);
            backdrop-filter: blur(8px);
        }

        .video-content {
            position: relative;
            width: min(100%, 950px);
            z-index: 2;
            animation: scaleIn 0.35s ease;
        }

        .video-wrapper {
            position: relative;
            width: 100%;
            padding-top: 56.25%;
            border-radius: 20px;
            overflow: hidden;
            background: #000;
            box-shadow: 0 20px 60px rgba(0,0,0,0.5);
            border: 2px solid rgba(255,255,255,0.08);
        }

        .video-wrapper iframe {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
        }

        .close-video {
            position: absolute;
            top: -52px;
            right: 0;
            width: 42px;
            height: 42px;
            border-radius: 50%;
            border: none;
            background: var(--primary);
            color: #fff;
            font-size: 26px;
            line-height: 1;
            cursor: pointer;
            transition: 0.3s ease;
            box-shadow: 0 10px 20px rgba(239, 60, 38, 0.3);
        }

        .close-video:hover {
            transform: scale(1.08) rotate(90deg);
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(18px);
            }
        }

        @keyframes scaleIn {
            from {
                transform: scale(0.9);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        /* Tablet */
        @media (max-width: 991px) {
            .hero {
                min-height: 470px;
                padding: 50px 24px 150px;
            }

            .members {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .member-card.featured {
                grid-column: auto;
                max-width: none;
                margin: 0;
                order: initial;
            }
        }

        /* Mobile */
        @media (max-width: 767px) {
            .team-section {
                padding: 45px 14px;
            }

            .showcase {
                border-radius: 22px;
            }

            .hero {
                min-height: 430px;
                padding: 42px 18px 126px;
            }

            .hero h2 {
                font-size: 2rem;
            }

            .hero p {
                font-size: 0.95rem;
            }

            .members-wrap {
                margin-top: -82px;
                padding: 0 14px 22px;
            }

            .members {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 16px 14px;
                align-items: start;
            }

            .member-card,
            .member-card.featured {
                grid-column: auto;
                max-width: none;
                width: 100%;
                margin: 0;
                order: initial;
                transform: none;
            }

            .member-card:hover,
            .member-card.featured:hover {
                transform: translateY(-5px);
            }

            .member-card.featured .member-image-wrap,
            .member-image-wrap {
                aspect-ratio: 1 / 1.08;
                border-width: 5px;
                border-radius: 50%;
            }

            .member-overlay {
                opacity: 1;
                padding: 0;
                background: linear-gradient(to top, rgba(0,0,0,0.88) 0%, rgba(0,0,0,0.48) 34%, rgba(0,0,0,0.08) 68%, rgba(0,0,0,0) 100%);
            }

            .member-info {
                position: absolute;
                left: 9%;
                right: 9%;
                bottom: 15%;
                width: auto;
                max-width: none;
                transform: translateY(0);
                padding: 5px 4px;
                border-radius: 14px;
                background: rgba(0, 0, 0, 0.20);
                backdrop-filter: blur(2px);
            }

            .member-name {
                font-size: 0.78rem;
                line-height: 1.08;
                margin-bottom: 3px;
                color: #ffffff;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            .member-role {
                font-size: 0.62rem;
                line-height: 1.12;
                color: rgba(255,255,255,0.88);
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            .close-video {
                top: -48px;
                width: 40px;
                height: 40px;
            }
        }

        /* Small Mobile - 2 images per row and text fixed */
        @media (max-width: 480px) {
            .team-section {
                padding: 38px 10px;
            }

            .hero-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }

            .members-wrap {
                margin-top: -78px;
                padding-left: 10px;
                padding-right: 10px;
            }

            .members {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 14px 10px;
            }

            .member-card,
            .member-card.featured {
                grid-column: auto;
                max-width: none;
                margin: 0;
            }

            .member-card.featured .member-image-wrap,
            .member-image-wrap {
                aspect-ratio: 1 / 1.08;
                border-width: 4px;
                border-radius: 50%;
            }

            .member-info {
                left: 8%;
                right: 8%;
                bottom: 14%;
                padding: 4px 3px;
            }

            .member-name {
                font-size: 0.68rem;
                line-height: 1.05;
                margin-bottom: 2px;
            }

            .member-role {
                font-size: 0.55rem;
                line-height: 1.08;
            }

            .video-modal {
                padding: 14px;
            }

            .video-wrapper {
                border-radius: 14px;
            }
        }

        @media (max-width: 360px) {
            .members {
                gap: 12px 8px;
            }

            .member-info {
                left: 7%;
                right: 7%;
                bottom: 13%;
                padding: 3px 2px;
            }

            .member-name {
                font-size: 0.62rem;
            }

            .member-role {
                font-size: 0.5rem;
            }
        }
    </style>

    <script>
        (function () {
            const cards = document.querySelectorAll(".member-card");

            cards.forEach((card) => {
                card.addEventListener("click", () => {
                    const isActive = card.classList.contains("active");

                    cards.forEach((item) => item.classList.remove("active"));

                    if (!isActive) {
                        card.classList.add("active");
                    }
                });

                card.addEventListener("mouseleave", () => {
                    card.classList.remove("active");
                });

                card.addEventListener("blur", () => {
                    card.classList.remove("active");
                });
            });

            const openBtn = document.getElementById("openVideo");
            const modal = document.getElementById("videoModal");
            const closeBtn = document.getElementById("closeVideo");
            const overlay = document.getElementById("videoOverlay");
            const iframe = document.getElementById("videoFrame");
            const videoURL = "<?php echo esc_url($what_makes_video_url); ?>";

            if (openBtn && modal && closeBtn && overlay && iframe) {
                openBtn.addEventListener("click", function(e) {
                    e.preventDefault();
                    modal.classList.add("active");
                    document.body.style.overflow = "hidden";
                    iframe.src = videoURL;
                });

                function closeModal() {
                    modal.classList.remove("active");
                    iframe.src = "";
                    document.body.style.overflow = "";
                }

                closeBtn.addEventListener("click", closeModal);
                overlay.addEventListener("click", closeModal);

                document.addEventListener("keydown", function(e) {
                    if (e.key === "Escape" && modal.classList.contains("active")) {
                        closeModal();
                    }
                });
            }
        })();
    </script>

    <?php
    return ob_get_clean();
}

add_shortcode('careers_section_what_makes', 'careers_section_what_makes_funciton');