<?php
/**
 * Agent Profile Shortcode
 * Shortcode: [agent_profile]
 */

if ( ! function_exists( 'pm_agent_profile_shortcode' ) ) {
	function pm_agent_profile_shortcode() {
		$pm_ap_instance_id = wp_unique_id( 'pm-ap-' );

		$pm_ap_home_agents_title = get_theme_mod(
			'home_agents_title',
			__( 'Our Agents', 'sbtech' )
		);

		$pm_ap_home_agents_desc = get_theme_mod(
			'home_agents_desc',
			__( 'Meet our top-performing agents selected for outstanding results, client satisfaction, and market expertise.', 'sbtech' )
		);

		ob_start();
		?>

		<style>
			#<?php echo esc_attr( $pm_ap_instance_id ); ?>.pm-ap-section {
				--pm-ap-primary: #EF3C26;
				--pm-ap-black: #0b0b0c;
				--pm-ap-white: #ffffff;
				--pm-ap-border: #e9eef3;
				--pm-ap-shadow: 0 18px 55px rgba(16, 24, 40, .10);
				--pm-ap-shadow-hover: 0 26px 85px rgba(16, 24, 40, .16);
				--pm-ap-radius: 16px;

				font-family: 'Poppins', sans-serif;
				background: var(--pm-ap-white);
				padding: 60px 16px;
				color: var(--pm-ap-black);
			}

			#<?php echo esc_attr( $pm_ap_instance_id ); ?> .pm-ap-container {
				max-width: 1200px;
				width: 100%;
				margin: 0 auto;
			}

			#<?php echo esc_attr( $pm_ap_instance_id ); ?> .pm-ap-header {
				display: flex;
				justify-content: space-between;
				align-items: flex-end;
				gap: 16px;
				margin-bottom: 20px;
			}

			#<?php echo esc_attr( $pm_ap_instance_id ); ?> .pm-ap-title {
				margin: 0;
				font-size: 40px;
				line-height: 1.1;
				font-weight: 600;
				letter-spacing: -.5px;
			}

			#<?php echo esc_attr( $pm_ap_instance_id ); ?> .pm-ap-subtitle {
				margin: 0;
				font-size: 14px;
				line-height: 1.6;
				color: rgba(11, 11, 12, .75);
				max-width: 520px;
			}

			#<?php echo esc_attr( $pm_ap_instance_id ); ?> .pm-ap-slider-wrap {
				position: relative;
				margin-top: 18px;
			}

			#<?php echo esc_attr( $pm_ap_instance_id ); ?> .pm-ap-grid {
				display: flex;
				gap: 18px;
				margin-top: 18px;
				overflow-x: auto;
				scroll-snap-type: x mandatory;
				scroll-behavior: smooth;
				scrollbar-width: none;
				-ms-overflow-style: none;
				padding: 4px 2px 24px;
			}

			#<?php echo esc_attr( $pm_ap_instance_id ); ?> .pm-ap-grid::-webkit-scrollbar {
				display: none;
			}

			#<?php echo esc_attr( $pm_ap_instance_id ); ?> .pm-ap-card {
				flex: 0 0 calc((100% - 54px) / 4);
				scroll-snap-align: start;
				background: var(--pm-ap-white);
				border: 1px solid var(--pm-ap-border);
				border-radius: var(--pm-ap-radius);
				overflow: hidden;
				box-shadow: var(--pm-ap-shadow);
				transition: .25s ease;
				display: flex;
				flex-direction: column;
				text-decoration: none;
				color: inherit;
			}

			#<?php echo esc_attr( $pm_ap_instance_id ); ?> .pm-ap-card:hover {
				transform: translateY(-3px);
				box-shadow: var(--pm-ap-shadow-hover);
			}

			#<?php echo esc_attr( $pm_ap_instance_id ); ?> .pm-ap-card-media {
				position: relative;
				height: 230px;
				overflow: hidden;
				background: #f6f7f8;
			}

			#<?php echo esc_attr( $pm_ap_instance_id ); ?> .pm-ap-card-media img {
				width: 100%;
				height: 100%;
				object-fit: cover;
				object-position: center top;
				display: block;
				transition: transform .7s ease;
			}

			#<?php echo esc_attr( $pm_ap_instance_id ); ?> .pm-ap-card:hover .pm-ap-card-media img {
				transform: scale(1.08);
			}

			#<?php echo esc_attr( $pm_ap_instance_id ); ?> .pm-ap-card-tag {
				position: absolute;
				top: 12px;
				left: 12px;
				background: rgba(255, 255, 255, .92);
				border: 1px solid rgba(239, 60, 38, .22);
				color: var(--pm-ap-black);
				padding: 7px 10px;
				border-radius: 999px;
				font-size: 12px;
				font-weight: 600;
				backdrop-filter: blur(6px);
			}

			#<?php echo esc_attr( $pm_ap_instance_id ); ?> .pm-ap-card-body {
				padding: 16px 16px 18px;
			}

			#<?php echo esc_attr( $pm_ap_instance_id ); ?> .pm-ap-agent-name {
				margin: 0 0 6px 0;
				font-size: 18px;
				font-weight: 600;
				letter-spacing: -.2px;
			}

			#<?php echo esc_attr( $pm_ap_instance_id ); ?> .pm-ap-agent-meta {
				margin: 0;
				font-size: 13px;
				line-height: 1.6;
				color: rgba(11, 11, 12, .75);
			}

			#<?php echo esc_attr( $pm_ap_instance_id ); ?> .pm-ap-agent-meta strong {
				color: var(--pm-ap-primary);
				font-weight: 600;
			}

			#<?php echo esc_attr( $pm_ap_instance_id ); ?> .pm-ap-card-footer {
				padding: 0 16px 16px;
				margin-top: auto;
			}

			#<?php echo esc_attr( $pm_ap_instance_id ); ?> .pm-ap-btn {
				display: inline-flex;
				align-items: center;
				justify-content: center;
				gap: 8px;
				width: 100%;
				padding: 10px 12px;
				border-radius: 12px;
				border: 1.5px solid rgba(239, 60, 38, .45);
				color: var(--pm-ap-primary);
				background: #fff;
				font-weight: 600;
				font-size: 13px;
				text-decoration: none;
				transition: .2s ease;
			}

			#<?php echo esc_attr( $pm_ap_instance_id ); ?> .pm-ap-btn:hover {
				background: var(--pm-ap-primary);
				color: #fff;
			}

			#<?php echo esc_attr( $pm_ap_instance_id ); ?> .pm-ap-nav {
				display: flex;
				align-items: center;
				justify-content: center;
				position: absolute;
				top: 50%;
				transform: translateY(-50%);
				z-index: 5;
				width: 42px;
				height: 42px;
				border-radius: 50%;
				border: 1px solid rgba(239, 60, 38, .25);
				background: rgba(255, 255, 255, .96);
				color: var(--pm-ap-primary);
				box-shadow: 0 12px 35px rgba(16, 24, 40, .16);
				font-size: 30px;
				line-height: 1;
				font-weight: 400;
				cursor: pointer;
				transition: .2s ease;
			}

			#<?php echo esc_attr( $pm_ap_instance_id ); ?> .pm-ap-nav:hover {
				background: var(--pm-ap-primary);
				color: #fff;
			}

			#<?php echo esc_attr( $pm_ap_instance_id ); ?> .pm-ap-prev {
				left: -18px;
			}

			#<?php echo esc_attr( $pm_ap_instance_id ); ?> .pm-ap-next {
				right: -18px;
			}

			@media (max-width: 992px) {
				#<?php echo esc_attr( $pm_ap_instance_id ); ?> .pm-ap-title {
					font-size: 32px;
				}

				#<?php echo esc_attr( $pm_ap_instance_id ); ?> .pm-ap-card {
					flex: 0 0 calc((100% - 18px) / 2);
				}

				#<?php echo esc_attr( $pm_ap_instance_id ); ?> .pm-ap-card-media {
					height: 240px;
				}

				#<?php echo esc_attr( $pm_ap_instance_id ); ?> .pm-ap-prev {
					left: -10px;
				}

				#<?php echo esc_attr( $pm_ap_instance_id ); ?> .pm-ap-next {
					right: -10px;
				}
			}

			@media (max-width: 600px) {
				#<?php echo esc_attr( $pm_ap_instance_id ); ?>.pm-ap-section {
					padding: 44px 14px;
				}

				#<?php echo esc_attr( $pm_ap_instance_id ); ?> .pm-ap-header {
					flex-direction: column;
					align-items: flex-start;
				}

				#<?php echo esc_attr( $pm_ap_instance_id ); ?> .pm-ap-title {
					font-size: 26px;
				}

				#<?php echo esc_attr( $pm_ap_instance_id ); ?> .pm-ap-slider-wrap {
					padding: 0 4px;
				}

				#<?php echo esc_attr( $pm_ap_instance_id ); ?> .pm-ap-grid {
					gap: 14px;
					padding: 4px 0 18px;
				}

				#<?php echo esc_attr( $pm_ap_instance_id ); ?> .pm-ap-card {
					flex: 0 0 100%;
				}

				#<?php echo esc_attr( $pm_ap_instance_id ); ?> .pm-ap-card-media {
					height: 240px;
				}

				#<?php echo esc_attr( $pm_ap_instance_id ); ?> .pm-ap-nav {
					width: 38px;
					height: 38px;
					font-size: 28px;
				}

				#<?php echo esc_attr( $pm_ap_instance_id ); ?> .pm-ap-prev {
					left: -2px;
				}

				#<?php echo esc_attr( $pm_ap_instance_id ); ?> .pm-ap-next {
					right: -2px;
				}
			}
		</style>

		<section id="<?php echo esc_attr( $pm_ap_instance_id ); ?>" class="pm-ap-section">
			<div class="pm-ap-container">

				<div class="pm-ap-header">
					<div>
						<?php if ( ! empty( $pm_ap_home_agents_title ) ) : ?>
							<h2 class="pm-ap-title"><?php echo esc_html( $pm_ap_home_agents_title ); ?></h2>
						<?php endif; ?>

						<?php if ( ! empty( $pm_ap_home_agents_desc ) ) : ?>
							<p class="pm-ap-subtitle"><?php echo esc_html( $pm_ap_home_agents_desc ); ?></p>
						<?php endif; ?>
					</div>
				</div>

				<div class="pm-ap-slider-wrap">
					<button type="button" class="pm-ap-nav pm-ap-prev" aria-label="<?php echo esc_attr__( 'Previous agent', 'sbtech' ); ?>">
						‹
					</button>

					<div class="pm-ap-grid">
						<?php
						$pm_ap_agent_query = new WP_Query(
							array(
								'post_type'           => 'agents',
								'posts_per_page'      => 8,
								'post_status'         => 'publish',
								'orderby'             => 'rand',
								'ignore_sticky_posts' => true,
								'no_found_rows'       => true,

								// Hide agent only if agent_show value is "no"
								// If agent_show is yes or empty/not set, agent will show
								'meta_query'          => array(
									'relation' => 'OR',
									array(
										'key'     => 'agent_show',
										'value'   => 'no',
										'compare' => '!=',
									),
									array(
										'key'     => 'agent_show',
										'compare' => 'NOT EXISTS',
									),
								),
							)
						);

						if ( $pm_ap_agent_query->have_posts() ) :
							while ( $pm_ap_agent_query->have_posts() ) :
								$pm_ap_agent_query->the_post();

								$pm_ap_agent_id        = get_the_ID();
								$pm_ap_agent_permalink = get_permalink( $pm_ap_agent_id );
								$pm_ap_agent_image     = get_the_post_thumbnail_url( $pm_ap_agent_id, 'medium' );
								$pm_ap_languages       = get_post_meta( $pm_ap_agent_id, 'agent_repeat_items', true );
								$pm_ap_languages_text  = '';

								if ( is_array( $pm_ap_languages ) && ! empty( $pm_ap_languages ) ) {
									$pm_ap_languages_text = implode( ', ', array_map( 'sanitize_text_field', $pm_ap_languages ) );
								} elseif ( is_string( $pm_ap_languages ) && '' !== $pm_ap_languages ) {
									$pm_ap_languages_text = sanitize_text_field( $pm_ap_languages );
								}
								?>

								<a class="pm-ap-card" href="<?php echo esc_url( $pm_ap_agent_permalink ); ?>">
									<div class="pm-ap-card-media">
										<?php if ( ! empty( $pm_ap_agent_image ) ) : ?>
											<img src="<?php echo esc_url( $pm_ap_agent_image ); ?>" alt="<?php echo esc_attr( get_the_title( $pm_ap_agent_id ) ); ?>">
										<?php endif; ?>
									</div>

									<div class="pm-ap-card-body">
										<h3 class="pm-ap-agent-name"><?php echo esc_html( get_the_title( $pm_ap_agent_id ) ); ?></h3>

										<?php if ( ! empty( $pm_ap_languages_text ) ) : ?>
											<p class="pm-ap-agent-meta">
												<strong><?php echo esc_html__( 'Speaks:', 'sbtech' ); ?></strong>
												<?php echo esc_html( $pm_ap_languages_text ); ?>
											</p>
										<?php endif; ?>
									</div>

									<div class="pm-ap-card-footer">
										<span class="pm-ap-btn"><?php echo esc_html__( 'View Profile', 'sbtech' ); ?> →</span>
									</div>
								</a>

								<?php
							endwhile;
							wp_reset_postdata();
						endif;
						?>
					</div>

					<button type="button" class="pm-ap-nav pm-ap-next" aria-label="<?php echo esc_attr__( 'Next agent', 'sbtech' ); ?>">
						›
					</button>
				</div>

			</div>
		</section>

		<script>
			(function () {
				function pmAgentProfileInit() {
					const section = document.getElementById(<?php echo wp_json_encode( $pm_ap_instance_id ); ?>);

					if (!section) {
						return;
					}

					const slider = section.querySelector('.pm-ap-grid');
					const prevBtn = section.querySelector('.pm-ap-prev');
					const nextBtn = section.querySelector('.pm-ap-next');

					if (!slider || !prevBtn || !nextBtn) {
						return;
					}

					let autoSlide = null;

					function getGap() {
						return window.innerWidth <= 600 ? 14 : 18;
					}

					function getSlideWidth() {
						const firstCard = slider.querySelector('.pm-ap-card');

						if (!firstCard) {
							return 0;
						}

						return firstCard.offsetWidth + getGap();
					}

					function goNext() {
						const slideWidth = getSlideWidth();

						if (!slideWidth) {
							return;
						}

						if (slider.scrollLeft + slider.clientWidth >= slider.scrollWidth - 5) {
							slider.scrollTo({
								left: 0,
								behavior: 'smooth'
							});
						} else {
							slider.scrollBy({
								left: slideWidth,
								behavior: 'smooth'
							});
						}
					}

					function goPrev() {
						const slideWidth = getSlideWidth();

						if (!slideWidth) {
							return;
						}

						if (slider.scrollLeft <= 5) {
							slider.scrollTo({
								left: slider.scrollWidth,
								behavior: 'smooth'
							});
						} else {
							slider.scrollBy({
								left: -slideWidth,
								behavior: 'smooth'
							});
						}
					}

					function stopAutoSlide() {
						if (autoSlide) {
							clearInterval(autoSlide);
							autoSlide = null;
						}
					}

					function startAutoSlide() {
						stopAutoSlide();
						autoSlide = setInterval(goNext, 3500);
					}

					nextBtn.addEventListener('click', function () {
						goNext();
						startAutoSlide();
					});

					prevBtn.addEventListener('click', function () {
						goPrev();
						startAutoSlide();
					});

					slider.addEventListener('mouseenter', stopAutoSlide);
					slider.addEventListener('mouseleave', startAutoSlide);

					slider.addEventListener('touchstart', stopAutoSlide, { passive: true });
					slider.addEventListener('touchend', startAutoSlide, { passive: true });

					window.addEventListener('resize', startAutoSlide);

					startAutoSlide();
				}

				if (document.readyState === 'loading') {
					document.addEventListener('DOMContentLoaded', pmAgentProfileInit);
				} else {
					pmAgentProfileInit();
				}
			})();
		</script>

		<?php
		return ob_get_clean();
	}
}

add_shortcode( 'agent_profile', 'pm_agent_profile_shortcode' );