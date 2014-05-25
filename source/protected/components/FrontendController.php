<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class FrontendController extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column2';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	public $activemenu = null;
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	public function init(){
		
		parent::init();
		/* if(Yii::app()->params['multilang']){
			$lang = (isset($_GET['lang']) && in_array($_GET['lang'], array_keys(Yii::app()->params['languages'])))?$_GET['lang']:Yii::app()->params['language_default'];
			Yii::app()->user->setState('applicationLanguage', $lang);

			Yii::app()->language=Yii::app()->user->getState('applicationLanguage');
		}else{
			Yii::app()->language=Yii::app()->params['language_default'];
		}
		Yii::app()->clientScript->registerCoreScript('jquery'); */
	}
	/**
	 * @see CController::createUrl()
	 */
	public function createUrl($route,$params=array(),$ampersand='&')
	{
		if($route==='')
			$route=$this->getId().'/'.$this->getAction()->getId();
		else if(strpos($route,'/')===false)
			$route=$this->getId().'/'.$route;
		if($route[0]!=='/' && ($module=$this->getModule())!==null)
			$route=$module->getId().'/'.$route;
		if(Yii::app()->params['multilang'] && !isset($params['lang'])){
			if(isset($_GET['lang']) && $_GET['lang']!='' && $_GET['lang']!=Yii::app()->params['language_default']){
				$params['lang']=$_GET['lang'];
			}
		}
		return Yii::app()->createUrl(trim($route,'/'),$params,$ampersand);
	}
	/**
	 * @see CController::createUrl()
	 */
	public function createUrlHome($params=array(),$ampersand='&')
	{
		$route = '/site/index';
		if($route==='')
			$route=$this->getId().'/'.$this->getAction()->getId();
		else if(strpos($route,'/')===false)
			$route=$this->getId().'/'.$route;
		if($route[0]!=='/' && ($module=$this->getModule())!==null)
			$route=$module->getId().'/'.$route;
		if(Yii::app()->params['multilang'] && !isset($params['lang'])){
			if(isset($_GET['lang']) && $_GET['lang']!='' && $_GET['lang']!=Yii::app()->params['language_default']){
				$params['lang']=$_GET['lang'];
			}
		}
		return Yii::app()->createUrl(trim($route,'/'),$params,$ampersand);
	}
	/**
	 * Create Url Article
	 * @param Int $postId
	 * @param String $route
	 * @param array $params
	 * @param String $ampersand
	 */
	public function createUrlArticle($postId, $route='/post/read', $params=array(), $ampersand='&')
	{
		if($route==='')
			$route=$this->getId().'/'.$this->getAction()->getId();
		else if(strpos($route,'/')===false)
			$route=$this->getId().'/'.$route;
		if($route[0]!=='/' && ($module=$this->getModule())!==null)
			$route=$module->getId().'/'.$route;
		//get param for create url
		$post = FrontendNewsModel::model()->published()->findByPk($postId);
		$params['id'] 		= $postId;
		$params['cat']		= FrontendCategoriesModel::model()->findByPk($post->catid)->alias;
		$params['alias'] 	= $post->alias;
		$params['year'] 	= date('Y', strtotime($post->created));
		$params['month'] 	= date('m', strtotime($post->created));
		if(Yii::app()->params['multilang'] && !isset($params['lang'])){
			if(isset($_GET['lang']) && $_GET['lang']!='' && $_GET['lang']!=Yii::app()->params['language_default']){
				$params['lang']=$_GET['lang'];
			}
		}
		return Yii::app()->createUrl(trim($route,'/'),$params,$ampersand);
	}
	/**
	 * Create Url Category 
	 * @param int $postId
	 * @param string $route
	 * @param array $params
	 * @param string $ampersand
	 */
	public function createUrlArticleCategory($catId, $route='/post/category', $params=array(), $ampersand='&')
	{
		if($route==='')
			$route=$this->getId().'/'.$this->getAction()->getId();
		else if(strpos($route,'/')===false)
			$route=$this->getId().'/'.$route;
		if($route[0]!=='/' && ($module=$this->getModule())!==null)
			$route=$module->getId().'/'.$route;
		//get param for create url
		$cat = FrontendCategoriesModel::model()->findByPk($catId);
		$params['id'] 		= $catId;
		$params['alias'] 	= $cat->alias;
		if(Yii::app()->params['multilang'] && !isset($params['lang'])){
			if(isset($_GET['lang']) && $_GET['lang']!='' && $_GET['lang']!=Yii::app()->params['language_default']){
				$params['lang']=$_GET['lang'];
			}
		}
		return Yii::app()->createUrl(trim($route,'/'),$params,$ampersand);
	}
	/**
	 * Create Url Page Dynamic
	 * @param Int $postId
	 * @param String $route
	 * @param array $params
	 * @param String $ampersand
	 */
	public function createUrlPage($pageId, $route='/site/page', $params=array(), $ampersand='&')
	{
		if($route==='')
			$route=$this->getId().'/'.$this->getAction()->getId();
		else if(strpos($route,'/')===false)
			$route=$this->getId().'/'.$route;
		if($route[0]!=='/' && ($module=$this->getModule())!==null)
			$route=$module->getId().'/'.$route;
		
		//get param for create url
		$page = FrontendPagesModel::model()->published()->findByPk($pageId);
		$language = Yii::app()->language;
		$field = ($language==Yii::app()->params['language_default'])?"alias":"alias_".$language;
		$params['alias'] 	= $page->alias;
		if(Yii::app()->params['multilang'] && !isset($params['lang'])){
			if(isset($_GET['lang']) && $_GET['lang']!='' && $_GET['lang']!=Yii::app()->params['language_default']){
				$params['lang']=$_GET['lang'];
			}
		}
		return Yii::app()->createUrl(trim($route,'/'),$params,$ampersand);
	}
	public function createUrlProductDetail($productId, $route='/product/detail', $params=array(), $ampersand='&')
	{
		if($route==='')
			$route=$this->getId().'/'.$this->getAction()->getId();
		else if(strpos($route,'/')===false)
			$route=$this->getId().'/'.$route;
		if($route[0]!=='/' && ($module=$this->getModule())!==null)
			$route=$module->getId().'/'.$route;
		//get param for create url
		$title = FrontendShopProductsModel::model()->findByPk($productId)->title;
		$alias = StringCommon::str_normalizer($title);
		$params['id'] = $productId;
		$params['alias'] = $alias;
		if(Yii::app()->params['multilang'] && !isset($params['lang'])){
			if(isset($_GET['lang']) && $_GET['lang']!='' && $_GET['lang']!=Yii::app()->params['language_default']){
				$params['lang']=$_GET['lang'];
			}
		}
		return Yii::app()->createUrl(trim($route,'/'),$params,$ampersand);
	}
	public function createUrlProductCat($catId, $route='/product/category', $params=array(), $ampersand='&')
	{
		if($route==='')
			$route=$this->getId().'/'.$this->getAction()->getId();
		else if(strpos($route,'/')===false)
			$route=$this->getId().'/'.$route;
		if($route[0]!=='/' && ($module=$this->getModule())!==null)
			$route=$module->getId().'/'.$route;
		//get param for create url
		$title = FrontendShopCategoryModel::model()->findByPk($catId)->title;
		$alias = StringCommon::str_normalizer($title);
		$params['id'] = $catId;
		$params['alias'] = $alias;
		if(Yii::app()->params['multilang'] && !isset($params['lang'])){
			if(isset($_GET['lang']) && $_GET['lang']!='' && $_GET['lang']!=Yii::app()->params['language_default']){
				$params['lang']=$_GET['lang'];
			}
		}
		return Yii::app()->createUrl(trim($route,'/'),$params,$ampersand);
	}
	public function createUrlAskDetail($askId, $route='/ask/detail', $params=array(), $ampersand='&')
	{
		if($route==='')
			$route=$this->getId().'/'.$this->getAction()->getId();
		else if(strpos($route,'/')===false)
			$route=$this->getId().'/'.$route;
		if($route[0]!=='/' && ($module=$this->getModule())!==null)
			$route=$module->getId().'/'.$route;
		//get param for create url
		$title = FrontendAskModel::model()->findByPk($askId)->title;
		$alias = StringCommon::str_normalizer($title);
		$params['id'] = $askId;
		$params['alias'] = $alias;
		return Yii::app()->createUrl(trim($route,'/'),$params,$ampersand);
	}
	
}