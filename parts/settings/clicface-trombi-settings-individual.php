<?php
/*
Title: Person's Profile
Setting: clicface_trombi_settings
Tab: Person's Profile
Tab Order: 20
*/

piklist('field', array(
	'type' => 'radio'
	,'field' => 'trombi_target_window'
	,'label' => __('Target to Person\'s Profile', 'clicface-trombi')
	,'value' => '_blank'
	,'choices' => array(
		'_blank' => __('New Window', 'clicface-trombi')
		,'_self' => __('Same Window', 'clicface-trombi')
		,'thickbox' => 'ThickBox'
	)
));

piklist('field', array(
	'type' => 'radio'
	,'field' => 'trombi_profile_width_type'
	,'label' => __('Width type', 'clicface-trombi')
	,'value' => 'fixed'
	,'choices' => array(
		'max' => __('100%', 'clicface-trombi')
		,'fixed' => __('Fixed size', 'clicface-trombi')
	)
));

piklist('field', array(
	'type' => 'number'
	,'field' => 'trombi_profile_width_size'
	,'label' => __('Width (in pixels)', 'clicface-trombi')
	,'value' => 720
	,'attributes' => array(
		'class' => 'small-text'
	)
	,'conditions' => array(
		array(
			'field' => 'trombi_profile_width_type'
			,'value' => 'fixed'
		)
	)
));

piklist('field', array(
	'type' => 'radio'
	,'field' => 'trombi_profile_height_type'
	,'label' => __('Height type', 'clicface-trombi')
	,'value' => 'fixed'
	,'choices' => array(
		'auto' => __('Auto : fit to content', 'clicface-trombi')
		,'fixed' => __('Fixed size', 'clicface-trombi')
	)
));

piklist('field', array(
	'type' => 'number'
	,'field' => 'trombi_profile_height_size'
	,'label' => __('Height (in pixels)', 'clicface-trombi')
	,'value' => 440
	,'attributes' => array(
		'class' => 'small-text'
	)
	,'conditions' => array(
		array(
			'field' => 'trombi_profile_height_type'
			,'value' => 'fixed'
		)
	)
));

piklist('field', array(
	'type' => 'radio'
	,'field' => 'trombi_display_worksite'
	,'label' => __('Display worksite', 'clicface-trombi')
	,'value' => 'non'
	,'choices' => array(
		'oui' => __('Yes', 'clicface-trombi')
		,'non' => __('No', 'clicface-trombi')
	)
));

piklist('field', array(
	'type' => 'radio'
	,'field' => 'trombi_display_return_link'
	,'label' => __('Display a link to the previous page or a link to close the new window (not applicable to ThickBox)', 'clicface-trombi')
	,'value' => 'non'
	,'description' => __('A link to the previous page can be displayed on each Person\'s Profile page when it is opened in the same window ; a link to close is displayed when the Person\'s Profile page is opened in a new window.', 'clicface-trombi')
	,'choices' => array(
		'oui' => __('Yes', 'clicface-trombi')
		,'non' => __('No', 'clicface-trombi')
	)
));

piklist('field', array(
	'type' => 'radio'
	,'field' => 'trombi_move_to_anchor'
	,'label' => __('Move the page to the content on each Person\'s Profile page (not applicable to ThickBox)', 'clicface-trombi')
	,'value' => 'non'
	,'description' => __('This option is useful when you have a big header on your website and you want to avoid visitors to scroll down to the content on each Person\'s Profile page.', 'clicface-trombi')
	,'choices' => array(
		'oui' => __('Yes', 'clicface-trombi')
		,'non' => __('No', 'clicface-trombi')
	)
));

piklist('field', array(
	'type' => 'file'
	,'field' => 'trombi_default_picture'
	,'label' => __('Default picture URL', 'clicface-trombi')
	,'description' => __('This picture will be displayed if no picture is provided.', 'clicface-trombi')
	,'options' => array(
		'title' => 'Add a picture'
		,'button' => 'Add a picture'
	)
));