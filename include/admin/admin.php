<?php

/*===========================================
=            ACF, filtres valeurs            =
===========================================*/

add_filter('acf/load_field/name=bloc_frame_color', 'my_acf_load_field');

	function my_acf_load_field( $field ) {
		$field['choices']['v1'] = 'Bleu';
		$field['choices']['v2'] = 'Vert';
		return $field;
	}


/*=====  FIN ACF, filtres valeurs  =====*/