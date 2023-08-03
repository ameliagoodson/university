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



/* Manipulates DEFAULT query for events archive:
    1. Ensures we are not affecting the admin-side posts
    2. Specifies the post type archive
    3. Final check to ensure we are not changing a custom query */
function ag_adjust_queries($query)
{
  if (!is_admin() and is_post_type_archive('event') and $query->is_main_query()) {
    $today = date('Ymd');
    /* Pre_get_posts() receives the query object automatically
       The query's set method takes two args:
       1. name of the query param we want to change 
       2. what you want to set the param to*/
    $query->set('meta_key', 'event_date');
    $query->set('orderby', 'meta_value_num');
    $query->set('order', 'ASC');
    $query->set('meta_query', array(
      array(
        'key' => 'event_date',
        'compare' => '>=',
        'value' => $today
      )
    ));
  }
}
//  WP will reference this function before sending the query to the db - gives us a chance to adjust the query 
add_action('pre_get_posts', 'ag_adjust_queries');



/**
 * Console log
 */
function console_log($obj)
{
  $data = json_encode(print_r($obj, true));
?>
  <style type="text/css">
    #bsdLogger {
      position: fixed;
      top: 0px;
      right: 0px;
      border-left: 4px solid #bbb;
      padding: 15px;
      background: white;
      color: #444;
      z-index: 999;
      font-size: 12px;
      width: 25vw;
      min-width: 300px;
      max-width: 900px;
      height: 100vh;
      overflow: scroll;
    }

    body.admin-bar #bsdLogger {
      padding-top: 80px;
    }
  </style>
  <script type="text/javascript">
    var debug = function() {
      var obj = <?php echo $data; ?>;
      var logger = document.getElementById('bsdLogger');
      if (!logger) {
        logger = document.createElement('div');
        logger.id = 'bsdLogger';
        document.body.appendChild(logger);
      }
      var pre = document.createElement('pre');
      pre.classList.add('xdebug-var-dump');
      pre.innerHTML = obj;
      logger.appendChild(pre);
    };
    window.addEventListener("DOMContentLoaded", debug, false);
  </script>
<?php
}
