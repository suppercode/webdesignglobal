<?php 
class Menu extends CWidget
{
	public $_active = '';
	public $_item_active = null;
	public $_url = NULL;
	public $_gmid = '';// group id
	public $_style = 'style1';
	public function init()
	{
		$dir = dirname(__FILE__).DS.'assets'.DS.$this->_style;
		$this->_url = Yii::app()->getAssetManager()->publish($dir,false,-1,YII_DEBUG);
		parent::init();
	}
	public function run()
	{
		if($module=Yii::app()->controller->getModule()!==null)
			$module =Yii::app()->controller->getModule()->getId();
			else 
			$module='';
			
		$controller=Yii::app()->controller->getId();
		$action=Yii::app()->controller->getAction()->getId();
		$params = (isset($_GET) && count($_GET)>0)?implode('&', $_GET):'';
		$id_cache = $module.'_'.$controller.'_'.$action.'_'.$params;
		
		$dependence = new CDbCacheDependency('select max(update_time) FROM tbl_menu_items WHERE menu_group='.$this->_gmid);
		if($this->beginCache($id_cache,array('duration'=>86400,'dependency'=>$dependence))){
		$menus = FrontendMenuItemsModel::model()->findAll('TRUE AND menu_group=:g AND published=1 ORDER BY position ASC', array(':g'=>$this->_gmid));
		foreach ($menus as $key =>$value){
			$data[] = array(
						'id'=>$value->id,
						'parent_id'=>$value->parent_id,
						'name'=>$value->name,
						'alias'=>$value->alias,
						'level'=>$value->level,
						'rule'=>$value->type->rule,
						'fixed_url'=>$value->fixed_url,
						'view'=>$value->type->view,
						'url_open'=>$value->url_open,
						'params'=>$value->params,
						'url'=>$value->url,
						'link'=>$this->createUrlMenu($value)
						);
		}
		//echo '<pre>';print_r($data);die();
		$items = $this->getList($data);
		
		$this->render($this->_style, array('active'=>$this->_active, 'items'=>$items));
		$this->endCache();
		}
	}
	public function getList($items)
	{
		$lastitem	= 0;
		foreach ($items as $i => $item){
			$item['deeper'] = false;
			$item['shallower'] = false;
			$item['level_diff'] = 0;
			if (isset($items[$lastitem])) {
					$items[$lastitem]['deeper']		= ($item['level'] > $items[$lastitem]['level']);
					$items[$lastitem]['shallower']	= ($item['level'] < $items[$lastitem]['level']);
					$items[$lastitem]['level_diff']	= ($items[$lastitem]['level'] - $item['level']);
				}
			$lastitem			= $i;
			if (isset($items[$lastitem])) {
				$items[$lastitem]['deeper']		= false;
				$items[$lastitem]['shallower']	= false;
				$items[$lastitem]['level_diff']	= 0;
			}
			$items[$lastitem]['active']=0;
			//active menu
			if(!empty($this->_item_active) && $item['id']==$this->_item_active){
				$items[$lastitem]['active']=1;
			}elseif(isset($item['params']['r']) && isset($item['params']['p']) && $this->isActive($item['params']['r'], $item['params']['p'])){
				$items[$lastitem]['active']=1;
			}elseif($_SERVER['REQUEST_URI']==$item['link']){
				$items[$lastitem]['active']=1;
			}
			if($items[$lastitem]['active']==1 && $items[$lastitem]['level']!=0){
				$this->_active = $this->getParent($items[$lastitem]['parent_id'], $items);
			}
			
		}
		return $items;
	}
	public function createUrlMenu($data)
	{
		switch ($data->type->view)
		{
			case 'home':
				$url = Yii::app()->controller->createUrlHome();
				break;
			case 'article':
				$url = Yii::app()->controller->createUrlArticle($data->content_id);
				break;
			case 'page':
				$url = Yii::app()->controller->createUrlPage($data->content_id);
				break;
			case 'custom':
				$param = @unserialize($data->params);
				$url = Yii::app()->controller->createUrl($param['r'], $param['p']);
				break;
			case 'fixed_url':
				$url = $data->url;
				break;
			default:
				$url = '';
				break;
		}
		return $url;
	}
	protected function getParent($parent,$data)
	{
		if($parent!=0){
			foreach($data as $key => $value){
				if($value['id']==$parent){
					self::getParent($value['parent_id'], $data);
				}
			}
		}
		return $parent;
	}
	protected function isActive($route, $params)
	{
		if($module=Yii::app()->controller->getModule()!==null)
			$module = Yii::app()->controller->getModule()->getId();
			else 
			$module='';
		$controller=Yii::app()->controller->getId();
		$action=Yii::app()->controller->getAction()->getId();
		$r = empty($module)?"/$controller/$action":"/$module/$controller/$action";
		if($route!=$r){
			return false;
		}
		if(is_array($params)){
			foreach ($params as $key => $value){
				if($_GET[$key]!=$value || !isset($_GET[$key])){
					return false;
				}
			}
		}
		return true;
	}
	public static function buildParams($params="")
	{
		$data = ($params!='')?unserialize($params):NULL;
	?>
	<label><?php echo Yii::t('admin_widgets','Show Title');?></label>
	<input type="checkbox" name="Menu[show_title]" value="1" <?php if(!empty($data) && $data['show_title']==1) echo 'checked="checked"';?>/>
	<label><?php echo Yii::t('admin_widgets','Cache Time');?>(s)</label>
	<input type="text" name="Menu[cache_duration]" value="<?php if(!empty($data)) echo $data['cache_duration'];?>" />
	<input type="hidden" name="widget" value="Menu" />
	<?php
	}
	public function getParams($post)
	{
		return  serialize($post['Menu']);
	}
		
}
?>
