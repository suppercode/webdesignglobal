<?php
class BlogController extends FrontendController
{
	public function actionIndex()
	{
		$this->render('index');
	}
}