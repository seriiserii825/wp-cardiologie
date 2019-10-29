<?php
/*
* Template Name: Principala
*/
?>

<?php get_header(); ?>

<div class="container">
	<div class="time-table-sec">
		<ul id="accordion2" class="accordion2">
			<li>
				<ul class="submenu time-table">
					<li class="tit">
						<h5><?php  echo carbon_get_theme_option('crb_timer_title'.carbon_lang()); ?></h5>
					</li>
					<li><span class="day"><?php echo carbon_get_theme_option('crb_separator_timer_text'.carbon_lang()); ?></span> <span class="divider">-</span>
						<span class="time">
									<?php  echo substr(carbon_get_theme_option('crb_monday_start'), 0, 5); ?> -
									<?php  echo substr(carbon_get_theme_option('crb_monday_end'), 0, 5); ?>
								</span>
					</li>
					<li><span class="day"><?php echo carbon_get_theme_option('crb_separator_timer_text_1'.carbon_lang()); ?></span> <span class="divider">-</span> <span class="time">
								<?php  echo substr(carbon_get_theme_option('crb_saturday_start'), 0, 5); ?> -
								<?php  echo substr(carbon_get_theme_option('crb_saturday_end'), 0, 5); ?></span></li>
					<li><span class="day"><?php echo carbon_get_theme_option('crb_separator_timer_text_2'.carbon_lang()); ?></span> <span class="divider">-</span>
							<span class="time">
								<?php  echo carbon_get_theme_option('crb_timer_stationar'.carbon_lang()); ?>
                            </span>
					</li>
				</ul>
				<div class="link"><img class="time-tab" src="<?php echo get_template_directory_uri(); ?>/assets/images/timetable-menu-red.png" alt=""></div>

			</li>
		</ul>
	</div>
</div>

<!--Start Banner-->
<div class="tp-banner-container">
	<div class="tp-banner">
		<ul>
			<?php $slider_images = carbon_get_theme_option('crb_slider_item'); ?>

			<?php foreach($slider_images as $image): ?>

				<?php
				$image_id = $image['crb_slider_image'];
				$image_url = kama_thumb_src( ['width'  => 1920, 'height' => 900], $image_id );
				?>

				<li data-transition="fade" data-slotamount="7" data-masterspeed="500" data-saveperformance="on"
				    data-title="Intro Slide">

					<img src="<?php echo $image_url; ?>" alt="" data-bgposition="center top" data-bgfit="cover"
					     data-bgrepeat="no-repeat">
				</li>
			<?php  endforeach; ?>

			<?php wp_reset_postdata(); ?>

		</ul>
		<div class="tp-bannertimer"></div>
	</div>
</div>

<!--End Banner-->

<!--Start Content-->
<div class="content">

	<!--Start Services-->
	<div class="services-one">
		<div class="container">
            <?php
                $cat_id = '';
                if(get_lang() == '_ro'){
                    $cat_id = 6;
                }else{
                    $cat_id = 20;
                }
            ?>
            <?php $service_category =  get_category($cat_id);?>
            <h2 class="section-services__title"><?php echo $service_category->name; ?></h2>
			<div class="row">
				<div class="services-one_content">

					<?php $amb_stat_posts = new WP_Query([
						'cat' => '6',
						'posts_per_page' => -1,
					]); ?>

					<?php if ( $amb_stat_posts->have_posts() ) : ?>
						<?php $i = 0; while ( $amb_stat_posts->have_posts() ) : $amb_stat_posts->the_post(); ?>
							<?php
							$category = get_the_category();
							?>
							<div class="service-sec">
								<div class="icon">
									<i class="fas fa-plus"></i>
								</div>
								<h5>
									<a href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
									</a>
								</h5>
							</div>
							<?php $i++; endwhile; ?>
					<?php else : ?>
					<?php endif; ?>
					<?php wp_reset_postdata(); ?>
				</div>
			</div>
		</div>
	</div>
	<!--End Services-->


	<!--Start Welcome-->
	<div class="welcome dark-back">
		<div class="container">

			<div class="row">
				<div class="col-md-12">
					<div class="main-title">
						<?php
						$guide_title_1 = carbon_get_theme_option('crb_guid_title_1'.carbon_lang());
						$guide_title_2 = carbon_get_theme_option('crb_guid_title_2'.carbon_lang());
						$guide_description = carbon_get_theme_option('crb_gid_descr'.carbon_lang());
						?>
						<h2><span><?php echo $guide_title_1; ?> </span> <?php echo $guide_title_2; ?></h2>
						<p><?php echo $guide_description; ?></p>
					</div>
				</div>
			</div>

			<div id="tabbed-nav">
				<?php $guid_posts = new WP_Query([
					'cat' => '6',
					'posts_per_page' => 2,
				]);
				?>
				<ul>
					<?php if($guid_posts->have_posts()): ?>
						<?php while($guid_posts->have_posts()): ?>
							<?php $guid_posts->the_post(); ?>
							<li><a><?php the_title(); ?></a></li>
						<?php endwhile; ?>
					<?php else: ?>
					<?php endif; ?>
					<?php wp_reset_postdata(); ?>

				</ul>

				<div>
					<?php if($guid_posts->have_posts()): ?>
						<?php while($guid_posts->have_posts()): ?>
							<?php $guid_posts->the_post(); ?>

							<?php
							$img_id = carbon_get_the_post_meta('crb_category_amb_stat_posts_img');
							if($img_id == ''){
								$img_id = carbon_get_theme_option('crb_category_amb_stat_default_img');
							}
							$img_url = wp_get_attachment_image_src($img_id, 'full');
							?>

							<div>
								<div class="row">
									<div class="col-md-6">
										<div class="welcome-serv-img">
											<img src="<?php echo $img_url[0]; ?>" alt="">
										</div>
									</div>
									<div class="col-md-6">
										<div class="detail">
											<div class="detail__content">
												<?php the_content(); ?>
											</div>
											<a href="<?php the_permalink(); ?>">
                                                <?php $read_more = carbon_get_theme_option('crb_btn'.carbon_lang()); ?>
                                                <?php echo $read_more; ?>
											</a>
										</div>
									</div>
								</div>
							</div>
						<?php endwhile; ?>
					<?php else: ?>
					<?php endif; ?>

				</div>

			</div>


		</div>
	</div>
	<!--End Welcome-->


	<!--Start Doctor Quote-->
	<?php
	$cite_text = carbon_get_theme_option('crb_cite_text'.carbon_lang()) ? carbon_get_theme_option('crb_cite_text'.carbon_lang()) : 'Text pentru citata';
	$cite_author = carbon_get_theme_option('crb_cite_author'.carbon_lang()) ? carbon_get_theme_option('crb_cite_author'.carbon_lang()) : 'Author pentru citata';
	?>
	<div class="dr-quote">
		<div class="container">
            <div class="dr-quote__content">
                <span class="quote">"<?php echo $cite_text; ?>"</span>
                <span class="name">- <?php echo $cite_author; ?></span>
            </div>
		</div>
	</div>
	<!--End Doctor Quote-->

</div>
<!--End Content-->


<?php get_footer(); ?>
