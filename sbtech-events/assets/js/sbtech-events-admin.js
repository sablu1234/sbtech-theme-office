jQuery(function ($) {

  // ---------- Helper: open wp.media for multiple images ----------
  function openMediaMultiple(onSelect) {
    const frame = wp.media({
      title: "Select Images",
      button: { text: "Use these images" },
      multiple: true
    });

    frame.on("select", function () {
      const selection = frame.state().get("selection").toJSON();
      onSelect(selection);
    });

    frame.open();
  }

  // ---------- Helper: open wp.media for single image ----------
  function openMediaSingle(onSelect) {
    const frame = wp.media({
      title: "Select Image",
      button: { text: "Use this image" },
      multiple: false
    });

    frame.on("select", function () {
      const attachment = frame.state().get("selection").first().toJSON();
      onSelect(attachment);
    });

    frame.open();
  }

  // ==========================================================
  // 1) Events Archive Page Banner (single image)
  // IDs must match your meta box HTML:
  // #sbtech_ea_banner_image_id, #sbtech_ea_pick, #sbtech_ea_remove, #sbtech_ea_preview
  // ==========================================================
  $(document).on("click", "#sbtech_ea_pick", function (e) {
    e.preventDefault();

    openMediaSingle(function (att) {
      $("#sbtech_ea_banner_image_id").val(att.id);
      $("#sbtech_ea_preview")
        .attr("src", att.url)
        .css("display", "block");
    });
  });

  $(document).on("click", "#sbtech_ea_remove", function (e) {
    e.preventDefault();
    $("#sbtech_ea_banner_image_id").val("0");
    $("#sbtech_ea_preview").attr("src", "").hide();
  });

  // ==========================================================
  // 2) Event CPT Gallery (multiple)  [if you have this]
  // Example IDs:
  // #sbtech_event_gallery_ids, #sbtech_event_gallery_pick, #sbtech_event_gallery_clear, #sbtech_event_gallery_preview
  // ==========================================================
  $(document).on("click", "#sbtech_event_gallery_pick", function (e) {
    e.preventDefault();

    openMediaMultiple(function (items) {
      const ids = items.map(i => i.id);
      $("#sbtech_event_gallery_ids").val(ids.join(","));

      const $wrap = $("#sbtech_event_gallery_preview");
      if ($wrap.length) {
        $wrap.empty();
        items.forEach(function (it) {
          const url = (it.sizes && it.sizes.thumbnail) ? it.sizes.thumbnail.url : it.url;
          $wrap.append('<img src="' + url + '" style="width:80px;height:80px;object-fit:cover;border:1px solid #ddd;border-radius:6px;">');
        });
      }
    });
  });

  $(document).on("click", "#sbtech_event_gallery_clear", function (e) {
    e.preventDefault();
    $("#sbtech_event_gallery_ids").val("");
    $("#sbtech_event_gallery_preview").empty();
  });

  // ==========================================================
  // 3) Single Event CPT Gallery (multiple)  ✅ your screenshot box
  // IDs must match:
  // #sbtech_single_event_gallery_ids
  // #sbtech_single_event_gallery_pick
  // #sbtech_single_event_gallery_clear
  // #sbtech_single_event_gallery_preview
  // ==========================================================
  $(document).on("click", "#sbtech_single_event_gallery_pick", function (e) {
    e.preventDefault();

    openMediaMultiple(function (items) {
      const ids = items.map(i => i.id);
      $("#sbtech_single_event_gallery_ids").val(ids.join(","));

      const $wrap = $("#sbtech_single_event_gallery_preview");
      $wrap.empty();

      items.forEach(function (it) {
        const url = (it.sizes && it.sizes.thumbnail) ? it.sizes.thumbnail.url : it.url;
        $wrap.append('<img src="' + url + '" style="width:80px;height:80px;object-fit:cover;border:1px solid #ddd;border-radius:6px;">');
      });
    });
  });

  $(document).on("click", "#sbtech_single_event_gallery_clear", function (e) {
    e.preventDefault();
    $("#sbtech_single_event_gallery_ids").val("");
    $("#sbtech_single_event_gallery_preview").empty();
  });

});
