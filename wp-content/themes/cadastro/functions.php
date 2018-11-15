<?php 
	define('CSS', get_template_directory_uri().'/assets/css');
	define('JS', get_template_directory_uri().'/assets/js');
	define('NODE', get_template_directory_uri().'/node_modules');


	function load_scripts()
	{

		$versao = '0.0.1';

		/* Registering style */
		wp_register_style('appcss', CSS . '/app.css', array(), $versao, false );
		wp_register_script('material', NODE . '/materialize-css/dist/js/materialize.min.js', array('jquery'), $versao);
		wp_register_script('maskjs', NODE . '/mask/lib/mask.js', array(), $versao);

		wp_enqueue_style('appcss');
		wp_enqueue_script('material');
		wp_enqueue_script('maskjs');
				
		
	}

	add_action('wp_enqueue_scripts', 'load_scripts');
	