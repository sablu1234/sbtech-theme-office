<?php get_header(); ?>

    

<title>Terms & Conditions</title>
<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
}

body{
font-family:'Poppins',sans-serif;
background:#fff;
color:#000;
line-height:1.7;
}

/* container */

.tc_container {
    max-width: 1200px;
    margin: auto;
    padding: 60px 20px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

/* heading */

.tc_title{
font-size:32px;
font-weight:600;
margin-bottom:10px;
}

/* description */

p.tc_description {
    text-align: center;
}
.tc_description{
font-size:15px;
color:#555;
margin-bottom:40px;
max-width:800px;
}

/* list section */

.tc_list{
display:flex;
flex-direction:column;
gap:25px;
}

/* item */

.tc_item{
padding-bottom:20px;
border-bottom:1px solid #eee;
}

.tc_item:last-child{
border:none;
}

/* title */

.tc_item_title{
font-size:18px;
font-weight:600;
margin-bottom:8px;
}

/* text */

.tc_item_text{
font-size:14px;
color:#444;
}

/* responsive */

@media(max-width:768px){

.tc_title{
font-size:24px;
}

.tc_container{
padding:40px 15px;
}

.tc_item_title{
font-size:16px;
}

}

</style>
    <?php
        $term_and_condition_hero_title = get_theme_mod( 'term_and_condition_hero_title', __('Terms & Conditions', 'sbtech') );
        $term_and_condition_hero_desc = get_theme_mod( 'term_and_condition_hero_desc', __('Please read these terms and conditions carefully before using our website and services. By accessing our platform, you agree to comply with the following terms.', 'sbtech') );

        $repeater_term_and_condition_items = get_theme_mod( 'repeater_term_and_condition' );
    ?>
<section class="tc_section">

    <div class="tc_container">

    <?php if (!empty($term_and_condition_hero_title)) : ?>
    <h1 class="tc_title"><?php echo esc_html( $term_and_condition_hero_title ); ?></h1>
    <?php endif; ?>

    <?php if (!empty($term_and_condition_hero_desc)) : ?>
    <p class="tc_description"><?php echo esc_html( $term_and_condition_hero_desc ); ?></p>
    <?php endif; ?>

    <div class="tc_list">
        <?php
            if ( ! empty( $repeater_term_and_condition_items ) ) : foreach ( $repeater_term_and_condition_items as $item ) : 
        ?>
        <div class="tc_item">
            <h3 class="tc_item_title"><?php echo esc_html( $item['title'] ); ?></h3>
            <p class="tc_item_text"><?php echo esc_html( $item['description'] ); ?></p>
        </div>
        <?php 
        endforeach;
        endif; 
        ?>

    </div>

    </div>

</section>


<!-- Newsletter section start -->
<?php echo do_shortcode('[newsletter_form]'); ?>
<!-- Newsletter section end -->

<?php get_footer();
