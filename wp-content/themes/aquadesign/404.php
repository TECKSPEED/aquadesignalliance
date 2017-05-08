<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package aquadesign
 *
 */

get_header(); ?>

<?php global $post; ?>
<?php
$src = "http://aquadesignalliance.com/wp-content/uploads/2017/04/ryu_1.jpg";
?>
<div class="w-section home-main sub-main" style="background-color: #00573c;
        background-image: -webkit-linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('<?php echo $src; ?>');
        background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('<?php echo $src; ?>');
        background-position: 50% 50%;
        background-size: cover;">
    <div class="w-container hero-container sub-hero-container">
        <h1 class="hero-h1">404</h1>
    </div>
</div>

<div class="w-section action-menu">
    <div class="w-container subpage-container">
        <div id="primary" class="content-area">
            <div id="content" class="site-content" role="main">

                <header class="page-header">
                    <h2 class="page-title" style="text-align:center;"><?php _e( 'We got swept away in a rip tide!'); ?></h2>
                </header>

                <div class="page-wrapper">
                    <div class="page-content">
                       <p style="text-align:center;">Try using the search below to find what you were looking for. No one is perfect but we sure strive to be!</p>
                        <div class="search-404">
                            <?php get_search_form(); ?>
                        </div>
                    </div><!-- .page-content -->
                </div><!-- .page-wrapper -->

            </div><!-- #content -->
        </div><!-- #primary -->
    </div>
</div>

<?php get_footer(); ?>
