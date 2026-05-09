<?php

function single_page_shortcode_function() {
    ob_start();

    $gallery = get_post_meta(get_the_ID(), '_re_gallery_ids', true);
    $gallery = is_array($gallery) ? ($gallery[0] ?? '') : $gallery;
    $ids = array_filter(array_map('absint', explode(',', (string) $gallery)));

    $gallery_images = [];

    if (!empty($ids)) {
        foreach ($ids as $attachment_id) {
            $full_url  = wp_get_attachment_image_url($attachment_id, 'full');
            $large_url = wp_get_attachment_image_url($attachment_id, 'large');
            $alt_text  = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);

            if ($full_url) {
                $gallery_images[] = [
                    'id'    => $attachment_id,
                    'full'  => $full_url,
                    'thumb' => $large_url ?: $full_url,
                    'alt'   => $alt_text ?: get_the_title($attachment_id) ?: get_the_title(),
                ];
            }
        }
    }

    if (empty($gallery_images) && has_post_thumbnail()) {
        $thumb_id  = get_post_thumbnail_id(get_the_ID());
        $full_url  = wp_get_attachment_image_url($thumb_id, 'full');
        $large_url = wp_get_attachment_image_url($thumb_id, 'large');
        $alt_text  = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);

        if ($full_url) {
            $gallery_images[] = [
                'id'    => $thumb_id,
                'full'  => $full_url,
                'thumb' => $large_url ?: $full_url,
                'alt'   => $alt_text ?: get_the_title($thumb_id) ?: get_the_title(),
            ];
        }
    }

    if (!empty($gallery_images)) :
        $first_image = $gallery_images[0];
        $gallery_uid = 'pgallery_' . get_the_ID() . '_' . wp_rand(100, 999);
        $pp_address = get_post_meta(get_the_ID(), 'pp_address', true);
        ?>
        <section class="property-gallery" id="<?php echo esc_attr($gallery_uid); ?>">
            <div class="property-gallery__container">
                <div class="property-gallery__grid">
                    <article
                        class="gallery-card gallery-card--hero"
                        data-feature-card
                        data-image="<?php echo esc_url($first_image['full']); ?>"
                        data-alt="<?php echo esc_attr($first_image['alt']); ?>"
                        data-index="0"
                    >
                        <div class="gallery-slider-nav">
                            <button class="gallery-slider-nav__btn" type="button" data-gallery-prev aria-label="Previous image">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="m15 18-6-6 6-6"></path>
                                </svg>
                            </button>

                            <div class="gallery-pagination" data-gallery-pagination></div>

                            <button class="gallery-slider-nav__btn" type="button" data-gallery-next aria-label="Next image">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="m9 18 6-6-6-6"></path>
                                </svg>
                            </button>
                        </div>

                        <img
                            data-feature-image
                            src="<?php echo esc_url($first_image['thumb']); ?>"
                            alt="<?php echo esc_attr($first_image['alt']); ?>"
                        />
                        <div class="gallery-card__overlay"></div>

                        <div class="gallery-actions">
                            <button class="gallery-action" type="button" data-gallery-count>
                                <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                                    <path d="M4 7h3l2-2h6l2 2h3v12H4z"></path>
                                    <circle cx="12" cy="13" r="3"></circle>
                                </svg>
                                <span><?php echo esc_html(count($gallery_images)); ?> Photos</span>
                            </button>

                            <?php if(!empty($pp_address)) : ?>
                            <button class="gallery-action" type="button" data-location-btn>
                                <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                                    <path d="M12 21s-6-5.33-6-11a6 6 0 1 1 12 0c0 5.67-6 11-6 11Z"></path>
                                    <circle cx="12" cy="10" r="2.5"></circle>
                                </svg>
                                <span><?php echo esc_html($pp_address); ?></span>
                            </button>
                            <?php endif; ?>

                            <button class="gallery-action d-none" type="button" data-share-btn>
                                <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                                    <path d="M12 16V4"></path>
                                    <path d="m7 9 5-5 5 5"></path>
                                    <path d="M5 20h14"></path>
                                </svg>
                                <span>Share</span>
                            </button>
                        </div>
                    </article>

                    <div
                        class="property-gallery__side"
                        data-side-gallery
                        data-gallery='<?php echo esc_attr(wp_json_encode($gallery_images, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)); ?>'
                    >
                        <?php for ($i = 1; $i <= 2; $i++) : ?>
                            <?php $side_image = $gallery_images[$i] ?? null; ?>
                            <article
                                class="gallery-card gallery-card--side"
                                data-side-index="<?php echo esc_attr($i); ?>"
                                data-image="<?php echo esc_url($side_image['full'] ?? ''); ?>"
                                data-alt="<?php echo esc_attr($side_image['alt'] ?? 'Gallery image'); ?>"
                                <?php echo empty($side_image) ? 'style="display:none;"' : ''; ?>
                            >
                                <img
                                    src="<?php echo esc_url($side_image['thumb'] ?? ''); ?>"
                                    alt="<?php echo esc_attr($side_image['alt'] ?? 'Gallery image'); ?>"
                                />
                                <div class="gallery-card__overlay"></div>
                                <div class="gallery-badge">
                                    <span class="gallery-badge__dot"></span>
                                    <span class="gallery-badge__text"><?php echo esc_html(get_bloginfo('name')); ?></span>
                                </div>
                            </article>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>

            <div class="gallery-lightbox" data-gallery-lightbox aria-hidden="true">
                <div class="gallery-lightbox__dialog">
                    <button class="gallery-lightbox__close" type="button" data-lightbox-close aria-label="Close gallery">×</button>

                    <button class="gallery-lightbox__nav gallery-lightbox__nav--prev" type="button" data-lightbox-prev aria-label="Previous image">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="m15 18-6-6 6-6"></path>
                        </svg>
                    </button>

                    <img class="gallery-lightbox__image" data-lightbox-image src="" alt="Gallery preview" />

                    <button class="gallery-lightbox__nav gallery-lightbox__nav--next" type="button" data-lightbox-next aria-label="Next image">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>
                    </button>

                    <div class="gallery-lightbox__pagination" data-lightbox-pagination></div>
                </div>
            </div>
        </section>

        <style>
            :root {
                --primary: #ef3c26;
                --black: #111111;
                --white: #ffffff;
                --muted: #f5f5f5;
                --border: rgba(255, 255, 255, 0.14);
                --shadow: 0 18px 50px rgba(0, 0, 0, 0.14);
                --radius-lg: 10px;
                --radius-md: 14px;
                --transition: all 0.35s ease;
                --container: 1280px;
            }

            * {
                box-sizing: border-box;
                margin: 0;
                padding: 0;
            }

            img {
                display: block;
                width: 100%;
            }

            button {
                font: inherit;
                border: 0;
                background: none;
                cursor: pointer;
            }

            .property-gallery {
                padding: 16px;
                max-width: 1200px;
            }

            .property-gallery__container {
                max-width: var(--container);
                margin: 0 auto;
            }

            .property-gallery__grid {
                display: grid;
                grid-template-columns: minmax(0, 2.2fr) minmax(280px, 1fr);
                gap: 16px;
                align-items: stretch;
            }

            .gallery-card {
                position: relative;
                overflow: hidden;
                border-radius: var(--radius-lg);
                background: var(--black);
                box-shadow: var(--shadow);
            }

            .gallery-card img {
                height: 100%;
                object-fit: cover;
                transition: transform 0.6s ease;
            }

            .gallery-card:hover img {
                transform: scale(1.03);
            }

            .gallery-card::after {
                content: "";
                position: absolute;
                inset: 0;
                border: 1px solid var(--border);
                border-radius: inherit;
                pointer-events: none;
            }

            .gallery-card__overlay {
                position: absolute;
                inset: 0;
                background: linear-gradient(to top, rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.05), transparent);
                pointer-events: none;
            }

            .gallery-card--hero {
                min-height: 560px;
            }

            .gallery-card--hero img {
                width: 100%;
                height: 100%;
            }

            .gallery-slider-nav {
                position: absolute;
                top: 20px;
                left: 20px;
                right: 20px;
                z-index: 3;
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 12px;
            }

            .gallery-slider-nav__btn {
                width: 42px;
                height: 42px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                border-radius: 999px;
                background: rgba(17, 17, 17, 0.52);
                border: 1px solid rgba(255, 255, 255, 0.22);
                color: var(--white);
                backdrop-filter: blur(8px);
                box-shadow: 0 10px 24px rgba(0, 0, 0, 0.18);
                transition: var(--transition);
            }

            .gallery-slider-nav__btn:hover {
                background: var(--primary);
                border-color: var(--primary);
                transform: translateY(-2px);
            }

            .gallery-slider-nav__btn svg {
                width: 18px;
                height: 18px;
            }

            .gallery-pagination {
                display: flex;
                flex-wrap: wrap;
                align-items: center;
                justify-content: center;
                gap: 8px;
                flex: 1;
            }

            .gallery-pagination__btn,
            .gallery-lightbox__pagination-btn {
                width: 10px;
                height: 10px;
                border-radius: 999px;
                background: rgba(255, 255, 255, 0.45);
                border: 1px solid rgba(255, 255, 255, 0.6);
                transition: var(--transition);
            }

            .gallery-pagination__btn:hover,
            .gallery-pagination__btn.active,
            .gallery-lightbox__pagination-btn:hover,
            .gallery-lightbox__pagination-btn.active {
                width: 28px;
                background: var(--primary);
                border-color: var(--primary);
            }

            .gallery-card--side {
                min-height: 272px;
            }

            .property-gallery__side {
                display: grid;
                gap: 16px;
            }

            .gallery-actions {
                position: absolute;
                left: 24px;
                right: 24px;
                bottom: 24px;
                display: flex;
                flex-wrap: wrap;
                gap: 12px;
                z-index: 2;
            }

            .gallery-action {
                display: inline-flex;
                align-items: center;
                gap: 10px;
                padding: 12px 16px;
                background: var(--white);
                color: var(--black);
                border-radius: var(--radius-md);
                font-size: 14px;
                font-weight: 700;
                box-shadow: 0 12px 26px rgba(0, 0, 0, 0.12);
                transition: var(--transition);
            }

            .gallery-action:hover {
                color: var(--primary);
                transform: translateY(-2px);
            }

            .gallery-action svg {
                width: 18px;
                height: 18px;
                stroke: var(--primary);
                flex-shrink: 0;
            }

            .gallery-badge {
                position: absolute;
                left: 18px;
                bottom: 18px;
                z-index: 2;
                display: inline-flex;
                align-items: center;
                gap: 10px;
                padding: 10px 14px;
                border-radius: 999px;
                background: rgba(0, 0, 0, 0.42);
                backdrop-filter: blur(6px);
            }

            .gallery-badge__dot {
                width: 10px;
                height: 10px;
                border-radius: 50%;
                background: var(--primary);
                flex-shrink: 0;
            }

            .gallery-badge__text {
                color: var(--white);
                font-size: 16px;
                font-weight: 400;
                letter-spacing: -0.02em;
            }

            .gallery-lightbox {
                position: fixed;
                inset: 0;
                display: none;
                align-items: center;
                justify-content: center;
                padding: 20px;
                background: rgba(0, 0, 0, 0.82);
                z-index: 999;
            }

            .gallery-lightbox.active {
                display: flex;
            }

            .gallery-lightbox__dialog {
                position: relative;
                width: min(1100px, 100%);
                max-height: 90vh;
                border-radius: 20px;
                overflow: hidden;
                background: #000;
            }

            .gallery-lightbox__image {
                width: 100%;
                max-height: 90vh;
                object-fit: cover;
            }

            .gallery-lightbox__close {
                position: absolute;
                top: 16px;
                right: 16px;
                width: 42px;
                height: 42px;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.18);
                color: var(--white);
                font-size: 22px;
                z-index: 5;
            }

            .gallery-lightbox__nav {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                width: 48px;
                height: 48px;
                border-radius: 50%;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                background: rgba(255, 255, 255, 0.18);
                border: 1px solid rgba(255, 255, 255, 0.24);
                color: #fff;
                z-index: 5;
                transition: var(--transition);
            }

            .gallery-lightbox__nav:hover {
                background: var(--primary);
                border-color: var(--primary);
            }

            .gallery-lightbox__nav svg {
                width: 20px;
                height: 20px;
            }

            .gallery-lightbox__nav--prev {
                left: 16px;
            }

            .gallery-lightbox__nav--next {
                right: 16px;
            }

            .gallery-lightbox__pagination {
                position: absolute;
                left: 50%;
                bottom: 18px;
                transform: translateX(-50%);
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 8px;
                z-index: 5;
                padding: 10px 14px;
                border-radius: 999px;
                background: rgba(0, 0, 0, 0.35);
                backdrop-filter: blur(6px);
            }

            @media (max-width: 1199px) {
                .property-gallery__grid {
                    grid-template-columns: 1.7fr 1fr;
                }

                .gallery-card--hero {
                    min-height: 500px;
                }
            }

            @media (max-width: 991px) {
                .property-gallery {
                    padding: 14px;
                }

                .property-gallery__grid {
                    grid-template-columns: 1fr;
                }

                .property-gallery__side {
                    grid-template-columns: repeat(2, minmax(0, 1fr));
                }

                .gallery-card--hero {
                    min-height: 420px;
                }

                .gallery-card--side {
                    min-height: 240px;
                }
            }

            @media (max-width: 767px) {
                .property-gallery {
                    padding: 12px;
                }

                .property-gallery__grid,
                .property-gallery__side {
                    gap: 12px;
                }

                .property-gallery__side {
                    grid-template-columns: repeat(2, minmax(0, 1fr));
                }

                .gallery-card--hero {
                    min-height: 320px;
                }

                .gallery-card--side {
                    min-height: 170px;
                }

                .gallery-actions {
                    left: 12px;
                    right: 12px;
                    bottom: 12px;
                    gap: 8px;
                }

                .gallery-action {
                    padding: 10px 12px;
                    font-size: 13px;
                    border-radius: 12px;
                }

                .gallery-badge {
                    left: 12px;
                    bottom: 12px;
                    padding: 8px 12px;
                }

                .gallery-badge__text {
                    font-size: 16px;
                }

                .gallery-slider-nav {
                    top: 12px;
                    left: 12px;
                    right: 12px;
                    gap: 8px;
                }

                .gallery-slider-nav__btn {
                    width: 38px;
                    height: 38px;
                }

                .gallery-pagination {
                    gap: 6px;
                }

                .gallery-lightbox__nav {
                    width: 40px;
                    height: 40px;
                }

                .gallery-lightbox__nav--prev {
                    left: 10px;
                }

                .gallery-lightbox__nav--next {
                    right: 10px;
                }

                .gallery-lightbox__pagination {
                    bottom: 12px;
                    gap: 6px;
                    padding: 8px 10px;
                }
            }

            section.mp-media {
                display: flex;
                justify-content: center;
            }

            @media (max-width: 480px) {
                .gallery-actions {
                    display: grid;
                    grid-template-columns: repeat(2, minmax(0, 1fr));
                }

                .gallery-action:last-child {
                    grid-column: 1 / -1;
                }

                .gallery-card--hero {
                    min-height: 280px;
                }

                .gallery-card--side {
                    min-height: 150px;
                }
            }
        </style>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const galleryRoot = document.getElementById('<?php echo esc_js($gallery_uid); ?>');
                if (!galleryRoot) return;

                const sideGallery = galleryRoot.querySelector('[data-side-gallery]');
                if (!sideGallery) return;

                let galleryItems = [];
                try {
                    galleryItems = JSON.parse(sideGallery.getAttribute('data-gallery') || '[]');
                } catch (e) {
                    galleryItems = [];
                }

                if (!galleryItems.length) return;

                const lightbox = galleryRoot.querySelector('[data-gallery-lightbox]');
                const lightboxImage = galleryRoot.querySelector('[data-lightbox-image]');
                const lightboxClose = galleryRoot.querySelector('[data-lightbox-close]');
                const lightboxPrev = galleryRoot.querySelector('[data-lightbox-prev]');
                const lightboxNext = galleryRoot.querySelector('[data-lightbox-next]');
                const lightboxPagination = galleryRoot.querySelector('[data-lightbox-pagination]');
                const shareBtn = galleryRoot.querySelector('[data-share-btn]');
                const locationBtn = galleryRoot.querySelector('[data-location-btn]');
                const featureImage = galleryRoot.querySelector('[data-feature-image]');
                const featureCard = galleryRoot.querySelector('[data-feature-card]');
                const pagination = galleryRoot.querySelector('[data-gallery-pagination]');
                const prevBtn = galleryRoot.querySelector('[data-gallery-prev]');
                const nextBtn = galleryRoot.querySelector('[data-gallery-next]');
                const galleryCountBtn = galleryRoot.querySelector('[data-gallery-count]');
                const sideCards = sideGallery.querySelectorAll('[data-side-index]');

                let currentIndex = 0;
                let lightboxIndex = 0;

                function updateLightboxImage() {
                    const item = galleryItems[lightboxIndex];
                    if (!item) return;

                    lightboxImage.src = item.full;
                    lightboxImage.alt = item.alt || 'Gallery preview';
                    renderLightboxPagination();
                }

                function openLightboxByIndex(index) {
                    if (!galleryItems[index]) return;
                    lightboxIndex = index;
                    updateLightboxImage();
                    lightbox.classList.add('active');
                    lightbox.setAttribute('aria-hidden', 'false');
                    document.body.style.overflow = 'hidden';
                }

                function closeLightbox() {
                    lightbox.classList.remove('active');
                    lightbox.setAttribute('aria-hidden', 'true');
                    lightboxImage.src = '';
                    document.body.style.overflow = '';
                }

                function showNextLightboxImage() {
                    lightboxIndex = (lightboxIndex + 1) % galleryItems.length;
                    updateLightboxImage();
                }

                function showPrevLightboxImage() {
                    lightboxIndex = (lightboxIndex - 1 + galleryItems.length) % galleryItems.length;
                    updateLightboxImage();
                }

                function renderLightboxPagination() {
                    if (!lightboxPagination) return;

                    lightboxPagination.innerHTML = '';

                    if (galleryItems.length <= 1) {
                        lightboxPagination.style.display = 'none';
                        if (lightboxPrev) lightboxPrev.style.display = 'none';
                        if (lightboxNext) lightboxNext.style.display = 'none';
                        return;
                    }

                    lightboxPagination.style.display = 'flex';
                    if (lightboxPrev) lightboxPrev.style.display = 'inline-flex';
                    if (lightboxNext) lightboxNext.style.display = 'inline-flex';

                    galleryItems.forEach(function (_, index) {
                        const btn = document.createElement('button');
                        btn.type = 'button';
                        btn.className = 'gallery-lightbox__pagination-btn' + (index === lightboxIndex ? ' active' : '');
                        btn.setAttribute('aria-label', 'View image ' + (index + 1));
                        btn.addEventListener('click', function (event) {
                            event.stopPropagation();
                            lightboxIndex = index;
                            updateLightboxImage();
                        });
                        lightboxPagination.appendChild(btn);
                    });
                }

                function getVisibleImages(startIndex) {
                    const visibleImages = [];
                    const totalImages = galleryItems.length;

                    for (let i = 0; i < Math.min(3, totalImages); i += 1) {
                        const item = galleryItems[(startIndex + i) % totalImages];
                        visibleImages.push(item);
                    }

                    return visibleImages;
                }

                function renderPagination() {
                    pagination.innerHTML = '';

                    if (galleryItems.length <= 3) {
                        pagination.style.display = 'none';
                        prevBtn.style.display = 'none';
                        nextBtn.style.display = 'none';
                        return;
                    }

                    pagination.style.display = 'flex';
                    prevBtn.style.display = 'inline-flex';
                    nextBtn.style.display = 'inline-flex';

                    galleryItems.forEach(function (_, index) {
                        const btn = document.createElement('button');
                        btn.type = 'button';
                        btn.className = 'gallery-pagination__btn' + (index === currentIndex ? ' active' : '');
                        btn.setAttribute('aria-label', 'Show image set ' + (index + 1));

                        btn.addEventListener('click', function (event) {
                            event.stopPropagation();
                            setActiveImage(index);
                        });

                        pagination.appendChild(btn);
                    });
                }

                function renderSideImages(visibleImages) {
                    const sideItems = visibleImages.slice(1, 3);

                    sideCards.forEach(function (card, idx) {
                        const data = sideItems[idx];
                        const img = card.querySelector('img');

                        if (!data || !img) {
                            card.style.display = 'none';
                            return;
                        }

                        card.style.display = '';
                        card.setAttribute('data-image', data.full);
                        card.setAttribute('data-alt', data.alt);
                        card.setAttribute('data-side-index', (currentIndex + idx + 1) % galleryItems.length);
                        img.src = data.thumb || data.full;
                        img.alt = data.alt;
                    });
                }

                function setActiveImage(index) {
                    currentIndex = index;
                    const visibleImages = getVisibleImages(currentIndex);
                    const featured = visibleImages[0];

                    if (!featured) return;

                    featureImage.src = featured.thumb || featured.full;
                    featureImage.alt = featured.alt;
                    featureCard.setAttribute('data-image', featured.full);
                    featureCard.setAttribute('data-alt', featured.alt);
                    featureCard.setAttribute('data-index', currentIndex);

                    renderPagination();
                    renderSideImages(visibleImages);
                }

                function showNextImage() {
                    setActiveImage((currentIndex + 1) % galleryItems.length);
                }

                function showPrevImage() {
                    setActiveImage((currentIndex - 1 + galleryItems.length) % galleryItems.length);
                }

                featureCard.addEventListener('click', function (event) {
                    if (
                        event.target.closest('[data-location-btn]') ||
                        event.target.closest('[data-share-btn]') ||
                        event.target.closest('[data-gallery-count]') ||
                        event.target.closest('.gallery-pagination__btn') ||
                        event.target.closest('[data-gallery-prev]') ||
                        event.target.closest('[data-gallery-next]')
                    ) {
                        return;
                    }

                    openLightboxByIndex(parseInt(featureCard.getAttribute('data-index'), 10) || 0);
                });

                sideGallery.addEventListener('click', function (event) {
                    const card = event.target.closest('[data-side-index]');
                    if (!card) return;

                    const clickedIndex = parseInt(card.getAttribute('data-side-index'), 10);
                    openLightboxByIndex(isNaN(clickedIndex) ? 0 : clickedIndex);
                });

                prevBtn.addEventListener('click', function (event) {
                    event.stopPropagation();
                    showPrevImage();
                });

                nextBtn.addEventListener('click', function (event) {
                    event.stopPropagation();
                    showNextImage();
                });

                if (galleryCountBtn) {
                    galleryCountBtn.addEventListener('click', function () {
                        openLightboxByIndex(parseInt(featureCard.getAttribute('data-index'), 10) || 0);
                    });
                }

                if (lightboxPrev) {
                    lightboxPrev.addEventListener('click', function (event) {
                        event.stopPropagation();
                        showPrevLightboxImage();
                    });
                }

                if (lightboxNext) {
                    lightboxNext.addEventListener('click', function (event) {
                        event.stopPropagation();
                        showNextLightboxImage();
                    });
                }

                if (lightboxClose) {
                    lightboxClose.addEventListener('click', closeLightbox);
                }

                if (lightbox) {
                    lightbox.addEventListener('click', function (event) {

                        // If user clicks close button, nav button, image, or pagination, do nothing here
                        if (
                            event.target.closest('[data-lightbox-close]') ||
                            event.target.closest('[data-lightbox-prev]') ||
                            event.target.closest('[data-lightbox-next]') ||
                            event.target.closest('[data-lightbox-image]') ||
                            event.target.closest('[data-lightbox-pagination]')
                        ) {
                            return;
                        }

                        // Outside image click: left side = previous image, right side = next image
                        const clickX = event.clientX;
                        const screenMiddle = window.innerWidth / 2;

                        if (clickX < screenMiddle) {
                            showPrevLightboxImage();
                        } else {
                            showNextLightboxImage();
                        }
                    });
                }

                document.addEventListener('keydown', function (event) {
                    if (!galleryRoot) return;

                    if (event.key === 'Escape') {
                        closeLightbox();
                    }

                    if (lightbox.classList.contains('active')) {
                        if (event.key === 'ArrowRight') showNextLightboxImage();
                        if (event.key === 'ArrowLeft') showPrevLightboxImage();
                    } else {
                        if (event.key === 'ArrowRight') showNextImage();
                        if (event.key === 'ArrowLeft') showPrevImage();
                    }
                });

                if (shareBtn) {
                    shareBtn.addEventListener('click', async function () {
                        const shareData = {
                            title: document.title,
                            text: 'Check this property gallery section.',
                            url: window.location.href
                        };

                        try {
                            if (navigator.share) {
                                await navigator.share(shareData);
                            } else if (navigator.clipboard) {
                                await navigator.clipboard.writeText(window.location.href);
                                alert('Page link copied successfully.');
                            } else {
                                alert('Sharing is not supported in this browser.');
                            }
                        } catch (error) {
                            console.log('Share canceled or failed.', error);
                        }
                    });
                }

                if (locationBtn) {
                    locationBtn.addEventListener('click', function () {
                        // alert('Connect your property map or location page here.');
                    });
                }

                setActiveImage(0);
            });
        </script>
        <?php
    endif;

    return ob_get_clean();
}
add_shortcode('single_page_shortcode', 'single_page_shortcode_function');
