<?php

/*===========================
=            ACF            =
===========================*/

/*----------  Valeurs  ----------*/

add_filter('acf/load_field/name=bloc_style', 'my_acf_load_field');

	function my_acf_load_field( $field ) {
		$field['choices']['v1'] = 'Gris';
		$field['choices']['v2'] = 'Orange';
		return $field;
	}


/*----------  Validation  ----------*/

// paramètres, téléphone
add_filter( 'acf/validate_value/key=field_664dbd21f3632', 'pc_admin_acf_validate_phone', 10, 4 );


/*=====  FIN ACF  =====*/
