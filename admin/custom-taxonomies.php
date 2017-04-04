<?php 
// Models
add_action( 'init', 'create_custom_tax_models');
function create_custom_tax_models() {
	$singular_label = 'modelo';
	$labels = array(
		'name'					=> 'Modelos',
		'singular_name'			=> 'Modelo',
		'search_items'			=> 'Procurar',
		'all_items'				=> 'Todos',
		'edit_item'				=> 'Editar',
		'update_item'			=> 'Alterar',
		'add_new_item'			=> 'Novo ' . $singular_label,
		'new_item_name'			=> 'Novo ' . $singular_label,
		'menu_name'				=> 'Modelos'
	);
	$args = array(
		'hierarchical'			=> true,
		'labels'				=> $labels,
		'show_ui'				=> true,
		'show_admin_column'		=> true,
		'query_var'				=> true,
		'rewrite'				=> array( 'slug' => 'modelos' ),
		'has_archive'			=> false,
		'exclude_from_search'	=> true,
		'supports'				=> array('title'),
	);
	register_taxonomy('modelos', 'product', $args );
}
?>