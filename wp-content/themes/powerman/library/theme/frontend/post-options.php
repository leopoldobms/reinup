<?php

add_filter( 'rwmb_meta_boxes', 'powerman_register_meta_boxes');

function powerman_register_meta_boxes($meta_boxes ) {

    $meta_boxes[] = array(

        'id' => 'post_format_options',
        'title' => esc_html__( 'Post Format Options', 'powerman' ),
        'pages' => array( 'post' ),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'fields' => array(
            array(
                'name' => esc_html__('Post Standard:', 'powerman' ),
                'id'   => "post_standard",
                'type' => 'plupload_image',
                'max_file_uploads' => 1,
            ),
            array(
                'name' => esc_html__('Post Gallery:','powerman'),
                'id'   => "post_gallery",
                'type' => 'plupload_image',
                'max_file_uploads' => 25,
            ),
            array(
                'name'  => esc_html__('Quote Source:', 'powerman'),
                'id'    => "post_quote_source",
                'desc'  => '',
                'type'  => 'text',
                'std'   => '',
            ),
            array(
                'name'  => esc_html__('Quote Content:', 'powerman'),
                'id'    => "post_quote_content",
                'desc'  => '',
                'type'  => 'textarea',
                'std'   => '',
            ),
            array(
                'name'  => esc_html__('Video','powerman'),
                'id'    => "post_video",
                'desc'  => 'Video URL',
                'type'  => 'textarea',
                'std'   => '',
            )
        )

    );

    $meta_boxes[] = array(
        'id' => 'post_types',
        'title' => esc_html__( 'Portfolio Option', 'powerman' ),
        'pages' => array( 'portfolio' ),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'fields' => array(
            array(
                'name'     => esc_html__( 'Post Types', 'powerman' ),
                'id'       => "post_types_select",
                'type'     => 'select',
                'desc' => 'Select post types',
                'options'  => array(
                    'image' => 'Image',
                    'video' => 'Video',
                )
            ),
            array(
                'name' => esc_html__( 'Post Type For Image', 'powerman' ),
                'id'   => "post_image",
                'type' => 'file_advanced',
                'desc' => "Upload post type image for your post.",
                'max_file_uploads' => 4,
                //'mime_type' => 'application,audio,video',
            ),
            array(
                'name'  => esc_html__( 'Post Type For Video', 'powerman' ),
                'id'    => 'post_video_href',
                'type'  => 'text',
                'desc' => 'Enter video link eg (http://youtu.be/DoRMzGR7ZDA)'
            ),
            array(
                'name' => esc_html__( '.', 'powerman' ),
                'id'   => "post_video_width",
                'type' => 'slider',
                'desc' => esc_html__('Range video width', 'powerman'),
                'suffix' => esc_html__( ' px', 'powerman' ),
                'js_options' => array(
                    'min'   => 100,
                    'max'   => 2000,
                    'step'  => 10,
                ),
            ),
            array(
                'name' => esc_html__( '.', 'powerman' ),
                'id'   => "post_video_height",
                'type' => 'slider',
                'desc' => esc_html__('Range video height', 'powerman'),
                'suffix' => esc_html__( ' px', 'powerman' ),
                'js_options' => array(
                    'min'   => 100,
                    'max'   => 1000,
                    'step'  => 5,
                ),
            ),
        )
    );

    $meta_boxes[] = array(

        'id' => 'portfolio_page_options',
        'title' => esc_html__( 'Portfolio Options', 'powerman' ),
        'pages' => array( 'page' ),
        'context' => 'normal',
        'priority' => 'low',
        'fields' => array(

            array(
                'name'    => esc_html__( 'Categories not to show', 'powerman' ),
                'id'      => "portfolio_page_categories_not",
                'desc'  => esc_html__( "Select the categories that you wish not to dispaly on this portfolio page.", 'powerman' ),
                'type'    => 'taxonomy',
                'options' => array(
                    'taxonomy' => 'portfolio_category',
                    'type' => 'checkbox_list'
                )
            )

        )
    );

    return $meta_boxes;
}