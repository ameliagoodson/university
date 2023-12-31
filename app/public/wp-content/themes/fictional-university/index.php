<?php
get_header()
?>
<div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url(<?php echo get_template_directory_uri() . '/images/ocean.jpg' ?>)"></div>
  <div class="page-banner__content container container--narrow">
    <h1 class="page-banner__title"><?php the_title() ?></h1>
    <div class="page-banner__intro">
      <p>Replace me</p>
    </div>
  </div>
</div>
<div class="container container--narrow page-section">
  <?php
  while (have_posts()) {
    the_post() ?>
    <div class="post-item">
      <h2 class="headline headline--medium headline--post-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
      <div class="metabox">
        <p>Posted by <?php the_author_posts_link() ?> in <?php the_time('F Y') ?> in <?php the_category(', ') ?></p>
      </div>
      <div class="generic-content">
        <?php the_excerpt() ?>
        <p><a href="<?php the_permalink() ?>" class="btn btn--blue">Continue reading &raquo;</a></p>
      </div>
    </div>
  <?php
  }
  echo paginate_links()
  ?>

</div>
<?php
get_footer()
?>