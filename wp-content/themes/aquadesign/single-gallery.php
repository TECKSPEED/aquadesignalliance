<?php get_header(); ?>

<?php global $post; ?>
<?php
$src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), array(5600, 1000), false, '');
$loop = new WP_Query( array( 'post_type' => 'gallery', 'posts_per_page' => -1 ) );
$light = get_post_meta( get_the_ID(), 'tank_specifications_light', true );
$light_cycle = get_post_meta( get_the_ID(), 'tank_specifications_light_cycle', true );
$c02 = get_post_meta( get_the_ID(), 'tank_specifications_co2', true );
$aeration = get_post_meta( get_the_ID(), 'tank_specifications_aeration', true );
$filtration = get_post_meta( get_the_ID(), 'tank_specifications_filtration', true );
$tank_dimensions = get_post_meta( get_the_ID(), 'tank_specifications_tank_dimensions', true );
$substrate = get_post_meta( get_the_ID(), 'tank_specifications_substrate', true );
$flora = get_post_meta( get_the_ID(), 'tank_specifications_flora', true );
$fauna = get_post_meta( get_the_ID(), 'tank_specifications_fauna', true );
$hardscape = get_post_meta( get_the_ID(), 'tank_specifications_hardscape', true );

$tags = get_terms('post_tag', array('fields'=>'names') );
$args = array (
        'post_type' => 'gallery',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'post_tag',
                'field' => 'names',
                'terms' => '',
                'operator' => 'NOT IN'
            )
        )
);

$next_post = get_next_post();
$prev_post = get_previous_post();
?>
<div class="w-section home-main sub-main" style="background-color: #00573c;
    background-image: -webkit-linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('<?php echo $src[0]; ?>');
    background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('<?php echo $src[0]; ?>');
    background-position: 0% 0%, 0px 38%; background-size: cover;">
    <div class="w-container hero-container sub-hero-container">
        <h1 class="hero-h1">&ldquo;<?php the_title(); ?>&rdquo;</h1>
        <?php $t = wp_get_post_tags($post->ID, array('fields' => 'names')); ?>
        <?php if($t[0] == null) :?>
            <h2 class="hero-supporting-text">By: <?php echo get_post_meta(get_the_ID($loop->ID), 'aquascape_author_aquascape_quthor', true) ?></h2>
        <?php endif; ?>
    </div>
</div>
<div class="w-row pagination-rows ">
    <nav>
        <div class="w-col-12 w-col-small-12 nav-articles">
            <div class="w-col w-col-6 w-col-small-6 next">
                <?php if (!empty( $prev_post->post_title )): ?>
                    <a href="<?php echo $prev_post->guid ?>"><?php echo $prev_post->post_title ?></a>
                <?php endif ?>
            </div>
            <div class="w-col w-col-6 w-col-small-6 prev">
                <?php if (!empty( $next_post->post_title )): ?>
                    <a href="<?php echo get_permalink( $next_post->ID ); ?>"><?php echo $next_post->post_title; ?></a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</div>
    <div class="w-col breadcrumb-container">
        <div class="w-container breadcrumbs">
            <?php breadcrumbs(); ?>
        </div>
    </div>
<div class="w-section action-menu gallery-single">
    <div class="w-container subpage-container gallery-single">
        <div class="w-row gallery-row">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <div class="w-col w-col-6 w-col-small-12 pull-left">
                        <a rel="gallery" href="<?php echo the_post_thumbnail_url(); ?>" class="swipebox">
                            <div class="gallery-image" style="background-image: url(' <?php echo the_post_thumbnail_url() ?> ')"></div>
                        </a>
                        <div class="w-col-12 gallery-images-container">
                            <?php $galleryArray = get_post_gallery_ids($post->ID); ?>
                            <?php foreach ($galleryArray as $id) { ?>
                                <a rel="gallery" href="<?php echo wp_get_attachment_url( $id ); ?>" class="swipebox">
                                    <div class="w-col-3 gallery-image-option" style="background-image: url('<?php echo wp_get_attachment_url( $id ); ?>')"></div>
                                    <!--<img class="w-col-3 gallery-image-option" src="<?php echo wp_get_attachment_url( $id ); ?>" alt="image">-->
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="w-col w-col-6 w-col-small-12 pull-left">
                        <div class="gallery-info">
                            <!--<div class="gallery-title"><p class="single-gallery-h2">&ldquo;<?php echo get_the_title() ?>&rdquo;</p></div>-->
                            <!--<div class="gallery-author-container"><p class="single-gallery-author">By: <?php echo get_post_meta(get_the_ID($loop->ID), 'aquascape_author_aquascape_quthor', true) ?></p></div>-->
                            <div class="gallery-content"><?php echo the_content() ?></div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <div class="'w-row gallery-row">
            <div class="gallery-title">
                <p class="single-gallery-specs">Tank Specifications</p>
                <div class="w-col w-col-6 w-col-small-12">
                    <p class="tank-spec-item"><strong>Light: </strong><?php echo $light ?></p>
                    <p class="tank-spec-item"><strong>Light Cycle: </strong><?php echo $light_cycle ?></p>
                    <p class="tank-spec-item"><strong>Co2: </strong><?php echo $c02 ?></p>
                    <p class="tank-spec-item"><strong>Aeration: </strong><?php echo $aeration ?></p>
                    <p class="tank-spec-item"><strong>Filtration: </strong><?php echo $filtration ?></p>
                </div>
                <div class="w-col w-col-6 w-col-small-12">
                    <p class="tank-spec-item"><strong>Tank Dimensions: </strong><?php echo $tank_dimensions ?></p>
                    <p class="tank-spec-item"><strong>Substrate: </strong><?php echo $substrate ?></p>
                    <p class="tank-spec-item"><strong>Flora: </strong><?php echo $flora ?></p>
                    <p class="tank-spec-item"><strong>Fauna: </strong><?php echo $fauna ?></p>
                    <p class="tank-spec-item"><strong>Hardscape: </strong><?php echo $hardscape ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="w-row pagination-rows ">
    <nav>
        <div class="w-col-12 w-col-small-12 nav-articles">
            <div class="w-col w-col-6 w-col-small-6 next">
                <?php if (!empty( $prev_post->post_title )): ?>
                    <a href="<?php echo $prev_post->guid ?>"><?php echo $prev_post->post_title ?></a>
                <?php endif ?>
            </div>
            <div class="w-col w-col-6 w-col-small-6 prev">
                <?php if (!empty( $next_post->post_title )): ?>
                    <a href="<?php echo get_permalink( $next_post->ID ); ?>"><?php echo $next_post->post_title; ?></a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</div>
<?php get_footer(); ?>