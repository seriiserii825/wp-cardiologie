<?php
get_header('sub-banner');
?>
<div class="services-content">
	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<div class="main-title">
					<?php
						$services_title_1 = carbon_get_theme_option('crb_services_post_title_1');
						$services_title_2 = carbon_get_theme_option('crb_services_post_title_2');
						$services_desription = carbon_get_theme_option('crb_services_post_desription');
					?>
					<h2><span><?php echo $services_title_1; ?></span> <?php echo $services_title_2; ?></h2>
					<p><?php echo $services_desription; ?></p>
				</div>
			</div>
		</div>

		<div class="row">
            <div class="services-grid">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
                <?php
					if(is_category()){
						add_filter( 'excerpt_length', function(){
							return 20;
						} );

						add_filter('excerpt_more', function($more) {
							return '';
						});
					}

                    ?>

					<?php
	                    $img_id = carbon_get_the_post_meta('crb_category_amb_stat_posts_img');

	                    if($img_id == ''){
	                        $img_id = carbon_get_theme_option('crb_category_amb_stat_default_img');
	                    }
						$img_url = wp_get_attachment_url($img_id);
					 ?>
					<div class="services-grid__item">
						<div class="serv-sec">
                            <div class="services__img">
                                <img src="<?php echo $img_url; ?>" alt="">
                            </div>
							<div class="detail">
								<h5><?php the_title(); ?></h5>
								<?php the_excerpt(); ?>
								<a href="<?php the_permalink(); ?>">- <?php echo __('See more', 'medical'); ?></a>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
				<?php else : ?>
			<?php endif; ?>
			</div>
		</div>


	</div>
</div>


</div>
<!--End Content-->
<?php get_footer(); ?>
