<?php

function frontdev_format_projeto($post) {

	$acf = get_fields($post->ID);

	return [
		'id' => $post->ID,
		'title' => $post->post_title ?? '',
		'slug' => $post->post_name,
		'content' => apply_filters('the_content', $post->post_content),
		'descricao' => $acf['descricao_do_projeto'] ?? null,
		'inicio_projeto' => $acf['inicio_do_projeto'] ?? null,
		'fim_projeto' => $acf['termino_do_projeto'] ?? null,
	];
}