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
            'label'    => esc_html__( 'For Career Button mail Property leads Necessary Mail', 'sbtech' ),
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

// sebtech Home section start
function sbtech_home_section(){

    // Home section
    new \Kirki\Section(
	'home_section',
        [
            'title'       => esc_html__( 'Home Page', 'sbtech' ),
            'description' => esc_html__( 'Home Page', 'sbtech' ),
            'panel'       => 'sbtech_panel',
            'priority'    => 160,
        ]
    );
        
    // Home filter title
    new \Kirki\Field\Text(
        [
            'settings' => 'home_filter_title',
            'label'    => esc_html__( 'Home Filter Title', 'sbtech' ),
            'section'  => 'home_section',
            'default'  => esc_html__( 'Find All Property', 'sbtech' ),
            'priority' => 10,
        ]
    );
        
    // Home sale title
    new \Kirki\Field\Text(
        [
            'settings' => 'home_sale_title',
            'label'    => esc_html__( 'HomeSale Title', 'sbtech' ),
            'section'  => 'home_section',
            'default'  => esc_html__( 'Properties for Sale', 'sbtech' ),
            'priority' => 10,
        ]
    );
        
    // Home rent title
    new \Kirki\Field\Text(
        [
            'settings' => 'home_rent_title',
            'label'    => esc_html__( 'Home Rent Title', 'sbtech' ),
            'section'  => 'home_section',
            'default'  => esc_html__( 'Properties for Rent', 'sbtech' ),
            'priority' => 10,
        ]
    );
        
    // Home popular area title
    new \Kirki\Field\Text(
        [
            'settings' => 'home_popular_area_title',
            'label'    => esc_html__( 'Home Popular Area Title', 'sbtech' ),
            'section'  => 'home_section',
            'default'  => esc_html__( 'Popular Areas in Dubai', 'sbtech' ),
            'priority' => 10,
        ]
    );
        
    // Home about us title
    new \Kirki\Field\Text(
        [
            'settings' => 'home_about_us_title',
            'label'    => esc_html__( 'Home About Us Title', 'sbtech' ),
            'section'  => 'home_section',
            'default'  => esc_html__( 'About Us', 'sbtech' ),
            'priority' => 10,
        ]
    );
        
    // Home about us description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'home_about_us_desc',
            'label'    => esc_html__( 'Home About Us Description', 'sbtech' ),
            'section'  => 'home_section',
            'default'  => esc_html__( 'Established to serve modern buyers, sellers, and investors, our real estate team delivers premium support, market expertise, and a smooth property journey—from first enquiry to final handover. We focus on trust, performance, and long-term relationships.', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // reapeater home about us section
    new \Kirki\Field\Repeater(
        [
            'settings'     => 'repeater_home_about_us',
            'label'        => esc_html__( 'Repeater Control', 'sbtech' ),
            'section'      => 'home_section',
            'priority'     => 10,
            'row_label'    => [
                'type'  => 'field',
                'value' => esc_html__( 'Your Custom Value', 'sbtech' ),
                'field' => 'link_text',
            ],
            'button_label' => esc_html__( '"Add new" button label (optional) ', 'sbtech' ),
            'default'      => [
                [
                    'about_title'   => esc_html__( 'title', 'sbtech' ),
                    'about_description'   => esc_html__( 'description', 'sbtech' ),
                ],
            ],
            'fields'       => [
                'about_title'   => [
                    'type'        => 'text',
                    'label'       => esc_html__( 'About Title', 'sbtech' ),
                    'description' => esc_html__( 'Description', 'sbtech' ),
                    'default'     => '',
                ],
                'about_description'   => [
                    'type'        => 'text',
                    'label'       => esc_html__( 'About Description', 'sbtech' ),
                    'description' => esc_html__( 'Description', 'sbtech' ),
                    'default'     => '',
                ],
            ],
        ]
    );
         
    // Home Agents title
    new \Kirki\Field\Text(
        [
            'settings' => 'home_agents_title',
            'label'    => esc_html__( 'Home Agents Title', 'sbtech' ),
            'section'  => 'home_section',
            'default'  => esc_html__( 'Our Agents', 'sbtech' ),
            'priority' => 10,
        ]
    );
        
    // Home Agents description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'home_agents_desc',
            'label'    => esc_html__( 'Home Agents Description', 'sbtech' ),
            'section'  => 'home_section',
            'default'  => esc_html__( 'Meet our top-performing agents selected for outstanding results, client satisfaction, and market expertise.', 'sbtech' ),
            'priority' => 10,
        ]
    );
        
    // Home review title
    new \Kirki\Field\Text(
        [
            'settings' => 'home_review_title',
            'label'    => esc_html__( 'Home Review Title', 'sbtech' ),
            'section'  => 'home_section',
            'default'  => esc_html__( 'Reviews About Our Company', 'sbtech' ),
            'priority' => 10,
        ]
    );
        
    // Home review description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'home_review_desc',
            'label'    => esc_html__( 'Home Review Description', 'sbtech' ),
            'section'  => 'home_section',
            'default'  => esc_html__( 'Trusted feedback from real clients. Professional service. Clear communication.', 'sbtech' ),
            'priority' => 10,
        ]
    );
        
    // Home subscribe form title
    new \Kirki\Field\Text(
        [
            'settings' => 'home_subscribe_title',
            'label'    => esc_html__( 'Home Subscribe Form Title', 'sbtech' ),
            'section'  => 'home_section',
            'default'  => esc_html__( 'Our newsletter', 'sbtech' ),
            'priority' => 10,
        ]
    );
        
    // Home subscribe form description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'home_subscribe_desc',
            'label'    => esc_html__( 'Home Subscribe Form Description', 'sbtech' ),
            'section'  => 'home_section',
            'default'  => esc_html__( 'Get weekly updates, new projects and insights.', 'sbtech' ),
            'priority' => 10,
        ]
    );

}
sbtech_home_section();

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
        
    // Buy faq title
    new \Kirki\Field\Text(
        [
            'settings' => 'buy_faq_title',
            'label'    => esc_html__( 'Buy FAQ Title', 'sbtech' ),
            'section'  => 'buy_section',
            'default'  => esc_html__( 'Frequently Asked Questions', 'sbtech' ),
            'priority' => 10,
        ]
    );
        
    // Buy faq description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'buy_faq_description',
            'label'    => esc_html__( 'Buy FAQ Description', 'sbtech' ),
            'section'  => 'buy_section',
            'default'  => esc_html__( 'Find answers to common questions about buying properties, the process, viewings, documentation, and available options.', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // reapeater Buy page faq section
    new \Kirki\Field\Repeater(
        [
            'settings'     => 'buy_page_fafq_repeater',
            'label'        => esc_html__( 'Repeater Control', 'sbtech' ),
            'section'      => 'buy_section',
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
        
    // rent page faq title
    new \Kirki\Field\Text(
        [
            'settings' => 'rent_faq_title',
            'label'    => esc_html__( 'Rent FAQ Title', 'sbtech' ),
            'section'  => 'rent_section',
            'default'  => esc_html__( 'Frequently Asked Questions', 'sbtech' ),
            'priority' => 10,
        ]
    );
        
    // rent page faq description
    new \Kirki\Field\Text(
        [
            'settings' => 'rent_faq_description',
            'label'    => esc_html__( 'Rent FAQ Description', 'sbtech' ),
            'section'  => 'rent_section',
            'default'  => esc_html__( 'Everything you need to know about renting, payments, and move-in.', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // reapeater
    new \Kirki\Field\Repeater(
        [
            'settings'     => 'rent_page_faq_repeater',
            'label'        => esc_html__( 'Repeater Control', 'sbtech' ),
            'section'      => 'rent_section',
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
        
    // Who We Are title
    new \Kirki\Field\Text(
        [
            'settings' => 'commercial_who_we_are_title',
            'label'    => esc_html__( 'Who We Are title', 'sbtech' ),
            'section'  => 'commercial_section',
            'default'  => esc_html__( 'Who We Are', 'sbtech' ),
            'priority' => 10,
        ]
    );
        
    // Who We Are description
    new \Kirki\Field\Text(
        [
            'settings' => 'commercial_who_we_are_desc',
            'label'    => esc_html__( 'Who We Are description', 'sbtech' ),
            'section'  => 'commercial_section',
            'default'  => esc_html__( 'We help businesses secure premium commercial spaces with verified listings, fast coordination, and a clean, performance-focused experience built for growth.', 'sbtech' ),
            'priority' => 10,
        ]
    );
        
    // Who We Are card 1 title
    new \Kirki\Field\Text(
        [
            'settings' => 'commercial_who_we_are_card_1_title',
            'label'    => esc_html__( 'Who We Are Card 1 Title', 'sbtech' ),
            'section'  => 'commercial_section',
            'default'  => esc_html__( '25+ Years', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // Who We Are card 1 description
    new \Kirki\Field\Text(
        [
            'settings' => 'commercial_who_we_are_card_1_description',
            'label'    => esc_html__( 'Who We Are Card 1 Description', 'sbtech' ),
            'section'  => 'commercial_section',
            'default'  => esc_html__( 'Commercial real estate experience', 'sbtech' ),
            'priority' => 10,
        ]
    );
        
    // Who We Are card 2 title
    new \Kirki\Field\Text(
        [
            'settings' => 'commercial_who_we_are_card_2_title',
            'label'    => esc_html__( 'Who We Are Card 2 Title', 'sbtech' ),
            'section'  => 'commercial_section',
            'default'  => esc_html__( '3000+', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // Who We Are card 2 description
    new \Kirki\Field\Text(
        [
            'settings' => 'commercial_who_we_are_card_2_description',
            'label'    => esc_html__( 'Who We Are Card 2 Description', 'sbtech' ),
            'section'  => 'commercial_section',
            'default'  => esc_html__( 'Verified commercial listings', 'sbtech' ),
            'priority' => 10,
        ]
    );
        
    // Who We Are card 3 title
    new \Kirki\Field\Text(
        [
            'settings' => 'commercial_who_we_are_card_3_title',
            'label'    => esc_html__( 'Who We Are Card 3 Title', 'sbtech' ),
            'section'  => 'commercial_section',
            'default'  => esc_html__( 'Global Clients', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // Who We Are card 3 description
    new \Kirki\Field\Text(
        [
            'settings' => 'commercial_who_we_are_card_3_description',
            'label'    => esc_html__( 'Who We Are Card 3 Description', 'sbtech' ),
            'section'  => 'commercial_section',
            'default'  => esc_html__( 'Multi-language support & worldwide reach', 'sbtech' ),
            'priority' => 10,
        ]
    );
        
    // Who We Are card 4 title
    new \Kirki\Field\Text(
        [
            'settings' => 'commercial_who_we_are_card_4_title',
            'label'    => esc_html__( 'Who We Are Card 4 Title', 'sbtech' ),
            'section'  => 'commercial_section',
            'default'  => esc_html__( 'Fast Response', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // Who We Are card 4 description
    new \Kirki\Field\Text(
        [
            'settings' => 'commercial_who_we_are_card_4_description',
            'label'    => esc_html__( 'Who We Are Card 4 Description', 'sbtech' ),
            'section'  => 'commercial_section',
            'default'  => esc_html__( 'Quick shortlist & viewing coordination', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // Who We Are point 1 title
    new \Kirki\Field\Text(
        [
            'settings' => 'commercial_who_we_are_point_1_title',
            'label'    => esc_html__( 'Who We Are Point 1 Title', 'sbtech' ),
            'section'  => 'commercial_section',
            'default'  => esc_html__( 'Mobile-first experience', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // Who We Are point 2 title
    new \Kirki\Field\Text(
        [
            'settings' => 'commercial_who_we_are_point_2_title',
            'label'    => esc_html__( 'Who We Are Point 2 Title', 'sbtech' ),
            'section'  => 'commercial_section',
            'default'  => esc_html__( 'Cloudflare-ready speed', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // Who We Are point 3 title
    new \Kirki\Field\Text(
        [
            'settings' => 'commercial_who_we_are_point_3_title',
            'label'    => esc_html__( 'Who We Are Point 3 Title', 'sbtech' ),
            'section'  => 'commercial_section',
            'default'  => esc_html__( 'Verified listing system', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // Who We Are point 4 title
    new \Kirki\Field\Text(
        [
            'settings' => 'commercial_who_we_are_point_4_title',
            'label'    => esc_html__( 'Who We Are Point 4 Title', 'sbtech' ),
            'section'  => 'commercial_section',
            'default'  => esc_html__( 'Lead optimized workflow', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // how can we help title
    new \Kirki\Field\Text(
        [
            'settings' => 'commercial_how_can_we_help_title',
            'label'    => esc_html__( 'How Can We Help Title', 'sbtech' ),
            'section'  => 'commercial_section',
            'default'  => esc_html__( 'How can we help you?', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // how can we help description
    new \Kirki\Field\Text(
        [
            'settings' => 'commercial_how_can_we_help_description',
            'label'    => esc_html__( 'How Can We Help Description', 'sbtech' ),
            'section'  => 'commercial_section',
            'default'  => esc_html__( 'We can help you rent or buy any type of commercial property that will fit with your goals and budget:', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // how can we help card 1 title
    new \Kirki\Field\Text(
        [
            'settings' => 'commercial_how_can_we_help_card_1_title',
            'label'    => esc_html__( 'How Can We Help Card 1 Title', 'sbtech' ),
            'section'  => 'commercial_section',
            'default'  => esc_html__( 'Prime Office Spaces', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // how can we help card 1 description
    new \Kirki\Field\Text(
        [
            'settings' => 'commercial_how_can_we_help_card_1_description',
            'label'    => esc_html__( 'How Can We Help Card 1 Description', 'sbtech' ),
            'section'  => 'commercial_section',
            'default'  => esc_html__( 'Strategically located office environments designed for productivity, professionalism, and long-term business growth.', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // how can we help card 2 title
    new \Kirki\Field\Text(
        [
            'settings' => 'commercial_how_can_we_help_card_2_title',
            'label'    => esc_html__( 'How Can We Help Card 2 Title', 'sbtech' ),
            'section'  => 'commercial_section',
            'default'  => esc_html__( 'Premium Retail Units', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // how can we help card 2 description
    new \Kirki\Field\Text(
        [
            'settings' => 'commercial_how_can_we_help_card_2_description',
            'label'    => esc_html__( 'How Can We Help Card 2 Description', 'sbtech' ),
            'section'  => 'commercial_section',
            'default'  => esc_html__( 'High-traffic retail locations that enhance brand visibility and attract consistent customer flow.', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // how can we help card 3 title
    new \Kirki\Field\Text(
        [
            'settings' => 'commercial_how_can_we_help_card_3_title',
            'label'    => esc_html__( 'How Can We Help Card 3 Title', 'sbtech' ),
            'section'  => 'commercial_section',
            'default'  => esc_html__( 'Smart Warehouse Solutions', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // how can we help card 3 description
    new \Kirki\Field\Text(
        [
            'settings' => 'commercial_how_can_we_help_card_3_description',
            'label'    => esc_html__( 'How Can We Help Card 3 Description', 'sbtech' ),
            'section'  => 'commercial_section',
            'default'  => esc_html__( 'Efficient storage and logistics-ready warehouse spaces with excellent accessibility and operational support.', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // how can we help card 4 title
    new \Kirki\Field\Text(
        [
            'settings' => 'commercial_how_can_we_help_card_4_title',
            'label'    => esc_html__( 'How Can We Help Card 4 Title', 'sbtech' ),
            'section'  => 'commercial_section',
            'default'  => esc_html__( 'Corporate Commercial Towers', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // how can we help card 4 description
    new \Kirki\Field\Text(
        [
            'settings' => 'commercial_how_can_we_help_card_4_description',
            'label'    => esc_html__( 'How Can We Help Card 4 Description', 'sbtech' ),
            'section'  => 'commercial_section',
            'default'  => esc_html__( 'Modern office towers designed for corporate tenants seeking a prestigious location and state-of-the-art amenities.', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // how can we help card 5 title
    new \Kirki\Field\Text(
        [
            'settings' => 'commercial_how_can_we_help_card_5_title',
            'label'    => esc_html__( 'How Can We Help Card 5 Title', 'sbtech' ),
            'section'  => 'commercial_section',
            'default'  => esc_html__( 'Brand Showroom Spaces', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // how can we help card 5 description
    new \Kirki\Field\Text(
        [
            'settings' => 'commercial_how_can_we_help_card_5_description',
            'label'    => esc_html__( 'How Can We Help Card 5 Description', 'sbtech' ),
            'section'  => 'commercial_section',
            'default'  => esc_html__( 'Well-positioned showrooms ideal for product display, brand experience, and direct customer interaction.', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // how can we help card 6 title
    new \Kirki\Field\Text(
        [
            'settings' => 'commercial_how_can_we_help_card_6_title',
            'label'    => esc_html__( 'How Can We Help Card 6 Title', 'sbtech' ),
            'section'  => 'commercial_section',
            'default'  => esc_html__( 'Industrial Business Parks', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // how can we help card 6 description
    new \Kirki\Field\Text(
        [
            'settings' => 'commercial_how_can_we_help_card_6_description',
            'label'    => esc_html__( 'How Can We Help Card 6 Description', 'sbtech' ),
            'section'  => 'commercial_section',
            'default'  => esc_html__( 'Purpose-built industrial properties with strong infrastructure, transport connectivity, and operational efficiency.', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // how can we help card 7 title
    new \Kirki\Field\Text(
        [
            'settings' => 'commercial_how_can_we_help_card_7_title',
            'label'    => esc_html__( 'How Can We Help Card 7 Title', 'sbtech' ),
            'section'  => 'commercial_section',
            'default'  => esc_html__( 'High-Return Investment Assets', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // how can we help card 7 description
    new \Kirki\Field\Text(
        [
            'settings' => 'commercial_how_can_we_help_card_7_description',
            'label'    => esc_html__( 'How Can We Help Card 7 Description', 'sbtech' ),
            'section'  => 'commercial_section',
            'default'  => esc_html__( 'Commercial properties selected for stable rental income, capital appreciation, and long-term investment security.', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // how can we help card 8 title
    new \Kirki\Field\Text(
        [
            'settings' => 'commercial_how_can_we_help_card_8_title',
            'label'    => esc_html__( 'How Can We Help Card 8 Title', 'sbtech' ),
            'section'  => 'commercial_section',
            'default'  => esc_html__( 'Integrated Mixed-Use Spaces', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // how can we help card 8 description
    new \Kirki\Field\Text(
        [
            'settings' => 'commercial_how_can_we_help_card_8_description',
            'label'    => esc_html__( 'How Can We Help Card 8 Description', 'sbtech' ),
            'section'  => 'commercial_section',
            'default'  => esc_html__( 'Multi-purpose developments combining office, retail, and lifestyle amenities for a complete business environment', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // faq title
    new \Kirki\Field\Text(
        [
            'settings' => 'commercial_faq_title',
            'label'    => esc_html__( 'Frequently Asked Questions Title', 'sbtech' ),
            'section'  => 'commercial_section',
            'default'  => esc_html__( 'Frequently asked questions', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // faq description
    new \Kirki\Field\Text(
        [
            'settings' => 'commercial_faq_description',
            'label'    => esc_html__( 'Frequently Asked Questions Description', 'sbtech' ),
            'section'  => 'commercial_section',
            'default'  => esc_html__( 'Everything you need to know about renting, payments, and move-in.', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // reapeater
    new \Kirki\Field\Repeater(
        [
            'settings'     => 'commercial_page_faq_repeater',
            'label'        => esc_html__( 'Commercial Page FAQ Repeater', 'sbtech' ),
            'section'      => 'commercial_section',
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
       
    // media hero title
    new \Kirki\Field\Text(
        [
            'settings' => 'media_hero_title',
            'label'    => esc_html__( 'media Title', 'sbtech' ),
            'section'  => 'media_section',
            'default'  => esc_html__( ' Media & <br> Latest Updates', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // media hero description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'media_hero_desc',
            'label'    => esc_html__( 'media Descripiton', 'sbtech' ),
            'section'  => 'media_section',
            'default'  => esc_html__( 'Stay informed with our latest news, market insights, project announcements, and company updates. Explore expert analysis, real estate trends, and key developments shaping the future of property and investment.', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // media button text 1
    new \Kirki\Field\Text(
        [
            'settings' => 'media_hero_btn_text_1',
            'label'    => esc_html__( 'media Button text 1', 'sbtech' ),
            'section'  => 'media_section',
            'default'  => esc_html__( 'View Properties', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // media button text 2
    new \Kirki\Field\Text(
        [
            'settings' => 'media_hero_btn_text_2',
            'label'    => esc_html__( 'media Button text 2', 'sbtech' ),
            'section'  => 'media_section',
            'default'  => esc_html__( 'Contact', 'sbtech' ),
            'priority' => 10,
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
      
    // media_press hero title
    new \Kirki\Field\Text(
        [
            'settings' => 'media_press_hero_title',
            'label'    => esc_html__( 'media_press Title', 'sbtech' ),
            'section'  => 'media_press_section',
            'default'  => esc_html__( 'Media & Press <br> Latest Updates', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // partner-media hero description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'media_press_hero_desc',
            'label'    => esc_html__( 'media_press Descripiton', 'sbtech' ),
            'section'  => 'media_press_section',
            'default'  => esc_html__( 'Stay updated with our latest news, press releases, project highlights, and industry insights. Discover key developments, market trends, and company announcements shaping the future of property.', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // media_press button text 1
    new \Kirki\Field\Text(
        [
            'settings' => 'media_press_hero_btn_text_1',
            'label'    => esc_html__( 'partner_program Button text 1', 'sbtech' ),
            'section'  => 'media_press_section',
            'default'  => esc_html__( 'View Properties', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // media_press button text 2
    new \Kirki\Field\Text(
        [
            'settings' => 'media_press_hero_btn_text_2',
            'label'    => esc_html__( 'media_press Button text 2', 'sbtech' ),
            'section'  => 'media_press_section',
            'default'  => esc_html__( 'Contact', 'sbtech' ),
            'priority' => 10,
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
    
    // property management title
    new \Kirki\Field\Text(
        [
            'settings' => 'property_management_faq_title',
            'label'    => esc_html__( 'Property Management FAQ Title', 'sbtech' ),
            'section'  => 'property_management_section',
            'default'  => esc_html__( 'Property Management', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // property management description
    new \Kirki\Field\Text(
        [
            'settings' => 'property_management_faq_description',
            'label'    => esc_html__( 'Property Management FAQ Description', 'sbtech' ),
            'section'  => 'property_management_section',
            'default'  => esc_html__( 'We provide comprehensive property management services to help you maximize the value of your real estate investments.', 'sbtech' ),
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
            'settings' => 'hdiw_step_3_desc',
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
            'settings' => 'hdiw_step_4_desc',
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

    // reapeater List Your Property section
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
            'label'    => esc_html__( 'What we Deliver Mortage subtitle', 'sbtech' ),
            'section'  => 'mortgages_section',
            'default'  => esc_html__( 'Mortgage Support', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // Mortage title
    new \Kirki\Field\Text(
        [
            'settings' => 'mortage_suppoer_title',
            'label'    => esc_html__( 'Mortage Support title', 'sbtech' ),
            'section'  => 'mortgages_section',
            'default'  => esc_html__( 'Why choose mortgage support with CBA Real Estate?', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // Mortage description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'mortage_support_desc',
            'label'    => esc_html__( 'Mortage description', 'sbtech' ),
            'section'  => 'mortgages_section',
            'default'  => esc_html__( '<p>We help buyers and investors in Dubai access competitive mortgage solutions with clear guidance—from eligibility checks to approvals and final documentation.</p> <p>Whether you’re purchasing your first home, upgrading, or investing, our process is designed to be fast,transparent, and aligned with your property goals.</p> <p> You’ll get tailored options from trusted lenders, competitive rates and terms, and a smooth end-to-end experience—so you can focus on choosing the right property with confidence. </p>', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // Mortage calculator title
    new \Kirki\Field\Text(
        [
            'settings' => 'mortage_calculator_title',
            'label'    => esc_html__( 'Calculator title', 'sbtech' ),
            'section'  => 'mortgages_section',
            'default'  => esc_html__( 'Mortgage Calculator', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // Mortage calculator description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'mortage_calculator_desc',
            'label'    => esc_html__( 'Calculator description', 'sbtech' ),
            'section'  => 'mortgages_section',
            'default'  => esc_html__( 'Estimate your monthly mortgage payment instantly. Adjust price, down payment, interest rate, and loan term.', 'sbtech' ),
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

    // Mortage Faq title
    new \Kirki\Field\Text(
        [
            'settings' => 'mortage_title',
            'label'    => esc_html__( 'Faq title', 'sbtech' ),
            'section'  => 'mortgages_section',
            'default'  => esc_html__( 'Mortgage Frequently Asked Questions', 'sbtech' ),
            'priority' => 10,
        ]
    );
  
    // Mortage Faq Description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'mortage_desc',
            'label'    => esc_html__( 'Faq Description', 'sbtech' ),
            'section'  => 'mortgages_section',
            'default'  => esc_html__( 'Find clear answers to common mortgage queries, eligibility requirements, repayment terms, and financing options to help you make confident property decisions in Dubai.', 'sbtech' ),
            'priority' => 10,
        ]
    );

     // reapeater List Your Property section
    new \Kirki\Field\Repeater(
        [
            'settings'     => 'mortage_repeater',
            'label'        => esc_html__( 'Repeater Control', 'sbtech' ),
            'section'      => 'mortgages_section',
            'priority'     => 10,
            'row_label'    => [
                'type'  => 'field',
                'value' => esc_html__( 'Your Custom Value', 'sbtech' ),
                'field' => 'link_text',
            ],
            'button_label' => esc_html__( '"Add new" button label (optional) ', 'sbtech' ),
            'default'      => [
                [
                    'mortage_question'   => esc_html__( 'Question', 'sbtech' ),
                    'mortage_answer'   => esc_html__( 'Answer', 'sbtech' ),
                ],
            ],
            'fields'       => [
                'mortage_question'   => [
                    'type'        => 'text',
                    'label'       => esc_html__( 'Faq Question', 'sbtech' ),
                    'description' => esc_html__( 'Description', 'sbtech' ),
                    'default'     => '',
                ],
                'mortage_answer'   => [
                    'type'        => 'text',
                    'label'       => esc_html__( 'Faq Answer', 'sbtech' ),
                    'description' => esc_html__( 'Description', 'sbtech' ),
                    'default'     => '',
                ],
            ],
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

       
    // conveyancing hero title
    new \Kirki\Field\Text(
        [
            'settings' => 'conveyancing_hero_title',
            'label'    => esc_html__( 'conveyancing Title', 'sbtech' ),
            'section'  => 'conveyancing_section',
            'default'  => esc_html__( 'A Smarter Way to Handle  <br>Property Transactions', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // hero description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'conveyancing_hero_desc',
            'label'    => esc_html__( 'conveyancing Descripiton', 'sbtech' ),
            'section'  => 'conveyancing_section',
            'default'  => esc_html__( 'We combine market expertise and financial support to make buying, selling, and financing property in Dubai smooth and efficient.', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // button text 1
    new \Kirki\Field\Text(
        [
            'settings' => 'conveyancing_hero_btn_text_1',
            'label'    => esc_html__( 'conveyancing Button text 1', 'sbtech' ),
            'section'  => 'conveyancing_section',
            'default'  => esc_html__( 'View Properties', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // button text 2
    new \Kirki\Field\Text(
        [
            'settings' => 'conveyancing_hero_btn_text_2',
            'label'    => esc_html__( 'conveyancing Button text 2', 'sbtech' ),
            'section'  => 'conveyancing_section',
            'default'  => esc_html__( 'Contact', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // Conveyancing about area subtitle
    new \Kirki\Field\Text(
        [
            'settings' => 'conveyancing_sub_title',
            'label'    => esc_html__( 'conveyancing about subtitle', 'sbtech' ),
            'section'  => 'conveyancing_section',
            'default'  => esc_html__( 'Conveyancing', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // conveyancing title
    new \Kirki\Field\Text(
        [
            'settings' => 'conveyancing_about_title',
            'label'    => esc_html__( 'Conveyancing about area title', 'sbtech' ),
            'section'  => 'conveyancing_section',
            'default'  => esc_html__( 'About Conveyancing with CBA Real Estate', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // conveyancing description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'conveyancing_about_desc',
            'label'    => esc_html__( 'Conveyancing about description', 'sbtech' ),
            'section'  => 'conveyancing_section',
            'default'  => esc_html__( '<p>Our conveyancing support helps buyers, sellers, and investors move through the transfer process with clarity and confidence. We coordinate documentation, timelines, and required steps with all relevant stakeholders to reduce delays and surprises. With a structured workflow and proactive communication, we help keep your transaction efficient, aligned with local regulations, and delivered with a premium client experience.</p>', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // Conveyancing Our services subtitle
    new \Kirki\Field\Text(
        [
            'settings' => 'conveyancing_our_services_sub_title',
            'label'    => esc_html__( 'Conveyancing Our services subtitle', 'sbtech' ),
            'section'  => 'conveyancing_section',
            'default'  => esc_html__( 'Conveyancing', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // Conveyancing Our services title
    new \Kirki\Field\Text(
        [
            'settings' => 'conveyancing_our_services_title',
            'label'    => esc_html__( 'Conveyancing Our services title', 'sbtech' ),
            'section'  => 'conveyancing_section',
            'default'  => esc_html__( 'Our Services', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // Conveyancing Our services description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'conveyancing_our_services_desc',
            'label'    => esc_html__( 'Conveyancing Our services description', 'sbtech' ),
            'section'  => 'conveyancing_section',
            'default'  => esc_html__( 'Practical legal and transfer support designed to simplify your Dubai property journey—clear steps, fast handling, and professional guidance.', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // Conveyancing Our services item 1
    new \Kirki\Field\Text(
        [
            'settings' => 'conveyancing_our_services_item_1',
            'label'    => esc_html__( 'Conveyancing Our services item 1', 'sbtech' ),
            'section'  => 'conveyancing_section',
            'default'  => esc_html__( 'Gifting Services', 'sbtech' ),
            'priority' => 10,
        ]
    );
      
    // Conveyancing Our services item 2
    new \Kirki\Field\Text(
        [
            'settings' => 'conveyancing_our_services_item_2',
            'label'    => esc_html__( 'Conveyancing Our services item 2', 'sbtech' ),
            'section'  => 'conveyancing_section',
            'default'  => esc_html__( 'Power of Attorney Management', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // Conveyancing Our services item 3
    new \Kirki\Field\Text(
        [
            'settings' => 'conveyancing_our_services_item_3',
            'label'    => esc_html__( 'Conveyancing Our services item 3', 'sbtech' ),
            'section'  => 'conveyancing_section',
            'default'  => esc_html__( 'Translation of Legal Documents', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // Conveyancing Our services item 4
    new \Kirki\Field\Text(
        [
            'settings' => 'conveyancing_our_services_item_4',
            'label'    => esc_html__( 'Conveyancing Our services item 4', 'sbtech' ),
            'section'  => 'conveyancing_section',
            'default'  => esc_html__( 'Property Investment Wills', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // Conveyancing Our services item 5
    new \Kirki\Field\Text(
        [
            'settings' => 'conveyancing_our_services_item_5',
            'label'    => esc_html__( 'Conveyancing Our services item 5', 'sbtech' ),
            'section'  => 'conveyancing_section',
            'default'  => esc_html__( 'Legal Eviction Notices', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // Conveyancing Our services item 6
    new \Kirki\Field\Text(
        [
            'settings' => 'conveyancing_our_services_item_6',
            'label'    => esc_html__( 'Conveyancing Our services item 6', 'sbtech' ),
            'section'  => 'conveyancing_section',
            'default'  => esc_html__( 'Online Power of Attorney Cancellation', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // Conveyancing Our services item 7
    new \Kirki\Field\Text(
        [
            'settings' => 'conveyancing_our_services_item_7',
            'label'    => esc_html__( 'Conveyancing Our services item 7', 'sbtech' ),
            'section'  => 'conveyancing_section',
            'default'  => esc_html__( 'MOFA Document Attestation', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // Conveyancing Our services item 8
    new \Kirki\Field\Text(
        [
            'settings' => 'conveyancing_our_services_item_8',
            'label'    => esc_html__( 'Conveyancing Our services item 8', 'sbtech' ),
            'section'  => 'conveyancing_section',
            'default'  => esc_html__( 'Property Transfer Consulting', 'sbtech' ),
            'priority' => 10,
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

    
    // conveyancing Faq title
    new \Kirki\Field\Text(
        [
            'settings' => 'conveyancing_title',
            'label'    => esc_html__( 'Faq title', 'sbtech' ),
            'section'  => 'conveyancing_section',
            'default'  => esc_html__( 'Mortgage Frequently Asked Questions', 'sbtech' ),
            'priority' => 10,
        ]
    );
  
    // conveyancing Faq Description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'conveyancing_desc',
            'label'    => esc_html__( 'conveyancing Description', 'sbtech' ),
            'section'  => 'conveyancing_section',
            'default'  => esc_html__( 'Find clear answers to common mortgage queries, eligibility requirements, repayment terms, and financing options to help you make confident property decisions in Dubai.', 'sbtech' ),
            'priority' => 10,
        ]
    );

     // reapeater conveyancing section
    new \Kirki\Field\Repeater(
        [
            'settings'     => 'conveyancing_repeater',
            'label'        => esc_html__( 'Repeater Control', 'sbtech' ),
            'section'      => 'conveyancing_section',
            'priority'     => 10,
            'row_label'    => [
                'type'  => 'field',
                'value' => esc_html__( 'Your Custom Value', 'sbtech' ),
                'field' => 'link_text',
            ],
            'button_label' => esc_html__( '"Add new" button label (optional) ', 'sbtech' ),
            'default'      => [
                [
                    'conveyancing_question'   => esc_html__( 'Question', 'sbtech' ),
                    'conveyancing_answer'   => esc_html__( 'Answer', 'sbtech' ),
                ],
            ],
            'fields'       => [
                'conveyancing_question'   => [
                    'type'        => 'text',
                    'label'       => esc_html__( 'Faq Question', 'sbtech' ),
                    'description' => esc_html__( 'Description', 'sbtech' ),
                    'default'     => '',
                ],
                'conveyancing_answer'   => [
                    'type'        => 'text',
                    'label'       => esc_html__( 'Faq Answer', 'sbtech' ),
                    'description' => esc_html__( 'Description', 'sbtech' ),
                    'default'     => '',
                ],
            ],
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
    
    // property-snagging hero title
    new \Kirki\Field\Text(
        [
            'settings' => 'property_snagging_hero_title',
            'label'    => esc_html__( 'property-snagging Title', 'sbtech' ),
            'section'  => 'property_snagging_section',
            'default'  => esc_html__( 'Property Snagging  <br>Services', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // hero description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'property_snagging_hero_desc',
            'label'    => esc_html__( 'property snagging Descripiton', 'sbtech' ),
            'section'  => 'property_snagging_section',
            'default'  => esc_html__( 'Welcome to CBA Real Estate — ensuring your property is delivered to the highest standards before handover.', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // button text 1
    new \Kirki\Field\Text(
        [
            'settings' => 'property_snagging_hero_btn_text_1',
            'label'    => esc_html__( 'property_snagging Button text 1', 'sbtech' ),
            'section'  => 'property_snagging_section',
            'default'  => esc_html__( 'View Properties', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // button text 2
    new \Kirki\Field\Text(
        [
            'settings' => 'property_snagging_hero_btn_text_2',
            'label'    => esc_html__( 'property_snagging Button text 2', 'sbtech' ),
            'section'  => 'property_snagging_section',
            'default'  => esc_html__( 'Contact', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // property_snagging subtitle
    new \Kirki\Field\Text(
        [
            'settings' => 'property_snagging_about_sub_title',
            'label'    => esc_html__( 'What we Deliver Mortage subtitle', 'sbtech' ),
            'section'  => 'property_snagging_section',
            'default'  => esc_html__( 'Property Snagging', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // property_snagging title
    new \Kirki\Field\Text(
        [
            'settings' => 'property_snagging_about_title',
            'label'    => esc_html__( 'property_snagging Support title', 'sbtech' ),
            'section'  => 'property_snagging_section',
            'default'  => esc_html__( 'Why Snagging & Inspection with CBA Real Estate?', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // property_snagging description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'property_snagging_about_desc',
            'label'    => esc_html__( 'property_snagging description', 'sbtech' ),
            'section'  => 'property_snagging_section',
            'default'  => esc_html__( '<p> Our snagging service identifies finishing defects, functional issues, and quality gaps before you take ownership. We inspect key areas such as walls and paintwork, flooring, doors and windows, plumbing, electrical points, HVAC performance, and visible workmanship details. </p> <p> You receive a structured snagging report with prioritized items, so you can request rectifications from the or contractor quickly and confidently—reducing post-handover surprises.</p>', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // property_snagging why choose subtitle
    new \Kirki\Field\Text(
        [
            'settings' => 'property_snagging_why_c_sub_title',
            'label'    => esc_html__( 'property_snagging why choose subtitle', 'sbtech' ),
            'section'  => 'property_snagging_section',
            'default'  => esc_html__( 'Property Snagging', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // property_snagging why choose title
    new \Kirki\Field\Text(
        [
            'settings' => 'property_snagging_why_c_title',
            'label'    => esc_html__( 'property_snagging why choose title', 'sbtech' ),
            'section'  => 'property_snagging_section',
            'default'  => esc_html__( 'Why Choose Us?', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // property_snagging why choose point 1
    new \Kirki\Field\Text(
        [
            'settings' => 'property_snagging_why_c_point_1',
            'label'    => esc_html__( 'property_snagging why choose point 1', 'sbtech' ),
            'section'  => 'property_snagging_section',
            'default'  => esc_html__( '<strong>Experienced Inspectors:</strong> Our team understands real-world handover issues and knows what to check—so defects don’t get missed.', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // property_snagging why choose point 2
    new \Kirki\Field\Text(
        [
            'settings' => 'property_snagging_why_c_point_2',
            'label'    => esc_html__( 'property_snagging why choose point 2', 'sbtech' ),
            'section'  => 'property_snagging_section',
            'default'  => esc_html__( '<strong>Thorough & Detailed:</strong> We inspect finishes, fittings, doors/windows, plumbing points, electrical outlets, and visible workmanship to ensure quality standards.', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // property_snagging why choose point 3
    new \Kirki\Field\Text(
        [
            'settings' => 'property_snagging_why_c_point_3',
            'label'    => esc_html__( 'property_snagging why choose point 3', 'sbtech' ),
            'section'  => 'property_snagging_section',
            'default'  => esc_html__( '<strong>Clear Reporting:</strong> You receive an actionable snag list with priorities—making it easy to request rectifications from the developer or contractor.', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // property_snagging why choose point 4
    new \Kirki\Field\Text(
        [
            'settings' => 'property_snagging_why_c_point_4',
            'label'    => esc_html__( 'property_snagging why choose point 1', 'sbtech' ),
            'section'  => 'property_snagging_section',
            'default'  => esc_html__( 'Peace of Mind:</strong> Move in with confidence, knowing your property was checked properly and issues were identified before handover.', 'sbtech' ),
            'priority' => 10,
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
    
    // snagging Faq title
    new \Kirki\Field\Text(
        [
            'settings' => 'snagging_title',
            'label'    => esc_html__( 'Faq title', 'sbtech' ),
            'section'  => 'property_snagging_section',
            'default'  => esc_html__( 'Property Snagging FAQ', 'sbtech' ),
            'priority' => 10,
        ]
    );
  
    // snagging Faq Description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'snagging_desc',
            'label'    => esc_html__( 'Faq Description', 'sbtech' ),
            'section'  => 'property_snagging_section',
            'default'  => esc_html__( 'FGet quick answers about our property snagging and inspection process in Dubai—what we check, when to book, what you’ll receive, and how snagging helps protect your investment before handover.', 'sbtech' ),
            'priority' => 10,
        ]
    );

     // reapeater snagging section
    new \Kirki\Field\Repeater(
        [
            'settings'     => 'snagging_repeater',
            'label'        => esc_html__( 'Repeater Control', 'sbtech' ),
            'section'      => 'property_snagging_section',
            'priority'     => 10,
            'row_label'    => [
                'type'  => 'field',
                'value' => esc_html__( 'Your Custom Value', 'sbtech' ),
                'field' => 'link_text',
            ],
            'button_label' => esc_html__( '"Add new" button label (optional) ', 'sbtech' ),
            'default'      => [
                [
                    'snagging_question'   => esc_html__( 'Question', 'sbtech' ),
                    'snagging_answer'   => esc_html__( 'Answer', 'sbtech' ),
                ],
            ],
            'fields'       => [
                'snagging_question'   => [
                    'type'        => 'text',
                    'label'       => esc_html__( 'Faq Question', 'sbtech' ),
                    'description' => esc_html__( 'Description', 'sbtech' ),
                    'default'     => '',
                ],
                'snagging_answer'   => [
                    'type'        => 'text',
                    'label'       => esc_html__( 'Faq Answer', 'sbtech' ),
                    'description' => esc_html__( 'Description', 'sbtech' ),
                    'default'     => '',
                ],
            ],
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
     
    // partner-program hero title
    new \Kirki\Field\Text(
        [
            'settings' => 'partner_program_hero_title',
            'label'    => esc_html__( 'partner_program Title', 'sbtech' ),
            'section'  => 'partner_program_section',
            'default'  => esc_html__( 'CBA Real Estate  <br>Partner Program', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // partner-program hero description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'partner_program_hero_desc',
            'label'    => esc_html__( 'partner_program Descripiton', 'sbtech' ),
            'section'  => 'partner_program_section',
            'default'  => esc_html__( 'Collaborate with a trusted brand and capitalize on Dubai’s thriving property market.', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // partner-program button text 1
    new \Kirki\Field\Text(
        [
            'settings' => 'partner_program_hero_btn_text_1',
            'label'    => esc_html__( 'partner_program Button text 1', 'sbtech' ),
            'section'  => 'partner_program_section',
            'default'  => esc_html__( 'View Properties', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // partner-program button text 2
    new \Kirki\Field\Text(
        [
            'settings' => 'partner_program_hero_btn_text_2',
            'label'    => esc_html__( 'partner_program Button text 2', 'sbtech' ),
            'section'  => 'partner_program_section',
            'default'  => esc_html__( 'Contact', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // partner-program about subtitle
    new \Kirki\Field\Text(
        [
            'settings' => 'partner_program_about_sub_title',
            'label'    => esc_html__( 'partner_program subtitle', 'sbtech' ),
            'section'  => 'partner_program_section',
            'default'  => esc_html__( 'Partner Program', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // partner-program about title
    new \Kirki\Field\Text(
        [
            'settings' => 'partner_program_about_title',
            'label'    => esc_html__( 'partner_program about title', 'sbtech' ),
            'section'  => 'partner_program_section',
            'default'  => esc_html__( 'About CBA', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // partner-program about description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'partner_program_about_desc',
            'label'    => esc_html__( 'partner_program about description', 'sbtech' ),
            'section'  => 'partner_program_section',
            'default'  => esc_html__( '<p> Our snagging service identifies finishing defects, functional issues, and quality gaps before you take ownership. We inspect key areas such as walls and paintwork, flooring, doors and windows, plumbing, electrical points, HVAC performance, and visible workmanship details. </p> <p> You receive a structured snagging report with prioritized items, so you can request rectifications from the or contractor quickly and confidently—reducing post-handover surprises.</p>', 'sbtech' ),
            'priority' => 10,
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
     
    // Why Partner With CBA subtitle
    new \Kirki\Field\Text(
        [
            'settings' => 'partner_programs_why_partner_with_cba_sub_title',
            'label'    => esc_html__( 'Why Partner With CBA Subtitle', 'sbtech' ),
            'section'  => 'partner_program_section',
            'default'  => esc_html__( 'Partner Program', 'sbtech' ),
            'priority' => 10,
        ]
    );
     
    // Why Partner With CBA title
    new \Kirki\Field\Text(
        [
            'settings' => 'partner_programs_why_partner_with_cba_title',
            'label'    => esc_html__( 'Why Partner With CBA Title', 'sbtech' ),
            'section'  => 'partner_program_section',
            'default'  => esc_html__( 'Why Partner With CBA Real Estate?', 'sbtech' ),
            'priority' => 10,
        ]
    );
     
    // Why Partner With CBA description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'partner_programs_why_partner_with_cba_desc',
            'label'    => esc_html__( 'Why Partner With CBA Description', 'sbtech' ),
            'section'  => 'partner_program_section',
            'default'  => esc_html__( 'Join CBA Real Estate and unlock premium inventory, structured referrals, and dedicated support—built for long-term growth in Dubai’s market.', 'sbtech' ),
            'priority' => 10,
        ]
    );
     
    // Why Partner With CBA card 1 title
    new \Kirki\Field\Text(
        [
            'settings' => 'partner_program_why_partner_with_cba_card_1_title',
            'label'    => esc_html__( 'Why Partner With CBA Card 1 Title', 'sbtech' ),
            'section'  => 'partner_program_section',
            'default'  => esc_html__( 'Access Exclusive Properties', 'sbtech' ),
            'priority' => 10,
        ]
    );
     
    // Why Partner With CBA card 1 description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'partner_program_why_partner_with_cba_card_1_desc',
            'label'    => esc_html__( 'Why Partner With CBA Card 1 Description', 'sbtech' ),
            'section'  => 'partner_program_section',
            'default'  => esc_html__( 'Get priority access to high-demand listings and curated opportunities—so you stay ahead with the right inventory.', 'sbtech' ),
            'priority' => 10,
        ]
    );
     
    // Why Partner With CBA card 2 title
    new \Kirki\Field\Text(
        [
            'settings' => 'partner_program_why_partner_with_cba_card_2_title',
            'label'    => esc_html__( 'Why Partner With CBA Card 2 Title', 'sbtech' ),
            'section'  => 'partner_program_section',
            'default'  => esc_html__( 'Lucrative Referral Program', 'sbtech' ),
            'priority' => 10,
        ]
    );
     
    // Why Partner With CBA card 2 description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'partner_program_why_partner_with_cba_card_2_desc',
            'label'    => esc_html__( 'Why Partner With CBA Card 2 Description', 'sbtech' ),
            'section'  => 'partner_program_section',
            'default'  => esc_html__( 'Earn competitive referral commissions with a transparent, performance-driven partnership model.', 'sbtech' ),
            'priority' => 10,
        ]
    );
     
    // Why Partner With CBA card 3 title
    new \Kirki\Field\Text(
        [
            'settings' => 'partner_program_why_partner_with_cba_card_3_title',
            'label'    => esc_html__( 'Why Partner With CBA Card 3 Title', 'sbtech' ),
            'section'  => 'partner_program_section',
            'default'  => esc_html__( 'Trusted Expertise', 'sbtech' ),
            'priority' => 10,
        ]
    );
     
    // Why Partner With CBA card 3 description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'partner_program_why_partner_with_cba_card_3_desc',
            'label'    => esc_html__( 'Why Partner With CBA Card 3 Description', 'sbtech' ),
            'section'  => 'partner_program_section',
            'default'  => esc_html__( 'Partner with experienced professionals known for market insights, clear guidance, and strong deal execution.', 'sbtech' ),
            'priority' => 10,
        ]
    );
     
    // Why Partner With CBA card 4 title
    new \Kirki\Field\Text(
        [
            'settings' => 'partner_program_why_partner_with_cba_card_4_title',
            'label'    => esc_html__( 'Why Partner With CBA Card 4 Title', 'sbtech' ),
            'section'  => 'partner_program_section',
            'default'  => esc_html__( 'Comprehensive Support', 'sbtech' ),
            'priority' => 10,
        ]
    );
     
    // Why Partner With CBA card 4 description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'partner_program_why_partner_with_cba_card_4_desc',
            'label'    => esc_html__( 'Why Partner With CBA Card 4 Description', 'sbtech' ),
            'section'  => 'partner_program_section',
            'default'  => esc_html__( 'Get marketing assets, partner assistance, and end-to-end coordination to keep every lead moving smoothly.', 'sbtech' ),
            'priority' => 10,
        ]
    );
     
    // Why Partner With CBA card 5 title
    new \Kirki\Field\Text(
        [
            'settings' => 'partner_program_why_partner_with_cba_card_5_title',
            'label'    => esc_html__( 'Why Partner With CBA Card 5 Title', 'sbtech' ),
            'section'  => 'partner_program_section',
            'default'  => esc_html__( 'Expand Your Network', 'sbtech' ),
            'priority' => 10,
        ]
    );
     
    // Why Partner With CBA card 5 description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'partner_program_why_partner_with_cba_card_5_desc',
            'label'    => esc_html__( 'Why Partner With CBA Card 5 Description', 'sbtech' ),
            'section'  => 'partner_program_section',
            'default'  => esc_html__( 'Connect with buyers, investors, and decision-makers—opening new opportunities through strategic relationships.', 'sbtech' ),
            'priority' => 10,
        ]
    );
     
    // Why Partner With CBA card 6 title
    new \Kirki\Field\Text(
        [
            'settings' => 'partner_program_why_partner_with_cba_card_6_title',
            'label'    => esc_html__( 'Why Partner With CBA Card 6 Title', 'sbtech' ),
            'section'  => 'partner_program_section',
            'default'  => esc_html__( 'Stay Ahead in the Market', 'sbtech' ),
            'priority' => 10,
        ]
    );
     
    // Why Partner With CBA card 6 description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'partner_program_why_partner_with_cba_card_6_desc',
            'label'    => esc_html__( 'Why Partner With CBA Card 6 Description', 'sbtech' ),
            'section'  => 'partner_program_section',
            'default'  => esc_html__( 'Leverage Dubai’s fast-moving market with timely inventory, data-backed insights, and strong partner positioning.', 'sbtech' ),
            'priority' => 10,
        ]
    );
     
    // partner-program Faq title
    new \Kirki\Field\Text(
        [
            'settings' => 'partner_program_title',
            'label'    => esc_html__( 'Faq title', 'sbtech' ),
            'section'  => 'partner_program_section',
            'default'  => esc_html__( 'Partner With Us & Grow Together', 'sbtech' ),
            'priority' => 10,
        ]
    );
  
    // partner-program Faq Description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'partner_program_desc',
            'label'    => esc_html__( 'Faq Description', 'sbtech' ),
            'section'  => 'partner_program_section',
            'default'  => esc_html__( 'Join our partner program and unlock new opportunities for growth and collaboration. We work with agencies, freelancers, and businesses who want to expand their services, increase revenue, and deliver more value to their clients.', 'sbtech' ),
            'priority' => 10,
        ]
    );

     // reapeater partner_program section
    new \Kirki\Field\Repeater(
        [
            'settings'     => 'partner_program_repeater',
            'label'        => esc_html__( 'Repeater Control', 'sbtech' ),
            'section'      => 'partner_program_section',
            'priority'     => 10,
            'row_label'    => [
                'type'  => 'field',
                'value' => esc_html__( 'Your Custom Value', 'sbtech' ),
                'field' => 'link_text',
            ],
            'button_label' => esc_html__( '"Add new" button label (optional) ', 'sbtech' ),
            'default'      => [
                [
                    'partner_program_question'   => esc_html__( 'Question', 'sbtech' ),
                    'partner_program_answer'   => esc_html__( 'Answer', 'sbtech' ),
                ],
            ],
            'fields'       => [
                'partner_program_question'   => [
                    'type'        => 'text',
                    'label'       => esc_html__( 'Faq Question', 'sbtech' ),
                    'description' => esc_html__( 'Description', 'sbtech' ),
                    'default'     => '',
                ],
                'partner_program_answer'   => [
                    'type'        => 'text',
                    'label'       => esc_html__( 'Faq Answer', 'sbtech' ),
                    'description' => esc_html__( 'Description', 'sbtech' ),
                    'default'     => '',
                ],
            ],
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
       
    // about us hero title
    new \Kirki\Field\Text(
        [
            'settings' => 'about_us_hero_title',
            'label'    => esc_html__( 'about_us Title', 'sbtech' ),
            'section'  => 'about_us_section',
            'default'  => esc_html__( 'About Our <br> Premium Properties', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // about us hero description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'about_us_hero_desc',
            'label'    => esc_html__( 'about_us Descripiton', 'sbtech' ),
            'section'  => 'about_us_section',
            'default'  => esc_html__( 'Award-winning real estate agency in Dubai, offering expert services in sales, rentals, and property management. We help clients from all over the world.', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // about us button text 1
    new \Kirki\Field\Text(
        [
            'settings' => 'about_us_hero_btn_text_1',
            'label'    => esc_html__( 'about_us Button text 1', 'sbtech' ),
            'section'  => 'about_us_section',
            'default'  => esc_html__( 'View Properties', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // about us button text 2
    new \Kirki\Field\Text(
        [
            'settings' => 'about_us_hero_btn_text_2',
            'label'    => esc_html__( 'about_us Button text 2', 'sbtech' ),
            'section'  => 'about_us_section',
            'default'  => esc_html__( 'Contact', 'sbtech' ),
            'priority' => 10,
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

    // who we are title
    new \Kirki\Field\Text(
        [
            'settings' => 'who_wa_title',
            'label'    => esc_html__( 'who we are title', 'sbtech' ),
            'section'  => 'about_us_section',
            'default'  => esc_html__( 'Who We Are', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // who we are description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'who_wa_desc',
            'label'    => esc_html__( 'who we are description', 'sbtech' ),
            'section'  => 'about_us_section',
            'default'  => esc_html__( '<p class="about_text">We are a Dubai-based real estate consultancy focused on premium residential and investment opportunities. Our team blends local market expertise with clear guidance—helping buyers, sellers, and investors move with confidence. </p> <p class="about_text"> From discovery to closing, we deliver a seamless experience with verified listings, strong developer relationships, and responsive support tailored to your goals. </p>', 'sbtech' ),
            'priority' => 10,
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

    // clients served text
    new \Kirki\Field\Text(
        [
            'settings' => 'about_us_clients_served_text',
            'label'    => esc_html__( 'clients served text', 'sbtech' ),
            'section'  => 'about_us_section',
            'default'  => esc_html__( 'clients served', 'sbtech' ),
            'priority' => 10,
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
            'settings' => 'about_us_expertise_text',
            'label'    => esc_html__( 'Clients Expertise text', 'sbtech' ),
            'section'  => 'about_us_section',
            'default'  => esc_html__( 'Clients Expertise', 'sbtech' ),
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

    // successful closings text
    new \Kirki\Field\Text(
        [
            'settings' => 'about_us_successful_closings_text',
            'label'    => esc_html__( 'successful closings text', 'sbtech' ),
            'section'  => 'about_us_section',
            'default'  => esc_html__( 'successful closings', 'sbtech' ),
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

    // transaction text
    new \Kirki\Field\Text(
        [
            'settings' => 'about_us_transaction_text',
            'label'    => esc_html__( 'Transaction Value text', 'sbtech' ),
            'section'  => 'about_us_section',
            'default'  => esc_html__( 'ransaction Value', 'sbtech' ),
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

    // Why sell title
    new \Kirki\Field\Text(
        [
            'settings' => 'why_sell_title',
            'label'    => esc_html__( 'Why sell title', 'sbtech' ),
            'section'  => 'about_us_section',
            'default'  => esc_html__( 'Why sell your property <span>with us?</span>', 'sbtech' ),
            'priority' => 10,
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

    // market value text
    new \Kirki\Field\Text(
        [
            'settings' => 'about_us_mv_text',
            'label'    => esc_html__( 'Properties sold at market value text', 'sbtech' ),
            'section'  => 'about_us_section',
            'default'  => esc_html__( 'Properties sold at market value', 'sbtech' ),
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
    
    // Experience TEXT  
    new \Kirki\Field\Text(
        [
            'settings' => 'about_us_experience_text',
            'label'    => esc_html__( 'Experience text', 'sbtech' ),
            'section'  => 'about_us_section',
            'default'  => esc_html__( 'Experience in property sales', 'sbtech' ),
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
    
    // Successful property transactions text
    new \Kirki\Field\Text(
        [
            'settings' => 'about_us_sptrans_text',
            'label'    => esc_html__( 'Successful property transactions text', 'sbtech' ),
            'section'  => 'about_us_section',
            'default'  => esc_html__( 'Successful property transactions', 'sbtech' ),
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
    
    // Active buyers text
    new \Kirki\Field\Text(
        [
            'settings' => 'about_us_active_buyers_text',
            'label'    => esc_html__( 'Active buyers text', 'sbtech' ),
            'section'  => 'about_us_section',
            'default'  => esc_html__( 'Active buyers in our network', 'sbtech' ),
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
    
    // Client support text
    new \Kirki\Field\Text(
        [
            'settings' => 'about_us_client_support_text',
            'label'    => esc_html__( 'Client suppor text', 'sbtech' ),
            'section'  => 'about_us_section',
            'default'  => esc_html__( 'Client support & consultation', 'sbtech' ),
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
    
    // Transparent selling process text
    new \Kirki\Field\Text(
        [
            'settings' => 'about_us_transparent_selling_process_text',
            'label'    => esc_html__( 'Transparent selling process text', 'sbtech' ),
            'section'  => 'about_us_section',
            'default'  => esc_html__( 'Transparent selling process', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // Powerful Marketing title
    new \Kirki\Field\Text(
        [
            'settings' => 'powerful_m_title',
            'label'    => esc_html__( 'Powerful Marketing title', 'sbtech' ),
            'section'  => 'about_us_section',
            'default'  => esc_html__( 'Powerful Marketing. <span>Real Results.</span>', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // Powerful Marketing item 1
    new \Kirki\Field\Text(
        [
            'settings' => 'powerful_m_item_1',
            'label'    => esc_html__( 'Powerful Marketing Item 1 ', 'sbtech' ),
            'section'  => 'about_us_section',
            'default'  => esc_html__( 'Professional photography, videography, and high-converting property presentations.', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // Powerful Marketing item 2
    new \Kirki\Field\Text(
        [
            'settings' => 'powerful_m_item_2',
            'label'    => esc_html__( 'Powerful Marketing Item 2', 'sbtech' ),
            'section'  => 'about_us_section',
            'default'  => esc_html__( 'Optimized website visibility and SEO-ready listing pages to attract organic buyers.', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // Powerful Marketing item 3
    new \Kirki\Field\Text(
        [
            'settings' => 'powerful_m_item_3',
            'label'    => esc_html__( 'Powerful Marketing Item 3 ', 'sbtech' ),
            'section'  => 'about_us_section',
            'default'  => esc_html__( 'Targeted social media campaigns across key channels to reach serious buyers fast.', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // Powerful Marketing item 4
    new \Kirki\Field\Text(
        [
            'settings' => 'powerful_m_item_4',
            'label'    => esc_html__( 'Powerful Marketing Item 4', 'sbtech' ),
            'section'  => 'about_us_section',
            'default'  => esc_html__( 'WhatsApp & email outreach to our engaged database for immediate exposure.', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // Powerful Marketing item 5
    new \Kirki\Field\Text(
        [
            'settings' => 'powerful_m_item_5',
            'label'    => esc_html__( 'Powerful Marketing Item 5 ', 'sbtech' ),
            'section'  => 'about_us_section',
            'default'  => esc_html__( 'Qualified buyer leads from portals, remarketing, and high-intent ad funnels.', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // Powerful Marketing item 6
    new \Kirki\Field\Text(
        [
            'settings' => 'powerful_m_item_6',
            'label'    => esc_html__( 'Powerful Marketing Item 6', 'sbtech' ),
            'section'  => 'about_us_section',
            'default'  => esc_html__( 'PR-ready listing assets and premium branding for stronger buyer trust.', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // Powerful Marketing item 7
    new \Kirki\Field\Text(
        [
            'settings' => 'powerful_m_item_7',
            'label'    => esc_html__( 'Powerful Marketing Item 7 ', 'sbtech' ),
            'section'  => 'about_us_section',
            'default'  => esc_html__( 'Private viewings, open houses, and guided buyer tours that convert.', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // Powerful Marketing item 8
    new \Kirki\Field\Text(
        [
            'settings' => 'powerful_m_item_8',
            'label'    => esc_html__( 'Powerful Marketing Item 8 ', 'sbtech' ),
            'section'  => 'about_us_section',
            'default'  => esc_html__( 'Dedicated support from listing to closing, with clear updates and reporting.', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // Powerful Marketing item 9
    new \Kirki\Field\Text(
        [
            'settings' => 'powerful_m_item_9',
            'label'    => esc_html__( 'Powerful Marketing Item 9', 'sbtech' ),
            'section'  => 'about_us_section',
            'default'  => esc_html__( 'Smart scheduling, follow-ups, and negotiation strategy to close faster.', 'sbtech' ),
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
       
    // careers hero title
    new \Kirki\Field\Text(
        [
            'settings' => 'careers_hero_title',
            'label'    => esc_html__( 'careers Title', 'sbtech' ),
            'section'  => 'careers_section',
            'default'  => esc_html__( 'Careers & <br>Opportunities', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // careers hero description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'careers_hero_desc',
            'label'    => esc_html__( 'careers Descripiton', 'sbtech' ),
            'section'  => 'careers_section',
            'default'  => esc_html__( 'Build your future with us. Join a dynamic team, grow your skills, and explore exciting career opportunities in a professional and supportive environment.', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // careers button text 1
    new \Kirki\Field\Text(
        [
            'settings' => 'careers_hero_btn_text_1',
            'label'    => esc_html__( 'careers Button text 1', 'sbtech' ),
            'section'  => 'careers_section',
            'default'  => esc_html__( 'View Properties', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // careers button text 2
    new \Kirki\Field\Text(
        [
            'settings' => 'careers_hero_btn_text_2',
            'label'    => esc_html__( 'careers Button text 2', 'sbtech' ),
            'section'  => 'careers_section',
            'default'  => esc_html__( 'Contact', 'sbtech' ),
            'priority' => 10,
        ]
    );
         
    // award title
    new \Kirki\Field\Text(
        [
            'settings' => 'award_title',
            'label'    => esc_html__( 'award Title', 'sbtech' ),
            'section'  => 'careers_section',
            'default'  => esc_html__( ' The Leading Real Estate Employer <span class="accent">Recognized for Excellence</span>', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // award description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'award_desc',
            'label'    => esc_html__( 'award Descripiton', 'sbtech' ),
            'section'  => 'careers_section',
            'default'  => esc_html__( 'Our workplace is built on innovation, growth, and a people-first culture. We are proud to be recognized for fostering talent, empowering careers, and creating an environment where individuals thrive and succeed together.', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // award background image
    new \Kirki\Field\Image(
        [
            'settings'    => 'award_background_img',
            'label'       => esc_html__( 'Careers award background image', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'careers_section',
            'default'     => get_template_directory_uri().'/assets/awards/PhotoshopExtension_Image.png',
        ]
    );

    // award image 1
    new \Kirki\Field\Image(
        [
            'settings'    => 'award_img_1',
            'label'       => esc_html__( 'Careers award image 1', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'careers_section',
            'default'     => get_template_directory_uri().'/assets/awards/PhotoshopExtension_Image.png',
        ]
    );
    
    // award image 1 text
    new \Kirki\Field\Textarea(
        [
            'settings' => 'award_img_1_text',
            'label'    => esc_html__( 'Careers award image 1 text', 'sbtech' ),
            'section'  => 'careers_section',
            'default'  => esc_html__( 'OBest Workplaces for Millennials', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // award image 2
    new \Kirki\Field\Image(
        [
            'settings'    => 'award_img_2',
            'label'       => esc_html__( 'Careers award image 2', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'careers_section',
            'default'     => get_template_directory_uri().'/assets/awards/PhotoshopExtension_Image.png',
        ]
    );
       
    // award image 2 text
    new \Kirki\Field\Textarea(
        [
            'settings' => 'award_img_2_text',
            'label'    => esc_html__( 'Careers award image 2 text', 'sbtech' ),
            'section'  => 'careers_section',
            'default'  => esc_html__( 'Best Workplaces — UAE 2024', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // award image 3
    new \Kirki\Field\Image(
        [
            'settings'    => 'award_img_3',
            'label'       => esc_html__( 'Careers award image 3', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'careers_section',
            'default'     => get_template_directory_uri().'/assets/awards/PhotoshopExtension_Image.png',
        ]
    );
           
    // award image 3 text
    new \Kirki\Field\Textarea(
        [
            'settings' => 'award_img_3_text',
            'label'    => esc_html__( 'Careers award image 3 text', 'sbtech' ),
            'section'  => 'careers_section',
            'default'  => esc_html__( 'Best Workplaces — UAE 2024', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // award image 4
    new \Kirki\Field\Image(
        [
            'settings'    => 'award_img_4',
            'label'       => esc_html__( 'Careers award image 4', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'careers_section',
            'default'     => get_template_directory_uri().'/assets/awards/PhotoshopExtension_Image.png',
        ]
    );
           
    // award image 4 text
    new \Kirki\Field\Textarea(
        [
            'settings' => 'award_img_4_text',
            'label'    => esc_html__( 'Careers award image 4 text', 'sbtech' ),
            'section'  => 'careers_section',
            'default'  => esc_html__( 'Best Workplaces — UAE 2024', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // award image 5
    new \Kirki\Field\Image(
        [
            'settings'    => 'award_img_5',
            'label'       => esc_html__( 'Careers award image 5', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'careers_section',
            'default'     => get_template_directory_uri().'/assets/awards/background_what.png',
        ]
    );

    // What Makes background image
    new \Kirki\Field\Image(
        [
            'settings'    => 'what_makes_background_img',
            'label'       => esc_html__( 'What Makes background image', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'careers_section',
            'default'     => get_template_directory_uri().'/assets/team_member/background_what.avif',
        ]
    );

    // What Makes team Image 1
    new \Kirki\Field\Image(
        [
            'settings'    => 'what_makes_team_1',
            'label'       => esc_html__( 'What Makes team Image 1', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'careers_section',
            'default'     => get_template_directory_uri().'/assets/team_member/1.jpg',
        ]
    );

    // What Makes team name 1
    new \Kirki\Field\Text(
        [
            'settings'    => 'what_makes_team_name_1',
            'label'       => esc_html__( 'What Makes team Name 1', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the name.', 'sbtech' ),
            'section'     => 'careers_section',
            'default'     => esc_html__( 'Aitolkyn Durimkhan', 'sbtech' ),
        ]
    );

    // What Makes team role 1
    new \Kirki\Field\Text(
        [
            'settings'    => 'what_makes_team_role_1',
            'label'       => esc_html__( 'What Makes team Role 1', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the role.', 'sbtech' ),
            'section'     => 'careers_section',
            'default'     => esc_html__( 'HR Business Partner', 'sbtech' ),
        ]
    );

    // What Makes team Image 2
    new \Kirki\Field\Image(
        [
            'settings'    => 'what_makes_team_2',
            'label'       => esc_html__( 'What Makes team Image 2', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'careers_section',
            'default'     => get_template_directory_uri().'/assets/team_member/2.jpg',
        ]
    );
    
    // What Makes team name 2
    new \Kirki\Field\Text(
        [
            'settings'    => 'what_makes_team_name_2',
            'label'       => esc_html__( 'What Makes team Name 2', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the name.', 'sbtech' ),
            'section'     => 'careers_section',
            'default'     => esc_html__( 'Michael Stone', 'sbtech' ),
        ]
    );

    // What Makes team role 2
    new \Kirki\Field\Text(
        [
            'settings'    => 'what_makes_team_role_2',
            'label'       => esc_html__( 'What Makes team Role 2', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the role.', 'sbtech' ),
            'section'     => 'careers_section',
            'default'     => esc_html__( 'Operations Lead', 'sbtech' ),
        ]
    );

    // What Makes team Image 3
    new \Kirki\Field\Image(
        [
            'settings'    => 'what_makes_team_3',
            'label'       => esc_html__( 'What Makes team Image 3', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'careers_section',
            'default'     => get_template_directory_uri().'/assets/team_member/3.jpg',
        ]
    );
    
    // What Makes team name 3
    new \Kirki\Field\Text(
        [
            'settings'    => 'what_makes_team_name_3',
            'label'       => esc_html__( 'What Makes team Name 3', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the name.', 'sbtech' ),
            'section'     => 'careers_section',
            'default'     => esc_html__( 'Sarah Johnson', 'sbtech' ),
        ]
    );

    // What Makes team role 3
    new \Kirki\Field\Text(
        [
            'settings'    => 'what_makes_team_role_3',
            'label'       => esc_html__( 'What Makes team Role 3', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the role.', 'sbtech' ),
            'section'     => 'careers_section',
            'default'     => esc_html__( 'Operations Lead', 'sbtech' ),
        ]
    );

    // What Makes team Image 4
    new \Kirki\Field\Image(
        [
            'settings'    => 'what_makes_team_4',
            'label'       => esc_html__( 'What Makes team Image 4', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'careers_section',
            'default'     => get_template_directory_uri().'/assets/team_member/4.jpg',
        ]
    );
    
    // What Makes team name 4
    new \Kirki\Field\Text(
        [
            'settings'    => 'what_makes_team_name_4',
            'label'       => esc_html__( 'What Makes team Name 4', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the name.', 'sbtech' ),
            'section'     => 'careers_section',
            'default'     => esc_html__( 'David Wilson', 'sbtech' ),
        ]
    );

    // What Makes team role 4
    new \Kirki\Field\Text(
        [
            'settings'    => 'what_makes_team_role_4',
            'label'       => esc_html__( 'What Makes team Role 4', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the role.', 'sbtech' ),
            'section'     => 'careers_section',
            'default'     => esc_html__( 'Operations Lead', 'sbtech' ),
        ]
    );

    // What Makes team Image 5
    new \Kirki\Field\Image(
        [
            'settings'    => 'what_makes_team_5',
            'label'       => esc_html__( 'What Makes team Image 5', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'careers_section',
            'default'     => get_template_directory_uri().'/assets/team_member/5.jpg',
        ]
    );
    
    // What Makes team name 5
    new \Kirki\Field\Text(
        [
            'settings'    => 'what_makes_team_name_5',
            'label'       => esc_html__( 'What Makes team Name 5', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the name.', 'sbtech' ),
            'section'     => 'careers_section',
            'default'     => esc_html__( 'Lisa Anderson', 'sbtech' ),
        ]
    );

    // What Makes team role 5
    new \Kirki\Field\Text(
        [
            'settings'    => 'what_makes_team_role_5',
            'label'       => esc_html__( 'What Makes team Role 5', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the role.', 'sbtech' ),
            'section'     => 'careers_section',
            'default'     => esc_html__( 'Operations Lead', 'sbtech' ),
        ]
    );

    // What Makes team Image 6
    new \Kirki\Field\Image(
        [
            'settings'    => 'what_makes_team_6',
            'label'       => esc_html__( 'What Makes team Image 6', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'careers_section',
            'default'     => get_template_directory_uri().'/assets/team_member/6.jpg',
        ]
    );
    
    // What Makes team name 6
    new \Kirki\Field\Text(
        [
            'settings'    => 'what_makes_team_name_6',
            'label'       => esc_html__( 'What Makes team Name 6', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the name.', 'sbtech' ),
            'section'     => 'careers_section',
            'default'     => esc_html__( 'Michael Stone', 'sbtech' ),
        ]
    );

    // What Makes team role 6
    new \Kirki\Field\Text(
        [
            'settings'    => 'what_makes_team_role_6',
            'label'       => esc_html__( 'What Makes team Role 6', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the role.', 'sbtech' ),
            'section'     => 'careers_section',
            'default'     => esc_html__( 'Operations Lead', 'sbtech' ),
        ]
    );

    //What Makes area video url
    new \Kirki\Field\URL(
        [
            'settings' => 'what_makes_video_url',
            'label'    => esc_html__( 'What Makes Video URL', 'sbtech' ),
            'section'  => 'careers_section',
            'default'  => 'https://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=1',
            'priority' => 10,
        ]
    );
            
    // What Makes area subtitle
    new \Kirki\Field\text(
        [
            'settings' => 'what_makes_subtitle',
            'label'    => esc_html__( 'What Makes area Subtitle', 'sbtech' ),
            'section'  => 'careers_section',
            'default'  => esc_html__( 'Inspiring People. Stronger Culture.', 'sbtech' ),
            'priority' => 10,
        ]
    );
            
    // What Makes area title
    new \Kirki\Field\text(
        [
            'settings' => 'what_makes_title',
            'label'    => esc_html__( 'What Makes area title', 'sbtech' ),
            'section'  => 'careers_section',
            'default'  => esc_html__( 'What Makes CBA Real Estate <br>A Great Place To Work?', 'sbtech' ),
            'priority' => 10,
        ]
    );
            
    // What Makes area description
    new \Kirki\Field\textarea(
        [
            'settings' => 'what_makes_desc',
            'label'    => esc_html__( 'What Makes area Description', 'sbtech' ),
            'section'  => 'careers_section',
            'default'  => esc_html__( 'Meet the people behind our culture. Passionate professionals, bold thinkers, and a team that makes work feel meaningful every single day.', 'sbtech' ),
            'priority' => 10,
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
             
    // Our team title
    new \Kirki\Field\text(
        [
            'settings' => 'our_team_title',
            'label'    => esc_html__( 'Our Team Title', 'sbtech' ),
            'section'  => 'careers_section',
            'default'  => esc_html__( 'Our Amazing Team', 'sbtech' ),
            'priority' => 10,
        ]
    );
             
    // Our team description
    new \Kirki\Field\textarea(
        [
            'settings' => 'our_team_description',
            'label'    => esc_html__( 'Our Team Description', 'sbtech' ),
            'section'  => 'careers_section',
            'default'  => esc_html__( 'A glimpse into our culture—team achievements, events, and the people who make everything possible.', 'sbtech' ),
            'priority' => 10,
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
                 
    // faq title
    new \Kirki\Field\text(
        [
            'settings' => 'faq_title',
            'label'    => esc_html__( 'FAQ Title', 'sbtech' ),
            'section'  => 'careers_section',
            'default'  => esc_html__( 'Join Our Team & Build Your Future With Us', 'sbtech' ),
            'priority' => 10,
        ]
    );
                 
    // faq description
    new \Kirki\Field\text(
        [
            'settings' => 'faq_description',
            'label'    => esc_html__( 'FAQ Description', 'sbtech' ),
            'section'  => 'careers_section',
            'default'  => esc_html__( 'We are always looking for passionate, talented, and driven individuals who are ready to grow and make an impact. At our company, you’ll work in a dynamic environment where innovation, collaboration, and professional development are at the core of everything we do.', 'sbtech' ),
            'priority' => 10,
        ]
    );
 
    // reapeater
    new \Kirki\Field\Repeater(
        [
            'settings'     => 'repeater_careers_page_faq',
            'label'        => esc_html__( 'Repeater Control', 'sbtech' ),
            'section'      => 'careers_section',
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
               
    // Hear from our team title
    new \Kirki\Field\text(
        [
            'settings' => 'hear_from_our_team_title',
            'label'    => esc_html__( 'Hear from Our Team Title', 'sbtech' ),
            'section'  => 'careers_section',
            'default'  => esc_html__( 'Hear from our team', 'sbtech' ),
            'priority' => 10,
        ]
    );
               
    // Hear from our team description
    new \Kirki\Field\text(
        [
            'settings' => 'hear_from_our_team_description',
            'label'    => esc_html__( 'Hear from Our Team Description', 'sbtech' ),
            'section'  => 'careers_section',
            'default'  => esc_html__( 'Real stories from the people behind our success—collaboration, growth, and a culture that supports you.', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // hear from our team reapeater
    new \Kirki\Field\Repeater(
        [
            'settings'     => 'repeater_careers_here_from_our_team',
            'label'        => esc_html__( 'Repeater Control', 'sbtech' ),
            'section'      => 'careers_section',
            'priority'     => 10,
            'row_label'    => [
                'type'  => 'field',
                'value' => esc_html__( 'Your Custom Value', 'sbtech' ),
                'field' => 'link_text',
            ],
            'button_label' => esc_html__( '"Add new" button label (optional) ', 'sbtech' ),
            'default'      => [
                [
                    'faq_review'   => esc_html__( 'review', 'sbtech' ),
                    'faq_name'   => esc_html__( 'name', 'sbtech' ),
                    'faq_role'   => esc_html__( 'role', 'sbtech' ),
                    'faq_image'   => esc_html__( 'image', 'sbtech' ),
                ],
            ],
            'fields'       => [
                'faq_review'   => [
                    'type'        => 'text',
                    'label'       => esc_html__( 'Faq Question', 'sbtech' ),
                    'description' => esc_html__( 'Description', 'sbtech' ),
                    'default'     => '',
                ],
                'faq_name'   => [
                    'type'        => 'text',
                    'label'       => esc_html__( 'Faq Name', 'sbtech' ),
                    'description' => esc_html__( 'Description', 'sbtech' ),
                    'default'     => '',
                ],
                'faq_role'   => [
                    'type'        => 'text',
                    'label'       => esc_html__( 'Faq Role', 'sbtech' ),
                    'description' => esc_html__( 'Description', 'sbtech' ),
                    'default'     => '',
                ],
                'faq_image'   => [
                    'type'        => 'image',
                    'label'       => esc_html__( 'Faq Image', 'sbtech' ),
                    'description' => esc_html__( 'Description', 'sbtech' ),
                    'default'     => '',
                ],
            ],
        ]
    );

                  
    // career form title
    new \Kirki\Field\text(
        [
            'settings' => 'career_form_title',
            'label'    => esc_html__( 'Career Form Title', 'sbtech' ),
            'section'  => 'careers_section',
            'default'  => esc_html__( 'Apply for a Position', 'sbtech' ),
            'priority' => 10,
        ]
    );
               
    // career form description
    new \Kirki\Field\text(
        [
            'settings' => 'career_form_description',
            'label'    => esc_html__( 'Career Form Description', 'sbtech' ),
            'section'  => 'careers_section',
            'default'  => esc_html__( 'Submit your application and upload your CV. Our team will review and contact shortlisted candidates.', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // reapeater career positon add
    new \Kirki\Field\Repeater(
        [
            'settings'     => 'repeater_career_position_add',
            'label'        => esc_html__( 'Repeater Control', 'sbtech' ),
            'section'      => 'careers_section',
            'priority'     => 10,
            'row_label'    => [
                'type'  => 'field',
                'value' => esc_html__( 'Your Custom Value', 'sbtech' ),
                'field' => 'link_text',
            ],
            'button_label' => esc_html__( '"Add new" button label (optional) ', 'sbtech' ),
            'default'      => [
                [
                    'career_position'   => esc_html__( 'position', 'sbtech' ),
                ],
            ],
            'fields'       => [
                'career_position'   => [
                    'type'        => 'text',
                    'label'       => esc_html__( 'Career Position', 'sbtech' ),
                    'description' => esc_html__( 'Description', 'sbtech' ),
                    'default'     => '',
                ],
            ],
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
        
    // contact us hero title
    new \Kirki\Field\Text(
        [
            'settings' => 'Contact_us_hero_title',
            'label'    => esc_html__( 'Contact Us Title', 'sbtech' ),
            'section'  => 'Contact_us_section',
            'default'  => esc_html__( 'Get in Touch with  <br>CBA Real Estate', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // contact us hero description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'Contact_us_hero_desc',
            'label'    => esc_html__( 'Contact Us Description', 'sbtech' ),
            'section'  => 'Contact_us_section',
            'default'  => esc_html__( 'Have a question about buying, selling, renting, or new projects in Dubai? Send us a message and our team will get back to you quickly with the right guidance and next steps.', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // contact us button text 1
    new \Kirki\Field\Text(
        [
            'settings' => 'Contact_us_btn_text_1',
            'label'    => esc_html__( 'Contact Us Button text 1', 'sbtech' ),
            'section'  => 'Contact_us_section',
            'default'  => esc_html__( 'View Properties', 'sbtech' ),
            'priority' => 10,
        ]
    );
        
    // contact us form title
    new \Kirki\Field\Text(
        [
            'settings' => 'Contact_us_form_title',
            'label'    => esc_html__( 'Contact Us Form Title', 'sbtech' ),
            'section'  => 'Contact_us_section',
            'default'  => esc_html__( 'Contact us', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // contact us form description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'Contact_us_form_desc',
            'label'    => esc_html__( 'Contact Us Form Description', 'sbtech' ),
            'section'  => 'Contact_us_section',
            'default'  => esc_html__( 'Have a question about buying, selling, renting, or new projects in Dubai? Send us a message and our team will get back to you quickly with the right guidance and next steps.', 'sbtech' ),
            'priority' => 10,
        ]
    );
     
    // reapeater contact us form property type
    new \Kirki\Field\Repeater(
        [
            'settings'     => 'repeater_contact_us_form_property_type',
            'label'        => esc_html__( 'Repeater Control', 'sbtech' ),
            'section'      => 'Contact_us_section',
            'priority'     => 10,
            'row_label'    => [
                'type'  => 'field',
                'value' => esc_html__( 'Your Custom Value', 'sbtech' ),
                'field' => 'link_text',
            ],
            'button_label' => esc_html__( '"Add new" button label (optional) ', 'sbtech' ),
            'default'      => [
                [
                    'property_type'   => esc_html__( 'type', 'sbtech' ),
                ],
            ],
            'fields'       => [
                'property_type'   => [
                    'type'        => 'text',
                    'label'       => esc_html__( 'Property Type', 'sbtech' ),
                    'description' => esc_html__( 'Description', 'sbtech' ),
                    'default'     => '',
                ],
            ],
        ]
    );
     
    // reapeater contact us form area
    new \Kirki\Field\Repeater(
        [
            'settings'     => 'repeater_contact_us_form_area',
            'label'        => esc_html__( 'Repeater Control', 'sbtech' ),
            'section'      => 'Contact_us_section',
            'priority'     => 10,
            'row_label'    => [
                'type'  => 'field',
                'value' => esc_html__( 'Your Custom Value', 'sbtech' ),
                'field' => 'link_text',
            ],
            'button_label' => esc_html__( '"Add new" button label (optional) ', 'sbtech' ),
            'default'      => [
                [
                    'property_area'   => esc_html__( 'area', 'sbtech' ),
                ],
            ],
            'fields'       => [
                'property_area'   => [
                    'type'        => 'text',
                    'label'       => esc_html__( 'Property Area', 'sbtech' ),
                    'description' => esc_html__( 'Description', 'sbtech' ),
                    'default'     => '',
                ],
            ],
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
         
    // complaints hero title
    new \Kirki\Field\Text(
        [
            'settings' => 'complaints_procedure_hero_title',
            'label'    => esc_html__( 'Complaints Procedure Title', 'sbtech' ),
            'section'  => 'complaints_procedure_section',
            'default'  => esc_html__( 'Get in Touch with  <br>CBA Real Estate', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // complaints hero description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'complaints_procedure_hero_desc',
            'label'    => esc_html__( 'Complaints Procedure Description', 'sbtech' ),
            'section'  => 'complaints_procedure_section',
            'default'  => esc_html__( 'Have a question about buying, selling, renting, or new projects in Dubai? Send us a message and our team will get back to you quickly with the right guidance and next steps.', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // complaints button text 1
    new \Kirki\Field\Text(
        [
            'settings' => 'complaints_procedure_btn_text_1',
            'label'    => esc_html__( 'Complaints Procedure Button text 1', 'sbtech' ),
            'section'  => 'complaints_procedure_section',
            'default'  => esc_html__( 'View Properties', 'sbtech' ),
            'priority' => 10,
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
   
    // complaints form title
    new \Kirki\Field\Text(
        [
            'settings' => 'complaints_procedure_form_title',
            'label'    => esc_html__( 'Form Title', 'sbtech' ),
            'section'  => 'complaints_procedure_section',
            'default'  => esc_html__( 'Making a Complaint', 'sbtech' ),
            'priority' => 10,
        ]
    );
   
    // complaints form description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'complaints_procedure_form_desc',
            'label'    => esc_html__( 'Form Description', 'sbtech' ),
            'section'  => 'complaints_procedure_section',
            'default'  => esc_html__( 'At CBA Real Estate, we value your experience and are committed to resolving concerns promptly and professionally. Please complete the form below with as much detail as possible so our team can assist you efficiently.', 'sbtech' ),
            'priority' => 10,
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
            'label'    => esc_html__( 'For Career form/Career button form', 'sbtech' ),
            'section'  => 'complaints_procedure_section',
            'default'  => esc_html__( 'care@cbaestate.com', 'sbtech' ),
            'priority' => 10,
        ]
    );
     
    // reapeater Preferred Language add
    new \Kirki\Field\Repeater(
        [
            'settings'     => 'repeater_preferred_language_add',
            'label'        => esc_html__( 'Repeater Control', 'sbtech' ),
            'section'      => 'complaints_procedure_section',
            'priority'     => 10,
            'row_label'    => [
                'type'  => 'field',
                'value' => esc_html__( 'Your Custom Value', 'sbtech' ),
                'field' => 'link_text',
            ],
            'button_label' => esc_html__( '"Add new" button label (optional) ', 'sbtech' ),
            'default'      => [
                [
                    'preferred_language'   => esc_html__( 'language', 'sbtech' ),
                ],
            ],
            'fields'       => [
                'preferred_language'   => [
                    'type'        => 'text',
                    'label'       => esc_html__( 'Preferred Language', 'sbtech' ),
                    'description' => esc_html__( 'Description', 'sbtech' ),
                    'default'     => '',
                ],
            ],
        ]
    );

}
sbtech_complaints_procedure();

//Meet the Team section
function sbtech_meet_the_team(){

    // Header section
    new \Kirki\Section(
	'meet_the_team_section',
        [
            'title'       => esc_html__( 'Meet the Team pages', 'sbtech' ),
            'description' => esc_html__( 'Meet the Team pages', 'sbtech' ),
            'panel'       => 'sbtech_panel',
            'priority'    => 160,
        ]
    );
       
    // Meet the team title
    new \Kirki\Field\Text(
        [
            'settings' => 'meet_the_team_title',
            'label'    => esc_html__( 'Meet the team Title', 'sbtech' ),
            'section'  => 'meet_the_team_section',
            'default'  => esc_html__( 'Meet the Team', 'sbtech' ),
            'priority' => 10,
        ]
    );
       
    // Meet the team descripiton
    new \Kirki\Field\Textarea(
        [
            'settings' => 'meet_the_team_desc',
            'label'    => esc_html__( 'Meet the team Description', 'sbtech' ),
            'section'  => 'meet_the_team_section',
            'default'  => esc_html__( 'Find the right agent based on name, language, and nationality. Suggestions come directly from your database.', 'sbtech' ),
            'priority' => 10,
        ]
    );
}
sbtech_meet_the_team();


//testimonial section
function sbtech_testimonial(){

    // Header section
    new \Kirki\Section(
	'testimonial_section',
        [
            'title'       => esc_html__( 'Testimonial pages', 'sbtech' ),
            'description' => esc_html__( 'Testimonial pages', 'sbtech' ),
            'panel'       => 'sbtech_panel',
            'priority'    => 160,
        ]
    );
       
    // Testimonial title
    new \Kirki\Field\Text(
        [
            'settings' => 'testimonial_title',
            'label'    => esc_html__( 'Testimonial Title', 'sbtech' ),
            'section'  => 'testimonial_section',
            'default'  => esc_html__( 'Why Our Clients Trust Us', 'sbtech' ),
            'priority' => 10,
        ]
    );
       
    // testimonial descripiton
    new \Kirki\Field\Textarea(
        [
            'settings' => 'testimonial_desc',
            'label'    => esc_html__( 'Testimonial Description', 'sbtech' ),
            'section'  => 'testimonial_section',
            'default'  => esc_html__( 'Hear directly from our clients about their experience working with our team. Real feedback, trusted results, and proven satisfaction that reflect our commitment to delivering reliable and professional property services.', 'sbtech' ),
            'priority' => 10,
        ]
    );
}
sbtech_testimonial();

// home page filter bg image
function sbtech_filter_bg_image(){

    // Header section
    new \Kirki\Section(
	'sbtech_filter_bg_image',
        [
            'title'       => esc_html__( 'Filter background image ', 'sbtech' ),
            'description' => esc_html__( 'Filter background image', 'sbtech' ),
            'panel'       => 'sbtech_panel',
            'priority'    => 160,
        ]
    );

    // Hero bg image
    new \Kirki\Field\Image(
        [
            'settings'    => 'home_img_1',
            'label'       => esc_html__( 'Home page background image 1', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'sbtech_filter_bg_image',
            'default'     => get_template_directory_uri().'/assets/filter_bg_image/ahmed-galal-o27Syy2u6wU-unsplash.jpg',
        ]
    );

    new \Kirki\Field\Image(
        [
            'settings'    => 'home_img_2',
            'label'       => esc_html__( 'Home page background image 2', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'sbtech_filter_bg_image',
            'default'     => get_template_directory_uri().'/assets/filter_bg_image/anubhav-sonker-jIImBrmMpsE-unsplash.jpg',
        ]
    );

    new \Kirki\Field\Image(
        [
            'settings'    => 'home_img_3',
            'label'       => esc_html__( 'Home page background image 3', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'sbtech_filter_bg_image',
            'default'     => get_template_directory_uri().'/assets/filter_bg_image/farhan-khan-CFbVdWD1RiI-unsplash.jpg',
        ]
    );

    new \Kirki\Field\Image(
        [
            'settings'    => 'home_img_4',
            'label'       => esc_html__( 'Home page background image 4', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'sbtech_filter_bg_image',
            'default'     => get_template_directory_uri().'/assets/filter_bg_image/ft-shafi-1OBRQpOLeY8-unsplash.jpg',
        ]
    );

    new \Kirki\Field\Image(
        [
            'settings'    => 'home_img_5',
            'label'       => esc_html__( 'Home page background image 5', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'sbtech_filter_bg_image',
            'default'     => get_template_directory_uri().'/assets/filter_bg_image/ionut-ciortea-qOKwIef01BA-unsplash.jpg',
        ]
    );

    new \Kirki\Field\Image(
        [
            'settings'    => 'home_img_6',
            'label'       => esc_html__( 'Home page background image 6', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'sbtech_filter_bg_image',
            'default'     => get_template_directory_uri().'/assets/filter_bg_image/kent-tupas-2jfZ2Vj06sk-unsplash.jpg',
        ]
    );

    new \Kirki\Field\Image(
        [
            'settings'    => 'home_img_7',
            'label'       => esc_html__( 'Home page background image 7', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'sbtech_filter_bg_image',
            'default'     => get_template_directory_uri().'/assets/filter_bg_image/ionut-ciortea-qOKwIef01BA-unsplash.jpg',
        ]
    );

    // buy page filter image
    new \Kirki\Field\Image(
        [
            'settings'    => 'buy_img_1',
            'label'       => esc_html__( 'Buy page Filter background image 1', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'sbtech_filter_bg_image',
            'default'     => get_template_directory_uri().'/assets/filter_bg_image/nelemson-guevarra-3Pu21dk2e1Y-unsplash.jpg',
        ]
    );
    
    new \Kirki\Field\Image(
        [
            'settings'    => 'buy_img_2',
            'label'       => esc_html__( 'Buy page Filter background image 2', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'sbtech_filter_bg_image',
            'default'     => get_template_directory_uri().'/assets/filter_bg_image/nelemson-guevarra-eCS02JdJBuI-unsplash.jpg',
        ]
    );

    new \Kirki\Field\Image(
        [
            'settings'    => 'buy_img_3',
            'label'       => esc_html__( 'Buy page Filter background image 3', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'sbtech_filter_bg_image',
            'default'     => get_template_directory_uri().'/assets/filter_bg_image/riyas-mohammed-syA-NZnb2pA-unsplash.jpg',
        ]
    );

    new \Kirki\Field\Image(
        [
            'settings'    => 'buy_img_4',
            'label'       => esc_html__( 'Buy page Filter background image 4', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'sbtech_filter_bg_image',
            'default'     => get_template_directory_uri().'/assets/filter_bg_image/shibin-joseph-GsTqt8M0fls-unsplash.jpg',
        ]
    );

    new \Kirki\Field\Image(
        [
            'settings'    => 'buy_img_5',
            'label'       => esc_html__( 'Buy page Filter background image 5', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'sbtech_filter_bg_image',
            'default'     => get_template_directory_uri().'/assets/filter_bg_image/shibin-joseph-yP8oPC3_v38-unsplash.jpg',
        ]
    );

    new \Kirki\Field\Image(
        [
            'settings'    => 'buy_img_6',
            'label'       => esc_html__( 'Buy page Filter background image 6', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'sbtech_filter_bg_image',
            'default'     => get_template_directory_uri().'/assets/filter_bg_image/thomas-haas-wfANLGIhOtM-unsplash.jpg',
        ]
    );

    new \Kirki\Field\Image(
        [
            'settings'    => 'buy_img_7',
            'label'       => esc_html__( 'Buy page Filter background image 7', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'sbtech_filter_bg_image',
            'default'     => get_template_directory_uri().'/assets/filter_bg_image/upscalemedia-transformed.jpg',
        ]
    );

    new \Kirki\Field\Image(
        [
            'settings'    => 'buy_img_8',
            'label'       => esc_html__( 'Buy page Filter background image 8', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'sbtech_filter_bg_image',
            'default'     => get_template_directory_uri().'/assets/filter_bg_image/wmremove-transformed.jpg',
        ]
    );

    // rent page filter image
    new \Kirki\Field\Image(
        [
            'settings'    => 'rent_img_1',
            'label'       => esc_html__( 'Rent page Filter background image 1', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'sbtech_filter_bg_image',
            'default'     => get_template_directory_uri().'/assets/filter_bg_image/nelemson-guevarra-3Pu21dk2e1Y-unsplash.jpg',
        ]
    );
    
    new \Kirki\Field\Image(
        [
            'settings'    => 'rent_img_2',
            'label'       => esc_html__( 'Rent page Filter background image 2', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'sbtech_filter_bg_image',
            'default'     => get_template_directory_uri().'/assets/filter_bg_image/nelemson-guevarra-eCS02JdJBuI-unsplash.jpg',
        ]
    );

    new \Kirki\Field\Image(
        [
            'settings'    => 'rent_img_3',
            'label'       => esc_html__( 'Rent page Filter background image 3', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'sbtech_filter_bg_image',
            'default'     => get_template_directory_uri().'/assets/filter_bg_image/riyas-mohammed-syA-NZnb2pA-unsplash.jpg',
        ]
    );

    new \Kirki\Field\Image(
        [
            'settings'    => 'rent_img_4',
            'label'       => esc_html__( 'Rent page Filter background image 4', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'sbtech_filter_bg_image',
            'default'     => get_template_directory_uri().'/assets/filter_bg_image/shibin-joseph-GsTqt8M0fls-unsplash.jpg',
        ]
    );

    new \Kirki\Field\Image(
        [
            'settings'    => 'rent_img_5',
            'label'       => esc_html__( 'Rent page Filter background image 5', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'sbtech_filter_bg_image',
            'default'     => get_template_directory_uri().'/assets/filter_bg_image/shibin-joseph-yP8oPC3_v38-unsplash.jpg',
        ]
    );

    new \Kirki\Field\Image(
        [
            'settings'    => 'rent_img_6',
            'label'       => esc_html__( 'Rent page Filter background image 6', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'sbtech_filter_bg_image',
            'default'     => get_template_directory_uri().'/assets/filter_bg_image/thomas-haas-wfANLGIhOtM-unsplash.jpg',
        ]
    );

    new \Kirki\Field\Image(
        [
            'settings'    => 'rent_img_7',
            'label'       => esc_html__( 'Rent page Filter background image 7', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'sbtech_filter_bg_image',
            'default'     => get_template_directory_uri().'/assets/filter_bg_image/upscalemedia-transformed.jpg',
        ]
    );

    new \Kirki\Field\Image(
        [
            'settings'    => 'rent_img_8',
            'label'       => esc_html__( 'Rent page Filter background image 8', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'sbtech_filter_bg_image',
            'default'     => get_template_directory_uri().'/assets/filter_bg_image/wmremove-transformed.jpg',
        ]
    );

    // rent page filter image
    new \Kirki\Field\Image(
        [
            'settings'    => 'commercial_img_1',
            'label'       => esc_html__( 'Rent page Filter background image 1', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'sbtech_filter_bg_image',
            'default'     => get_template_directory_uri().'/assets/filter_bg_image/nelemson-guevarra-3Pu21dk2e1Y-unsplash.jpg',
        ]
    );
    
    new \Kirki\Field\Image(
        [
            'settings'    => 'commercial_img_2',
            'label'       => esc_html__( 'Rent page Filter background image 2', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'sbtech_filter_bg_image',
            'default'     => get_template_directory_uri().'/assets/filter_bg_image/nelemson-guevarra-eCS02JdJBuI-unsplash.jpg',
        ]
    );

    new \Kirki\Field\Image(
        [
            'settings'    => 'commercial_img_3',
            'label'       => esc_html__( 'Rent page Filter background image 3', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'sbtech_filter_bg_image',
            'default'     => get_template_directory_uri().'/assets/filter_bg_image/riyas-mohammed-syA-NZnb2pA-unsplash.jpg',
        ]
    );

    new \Kirki\Field\Image(
        [
            'settings'    => 'commercial_img_4',
            'label'       => esc_html__( 'Rent page Filter background image 4', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'sbtech_filter_bg_image',
            'default'     => get_template_directory_uri().'/assets/filter_bg_image/shibin-joseph-GsTqt8M0fls-unsplash.jpg',
        ]
    );

    new \Kirki\Field\Image(
        [
            'settings'    => 'commercial_img_5',
            'label'       => esc_html__( 'Rent page Filter background image 5', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'sbtech_filter_bg_image',
            'default'     => get_template_directory_uri().'/assets/filter_bg_image/shibin-joseph-yP8oPC3_v38-unsplash.jpg',
        ]
    );

    new \Kirki\Field\Image(
        [
            'settings'    => 'commercial_img_6',
            'label'       => esc_html__( 'Rent page Filter background image 6', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'sbtech_filter_bg_image',
            'default'     => get_template_directory_uri().'/assets/filter_bg_image/thomas-haas-wfANLGIhOtM-unsplash.jpg',
        ]
    );

    new \Kirki\Field\Image(
        [
            'settings'    => 'commercial_img_7',
            'label'       => esc_html__( 'Rent page Filter background image 7', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'sbtech_filter_bg_image',
            'default'     => get_template_directory_uri().'/assets/filter_bg_image/upscalemedia-transformed.jpg',
        ]
    );

    new \Kirki\Field\Image(
        [
            'settings'    => 'commercial_img_8',
            'label'       => esc_html__( 'Rent page Filter background image 8', 'sbtech' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'sbtech' ),
            'section'     => 'sbtech_filter_bg_image',
            'default'     => get_template_directory_uri().'/assets/filter_bg_image/wmremove-transformed.jpg',
        ]
    );
}

sbtech_filter_bg_image();


// Sbtech services form
function sbtech_sercices_form(){

    // Header section
    new \Kirki\Section(
	'sbtech_sercices_form_section',
        [
            'title'       => esc_html__( 'Sbtech services form', 'sbtech' ),
            'description' => esc_html__( 'Sbtech services form', 'sbtech' ),
            'panel'       => 'sbtech_panel',
            'priority'    => 160,
        ]
    );

    // services page contact form design 

    // form left site title
    new \Kirki\Field\Text(
        [
            'settings' => 'fls_title',
            'label'    => esc_html__( 'Form left site title', 'sbtech' ),
            'section'  => 'sbtech_sercices_form_section',
            'default'  => esc_html__( 'Contact Us', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // form left site desc
    new \Kirki\Field\Text(
        [
            'settings' => 'fls_desc',
            'label'    => esc_html__( 'Form left site Description', 'sbtech' ),
            'section'  => 'sbtech_sercices_form_section',
            'default'  => esc_html__( 'Premium Properties — quick response & professional support.', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // form left email
    new \Kirki\Field\Text(
        [
            'settings' => 'fls_email',
            'label'    => esc_html__( 'Form left site Email', 'sbtech' ),
            'section'  => 'sbtech_sercices_form_section',
            'default'  => esc_html__( 'hello@cbaestate.com', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // form left Phone
    new \Kirki\Field\Text(
        [
            'settings' => 'fls_phone',
            'label'    => esc_html__( 'Form left site Phone', 'sbtech' ),
            'section'  => 'sbtech_sercices_form_section',
            'default'  => esc_html__( '+97144286151', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // form left address
    new \Kirki\Field\Text(
        [
            'settings' => 'fls_address',
            'label'    => esc_html__( 'Form left site Address', 'sbtech' ),
            'section'  => 'sbtech_sercices_form_section',
            'default'  => esc_html__( 'DAMAC Smart Heights - Office 1205 - Al Thanyah First - Barsha Heights - Dubai', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // form Right site title
    new \Kirki\Field\Text(
        [
            'settings' => 'frs_title',
            'label'    => esc_html__( 'Form Right site title', 'sbtech' ),
            'section'  => 'sbtech_sercices_form_section',
            'default'  => esc_html__( 'Get A Free Consultation', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // form Right site desc
    new \Kirki\Field\Text(
        [
            'settings' => 'frs_desc',
            'label'    => esc_html__( 'Form Right site Description', 'sbtech' ),
            'section'  => 'sbtech_sercices_form_section',
            'default'  => esc_html__( 'Ready for your new home? Send us a message.', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // form Right site checkbox text
    new \Kirki\Field\Text(
        [
            'settings' => 'frs_checkbox_text',
            'label'    => esc_html__( 'Form Right site checkbox text', 'sbtech' ),
            'section'  => 'sbtech_sercices_form_section',
            'default'  => esc_html__( 'I agree to receive information about offers, deals and services (optional).', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // form Right site desc
    new \Kirki\Field\Text(
        [
            'settings' => 'frs_btn_text',
            'label'    => esc_html__( 'Form Right site Button text', 'sbtech' ),
            'section'  => 'sbtech_sercices_form_section',
            'default'  => esc_html__( 'Property Inquiry', 'sbtech' ),
            'priority' => 10,
        ]
    );
}
sbtech_sercices_form();


// terms and conditions section
function sbtech_term_and_condition(){

    // Header section
    new \Kirki\Section(
	'term_and_condition_section',
        [
            'title'       => esc_html__( 'Terms and Conditions', 'sbtech' ),
            'description' => esc_html__( 'Terms and Conditions', 'sbtech' ),
            'panel'       => 'sbtech_panel',
            'priority'    => 160,
        ]
    );
    
    // term and condition hero title
    new \Kirki\Field\Text(
        [
            'settings' => 'term_and_condition_hero_title',
            'label'    => esc_html__( 'Terms and Conditions Title', 'sbtech' ),
            'section'  => 'term_and_condition_section',
            'default'  => esc_html__( 'Terms & Conditions', 'sbtech' ),
            'priority' => 10,
        ]
    );

    // hero description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'term_and_condition_hero_desc',
            'label'    => esc_html__( 'Terms and Conditions Description', 'sbtech' ),
            'section'  => 'term_and_condition_section',
            'default'  => esc_html__( 'Please read these terms and conditions carefully before using our website and services. By accessing our platform, you agree to comply with the following terms.', 'sbtech' ),
            'priority' => 10,
        ]
    );

    
    // reapeater
    new \Kirki\Field\Repeater(
        [
            'settings'     => 'repeater_term_and_condition',
            'label'        => esc_html__( 'Repeater Control', 'sbtech' ),
            'section'      => 'term_and_condition_section',
            'priority'     => 10,
            'row_label'    => [
                'type'  => 'field',
                'value' => esc_html__( 'Your Custom Value', 'sbtech' ),
                'field' => 'link_text',
            ],
            'button_label' => esc_html__( '"Add new" button label (optional) ', 'sbtech' ),
            'default'      => [
                [
                    'title'   => esc_html__( 'Title', 'sbtech' ),
                    'description'   => esc_html__( 'Description', 'sbtech' ),
                ],
            ],
            'fields'       => [
                'title'   => [
                    'type'        => 'text',
                    'label'       => esc_html__( 'Title', 'sbtech' ),
                    'description' => esc_html__( 'Description', 'sbtech' ),
                    'default'     => '',
                ],
                'description'   => [
                    'type'        => 'text',
                    'label'       => esc_html__( 'Description', 'sbtech' ),
                    'description' => esc_html__( 'Description', 'sbtech' ),
                    'default'     => '',
                ],
            ],
        ]
    );

}
sbtech_term_and_condition();

// Proverty new address added section start
function sbtech_property_new_address(){

    // property new address section
    new \Kirki\Section(
	'property_new_address_section',
        [
            'title'       => esc_html__( 'Property New Address', 'sbtech' ),
            'description' => esc_html__( 'Property New Address', 'sbtech' ),
            'panel'       => 'sbtech_panel',
            'priority'    => 160,
        ]
    );
        
        
    // reapeater property address
    new \Kirki\Field\Repeater(
        [
            'settings'     => 'repeater_property_address',
            'label'        => esc_html__( 'Repeater Control', 'sbtech' ),
            'section'      => 'property_new_address_section',
            'priority'     => 10,
            'row_label'    => [
                'type'  => 'field',
                'value' => esc_html__( 'Your Custom Value', 'sbtech' ),
                'field' => 'link_text',
            ],
            'button_label' => esc_html__( '"Add new" button label (optional) ', 'sbtech' ),
            'default'      => [
                [
                    'property_address'   => esc_html__( 'Property Address', 'sbtech' ),
                ],
            ],
            'fields'       => [
                'property_address'   => [
                    'type'        => 'text',
                    'label'       => esc_html__( 'Property Address', 'sbtech' ),
                    'description' => esc_html__( 'Description', 'sbtech' ),
                    'default'     => '',
                ],
            ],
        ]
    );

}
sbtech_property_new_address();

// careers page form section
function sbtech_career_form_section(){

    // Header section
    new \Kirki\Section(
	'careers_form_section',
        [
            'title'       => esc_html__( 'Careers CV Submit form', 'sbtech' ),
            'description' => esc_html__( 'Careers CV Submit Form', 'sbtech' ),
            'panel'       => 'sbtech_panel',
            'priority'    => 160,
        ]
    );

    
    // form title
    new \Kirki\Field\Text(
        [
            'settings' => 'submit_cv_form_title',
            'label'    => esc_html__( 'Form Title', 'sbtech' ),
            'section'  => 'careers_form_section',
            'default'  => esc_html__( 'Ready to join our team?', 'sbtech' ),
            'priority' => 10,
        ]
    );
    
    // form checkbox text
    new \Kirki\Field\Textarea(
        [
            'settings' => 'submit_cv_checkbox_text',
            'label'    => esc_html__( 'Form Checkbox Text (under 95 Char)', 'sbtech' ),
            'section'  => 'careers_form_section',
            'default'  => esc_html__( 'I agree to receive information about offers, deals and services from this website (optional).', 'sbtech' ),
            'priority' => 10,
        ]
    );
}
sbtech_career_form_section();


// Contact us form section
function sbtech_contact_us_form_section(){

    // Header section
    new \Kirki\Section(
	'contact_us_button_form_section',
        [
            'title'       => esc_html__( 'Contact Us Button Form', 'sbtech' ),
            'description' => esc_html__( 'Contact Us Button Form', 'sbtech' ),
            'panel'       => 'sbtech_panel',
            'priority'    => 160,
        ]
    );
    
    // form checkbox text
    new \Kirki\Field\Textarea(
        [
            'settings' => 'contact_us_button_checkbox_text',
            'label'    => esc_html__( 'Form Checkbox Text (under 95 Char)', 'sbtech' ),
            'section'  => 'contact_us_button_form_section',
            'default'  => esc_html__( 'I agree to receive information about offers, deals and services from this website (optional).', 'sbtech' ),
            'priority' => 10,
        ]
    );
}
sbtech_contact_us_form_section();