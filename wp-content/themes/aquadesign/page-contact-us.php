<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aquadesign
 */

get_header(); ?>

<?php global $post; ?>
<?php
$src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), array(5600, 1000), false, '');
?>
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
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <div class="w-row">
                        <div class="w-col w-col-small-12 w-col-6">
                            <?php the_content('Read the rest of this entry »'); ?>
                        </div>
                        <div class="w-col w-col-small-12 w-col-6">
                            <h2>Thanks for 'scaping with us!</h2>
                            <p>We hope your enjoying your time here, if you should ever want to get in touch with us directly fill out the form. We love to hear from fellow hobbyists!</p>
                            <p>If your having trouble finding your way - it's ok! Here are some links that may be most useful to you:</p>
                            <ul>
                                <li><a href="/gallery">Gallery</a></li>
                                <li><a href="/contests">Contests</a></li>
                            </ul>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
<?php get_footer(); ?>