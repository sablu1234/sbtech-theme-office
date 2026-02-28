<?php
/**
 * Client Trust Testimonials (Shortcode)
 * Shortcode: [client_trust]
 * Prefix: client-trust-
 */

add_shortcode('client_trust', function () {

  // Demo testimonials (আপনার client content এখানে replace করবেন)
  $items = [
    [
      'name' => 'Bashar Masalha',
      'time' => '2 months ago',
      'title'=> 'An Honest Approach to Real Estate',
      'text' => 'We received clear guidance from the team and felt confident throughout the process. Communication was fast, transparent, and professional.'
    ],
    [
      'name' => 'Anadi Mishra',
      'time' => '2 months ago',
      'title'=> 'Expert Guidance and Value-Driven Support',
      'text' => 'From shortlisting to closing, everything was handled smoothly. Their market knowledge and quick follow-ups made the entire journey stress-free.'
    ],
    [
      'name' => 'Violin Lee',
      'time' => '5 months ago',
      'title'=> 'A Supportive and Professional Experience',
      'text' => 'We appreciated the patience and attention to detail. The team helped us find the right option and guided us step-by-step.'
    ],
  ];

  ob_start(); ?>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <style>
    .client-trust-section{
      --clr-primary:#ef3c26;
      --clr-black:#0b0b0b;
      --clr-white:#ffffff;

      font-family:"Poppins",system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif;
      background: var(--clr-white);
      color: var(--clr-black);
      padding: clamp(22px, 4vw, 60px) 16px;
    }
    .client-trust-section *{box-sizing:border-box;}
    .client-trust-container{max-width:1200px;margin:0 auto;}

    .client-trust-head{
      text-align:center;
      margin-bottom:18px;
    }
    .client-trust-title{
      margin:0;
      font-size: clamp(24px, 3vw, 44px);
      font-weight:800;
      letter-spacing:-.02em;
      line-height:1.1;
    }
    .client-trust-subtitle{
      margin: 12px auto 0;
      max-width: 760px;
      font-size: 14.5px;
      line-height: 1.8;
      color: rgba(0,0,0,.65);
    }

    .client-trust-grid{
      display:flex;
      gap:16px;
      flex-wrap:wrap;
      justify-content:center;
      margin-top: 22px;
    }
    .client-trust-card{
      flex: 1 1 calc(33.333% - 16px);
      min-width: 270px;
      background:#fff;
      border:1px solid rgba(0,0,0,.10);
      border-radius:18px;
      padding:18px 18px 16px;
      box-shadow: 0 14px 34px rgba(0,0,0,.06);
      transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease;
    }
    .client-trust-card:hover{
      transform: translateY(-2px);
      box-shadow: 0 18px 44px rgba(0,0,0,.10);
      border-color: rgba(239,60,38,.22);
    }

    .client-trust-top{
      display:flex;
      align-items:flex-start;
      gap:12px;
      margin-bottom:12px;
    }

    .client-trust-avatar{
      flex:0 0 48px;
      width:48px;height:48px;
      border-radius:14px;
      border:1px solid rgba(0,0,0,.12);
      background: rgba(239,60,38,.07);
      display:flex;
      align-items:center;
      justify-content:center;
      font-weight:900;
      color: var(--clr-primary);
      letter-spacing:.02em;
      user-select:none;
    }

    .client-trust-meta{
      flex:1 1 auto;
      min-width:0;
    }
    .client-trust-name {
      margin: 0;
      font-size: 14.5px;
      font-weight: 600;
      color: var(--clr-black);
      line-height: 1.2;
  }
    .client-trust-time{
      margin:4px 0 0;
      font-size:12.5px;
      color: rgba(0,0,0,.55);
      font-weight:600;
    }

    .client-trust-stars{
      display:flex;
      gap:2px;
      margin-top:6px;
    }
    .client-trust-star{
      width:16px;height:16px;
      display:inline-block;
    }
    .client-trust-star svg{width:16px;height:16px;display:block;fill:var(--clr-primary);}

    .client-trust-cardTitle {
      margin: 10px 0 10px;
      font-size: 16px;
      font-weight: 600;
      color: var(--clr-black);
      line-height: 1.35;
  }
    .client-trust-text{
      margin:0;
      font-size:14px;
      line-height:1.8;
      color: rgba(0,0,0,.68);
    }

    .client-trust-more{
      display:inline-block;
      margin-top:10px;
      color: var(--clr-primary);
      font-weight:900;
      font-size:13px;
      text-decoration:none;
    }
    .client-trust-more:hover{text-decoration:underline;}

    @media (max-width: 992px){
      .client-trust-card{flex:1 1 calc(50% - 16px);}
    }
    @media (max-width: 576px){
      .client-trust-card{flex:1 1 100%;}
    }
  </style>

  <section class="client-trust-section" aria-label="Testimonials">
    <div class="client-trust-container">

      <div class="client-trust-head">
        <h2 class="client-trust-title">Why Our Clients Trust Us</h2>
        <p class="client-trust-subtitle">
          Discover what our customers are saying about their experiences — trusted guidance, fast communication, and smooth transactions.
        </p>
      </div>

      <div class="client-trust-grid">
        <?php foreach($items as $t):
          $initials = strtoupper(mb_substr($t['name'], 0, 1));
        ?>
          <article class="client-trust-card">
            <div class="client-trust-top">
              <div class="client-trust-avatar"><?php echo esc_html($initials); ?></div>
              <div class="client-trust-meta">
                <p class="client-trust-name"><?php echo esc_html($t['name']); ?></p>
                <p class="client-trust-time"><?php echo esc_html($t['time']); ?></p>

                <div class="client-trust-stars" aria-label="5 star rating">
                  <?php for($i=0;$i<5;$i++): ?>
                    <span class="client-trust-star" aria-hidden="true">
                      <svg viewBox="0 0 24 24"><path d="M12 17.3l-6.18 3.73 1.64-7.03L2 9.24l7.19-.62L12 2l2.81 6.62 7.19.62-5.46 4.76 1.64 7.03z"/></svg>
                    </span>
                  <?php endfor; ?>
                </div>
              </div>
            </div>

            <h3 class="client-trust-cardTitle"><?php echo esc_html($t['title']); ?></h3>
            <p class="client-trust-text"><?php echo esc_html($t['text']); ?></p>

            <a class="client-trust-more d-none" href="#" onclick="return false;">more</a>
          </article>
        <?php endforeach; ?>
      </div>

    </div>
  </section>

  <?php
  return ob_get_clean();
});