<?php get_header(); ?>

	<div class="container">
		<div class="row">

				<?php get_sidebar(); ?>

				<main class="col-sm-9 post">
					<?php if (have_posts()) : the_post(); ?>
						<article class="list-jobs row featured">
							<h1 class="col-lg-12"><?php the_title(); ?></h1>
							<div class="text col-lg-12">
								<?php the_content(); ?>								
							</div>
							<footer>
								<section class="col-sm-4">
									<h4>Rodzaj:</h4>
									<ul>
										<li><span class="dashicons dashicons-edit"></span><?php echo get_post_meta(get_the_ID(), 'job_meta_type', true) ?></li>
									</ul>
								</section>
								<section class="col-sm-4">
									<h4>Kontakt:</h4>
									<ul>
										<?php if (($phone = get_post_meta(get_the_ID(), 'job_meta_phone', true)) !== '') : ?>
											<li><span class="dashicons dashicons-phone"></span><?php echo $phone; ?></li>
										<?php endif; ?>
										<?php if (($email = get_post_meta(get_the_ID(), 'job_meta_email', true)) !== '') : ?>
											<li><span class="dashicons dashicons-email-alt"></span><?php echo antispambot($email); ?></li>
										<?php endif; ?>
									</ul>
								</section>
								<?php if (($location = get_post_meta(get_the_ID(), 'job_meta_location', true)) !== '') : ?>
									<section class="col-sm-4">
										<h4>Lokalizacja:</h4>
										<ul>
											<li>
												<span class="dashicons dashicons-location"></span><?php echo $location; ?>
											</li>
										</ul>
									</section>
								<?php endif ?>
							</footer>
						</artice>
					<?php endif; ?>
		    </main>
		</div>
	</div>
<?php get_footer(); ?>