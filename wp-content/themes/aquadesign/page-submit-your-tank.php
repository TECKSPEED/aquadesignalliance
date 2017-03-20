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
                <form name="submitYourTank" action="<?php formSubmit() ?>" method="post" class="syt-form submitYourTank">
                    <div class="w-col w-col-12">
                        <p class="single-gallery-specs">Aquascape Information</p>
                    </div>
                    <p>
                        <label> Aquascape Name*<br>
                            <span class="syt-form-control-wrap aquascape-name"><input type="text" name="aquascapeName" value="" size="40" class="syt-form-control syt-text syt-validates-as-required" aria-required="true" aria-invalid="false"></span>
                        </label>
                    </p>
                    <p>
                        <label> Aquascape Author*<br>
                            <span class="syt-form-control-wrap aquascape-author"><input type="text" name="aquascapeAuthor" value="" size="40" class="syt-form-control syt-text syt-validates-as-required" aria-required="true" aria-invalid="false"></span>
                        </label>
                    </p>
                    <p>
                        <label> Aquascape Inspiration* - tell us all about it!<br>
                            <span class="syt-form-control-wrap aquascape-name"><textarea name="aquascape-name" cols="40" rows="10" class="syt-form-control syt-textarea syt-validates-as-required" aria-required="true" aria-invalid="false"></textarea></span>
                        </label>
                    </p>
                    <div class="w-col w-col-12">
                        <p class="single-gallery-specs">Show us your Aquascape</p>
                    </div>
                    <p>
                        <span class="syt-form-control-wrap aquascapeImages">
                            <input type="file" name="aquascapeImages[]" size="40" class="syt-form-control syt-multifile syt-validates-as-required aquascapeImagery" id="aquascapeImages" multiple="multiple" aria-required="true" aria-invalid="false">
                        </span>
                    </p>
                    <div class="w-col w-col-12">
                        <p class="single-gallery-specs">Tank Specifications</p>
                    </div>
                    <div class="w-col w-col-6 w-col-small-12">
                        <label> Light Fixture*<br>
                            <span class="syt-form-control-wrap light-fixture"><input type="text" name="light-fixture" value="" size="40" class="syt-form-control syt-text syt-validates-as-required" aria-required="true" aria-invalid="false"></span>
                        </label>
                        <p><label> Light Cycle*<br>
                                <span class="syt-form-control-wrap light-cycle"><input type="text" name="light-cycle" value="" size="40" class="syt-form-control syt-text syt-validates-as-required" aria-required="true" aria-invalid="false"></span>
                            </label>
                        </p>
                        <p>
                            <label> Co2*<br>
                                <span class="syt-form-control-wrap co2">
                                    <select name="co2" class="syt-form-control syt-select syt-validates-as-required co2" aria-required="true" aria-invalid="false"
                                        <option value="Injection">Injection</option>
                                        <option value="DIY">DIY</option>
                                        <option value="Liquid">Liquid</option>
                                    </select>
                                </span>
                            </label>
                        </p>
                        <p>
                            <label> Aeration*<br>
                                <span class="syt-form-control-wrap aeration">
                                    <select name="aeration" class="syt-form-control syt-select syt-validates-as-required aeration" aria-required="true" aria-invalid="false">
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </span>
                            </label>
                        </p>
                        <p>
                            <label> Filtration*<br>
                                <span class="syt-form-control-wrap filtration"><input type="text" name="filtration" value="" size="40" class="syt-form-control syt-text syt-validates-as-required filtration" aria-required="true" aria-invalid="false"></span>
                            </label>
                        </p>
                    </div>
                    <div class="w-col w-col-6 w-col-small-12">
                        <label> Tank Dimensions*<br>
                            <span class="syt-form-control-wrap dimensions"><input type="text" name="dimensions" value="" size="40" class="syt-form-control syt-text syt-validates-as-required tank-dimensions" aria-required="true" aria-invalid="false"></span>
                        </label>
                        <p><label> Substrate*<br>
                                <span class="syt-form-control-wrap substrate"><input type="text" name="substrate" value="" size="40" class="syt-form-control syt-text syt-validates-as-required substrate" aria-required="true" aria-invalid="false"></span>
                            </label>
                        </p>
                        <p><label> Flora*<br>
                                <span class="syt-form-control-wrap Flora"><input type="text" name="Flora" value="" size="40" class="syt-form-control syt-text syt-validates-as-required flora" aria-required="true" aria-invalid="false"></span>
                            </label>
                        </p>
                        <p><label> Fauna*<br>
                                <span class="syt-form-control-wrap fauna"><input type="text" name="fauna" value="" size="40" class="syt-form-control syt-text syt-validates-as-required fauna" aria-required="true" aria-invalid="false"></span>
                            </label>
                        </p>
                        <p><label> Hardscape*<br>
                                <span class="syt-form-control-wrap hardscape"><input type="text" name="hardscape" value="" size="40" class="syt-form-control syt-text syt-validates-as-required hardscape" aria-required="true" aria-invalid="false"></span>
                            </label>
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

<?php function formSubmit() {
    if(isset($_POST['submit'])){
        $files = $_FILES['aquascapeImages']['name'];
        $files_count = count($files);

        for($i = 0; $i < $files_count; $i++) {
            //Get the temp file path
            $tmpFilePath = $_FILES['aquascapeImages']['tmp_name'][$i];

            //Make sure we have a filepath
            if ($tmpFilePath != ""){
                //Setup our new file path
                $newFilePath = "./uploadFiles/" . $_FILES['aquascapeImages']['name'][$i];

                //Upload the file into the temp dir
                if(move_uploaded_file($tmpFilePath, $newFilePath)) {

                    //Handle other code here

                }
            }
        }
    }

}
?>
