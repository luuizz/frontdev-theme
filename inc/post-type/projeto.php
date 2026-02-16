<?php
function register_cpt_projeto() {
	register_post_type('projeto', array(
		'labels' => array(
			'name' => 'Projetos',
			'singular_name' => 'Projeto',
		),
		'description' => 'Sistema de projetos',
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'query_var' => true,
		'show_in_rest' => true,
		'rest_base' => 'projetos',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'rewrite' => array('slug' => 'projeto', 'with_front' => true),
		'supports' => array('title', 'editor', 'thumbnail'),
		'menu_icon' => 'dashicons-portfolio',
	));
}

add_action( 'init', 'register_cpt_projeto' );