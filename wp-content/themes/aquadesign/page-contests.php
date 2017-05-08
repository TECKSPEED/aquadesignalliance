<?php get_header(); ?>

<?php global $post; ?>
<?php
$src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), array(5600, 1000), false, '');

$loop = new WP_Query( array( 'post_type' => 'gallery', 'posts_per_page' => -1, 'tag' =>  '') ); ?>
<div class="w-section home-main sub-main" style="background-color: #00573c;
    background-image: -webkit-linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('<?php echo $src[0]; ?>');
    background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('<?php echo $src[0]; ?>');
    background-position: 50% 50%; background-size: cover;">
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
    </div>
</div>

<?php get_footer(); ?>
