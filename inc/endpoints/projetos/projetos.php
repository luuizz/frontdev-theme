<?php

add_action('rest_api_init', function () {

	register_rest_route('api/v1', '/projetos', [
		'methods'  => 'GET',
		'callback' => 'frontdev_get_projetos',
	]);

	register_rest_route('api/v1', '/projetos/(?P<slug>[a-zA-Z0-9-]+)', [
		'methods'  => 'GET',
		'callback' => 'frontdev_get_projeto_unico',
	]);

});



function frontdev_get_projetos() {

	$posts = get_posts([
		'post_type' => 'projeto',
		'numberposts' => -1,
	]);

	return array_map('frontdev_format_projeto', $posts);
}

function frontdev_get_projeto_unico($request) {

	$slug = $request['slug'];

	$post = get_page_by_path($slug, OBJECT, 'projeto');

	if (!$post) {
		return new WP_Error('not_found', 'Projeto não encontrado', ['status' => 404]);
	}

	return frontdev_format_projeto($post);
}


