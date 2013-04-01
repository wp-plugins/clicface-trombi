<?php

require_once( plugin_dir_path(__FILE__) . '../includes/class-collaborateur.php' );
$collaborateur = new clicface_Collaborateur( get_the_ID() );

wp_enqueue_style('clicface-trombi-style');

get_header(); ?>
<div id="content" role="main">
	<?php while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
<?php get_footer(); ?>