<?php
/*
Title: Clicface Trombi
Setting: clicface_trombi_settings
Tab: Style
Tab Order: 50
*/

piklist('field', array(
	'type' => 'colorpicker'
	,'field' => 'vignette_color_border'
	,'label' => __('Border Color', 'clicface-trombi')
	,'value' => '#000000'
	,'description' => __('Click to pick a color.', 'clicface-trombi') . ' ' . __('Default color:', 'clicface-trombi') . ' #000000'
	,'attributes' => array(
		'class' => 'text'
	)
	,'position' => 'wrap'
));

piklist('field', array(
	'type' => 'number'
	,'field' => 'vignette_border_thickness'
	,'label' => __('Border thickness (in pixels)', 'clicface-trombi')
	,'value' => 1
	,'attributes' => array(
		'class' => 'small-text'
	)
));

piklist('field', array(
	'type' => 'number'
	,'field' => 'vignette_border_radius'
	,'label' => __('Border radius (in pixels)', 'clicface-trombi')
	,'value' => 1
	,'attributes' => array(
		'class' => 'small-text'
	)
));

piklist('field', array(
	'type' => 'colorpicker'
	,'field' => 'vignette_color_background_top'
	,'label' => __('Top Background Color', 'clicface-trombi')
	,'value' => '#FFFFFF'
	,'description' => __('Click to pick a color.', 'clicface-trombi') . ' ' . __('Default color:', 'clicface-trombi') . ' #FFFFFF'
	,'attributes' => array(
		'class' => 'text'
	)
	,'position' => 'wrap'
));

piklist('field', array(
	'type' => 'colorpicker'
	,'field' => 'vignette_color_background_bottom'
	,'label' => __('Bottom Background Color', 'clicface-trombi')
	,'value' => '#FFFFFF'
	,'description' => __('Click to pick a color.', 'clicface-trombi') . ' ' . __('Default color:', 'clicface-trombi') . ' #FFFFFF'
	,'attributes' => array(
		'class' => 'text'
	)
	,'position' => 'wrap'
));

piklist('field', array(
	'type' => 'radio'
	,'field' => 'vignette_ext_drop_shadow'
	,'label' => __('Display a drop shadow around the box', 'clicface-trombi')
	,'value' => 'oui'
	,'choices' => array(
		'oui' => __('Yes', 'clicface-trombi')
		,'non' => __('No', 'clicface-trombi')
	)
));

piklist('field', array(
	'type' => 'radio'
	,'field' => 'vignette_int_drop_shadow'
	,'label' => __('Display a drop shadow around the picture', 'clicface-trombi')
	,'value' => 'oui'
	,'choices' => array(
		'oui' => __('Yes', 'clicface-trombi')
		,'non' => __('No', 'clicface-trombi')
	)
));