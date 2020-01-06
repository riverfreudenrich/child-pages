<?php
$args = array(
    'post_parent' => $post->ID,
    'post_type' => 'page',
    'orderby' => 'menu_order'
);

$child_query = new WP_Query( $args );
?>

<!-- Posts -->
<div class="post-container">

<?php while ( $child_query->have_posts() ) : $child_query->the_post(); ?>

  <div id="post-<?php the_ID(); ?>" class="post content clearfix" data-aos="fade-up">
      <?php if (has_post_thumbnail()) : ?>
        <img alt="<?php echo the_title(); ?> Featured Photo" style="width:100%;height:auto;margin-bottom:30px;" src="<?php echo get_the_post_thumbnail_url(); ?>">
      <?php endif; ?>
      <h3 class="thumbprint"><?php echo the_title(); ?></h3>
      <div class="entry">
        <?php if (!has_excerpt()) : ?>
          <p><?php echo get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true); ?></p>
        <?php else : ?>
          <p><?php echo the_excerpt(); ?></p>
        <?php endif; ?>
      </div>
      <a class="button" href="<?php the_permalink() ?>">Learn More</a>
  </div>

<?php endwhile; ?>

</div>

<?php wp_reset_postdata(); ?>
