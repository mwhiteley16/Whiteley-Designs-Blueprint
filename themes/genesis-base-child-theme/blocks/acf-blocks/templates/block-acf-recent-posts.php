<?php
/**
 *  Recent Posts Block
 *
 * @package      ClientName
 * @author       Matt Whiteley
 * @since        1.0.0
 * @license      GPL-2.0+
**/

// ACF custom fields
$wd_recent_posts_block_display_type = get_field( 'wd_recent_posts_block_display_type' );
$wd_recent_posts_block_category = get_field( 'wd_recent_posts_block_category' );
$wd_recent_posts_block_number_of_posts = get_field( 'wd_recent_posts_block_number_of_posts' );
$wd_recent_posts_choose_posts = get_field( 'wd_recent_posts_choose_posts' );

// disable pointer events (admin only)

// block ID
$block_id = 'recent-posts-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) { // add anchor if present
     $id = $block['anchor'];
}

// block Classes
$block_classes = 'acf-block recent-posts-block';

// optionally disable pointer events (prevent clicking links within block editor)
$disable_pointer_events = true;
if ( $disable_pointer_events == 1 && is_admin() ) {
     $block_classes .= ' disable-pointer-events';
}

if ( ! empty( $block['align'] ) ) { // block alignment (left, center, right, wide, full)
     $block_classes .= ' align' . $block['align'];
}

if ( ! empty( $block['className'] ) ) { // custom class name
     $block_classes .= ' ' . $block['className'];
}
?>

<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $block_classes ); ?>">

     <?php
     wp_reset_query();
     $args = [
          'post_type'      => 'post',
          'post_status'    => 'publish',
          'posts_per_page' => $wd_recent_posts_block_number_of_posts
     ];

     // include selected category if category option is set
     if ( $wd_recent_posts_block_display_type == 'category-posts' ) {
          $args['cat'] = $wd_recent_posts_block_category;
     }

     // include selected posts if manual option is set
     if ( $wd_recent_posts_block_display_type == 'manual-posts' ) {
          $args['post__in'] = $wd_recent_posts_choose_posts;
          $args['orderby']  = 'post__in';
     }

     $recent_query = new WP_Query( $args );
     ?>

     <?php if ( $recent_query->have_posts() ) : ?>
          <div class="loop-wrapper">
               <?php while ( $recent_query->have_posts() ) : $recent_query->the_post(); ?>
                    <?php get_template_part( 'partials/loop-item' ); ?>
               <?php endwhile; ?>
          </div>
          <?php wp_reset_query(); ?>
     <?php endif; ?>

</div>
