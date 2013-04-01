<?php
class clicface_Collaborateur {
	function __construct( $id ) {
		try {
			// Nom
			$this->Nom = get_the_title($id);
			
			// Lien vers la fiche
			$this->Link = get_permalink($id);
			
			// Fonction
			$this->Fonction = get_post_meta($id , 'fonction', true);
			
			// Service
			$collaborateur_service = wp_get_post_terms( $id, 'collaborateur_service' );
			if ( isset($collaborateur_service[0]->name) ) {
				$this->Service = $collaborateur_service[0]->name;
			} else {
				$this->Service = NULL;
			}
			
			// Mail
			if( !function_exists('convert_email_adr') ){
				function convert_email_adr($email) {
					$pieces = str_split(trim($email));
					$new_mail = '';
					foreach ($pieces as $val) {
						$new_mail .= '&#'.ord($val).';';
					}
					return $new_mail;
				}
			}
			$this->Mail = get_post_meta($id , 'mail', true);
			$this->Mailto = '<a href="mailto:' . convert_email_adr( get_post_meta($id , 'mail', true) ) . '">' . convert_email_adr( get_post_meta($id , 'mail', true) ) . '</a>';
			
			// Téléphone fixe
			$this->TelephoneFixe = get_post_meta($id , 'telephone_fixe', true);
			
			// Téléphone portable
			$this->TelephonePortable = get_post_meta($id , 'telephone_portable', true);
			
			// Commentaires
			$this->Commentaires = get_post_meta($id , 'commentaires', true);
			
			// Photo
			$args = array(
				'post_type' => 'attachment'
				,'numberposts' => 1
				,'post_parent' => $id
				,'post_status' => 'all'
			);
			$attachments = get_posts( $args );
			if ($attachments) {
				global $wp_post_statuses;
				remove_all_filters('get_the_excerpt'); // Since we're using the_excerpt for notes, we need to keep it clean.
				foreach ( $attachments as $post ) {
					setup_postdata($post);
					$this->PhotoThumbnail = '<div id="pik_post_attachment_' . $post->ID . '" class="piklist-field-container">';
					$this->PhotoThumbnail .= '<div class="piklist-label-container"><a href="' . $this->Link . '" target="_blank">' . wp_get_attachment_image( $post->ID, 'thumbnail', false, true ) . '</a></div>';
					$this->PhotoThumbnail .= '</div>';
					
					$this->PhotoLarge = '<div id="pik_post_attachment_' . $post->ID . '" class="piklist-field-container">';
					$this->PhotoLarge .= '<div class="piklist-label-container">' . wp_get_attachment_image( $post->ID, 'large', false, true ) . '</div>';
					$this->PhotoLarge .= '</div>';
				}
			} else {
				$this->PhotoThumbnail = '-';
				$this->PhotoLarge = NULL;
			}
			
			// QR Code
			$this->QRCode = <<<EOF
BEGIN:VCARD
VERSION:3.0
N:$this->Nom
FN:$this->Nom
TITLE:$this->Fonction
TEL;TYPE=WORK,VOICE:$this->TelephoneFixe
TEL;TYPE=CELL,VOICE:$this->TelephonePortable
EMAIL;TYPE=PREF,INTERNET:$this->Mail
END:VCARD
EOF;
			$this->QRCode =  str_replace('&rsquo;', '\'', $this->QRCode);
			$this->QRCode =  addslashes($this->QRCode);
			$this->QRCode =  utf8_encode($this->QRCode);
			$this->QRCode = str_replace(array("\r\n", "\r", "\n"), '\n', $this->QRCode);
			
			$this->Erreur = false;
			return true;
		}
		
		catch (Exception $e) {
			$this->Erreur = __('An error occured for the employee', 'clicface-trombi') . " $this->Nom : " . $e->getMessage() . "\r";
			return false;
		}
	}
}
