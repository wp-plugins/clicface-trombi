<?php
// We'll be outputting CSS
header('Content-type: text/css');
require_once('../../../../wp-load.php');
$clicface_trombi_settings = get_option('clicface_trombi_settings');
?>
.clicface-trombi-table,
.clicface-trombi-table td a img {
	border: none !important;
}

.clicface-trombi-table td {
	text-align: center;
	vertical-align: middle;
}

.clicface-trombi-cellule {
	width: 250px;
	font-size: 13px;
	background-color: <?php echo $clicface_trombi_settings['vignette_color_background_top']; ?>;
	background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $clicface_trombi_settings['vignette_color_background_top']; ?>), to(<?php echo $clicface_trombi_settings['vignette_color_background_bottom']; ?>));
	border-radius: 8px;
	border: 2px solid <?php echo $clicface_trombi_settings['vignette_color_border']; ?>;
	color: #000000;
	-moz-border-radius: 6px;
	-webkit-border-horizontal-spacing: 0px;
	-webkit-border-vertical-spacing: 0px;
	-webkit-box-shadow: rgba(0, 0, 0, 0.496094) 3px 3px 3px 0px;
	box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.5);
}

.clicface-trombi-collaborateur {
	display: block;
	text-decoration: none;
	color: inherit;
}

.clicface-trombi-collaborateur-contenu {
	text-align: center;
	width: 100%;
}

.clicface-trombi-collaborateur-contenu-table {
	border: none !important;
	margin: 0 auto;
}

.clicface-trombi-collaborateur-contenu-table td {
	border: none !important;
	vertical-align: top;
}

#promote-clicface-trombi li {
	padding-left:20px;
	list-style-type: none;
}

#promote-clicface-trombi #twitter {
	background:url(sprite.png) -10px -746px no-repeat transparent;
}

#promote-clicface-trombi #star {
	background:url(sprite.png) -10px -710px no-repeat transparent;
}