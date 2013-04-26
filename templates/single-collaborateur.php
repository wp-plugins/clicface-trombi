<?php

require_once( plugin_dir_path(__FILE__) . '../includes/class-collaborateur.php' );
$collaborateur = new clicface_Collaborateur( get_the_ID() );

$clicface_trombi_settings = get_option('clicface_trombi_settings');

if ($clicface_trombi_settings['trombi_target_window'] != 'thickbox') {
	get_header();
	wp_enqueue_style('clicface-trombi-style');
} else {
	echo '<html>';
	echo '<head>';
	echo '<title></title>';
	echo '<link rel="stylesheet" type="text/css" href="' . plugins_url( 'clicface-trombi/css/clicface-trombi.css') . '">';
	echo '<link rel="stylesheet" type="text/css" href="' . plugins_url( 'clicface-trombi/css/clicface-trombi-thickbox.css') . '">';
	echo '</head>';
	echo '<body>';
}
?>
<div id="content" role="main">
	<?php while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<a name="ClicfaceTrombi">&nbsp;</a>
			<?php if( $clicface_trombi_settings['trombi_display_return_link'] == 'oui' ): ?>
				<a href="javascript:history.go(-1)">&lt;&lt;&nbsp;<?php _e('Return to the previous page', 'clicface-trombi'); ?></a><br /><br />
			<?php endif; ?>
			<header class="entry-header">
				<h1 class="entry-title"><?php echo $collaborateur->Nom; ?></h1>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<div class="clicface-trombi-collaborateur-contenu">
					<table class="clicface-trombi-collaborateur-contenu-table">
						<tr>
							<td>
								<strong><?php echo $collaborateur->Nom; ?></strong><br />
								<?php echo $collaborateur->Fonction; ?><br />
								<i><?php echo $collaborateur->Service; ?></i><br /><br />
								<?php if( $collaborateur->TelephoneFixe != NULL ): ?>
									<?php _e('Phone:', 'clicface-trombi'); ?> <?php echo $collaborateur->TelephoneFixe; ?><br />
								<?php endif; ?>
								<?php if( $collaborateur->TelephonePortable != NULL ): ?>
									<?php _e('Cell:', 'clicface-trombi'); ?> <?php echo $collaborateur->TelephonePortable; ?><br />
								<?php endif; ?>
								<?php if( $collaborateur->Mail != NULL ): ?>
									<?php _e('E-mail:', 'clicface-trombi'); ?> <?php echo $collaborateur->Mailto; ?><br />
								<?php endif; ?>
								<br />
								<?php if( $collaborateur->Commentaires != NULL ): ?>
									<i><?php echo $collaborateur->Commentaires; ?></i><br />
								<?php endif; ?>
								<br />
							</td>
							<td>
								<?php echo $collaborateur->PhotoLarge; ?><br /><br />
							</td>
						</tr>
					</table>
				</div>
			</div><!-- .entry-content -->
		</article><!-- #post-<?php the_ID(); ?> -->
		<?php endwhile; // end of the loop. ?>
	</div><!-- #content -->
<?php
if ($clicface_trombi_settings['trombi_target_window'] != 'thickbox') {
	get_footer();
} else {
	echo '</body>';
	echo '</html>';
}
?>