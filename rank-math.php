<?php

// tests désactivés
add_filter( 'rank_math/researches/tests', function( $tests, $type ) {
	
	unset(
		$tests['hasContentAI'],
		$tests['linksHasExternals'],
		$tests['linksNotAllExternals'],
		$tests['keywordInImageAlt'],
		$tests['contentHasAssets'],
		$tests['contentHasTOC']
	);
	return $tests;

}, 10, 2 );