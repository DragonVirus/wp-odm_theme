<?php get_header();?>

<div class="section-title main-title">

	<section class="container">
		<header class="row">
			<div class="eight columns">
				<h1><?php _e('Profiles','odm') ?></h1>
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
  					"show_meta" => true
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
