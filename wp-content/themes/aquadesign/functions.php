<?php
/**
 * aquadesign functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package aquadesign
 */

include('functions-loginout.php');

if ( ! function_exists( 'aquadesign_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function aquadesign_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on aquadesign, use a find and replace
	 * to change 'aquadesign' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'aquadesign', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	
	register_nav_menus( array(
		'primary-left' => esc_html__( 'Primary Menu Left', 'aquadesign' ),
		'primary-right' => esc_html__( 'Primary Menu Right', 'aquadesign' ),
		'mobile' => esc_html__( 'Mobile Menu', 'aquadesign' ),
		'utility' => __( 'Utility Menu', 'Utility ' ),
		'subnav' => __( 'Sub Nav' ),
	) );
	add_action('wp_enqueue_scripts', 'cssmenumaker_scripts_styles' ); function cssmenumaker_scripts_styles() {
   #wp_enqueue_style( 'cssmenu-styles', get_template_directory_uri() . '/cssmenu/styles.css');
}
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'aquadesign_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // aquadesign_setup
add_action( 'after_setup_theme', 'aquadesign_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function aquadesign_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'aquadesign_content_width', 640 );
}
add_action( 'after_setup_theme', 'aquadesign_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function aquadesign_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'aquadesign' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'aquadesign_widgets_init' );


function breadcrumbs() {
		$post_ID = get_queried_object_id();
		$title = get_the_title();
		$ancestors = get_ancestors($post_ID, 'page');
		$r_ancestor = array_reverse($ancestors);
		$count = count($ancestors); ?>

        <ul class="w-hidden-small w-hidden-tiny breadcrumb">
            <!-- homepage -->
            <li class="breadcrumb-item breadcrumb-home">
                <a class="breadcrumb-link" href="<?php echo site_url(); ?>">&#xf015;</a>
            </li>

            <!-- parent items -->
      <?php foreach($r_ancestor as $key => $ancestor){ ?>
        <?php if($key > 0) { ?>
                <li class="breadcrumb-item breadcrumb-separator">&#xf105;</i></li>
                <li class="breadcrumb-item">
                    <a class="breadcrumb-link" href="<?php echo get_permalink($ancestor)?>"><?php echo get_the_title($ancestor)?></a>
                </li>
        <?php } ?>
      <?php } ?>

            <!-- last item  -->
            <li class="breadcrumb-item breadcrumb-separator">&#xf105;</i></li>
            <li class="breadcrumb-item">
                <a class="breadcrumb-link" href="<?php echo get_permalink($post_ID)?>"><?php echo $title;?></a>
            </li>
        </ul>

<?php } 

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 500, 500 );
	
	function blm2016_init_method() {
    wp_enqueue_script('jquery');
    #wp_enqueue_script( 'slides', get_template_directory_uri().'/js/slides.min.jquery.js', array( 'jquery' ) );

}
add_action('wp_enqueue_scripts', 'blm2016_init_method');

/**
 * Enqueue scripts and styles.
 */
function aquadesign_scripts() {
	wp_enqueue_style( 'aquadesign-style', get_stylesheet_uri() );

	wp_enqueue_script( 'aquadesign-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'aquadesign-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'aquadesign_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
* Breadcrumb
*/
function the_breadcrumb() {
                echo '<ul class="w-hidden-small w-hidden-tiny breadcrumb">';
        if (!is_home()) {
                echo '<li class="breadcrumb-item breadcrumb-home"> <a href="';
                echo get_option('home');
                echo '">';
                echo 'Home ';
                echo "</a></li>";
                if (is_category() || is_single()) {
                        echo '<li class="breadcrumb-item breadcrumb-home">';
                        the_category(' </li><li class="breadcrumb-item breadcrumb-home">');
                        if (is_single()) {
                                echo "</li><li>";
                                the_title();
                                echo '</li>';
                        }
                } elseif (is_page()) {
                        echo '<li class="breadcrumb-item breadcrumb-home">';
                        echo the_title();
                        echo '</li>';
                }
        }
        elseif (is_tag()) {single_tag_title();}
        elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
        elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
        elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
        elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
        elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
        elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
        echo '</ul>';
}

function theme_name_scripts() {
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );



/**
 * Generated by the WordPress Meta Box generator
 * at http://jeremyhixon.com/tool/wordpress-meta-box-generator/
 */

function hero_details_get_meta( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}

function hero_details_add_meta_box() {
	add_meta_box(
		'hero_details-hero-details',
		__( 'Hero Details', 'hero_details' ),
		'hero_details_html',
		'page',
		'side',
		'default'
	);
}
add_action( 'add_meta_boxes', 'hero_details_add_meta_box' );

function hero_details_html( $post) {
	wp_nonce_field( '_hero_details_nonce', 'hero_details_nonce' ); ?>

	<p>The place for you to put the Hero details such as name of the aquascape and the author</p>

	<p>
		<label for="hero_details_title_of_aquascape"><?php _e( 'Title of Aquascape', 'hero_details' ); ?></label><br>
		<input type="text" name="hero_details_title_of_aquascape" id="hero_details_title_of_aquascape" value="<?php echo hero_details_get_meta( 'hero_details_title_of_aquascape' ); ?>">
	</p>	<p>
	<label for="hero_details_author"><?php _e( 'Author', 'hero_details' ); ?></label><br>
	<input type="text" name="hero_details_author" id="hero_details_author" value="<?php echo hero_details_get_meta( 'hero_details_author' ); ?>">
	</p><?php
}

function hero_details_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['hero_details_nonce'] ) || ! wp_verify_nonce( $_POST['hero_details_nonce'], '_hero_details_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['hero_details_title_of_aquascape'] ) )
		update_post_meta( $post_id, 'hero_details_title_of_aquascape', esc_attr( $_POST['hero_details_title_of_aquascape'] ) );
	if ( isset( $_POST['hero_details_author'] ) )
		update_post_meta( $post_id, 'hero_details_author', esc_attr( $_POST['hero_details_author'] ) );
}
add_action( 'save_post', 'hero_details_save' );

/*
	Usage: hero_details_get_meta( 'hero_details_title_of_aquascape' )
	Usage: hero_details_get_meta( 'hero_details_author' )
*/



/**
 * Generated by the WordPress Meta Box generator
 * at http://jeremyhixon.com/tool/wordpress-meta-box-generator/
 */

function homepage_quote_get_meta( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}

function homepage_quote_add_meta_box() {
	add_meta_box(
		'homepage_quote-homepage-quote',
		__( 'Homepage Quote', 'homepage_quote' ),
		'homepage_quote_html',
		'page',
		'normal',
		'default'
	);
}
add_action( 'add_meta_boxes', 'homepage_quote_add_meta_box' );

function homepage_quote_html( $post) {
	wp_nonce_field( '_homepage_quote_nonce', 'homepage_quote_nonce' ); ?>

	<p>The content needed for the Homepage quote, this includes the text and author of the quote</p>

    <p>
        <label for="homepage_quote_quote_author"><?php _e( 'Quote Author', 'homepage_quote' ); ?></label><br>
        <input type="text" name="homepage_quote_quote_author" id="homepage_quote_quote_author" value="<?php echo homepage_quote_get_meta( 'homepage_quote_quote_author' ); ?>">
    </p>
	<p>
		<label for="homepage_quote_quote"><?php _e( 'Quote', 'homepage_quote' ); ?></label><br>
		<?php wp_editor( homepage_quote_get_meta( 'homepage_quote_quote' ), "homepage_quote_quote"); ?>

	</p><?php
}

function homepage_quote_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['homepage_quote_nonce'] ) || ! wp_verify_nonce( $_POST['homepage_quote_nonce'], '_homepage_quote_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['homepage_quote_quote'] ) )
		update_post_meta( $post_id, 'homepage_quote_quote', esc_attr( $_POST['homepage_quote_quote'] ) );
	if ( isset( $_POST['homepage_quote_quote_author'] ) )
		update_post_meta( $post_id, 'homepage_quote_quote_author', esc_attr( $_POST['homepage_quote_quote_author'] ) );
}
add_action( 'save_post', 'homepage_quote_save' );

/*
	Usage: homepage_quote_get_meta( 'homepage_quote_quote' )
	Usage: homepage_quote_get_meta( 'homepage_quote_quote_author' )
*/


/**
 * Generated by the WordPress Meta Box generator
 * at http://jeremyhixon.com/tool/wordpress-meta-box-generator/
 */

function aquascape_author_get_meta( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}

function aquascape_author_add_meta_box() {
	add_meta_box(
		'aquascape_author-aquascape-author',
		__( 'Aquascape Author', 'aquascape_author' ),
		'aquascape_author_html',
		'gallery',
		'side',
		'default'
	);
}
add_action( 'add_meta_boxes', 'aquascape_author_add_meta_box' );

function aquascape_author_html( $post) {
	wp_nonce_field( '_aquascape_author_nonce', 'aquascape_author_nonce' ); ?>

	<p>The author of the aquascape, used in the featured gallery and on the actual gallery page</p>

	<p>
	<label for="aquascape_author_aquascape_quthor"><?php _e( 'Aquascape Quthor', 'aquascape_author' ); ?></label><br>
	<input type="text" name="aquascape_author_aquascape_quthor" id="aquascape_author_aquascape_quthor" value="<?php echo aquascape_author_get_meta( 'aquascape_author_aquascape_quthor' ); ?>">
	</p><?php
}

function aquascape_author_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['aquascape_author_nonce'] ) || ! wp_verify_nonce( $_POST['aquascape_author_nonce'], '_aquascape_author_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['aquascape_author_aquascape_quthor'] ) )
		update_post_meta( $post_id, 'aquascape_author_aquascape_quthor', esc_attr( $_POST['aquascape_author_aquascape_quthor'] ) );
}
add_action( 'save_post', 'aquascape_author_save' );

/*
	Usage: aquascape_author_get_meta( 'aquascape_author_aquascape_quthor' )
*/

/**
 * Generated by the WordPress Meta Box generator
 * at http://jeremyhixon.com/tool/wordpress-meta-box-generator/
 */

function intro_text_get_meta( $value ) {
    global $post;

    $field = get_post_meta( $post->ID, $value, true );
    if ( ! empty( $field ) ) {
        return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
    } else {
        return false;
    }
}

function intro_text_add_meta_box() {
    add_meta_box(
        'intro_text-intro-text',
        __( 'Intro Text', 'intro_text' ),
        'intro_text_html',
        'page',
        'normal',
        'default'
    );
}
add_action( 'add_meta_boxes', 'intro_text_add_meta_box' );

function intro_text_html( $post) {
    wp_nonce_field( '_intro_text_nonce', 'intro_text_nonce' ); ?>

    <p>Intro text for any page, this can be used as a place to enter one paragraph which will display as the first paragraph on the page after the hero banner image</p>

    <p>
    <?php wp_editor(intro_text_get_meta( 'intro_text_intro_text' ), "intro_text_intro_text"); ?>

    </p><?php
}

function intro_text_save( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! isset( $_POST['intro_text_nonce'] ) || ! wp_verify_nonce( $_POST['intro_text_nonce'], '_intro_text_nonce' ) ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    if ( isset( $_POST['intro_text_intro_text'] ) )
        update_post_meta( $post_id, 'intro_text_intro_text', esc_attr( $_POST['intro_text_intro_text'] ) );
}
add_action( 'save_post', 'intro_text_save' );

/*
	Usage: intro_text_get_meta( 'intro_text_intro_text' )
*/

function add_featured_galleries_to_ctp( $post_types ) {
    array_push($post_types, 'gallery'); // ($post_types comes in as array('post','page'). If you don't want FGs on those, you can just return a custom array instead of adding to it. )
    return $post_types;
}
add_filter('fg_post_types', 'add_featured_galleries_to_ctp' );

/**
 * Generated by the WordPress Meta Box generator
 * at http://jeremyhixon.com/tool/wordpress-meta-box-generator/
 */

function tank_specifications_get_meta( $value ) {
    global $post;

    $field = get_post_meta( $post->ID, $value, true );
    if ( ! empty( $field ) ) {
        return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
    } else {
        return false;
    }
}

function tank_specifications_add_meta_box() {
    add_meta_box(
        'tank_specifications-tank-specifications',
        __( 'Tank Specifications', 'tank_specifications' ),
        'tank_specifications_html',
        'gallery',
        'normal',
        'default'
    );
}
add_action( 'add_meta_boxes', 'tank_specifications_add_meta_box' );

function tank_specifications_html( $post) {
    wp_nonce_field( '_tank_specifications_nonce', 'tank_specifications_nonce' ); ?>

    <p>Used to enter all of the tank specifications of each gallery</p>

    <p>
        <label for="tank_specifications_light"><?php _e( 'Light', 'tank_specifications' ); ?></label><br>
        <input type="text" name="tank_specifications_light" id="tank_specifications_light" style="width:100%;" value="<?php echo tank_specifications_get_meta( 'tank_specifications_light' ); ?>">
    </p>	<p>
        <label for="tank_specifications_light_cycle"><?php _e( 'Light Cycle', 'tank_specifications' ); ?></label><br>
        <input type="text" name="tank_specifications_light_cycle" id="tank_specifications_light_cycle" style="width:100%;" value="<?php echo tank_specifications_get_meta( 'tank_specifications_light_cycle' ); ?>">
    </p>	<p>
        <label for="tank_specifications_co2"><?php _e( 'Co2', 'tank_specifications' ); ?></label><br>
        <input type="text" name="tank_specifications_co2" id="tank_specifications_co2" style="width:100%;" value="<?php echo tank_specifications_get_meta( 'tank_specifications_co2' ); ?>">
    </p>	<p>
        <label for="tank_specifications_aeration"><?php _e( 'Aeration', 'tank_specifications' ); ?></label><br>
        <input type="text" name="tank_specifications_aeration" id="tank_specifications_aeration" style="width:100%;" value="<?php echo tank_specifications_get_meta( 'tank_specifications_aeration' ); ?>">
    </p>	<p>
        <label for="tank_specifications_filtration"><?php _e( 'Filtration', 'tank_specifications' ); ?></label><br>
        <input type="text" name="tank_specifications_filtration" id="tank_specifications_filtration" style="width:100%;" value="<?php echo tank_specifications_get_meta( 'tank_specifications_filtration' ); ?>">
    </p>	<p>
        <label for="tank_specifications_tank_dimensions"><?php _e( 'Tank Dimensions', 'tank_specifications' ); ?></label><br>
        <input type="text" name="tank_specifications_tank_dimensions" id="tank_specifications_tank_dimensions" style="width:100%;" value="<?php echo tank_specifications_get_meta( 'tank_specifications_tank_dimensions' ); ?>">
    </p>	<p>
        <label for="tank_specifications_substrate"><?php _e( 'Substrate', 'tank_specifications' ); ?></label><br>
        <input type="text" name="tank_specifications_substrate" id="tank_specifications_substrate" style="width:100%;" value="<?php echo tank_specifications_get_meta( 'tank_specifications_substrate' ); ?>">
    </p>	<p>
        <label for="tank_specifications_flora"><?php _e( 'Flora', 'tank_specifications' ); ?></label><br>
        <input type="text" name="tank_specifications_flora" id="tank_specifications_flora" style="width:100%;" value="<?php echo tank_specifications_get_meta( 'tank_specifications_flora' ); ?>">
    </p>	<p>
        <label for="tank_specifications_fauna"><?php _e( 'Fauna', 'tank_specifications' ); ?></label><br>
        <input type="text" name="tank_specifications_fauna" id="tank_specifications_fauna" style="width:100%;" value="<?php echo tank_specifications_get_meta( 'tank_specifications_fauna' ); ?>">
    </p>	<p>
    <label for="tank_specifications_hardscape"><?php _e( 'Hardscape', 'tank_specifications' ); ?></label><br>
    <input type="text" name="tank_specifications_hardscape" id="tank_specifications_hardscape" style="width:100%;" value="<?php echo tank_specifications_get_meta( 'tank_specifications_hardscape' ); ?>">
    </p><?php
}

function tank_specifications_save( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! isset( $_POST['tank_specifications_nonce'] ) || ! wp_verify_nonce( $_POST['tank_specifications_nonce'], '_tank_specifications_nonce' ) ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    if ( isset( $_POST['tank_specifications_light'] ) )
        update_post_meta( $post_id, 'tank_specifications_light', esc_attr( $_POST['tank_specifications_light'] ) );
    if ( isset( $_POST['tank_specifications_light_cycle'] ) )
        update_post_meta( $post_id, 'tank_specifications_light_cycle', esc_attr( $_POST['tank_specifications_light_cycle'] ) );
    if ( isset( $_POST['tank_specifications_co2'] ) )
        update_post_meta( $post_id, 'tank_specifications_co2', esc_attr( $_POST['tank_specifications_co2'] ) );
    if ( isset( $_POST['tank_specifications_aeration'] ) )
        update_post_meta( $post_id, 'tank_specifications_aeration', esc_attr( $_POST['tank_specifications_aeration'] ) );
    if ( isset( $_POST['tank_specifications_filtration'] ) )
        update_post_meta( $post_id, 'tank_specifications_filtration', esc_attr( $_POST['tank_specifications_filtration'] ) );
    if ( isset( $_POST['tank_specifications_tank_dimensions'] ) )
        update_post_meta( $post_id, 'tank_specifications_tank_dimensions', esc_attr( $_POST['tank_specifications_tank_dimensions'] ) );
    if ( isset( $_POST['tank_specifications_substrate'] ) )
        update_post_meta( $post_id, 'tank_specifications_substrate', esc_attr( $_POST['tank_specifications_substrate'] ) );
    if ( isset( $_POST['tank_specifications_flora'] ) )
        update_post_meta( $post_id, 'tank_specifications_flora', esc_attr( $_POST['tank_specifications_flora'] ) );
    if ( isset( $_POST['tank_specifications_fauna'] ) )
        update_post_meta( $post_id, 'tank_specifications_fauna', esc_attr( $_POST['tank_specifications_fauna'] ) );
    if ( isset( $_POST['tank_specifications_hardscape'] ) )
        update_post_meta( $post_id, 'tank_specifications_hardscape', esc_attr( $_POST['tank_specifications_hardscape'] ) );
}
add_action( 'save_post', 'tank_specifications_save' );

/*
	Usage: tank_specifications_get_meta( 'tank_specifications_light' )
	Usage: tank_specifications_get_meta( 'tank_specifications_light_cycle' )
	Usage: tank_specifications_get_meta( 'tank_specifications_co2' )
	Usage: tank_specifications_get_meta( 'tank_specifications_aeration' )
	Usage: tank_specifications_get_meta( 'tank_specifications_filtration' )
	Usage: tank_specifications_get_meta( 'tank_specifications_tank_dimensions' )
	Usage: tank_specifications_get_meta( 'tank_specifications_substrate' )
	Usage: tank_specifications_get_meta( 'tank_specifications_flora' )
	Usage: tank_specifications_get_meta( 'tank_specifications_fauna' )
	Usage: tank_specifications_get_meta( 'tank_specifications_hardscape' )
*/


function gallery_post_type() {
	$labels = array(
		'name'               => 'Galleries',
		'singular_name'      => 'Gallery',
		'menu_name'          => 'Galleries',
		'name_admin_bar'     => 'Gallery',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New Gallery',
		'new_item'           => 'New Gallery',
		'edit_item'          => 'Edit Gallery',
		'view_item'          => 'View Gallery',
		'all_items'          => 'All Galleries',
		'search_items'       => 'Search Galleries',
		'parent_item_colon'  => 'Parent Galleries:',
		'not_found'          => 'No galleries found.',
		'not_found_in_trash' => 'No galleries found in Trash.'
	);

	$args = array(
		'public'      => true,
		'labels'      => $labels,
		'supports' => array( 'title', 'editor', 'thumbnail', 'comments', 'custom-fields', 'page-attributes' ),
		'description' => 'Galleries to be used for user submitted tanks and aquascapes'
	);
	register_post_type( 'gallery', $args );
}
add_action( 'init', 'gallery_post_type' );


function aquadesign_customize( $wp_customize ) {
	//All our sections, settings, and controls will be added here
	$wp_customize->add_section( 'AquaDesign Settings' , array(
		'title'       => __( 'AquaDesign Settings', 'AquaDesign Alliance' ),
		'priority'    => 30,
		'description' => 'Change various settings for the Aquadesign theme',
	) );


	$wp_customize->add_setting( 'footer-image' );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer-image', array(
		'label'    => __( 'Footer Image', 'aquadesign_customize' ),
		'section'  => 'AquaDesign Settings',
		'settings' => 'footer-image',
	) ) );

	$wp_customize->add_setting( 'footer-facebook' );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer-facebook', array(
		'label'    => __( 'Footer Facebook Image', 'aquadesign_customize' ),
		'section'  => 'AquaDesign Settings',
		'settings' => 'footer-facebook',
	) ) );

	$wp_customize->add_setting( 'footer-facebook-link' );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer-facebook-link', array(
		'label'    => __( 'Footer Facebook Group Link', 'aquadesign_customize' ),
		'section'  => 'AquaDesign Settings',
		'settings' => 'footer-facebook-link',
	) ) );

	$wp_customize->add_setting( 'footer-email' );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer-email', array(
		'label'    => __( 'Footer Email Image', 'aquadesign_customize' ),
		'section'  => 'AquaDesign Settings',
		'settings' => 'footer-email',
	) ) );

	$wp_customize->add_setting( 'footer-email-link' );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer-email-link', array(
		'label'    => __( 'Footer Email Address', 'aquadesign_customize' ),
		'section'  => 'AquaDesign Settings',
		'settings' => 'footer-email-link',
	) ) );

	$wp_customize->add_setting( 'footer-copyright' );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer-copyright', array(
		'label'    => __( 'Footer Copyright', 'aquadesign_customize' ),
		'section'  => 'AquaDesign Settings',
		'settings' => 'footer-copyright',
	) ) );
}
add_action( 'customize_register', 'aquadesign_customize' );

add_action( 'init', 'register_taxonomy_for_galleries' );
function register_taxonomy_for_galleries() {
    register_taxonomy_for_object_type( 'post_tag', 'gallery' );
};

add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}

add_filter( 'wpmem_login_form_args',    'remove_wpmem_txt_code' );
add_filter( 'wpmem_register_form_args', 'remove_wpmem_txt_code' );
function remove_wpmem_txt_code( $args ){
    $args = array(
        'txt_before' => '',
        'txt_after'  => ''
    );
    return $args;
}

function the_excerpt_max_charlength($charlength) {
    $excerpt = get_the_excerpt();
    $charlength++;

    if ( mb_strlen( $excerpt ) > $charlength ) {
        $subex = mb_substr( $excerpt, 0, $charlength - 5 );
        $exwords = explode( ' ', $subex );
        $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
        if ( $excut < 0 ) {
            echo mb_substr( $subex, 0, $excut );
        } else {
            echo $subex;
        }
        echo '. . .';
    } else {
        echo $excerpt;
    }
}
?>