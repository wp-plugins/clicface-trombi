<?php
/*
Title: Clicface Trombi
Setting: clicface_trombi_settings
Order: 10
*/

piklist('field', array(
	'type' => 'radio'
	,'field' => 'trombi_affichage_type'
	,'label' => __('Employee List Display', 'clicface-trombi')
	,'value' => 'grid'
	,'choices' => array(
		'grid' => __('Grid', 'clicface-trombi')
		,'list' => __('List', 'clicface-trombi')
	)
));

piklist('field', array(
	'type' => 'number'
	,'field' => 'trombi_collaborateurs_par_ligne'
	,'label' => __('Number of employees per line<br />(for Grid display)', 'clicface-trombi')
	,'value' => 3
	,'attributes' => array(
		'class' => 'small-text'
	)
));

piklist('field', array(
	'type' => 'colorpicker'
	,'field' => 'vignette_color_border'
	,'label' => __('Border Color<br />(for Grid display)', 'clicface-trombi')
	,'value' => '#B5D9EA'
	,'description' => __('Click to pick a color. Default color: ', 'clicface-trombi') . '#B5D9EA'
	,'attributes' => array(
		'class' => 'text'
	)
	,'position' => 'wrap'
));

piklist('field', array(
	'type' => 'colorpicker'
	,'field' => 'vignette_color_background_top'
	,'label' => __('Background Top Color<br />(for Grid display)', 'clicface-trombi')
	,'value' => '#EDF7FF'
	,'description' => __('Click to pick a color. Default color: ', 'clicface-trombi') . '#EDF7FF'
	,'attributes' => array(
		'class' => 'text'
	)
	,'position' => 'wrap'
));

piklist('field', array(
	'type' => 'colorpicker'
	,'field' => 'vignette_color_background_bottom'
	,'label' => __('Background Top Color<br />(for Grid display)', 'clicface-trombi')
	,'value' => '#CDE7EE'
	,'description' => __('Click to pick a color. Default color: ', 'clicface-trombi') . '#CDE7EE'
	,'attributes' => array(
		'class' => 'text'
	)
	,'position' => 'wrap'
));