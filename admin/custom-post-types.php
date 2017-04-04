<?php
	// Featured sliders
	add_action('init', 'slider_register');
	function slider_register(){
		$singular_label = 'slide';
		$labels = array(
			'name'					=> __('Slides'),
			'singular_name'			=> __('Slide'),
			'add_new'				=> __('Adicionar novo'),
			'add_new_item'			=> __('Adicionar novo').' '.$singular_label,
			'edit_item'				=> __('Editar').' '.$singular_label,
			'new_item'				=> __('Novo').' '.$singular_label,
			'view_item'				=> __('Ver').' '.$singular_label,
			'search_items'			=> __('Procurar').' '.$singular_label,
			'not_found'				=> __('Nada encontrado'),
			'not_found_in_trash'	=> __('Nada encontrado no lixo'),
		);
		$args = array(
			'labels'				=> $labels,
			'public'				=> true,
			'publicly_queryable'	=> true,
			'show_ui'				=> true,
			'query_var'				=> true,
			'capability_type'		=> 'post',
			'hierarchical'			=> false,
			'menu_position'			=> 8,
			'menu_icon'				=> 'dashicons-format-image',
			'has_archive'			=> true,
			'exclude_from_search'	=> true,
			'supports'				=> array('title', 'thumbnail')
		);
		register_post_type('slides', $args);
	}
?>