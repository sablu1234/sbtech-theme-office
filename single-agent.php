<?php get_header(); ?>
<!-- Hero section start-->
<section class="about_aget1_section">
  <div class="about_aget1_container">

    <div class="about_aget1_card">

      <!-- LEFT -->
       <?php
       $team_status = get_post_meta(get_the_ID(), 'team_status', true);
       $sale_property = get_post_meta(get_the_ID(), 'sale_property', true);
       $rent_property = get_post_meta(get_the_ID(), 'rent_property', true);
       $rent_property = get_post_meta(get_the_ID(), 'rent_property', true);
       $agents_language = get_post_meta(get_the_ID(), 'agent_repeat_items', true);
       ?>
      <div class="about_aget1_info">
        <h1 class="about_aget1_name"><?php the_title();?></h1>
        <?php if(!empty($team_status)):?>
        <div class="about_aget1_role"><?php echo esc_html($team_status); ?></div>
        <?php endif; ?>

        <div class="about_aget1_meta">
          <?php if(!empty($sale_property)):?>
          <div class="about_aget1_meta_row">
            <span>For Sale</span>
            <strong><?php echo esc_html($sale_property); ?> Properties</strong>
          </div>
          <?php endif; ?>

          <?php if(!empty($rent_property)):?>
          <div class="about_aget1_meta_row">
            <span>For Rent</span>
            <strong><?php echo esc_html($rent_property);?> Property</strong>
          </div>
          <?php endif; ?>

          <?php if(!empty($agents_language)):?>
          <div class="agents_language">
            <span>Languages</span>
            <strong>
                <?php 
                if (is_array($agents_language) && !empty($agents_language)) {
                    foreach ($agents_language as $item) {
                            echo esc_html($item) . ', ';
                    }
                }
                ?>
            </strong>
            
          </div>
          <?php endif; ?>
        </div>
      </div>

      <!-- IMAGE -->
      <div class="about_aget1_media">
        <img class="about_aget1_img"
             src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>"
             alt="Agent Image"
             onerror="this.src='https://dummyimage.com/400x500/ffffff/111&text=Agent';">
      </div>

      <!-- FORM -->
      <div class="about_aget1_form">
        <div class="about_aget1_form_card">
          <h2 class="about_aget1_title">Get Free Consultation</h2>

          <form>
            <div class="about_aget1_field">
              <input type="text" placeholder="Full Name*" required>
            </div>

            <div class="about_aget1_field">
              <input type="email" placeholder="Email*" required>
            </div>

            <div class="about_aget1_field">
              <input type="tel" placeholder="Phone*" required>
            </div>

            <div class="about_aget1_field">
              <textarea placeholder="Message"></textarea>
            </div>

            <button type="submit" class="about_aget1_btn">Contact me</button>
          </form>
        </div>
      </div>

    </div>

  </div>
</section>
<!-- Hero section end-->

<?php get_footer();
