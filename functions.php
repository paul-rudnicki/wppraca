<?php
include_once('vendor/autoload.php');

use App\Controllers\InitController as Init;

$init = new Init();


function get_jobs_list($slack, $title)
{
	switch ($title) {
		case 'Strony internetowe':
			$class = 'dashicons-admin-appearance';
			break;
		case 'Pluginy':
			$class = 'dashicons-admin-plugins';
			break;
		case 'Grafika':
			$class = 'dashicons-art';
			break;
		case 'Rozwój':
			$class = 'dashicons-hammer';
			break;
		case 'Ogólny':
			$class = 'dashicons-admin-users';
			break;
		case 'Wydajność':
			$class = 'dashicons-dashboard';
			break;
		case 'Migracje':
			$class = 'dashicons-migrate';
			break;
	}

	$args = array(
		'category_name'    => $slack,
		'post_type'   => 'post',
		'post_status' => 'publish',
		'posts_per_page' => 5,
	);
	
	$query = new WP_Query( $args );
?>
	<section class="list-jobs row">
		<h2 class="col-lg-12">
			<span class="dashicons <?php echo $class; ?>"></span>
			<a href="<?php echo site_url('/prace/'.$slack); ?>"><?php echo $title; ?></a>
		</h2>
		<div class="group col-lg-12">
			<div class="header">
				<div class="col-sm-5">Tytuł</div>
				<div class="col-sm-2">Typ</div>
				<div class="col-sm-3">Lokalizacja</div>
				<div class="col-sm-2">Dodano</div>
			</div>

			<?php if($query->have_posts()): ?>
				<?php while($query->have_posts()): $query->the_post(); ?>
				<div class="content">
					<div class="col-sm-5"><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3></div>
					<div class="col-sm-2"><?php echo get_post_meta(get_the_ID(), 'job_meta_type', true); ?></div>
					<div class="col-sm-3"><?php echo get_post_meta(get_the_ID(), 'job_meta_location', true); ?></div>
					<div class="col-sm-2"><?php the_time( 'j M' ); ?></div>
				</div>
				<?php endwhile; ?>
			<?php else : ?>
				<div class="content no-jobs">
					<div class="col-sm-12">Aktualnie nie ma żadnej pracy dla tej kategori. <a href="<?php echo site_url('dodaj-prace'); ?>">Dodaj nową pracę.</a></div>
				</div>
			<?php endif; ?>
		</div>
		<div class="col-lg-12 show-all-job">
			<a href="<?php echo site_url('/prace/'. $slack); ?>">Pokaż wszystkie ogłoszenia prace dla <?php echo $title; ?> »</a>
		</div>
	</section>
<?php
	wp_reset_postdata();
}