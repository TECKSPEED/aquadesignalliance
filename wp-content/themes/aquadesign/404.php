<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php the_content('Read the rest of this entry »'); ?>
                <form name="submitYourTank" action="<?php echo get_bloginfo('template_url'); ?>/submit-your-tank-parser.php" method="post" class="syt-form submitYourTank" enctype="multipart/form-data">
                    <div class="w-col w-col-12">
                        <p class="single-gallery-specs">Show us your Aquascape</p>
                    </div>
                    <div>
                        <p>
                            <label>Name</label>
                            <span>
                                <input type="text" name="name" size="40">
                            </span>
                        </p>
                        <p>
                        <span class="syt-form-control-wrap aquascapeImages">
                            <input type="file" name="photo[]" multiple>
                        </span>
                        </p>
                        <p><input type="submit" name="submit" value="Send" class="syt-form-control syt-submit">
                        </p>
                    </div>
                    <div class="syt-response-output syt-display-none"></div>
                </form>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
