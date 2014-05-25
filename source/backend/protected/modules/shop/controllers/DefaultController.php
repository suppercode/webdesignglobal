<?php
class DefaultController extends BackendApplicationController {
	public function actionIndex() {
   		 $this->redirect(array('shop/index'));
	}

 }
