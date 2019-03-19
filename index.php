<?php get_header(); ?>

		<main class="container">

			<?php get_template_part('featured'); ?>

      <div class="row" id="job-all-cat">
        <div class="col-lg-12">
          <h2>Wordpressowe prace według kategorii</h2>
          <ul class="menu-jobs">
            <li class="job-all">
							<a href="<?php echo site_url('/prace/wszystkie/'); ?>" title="Pokaż wszystkie wordpressowe prace">
              	<span class="dashicons dashicons-wordpress"></span>
              	Wszystkie
              </a>
            </li>
            <li class="job-theme-customization">
            	<a href="<?php echo site_url('/prace/strony-internetowe/'); ?>" title="Pokaż wordpressowe prace dla stron internetowych">
            		<span class="dashicons dashicons-admin-appearance"></span>
            		Strony internetowe
            	</a>
            </li>
            <li class="job-plugin-development">
            	<a href="<?php echo site_url('/prace/pluginy/'); ?>" title="Pokaż wordpressowe prace dla pluginów">
            		<span class="dashicons dashicons-admin-plugins"></span>
            		Pluginy
            	</a>
            </li>
            <li class="job-design">
            	<a href="<?php echo site_url('/prace/grafika/'); ?>" title="Pokaż wordpressowe prace dla grafiki">
            		<span class="dashicons dashicons-art"></span>
            		Grafika
            	</a>
            </li>
            <li class="job-development">
            	<a href="<?php echo site_url('/prace/rozwoj/'); ?>" title="Pokaż wordpressowe prace dla rozwoju">
	            	<span class="dashicons dashicons-hammer"></span>
            		Rozwój
            	</a>
            </li>
            <li class="job-general">
            	<a href="<?php echo site_url('/prace/ogolny/'); ?>" title="Pokaż wordpressowe prace dla ogólnych">
		            <span class="dashicons dashicons-admin-users"></span>
            		Ogólny
            	</a>
            </li>
            <li class="job-performance">
            	<a href="<?php echo site_url('/prace/wydajnosc/'); ?>" title="Pokaż wordpressowe prace dla wydajności">
            		<span class="dashicons dashicons-dashboard"></span>
            		Wydajność
            	</a>
            </li>
            <li class="job-migration">
            	<a href="<?php echo site_url('/prace/migracje/'); ?>" title="Pokaż wordpressowe prace dla migracji">
	            	<span class="dashicons dashicons-migrate"></span>
            		Migracje
            	</a>
            </li>
          </ul>
        </div>
      </div>
			
			<?php get_jobs_list('strony-internetowe', 'Strony internetowe'); ?>

			<?php get_jobs_list('pluginy', 'Pluginy'); ?>

			<?php get_jobs_list('grafika', 'Grafika'); ?>

			<?php get_jobs_list('rozwoj', 'Rozwój'); ?>

			<?php get_jobs_list('ogolny', 'Ogólny'); ?>

			<?php get_jobs_list('wydajnosc', 'Wydajność'); ?>

			<?php get_jobs_list('migracje', 'Migracje'); ?>

    </main>


<?php get_footer(); ?>