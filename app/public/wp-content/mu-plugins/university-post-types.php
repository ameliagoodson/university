<?php
function ag_post_types()
{
  register_post_type('event', array(
    'supports' => array('title', 'editor', 'excerpt'),
    'rewrite' => array(
      'slug' => 'events'
    ),
    // allows event page to display archives (else it will be blank)
    'has_archive' => true,
    'public' => true,
    'menu_icon' => 'dashicons-calendar',
    // Show in block editor
    'show_in_rest' => true,
    'labels' => array(
      'name' => 'Events',
      'add_new_item' => 'Add New Event',
      'edit_item' => "Edit Event",
      'all_items' => "All Events",
      'singular_name' => "Event"
    )
  ));
}

add_action('init', 'ag_post_types');
