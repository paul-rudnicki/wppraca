<?php 
namespace App\Controllers;
use Josantonius\Request\Request as Request;
use WP_Query;
/**
* Init
*/
class InitController
{
	
	function __construct()
	{
		add_action( 'wp_enqueue_scripts', array($this, 'custom_scripts' ));
		add_action( 'template_redirect', array($this, 'template_redirect' ));
		add_action( 'pre_get_posts', array($this, 'pre_get_posts' ));
	}

	function pre_get_posts($query) {

    if( is_admin() ) 
        return;

    if( is_search() && $query->is_main_query() ) {
        $query->set('post_type', 'post');
    } 

}

	
	public function template_redirect()
	{
		switch (get_query_var('pagename')) {
			case 'dodaj-prace':
				$this->check_job();
				break;
			case 'kontakt':
				$this->check_contact();
				break;
			case 'usun-prace':
				$this->check_token();
				break;
		}
	}

	public function check_token()
	{
		$error = array();
		if(Request::isPost()){
			if ( ! ( Request::post('remove_job') !== null ) 
		    || ! wp_verify_nonce( Request::post('remove_job'), 'remove_job' ) ){
				print 'Sorry, your nonce did not verify.';
		   	exit;
			} else {
				$token = Request::post('token');
				if (empty($token)) {
					$error[] = 'Nie podano tokenu';
				}
				if (empty($error)) {
					$this->remove_job($token);
				} else {
					set_query_var('error', $error);
				}
			}
		}
	}

	public function remove_job($token)
	{
		$args = array(
	   'meta_query' => array(
       array(
         'key' => 'job_meta_remove_token',
         'value' => $token,
         'compare' => '=',
       	)
	   	)
		);
		$query = new WP_Query($args);
		$id = 0;
		if ($query->have_posts()){
			$query->the_post();
			$id = get_the_ID();
		}
		wp_reset_postdata();

		if ($id > 0) {
			wp_delete_post($id);
			$success = array('Poprawnie usunięto ogłoszenie o pracę.');
			set_query_var('success', $success);
		} else {
			global $error;
			$error = array('Ogłoszenie nie istnieje lub nie zostało jeszcze zaakceptowane.');
			set_query_var('error', $error);
		}
	}

	public function check_contact()
	{
		$error = array();
		if(Request::isPost()){
			if ( ! ( Request::post('contact') !== null ) 
		    || ! wp_verify_nonce( Request::post('contact'), 'contact' ) ){
				print 'Sorry, your nonce did not verify.';
		   	exit;
			} else {
				$subject = Request::post('subject');
				$content = Request::post('content');
				if (empty($subject)) {
					$error[] = 'Nie podano tematu';
				}
				if (empty($content)) {
					$error[] = 'Nie podano treści';
				}
				if (empty($error)) {
					$this->send_contact();
				} else {
					set_query_var('error', $error);
				}
			}
		}
		set_query_var('error', $error);
	}

	public function send_contact()
	{
		$to = 'kontakt@wppraca';
		$subject = sanitize_text_field(Request::post('subject'));
		$body = sanitize_text_field(Request::post('content'));
		$headers = array('Content-Type: text/html; charset=UTF-8');
		 
		if(wp_mail( $to, $subject, $body, $headers )){
			$success = array('Wiadomość została wysłana.');
			set_query_var('success', $success);
		} else {
			$error = array('Nie udało się wysłać wiadomości. Spóbuj ponownie.');
			set_query_var('error', $error);
		}
	}

	public function custom_scripts(){
	  
	  wp_enqueue_style( 'dashicons' );

		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'wppraca-scripts', get_template_directory_uri() . '/javascripts/main.js', array('jquery'), '1.0.0' );
	}

	public function check_job()
	{
		$error = array();

		if(Request::isPost()){
			if ( ! ( Request::post('add_job') !== null ) 
		    || ! wp_verify_nonce( Request::post('add_job'), 'add_job' ) ){
				print 'Sorry, your nonce did not verify.';
		   	exit;
			} else {
				$title = Request::post('title');
				$category = Request::post('category');
				$type = Request::post('type');
				$content = Request::post('content');
				$email = Request::post('email');
				$phone = Request::post('phone');
				if (empty($title)) {
					$error[] = 'Nie podano tytułu';
				}
				if (empty($category)) {
					$error[] = 'Nie wybrano kategori';
				}
				if (empty($category)) {
					$error[] = 'Nie wybrano typu';
				}
				if (empty($content)) {
					$error[] = 'Nie podano treści';
				}
				if (empty($email)) {
					$error[] = 'Nie podano adresu e-mail';
				}
				if (empty($error)) {
					$this->add_job();
				} else {
					set_query_var('error', $error);
				}
			}
		}
		set_query_var('error', $error);
	}

	public function add_job()
	{

		$cat_id = (int)get_category_by_slug(Request::post('category'))->term_id;
		$cat_all = get_cat_ID('wszystkie');

		if ($cat_id) {
			$token = uniqid() . time();

			$content = wp_kses(Request::post('content'), 
				array(
					'ul' => array(),
					'li' => array(),
					'ol' => array(),
			    'a' => array(
			        'href' => array(),
			        'title' => array()
			    ),
			    'br' => array(),
			    'em' => array(),
			    'strong' => array(),
				)
			);

			$new_job = array(
			  'post_title'    => wp_strip_all_tags( Request::post('title') ),
			  'post_content'  => $content,
			  'post_status'   => 'draft',
			  'post_author'   => 1,
			  'post_category' => array( $cat_id, $cat_all ),
				'meta_input'   => array(
	        'job_meta_email' => sanitize_email(Request::post('email')),
	        'job_meta_phone' => sanitize_text_field(Request::post('phone')),
	        'job_meta_type' => sanitize_text_field(Request::post('type')),
	        'job_meta_location' => sanitize_text_field(Request::post('location')),
	        'job_meta_remove_token' => uniqid() . time()
		    ),
			);

			if($id = wp_insert_post( $new_job )){
				$success = array('Dodano nową pracę.');
				set_query_var('success', $success);
				$this->send_email_job($token, get_permalink($id, true));
			} else {
				$error = array('Nie dodano nowej pracy. Spróbuj ponownie.');
				set_query_var('error', $error);
			}

		}
	}

	public function send_email_job($token, $url)
	{
		$to = sanitize_email(Request::post('email'));
		$subject = 'Dodano nową pracę';
		$body = '<h3>Dziękujemy za dodanie nowej pracy do serwisu wppraca.pl</h3>';
		$body .= '<p>Po moderacji twoja praca będzie dostępna pod tym <a href="'.$url.'">adresem</a></p>';
		$body .= '<p>Jeżeli chcesz usunąć pracę skorzystaj z tego tokena: </p>';
		$body .= '<p>'.$token.'</p>';
		$headers = array('Content-Type: text/html; charset=UTF-8','From: WP Praca <kontakt@wppraca>');

		wp_mail( $to, $subject, $body, $headers );
	}
}