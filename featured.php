<?php 

$args = array(
	
	// Type & Status Parameters
	'post_type'   => 'post',
	'post_status' => 'publish',

	// Pagination Parameters
	'posts_per_page'         => -1,

	// Custom Field Parameters
	'meta_key'       => 'job_meta_featured',
	'meta_value'     => 'wyroznione',
);

$query = new WP_Query( $args );

if ($query->have_posts()) : ?>
	
	?>
	<section class="list-jobs row featured">
		<h2 class="col-lg-12">
			<span class="dashicons dashicons-megaphone"></span>
			Wyróżnione
		</h2>
		<div class="group col-lg-12">
			<div class="header">
				<div class="col-sm-5">Tytuł</div>
				<div class="col-sm-2">Typ</div>
				<div class="col-sm-3">Lokalizacja</div>
				<div class="col-sm-2">Dodano</div>
			</div>
			<?php while($query->have_posts()): $query->the_post(); ?>
				<div class="content">
					<div class="col-sm-5"><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3></div>
					<div class="col-sm-2"><?php echo get_post_meta(get_the_ID(), 'job_meta_type', true); ?></div>
					<div class="col-sm-3"><?php echo get_post_meta(get_the_ID(), 'job_meta_location', true); ?></div>
					<div class="col-sm-2"><?php the_time( 'j M' ); ?></div>
				</div>
			<?php endwhile; ?>
		</div>
	</section>

<?php endif; ?>
<?php wp_reset_postdata(); ?>