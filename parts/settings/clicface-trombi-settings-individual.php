<?php
/*
Title: Individual Page
Setting: clicface_trombi_settings
Order: 40
*/

piklist('field', array(
	'type' => 'radio'
	,'field' => 'trombi_target_window'
	,'label' => __('Target to individual page', 'clicface-trombi')
	,'value' => '_blank'
	,'choices' => array(
		'_blank' => __('New Window', 'clicface-trombi')
		,'_self' => __('Same Window', 'clicface-trombi')
		,'thickbox' => 'ThickBox'
	)
));

 piklist('field', array(
 	'type' => 'radio'
	,'field' => 'display_small_name'
	,'label' => __('Display name again in the individual page info', 'clicface-trombi')
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
	,'description' => __('A link to the previous page can be displayed on each individual page when it is opened in the same window ; a link to close is displayed when the individual page is opened in a new window.', 'clicface-trombi')
	,'choices' => array(
		'oui' => __('Yes', 'clicface-trombi')
		,'non' => __('No', 'clicface-trombi')
	)
));

piklist('field', array(
	'type' => 'radio'
	,'field' => 'trombi_move_to_anchor'
	,'label' => __('Move the page to the content on each individual page (not applicable to ThickBox)', 'clicface-trombi')
	,'value' => 'non'
	,'description' => __('This option is useful when you have a big header on your website and you want to avoid visitors to scroll down to the content on each individual page.', 'clicface-trombi')
	,'choices' => array(
		'oui' => __('Yes', 'clicface-trombi')
		,'non' => __('No', 'clicface-trombi')
	)
));