<?php
class HelpTranslate
{
	public static function Params()
	{
		return array(
			'ct1'=>	array(
				'table'=>'tbl_content',
				'view'=>'news.tbl_content',
				'create_view'=>'news.translate',
				'update_view'=>'news.update',
				'model'=>'News',
				'name'=>Yii::t('admin_backend','News'),
				'fields'=> array('id','title','alias','introtext','fulltext'),
				'where'=>"tb.type='post'"
			),
			'ct2'=>array(
				'table'=>'tbl_content',
				'view'=>'page.tbl_content_pages',
				'create_view'=>'page.pages_create',
				'update_view'=>'page.pages_update',
				'model'=>'Pages',
				'name'=>Yii::t('admin_backend','Pages'),
				'fields'=> array('id','title','alias','introtext','fulltext'),
				'where'=>"tb.type='page'"
			),
			'ct3'=>array(
				'table'=>'tbl_categories',
				'model'=>'Categories',
				'name'=>Yii::t('app','News Category'),
				'view'=>'category.list',
				'create_view'=>'category.create',
				'update_view'=>'category.update',
				'fields'=> array('id','title','alias','description'),
				'where'=>''
			),
			'ct4'=>array(
				'table'=>'tbl_menu_items',
				'model'=>'Menus',
				'name'=>Yii::t('app','Menus'),
				'view'=>'menus.index',
				'create_view'=>'menus.create',
				'update_view'=>'menus.update',
				'fields'=> array('id','name','alias'),
				'where'=>''
			),
			'ct5'=>array(
				'table'=>'shop_products',
				'model'=>'BackendShopProductsModel',
				'name'=>Yii::t('app','Product'),
				'view'=>'product.list',
				'create_view'=>'product.create',
				'update_view'=>'product.update',
				'pri_key'=>'product_id',
				'field_to_show'=>array('c1.product_id','c1.title'),
				'fields'=> array('product_id','title','description', 'description_full','description_more'),
				'where'=>''
			),
		);
	}
	public static function parseSerilize($str)
	{
		if(empty($str) && strpos($str, ':')===false){
			return '';
		}
		$Ustr = unserialize($str);
		foreach ($Ustr as $key => $value){
			if($value!='') return $value;
		}
		return '';
	}
}