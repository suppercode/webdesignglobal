<?php
class DataPageController extends BackendApplicationController {
	public $layout = 'application.modules.menu.views.layouts.ajax';
	public function actionList()
	{
		$model = new DataPage('search');
		$model->unsetAttributes();

		if (isset($_GET['DataPage']))
			$model->attributes = $_GET['DataPage'];
		$this->render('list', array(
			'model' => $model,
		));
	}
	public function actionGetPage($id)
	{
		$data = BackendPagesModel::model()->findByPk($id);
		$news['title'] = $data->title;
		$news['id'] = $data->id;
		echo CJSON::encode($news);
	}
}