<!doctype html>
<html class="no-js" lang="pl">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php wp_title(); ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="icon.png">

    <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" media="screen, projection" rel="stylesheet" />
    <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap-theme.min.css" media="screen, projection" rel="stylesheet" />

    <link href="<?php echo get_template_directory_uri(); ?>/stylesheets/screen.css" media="screen, projection" rel="stylesheet" type="text/css" />

    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300i,700|Open+Sans:300,300i,400,400i" rel="stylesheet">
    
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.min.css">
    
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" type="image/x-icon" />

    <?php wp_head(); ?>

  </head>
  <body <?php body_class(); ?>>

    <header>
      <div class="container">
        <div class="row">
          <div class="col-sm-6" id="logo">
            <div>
              <a href="<?php echo site_url(); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png">
              </a>
            </div>
          </div>
          <div class="col-sm-6" id="form-search">
            <form method="get" action="<?php echo site_url('/'); ?>">
              <input type="text" name="s" placeholder="Szukaj wordpressowej pracy">
              <button type="submit">
                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
              </button>
            </form>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">            
            <div id="dashicons-menu">
              <span class="dashicons dashicons-menu"></span>
            </div>
            <nav id="main-nav">
              <ul>
                <li>
                  <a href="<?php echo site_url(); ?>">Strona główna</a>
                  <div class="arrow"></div>
                </li>
                <li><a href="<?php echo site_url('faq/'); ?>">FAQ</a></li>
                <li><a href="<?php echo site_url('usun-prace/'); ?>">Usuń pracę</a></li>
                <li><a href="<?php echo site_url('kontakt/'); ?>">Kontakt</a></li>
                <li class="button"><a href="<?php echo site_url('dodaj-prace/'); ?>" id="new-ad">Dodaj nową pracę</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </header>