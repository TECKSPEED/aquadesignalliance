<?php get_header(); ?>

<?php global $post; ?>
<?php
$src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), array(5600, 1000), false, '');

$loop = new WP_Query( array( 'post_type' => 'gallery', 'posts_per_page' => -1 ) ); ?>
<div class="w-section home-main sub-main" style="background-color: #00573c;
        background-image: -webkit-linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('<?php echo $src[0]; ?>');
        background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('<?php echo $src[0]; ?>');
        background-position: 0% 0%, 0px 38%; background-size: cover;">
    <div class="w-container hero-container sub-hero-container">
        <h1 class="hero-h1"><?php the_title(); ?></h1>
    </div>
</div>

<div class="w-section action-menu">
    <div class="breadcrumb-container">
        <div class="w-container breadcrumbs">
            <?php breadcrumbs(); ?>
        </div>
    </div>
    <div class="w-container subpage-container">
        <div class="intro-text-container">
            <p><?php echo get_post_meta(get_the_ID(), 'intro_text_intro_text', true) ?></p>
        </div>
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

<?php get_footer(); ?>
