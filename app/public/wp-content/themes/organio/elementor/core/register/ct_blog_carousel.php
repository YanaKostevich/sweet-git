<?php
// Post term options
$post_term_options = ct_get_grid_term_options('post');
$slides_to_show = range( 1, 10 );
$slides_to_show = array_combine( $slides_to_show, $slides_to_show );
// Register Post Carousel Widget
ct_add_custom_widget(
    array(
        'name' => 'ct_blog_carousel',
        'title' => esc_html__('Case Blog Carousel', 'organio' ),
        'icon' => 'eicon-posts-carousel',
        'categories' => array( Case_Theme_Core::CT_CATEGORY_NAME ),
        'scripts' => array(
            'jquery-slick',
            'ct-post-carousel-widget-js',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'layout_section',
                    'label' => esc_html__('Layout', 'organio' ),
                    'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'prefix_class' => 'ct-post-carousel-layout',
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Templates', 'organio' ),
                            'type' => Case_Theme_Core::LAYOUT_CONTROL,
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'organio' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_blog_carousel/layout-image/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'organio' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_blog_carousel/layout-image/layout2.jpg'
                                ],
                                '3' => [
                                    'label' => esc_html__('Layout 3', 'organio' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_blog_carousel/layout-image/layout3.jpg'
                                ],
                                '4' => [
                                    'label' => esc_html__('Layout 4', 'organio' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_blog_carousel/layout-image/layout4.jpg'
                                ],
                                '5' => [
                                    'label' => esc_html__('Layout 5', 'organio' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_blog_carousel/layout-image/layout5.jpg'
                                ],
                                '6' => [
                                    'label' => esc_html__('Layout 6', 'organio' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_blog_carousel/layout-image/layout6.jpg'
                                ],
                                '7' => [
                                    'label' => esc_html__('Layout 7', 'organio' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_blog_carousel/layout-image/layout7.jpg'
                                ],
                                '8' => [
                                    'label' => esc_html__('Layout 8', 'organio' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_blog_carousel/layout-image/layout8.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'source_section',
                    'label' => esc_html__('Source', 'organio' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'source',
                            'label' => esc_html__('Select Categories', 'organio' ),
                            'type' => \Elementor\Controls_Manager::SELECT2,
                            'multiple' => true,
                            'options' => $post_term_options,
                        ),
                        array(
                            'name' => 'orderby',
                            'label' => esc_html__('Order By', 'organio' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'date',
                            'options' => [
                                'date' => esc_html__('Date', 'organio' ),
                                'ID' => esc_html__('ID', 'organio' ),
                                'author' => esc_html__('Author', 'organio' ),
                                'title' => esc_html__('Title', 'organio' ),
                                'rand' => esc_html__('Random', 'organio' ),
                            ],
                        ),
                        array(
                            'name' => 'order',
                            'label' => esc_html__('Sort Order', 'organio' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'desc',
                            'options' => [
                                'desc' => esc_html__('Descending', 'organio' ),
                                'asc' => esc_html__('Ascending', 'organio' ),
                            ],
                        ),
                        array(
                            'name' => 'limit',
                            'label' => esc_html__('Total items', 'organio' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => '6',
                        ),
                    ),
                ),
                array(
                    'name' => 'display_section',
                    'label' => esc_html__('Display Options', 'organio' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'thumbnail',
                            'type' => \Elementor\Group_Control_Image_Size::get_type(),
                            'control_type' => 'group',
                            'default' => 'custom',
                        ),
                        array(
                            'name' => 'show_date',
                            'label' => esc_html__('Show Date', 'organio' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'condition' => [
                                'layout' => ['1','3','4','5','6','7','8'],
                            ],
                        ),
                        array(
                            'name' => 'show_category',
                            'label' => esc_html__('Show Category', 'organio' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'condition' => [
                                'layout' => ['2','4','6','8'],
                            ],
                        ),
                        array(
                            'name' => 'show_comment',
                            'label' => esc_html__('Show Comment', 'organio' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'condition' => [
                                'layout' => '1',
                            ],
                        ),
                        array(
                            'name' => 'show_author',
                            'label' => esc_html__('Show Author', 'organio' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'condition' => [
                                'layout' => ['1','2','3','5','6','8'],
                            ],
                        ),
                        array(
                            'name' => 'show_button',
                            'label' => esc_html__('Show Button Readmore', 'organio' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'button_text',
                            'label' => esc_html__('Button Text', 'organio' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'show_button' => 'true',
                                'layout' => ['1','2','3','4','6','7'],
                            ],
                        ),
                        array(
                            'name' => 'button_style',
                            'label' => esc_html__('Button Style', 'organio' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'style1',
                            'options' => [
                                'style1' => 'Style 1',
                                'style2' => 'Style 2',
                            ],
                            'condition' => [
                                'layout' => ['6'],
                            ],
                        ),
                        array(
                            'name' => 'show_excerpt',
                            'label' => esc_html__('Show Excerpt', 'organio' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'condition' => [
                                'layout' => ['2', '3', '5', '7'],
                            ],
                        ),
                        array(
                            'name' => 'num_words',
                            'label' => esc_html__('Number of Words', 'organio' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 25,
                            'condition' => [
                                'show_excerpt' => 'true',
                                'layout' => ['2', '3', '5', '7'],
                            ],
                            'separator' => 'after',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_carousel_settings',
                    'label' => esc_html__('Carousel', 'organio'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'ct_animate',
                            'label' => esc_html__('Case Animate', 'organio' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => organio_animate(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'col_xs',
                            'label' => esc_html__('Columns XS Devices', 'organio' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_sm',
                            'label' => esc_html__('Columns SM Devices', 'organio' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '2',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_md',
                            'label' => esc_html__('Columns MD Devices', 'organio' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_lg',
                            'label' => esc_html__('Columns LG Devices', 'organio' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_xl',
                            'label' => esc_html__('Columns XL Devices', 'organio' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),

                        array(
                            'name' => 'slides_to_scroll',
                            'label' => esc_html__('Slides to scroll', 'organio' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'arrows',
                            'label' => esc_html__('Show Arrows', 'organio'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                        array(
                            'name' => 'dots',
                            'label' => esc_html__('Show Dots', 'organio'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                        array(
                            'name' => 'dot_style',
                            'label' => esc_html__('Dots Style', 'organio' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'style1',
                            'options' => [
                                'style1' => 'Style 1',
                                'style2' => 'Style 2',
                                'style3' => 'Style 3',
                                'style4' => 'Style 4',
                                'style5' => 'Style 5',
                                'style6' => 'Style 6',
                                'style7' => 'Style 7',
                            ],
                            'condition' => [
                                'layout' => ['1', '6', '7'],
                            ],
                        ),
                        array(
                            'name' => 'pause_on_hover',
                            'label' => esc_html__('Pause on Hover', 'organio'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'autoplay',
                            'label' => esc_html__('Autoplay', 'organio'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                        array(
                            'name' => 'autoplay_speed',
                            'label' => esc_html__('Autoplay Speed', 'organio'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 5000,
                            'condition' => [
                                'autoplay' => 'false'
                            ]
                        ),
                        array(
                            'name' => 'infinite',
                            'label' => esc_html__('Infinite Loop', 'organio'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'speed',
                            'label' => esc_html__('Animation Speed', 'organio'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 500,
                        ),
                        array(
                            'name' => 'drap',
                            'label' => esc_html__('Show Scroll Drap', 'itfirm'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);