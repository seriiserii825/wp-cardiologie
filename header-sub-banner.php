<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div id="wrap">

		<!--Start Top Bar-->
		<div class="top-bar">
			<div class="container">
				<div class="row">
					<div class="col-md-5">
                        <span><?php echo carbon_get_theme_option('crb_header_slogan'.get_lang()); ?></span>
					</div>

					<div class="col-md-7">
						<div class="get-touch">
							<ul>
								<li>
									<?php 
										$phone = carbon_get_theme_option('crb_phone');
										$phone_clear = str_replace(['(',')','-','+', ' '], '', $phone);
									?>
									<a href="tel:<?php echo $phone_clear; ?>">
										<i class="fas fa-phone"></i>
										<?php  echo $phone; ?>
									</a>
								</li>
								<li>
									<a href="mailto:<?php  echo carbon_get_theme_option('crb_email'); ?>">
										<i class="far fa-envelope"></i>

									<?php  echo carbon_get_theme_option('crb_email'); ?>
									</a>
								</li>
							</ul>

							<ul class="social-icons">
								<li><a href="<?php echo carbon_get_theme_option('crb_facebook'); ?>" class="fb">
									<i class="fab fa-facebook-f"></i>
								</a></li>
								<li><a href="<?php echo carbon_get_theme_option('crb_twitter'); ?>" class="tw">
									<i class="fab fa-twitter"></i>
								</a></li>
								<li><a href="<?php echo carbon_get_theme_option('crb_google'); ?>" class="gp">
									<i class="fab fa-google-plus-g"></i>
								</a></li>
							</ul>

						</div>
					</div>

				</div>
			</div>
		</div>
		<!--Top Bar End-->

		<!--Start Header-->
		<header class="header">
			<div class="container">
				<div class="row">

					<div class="col-md-3">
						<div class="header-logo">
							<?php the_custom_logo();  ?>
						</div>
					</div>

					<div class="col-md-9">

						<?php wp_nav_menu( array(
							'theme_location'  => 'primary_menu',
							'container'       => 'nav',
							'container_class' => 'menu-2',
							'container_id'    => '',
							'menu_class'      => 'nav wtf-menu',
							'menu_id'         => '',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
							'before'          => '',
							'after'           => '',
							'link_before'     => '',
							'link_after'      => '',
							'items_wrap'      => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
							'depth'           => 0,
							'walker'          => new Primary_Menu_Walker(),
						) ); ?>

					</div>

				</div>


			</div>
		</header>
		<!--End Header-->

		<?php get_template_part('template-parts/mobile', 'menu'); ?>

		 <!--Start Banner-->
   
	   <div class="sub-banner">
	   	<?php 
		   	$img_id = carbon_get_theme_option('crb_subanner_img'); 
            $img_url = wp_get_attachment_image_src($img_id, 'full');
	   	?>
	   
	   	<img class="banner-img" src="<?php echo $img_url[0];?>" alt="">
	    <div class="detail">
	    	<div class="container">
	        	<div class="row">
	            	<div class="col-md-12">
	                	
	                    <div class="paging">
                            <?php if(is_category()): ?>
								<?php $category = get_the_category()[0]->name; ?>
								<h2><?php echo $category; ?></h2>
                                <?php elseif(is_page()): ?>
                                <h2><?php the_title(); ?></h2>
                            <?php endif; ?>
	                    </div>
	                    
	                </div>
	            </div>
	        </div>
	    </div>
	   
	   </div>
	   
	   <!--End Banner-->
