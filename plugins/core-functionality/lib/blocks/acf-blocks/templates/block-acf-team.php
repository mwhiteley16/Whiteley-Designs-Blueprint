<?php
/**
 * Team Block
 *
 * @package      ClientName
 * @author       Matt Whiteley
 * @since        3.0.0
 * @license      GPL-2.0+
**/

// Block ID
$block_id = 'team-' . $block['id'];

// Block Classes
$block_classes = 'acf-block team-block';

// get align class if present
if ( ! empty( $block['align'] ) ) {
     $block_classes .= ' align' . $block['align'];
}

// get custom class name if present
if ( ! empty( $block['className'] ) ) {
     $block_classes .= ' ' . $block['className'];
}
?>

<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $block_classes ); ?>">

     <?php if ( have_rows( 'wd_block_team_members' ) ) : ?>
          <div class="team-block__interior">

               <?php while ( have_rows( 'wd_block_team_members' ) ) : the_row(); ?>

                    <?php
                    $wd_team_name = get_sub_field( 'wd_team_name' );
                    $wd_team_headshot = get_sub_field( 'wd_team_headshot' );
                    $wd_team_position = get_sub_field( 'wd_team_position' );
                    $wd_team_email = get_sub_field( 'wd_team_email' );
                    ?>

                    <div class="team-block__item">

                         <?php if ( $wd_team_headshot ) : ?>
                              <div class="team-block__headshot">
                                   <img src="<?php echo esc_url( $wd_team_headshot['url'] ); ?>" alt="<?php echo esc_attr( $wd_team_headshot['alt'] ); ?>" />
                              </div>
                         <?php endif; ?>

                         <h3 class="team-block__name"><?php echo $wd_team_name; ?></h3>

                         <?php if ( $wd_team_position ) : ?>
                              <span class="team-block__position">
                                   <?php echo $wd_team_position; ?>
                              </span>
                         <?php endif; ?>

                         <?php if ( $wd_team_email ) : ?>
                              <span class="team-block__email">
                                   <a href="mailto:<?php echo $wd_team_email; ?>"><i class="fas fa-paper-plane"></i> Email <?php echo $wd_team_name; ?></a>
                              </span>
                         <?php endif; ?>

                         <?php if ( have_rows( 'wd_team_social' ) ) : ?>
                              <div class="team-block__social">
                                   <?php while ( have_rows( 'wd_team_social' ) ) : the_row(); ?>
                                        <span class="team-block__social-item">
                                             <a href="<?php the_sub_field( 'wd_social_link' ); ?>" target="_blank">
                                                  <?php the_sub_field( 'wd_social_icon' ); ?>
                                             </a>
                                        </span>
                                   <?php endwhile; ?>
                              </div>
                         <?php endif; ?>

                    </div>

               <?php endwhile; ?>

          </div>
     <?php endif; ?>

</div>
