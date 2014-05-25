<?php
return CMap::mergeArray(
	require_once dirname(__FILE__).'/local.php',
	require_once dirname(__FILE__).'/params.php',
	array(
		//
		'import'=>array(
			'common.models.db.*',
			'common.models.db._base.*',
			'common.extensions.giix-components.*',
		),
		'params'=> array(
			'frontend_site_url'=>'http://localhost:8989/'
		)
	)
);
