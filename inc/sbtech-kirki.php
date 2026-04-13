<?php

new \Kirki\Panel(
	'sbtech_panel',
	[
		'priority'    => 10,
		'title'       => esc_html__( 'Sbtech Options', 'sbtech' ),
		'description' => esc_html__( 'My Panel Description.', 'sbtech' ),
	]
);

// sbtech_property_list_nessary_mail
function sbtech_property_list_nessary_mail(){

    // Header section
    new \Kirki\Section(
	'nessary_mail',
        [
            'title'       => esc_html__( 'Necessary Mail', 'sbtech' ),
            'description' => esc_html__( 'Necessary', 'sbtech' ),
            'panel'       => 'sbtech_panel',
            'priority'    => 160,
        ]
    );
    
    // property_leads_necessary_mail 
    new \Kirki\Field\Text(
        [
            'settings' => 'property_leads_necessary_mail',
            'label'    => esc_html__( 'Property leads Necessary Mail', 'sbtech' ),
            'section'  => 'nessary_mail',
            'default'  => esc_html__( 'careers@cbaestate.com', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // investor inquiries 
    new \Kirki\Field\Text(
        [
            'settings' => 'investor_inquiries_mail',
            'label'    => esc_html__( 'Investor Inquiries Mail', 'sbtech' ),
            'section'  => 'nessary_mail',
            'default'  => esc_html__( 'investors@cbaestate.com', 'sbtech' ),
            'priority' => 10,
        ]
    );

}
sbtech_property_list_nessary_mail();

// sebtech Buy section start
function sbtech_buy_section(){

    // Header section
    new \Kirki\Section(
	'buy_section',
        [
            'title'       => esc_html__( 'Buy Page', 'sbtech' ),
            'description' => esc_html__( 'Buy Page', 'sbtech' ),
            'panel'       => 'sbtech_panel',
            'priority'    => 160,
        ]
    );
        
    // Buy point title
    new \Kirki\Field\Text(
        [
            'settings' => 'buy_point_title',
            'label'    => esc_html__( 'Buy Point Title', 'sbtech' ),
            'section'  => 'buy_section',
            'default'  => esc_html__( 'Buy Commercial Properties • Prime Locations', 'sbtech' ),
            'priority' => 10,
        ]
    );
        
    // Buy title
    new \Kirki\Field\Text(
        [
            'settings' => 'buy_title',
            'label'    => esc_html__( 'Buy Title', 'sbtech' ),
            'section'  => 'buy_section',
            'default'  => esc_html__( 'Buy the Right Space', 'sbtech' ),
            'priority' => 10,
        ]
    );
        
    // Buy subtitle
    new \Kirki\Field\Text(
        [
            'settings' => 'buy_subtitle',
            'label'    => esc_html__( 'Buy Sub Title', 'sbtech' ),
            'section'  => 'buy_section',
            'default'  => esc_html__( 'Find the perfect commercial space to buy with confidence.', 'sbtech' ),
            'priority' => 10,
        ]
    );
        
    // Buy description
    new \Kirki\Field\Text(
        [
            'settings' => 'buy_desc',
            'label'    => esc_html__( 'Buy Description', 'sbtech' ),
            'section'  => 'buy_section',
            'default'  => esc_html__( 'Explore premium offices, retail spaces, warehouses, and mixed-use developments in prime business districts. Enjoy clean presentations, fast responses, and curated options tailored specifically to your needs.', 'sbtech' ),
            'priority' => 10,
        ]
    );
        
    // Buy button text
    new \Kirki\Field\Text(
        [
            'settings' => 'buy_button_text',
            'label'    => esc_html__( 'Buy Button Text', 'sbtech' ),
            'section'  => 'buy_section',
            'default'  => esc_html__( 'Contact Us', 'sbtech' ),
            'priority' => 10,
        ]
    );
}
sbtech_buy_section();

// sebtech Rent section start
function sbtech_rent_section(){

    // Header section
    new \Kirki\Section(
	'rent_section',
        [
            'title'       => esc_html__( 'Rent Page', 'sbtech' ),
            'description' => esc_html__( 'Rent Page', 'sbtech' ),
            'panel'       => 'sbtech_panel',
            'priority'    => 160,
        ]
    );
        
    // Buy point title
    new \Kirki\Field\Text(
        [
            'settings' => 'rent_point_title',
            'label'    => esc_html__( 'Rent Point Title', 'sbtech' ),
            'section'  => 'rent_section',
            'default'  => esc_html__( 'Rent Commercial Properties • Prime Locations', 'sbtech' ),
            'priority' => 10,
        ]
    );
        
    // Buy title
    new \Kirki\Field\Text(
        [
            'settings' => 'rent_title',
            'label'    => esc_html__( 'Rent Title', 'sbtech' ),
            'section'  => 'rent_section',
            'default'  => esc_html__( 'Rent the Right Space', 'sbtech' ),
            'priority' => 10,
        ]
    );
        
    // Buy subtitle
    new \Kirki\Field\Text(
        [
            'settings' => 'rent_subtitle',
            'label'    => esc_html__( 'Rent Sub Title', 'sbtech' ),
            'section'  => 'rent_section',
            'default'  => esc_html__( 'Find the perfect commercial space to buy with confidence.', 'sbtech' ),
            'priority' => 10,
        ]
    );
        
    // Buy description
    new \Kirki\Field\Text(
        [
            'settings' => 'rent_desc',
            'label'    => esc_html__( 'Rent Description', 'sbtech' ),
            'section'  => 'rent_section',
            'default'  => esc_html__( 'Explore premium offices, retail spaces, warehouses, and mixed-use developments in prime business districts. Enjoy clean presentations, fast responses, and curated options tailored specifically to your needs.', 'sbtech' ),
            'priority' => 10,
        ]
    );
        
    // Buy button text
    new \Kirki\Field\Text(
        [
            'settings' => 'rent_button_text',
            'label'    => esc_html__( 'Rent Button Text', 'sbtech' ),
            'section'  => 'rent_section',
            'default'  => esc_html__( 'Contact Us', 'sbtech' ),
            'priority' => 10,
        ]
    );
}
sbtech_rent_section();

// sebtech commercial section start
function sbtech_commercial_section(){

    // Header section
    new \Kirki\Section(
	'commercial_section',
        [
            'title'       => esc_html__( 'Commercial Page', 'sbtech' ),
            'description' => esc_html__( 'Commercial Page', 'sbtech' ),
            'panel'       => 'sbtech_panel',
            'priority'    => 160,
        ]
    );
        
    // Buy point title
    new \Kirki\Field\Text(
        [
            'settings' => 'commercial_point_title',
            'label'    => esc_html__( 'Commercial Point Title', 'sbtech' ),
            'section'  => 'commercial_section',
            'default'  => esc_html__( 'Commercial Properties • Prime Locations', 'sbtech' ),
            'priority' => 10,
        ]
    );
        
    // Buy title
    new \Kirki\Field\Text(
        [
            'settings' => 'commercial_title',
            'label'    => esc_html__( 'Commercial Title', 'sbtech' ),
            'section'  => 'commercial_section',
            'default'  => esc_html__( 'Commercial Properties', 'sbtech' ),
            'priority' => 10,
        ]
    );
        
    // Buy subtitle
    new \Kirki\Field\Text(
        [
            'settings' => 'commercial_subtitle',
            'label'    => esc_html__( 'Commercial Sub Title', 'sbtech' ),
            'section'  => 'commercial_section',
            'default'  => esc_html__( 'Find the right commercial space with confidence.', 'sbtech' ),
            'priority' => 10,
        ]
    );
        
    // Buy description
    new \Kirki\Field\Text(
        [
            'settings' => 'commercial_desc',
            'label'    => esc_html__( 'Commercial Description', 'sbtech' ),
            'section'  => 'commercial_section',
            'default'  => esc_html__( 'Explore premium offices, retail, warehouses, and mixed-use spaces across prime business districts. Clean presentation, fast response, and curated options tailored to your requirements.', 'sbtech' ),
            'priority' => 10,
        ]
    );
        
    // Buy button text
    new \Kirki\Field\Text(
        [
            'settings' => 'commercial_button_text',
            'label'    => esc_html__( 'Commercial Button Text', 'sbtech' ),
            'section'  => 'commercial_section',
            'default'  => esc_html__( 'Contact Us', 'sbtech' ),
            'priority' => 10,
        ]
    );
}
sbtech_commercial_section();

// sebtech sell section start
function sbtech_sell_section(){

    // Header section
    new \Kirki\Section(
	'sell_section',
        [
            'title'       => esc_html__( 'Sell Page', 'sbtech' ),
            'description' => esc_html__( 'Sell Page', 'sbtech' ),
            'panel'       => 'sbtech_panel',
            'priority'    => 160,
        ]
    );

            
    // sell red title 1
    new \Kirki\Field\Text(
        [
            'settings' => 'sell_red_1_title',
            'label'    => esc_html__( 'Sell Red Title 1', 'sbtech' ),
            'section'  => 'sell_section',
            'default'  => esc_html__( 'Sell your', 'sbtech' ),
            'priority' => 10,
        ]
    );

            
    // sell red title 2
    new \Kirki\Field\Text(
        [
            'settings' => 'sell_red_2_title',
            'label'    => esc_html__( 'Sell Red Title 2', 'sbtech' ),
            'section'  => 'sell_section',
            'default'  => esc_html__( 'Property', 'sbtech' ),
            'priority' => 10,
        ]
    );
            
    // sell Black title 1
    new \Kirki\Field\Text(
        [
            'settings' => 'sell_black_1_title',
            'label'    => esc_html__( 'Sell Black 1 Title', 'sbtech' ),
            'section'  => 'sell_section',
            'default'  => esc_html__( 'in Dubai', 'sbtech' ),
            'priority' => 10,
        ]
    );
            
    // sell Black title 2
    new \Kirki\Field\Text(
        [
            'settings' => 'sell_black_2_title',
            'label'    => esc_html__( 'Sell Black 2 Title', 'sbtech' ),
            'section'  => 'sell_section',
            'default'  => esc_html__( 'with Confidence', 'sbtech' ),
            'priority' => 10,
        ]
    );
            
    // sell description
    new \Kirki\Field\Text(
        [
            'settings' => 'sell_desc',
            'label'    => esc_html__( 'Sell Description', 'sbtech' ),
            'section'  => 'sell_section',
            'default'  => esc_html__( 'List your Dubai property with a trusted, results-driven approach. We ensure full transparency, accurate property valuation, and strategic marketing to attract serious buyers quickly. Stay informed with real-time market insights and expert guidance to maximize your property’s true selling value.', 'sbtech' ),
            'priority' => 10,
        ]
    );
            
    // sell button text
    new \Kirki\Field\Text(
        [
            'settings' => 'sell_button_text',
            'label'    => esc_html__( 'Sell Button Text', 'sbtech' ),
            'section'  => 'sell_section',
            'default'  => esc_html__( 'List Your Property', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // Thinking title
    new \Kirki\Field\Text(
        [
            'settings' => 'thinking_title',
            'label'    => esc_html__( 'Thinking Title', 'sbtech' ),
            'section'  => 'sell_section',
            'default'  => esc_html__( 'Thinking about selling your Dubai property?', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // Thinking description
    new \Kirki\Field\Text(
        [
            'settings' => 'thinking_desc',
            'label'    => esc_html__( 'Thinking description', 'sbtech' ),
            'section'  => 'sell_section',
            'default'  => esc_html__( 'Sell with confidence using accurate pricing, strategic exposure, and expert guidance. We help you attract serious buyers faster while keeping you fully informed at every step.', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // Thinking button text
    new \Kirki\Field\Text(
        [
            'settings' => 'thinking_button_text',
            'label'    => esc_html__( 'Thinking button text', 'sbtech' ),
            'section'  => 'sell_section',
            'default'  => esc_html__( 'List Exclusively With Metropolitan', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // Powerful marketing title
    new \Kirki\Field\Textarea(
        [
            'settings' => 'pw_m_title',
            'label'    => esc_html__( 'Powerful marketing title', 'sbtech' ),
            'section'  => 'sell_section',
            'default'  => esc_html__( 'Powerful Marketing. <span>Real Results.</span>', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // Powerful marketing icon_list_description_1
    new \Kirki\Field\Textarea(
        [
            'settings' => 'pw_m_il_desc_1',
            'label'    => esc_html__( 'Card 1 Powerful Marketing Description', 'sbtech' ),
            'section'  => 'sell_section',
            'default'  => esc_html__( 'Professional photography, videography, and high-converting property presentations.', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // Powerful marketing icon_list_description_2
    new \Kirki\Field\Textarea(
        [
            'settings' => 'pw_m_il_desc_2',
            'label'    => esc_html__( 'Card 2 Powerful Marketing Description', 'sbtech' ),
            'section'  => 'sell_section',
            'default'  => esc_html__( 'Optimized website visibility and SEO-ready listing pages to attract organic buyers.', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // Powerful marketing icon_list_description_3
    new \Kirki\Field\Textarea(
        [
            'settings' => 'pw_m_il_desc_3',
            'label'    => esc_html__( 'Card 3 Powerful Marketing Description', 'sbtech' ),
            'section'  => 'sell_section',
            'default'  => esc_html__( 'Targeted social media campaigns across key channels to reach serious buyers fast.', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // Powerful marketing icon_list_description_4
    new \Kirki\Field\Textarea(
        [
            'settings' => 'pw_m_il_desc_4',
            'label'    => esc_html__( 'Card 4 Powerful Marketing Description', 'sbtech' ),
            'section'  => 'sell_section',
            'default'  => esc_html__( 'WhatsApp & email outreach to our engaged database for immediate exposure.', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // Powerful marketing icon_list_description_5
    new \Kirki\Field\Textarea(
        [
            'settings' => 'pw_m_il_desc_5',
            'label'    => esc_html__( 'Card 5 Powerful Marketing Description', 'sbtech' ),
            'section'  => 'sell_section',
            'default'  => esc_html__( 'Qualified buyer leads from portals, remarketing, and high-intent ad funnels.', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // Powerful marketing icon_list_description_6
    new \Kirki\Field\Textarea(
        [
            'settings' => 'pw_m_il_desc_6',
            'label'    => esc_html__( 'Card 6 Powerful Marketing Description', 'sbtech' ),
            'section'  => 'sell_section',
            'default'  => esc_html__( 'PR-ready listing assets and premium branding for stronger buyer trust.', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // Powerful marketing icon_list_description_7
    new \Kirki\Field\Textarea(
        [
            'settings' => 'pw_m_il_desc_7',
            'label'    => esc_html__( 'Card 7 Powerful Marketing Description', 'sbtech' ),
            'section'  => 'sell_section',
            'default'  => esc_html__( 'Private viewings, open houses, and guided buyer tours that convert.', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // Powerful marketing icon_list_description_8
    new \Kirki\Field\Textarea(
        [
            'settings' => 'pw_m_il_desc_8',
            'label'    => esc_html__( 'Card 8 Powerful Marketing Description', 'sbtech' ),
            'section'  => 'sell_section',
            'default'  => esc_html__( 'Dedicated support from listing to closing, with clear updates and reporting.', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // Reach More title
    new \Kirki\Field\Textarea(
        [
            'settings' => 'rm_title',
            'label'    => esc_html__( 'Reach More title', 'sbtech' ),
            'section'  => 'sell_section',
            'default'  => esc_html__( 'Reach More Buyers, Sell Faster', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // Reach More description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'rm_desc',
            'label'    => esc_html__( 'Reach More Description', 'sbtech' ),
            'section'  => 'sell_section',
            'default'  => esc_html__( 'Research indicates that professionally listing your property online results in faster transactions and stronger value. By authorising Form A, we can secure a Trakheesi QR code, enabling compliant promotion across leading property portals, targeted social media, and premium marketing channels—while safeguarding your confidential information. This approach maximises visibility, reaches qualified buyers, and positions your property for the most efficient and successful sale.ce.', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // Reach More button text
    new \Kirki\Field\Text(
        [
            'settings' => 'rm_button_text',
            'label'    => esc_html__( 'Reach More button text', 'sbtech' ),
            'section'  => 'sell_section',
            'default'  => esc_html__( 'watch Now', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // Powerful marketing icon_list_description_9
    new \Kirki\Field\Textarea(
        [
            'settings' => 'pw_m_il_desc_9',
            'label'    => esc_html__( 'Card 9 Powerful Marketing Description', 'sbtech' ),
            'section'  => 'sell_section',
            'default'  => esc_html__( 'Smart scheduling, follow-ups, and negotiation strategy to close faster.', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // Sell your Property Area Image
    new \Kirki\Field\Image(
        [
            'settings'    => 'sell_header_image',
            'label'       => esc_html__( 'Sell your Property Area Image', 'kirki' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'sell_section',
            'default'     => get_template_directory_uri().'/assets/sell/sell your property in dubai with confidence.jpeg',
        ]
    );
        
    // Why sell Image
    new \Kirki\Field\Image(
        [
            'settings'    => 'sell_why_sell_image',
            'label'       => esc_html__( 'Why Sell Area Image', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'sell_section',
            'default'     => get_template_directory_uri().'/assets/sell/why-sell-your-property-with-us.jpeg',
        ]
    );
        
    // Reach More Buyers Main Image
    new \Kirki\Field\Image(
        [
            'settings'    => 'sell_reach_more_main_image',
            'label'       => esc_html__( 'Reach More Buyers Area Main Image', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'sell_section',
            'default'     => get_template_directory_uri().'/assets/sell/reach-more-buyers seller faster-main.jpeg',
        ]
    );
        
    // Reach More Buyers mini Image
    new \Kirki\Field\Image(
        [
            'settings'    => 'sell_reach_more_mini_image',
            'label'       => esc_html__( 'Reach More Buyers Area Mini Image', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'sell_section',
            'default'     => get_template_directory_uri().'/assets/sell/reach-more-buyers sell faster-mini.jpeg',
        ]
    );

    // Thinking about video url
    new \Kirki\Field\URL(
        [
            'settings' => 'sell_thinking_about_video_url',
            'label'    => esc_html__( 'Thinking about Video URL ', 'sbtech' ),
            'section'  => 'sell_section',
            'default'  => 'https://www.youtube.com/embed/HtCo1abehcc?si=T0ZUZUmGKtrycVwE',
            'priority' => 10,
        ]
    );

    // Reach More Area video url
    new \Kirki\Field\URL(
        [
            'settings' => 'sell_reach_more_video_url',
            'label'    => esc_html__( 'Thinking about Video URL ', 'sbtech' ),
            'section'  => 'sell_section',
            'default'  => 'https://www.youtube.com/embed/HtCo1abehcc?si=T0ZUZUmGKtrycVwE',
            'priority' => 10,
        ]
    );

}
sbtech_sell_section();

// header section start
function sbtech_header_section(){

    // Header section
    new \Kirki\Section(
	'Header_section',
        [
            'title'       => esc_html__( 'Header Section', 'sbtech' ),
            'description' => esc_html__( 'My Header Section Description.', 'sbtech' ),
            'panel'       => 'sbtech_panel',
            'priority'    => 160,
        ]
    );

    // switch call_to_action
	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'switch_call_to_action',
			'label'       => esc_html__( 'Call to Action Switch', 'sbtech' ),
			'description' => esc_html__( 'Call to Action switch control', 'sbtech' ),
			'section'     => 'Header_section',
			'default'     => 'off',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'sbtech' ),
				'off' => esc_html__( 'Disable', 'sbtech' ),
			],
		]
	);

    // call to action label
    new \Kirki\Field\Text(
        [
            'settings' => 'call_to_label',
            'label'    => esc_html__( 'Call to Action Label', 'sbtech' ),
            'section'  => 'Header_section',
            'default'  => esc_html__( 'Contact Us', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // call to action
    new \Kirki\Field\Text(
        [
            'settings' => 'call_to_link',
            'label'    => esc_html__( 'Call to Action Link', 'sbtech' ),
            'section'  => 'Header_section',
            'default'  => esc_html__( '+97144286151', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // call to action
    new \Kirki\Field\Text(
        [
            'settings' => 'call_to_link',
            'label'    => esc_html__( 'Call to Action Link', 'sbtech' ),
            'section'  => 'Header_section',
            'default'  => esc_html__( '+97144286151', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // header_button_label
    new \Kirki\Field\Text(
        [
            'settings' => 'header_button_label',
            'label'    => esc_html__( 'Header Button Label', 'sbtech' ),
            'section'  => 'Header_section',
            'default'  => esc_html__( 'List Your Property', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // logo
    new \Kirki\Field\Image(
        [
            'settings'    => 'header_logo',
            'label'       => esc_html__( 'Logo', 'kirki' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'Header_section',
            'default'     => get_template_directory_uri().'/assets/header/logo-main.jpg',
        ]
    );

}
sbtech_header_section();

// footer section start
function sbtech_footer_section(){

    // Header section
    new \Kirki\Section(
	'footer_section',
        [
            'title'       => esc_html__( 'Footer Section', 'sbtech' ),
            'description' => esc_html__( 'My Footer Section.', 'sbtech' ),
            'panel'       => 'sbtech_panel',
            'priority'    => 160,
        ]
    );
    
    // facebook link
    new \Kirki\Field\Text(
        [
            'settings' => 'sbtech_fb_link',
            'label'    => esc_html__( 'Facebook Link ', 'sbtech' ),
            'section'  => 'footer_section',
            'default'  => esc_html__( 'https://www.facebook.com/', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // Instragrame link
    new \Kirki\Field\Text(
        [
            'settings' => 'sbtech_ig_link',
            'label'    => esc_html__( 'Instragram Link', 'sbtech' ),
            'section'  => 'footer_section',
            'default'  => esc_html__( 'https://www.instagram.com/', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // Youtube link
    new \Kirki\Field\Text(
        [
            'settings' => 'sbtech_youtube_link',
            'label'    => esc_html__( 'Youtube Link', 'sbtech' ),
            'section'  => 'footer_section',
            'default'  => esc_html__( 'https://youtube.com/', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // Twiter link
    new \Kirki\Field\Text(
        [
            'settings' => 'sbtech_tw_link',
            'label'    => esc_html__( 'Twiter Link', 'sbtech' ),
            'section'  => 'footer_section',
            'default'  => esc_html__( 'https://x.com/', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // Linkdin link
    new \Kirki\Field\Text(
        [
            'settings' => 'sbtech_ld_link',
            'label'    => esc_html__( 'Linkdin Link', 'sbtech' ),
            'section'  => 'footer_section',
            'default'  => esc_html__( 'https://linkedin.com', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // Telegram link
    new \Kirki\Field\Text(
        [
            'settings' => 'sbtech_tg_link',
            'label'    => esc_html__( 'Telegram Link', 'sbtech' ),
            'section'  => 'footer_section',
            'default'  => esc_html__( 'https://web.telegram.org/', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // Footer short descriptioin
    new \Kirki\Field\Text(
        [
            'settings' => 'sbtech_ft_short_des',
            'label'    => esc_html__( 'Footer short description', 'sbtech' ),
            'section'  => 'footer_section',
            'default'  => esc_html__( '36-38 Floor, Al Salam Tecom Tower, Dubai, UAE', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // address
    new \Kirki\Field\Text(
        [
            'settings' => 'sbtech_address',
            'label'    => esc_html__( 'Address', 'sbtech' ),
            'section'  => 'footer_section',
            'default'  => esc_html__( 'DAMAC Smart Heights - Office 1205 - Al Thanyah First - Barsha Heights - Dubai', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // mail
    new \Kirki\Field\Text(
        [
            'settings' => 'sbtech_mail',
            'label'    => esc_html__( 'Your Email', 'sbtech' ),
            'section'  => 'footer_section',
            'default'  => esc_html__( 'info@cbaestate.com', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // phone
    new \Kirki\Field\Text(
        [
            'settings' => 'sbtech_phone',
            'label'    => esc_html__( 'Your Phone', 'sbtech' ),
            'section'  => 'footer_section',
            'default'  => esc_html__( '+971 4 572 5273', 'sbtech' ),
            'priority' => 10,
        ]
    );

}
sbtech_footer_section();

// Media page
function sbtech_media(){

    // Header section
    new \Kirki\Section(
	'media_section',
        [
            'title'       => esc_html__( 'Media page Section', 'sbtech' ),
            'description' => esc_html__( 'Media page Section.', 'sbtech' ),
            'panel'       => 'sbtech_panel',
            'priority'    => 160,
        ]
    );

    // Hero bg image
    new \Kirki\Field\Image(
        [
            'settings'    => 'media_hero_bg',
            'label'       => esc_html__( 'Media Hero Background', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'media_section',
            'default'     => get_template_directory_uri().'/assets/media/media-3-scaled.webp',
        ]
    );


    
}
sbtech_media();

// Media Press page
function sbtech_media_press(){

    // Header section
    new \Kirki\Section(
	'media_press_section',
        [
            'title'       => esc_html__( 'Media Press page Section', 'sbtech' ),
            'description' => esc_html__( 'Media Press page Section.', 'sbtech' ),
            'panel'       => 'sbtech_panel',
            'priority'    => 160,
        ]
    );

    // Hero bg image
    new \Kirki\Field\Image(
        [
            'settings'    => 'media_press_hero_bg',
            'label'       => esc_html__( 'Media Hero Background', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'media_press_section',
            'default'     => get_template_directory_uri().'/assets/media_press/media_press.jpg',
        ]
    );


    
}
sbtech_media_press();

// Property Management section
function sbtech_property_management(){

    // Header section
    new \Kirki\Section(
	'property_management_section',
        [
            'title'       => esc_html__( 'Property Management page', 'sbtech' ),
            'description' => esc_html__( 'Property Management page.', 'sbtech' ),
            'panel'       => 'sbtech_panel',
            'priority'    => 160,
        ]
    );

    // hero title
    new \Kirki\Field\Textarea(
        [
            'settings' => 'hero_title',
            'label'    => esc_html__( 'Hero Title', 'sbtech' ),
            'section'  => 'property_management_section',
            'default'  => esc_html__( 'Property Management with a  <br>Personal Touch', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // hero description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'hero_desc',
            'label'    => esc_html__( 'Hero description', 'sbtech' ),
            'section'  => 'property_management_section',
            'default'  => esc_html__( 'We’re developing a modern, high-end WordPress real estate website inspired by metropolitan.realestate—focused on clean UX, fast performance, and long-term scalability. From AJAX-powered Buy/Rent listings to New Projects, Area guides, Developers directory, and API-driven property automation—everything is structured for growth.', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // hero button_1
    new \Kirki\Field\Text(
        [
            'settings' => 'hero_button_1_text',
            'label'    => esc_html__( 'hero button_1', 'sbtech' ),
            'section'  => 'property_management_section',
            'default'  => esc_html__( 'View Properties', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // hero button_2
    new \Kirki\Field\Text(
        [
            'settings' => 'hero_button_2_text',
            'label'    => esc_html__( 'hero button_2', 'sbtech' ),
            'section'  => 'property_management_section',
            'default'  => esc_html__( 'Contact Us', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // Hero bg image
    new \Kirki\Field\Image(
        [
            'settings'    => 'property_management_section_hero_bg',
            'label'       => esc_html__( 'property management Hero Background', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'property_management_section',
            'default'     => get_template_directory_uri().'/assets/services/property-management/property-management.webp',
        ]
    );

    // Management subtitle
    new \Kirki\Field\Text(
        [
            'settings' => 'management_subtilte',
            'label'    => esc_html__( 'Management subtitle', 'sbtech' ),
            'section'  => 'property_management_section',
            'default'  => esc_html__( 'Property Management', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // Management title
    new \Kirki\Field\Text(
        [
            'settings' => 'management_title',
            'label'    => esc_html__( 'Management title', 'sbtech' ),
            'section'  => 'property_management_section',
            'default'  => esc_html__( 'Welcome to CBA Property Management Services', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // Management description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'management_desc',
            'label'    => esc_html__( 'Management description', 'sbtech' ),
            'section'  => 'property_management_section',
            'default'  => esc_html__( 'At CBA Real Estate, we understand that property management can be complex and demanding. We provide comprehensive property management solutions designed to ease your burdens and enhance the value of your investments. Whether you own a single property or a diverse portfolio, our expert team is committed to handling every aspect with unmatched professionalism and precision. Trust us to take care of the details, so you can concentrate on your broader financial goals.', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // About image
    new \Kirki\Field\Image(
        [
            'settings'    => 'property_management_about_image',
            'label'       => esc_html__( 'About image', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'property_management_section',
            'default'     => get_template_directory_uri().'/assets/services/property-management/property-management_about.avif',
        ]
    );

    // What we deliver subtitle
    new \Kirki\Field\Text(
        [
            'settings' => 'wwd_sub_title',
            'label'    => esc_html__( 'What we deliver subtitle', 'sbtech' ),
            'section'  => 'property_management_section',
            'default'  => esc_html__( 'What we deliver', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // What we deliver title
    new \Kirki\Field\Text(
        [
            'settings' => 'wwd_title',
            'label'    => esc_html__( 'What we deliver title', 'sbtech' ),
            'section'  => 'property_management_section',
            'default'  => esc_html__( 'Explore what we do Real estate property management', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // What we deliver description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'wwd_desc',
            'label'    => esc_html__( 'What we deliver description', 'sbtech' ),
            'section'  => 'property_management_section',
            'default'  => esc_html__( 'A scalable WordPress build inspired by metropolitan.realestate—focused on speed, clean UX, advanced search, and API-ready data automation.', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // What we deliver card 1
    new \Kirki\Field\Image(
        [
            'settings'    => 'property_management_wwd_card_1',
            'label'       => esc_html__( 'What we deliver card 1 image', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'property_management_section',
            'default'     => get_template_directory_uri().'/assets/services/property-management/card_p_1.avif',
        ]
    );
    
    // What we deliver card 1 title
    new \Kirki\Field\Text(
        [
            'settings' => 'property_management_wwd_card_1_title',
            'label'    => esc_html__( 'What we deliver card 1 title', 'sbtech' ),
            'section'  => 'property_management_section',
            'default'  => esc_html__( 'Property Marketing and Listing', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // What we deliver card 1 description
    new \Kirki\Field\Text(
        [
            'settings' => 'property_management_wwd_card_1_desc',
            'label'    => esc_html__( 'What we deliver card 1 description', 'sbtech' ),
            'section'  => 'property_management_section',
            'default'  => esc_html__( 'We use advanced marketing strategies to ensure your property stands out in a competitive market. From professional photography to targeted online advertising, we effectively showcase your property to attract the right tenants.', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // What we deliver card 2
    new \Kirki\Field\Image(
        [
            'settings'    => 'property_management_wwd_card_2',
            'label'       => esc_html__( 'What we deliver card 2 image', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'property_management_section',
            'default'     => get_template_directory_uri().'/assets/services/property-management/card_p_2.avif',
        ]
    );
      
    // What we deliver card 2 title
    new \Kirki\Field\Text(
        [
            'settings' => 'property_management_wwd_card_2_title',
            'label'    => esc_html__( 'What we deliver card 2 title', 'sbtech' ),
            'section'  => 'property_management_section',
            'default'  => esc_html__( 'Tenant Search and Selection', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // What we deliver card 2 description
    new \Kirki\Field\Text(
        [
            'settings' => 'property_management_wwd_card_2_desc',
            'label'    => esc_html__( 'What we deliver card 2 description', 'sbtech' ),
            'section'  => 'property_management_section',
            'default'  => esc_html__( 'Securing the right tenants is key to the success of your property investment. We perform comprehensive background checks and screenings to ensure that we find reliable and responsible tenants for your property.', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // What we deliver card 3
    new \Kirki\Field\Image(
        [
            'settings'    => 'property_management_wwd_card_3',
            'label'       => esc_html__( 'What we deliver card 3 image', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'property_management_section',
            'default'     => get_template_directory_uri().'/assets/services/property-management/card_p_3.avif',
        ]
    );
      
    // What we deliver card 3 title
    new \Kirki\Field\Text(
        [
            'settings' => 'property_management_wwd_card_3_title',
            'label'    => esc_html__( 'What we deliver card 3 title', 'sbtech' ),
            'section'  => 'property_management_section',
            'default'  => esc_html__( 'Tenancy Contract Management', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // What we deliver card 3 description
    new \Kirki\Field\Text(
        [
            'settings' => 'property_management_wwd_card_3_desc',
            'label'    => esc_html__( 'What we deliver card 3 description', 'sbtech' ),
            'section'  => 'property_management_section',
            'default'  => esc_html__( 'Our team expertly manages all legal aspects of tenancy contracts to ensure full compliance with local regulations and safeguard your interests. We handle lease agreements, renewals, and terminations efficiently and transparently, providing you with peace of mind throughout the tenancy lifecycle.', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // What we deliver card 4
    new \Kirki\Field\Image(
        [
            'settings'    => 'property_management_wwd_card_4',
            'label'       => esc_html__( 'What we deliver card 4 image', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'property_management_section',
            'default'     => get_template_directory_uri().'/assets/services/property-management/card_p_4.avif',
        ]
    );
      
    // What we deliver card 4 title
    new \Kirki\Field\Text(
        [
            'settings' => 'property_management_wwd_card_4_title',
            'label'    => esc_html__( 'Maintenance and Repairs', 'sbtech' ),
            'section'  => 'property_management_section',
            'default'  => esc_html__( 'Tenancy Contract Management', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // What we deliver card 4 description
    new \Kirki\Field\Text(
        [
            'settings' => 'property_management_wwd_card_4_desc',
            'label'    => esc_html__( 'What we deliver card 4 description', 'sbtech' ),
            'section'  => 'property_management_section',
            'default'  => esc_html__( 'We provide round-the-clock maintenance services to address any issues swiftly and effectively. Our extensive network of reliable contractors guarantees that your property remains well-maintained and that all repairs meet the highest standards of quality.', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // What we deliver card 5
    new \Kirki\Field\Image(
        [
            'settings'    => 'property_management_wwd_card_5',
            'label'       => esc_html__( 'What we deliver card 5 image', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'property_management_section',
            'default'     => get_template_directory_uri().'/assets/services/property-management/card_p_5.avif',
        ]
    );
      
    // What we deliver card 5 title
    new \Kirki\Field\Text(
        [
            'settings' => 'property_management_wwd_card_5_title',
            'label'    => esc_html__( 'Maintenance and Repairs', 'sbtech' ),
            'section'  => 'property_management_section',
            'default'  => esc_html__( 'Financial Management', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // What we deliver card 5 description
    new \Kirki\Field\Text(
        [
            'settings' => 'property_management_wwd_card_5_desc',
            'label'    => esc_html__( 'What we deliver card 5 description', 'sbtech' ),
            'section'  => 'property_management_section',
            'default'  => esc_html__( 'We handle all financial aspects of your property management, from collecting rent to managing utility payments and producing financial reports. Our approach to transparent, real-time financial reporting ensures you are always well-informed about the performance of your property.', 'sbtech' ),
            'priority' => 10,
        ]
    );


    // What we deliver card 6
    new \Kirki\Field\Image(
        [
            'settings'    => 'property_management_wwd_card_6',
            'label'       => esc_html__( 'What we deliver card 6 image', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'property_management_section',
            'default'     => get_template_directory_uri().'/assets/services/property-management/card_p_6.avif',
        ]
    );
      
    // What we deliver card 6 title
    new \Kirki\Field\Text(
        [
            'settings' => 'property_management_wwd_card_6_title',
            'label'    => esc_html__( 'Regular Inspections', 'sbtech' ),
            'section'  => 'property_management_section',
            'default'  => esc_html__( 'Regular Inspections', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // What we deliver card 6 description
    new \Kirki\Field\Text(
        [
            'settings' => 'property_management_wwd_card_6_desc',
            'label'    => esc_html__( 'What we deliver card 5 description', 'sbtech' ),
            'section'  => 'property_management_section',
            'default'  => esc_html__( 'To preserve and enhance the value of your property, we conduct regular inspections and provide comprehensive reports. This proactive strategy allows us to identify and resolve potential issues early, preventing them from escalating into significant problems.', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // reapeater
    new \Kirki\Field\Repeater(
        [
            'settings'     => 'repeater_setting_2',
            'label'        => esc_html__( 'Repeater Control', 'sbtech' ),
            'section'      => 'property_management_section',
            'priority'     => 10,
            'row_label'    => [
                'type'  => 'field',
                'value' => esc_html__( 'Your Custom Value', 'sbtech' ),
                'field' => 'link_text',
            ],
            'button_label' => esc_html__( '"Add new" button label (optional) ', 'sbtech' ),
            'default'      => [
                [
                    'faq_question'   => esc_html__( 'question', 'sbtech' ),
                    'faq_answer'   => esc_html__( 'Answer', 'sbtech' ),
                ],
            ],
            'fields'       => [
                'faq_question'   => [
                    'type'        => 'text',
                    'label'       => esc_html__( 'Faq Question', 'sbtech' ),
                    'description' => esc_html__( 'Description', 'sbtech' ),
                    'default'     => '',
                ],
                'faq_answer'   => [
                    'type'        => 'text',
                    'label'       => esc_html__( 'Faq Answer', 'sbtech' ),
                    'description' => esc_html__( 'Description', 'sbtech' ),
                    'default'     => '',
                ],
            ],
        ]
    );



    
}
sbtech_property_management();

// List Your Property section
function sbtech_list_your_property(){

    // Header section
    new \Kirki\Section(
	'list_your_property_section',
        [
            'title'       => esc_html__( 'List Your Property page', 'sbtech' ),
            'description' => esc_html__( 'List Your Property page', 'sbtech' ),
            'panel'       => 'sbtech_panel',
            'priority'    => 160,
        ]
    );

    // hero title
    new \Kirki\Field\Text(
        [
            'settings' => 'li_hero_title',
            'label'    => esc_html__( 'Hero Title', 'sbtech' ),
            'section'  => 'list_your_property_section',
            'default'  => esc_html__( 'List Your Property with  <br>CBA Real Estate', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // hero description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'li_hero_desc',
            'label'    => esc_html__( 'Hero Descripiton', 'sbtech' ),
            'section'  => 'list_your_property_section',
            'default'  => esc_html__( 'We’re developing a modern, high-end WordPress real estate website inspired by metropolitan.realestate—focused on clean UX, fast performance, and long-term scalability. From AJAX-powered Buy/Rent listings to New Projects, Area guides, Developers directory, and API-driven property automation—everything is structured for growth.', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // button text 1
    new \Kirki\Field\Text(
        [
            'settings' => 'li_hero_btn_text_1',
            'label'    => esc_html__( 'Hero Button text 1', 'sbtech' ),
            'section'  => 'list_your_property_section',
            'default'  => esc_html__( 'View Properties', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // button text 2
    new \Kirki\Field\Text(
        [
            'settings' => 'li_hero_btn_text_2',
            'label'    => esc_html__( 'Hero Button text 2', 'sbtech' ),
            'section'  => 'list_your_property_section',
            'default'  => esc_html__( 'Contact', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // list your property subtitle
    new \Kirki\Field\Text(
        [
            'settings' => 'liyp_subtilte',
            'label'    => esc_html__( 'List your Property subtitle', 'sbtech' ),
            'section'  => 'list_your_property_section',
            'default'  => esc_html__( 'List Your Property', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // list your property title
    new \Kirki\Field\Text(
        [
            'settings' => 'liyp_title',
            'label'    => esc_html__( 'List your Property title', 'sbtech' ),
            'section'  => 'list_your_property_section',
            'default'  => esc_html__( 'Turn Your Property Into Income', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // list your property description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'liyp_desc',
            'label'    => esc_html__( 'List your Property description', 'sbtech' ),
            'section'  => 'list_your_property_section',
            'default'  => esc_html__( 'Easily list your property and start earning by connecting with the right tenants or buyers. Our platform makes it simple, fast, and secure to showcase your space to thousands of potential clients.', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // How does it work title
    new \Kirki\Field\Text(
        [
            'settings' => 'hdiw_title',
            'label'    => esc_html__( 'How does it work title', 'sbtech' ),
            'section'  => 'list_your_property_section',
            'default'  => esc_html__( 'How does it work?', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // How does it work description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'hdiw_desc',
            'label'    => esc_html__( 'How does it work description', 'sbtech' ),
            'section'  => 'list_your_property_section',
            'default'  => esc_html__( 'A simple, structured flow to list your property with CBA Real Estate—fast execution, premium marketing, and qualified leads.', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // How does it work step 1 title
    new \Kirki\Field\Text(
        [
            'settings' => 'hdiw_step_1_title',
            'label'    => esc_html__( 'How does it work step 1 title', 'sbtech' ),
            'section'  => 'list_your_property_section',
            'default'  => esc_html__( 'Property Review & Pricing', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // How does it work step 1 description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'hdiw_step_1_desc',
            'label'    => esc_html__( 'How does it work step 1 description', 'sbtech' ),
            'section'  => 'list_your_property_section',
            'default'  => esc_html__( 'We assess your property and recommend a competitive price based on market demand, location, and comparable listings.', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // How does it work step 2 title
    new \Kirki\Field\Text(
        [
            'settings' => 'hdiw_step_2_title',
            'label'    => esc_html__( 'How does it work step 2 title', 'sbtech' ),
            'section'  => 'list_your_property_section',
            'default'  => esc_html__( 'Listing Setup & Approval', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // How does it work step 2 description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'hdiw_step_2_desc',
            'label'    => esc_html__( 'How does it work step 2 description', 'sbtech' ),
            'section'  => 'list_your_property_section',
            'default'  => esc_html__( 'We prepare your listing with strong presentation and details, then confirm everything with you before going live.', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // How does it work step 3 title
    new \Kirki\Field\Text(
        [
            'settings' => 'hdiw_step_3_title',
            'label'    => esc_html__( 'How does it work step 3 title', 'sbtech' ),
            'section'  => 'list_your_property_section',
            'default'  => esc_html__( 'Premium Marketing & Reach', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // How does it work step 3 description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'hdiw_step_2_desc',
            'label'    => esc_html__( 'How does it work step 3 description', 'sbtech' ),
            'section'  => 'list_your_property_section',
            'default'  => esc_html__( 'Your property is promoted to qualified buyers and tenants through targeted exposure and trusted channels.', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // How does it work step 4 title
    new \Kirki\Field\Text(
        [
            'settings' => 'hdiw_step_4_title',
            'label'    => esc_html__( 'How does it work step 4 title', 'sbtech' ),
            'section'  => 'list_your_property_section',
            'default'  => esc_html__( 'Viewings, Negotiation & Close', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // How does it work step 4 description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'hdiw_step_2_desc',
            'label'    => esc_html__( 'How does it work step 4 description', 'sbtech' ),
            'section'  => 'list_your_property_section',
            'default'  => esc_html__( 'We manage enquiries, arrange viewings, negotiate offers, and guide you through to a smooth closing or tenant move-in.', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // Hero bg image
    new \Kirki\Field\Image(
        [
            'settings'    => 'list_your_property_hero_bg',
            'label'       => esc_html__( 'List Your Property Background Image', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'list_your_property_section',
            'default'     => get_template_directory_uri().'/assets/services/list-your-property/list-your-property.webp',
        ]
    );

    // Hero bg image
    new \Kirki\Field\Image(
        [
            'settings'    => 'list_your_property_pm_about_img',
            'label'       => esc_html__( 'List Your Property About section Image', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'list_your_property_section',
            'default'     => get_template_directory_uri().'/assets/services/list-your-property/list-your-property-about.avif',
        ]
    );
  
    // List your property Faq title
    new \Kirki\Field\Text(
        [
            'settings' => 'li_yp_faq_title',
            'label'    => esc_html__( 'Faq title', 'sbtech' ),
            'section'  => 'list_your_property_section',
            'default'  => esc_html__( 'List Your Property with Us', 'sbtech' ),
            'priority' => 10,
        ]
    );
  
    // Faq Description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'li_yp_faq_desc',
            'label'    => esc_html__( 'Faq Description', 'sbtech' ),
            'section'  => 'list_your_property_section',
            'default'  => esc_html__( 'Looking to sell or rent your property? Our platform helps you reach a wide audience quickly and easily. By listing your property with us, you’ll get exposure to interested buyers or tenants while also receiving expert support throughout the process. It’s time to let your property be seen by the right people. Start the process today!', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // reapeater
    new \Kirki\Field\Repeater(
        [
            'settings'     => 'list_yp_repeater',
            'label'        => esc_html__( 'Repeater Control', 'sbtech' ),
            'section'      => 'list_your_property_section',
            'priority'     => 10,
            'row_label'    => [
                'type'  => 'field',
                'value' => esc_html__( 'Your Custom Value', 'sbtech' ),
                'field' => 'link_text',
            ],
            'button_label' => esc_html__( '"Add new" button label (optional) ', 'sbtech' ),
            'default'      => [
                [
                    'liyp_faq_question'   => esc_html__( 'Question', 'sbtech' ),
                    'liyp_faq_answer'   => esc_html__( 'Answer', 'sbtech' ),
                ],
            ],
            'fields'       => [
                'liyp_faq_question'   => [
                    'type'        => 'text',
                    'label'       => esc_html__( 'Faq Question', 'sbtech' ),
                    'description' => esc_html__( 'Description', 'sbtech' ),
                    'default'     => '',
                ],
                'liyp_faq_answer'   => [
                    'type'        => 'text',
                    'label'       => esc_html__( 'Faq Answer', 'sbtech' ),
                    'description' => esc_html__( 'Description', 'sbtech' ),
                    'default'     => '',
                ],
            ],
        ]
    );
}
sbtech_list_your_property();

// mortgages section
function sbtech_mortgages(){

    // Header section
    new \Kirki\Section(
	'mortgages_section',
        [
            'title'       => esc_html__( 'Mortgages page', 'sbtech' ),
            'description' => esc_html__( 'Mortgages page', 'sbtech' ),
            'panel'       => 'sbtech_panel',
            'priority'    => 160,
        ]
    );
    
    // Mortage hero title
    new \Kirki\Field\Text(
        [
            'settings' => 'mortage_hero_title',
            'label'    => esc_html__( 'Mortage Title', 'sbtech' ),
            'section'  => 'mortgages_section',
            'default'  => esc_html__( 'ProDiscover Competitive Mortgage & Home Loan <br>Solutions in Dubai', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // hero description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'mortage_hero_desc',
            'label'    => esc_html__( 'Mortage Descripiton', 'sbtech' ),
            'section'  => 'mortgages_section',
            'default'  => esc_html__( 'Access tailored financing options with attractive rates and flexible terms across the UAE—start your homeownership journey with confidence.', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // button text 1
    new \Kirki\Field\Text(
        [
            'settings' => 'mortage_hero_btn_text_1',
            'label'    => esc_html__( 'Mortage Button text 1', 'sbtech' ),
            'section'  => 'mortgages_section',
            'default'  => esc_html__( 'View Properties', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // button text 2
    new \Kirki\Field\Text(
        [
            'settings' => 'mortage_hero_btn_text_2',
            'label'    => esc_html__( 'Mortage Button text 2', 'sbtech' ),
            'section'  => 'mortgages_section',
            'default'  => esc_html__( 'Contact', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // Mortage subtitle
    new \Kirki\Field\Text(
        [
            'settings' => 'mortage_sub_title',
            'label'    => esc_html__( 'Mortage subtitle', 'sbtech' ),
            'section'  => 'mortgages_section',
            'default'  => esc_html__( 'Mortgage Support', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // Mortage title
    new \Kirki\Field\Text(
        [
            'settings' => 'mortage_title',
            'label'    => esc_html__( 'Mortage title', 'sbtech' ),
            'section'  => 'mortgages_section',
            'default'  => esc_html__( 'Why choose mortgage support with CBA Real Estate?', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // Mortage description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'mortage_desc',
            'label'    => esc_html__( 'Mortage description', 'sbtech' ),
            'section'  => 'mortgages_section',
            'default'  => esc_html__( '<p>We help buyers and investors in Dubai access competitive mortgage solutions with clear guidance—from eligibility checks to approvals and final documentation.</p> <p>Whether you’re purchasing your first home, upgrading, or investing, our process is designed to be fast,transparent, and aligned with your property goals.</p> <p> You’ll get tailored options from trusted lenders, competitive rates and terms, and a smooth end-to-end experience—so you can focus on choosing the right property with confidence. </p>', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // Hero bg image
    new \Kirki\Field\Image(
        [
            'settings'    => 'mortgages_hero_bg',
            'label'       => esc_html__( 'Mortgages Background Image', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'mortgages_section',
            'default'     => get_template_directory_uri().'/assets/services/mortgages/mortgages.webp',
        ]
    );

    // support image
    new \Kirki\Field\Image(
        [
            'settings'    => 'mortgages_ms_img',
            'label'       => esc_html__( 'Mortgages Support Image', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'mortgages_section',
            'default'     => get_template_directory_uri().'/assets/services/mortgages/mortgages-support.avif',
        ]
    );
}
sbtech_mortgages();

// conveyancing section
function sbtech_conveyancing(){

    // Header section
    new \Kirki\Section(
	'conveyancing_section',
        [
            'title'       => esc_html__( 'Conveyancing page', 'sbtech' ),
            'description' => esc_html__( 'Conveyancing page', 'sbtech' ),
            'panel'       => 'sbtech_panel',
            'priority'    => 160,
        ]
    );

    // Hero bg image
    new \Kirki\Field\Image(
        [
            'settings'    => 'conveyancing_hero_bg',
            'label'       => esc_html__( 'Conveyancing Background Image', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'conveyancing_section',
            'default'     => get_template_directory_uri().'/assets/services/conveyancing/conveyancing_Bg.webp',
        ]
    );

    // About image
    new \Kirki\Field\Image(
        [
            'settings'    => 'conveyancing_about_img',
            'label'       => esc_html__( 'Conveyancing About Image', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'conveyancing_section',
            'default'     => get_template_directory_uri().'/assets/services/conveyancing/conveyancing_about.webp',
        ]
    );

    // Our services image
    new \Kirki\Field\Image(
        [
            'settings'    => 'conveyancing_services_img',
            'label'       => esc_html__( 'Conveyancing Service Image', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'conveyancing_section',
            'default'     => get_template_directory_uri().'/assets/services/conveyancing/conveyancing_services.webp',
        ]
    );
}
sbtech_conveyancing();

// property snagging section
function sbtech_property_snagging(){

    // Header section
    new \Kirki\Section(
	'property_snagging_section',
        [
            'title'       => esc_html__( 'Property Snaggingyancing pages', 'sbtech' ),
            'description' => esc_html__( 'Property Snaggingyancing', 'sbtech' ),
            'panel'       => 'sbtech_panel',
            'priority'    => 160,
        ]
    );

    // Hero bg image
    new \Kirki\Field\Image(
        [
            'settings'    => 'property_snagging_hero_bg',
            'label'       => esc_html__( 'Property Snaggingyancing Image', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'property_snagging_section',
            'default'     => get_template_directory_uri().'/assets/services/property-snagging/property_snagging_bg.webp',
        ]
    );

    // Why Snaggingyancing image
    new \Kirki\Field\Image(
        [
            'settings'    => 'property_snagging_ws_img',
            'label'       => esc_html__( 'Why Snaggingyancing image', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'property_snagging_section',
            'default'     => get_template_directory_uri().'/assets/services/property-snagging/property_snagging_why_snagging.avif',
        ]
    );

    // Why Choose image
    new \Kirki\Field\Image(
        [
            'settings'    => 'property_snagging_wc_img',
            'label'       => esc_html__( 'Why Snaggingyancing image Image', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'property_snagging_section',
            'default'     => get_template_directory_uri().'/assets/services/property-snagging/property_snagging_why_choose.avif',
        ]
    );
}
sbtech_property_snagging();

// partner program section
function sbtech_partner_program(){

    // Header section
    new \Kirki\Section(
	'partner_program_section',
        [
            'title'       => esc_html__( 'Partner Program pages', 'sbtech' ),
            'description' => esc_html__( 'Partner Program pages', 'sbtech' ),
            'panel'       => 'sbtech_panel',
            'priority'    => 160,
        ]
    );

    // Hero bg image
    new \Kirki\Field\Image(
        [
            'settings'    => 'partner_program_hero_bg',
            'label'       => esc_html__( 'Partner Program Image', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'partner_program_section',
            'default'     => get_template_directory_uri().'/assets/services/partner-program/partner_program_bg.webp',
        ]
    );

    // about image
    new \Kirki\Field\Image(
        [
            'settings'    => 'partner_program_about_img',
            'label'       => esc_html__( 'Partner Program About image', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'partner_program_section',
            'default'     => get_template_directory_uri().'/assets/services/partner-program/partner_program_about.avif',
        ]
    );

}
sbtech_partner_program();

// about us section
function sbtech_about_us(){

    // Header section
    new \Kirki\Section(
	'about_us_section',
        [
            'title'       => esc_html__( 'About Us pages', 'sbtech' ),
            'description' => esc_html__( 'About Us pages', 'sbtech' ),
            'panel'       => 'sbtech_panel',
            'priority'    => 160,
        ]
    );

    // Hero bg image
    new \Kirki\Field\Image(
        [
            'settings'    => 'about_us_hero_bg',
            'label'       => esc_html__( 'About Us Image', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'about_us_section',
            'default'     => get_template_directory_uri().'/assets/about_us/about_us_bg.jpg',
        ]
    );

    // Who we are image
    new \Kirki\Field\Image(
        [
            'settings'    => 'about_us_wwa_img',
            'label'       => esc_html__( 'Who We are image', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'about_us_section',
            'default'     => get_template_directory_uri().'/assets/about_us/about_us_who_we_are.avif',
        ]
    );

    // clients served
    new \Kirki\Field\Text(
        [
            'settings' => 'about_us_clients_served',
            'label'    => esc_html__( 'clients served', 'sbtech' ),
            'section'  => 'about_us_section',
            'default'  => esc_html__( '200,000', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // clients expertise
    new \Kirki\Field\Text(
        [
            'settings' => 'about_us_expertise',
            'label'    => esc_html__( 'Clients Expertise', 'sbtech' ),
            'section'  => 'about_us_section',
            'default'  => esc_html__( '12', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // successful closings
    new \Kirki\Field\Text(
        [
            'settings' => 'about_us_successful_closings',
            'label'    => esc_html__( 'successful closings', 'sbtech' ),
            'section'  => 'about_us_section',
            'default'  => esc_html__( '3,000', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // transaction
    new \Kirki\Field\Text(
        [
            'settings' => 'about_us_transaction',
            'label'    => esc_html__( 'Transaction Value', 'sbtech' ),
            'section'  => 'about_us_section',
            'default'  => esc_html__( '2B', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // Why sell image
    new \Kirki\Field\Image(
        [
            'settings'    => 'about_us_wsell',
            'label'       => esc_html__( 'Why sell image', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'about_us_section',
            'default'     => get_template_directory_uri().'/assets/about_us/about_us_who_we_are.avif',
        ]
    );

    // market value
    new \Kirki\Field\Text(
        [
            'settings' => 'about_us_mv',
            'label'    => esc_html__( 'Properties sold at market value', 'sbtech' ),
            'section'  => 'about_us_section',
            'default'  => esc_html__( '98', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // Experience
    new \Kirki\Field\Text(
        [
            'settings' => 'about_us_experience',
            'label'    => esc_html__( 'Experience', 'sbtech' ),
            'section'  => 'about_us_section',
            'default'  => esc_html__( '10', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // Successful property transactions
    new \Kirki\Field\Text(
        [
            'settings' => 'about_us_sptrans',
            'label'    => esc_html__( 'Successful property transactions', 'sbtech' ),
            'section'  => 'about_us_section',
            'default'  => esc_html__( '450', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // Active buyers
    new \Kirki\Field\Text(
        [
            'settings' => 'about_us_active_buyers',
            'label'    => esc_html__( 'Active buyers', 'sbtech' ),
            'section'  => 'about_us_section',
            'default'  => esc_html__( '350', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // Client support
    new \Kirki\Field\Text(
        [
            'settings' => 'about_us_client_support',
            'label'    => esc_html__( 'Client suppor', 'sbtech' ),
            'section'  => 'about_us_section',
            'default'  => esc_html__( '24/7', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // Transparent selling process
    new \Kirki\Field\Text(
        [
            'settings' => 'about_us_transparent_selling_process',
            'label'    => esc_html__( 'Transparent selling process', 'sbtech' ),
            'section'  => 'about_us_section',
            'default'  => esc_html__( '100', 'sbtech' ),
            'priority' => 10,
        ]
    );

    
    // switch achivement
	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'switch_about_us_achivement',
			'label'       => esc_html__( 'Switch Achivement', 'sbtech' ),
			'description' => esc_html__( 'Switch Achivement control', 'sbtech' ),
			'section'     => 'about_us_section',
			'default'     => 'off',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'sbtech' ),
				'off' => esc_html__( 'Disable', 'sbtech' ),
			],
		]
	);

}
sbtech_about_us();

// careers section
function sbtech_careers(){

    // Header section
    new \Kirki\Section(
	'careers_section',
        [
            'title'       => esc_html__( 'Careers pages', 'sbtech' ),
            'description' => esc_html__( 'Careers pages', 'sbtech' ),
            'panel'       => 'sbtech_panel',
            'priority'    => 160,
        ]
    );

    // Hero bg image
    new \Kirki\Field\Image(
        [
            'settings'    => 'careers_hero_bg',
            'label'       => esc_html__( 'Careers pages Image', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'careers_section',
            'default'     => get_template_directory_uri().'/assets/careers/careers_bg.webp',
        ]
    );

    // team 1 image
    new \Kirki\Field\Image(
        [
            'settings'    => 'careers_team_1',
            'label'       => esc_html__( 'Team 1 Image', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'careers_section',
            'default'     => get_template_directory_uri().'/assets/careers/team_img_1.avif',
        ]
    );

    // team 2 image
    new \Kirki\Field\Image(
        [
            'settings'    => 'careers_team_2',
            'label'       => esc_html__( 'Team 2 Image', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'careers_section',
            'default'     => get_template_directory_uri().'/assets/careers/team_img_2.avif',
        ]
    );

    // team 3 image
    new \Kirki\Field\Image(
        [
            'settings'    => 'careers_team_3',
            'label'       => esc_html__( 'Team 3 Image', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'careers_section',
            'default'     => get_template_directory_uri().'/assets/careers/team_img_3.avif',
        ]
    );

    // team 4 image
    new \Kirki\Field\Image(
        [
            'settings'    => 'careers_team_4',
            'label'       => esc_html__( 'Team 4 Image', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'careers_section',
            'default'     => get_template_directory_uri().'/assets/careers/team_img_4.avif',
        ]
    );

    // team 5 image
    new \Kirki\Field\Image(
        [
            'settings'    => 'careers_team_5',
            'label'       => esc_html__( 'Team 5 Image', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'careers_section',
            'default'     => get_template_directory_uri().'/assets/careers/team_img_5.avif',
        ]
    );

    // team 6 image
    new \Kirki\Field\Image(
        [
            'settings'    => 'careers_team_6',
            'label'       => esc_html__( 'Team 6 Image', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'careers_section',
            'default'     => get_template_directory_uri().'/assets/careers/team_img_6.avif',
        ]
    );

    // team 7 image
    new \Kirki\Field\Image(
        [
            'settings'    => 'careers_team_7',
            'label'       => esc_html__( 'Team 7 Image', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'careers_section',
            'default'     => get_template_directory_uri().'/assets/careers/team_img_7.avif',
        ]
    );


}
sbtech_careers();

// Contact us section
function sbtech_Contact_us(){

    // Header section
    new \Kirki\Section(
	'Contact_us_section',
        [
            'title'       => esc_html__( 'Contact Us', 'sbtech' ),
            'description' => esc_html__( 'Contact Us', 'sbtech' ),
            'panel'       => 'sbtech_panel',
            'priority'    => 160,
        ]
    );

    // Hero bg image
    new \Kirki\Field\Image(
        [
            'settings'    => 'Contact_us_hero_bg',
            'label'       => esc_html__( 'Contact Us Background Image', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'Contact_us_section',
            'default'     => get_template_directory_uri().'/assets/contact_us/contact_us_bg.webp',
        ]
    );

    // map address
    new \Kirki\Field\Text(
        [
            'settings' => 'Contact_us_map',
            'label'    => esc_html__( 'Address Name Of the Map', 'sbtech' ),
            'section'  => 'Contact_us_section',
            'default'  => esc_html__( 'dubai', 'sbtech' ),
            'priority' => 10,
        ]
    );

}
sbtech_Contact_us();

// Complaints Procedure section
function sbtech_complaints_procedure(){

    // Header section
    new \Kirki\Section(
	'complaints_procedure_section',
        [
            'title'       => esc_html__( 'Complaints Procedure', 'sbtech' ),
            'description' => esc_html__( 'Complaints Procedure', 'sbtech' ),
            'panel'       => 'sbtech_panel',
            'priority'    => 160,
        ]
    );

    // Hero bg image
    new \Kirki\Field\Image(
        [
            'settings'    => 'complaints_procedure_hero_bg',
            'label'       => esc_html__( 'Complaints Procedure Background Image', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'complaints_procedure_section',
            'default'     => get_template_directory_uri().'/assets/complaints_procedure/complaints_procedure_bg.webp',
        ]
    );

    
    // Phone
    new \Kirki\Field\Text(
        [
            'settings' => 'complaints_procedure_phone',
            'label'    => esc_html__( 'Phone', 'sbtech' ),
            'section'  => 'complaints_procedure_section',
            'default'  => esc_html__( '+971 4 428 6151', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // Complain mail
    new \Kirki\Field\Text(
        [
            'settings' => 'complaints_procedure_mail',
            'label'    => esc_html__( 'Complains Mail', 'sbtech' ),
            'section'  => 'complaints_procedure_section',
            'default'  => esc_html__( 'care@cbaestate.com', 'sbtech' ),
            'priority' => 10,
        ]
    );

}
sbtech_complaints_procedure();