<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aquadesign
 */


$cta_title	= get_field('cta_title');
$cta_link	= get_field('cta_link');
$form_title	= get_field('form_title');

?>
 
 <?php $loop = new WP_Query( array( 'post_type' => 'pre_footer', 'orderby' => 'post_id', 'order' => 'ASC') ); ?>
		          <?php while( $loop->have_posts() ) : $loop->the_post(); ?>
		          
 <div class="w-section pre-footer">
    <div class="w-container cta-container">
      <h3 class="cta-h3"><?php the_field('cta_title'); ?></h3><a class="button cta-button blue" href="<? the_field('cta_link'); ?>">Contact Us</a>
    </div>
  </div>
  
<? endwhile; ?>
    
<?php wp_footer(); ?>

</body>
</html>