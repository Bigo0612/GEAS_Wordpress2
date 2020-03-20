<?php

/**
 * Register a custom post type called "contact".
 *
 * @see get_post_type_labels() for label keys.
 */
function wpdocs_codex_contact_init()
{
    $labels = array(
        'name' => _x('contacts', 'Post type general name', 'geas'),
        'singular_name' => _x('contact', 'Post type singular name', 'geas'),
        'menu_name' => _x('contact', 'Admin Menu text', 'geas'),
        'name_admin_bar' => _x('contact', 'Add New on Toolbar', 'geas'),
        'add_new' => __('Add New', 'geas'),
        'add_new_item' => __('Add New contact', 'geas'),
        'new_item' => __('New contact', 'geas'),
        'edit_item' => __('Edit contact', 'geas'),
        'view_item' => __('View contact', 'geas'),
        'all_items' => __('All contacts', 'geas'),
        'search_items' => __('Search contacts', 'geas'),
        'parent_item_colon' => __('Parent contacts:', 'geas'),
        'not_found' => __('No contacts found.', 'geas'),
        'not_found_in_trash' => __('No contacts found in Trash.', 'geas'),
        'featured_image' => _x('contact Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'geas'),
        'set_featured_image' => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'geas'),
        'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'geas'),
        'use_featured_image' => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'geas'),
        'archives' => _x('contact archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'geas'),
        'insert_into_item' => _x('Insert into contact', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'geas'),
        'uploaded_to_this_item' => _x('Uploaded to this contact', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'geas'),
        'filter_items_list' => _x('Filter contacts list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'geas'),
        'items_list_navigation' => _x('contacts list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'geas'),
        'items_list' => _x('contacts list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'geas'),
    );


    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'contact'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 46,
        'menu_icon' => 'dashicons-media-default',
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
    );

    register_post_type('contact', $args);
}

add_action('init', 'wpdocs_codex_contact_init');