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

<?php
global $post;
global $user_login;

// Login form arguments.
$args = array(
    'echo'           => true,
    'redirect'       => get_site_url(),
    'form_id'        => 'loginform',
    'label_username' => __( 'Username' ),
    'label_password' => __( 'Password' ),
    'label_remember' => __( 'Remember Me' ),
    'label_log_in'   => __( 'Log In' ),
    'id_username'    => 'user_login',
    'id_password'    => 'user_pass',
    'id_remember'    => 'rememberme',
    'id_submit'      => 'wp-submit',
    'remember'       => true,
    'value_username' => NULL,
    'value_remember' => true
);

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
                    <div class="w-col-12">
                        <div class="w-col w-col-12 w-col-small-12">
                            <?php echo the_content() ?>
                        </div>
                        <div class="w-col w-col-12 w-col-small-12">
                            <?php echo do_shortcode("[wpmem_form login]"); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
<?php get_footer(); ?>