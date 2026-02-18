jQuery(function ($) {

  // ---------- Helper: open media multi-select and return attachment IDs ----------
  function openMediaGallery(onSelect) {
    if (typeof wp === "undefined" || !wp.media) {
      alert("WP Media not loaded. wp_enqueue_media() missing.");
      return;
    }

    const frame = wp.media({
      title: "Select Images",
      library: { type: "image" },
      button: { text: "Use these images" },
      multiple: true
    });

    frame.on("select", function () {
      const selection = frame.state().get("selection").toJSON();
      const ids = selection.map(item => item.id);
      onSelect(ids, selection);
    });

    frame.open();
  }

  // ---------- Helper: render previews ----------
  function renderPreviews($wrap, items) {
    $wrap.empty();
    if (!items || !items.length) return;

    items.forEach(function (item) {
      const url =
        (item.sizes && item.sizes.thumbnail && item.sizes.thumbnail.url) ||
        item.url;

      const $img = $('<img />', {
        src: url,
        css: {
          width: "90px",
          height: "90px",
          objectFit: "cover",
          borderRadius: "8px",
          border: "1px solid rgba(0,0,0,.12)"
        }
      });

      $wrap.append($img);
    });
  }

  // ---------- Generic binder ----------
  // pickBtnSelector: button id/class
  // clearBtnSelector: button id/class
  // inputSelector: hidden input where comma IDs stored
  // previewSelector: preview div container
  function bindGallery(pickBtnSelector, clearBtnSelector, inputSelector, previewSelector) {

    $(document).on("click", pickBtnSelector, function (e) {
      e.preventDefault();

      const $input = $(inputSelector);
      const $preview = $(previewSelector);

      openMediaGallery(function (ids, items) {
        $input.val(ids.join(","));
        renderPreviews($preview, items);
      });
    });

    $(document).on("click", clearBtnSelector, function (e) {
      e.preventDefault();
      $(inputSelector).val("");
      $(previewSelector).empty();
    });
  }

  // =========================================================
  // ✅ 1) Single Event Gallery (your screenshot IDs)
  // hidden input: #sbtech_single_event_gallery_ids
  // preview div:  #sbtech_single_event_gallery_preview  (make sure you have this div)
  // =========================================================
  bindGallery(
    "#sbtech_single_event_gallery_pick",
    "#sbtech_single_event_gallery_clear",
    "#sbtech_single_event_gallery_ids",
    "#sbtech_single_event_gallery_preview"
  );

  // =========================================================
  // ✅ 2) Event Gallery (if you also have gallery on event post type)
  // IDs example:
  // button: #sbtech_event_gallery_pick
  // clear:  #sbtech_event_gallery_clear
  // input:  #sbtech_event_gallery_ids
  // preview:#sbtech_event_gallery_preview
  // =========================================================
  bindGallery(
    "#sbtech_event_gallery_pick",
    "#sbtech_event_gallery_clear",
    "#sbtech_event_gallery_ids",
    "#sbtech_event_gallery_preview"
  );

  // =========================================================
  // ✅ 3) Events Archive Banner Image (page template)
  // button: #sbtech_ea_pick
  // remove: #sbtech_ea_remove
  // input:  #sbtech_ea_banner_image_id
  // img:    #sbtech_ea_preview
  // =========================================================
  $(document).on("click", "#sbtech_ea_pick", function (e) {
    e.preventDefault();

    if (typeof wp === "undefined" || !wp.media) {
      alert("WP Media not loaded. wp_enqueue_media() missing.");
      return;
    }

    const frame = wp.media({
      title: "Select Banner Image",
      library: { type: "image" },
      button: { text: "Use this image" },
      multiple: false
    });

    frame.on("select", function () {
      const att = frame.state().get("selection").first().toJSON();
      $("#sbtech_ea_banner_image_id").val(att.id);

      const url =
        (att.sizes && att.sizes.medium && att.sizes.medium.url) ||
        (att.sizes && att.sizes.thumbnail && att.sizes.thumbnail.url) ||
        att.url;

      $("#sbtech_ea_preview").attr("src", url).show();
    });

    frame.open();
  });

  $(document).on("click", "#sbtech_ea_remove", function (e) {
    e.preventDefault();
    $("#sbtech_ea_banner_image_id").val("0");
    $("#sbtech_ea_preview").attr("src", "").hide();
  });

});
