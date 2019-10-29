<?php
get_header('sub-banner');
?>

	<!--Start Content-->
	<div class="content">

		<div class="contact-us">
			<div class="container">

				<div class="row">
					<div class="col-md-12">

                        <div class="main-title">
							<?php
							$title_1 = carbon_get_theme_option('crb_contacts_title_1'.carbon_lang());
							$title_2 = carbon_get_theme_option('crb_contacts_title_2'.carbon_lang());
							$title_3 = carbon_get_theme_option('crb_contacts_title_3'.carbon_lang());
							?>
                            <h2><span><?php echo $title_1; ?></span> <?php echo $title_2; ?> <span><?php echo $title_3; ?></span></h2>
                        </div>


						<div class="our-location">
                            <?php if(have_posts()): ?>
                                    <?php the_post(); ?>
									<?php the_content(); ?>

                                <?php else: ?>
                            <?php endif; ?>
						</div>

					</div>
				</div>

			</div>


			<div class="leave-msg dark-back">
				<div class="container">
					<?php
						$title_addres_1 = carbon_get_theme_option('crb_contacts_address_1'.carbon_lang());
						$title_addres_2 = carbon_get_theme_option('crb_contacts_address_2'.carbon_lang());
						$phone = carbon_get_theme_option('crb_phone');
						$phone_clear = str_replace(['(',')','-','+', ' '], '', $phone);
						$phone1 = carbon_get_theme_option('crb_contacts_phone_1');
						$phone_clear1 = str_replace(['(',')','-','+', ' '], '', $phone1);
						$phone2 = carbon_get_theme_option('crb_contacts_phone_2');
						$phone_clear2 = str_replace(['(',')','-','+', ' '], '', $phone2);
						$phone3 = carbon_get_theme_option('crb_contacts_phone_3');
						$phone_clear3 = str_replace(['(',')','-','+', ' '], '', $phone3);
						$phone4 = carbon_get_theme_option('crb_contacts_phone_4');
						$phone_clear4 = str_replace(['(',')','-','+', ' '], '', $phone4);
						$email = carbon_get_theme_option('crb_email');
						$address = carbon_get_theme_option('crb_address'.carbon_lang());
						$facebook = carbon_get_theme_option('crb_facebook');
						$twitter = carbon_get_theme_option('crb_twitter');
						$google = carbon_get_theme_option('crb_google');
						$vimeo = carbon_get_theme_option('crb_vimeo');
					?>

					<div class="rox">
						<div class="col-md-7">
                            <div class="main-title">
                                <h2><span><?php echo $title_addres_1; ?><span></h2>
                            </div>

							<div class="form">
								<div class="row">
                                    <?php if(get_lang() == '_ro'): ?>
	                                    <?php echo do_shortcode('[contact-form-7 id="87" title="Contact-page-form"]'); ?>
                                    <?php else: ?>
                                    <?php echo do_shortcode('[contact-form-7 id="391" title="Contact-page-form ru"]'); ?>
                                    <?php endif; ?>
								</div>
							</div>

						</div>

						<div class="col-md-5">

							<div class="contact-get">
								<div class="main-title">
									<h2> <?php echo $title_addres_2; ?></h2>
								</div>

								<div class="get-in-touch">
									<div class="detail">
										<span><b>Telefon:</b> <a href="tel:<?php echo $phone_clear; ?>"><?php echo $phone; ?></a></span>
                                        <div class="contacts-phones">
											<?php if($phone1): ?>
												<a href="tel:<?php echo $phone_clear1; ?>"><?php echo $phone1; ?></a>
											<?php endif; ?>

											<?php if($phone2): ?>
												<a href="tel:<?php echo $phone_clear2; ?>"><?php echo $phone2; ?></a>
											<?php endif; ?>

                                        </div>
										<span><b>Email:</b> <a href="<?php echo $email; ?>"><?php echo $email; ?></a></span>
										<span><b>Adresa:</b> <?php echo $address;?></span>
									</div>

									<div class="social-icons">
										<a href="<?php echo $facebook; ?>" class="fb"><i class="fab fa-facebook-f"></i></a>
										<a href="<?php echo $twitter ?>" class="tw"><i class="fab fa-twitter"></i></a>
										<a href="<?php echo $google; ?>" class="gp"><i class="fab fa-google-plus-g"></i></a>
										<a href="<?php echo $vimeo; ?>" class="vimeo"><i class="fab fa-vimeo-v"></i></a>
									</div>
								</div>
							</div>

						</div>

					</div>

				</div>
			</div>

		</div>


	</div>
	<!--End Content-->


<?php
get_footer();

