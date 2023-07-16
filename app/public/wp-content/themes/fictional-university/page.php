<?php
get_header();
while (have_posts()) {
  the_post();
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
    $has_parent = wp_get_post_parent_id(get_the_ID());
    if ($has_parent) { ?>
      <div class="metabox metabox--position-up metabox--with-home-link">

        <p>
          <a class="metabox__blog-home-link" href="<?php echo get_permalink($has_parent) ?>"><i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($has_parent) ?></a> <span class="metabox__main"><?php the_title() ?></span>
        </p>
      </div>
    <?php
    }
    ?>

    <?php
    $pagesingle = get_pages(array(
      'child_of' => get_the_ID()
    ));

    if ($has_parent or $pagesingle) { ?>
      <div class="page-links">
        <h2 class="page-links__title"><a href="<?php echo get_permalink($has_parent) ?>">
            <?php
            echo get_the_title($has_parent)
            ?>
          </a></h2>
        <ul class="min-list">
          <?php
          if ($has_parent) {
            $findchildrenof = $has_parent;
          } else {
            $findchildrenof = get_the_ID();
          }
          wp_list_pages(array(
            'title_li' => null,
            'child_of' => $findchildrenof,
            'sort_column' => 'menu_order'
          ));
          ?>
        </ul>
      </div>

      <div class="generic-content">
        <?php the_content() ?>
      </div>
  </div>
<?php   }
?>
<?php
}
get_footer();
?>