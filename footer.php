		<!--Start Footer-->
		<footer class="footer" id="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="emergency">
                            <i class="fas fa-mobile-alt"></i>
							<?php  
								$phone_emergency = carbon_get_theme_option('crb_phone');
								$phone_emergency_clear = str_replace(['(',')','-','+', ' '], '', $phone_emergency);
							 ?>
							<span class="text"><?php echo carbon_get_theme_option('crb_emergency_title'.carbon_lang()); ?></span>
							<a href="tel:<?php echo $phone_emergency_clear; ?>" class="number">
								<?php echo $phone_emergency; ?>
							</a>
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/emergency-divider.png" alt="">
						</div>
					</div>
				</div>
				<div class="main-footer">
					<div class="row">
						<?php if(!dynamic_sidebar( 'sidebar-footer' )): ?>
							<h1 style="color: white;">Locul pentru sidebar</h1>
						<?php endif; ?>
                    </div>
                </div>
			</div>

			<div class="footer-bottom">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<span class="copyrights"><?php echo carbon_get_theme_option('crb_copyright_text'.carbon_lang()); ?></span>
						</div>
						<div class="col-md-6">
							<div class="social-icons">
								<a href="mailto:<?php echo carbon_get_theme_option('crb_facebook'); ?>" class="fb">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
								<a href="mailto:<?php echo carbon_get_theme_option('crb_twitter'); ?>" class="tw"><i class="fab fa-twitter"></i></a>
								<a href="mailto:<?php echo carbon_get_theme_option('crb_google'); ?>" class="gp"><i class="fab fa-google-plus-g"></i></a>
								<a href="mailto:<?php echo carbon_get_theme_option('crb_vimeo'); ?>" class="vimeo"><i class="fab fa-vimeo-v"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!--End Footer-->
		<a href="#0" class="cd-top"></a>
	</div>


<?php wp_footer(); ?>
</body>

</html>
