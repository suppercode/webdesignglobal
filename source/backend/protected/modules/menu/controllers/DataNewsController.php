<?php
class DataNewsController extends BackendApplicationController {
	public $layout = 'application.modules.menu.views.layouts.ajax';
	public function actionList()
	{
		$model = new DataNews('search');
		$model->unsetAttributes();

		if (isset($_GET['DataNews']))
			$model->attributes = $_GET['DataNews'];
		$this->render('list', array(
			'model' => $model,
		));
	}
	public function actionGetNews($id)
	{
		$data = DataNews::model()->findByPk($id);
		$news['id'] = $data->id;
		$news['title'] = $data->title;
		echo CJSON::encode($news);
	}
}