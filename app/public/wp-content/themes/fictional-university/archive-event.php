<?php
get_header()
?>
<div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url(<?php echo get_template_directory_uri() . '/images/ocean.jpg' ?>)"></div>
  <div class="page-banner__content container container--narrow">
    <h1 class="page-banner__title">
      <?php post_type_archive_title(); ?>
    </h1>
    <div class="page-banner__intro">
      <p>All Events</p>
    </div>
  </div>
</div>
<div class="container container--narrow page-section">
  <?php
  while (have_posts()) {
    the_post();
    $eventDate = get_field('event_date') ?>
    <div class="event-summary">
      <a class="event-summary__date t-center" href="#">
        <span class="event-summary__month">
          <?php
          $date = new DateTime($eventDate);
          echo $date->format('M')
          ?></span>
        <span class="event-summary__day">
          <?php
          $date = new DateTime($eventDate);
          echo $date->format('d')
          ?>
        </span>
      </a>
      <div class="event-summary__content">
        <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
        <p><?php echo wp_trim_words(get_the_content(), 30) ?> <a href="<?php the_permalink() ?>" class="nu gray">Learn more</a></p>
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