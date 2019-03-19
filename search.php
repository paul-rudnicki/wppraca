<?php get_header(); ?>

		<div class="container">

			<div class="row">
				
				<?php get_sidebar(); ?>

				<main class="col-sm-9 category">

					<?php get_template_part('featured'); ?>

					<section class="list-jobs row">
						<h2 class="col-lg-12">
							<span class="dashicons dashicons-admin-appearance"></span>
							<a href="#">Wynik wyszukiwania: <?php echo get_search_query(); ?></a>
						</h2>

						<div class="group col-lg-12">
							<div class="header">
								<div class="col-sm-5">Tytuł</div>
								<div class="col-sm-2">Typ</div>
								<div class="col-sm-3">Lokalizacja</div>
								<div class="col-sm-2">Dodano</div>
							</div>
							<?php if(have_posts()):  ?>
								<?php while(have_posts()): the_post(); ?>
									<div class="content">
										<div class="col-sm-5"><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3></div>
										<div class="col-sm-2"><?php echo get_post_meta(get_the_ID(), 'job_meta_type', true); ?></div>
										<div class="col-sm-3"><?php echo get_post_meta(get_the_ID(), 'job_meta_location', true); ?></div>
										<div class="col-sm-2"><?php the_time( 'j M' ); ?></div>
									</div>
									<?php endwhile; ?>
							<?php else: ?>
								<div class="content no-jobs">
									<div class="col-sm-12">Aktualnie nie ma żadnej pracy dla tej frazy. <a href="<?php echo site_url('dodaj-prace'); ?>">Dodaj nową pracę.</a></div>
								</div>
							<?php endif; ?>
						</div>
					</section>

					<div class="pagination row">
						<div class="col-lg-12">
							<?php
								global $wp_query;
								$big = 999999999;
								echo paginate_links( array(
									'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
									'format' => '?paged=%#%',
									'current' => max( 1, get_query_var('paged') ),
									'total' => $wp_query->max_num_pages,
									'type' => 'list',
									'prev_text' => '«',
									'next_text' => '»'
								) );
							?>
						</div>
					</div>
		    </main>
		</div>
	</div>

<?php get_footer(); ?>