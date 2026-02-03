<?php

new \Kirki\Panel(
    'sbtech_panel',
    [
        'priority'    => 10,
        'title'       => esc_html__('Sbtech Panel', 'sbtech'),
        'description' => esc_html__('My Panel Description.', 'sbtech'),
    ]
);

// Section 01
function sbtech_header_info() {
    new \Kirki\Section(
        'sbtech_header_section',
        [
            'title'       => esc_html__('Header Info', 'sbtech'),
            'description' => esc_html__('My Section Description.', 'sbtech'),
            'panel'       => 'sbtech_panel',
            'priority'    => 160,
        ]
    );

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'header_top_switch',
            'label'       => esc_html__('Header TopBar Switch Control', 'sbtech'),
            'description' => esc_html__('Simple switch control', 'sbtech'),
            'section'     => 'sbtech_header_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__('Enable', 'sbtech'),
                'off' => esc_html__('Disable', 'sbtech'),
            ],
        ]
    );

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'header_right_side_switch',
            'label'       => esc_html__('Header Right Side Switch button', 'sbtech'),
            'description' => esc_html__('Header Right Side switch button', 'sbtech'),
            'section'     => 'sbtech_header_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__('Enable', 'sbtech'),
                'off' => esc_html__('Disable', 'sbtech'),
            ],
        ]
    );

    new \Kirki\Field\Text(
        [
            'settings' => 'address_text',
            'label'    => esc_html__('Address Text', 'sbtech'),
            'section'  => 'sbtech_header_section',
            'default'  => esc_html__('Manchester 21, Zurich, CH ', 'sbtech'),
            'priority' => 10,
        ]
    );

    new \Kirki\Field\Text(
        [
            'settings' => 'address_url',
            'label'    => esc_html__('Address URL', 'sbtech'),
            'section'  => 'sbtech_header_section',
            'default'  => esc_html__('#', 'sbtech'),
            'priority' => 10,
        ]
    );

    // email_address
    new \Kirki\Field\Text(
        [
            'settings' => 'email_address',
            'label'    => esc_html__('Email Id', 'sbtech'),
            'section'  => 'sbtech_header_section',
            'default'  => esc_html__('techubinfo@mail.com', 'sbtech'),
            'priority' => 10,
        ]
    );

    // header_button_text
    new \Kirki\Field\Text(
        [
            'settings' => 'header_button_text',
            'label'    => esc_html__('Header Button text', 'sbtech'),
            'section'  => 'sbtech_header_section',
            'default'  => esc_html__('Get a Quete', 'sbtech'),
            'priority' => 10,
        ]
    );

    // header_button_url
    new \Kirki\Field\Text(
        [
            'settings' => 'header_button_url',
            'label'    => esc_html__('Header Button URL', 'sbtech'),
            'section'  => 'sbtech_header_section',
            'default'  => esc_html__('#', 'sbtech'),
            'priority' => 10,
        ]
    );
}
sbtech_header_info();

// sbtech_header_side_section
function sbtech_header_side_section() {
    new \Kirki\Section(
        'header_side_info_section',
        [
            'title'       => esc_html__('Header Offcanvas', 'sbtech'),
            'description' => esc_html__('My Section Description.', 'sbtech'),
            'panel'       => 'sbtech_panel',
            'priority'    => 160,
        ]
    );

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'header_side_info_switch',
            'label'       => esc_html__('Header Side Info Switch', 'sbtech'),
            'description' => esc_html__('Header Side switch control', 'sbtech'),
            'section'     => 'header_side_info_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__('Enable', 'sbtech'),
                'off' => esc_html__('Disable', 'sbtech'),
            ],
        ]
    );

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'header_side_social_switch',
            'label'       => esc_html__('Header Side Social Switch', 'sbtech'),
            'description' => esc_html__('Header Side switch control', 'sbtech'),
            'section'     => 'header_side_info_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__('Enable', 'sbtech'),
                'off' => esc_html__('Disable', 'sbtech'),
            ],
        ]
    );

    // header_side_logo
    new \Kirki\Field\Image(
        [
            'settings'    => 'header_side_logo',
            'label'       => esc_html__('Header Logo', 'sbtech'),
            'description' => esc_html__('Please set your hader logo.', 'sbtech'),
            'section'     => 'header_side_info_section',
            'default'     => get_template_directory_uri() . '/assets/img/logo/logo.png',
        ]
    );

    // header_side_content
    new \Kirki\Field\Textarea(
        [
            'settings' => 'header_side_content',
            'label'    => esc_html__('Header Side Content', 'sbtech'),
            'section'  => 'header_side_info_section',
            'default'  => esc_html__('Techub is the partner of choice for many of the world’s leading enterprises. We help businesses development., CH ', 'sbtech'),
            'priority' => 10,
        ]
    );

    // header_side_address_text
    new \Kirki\Field\Text(
        [
            'settings' => 'header_side_address_text',
            'label'    => esc_html__('Address Text', 'sbtech'),
            'section'  => 'header_side_info_section',
            'default'  => esc_html__('Manchester 21, Zurich, CH', 'sbtech'),
            'priority' => 10,
        ]
    );

    // header_side_address_url
    new \Kirki\Field\Text(
        [
            'settings' => 'header_side_address_url',
            'label'    => esc_html__('Address URL', 'sbtech'),
            'section'  => 'header_side_info_section',
            'default'  => esc_html__('#', 'sbtech'),
            'priority' => 10,
        ]
    );

    // email_address
    new \Kirki\Field\Text(
        [
            'settings' => 'header_side_email_address',
            'label'    => esc_html__('Email Id', 'sbtech'),
            'section'  => 'header_side_info_section',
            'default'  => esc_html__('techubinfo@mail.com', 'sbtech'),
            'priority' => 10,
        ]
    );

    // header_side_phone
    new \Kirki\Field\Text(
        [
            'settings' => 'header_side_phone',
            'label'    => esc_html__('Phone Id', 'sbtech'),
            'section'  => 'header_side_info_section',
            'default'  => esc_html__('(+00) 678 345 98568', 'sbtech'),
            'priority' => 10,
        ]
    );
}
sbtech_header_side_section();

// Section 02
function sbtech_header_social_section() {
    new \Kirki\Section(
        'sbtech_header_social_section',
        [
            'title'       => esc_html__('Header Social', 'sbtech'),
            'description' => esc_html__('My Header Socail Info.', 'sbtech'),
            'panel'       => 'sbtech_panel',
            'priority'    => 160,
        ]
    );

    new \Kirki\Field\Text(
        [
            'settings' => 'header_fb',
            'label'    => esc_html__('Facebook URL', 'sbtech'),
            'section'  => 'sbtech_header_social_section',
            'default'  => esc_html__('#', 'sbtech'),
            'priority' => 10,
        ]
    );

    new \Kirki\Field\Text(
        [
            'settings' => 'header_in',
            'label'    => esc_html__('instagram URL', 'sbtech'),
            'section'  => 'sbtech_header_social_section',
            'default'  => esc_html__('#', 'sbtech'),
            'priority' => 10,
        ]
    );

    new \Kirki\Field\Text(
        [
            'settings' => 'header_tw',
            'label'    => esc_html__('twitter URL', 'sbtech'),
            'section'  => 'sbtech_header_social_section',
            'default'  => esc_html__('#', 'sbtech'),
            'priority' => 10,
        ]
    );

    new \Kirki\Field\Text(
        [
            'settings' => 'header_pin',
            'label'    => esc_html__('pinterest URL', 'sbtech'),
            'section'  => 'sbtech_header_social_section',
            'default'  => esc_html__('#', 'sbtech'),
            'priority' => 10,
        ]
    );
}
sbtech_header_social_section();

// sbtech_header_logo_section
function sbtech_header_logo_section() {
    new \Kirki\Section(
        'sbtech_header_logo_section',
        [
            'title'       => esc_html__('Header Logo', 'sbtech'),
            'description' => esc_html__('My Section Description.', 'sbtech'),
            'panel'       => 'sbtech_panel',
            'priority'    => 160,
        ]
    );

    new \Kirki\Field\Image(
        [
            'settings'    => 'header_logo',
            'label'       => esc_html__('Header Logo', 'sbtech'),
            'description' => esc_html__('Please set your hader logo.', 'sbtech'),
            'section'     => 'sbtech_header_logo_section',
            'default'     => get_template_directory_uri() . '/assets/img/logo/logo.png',
        ]
    );
}
sbtech_header_logo_section();

// sbtech_footer_section
function sbtech_footer_section() {
    new \Kirki\Section(
        'sbtech_footer_section',
        [
            'title'       => esc_html__('Footer', 'sbtech'),
            'description' => esc_html__('My Section Description.', 'sbtech'),
            'panel'       => 'sbtech_panel',
            'priority'    => 160,
        ]
    );

    new \Kirki\Field\Image(
        [
            'settings'    => 'footer_bg_img',
            'label'       => esc_html__('Footer BG Image', 'sbtech'),
            'description' => esc_html__('Please set your Footer BG Image.', 'sbtech'),
            'section'     => 'sbtech_header_logo_section',
            'default'     => get_template_directory_uri() . '/assets/img/footer/footer-4-man-shape.png',
        ]
    );

    // footer_copyright
    new \Kirki\Field\Text(
        [
            'settings' => 'footer_copyright',
            'label'    => esc_html__('Copyright Text', 'sbtech'),
            'section'  => 'sbtech_footer_section',
            'default'  => esc_html__('Full Copyright & Design By @ Theme pure – 2024', 'sbtech'),
            'priority' => 10,
        ]
    );
}
sbtech_footer_section();
