<?php

class ShopController extends BackendApplicationController
{
	public $breadcrumbs;
	public $menu;
	public $_model;

	public function actionAdmin()
	{
		$category=new Category('search');
		$category->unsetAttributes();
		if(isset($_GET['Category']))
			$category->attributes=$_GET['Category'];
		
		$this->render('admin', array(
				'category'=>$category
			));
	}

	public function actionIndex()
	{
		$this->redirect(array('//shop/products/index'));
	}
}
