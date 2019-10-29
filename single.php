<?php
get_header('sub-banner');

$cat_id = '';
if (get_lang() == '_ro') {
	$cat_id = 6;
} else {
	$cat_id = 20;
}

$category = get_the_category_by_ID(6);

//$categories = get_categories( array(
//	'taxonomy'     => 'category',
//	'type'         => 'post',
//	'child_of'     => 6,
//	'parent'       => '',
//	'orderby'      => 'name',
//	'order'        => 'ASC',
//	'hide_empty'   => 1,
//	'hierarchical' => 1,
//	'exclude'      => '',
//	'include'      => '',
//	'number'       => 0,
//	'pad_counts'   => false,
//) );

?>
    <!--Start Content-->
    <div class="content">
        <div class="container">
            <div class="procedures">
                <div class="procedures__item procedures__item--first">
                    <div class="procedures-links">
                        <?php $posts_of_cat = new WP_Query([
                            'cat' => $cat_id,
                            'posts_per_page' => -1
                        ]); ?>
                        <span class="title"><?php echo get_category($cat_id)->name; ?></span>
                        <ul id="procedures-links">
							<?php if ($posts_of_cat->have_posts()) : ?>
								<?php while ($posts_of_cat->have_posts()) : $posts_of_cat->the_post(); ?>
                                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
								<?php endwhile; ?>
							<?php endif; ?>
                        </ul>
                    </div>
                </div>

                <div class="procdures__item procedures__item--second">
					<?php if (have_posts()) : ?>
						<?php while (have_posts()) : the_post(); ?>
                            <div class="main-title">
                                <h2><?php the_title(); ?></h2>
                                <?php $img_id = carbon_get_the_post_meta('crb_category_amb_stat_posts_img'); ?>

                                <?php echo kama_thumb_img('w=500', $img_id); ?>
                            </div>
							<?php the_content(); ?>
						<?php endwhile; ?>
					<?php else : ?>
					<?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--End Content-->
<?php
get_footer();