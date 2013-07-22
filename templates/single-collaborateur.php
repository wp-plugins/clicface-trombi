<?php

require_once( plugin_dir_path(__FILE__) . '../includes/class-collaborateur.php' );
$collaborateur = new clicface_Collaborateur( get_the_ID() );

$clicface_trombi_settings = get_option('clicface_trombi_settings');
$display_small_name = $clicface_trombi_settings['display_small_name'];

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
			<?php if( $clicface_trombi_settings['trombi_display_return_link'] == 'oui' && $clicface_trombi_settings['trombi_target_window'] == '_self' ): ?>
				<a href="javascript:history.go(-1)">&lt;&lt;&nbsp;<?php _e('Return to the previous page', 'clicface-trombi'); ?></a><br /><br />
			<?php endif; ?>
			<?php if( $clicface_trombi_settings['trombi_display_return_link'] == 'oui' && $clicface_trombi_settings['trombi_target_window'] == '_blank' ): ?>
				<a href="javascript:self.close()"><?php _e('Close this Window', 'clicface-trombi'); ?></a><br /><br />
			<?php endif; ?>
			<header class="entry-header">
				<h1 class="entry-title"><?php echo $collaborateur->Nom; ?></h1>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<div class="clicface-trombi-collaborateur-contenu">
					<table class="clicface-trombi-collaborateur-contenu-table">
						<tr>
							<td>
								<?php if( $display_small_name == 'oui' ): ?>
									<div class="clicface-trombi-person-name"><?php echo $collaborateur->Nom; ?></div>
								<?php endif; ?>
								<div class="clicface-trombi-person-function"><?php echo $collaborateur->Fonction; ?></div>
								<div class="clicface-trombi-person-service"><?php echo $collaborateur->Service; ?></div><br />
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
									<div class="clicface-trombi-person-comments"><?php echo $collaborateur->Commentaires; ?></div>
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