<?php
return CMap::mergeArray(
require_once dirname(__FILE__).'../../../../common/config/common.php',
array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Backend Application',
	'theme'=>'default',
	'defaultController'=>'dashboard',
	// preloading 'log' component
	'preload'=>array('log'),
	'language'=>'en',
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.widgets.*',
		'application.widgets._base.*',
		'application.modules.user.models.*',
		'application.modules.user.components.*',
		'application.modules.srbac.controllers.SBaseController',
		'application.modules.srbac.models.*',
		//'ext.bootstrap.*',
		'ext.giix-components.*',
		'ext.giix-core.*',
		'ext.jtogglecolumn.*',
		'ext.uploadify.*',
		'application.helpers.*'
	),
	'modules'=>array(
		'settings',
		'contact',
		'dashboard',
		'files',
		'news',
		'dev',
		'media',
		'polls',
		'banners',
		'gallery',
		'comment',
		'menu',
		'widget',
		'translate',
		'infosys',
		'shop' => array( 'debug' => 'true'),
		'sys',
		'user'=>array(
			# encrypting method (php hash function)
			'hash' => 'md5',
			# send activation email
			'sendActivationMail' => true,
			# allow access for non-activated users
			'loginNotActiv' => false,
			# activate user on registration (only sendActivationMail = false)
			'activeAfterRegister' => false,
			# automatically login from registration
			'autoLogin' => true,
			# registration path
			'registrationUrl' => array('/user/registration'),
			# recovery password path
			'recoveryUrl' => array('/user/recovery'),
            # login form path
			'loginUrl' => array('/user/login'),
			# page after login
			'returnUrl' => array('/user/profile'),
			# page after logout
			'returnLogoutUrl' => array('/user/login'),
        ),
		'srbac' => array(
			'userclass'=>'User', //default: User
			'userid'=>'id', //default: userid
			'username'=>'username', //default:username
			'delimeter'=>'@', //default:-'debug'=>true, //default :false
			'pageSize'=>10, // default : 15
			'superUser' =>'SupperAdmin', //default: Authorizer
			'css'=>'srbac.css',  //default: srbac.css
			'layout'=>'application.views.layouts.column2', //default: application.views.layouts.main,  
			//must be an existing alias
			'notAuthorizedView'=> 'srbac.views.authitem.unauthorized', // default:
			//srbac.views.authitem.unauthorized, must be an existing alias
			'alwaysAllowed'=>array(  //default: array()
				'SiteError'),
			'userActions'=>array('Show','View','List'), //default: array()
			'listBoxNumberOfLines' => 15,  //default : 10
			'imagesPath' => 'srbac.images', // default: srbac.images
			'imagesPack'=>'noia', //default: noia
			'iconText'=>true, // default : false
			'header'=>'srbac.views.authitem.header', //default : srbac.views.authitem.header, 
			//must be an existing alias
			'footer'=>'srbac.views.authitem.footer', //default: srbac.views.authitem.footer, 
			//must be an existing alias
			'showHeader'=>true, // default: false
			'showFooter'=>true, // default: false
			'alwaysAllowedPath'=>'srbac.components', // default: srbac.components
			// must be an existing alias
		),
		'gii' => array(
				'class' => 'system.gii.GiiModule',
				'password'=>'111',
				'generatorPaths' => array(
						'ext.giix-core', // giix generators
				),
				'ipFilters'=>array('127.0.0.1','::1'),
		),
	),

	// application components
	'components'=>array(
		'image'=>array(
				'class'=>'ext.image.CImageComponent',
				// GD or ImageMagick
				'driver'=>'GD',
				// ImageMagick setup path
				'params'=>array('directory'=>'/opt/local/bin'),
		),
		'user'=>array(
				// enable cookie-based authentication
				'class' => 'WebUser',
				'allowAutoLogin'=>true,
				'loginUrl' => array('/user/login'),
		),
		'authManager'=>array(
			// Path to SDbAuthManager in srbac module if you want to use case insensitive 
			//access checking (or CDbAuthManager for case sensitive access checking)
			'class'=>'application.modules.srbac.components.SDbAuthManager',
			// The database component used
			'connectionID'=>'db',
			// The itemTable name (default:authitem)
			'itemTable'=>'items',
			// The assignmentTable name (default:authassignment)
			'assignmentTable'=>'assignments',
			// The itemChildTable name (default:authitemchild)
			'itemChildTable'=>'itemchildren',
		),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=> array(
			'language_default'=>'vi',
			'languages'	=>	array(
					'vi'	=>	'Vietnamese',
					'en'	=>	'English',
			),
			'multilang'=>true,
			'widgets'	=>	array(
					array('class'=>'customHtml', 'title'=>'Custom Html', 'path'=>'frontend.widgets.CustomHtml.customHtml'),
					array('class'=>'Menu', 'title'=>'Menu', 'path'=>'frontend.widgets.Menu.Menu'),
					array('class'=>'Support', 'title'=>'Support', 'path'=>'frontend.widgets.Support.Support'),
			),
	)
));