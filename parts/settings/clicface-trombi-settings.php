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
	'type' => 'radio'
	,'field' => 'trombi_target_window'
	,'label' => __('Target of the links', 'clicface-trombi')
	,'value' => '_blank'
	,'choices' => array(
		'_blank' => __('New Window', 'clicface-trombi')
		,'_self' => __('Same Window', 'clicface-trombi')
		,'thickbox' => 'ThickBox'
	)
));

piklist('field', array(
	'type' => 'radio'
	,'field' => 'trombi_display_return_link'
	,'label' => __('Display a link to the previous page', 'clicface-trombi')
	,'value' => 'non'
	,'description' => __('A link to the previous page can be displayed on each employee\'s page.', 'clicface-trombi')
	,'choices' => array(
		'oui' => __('Yes', 'clicface-trombi')
		,'non' => __('No', 'clicface-trombi')
	)
));

piklist('field', array(
	'type' => 'radio'
	,'field' => 'trombi_move_to_anchor'
	,'label' => __('Move the page to the content on each employee\'s page', 'clicface-trombi')
	,'value' => 'non'
	,'description' => __('This option is useful when you have a big header on your website and you want to avoid visitors to scroll down to the content on each employee\'s page.', 'clicface-trombi')
	,'choices' => array(
		'oui' => __('Yes', 'clicface-trombi')
		,'non' => __('No', 'clicface-trombi')
	)
));

piklist('field', array(
	'type' => 'number'
	,'field' => 'trombi_collaborateurs_par_ligne'
	,'label' => __('Number of employees per line', 'clicface-trombi') . '<br />' . __('(for Grid display)', 'clicface-trombi')
	,'value' => 3
	,'attributes' => array(
		'class' => 'small-text'
	)
));