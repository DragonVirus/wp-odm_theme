<?php
	$post = isset($params["post"]) ? $params["post"] : null;
	$show_meta = isset($params["show_meta"]) ? $params["show_meta"] : true;
	$show_thumbnail = isset($params["show_thumbnail"]) ? $params["show_thumbnail"] : true;
	$show_excerpt = isset($params["show_excerpt"]) ? $params["show_excerpt"] : false;
	$show_post_type = isset($params["show_post_type"]) ? $params["show_post_type"] : false;
	$order = isset($params["order"]) ? $params["order"] : 'created';
	?>

<div class="four columns post-grid-item post-grid-item-caption-bolow <?php echo odm_country_manager()->get_current_country(); ?>-bgdarkcolor">
	<div class="grid-content-wrapper">
		<?php if ($show_meta): ?>
		<div class="meta">
				<?php
		      $link = isset($post->dataset_link) ? $post->dataset_link : get_permalink($post->ID); ?>
				<a class="item-title" href="<?php echo $link; ?>" title="<?php echo $post->post_title; ?>"><?php echo $post->post_title; ?></a>
					<?php
				if (isset($post->description) && $post->description != "") :?>
					<div class="post-grid-item-list">
							<?php echo $post->description;   ?>
					</div>
					<?php
				endif;
				?>
				<?php echo_post_meta($post,array('date','sources','categories'),$order); ?>
		</div>
		<?php endif; ?>
		<?php
			$thumb_src = odm_get_thumbnail($post->ID,  false, array( 300, 'auto'));
			if (isset($thumb_src)):
				echo $thumb_src;
			endif;
		?>
	</div>
</div>
