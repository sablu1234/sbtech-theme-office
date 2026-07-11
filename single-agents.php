<?php get_header(); ?>

<!-- My Agents Hero section start -->
 <style>
  /* My Agents Hero Start ============================================ */

.my_agents_section{
  --my_agents_p:#EF3C26;
  --my_agents_b:#050505;
  --my_agents_line:#eef1f4;
  --my_agents_radius:18px;
  --my_agents_shadow:0 18px 60px rgba(16,24,40,.08);

  padding:48px 16px;
  background:#ffffff;
  font-family:'Poppins',sans-serif;
  color:var(--my_agents_b);
}

.my_agents_section,
.my_agents_section *{
  box-sizing:border-box;
}

.my_agents_container{
  max-width:1200px;
  margin:0 auto;
  width:100%;
}

.my_agents_card{
  display:flex;
  gap:0;
  border-radius:18px;
  border:1px solid var(--my_agents_line);
  box-shadow:var(--my_agents_shadow);
  overflow:hidden;
  background:#fff;
  position:relative;
}

.my_agents_card::before{
  content:"";
  position:absolute;
  top:0;
  left:0;
  right:0;
  height:4px;
  background:var(--my_agents_p);
  z-index:5;
}

/* LEFT INFO */
.my_agents_info{
  flex:0 0 360px;
  padding:32px 26px;
  border-right:1px solid #eef1f4;
  background:#fff;
}

.my_agents_name{
  margin:0 0 6px;
  font-size:23px;
  line-height:1.2;
  font-weight:800;
  letter-spacing:-.4px;
  color:#050505;
}

.my_agents_role{
  font-size:14px;
  line-height:1.4;
  color:var(--my_agents_p);
  font-weight:800;
  margin-bottom:22px;
}

.my_agents_meta{
  display:flex;
  flex-direction:column;
  gap:18px;
}

/* STATS BOX */
.my_agents_stats_box{
  border:1px solid #e8ebef;
  border-radius:10px;
  background:#fff;
  overflow:hidden;
}

.my_agents_meta_row{
  display:flex;
  justify-content:space-between;
  align-items:center;
  gap:12px;
  padding:16px 18px;
  font-size:13px;
  line-height:1.3;
  font-weight:800;
  color:#111;
  border-bottom:1px solid #eef0f3;
  background:#fff;
}

.my_agents_meta_row:last-child{
  border-bottom:0;
}

.my_agents_meta_left{
  display:flex;
  align-items:center;
  gap:13px;
}

.my_agents_meta_row span{
  color:#111;
}

.my_agents_meta_row strong{
  font-size:13px;
  font-weight:800;
  color:#111;
  white-space:nowrap;
}

.my_agents_icon{
  width:18px;
  height:18px;
  color:var(--my_agents_p);
  display:inline-flex;
  align-items:center;
  justify-content:center;
  flex:0 0 18px;
}

/* LANGUAGE + ABOUT */
.my_agents_language_box,
.my_agents_about_box{
  border:1px solid #e8ebef;
  border-radius:10px;
  background:#fff;
}

.my_agents_language_box{
  padding:20px 18px;
}

.my_agents_about_box{
  padding:20px 18px 22px;
}

.my_agents_block_head{
  display:flex;
  align-items:center;
  gap:13px;
  margin-bottom:8px;
  font-size:14px;
  line-height:1.3;
  font-weight:800;
  color:#111;
}

.my_agents_big_icon{
  width:25px;
  height:25px;
  color:var(--my_agents_p);
  display:inline-flex;
  align-items:center;
  justify-content:center;
  flex:0 0 25px;
}

.my_agents_small_icon{
  width:18px;
  height:18px;
  color:var(--my_agents_p);
  display:inline-flex;
  align-items:center;
  justify-content:center;
  flex:0 0 18px;
}

.my_agents_language_box strong{
  display:block;
  padding-left:38px;
  font-size:14px;
  line-height:1.5;
  font-weight:800;
  color:#111;
}

.my_agents_content{
  margin-top:12px;
  font-size:13.5px;
  line-height:1.85;
  color:#111;
  font-weight:500;
}

.my_agents_content p{
  margin:0 0 10px;
}

.my_agents_content p:last-child{
  margin-bottom:0;
}

/* CENTER IMAGE */
.my_agents_media{
  flex:1 1 auto;
  padding:38px 28px 25px;
  background:#fff;
  display:flex;
  flex-direction:column;
  align-items:center;
  justify-content:center;
}

.my_agents_image_box{
  width:100%;
  max-width:355px;
  height:445px;
  border-radius:8px;
  overflow:hidden;
  background:#eef0f3;
}

.my_agents_img{
  width:100%;
  height:100%;
  object-fit:cover;
  object-position:center top;
  display:block;
}

.my_agents_quote{
  width:100%;
  max-width:355px;
  margin-top:14px;
  padding:15px 18px;
  border-radius:8px;
  background:linear-gradient(90deg, rgba(239,60,38,.10), rgba(239,60,38,.04));
  display:flex;
  align-items:flex-start;
  gap:13px;
}

.my_agents_quote span{
  color:var(--my_agents_p);
  font-size:34px;
  line-height:1;
  font-weight:800;
}

.my_agents_quote p{
  margin:0;
  font-size:14px;
  line-height:1.45;
  color:#111;
  font-style:italic;
  font-weight:500;
}

/* RIGHT FORM - shortcode same, inner field touch kora hoyni */
.my_agents_form{
  flex:0 0 380px;
  padding:30px 24px;
  border-left:1px solid #eef1f4;
  background:#fff;
  display:flex;
  align-items:center;
}

/* RESPONSIVE */
@media (max-width:1100px){
  .my_agents_card{
    flex-wrap:wrap;
  }

  .my_agents_media{
    order:1;
    flex:1 1 50%;
    border-right:1px solid #eef1f4;
  }

  .my_agents_info{
    order:2;
    flex:1 1 50%;
    border-right:0;
  }

  .my_agents_form{
    order:3;
    flex:1 1 100%;
    border-left:0;
    border-top:1px solid #eef1f4;
  }
}

@media (max-width:768px){
  .my_agents_section{
    padding:32px 14px;
  }

  .my_agents_card{
    display:flex;
    flex-direction:column;
  }

  .my_agents_media{
    order:1;
    width:100%;
    border:0;
    padding:28px 20px 20px;
  }

  .my_agents_info{
    order:2;
    width:100%;
    border:0;
    padding:24px 20px;
  }

  .my_agents_form{
    order:3;
    width:100%;
    border:0;
    padding:24px 20px 28px;
  }

  .my_agents_image_box{
    height:420px;
    max-width:100%;
  }

  .my_agents_quote{
    max-width:100%;
  }
}

@media (max-width:480px){
  .my_agents_name{
    font-size:21px;
  }

  .my_agents_image_box{
    height:360px;
  }

  .my_agents_meta_row{
    padding:15px 14px;
    font-size:13px;
  }

  .my_agents_meta_row strong{
    font-size:12px;
  }

  .my_agents_language_box,
  .my_agents_about_box{
    padding:18px 15px;
  }
}

/* My Agents Hero End ============================================ */
 </style>
<section class="my_agents_section">
  <div class="my_agents_container">

    <div class="my_agents_card">

      <!-- LEFT -->
      <?php
      $team_status     = get_post_meta(get_the_ID(), 'team_status', true);
      $sale_property   = get_post_meta(get_the_ID(), 'sale_property', true);
      $rent_property   = get_post_meta(get_the_ID(), 'rent_property', true);
      $agents_language = get_post_meta(get_the_ID(), 'agent_repeat_items', true);
      ?>

      <div class="my_agents_info">
        <h1 class="my_agents_name"><?php the_title(); ?></h1>

        <?php if(!empty($team_status)): ?>
          <div class="my_agents_role"><?php echo esc_html($team_status); ?></div>
        <?php endif; ?>

        <div class="my_agents_meta">

          <?php if(!empty($sale_property) || !empty($rent_property)): ?>
            <div class="my_agents_stats_box">

              <?php if(!empty($sale_property)): ?>
                <div class="my_agents_meta_row">
                  <div class="my_agents_meta_left">
                    <span class="my_agents_icon">
                      <svg viewBox="0 0 24 24" width="17" height="17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 11L12 4L21 11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M5 10.5V20H19V10.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M10 20V14H14V20" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                    </span>
                    <span>For Sale</span>
                  </div>
                  <strong><?php echo esc_html($sale_property); ?> Properties</strong>
                </div>
              <?php endif; ?>

              <?php if(!empty($rent_property)): ?>
                <div class="my_agents_meta_row">
                  <div class="my_agents_meta_left">
                    <span class="my_agents_icon">
                      <svg viewBox="0 0 24 24" width="17" height="17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14 7L17 4L20 7L17 10L14 7Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                        <path d="M14 7L4 17V20H7L17 10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                    </span>
                    <span>For Rent</span>
                  </div>
                  <strong><?php echo esc_html($rent_property); ?> Properties</strong>
                </div>
              <?php endif; ?>

            </div>
          <?php endif; ?>

          <?php if(!empty($agents_language)): ?>
            <div class="my_agents_language_box">
              <div class="my_agents_block_head">
                <span class="my_agents_big_icon">
                  <svg viewBox="0 0 24 24" width="17" height="17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="currentColor" stroke-width="2"/>
                    <path d="M2 12H22" stroke="currentColor" stroke-width="2"/>
                    <path d="M12 2C14.5 4.7 15.8 8.1 15.8 12C15.8 15.9 14.5 19.3 12 22" stroke="currentColor" stroke-width="2"/>
                    <path d="M12 2C9.5 4.7 8.2 8.1 8.2 12C8.2 15.9 9.5 19.3 12 22" stroke="currentColor" stroke-width="2"/>
                  </svg>
                </span>
                <span>Languages</span>
              </div>

              <strong>
                <?php
                if (is_array($agents_language) && !empty($agents_language)) {
                  echo esc_html(implode(', ', $agents_language));
                } else {
                  echo esc_html($agents_language);
                }
                ?>
              </strong>
            </div>
          <?php endif; ?>

          <?php if(!empty(get_the_content())): ?>
            <div class="my_agents_about_box">
              <div class="my_agents_block_head">
                <span class="my_agents_small_icon">
                  <svg viewBox="0 0 24 24" width="17" height="17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 12C14.2091 12 16 10.2091 16 8C16 5.79086 14.2091 4 12 4C9.79086 4 8 5.79086 8 8C8 10.2091 9.79086 12 12 12Z" stroke="currentColor" stroke-width="2"/>
                    <path d="M4 21C4.8 16.8 7.7 14.5 12 14.5C16.3 14.5 19.2 16.8 20 21" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                  </svg>
                </span>
                <span>About Me</span>
              </div>

              <div class="my_agents_content">
                <?php the_content(); ?>
              </div>
            </div>
          <?php endif; ?>

        </div>
      </div>

      <!-- IMAGE -->
      <div class="my_agents_media">
        <div class="my_agents_image_box">
          <img class="my_agents_img"
               src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); ?>"
               alt="Agent Image"
               onerror="this.src='https://dummyimage.com/400x500/ffffff/111&text=Agent';">
        </div>

        <div class="my_agents_quote">
          <span>“</span>
          <p>Helping you find not just a property, but a place you’ll love to call home.</p>
        </div>
      </div>

      <!-- FORM -->
      <div class="my_agents_form">
        <?php echo do_shortcode('[aget_form]'); ?>
      </div>

    </div>

  </div>
</section>
<!-- My Agents Hero section end -->

<?php get_footer(); ?>