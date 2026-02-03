jQuery(function ($) {
    let currentCat = "all";
    let currentPage = 1;
    let maxPages = 1;
    let searchTerm = "";
    let timer = null;

    function setLoading(on) {
        $("#blGrid").toggleClass("is-loading", on);
    }

    function fetchPosts() {
        setLoading(true);

        $.post(BLOG_AJAX.ajaxurl, {
            action: "filter_blog_posts",
            nonce: BLOG_AJAX.nonce,
            cat: currentCat,
            page: currentPage,
            s: searchTerm
        })
            .done(function (res) {
                if (!res.success) return;

                $("#blGrid").html(res.data.html);

                maxPages = res.data.max_pages || 1;

                $("#blPrev").prop("disabled", currentPage <= 1);
                $("#blNext").prop("disabled", currentPage >= maxPages);

                $("#blPageInfo").text(`Page ${currentPage} of ${maxPages}`);
            })
            .always(function () {
                setLoading(false);
            });
    }

    // Category filter
    $(document).on("click", ".blFilter", function () {
        $(".blFilter").removeClass("is-active");
        $(this).addClass("is-active");

        currentCat = $(this).data("cat");
        currentPage = 1;
        fetchPosts();
    });

    // Pagination
    $("#blPrev").on("click", function () {
        if (currentPage > 1) {
            currentPage--;
            fetchPosts();
        }
    });

    $("#blNext").on("click", function () {
        if (currentPage < maxPages) {
            currentPage++;
            fetchPosts();
        }
    });

    // Search (debounced)
    $("#blSearchInput").on("input", function () {
        clearTimeout(timer);
        timer = setTimeout(() => {
            searchTerm = $(this).val().trim();
            currentPage = 1;
            fetchPosts();
        }, 350);
    });

    // First load
    fetchPosts();
});
