<?php 
	define('CSS', get_template_directory_uri().'/assets/css');
	define('JS', get_template_directory_uri().'/assets/js');


	function load_scripts()
	{

		$versao = '0.0.1';

		/* Registering style */
		wp_register_style('bootstrapcss', CSS . '/bootstrap.css', array(), $versao, false );		
		



		wp_register_script('bootstrapjs', JS . '/vendor/bootstrap.min.js', array('jquery'), $versao);
		
		

		wp_enqueue_style('bootstrapcss');
		
		

		wp_enqueue_script('bootstrapjs');
				
		
	}

	add_action('wp_enqueue_scripts', 'load_scripts');
	