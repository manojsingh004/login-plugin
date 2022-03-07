<?php

add_action( 'init', 'create_custom_data_fileds' );

function create_custom_data_fileds() {
    register_post_type( 'custom_data',
        array(
            'labels' => array(
                'name' => 'custom data collection',
                'singular_name' => 'custom data collection',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New custom data collection',
                'edit' => 'Edit',
                'edit_item' => 'Edit custom data collection',
                'new_item' => 'New custom data collection',
                'view' => 'View',
                'view_item' => 'View custom data collection',
                'search_items' => 'Search custom data collection',
                'not_found' => 'No custom data collection found',
                'not_found_in_trash' => 'No custom data collection found in Trash',
                'parent' => 'Parent custom data collections'
            ),
 
            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'editor', 'comments', 'thumbnail', 'custom-fields' ),
            'taxonomies' => array( '' ),
            //'menu_icon' => plugins_url( 'images/image.png', __FILE__ ),
            'has_archive' => true
        )
    );
}

