<?php
/**
 * Template Name: Search Page
 *
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

$searchPage = get_page_by_title("Search");
$src = wp_get_attachment_image_src(get_post_thumbnail_id($searchPage), array(5600, 1000), false, '');
?>
    <div class="w-section home-main sub-main" style="background-color: #00573c;
        background-image: -webkit-linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('<?php echo $src[0]; ?>');
        background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('<?php echo $src[0]; ?>');
        background-position: 0% 0%, 0px 38%; background-size: cover;">
        <div class="w-container hero-container sub-hero-container">
            <h1 class="hero-h1">Search Results</h1>
            <p class="hero-supporting-text">for &ldquo;<?php echo get_search_query() ?>&rdquo;</p>
        </div>
    </div>

    <div class="w-section action-menu">
        <div class="w-container subpage-container">
            <?php if (have_posts()) : ?>
                <ul class="search-results">
                <?php while (have_posts()) : the_post(); ?>
                    <a href="<?php the_permalink() ?>">
                        <li>
                            <h3><?php the_title(); ?></h3>
                            <p><?php the_excerpt_max_charlength(300); ?></p>
<!--                            <a class="more-btn" href="--><?php //the_permalink(); ?><!--"><span style="padding-right:10px;">More</span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>-->
                        </li>
                    </a>
                    <hr />
                <?php endwhile; ?>
                </ul>
            <?php else : ?>
                <h2><strong>Oops.</strong></h2>
                <p>We couldn't find anything matching your search for <strong><?php echo get_search_query() ?></strong></p>

            <?php endif; ?>
        </div>
    </div>
<?php get_footer(); ?>