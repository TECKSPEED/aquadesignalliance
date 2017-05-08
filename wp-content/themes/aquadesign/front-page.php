<?php
/*
	Template Name: Home
*/	

//* ADVANCED CUSTOM FIELDS
/*$hero_title	= get_field('hero_title');
$hero_supporting_text = get_field('hero_supporting_text');
$hero_supporting_text_start = get_field('hero_supporting_text_start');
$watch_video = get_field('watch_video');

$cta_link_1 = get_field('cta_link_1');
$cta_link_2 = get_field('cta_link_2');
$cta_link_3 = get_field('cta_link_3');
$body_text = get_field('body_text');
$body_heading = get_field('body_heading');

$cta_home_title = get_field('cta_home_title');
*/

get_header(); ?>

<?php
global $post;
$aquascapeTitle = get_post_meta( get_the_ID(), 'hero_details_title_of_aquascape', TRUE );
$aquascapeAuthor = get_post_meta( get_the_ID(), 'hero_details_author', TRUE );
$homepageQuote = get_post_meta( get_the_ID(), 'homepage_quote_quote', TRUE );
$homepageQuoteAuthor = get_post_meta( get_the_ID(), 'homepage_quote_quote_author', TRUE );
$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' );
$loop = new WP_Query( array( 'post_type' => 'gallery', 'posts_per_page' => 3 ) ); ?>

<div class="w-section home-main" style="  background-color: #025d90;
                                          background-image: url('<?php echo $src[0]; ?>');
                                          background-size: cover;
                                          background-position: center center;
                                          background-repeat: no-repeat;
                                          background-attachment: scroll;" >
  <div class="w-container hero-container">
      <p class="hero-details">
      <?php if (!$aquascapeTitle == null){ ?>
            <span>"<?php echo $aquascapeTitle; ?>"
        <?php } ?>
        <?php if(!$aquascapeAuthor == null){ ?>
            </span> by <?php echo $aquascapeAuthor; ?>
      <?php } ?>
      </p>
  </div>
</div>
<div class="w-section action-menu">
  <div class="w-container action-menu-container homepage-content">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <?php the_content('Read the rest of this entry »'); ?>
        <?php endwhile; ?>
        <?php else : ?>
        //Something that happens when a post isn’t found.
    <?php endif; ?>
    <div class="w-section action-menu">
      <div class="w-container action-menu-container">
        <div class="lead-home-quote"><?php echo $homepageQuote; ?></div>
          <div class="lead-home-author"><p>- <?php echo $homepageQuoteAuthor; ?></p></div>
          <div class="home-h2"><h2>Featured Galleries</h2></div>
          <div class="w-row">
              <?php if ($loop->have_posts()) : ?>
                  <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                      <?php $t = wp_get_post_tags($post->ID, array('fields' => 'names')); ?>
                      <?php if($t[0] == null) :?>
                          <a href="<?php the_permalink($loop->ID) ?>">
                              <div class="w-col w-col-4 gallery-item">
                                  <div class="gallery-image" style="background-image: url(' <?php echo the_post_thumbnail_url() ?> ')"></div>
                                  <div class="gallery-info">
                                      <div class="gallery-title"><p class="gallery-h2">&ldquo;<?php echo get_the_title() ?>&rdquo;</p></div>
                                      <div class="gallery-author-container"><p class="gallery-author">By: <?php echo get_post_meta(get_the_ID($loop->ID), 'aquascape_author_aquascape_quthor', true) ?></p></div>
                                  </div>
                              </div>
                          </a>
                      <?php endif; ?>
                  <?php endwhile; ?>
              <?php endif; ?>
          </div>
      </div>
    </div>
  </div>


<?php get_footer(); ?>