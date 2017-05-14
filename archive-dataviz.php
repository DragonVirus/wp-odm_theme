<?php get_header();

$options = get_option('odm_options');
$date_to_show = isset($options['single_page_date']) ? $options['single_page_date'] : "created"; ?>

<div class="section-title main-title">

	<section class="container">
		<header class="row">
			<div class="eight columns">
				<h1><?php _e('Data visualizations','odm') ?></h1>
			</div>
      <div class="eight columns">
				<?php get_template_part('section', 'query-actions'); ?>
			</div>
		</header>
	</section>

	<section class="container">
		<div class="row">
			<div class="sixteen columns filter-container">
				<div class="panel more-filters-content row">
					<?php
					$filter_arg = array(
															'search_box' => true,
															'cat_selector' => true,
															'con_selector' => false,
															'date_rang' => true,
															'post_type' => get_post_type()
														 );
					odm_adv_nav_filters($filter_arg);
					?>
				</div>
			</div>
		</div>

    <div class="row">
      <div class="sixteen columns">
        <?php while (have_posts()) : the_post();
  				odm_get_template('post-grid-single-4-cols',array(
  					"post" => get_post(),
  					"show_meta" => true,
						"order" => $date_to_show
  			),true);
  			endwhile; ?>
      </div>

    </div>

	</section>

	<section class="container">
		<div class="row">
			<div class="sixteen columns">
				<?php odm_get_template('pagination',array(),true); ?>
			</div>
		</div>
	</section>

</div>


<?php get_footer(); ?>
