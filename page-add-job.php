<?php 
#
# Template Name: Dodaj prace
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
						<span class="dashicons dashicons-plus-alt"></span>
						<span>Dodaj pracę</span>
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

						<form id="add-job" method="POST" action="<?php echo site_url('dodaj-prace'); ?>">
							<?php wp_nonce_field( 'add_job', 'add_job' ); ?>
							<div class="form-group">
						    <input name="title" value="<?php echo Request::post('title'); ?>" type="text" class="form-control" id="form-title" placeholder="Tytuł">
						  </div>
						  <div class="form-group">
						    <select name="category" class="form-control" id="form-category" >
						    	<option value=""
						    		<?php echo Request::post('category') == '' ? 'selected' : ''; ?>
						    		 disabled>Wybierz kategorię</option>
								  <option value="strony-internetowe"
								  	<?php echo Request::post('category') == 'strony-internetowe' ? 'selected' : ''; ?>>
								  	Strony internetowe</option>
								  <option value="pluginy"
								  	<?php echo Request::post('category') == 'pluginy' ? 'selected' : ''; ?>>
								  	Pluginy</option>
								  <option value="grafika"
									  <?php echo Request::post('category') == 'grafika' ? 'selected' : ''; ?>>
								  	Grafika</option>
								  <option value="rozwoj"
									  <?php echo Request::post('category') == 'rozwoj' ? 'selected' : ''; ?>>
								  	Rozwój</option>
								  <option value="ogolny"
								  	<?php echo Request::post('category') == 'ogolny' ? 'selected' : ''; ?>>
								  	Ogólny</option>
								  <option value="wydajnosc"
									  <?php echo Request::post('category') == 'wydajnosc' ? 'selected' : ''; ?>>
								  	Wydajność</option>
								  <option value="migracje"
								  	<?php echo Request::post('category') == 'migracje' ? 'selected' : ''; ?>>
								  	Migracje</option>
								</select>
						  </div>
							<div class="form-group">
								<textarea name="content" class="form-control" rows="10" placeholder="Treść ogłoszenia" id="form-content"><?php echo Request::post('content'); ?></textarea>
								<p class="help-block">Możliwe znaczniki html: ul, ol, li, a, strong, em</p>
						  </div>
						  <div class="form-group">
						    <select name="type" class="form-control" id="form-type" >
						    	<option value=""
						    		<?php echo Request::post('type') == '' ? 'selected' : ''; ?>
						    		 disabled>Wybierz Typ</option>
								  <option value="Etat"
								  	<?php echo Request::post('type') == 'Etat' ? 'selected' : ''; ?>>
								  	Etat</option>
								  <option value="Zlecenie"
								  	<?php echo Request::post('type') == 'Zlecenie' ? 'selected' : ''; ?>>
								  	Zlecenie</option>
								</select>
						  </div>
						  <div class="form-group">
						    <input value="<?php echo Request::post('location'); ?>" name="location" type="text" class="form-control" id="form-location" placeholder="Lokalizacja">
						  </div>
							<div class="form-group">
						    <input value="<?php echo Request::post('email'); ?>" name="email" type="email" class="form-control" id="form-email" placeholder="Email">
						  </div>
						  <div class="form-group">
						    <input value="<?php echo Request::post('phone'); ?>" name="phone" type="text" class="form-control" id="form-phone" placeholder="Telefon">
						  </div>
						  <button type="submit" class="btn btn-default">Zapisz</button>
						</form>
					</div>
				</section>

	    </main>

		</div>
	</div>

<?php get_footer(); ?>