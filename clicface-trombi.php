<?php
/*
Plugin Name: Clicface Trombi
Plugin URI: http://www.clicface.com/
Description: A is a great plugin for WordPress that creates a directory of all your employees.
Version: 1.02
Author: Clicface
Author URI: http://www.clicface.com/
Plugin Type: Piklist
License: GPL2
*/

require_once( plugin_dir_path(__FILE__) . 'includes/class-collaborateur.php' );

add_action('init', 'clicface_trombi_init');
function clicface_trombi_init(){
	load_plugin_textdomain('clicface-trombi', '/wp-content/plugins/clicface-trombi/i18n/');
}

add_action('admin_init', 'clicface_trombi_init_function', -1);
function clicface_trombi_init_function() {
	include_once('includes/class-piklist-checker.php');
	if (!piklist_checker::check(__FILE__)) {
		return;
	}
}

add_filter('piklist_post_types', 'piklist_collaborateur_post_types');
function piklist_collaborateur_post_types($post_types) {
	$post_types['collaborateur'] = array(
			'labels' => piklist('post_type_labels', __('Employee', 'clicface-trombi'))
			,'public' => true
			,'rewrite' => array(
				'slug' => 'collaborateur'
			)
			,'capability_type' => 'post'
			,'edit_columns' => array(
				'title' => __('Employee', 'clicface-trombi')
				,'author' => __('Author', 'clicface-trombi')
			)
			,'hide_meta_box' => array(
				'slug'
				,'author'
				,'piklist_collaborateur_type'
			)
	);
	return $post_types;
}

add_filter('piklist_taxonomies', 'piklist_collaborateur_services');
function piklist_collaborateur_services($taxonomies) {
	$taxonomies[] = array(
		'post_type' => 'collaborateur'
		,'name' => 'collaborateur_service'
		,'show_admin_column' => false
		,'hide_meta_box' => true
		,'configuration' => array(
			'hierarchical' => false
			,'labels' => piklist('taxonomy_labels', __('Division', 'clicface-trombi'))
			,'show_ui' => true
			,'query_var' => true
			,'rewrite' => array(
				'slug' => 'collaborateur-service'
			)
		)
	);
	return $taxonomies;
}

add_filter('piklist_taxonomies', 'piklist_collaborateur_worksites');
function piklist_collaborateur_worksites($taxonomies) {
	$taxonomies[] = array(
		'post_type' => 'collaborateur'
		,'name' => 'collaborateur_worksite'
		,'show_admin_column' => false
		,'hide_meta_box' => true
		,'configuration' => array(
			'hierarchical' => false
			,'labels' => piklist('taxonomy_labels', __('Worksite', 'clicface-trombi'))
			,'show_ui' => true
			,'query_var' => true
			,'rewrite' => array(
				'slug' => 'collaborateur-worksite'
			)
		)
	);
	return $taxonomies;
}

add_filter('piklist_admin_pages', 'piklist_collaborateur_admin_pages');
function piklist_collaborateur_admin_pages($pages) {
	$pages[] = array(
		'page_title' => __('Clicface Trombi Settings', 'clicface-trombi')
		,'menu_title' => 'Clicface Trombi'
		,'capability' => 'manage_options'
		,'menu_slug' => 'clicface_trombi_settings'
		,'setting' => 'clicface_trombi_settings'
		,'icon' => 'options-general'
		,'single_line' => false
		,'default_tab' => 'Basic'
	);

	return $pages;
}

add_action('new_to_publish', 'trombi_check_num_collab');
add_action('auto-draft_to_publish', 'trombi_check_num_collab');
add_action('draft_to_publish', 'trombi_check_num_collab');
add_action('pending_to_publish', 'trombi_check_num_collab');
function trombi_check_num_collab( $post ) {
	if ($post->post_type == 'collaborateur') {
		if ( wp_count_posts('collaborateur')->publish > strlen('-clicface-') ) {
			wp_delete_post( $post->ID, true );
			wp_die( __('You can\'t create any more record, you have already reached the limit. You have to update your Clicface Trombi plugin version to add more records.', 'clicface-trombi') . '<br /><center><a href="http://www.clicface.com/" target="_blank">http://www.clicface.com/</a></center>' );
		}
	}
}

add_action ('save_post', 'titlize_collaborateur');
function titlize_collaborateur( $post_id ) {
	$type = get_post_type( $post_id );
	if ($type == 'collaborateur') {
		$update_post['ID'] = $post_id;
		
		// On sauvegarde une première fois
		remove_action('save_post', 'titlize_collaborateur'); // unhook this function so it doesn't loop infinitely
		wp_update_post( $update_post );
		
		// On met à jour le titre, et on sauvegarde à nouveau
		$update_post['post_title'] = get_post_meta($post_id, 'prenom', true) . ' ' . get_post_meta($post_id, 'nom', true);
		wp_update_post( $update_post );
		
		add_action ('save_post', 'titlize_collaborateur'); // re-hook this function
	} else {
		return true;
	}
}

add_filter( 'template_include', 'wpse_57232_render_cpt', 100 );
function wpse_57232_render_cpt( $template ) {
	// Our custom post type.
	$post_type = 'collaborateur';

	// WordPress has already found the correct template in the theme.
	if ( FALSE !== strpos( $template, "/single-$post_type.php" ) ) {
		return $template;
	}

	// Send our plugin file.
	if ( is_singular() && $post_type === get_post_type( $GLOBALS['post'] ) ) {
		return dirname( __FILE__ ) . "/templates/single-$post_type.php";
	}

	// Not our post type single view.
	return $template;
}

add_shortcode( 'clicface-trombi', 'trombi_display_views' );
function trombi_display_views() {
	wp_enqueue_style('clicface-trombi-style');
	// query
	$args = array(
			'post_type' => 'collaborateur',
			'meta_key' => 'nom',
			'orderby' => 'meta_value',
			'order' => 'ASC'
		);
	$the_query = new WP_Query($args);
	$clicface_trombi_settings = get_option('clicface_trombi_settings');
	switch($clicface_trombi_settings['trombi_affichage_type']) {
		case 'grid':
			$i = 1;
			echo '<table class="clicface-trombi-table">';
			echo '<tr>';
			while ( $the_query->have_posts() ) : $the_query->the_post();
				$collaborateur = new clicface_Collaborateur( get_the_ID() );
				echo '<td class="clicface-trombi-cellule">';
				echo $collaborateur->PhotoThumbnail;
				echo '<a class="clicface-trombi-collaborateur" href="'. $collaborateur->Link .'" target="_blank"><div>';
				echo '<strong>' . $collaborateur->Nom . '</strong><br />';
				echo '<i>' . $collaborateur->Fonction . '</i><br />';
				echo $collaborateur->Service;
				echo '</div></a>';
				echo '</td>';
				if ( $i % $clicface_trombi_settings['trombi_collaborateurs_par_ligne'] == 0) {
					echo '</tr><tr>';
				}
				$i++;
			endwhile;
			echo '</table>';
		break;
		
		default:
			echo '<table class="clicface-trombi-table">';
			echo '<tr><td colspan="2" style="border: none;"><hr></td></tr>';
			while ( $the_query->have_posts() ) : $the_query->the_post();
				$collaborateur = new clicface_Collaborateur( get_the_ID() );
				echo '<tr><td style="border: none;">';
				echo '<a class="clicface-trombi-collaborateur" href="'. $collaborateur->Link .'" target="_blank"><div>';
				echo '<strong>' . $collaborateur->Nom . '</strong><br />';
				echo '<i>' . $collaborateur->Fonction . '</i><br /><br />';
				echo '<u>' . __('Division:', 'clicface-trombi') . '</u><br />' . $collaborateur->Service;
				echo '</div></a>';
				echo '</td><td style="border: none;">';
				echo $collaborateur->PhotoThumbnail;
				echo '</td></tr>';
				echo '<tr><td colspan="2" style="border: none;"><hr></td></tr>';
			endwhile;
			echo '</table>';
		break;
	}
	wp_reset_postdata();
}

add_action( 'admin_menu' , 'remove_fonction_meta' );
function remove_fonction_meta() {
	remove_meta_box( 'tagsdiv-collaborateur_fonction', 'collaborateur', 'side' );
}

add_action( 'admin_menu' , 'remove_service_meta' );
function remove_service_meta() {
	remove_meta_box( 'tagsdiv-collaborateur_service', 'collaborateur', 'side' );
}

add_action( 'admin_menu' , 'remove_worksite_meta' );
function remove_worksite_meta() {
	remove_meta_box( 'tagsdiv-collaborateur_worksite', 'collaborateur', 'side' );
}

wp_register_style( 'clicface-trombi-style', plugins_url('clicface-trombi/css/clicface-trombi.css.php') );
