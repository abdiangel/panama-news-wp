<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Panama_News
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer footer">
	<div class="footer__logo">
	<img src="<?php echo get_template_directory_uri() . "/assets/imgs/footer-logo.png" ?>" alt="Panamá news logo" />
      </div>
      <div class="container">
        <div footer__nav>
		<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
				'menu_class'	=> 'footer__nav-list',
			) );
			?>
        </div>
        <div class="footer__social">
            <i class="footer__social-icon">
              <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
            </i>
            <i class="footer__social-icon">
              <a href="https://twitter.com/dpanamanews" target="_blank"><i class="fab fa-twitter"></i></a>
            </i>
            <i class="footer__social-icon">
              <a href="https://www.instagram.com/dpanamanews/" target="_blank"><i class="fab fa-instagram"></i></a>
            </i>
          </div>
      </div>
      <div class="footer__copyright">
        <span class="footer__copyright-text"
          >D Panamá News <?php echo date_i18n( 'Y' ) ?> - Todos los derechos reservados</span
        >
      </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
