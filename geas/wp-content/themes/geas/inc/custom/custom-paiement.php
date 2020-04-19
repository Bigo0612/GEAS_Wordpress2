<?php

/**
 * Register a custom post type called "paiement".
 *
 * @see get_post_type_labels() for label keys.
 */
function wpdocs_codex_paiements_init()
{
    $labels = array(
        'name' => _x('paiements', 'Post type general name', 'geas'),
        'singular_name' => _x('paiement', 'Post type singular name', 'geas'),
        'menu_name' => _x('paiements', 'Admin Menu text', 'geas'),
        'name_admin_bar' => _x('paiement', 'Add New on Toolbar', 'geas'),
        'add_new' => __('Add New', 'geas'),
        'add_new_item' => __('Add New paiement', 'geas'),
        'new_item' => __('New paiement', 'geas'),
        'edit_item' => __('Edit paiement', 'geas'),
        'view_item' => __('View paiement', 'geas'),
        'all_items' => __('All paiements', 'geas'),
        'search_items' => __('Search paiements', 'geas'),
        'parent_item_colon' => __('Parent paiements:', 'geas'),
        'not_found' => __('No paiements found.', 'geas'),
        'not_found_in_trash' => __('No paiements found in Trash.', 'geas'),
        'featured_image' => _x('paiement Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'geas'),
        'set_featured_image' => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'geas'),
        'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'geas'),
        'use_featured_image' => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'geas'),
        'archives' => _x('paiement archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'geas'),
        'insert_into_item' => _x('Insert into paiement', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'geas'),
        'uploaded_to_this_item' => _x('Uploaded to this paiement', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'geas'),
        'filter_items_list' => _x('Filter paiements list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'geas'),
        'items_list_navigation' => _x('paiements list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'geas'),
        'items_list' => _x('paiements list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'geas'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'paiement'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 46,
        'menu_icon' => 'dashicons-chart-bar',
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
    );

    register_post_type('paiement', $args);
}

add_action('init', 'wpdocs_codex_paiements_init');

