<?php

class MainController extends BackendApplicationController
{
	public $layout = 'application.modules.infosys.views.layouts.systeminfo';
	public function actionIndex()
	{
		$requirements=array(
	array(
		Yii::t('app','PHP version'),
		true,
		version_compare(PHP_VERSION,"5.1.0",">="),
		'<a href="http://www.yiiframework.com">Yii Framework</a>',
		Yii::t('app','PHP 5.1.0 or higher is required.')),
	array(
		Yii::t('app','$_SERVER variable'),
		true,
		($message=$this->checkServerVar()) === '',
		'<a href="http://www.yiiframework.com">Yii Framework</a>',
		$message),
	array(
		Yii::t('app','Reflection extension'),
		true,
		class_exists('Reflection',false),
		'<a href="http://www.yiiframework.com">Yii Framework</a>',
		''),
	array(
		Yii::t('app','PCRE extension'),
		true,
		extension_loaded("pcre"),
		'<a href="http://www.yiiframework.com">Yii Framework</a>',
		''),
	array(
		Yii::t('app','SPL extension'),
		true,
		extension_loaded("SPL"),
		'<a href="http://www.yiiframework.com">Yii Framework</a>',
		''),
	array(
		Yii::t('app','DOM extension'),
		false,
		class_exists("DOMDocument",false),
		'<a href="http://www.yiiframework.com/doc/api/CHtmlPurifier">CHtmlPurifier</a>, <a href="http://www.yiiframework.com/doc/api/CWsdlGenerator">CWsdlGenerator</a>',
		''),
	array(
		Yii::t('app','PDO extension'),
		false,
		extension_loaded('pdo'),
		Yii::t('app','All <a href="http://www.yiiframework.com/doc/api/#system.db">DB-related classes</a>'),
		''),
	array(
		Yii::t('app','PDO SQLite extension'),
		false,
		extension_loaded('pdo_sqlite'),
		Yii::t('app','All <a href="http://www.yiiframework.com/doc/api/#system.db">DB-related classes</a>'),
		Yii::t('app','This is required if you are using SQLite database.')),
	array(
		Yii::t('app','PDO MySQL extension'),
		false,
		extension_loaded('pdo_mysql'),
		Yii::t('app','All <a href="http://www.yiiframework.com/doc/api/#system.db">DB-related classes</a>'),
		Yii::t('app','This is required if you are using MySQL database.')),
	array(
		Yii::t('app','PDO PostgreSQL extension'),
		false,
		extension_loaded('pdo_pgsql'),
		Yii::t('app','All <a href="http://www.yiiframework.com/doc/api/#system.db">DB-related classes</a>'),
		Yii::t('app','This is required if you are using PostgreSQL database.')),
	array(
		Yii::t('app','Memcache extension'),
		false,
		extension_loaded("memcache") || extension_loaded("memcached"),
		'<a href="http://www.yiiframework.com/doc/api/CMemCache">CMemCache</a>',
		extension_loaded("memcached") ? Yii::t('app', 'To use memcached set <a href="http://www.yiiframework.com/doc/api/CMemCache#useMemcached-detail">CMemCache::useMemcached</a> to <code>true</code>.') : ''),
	array(
		Yii::t('app','APC extension'),
		false,
		extension_loaded("apc"),
		'<a href="http://www.yiiframework.com/doc/api/CApcCache">CApcCache</a>',
		''),
	array(
		Yii::t('app','Mcrypt extension'),
		false,
		extension_loaded("mcrypt"),
		'<a href="http://www.yiiframework.com/doc/api/CSecurityManager">CSecurityManager</a>',
		Yii::t('app','This is required by encrypt and decrypt methods.')),
	array(
		Yii::t('app','SOAP extension'),
		false,
		extension_loaded("soap"),
		'<a href="http://www.yiiframework.com/doc/api/CWebService">CWebService</a>, <a href="http://www.yiiframework.com/doc/api/CWebServiceAction">CWebServiceAction</a>',
		''),
	array(
		Yii::t('app','GD extension with<br />FreeType support'),
		false,
		($message=$this->checkGD()) === '',
		//extension_loaded('gd'),
		'<a href="http://www.yiiframework.com/doc/api/CCaptchaAction">CCaptchaAction</a>',
		$message),
	array(
		Yii::t('app','Ctype extension'),
		false,
		extension_loaded("ctype"),
		'<a href="http://www.yiiframework.com/doc/api/CDateFormatter">CDateFormatter</a>, <a href="http://www.yiiframework.com/doc/api/CDateFormatter">CDateTimeParser</a>, <a href="http://www.yiiframework.com/doc/api/CTextHighlighter">CTextHighlighter</a>, <a href="http://www.yiiframework.com/doc/api/CHtmlPurifier">CHtmlPurifier</a>',
		''
	)
	);
		$result=1;  // 1: all pass, 0: fail, -1: pass with warnings

		foreach($requirements as $i=>$requirement)
		{
			if($requirement[1] && !$requirement[2])
				$result=0;
			else if($result > 0 && !$requirement[1] && !$requirement[2])
				$result=-1;
			if($requirement[4] === '')
				$requirements[$i][4]='&nbsp;';
		}
		$this->render('index',array(
			'requirements'=>$requirements,
			'result'=>$result,
			'serverInfo'=>$this->getServerInfo()));
	}
	public function actionAuthor()
	{
		$this->render('author');
	}
	private function checkServerVar()
	{
		$vars=array('HTTP_HOST','SERVER_NAME','SERVER_PORT','SCRIPT_NAME','SCRIPT_FILENAME','PHP_SELF','HTTP_ACCEPT','HTTP_USER_AGENT');
		$missing=array();
		foreach($vars as $var)
		{
			if(!isset($_SERVER[$var]))
				$missing[]=$var;
		}
		if(!empty($missing))
			return Yii::t('app','$_SERVER does not have {vars}.',array('{vars}'=>implode(', ',$missing)));
	
		//if(realpath($_SERVER["SCRIPT_FILENAME"]) !== realpath(__FILE__))
		//	return Yii::t('app','$_SERVER["SCRIPT_FILENAME"] must be the same as the entry script file path.');
	
		if(!isset($_SERVER["REQUEST_URI"]) && isset($_SERVER["QUERY_STRING"]))
			return Yii::t('app','Either $_SERVER["REQUEST_URI"] or $_SERVER["QUERY_STRING"] must exist.');
	
		if(!isset($_SERVER["PATH_INFO"]) && strpos($_SERVER["PHP_SELF"],$_SERVER["SCRIPT_NAME"]) !== 0)
			return Yii::t('app','Unable to determine URL path info. Please make sure $_SERVER["PATH_INFO"] (or $_SERVER["PHP_SELF"] and $_SERVER["SCRIPT_NAME"]) contains proper value.');
	
		return '';
	}
	
	private function checkGD()
	{
		if(extension_loaded('gd'))
		{
			$gdinfo=gd_info();
			if($gdinfo['FreeType Support'])
				return '';
			return Yii::t('app','GD installed<br />FreeType support not installed');
		}
		return Yii::t('app','GD not installed');
	}
	
	private function getYiiVersion()
	{
		$coreFile=dirname(__FILE__).'/../framework/YiiBase.php';
		if(is_file($coreFile))
		{
			$contents=file_get_contents($coreFile);
			$matches=array();
			if(preg_match('/public static function getVersion.*?return \'(.*?)\'/ms',$contents,$matches) > 0)
				return $matches[1];
		}
		return '';
	}
	private function getServerInfo()
	{
		$info[]=isset($_SERVER['SERVER_SOFTWARE']) ? $_SERVER['SERVER_SOFTWARE'] : '';
		$info[]='<a href="http://www.yiiframework.com/">Yii Framework</a>/'.$this->getYiiVersion();
		$info[]=@strftime('%Y-%m-%d %H:%M',time());
	
		return implode(' ',$info);
	}
}