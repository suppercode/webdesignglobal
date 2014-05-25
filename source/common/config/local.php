<?php
Yii::setPathOfAlias('root', dirname(dirname(dirname(__FILE__))));
Yii::setPathOfAlias('common', dirname(dirname(dirname(__FILE__))) . DS . 'common');
Yii::setPathOfAlias('frontend', dirname(dirname(dirname(__FILE__))) . DS . 'protected');
Yii::setPathOfAlias('backend', dirname(dirname(dirname(__FILE__))) . DS . 'backend');
//Yii::setPathOfAlias('system', dirname(dirname(dirname(__FILE__))) . DS . 'common'.DS.'libs'.DS.'framework');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return 
	array(
		'import'=>array(
				'common.components.*',
				'common.models.db.*',
		),
	// application components
	'components'=>array(
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=ahpproject',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
			'tablePrefix' => 'tbl_',
		),
	),
);
