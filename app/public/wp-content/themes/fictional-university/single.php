<?php
get_header();

while (have_posts()) {
  the_post(); ?>
  <div class="site-content">
    <div class="site-inner">
      <h2><?php the_title() ?></h2>
      <p><?php the_content() ?></p>
    </div>
  </div>
<?
}
get_footer();
?>