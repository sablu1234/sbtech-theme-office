<?php
add_shortcode('contact_us_map', function () {
  return '
  <div style="max-width:1200px;margin:0 auto;padding:16px;">
    <div style="border:1px solid rgba(0,0,0,.12);border-radius:16px;overflow:hidden;box-shadow:0 14px 34px rgba(0,0,0,.08);">
      <iframe
        src="https://www.google.com/maps?q=dubai&output=embed"
        width="100%"
        height="520"
        style="border:0;display:block;"
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        allowfullscreen>
      </iframe>
    </div>
  </div>';
});