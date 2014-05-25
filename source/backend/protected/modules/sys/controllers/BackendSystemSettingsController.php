<?php

class BackendSystemSettingsController extends BackendApplicationController {

	public function actionUpdate() {
		$id = isset($id)?$id:1;
		$model = $this->loadModel($id, 'BackendSystemSettingsModel');


		if (isset($_POST['BackendSystemSettingsModel'])) {
			$model->setAttributes($_POST['BackendSystemSettingsModel']);

			if ($model->save()) {
				$this->redirect(array('update', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

}