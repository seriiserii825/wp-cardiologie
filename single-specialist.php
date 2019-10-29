<?php
if( ! defined('ABSPATH') ) exit;
get_header('sub-banner');
?>
<!--Start Content-->
<div class="content">
	
	<?php if ( have_posts() ) : the_post(); ?> 
	
	<!--Start Team Detail-->
	<div class="member-detail">
		<div class="container">
			
			<div class="row">
				<div class="col-md-12">
					<div class="main-title">
						<?php
							$specialist_title_1 = carbon_get_theme_option('crb_specialist_post_title_1'.carbon_lang());
							$specialist_title_2 = carbon_get_theme_option('crb_specialist_post_title_2'.carbon_lang());
							$specialist_desription = carbon_get_theme_option('crb_specialist_post_desription'.carbon_lang());
						?>
						<h2><span><?php echo $specialist_title_1; ?></span> <?php echo $specialist_title_2; ?></h2>
						<p><?php echo $specialist_desription; ?></p>
					</div>
				</div>
			</div>
			
			<div id="demo">
				<div class="row">
					
					<div class="span12">
							
							<div class="post item">
								
								<div class="col-md-5">
									
									<div class="gallery-sec">
										<div class="image-hover img-layer-slide-left-right">
											<?php 
												$img_id = carbon_get_the_post_meta('crb_category_specialist_im');
												$img_url = wp_get_attachment_url($img_id);
											?>
											<img src="<?php echo $img_url; ?>" alt="">
											<div class="layer">
												<a class="galler-sec__icon" href="<?php echo $facebook_url; ?>">	
													<i class="fab fa-facebook-f"></i>
												</a>
												<a class="galler-sec__icon" href="<?php echo $twitter_url; ?>">	
													<i class="fab fa-twitter"></i> 
												</a>
												<a class="galler-sec__icon" href="<?php echo $google_url; ?>">
													<i class="fab fa-google"></i>
												</a>
											</div>
										</div>
									</div>
									
								</div>
								
								<div class="col-md-7">
									<div class="team-detail">
										<?php 
	                                        $terms = get_the_terms(get_the_ID(), 'profession');
	                                        $facebook_url = carbon_get_the_post_meta('crb_specialist_facebook');
	                                        $twitter_url = carbon_get_the_post_meta('crb_specialist_twitter');
	                                        $google_url = carbon_get_the_post_meta('crb_specialist_google');
	                                        $study = carbon_get_the_post_meta('crb_specialist_study'.carbon_lang());
	                                        $experience = carbon_get_the_post_meta('crb_specialist_experience'.carbon_lang());
	                                        $week = carbon_get_the_post_meta('crb_specialist_week'.carbon_lang());
										?>
										
										<div class="name">
											<h6><?php the_title(); ?></h6>
										</div>
										
										<ul>
											<li><span class="title">Specialitate</span> <span><?php echo $terms[0]->name; ?></span></li>
											<li><span class="title">Studii</span> <span><?php echo $study; ?></span></li>
											<li><span class="title">Experienta</span> <span><?php echo $experience; ?></span></li>
											<li><span class="title">Despre mine</span> <span><?php the_content(); ?></span></li>
											<li><span class="title">Zile lucratoare</span> <span><?php echo $week; ?></span></li>
										</ul>
										
									</div>
								</div>
							</div>
								
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<!--End Team Detail-->
	<?php endif; ?>
	
	
</div>
<!--End Content-->

<?php get_footer(); ?>