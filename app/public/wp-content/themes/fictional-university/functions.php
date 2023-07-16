<?php

function enqueue_ag_styles()
{
  wp_enqueue_script('ag-js', get_template_directory_uri() . '/build/index.js', array('jquery'), '1.0', true);
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_style('font-awesome', "//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");
  wp_enqueue_style('ag_styles', get_template_directory_uri() . '/build/style-index.css');
  wp_enqueue_style('ag_extra_styles', get_template_directory_uri() . '/build/index.css');
}

add_action('wp_enqueue_scripts', 'enqueue_ag_styles');

function ag_features()
{
  register_nav_menu('Header', 'Header');
  register_nav_menu('Footer1', 'Footer 1');
  register_nav_menu('Footer2', 'Footer 2');
  add_theme_support('title-tag');
}

add_action('after_setup_theme', 'ag_features');
