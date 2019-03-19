<?php get_header(); ?>

	<div class="container">
		<div class="row">

			<?php get_sidebar(); ?>

			<main class="col-sm-9">
				
				<?php if (have_posts()): the_post(); ?>
								
					<section class="list-jobs row featured page">
						<h2 class="col-lg-12">
							<span><?php the_title(); ?></span>
						</h2>
						<div class="group col-lg-12 the-content">
							<?php the_content(); ?>							
						</div>
					</section>

				<?php endif; ?>

	    </main>

		</div>
	</div>

<?php get_footer(); ?>