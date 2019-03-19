<?php 
#
# Template Name: Kontakt
#

use Josantonius\Request\Request as Request;
?>

<?php get_header(); ?>

	<div class="container">
		<div class="row">

			<?php get_sidebar(); ?>

			<main class="col-sm-9">

				<section class="list-jobs row featured page">
					<h2 class="col-lg-12">
						<span class="dashicons dashicons-email-alt"></span>
						<span>Kontakt</span>
					</h2>
					<div class="group col-lg-12">
						
						<?php 
							$success = get_query_var('success');
							if(!empty($success)){
								?>
								<div class="alert alert-success alert-dismissible" role="alert">
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<?php
								foreach ($success as $value) {
									?>
										<p><?php echo $value; ?></p>
									<?php
								}
								?>
								</div>
								<?php
								$_POST = array();
							}
						?>

						<?php 
							$error = get_query_var('error');
							if(!empty($error)){
								?>
								<div class="alert alert-danger alert-dismissible" role="alert">
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<?php
								foreach ($error as $value) {
									?>
										<p><?php echo $value; ?></p>
									<?php
								}
								?>
								</div>
								<?php
							}
						?>

						<form method="POST" action="<?php echo site_url('kontakt'); ?>">
							<?php wp_nonce_field( 'contact', 'contact' ); ?>
							<div class="form-group">
						    <input name="subject" value="<?php echo Request::post('subject'); ?>" type="text" class="form-control" id="form-subject" placeholder="Temat">
						  </div>
						  
							<div class="form-group">
								<textarea name="content" class="form-control" rows="10" placeholder="Treść ogłoszenia" id="form-content"><?php echo Request::post('content'); ?></textarea>
						  </div>
						  <button type="submit" class="btn btn-default">Wyślij</button>
						</form>
					</div>
				</section>

	    </main>

		</div>
	</div>

<?php get_footer(); ?>