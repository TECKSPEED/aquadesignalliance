<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aquadesign
 */

// $footer_copy	= get_field('footer_copy');
// $footer_signoff	= get_field('footer_signoff');


?>

<div class="w-section footer" style="background-image: url('<?php echo get_theme_mod( 'footer-image' ) ?>')">
  <div class="footer-overlay"></div>
  <div class="w-section main-footer">
    <div class="footer-social-links">
      <a href="<?php echo get_theme_mod( 'footer-facebook-link' )?>" target="_blank">
        <div class="footer-icon footer-facebook" style="background-image: url('<?php echo get_theme_mod( 'footer-facebook' )?>')"></div>
      </a>
      <a href="mailto:<?php echo get_theme_mod( 'footer-email-link' )?>">
        <div class="footer-icon footer-email" style="background-image: url('<?php echo get_theme_mod( 'footer-email' )?>')"></div>
      </a>
    </div>
  </div>
  <div class="footer-copyright">
      <p><?php echo get_theme_mod( 'footer-copyright' )?></p>
  </div>
</div>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <!-- <script type="text/javascript" src="js/webflow.js"></script> -->
  <!--[if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
</body>
</html>