<!-- Start Search Popup Section -->
<div class="search-popup">
    <button class="close-search style-two"><span class="flaticon-multiply"><i class="far fa-times-circle"></i></span></button>
    <button class="close-search"><i class="fa-light fa-arrow-up"></i></button>
    <form action="/" method="get">
        <div class="form-group">
            <input type="search" name="s" id="search" value="<?php the_search_query(); ?>" placeholder="<?php echo esc_attr__('Search Here', 'sbtech') ?>" required="">
            <button type="submit"><i class="fal fa-search"></i></button>
        </div>
    </form>
</div>
<!-- Start Search Popup Section -->