<?php

class FilterTranslateController extends BackendApplicationController
{
	public $layout = 'application.modules.translate.views.layouts.translate';
	public $_view = 'application.modules.translate.views.';
	public function init()
	{
		parent::init();
		$this->pageTitle = Yii::t("main","Languages Translate");
		$assetsGrid=Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.widgets._base.assets.gridview'),false, -1, YII_DEBUG);
		Yii::app()->getClientScript()->registerCssFile($assetsGrid.'/gridview.css');
	}
	public function actionIndex()
	{
		$this->render('index');
	}
	public function actionFilterlayout()
	{
		$paramsTrans = array(
			'key'=>'ct1',
			'language'=>'en',
		);
		if(Yii::app()->user->hasState('paramsTrans'))
				$paramsTrans = Yii::app()->user->getState('paramsTrans');
				else 
				Yii::app()->user->setState('paramsTrans',$paramsTrans);
				
		$ContentElement = HelpTranslate::Params();
		if (isset($_POST['Filter'])) {
			$paramsTrans = array(
				'key'=>$_POST['Filter']['contentType'],
				'language'=>$_POST['Filter']['language'],
			);
			Yii::app()->user->setState('paramsTrans',$paramsTrans);
		}
		$view = $ContentElement["{$paramsTrans['key']}"]['view'];
		/* echo $paramsTrans['key'];
		echo $this->_view.$view;die(); */
		$this->render($this->_view.$view,array('paramsTrans'=>$paramsTrans, 'languages'=>Yii::app()->params['languages']));
	}
	public function actionCreate($id)
	{
		$params_filter = Yii::app()->user->getState('paramsTrans');
		$ContentElement = HelpTranslate::Params();
		if(isset($_POST['BackendTranslatesModel'])){
			$content = serialize($_POST['BackendTranslatesModel']);
			$table = $ContentElement[$params_filter['key']]['table'];
			$published = isset($_POST['t_published'])&& $_POST['t_published']=='on'?1:0;
			
			$connection=Yii::app()->db;
			$transaction=$connection->beginTransaction();
			try
			{
				/* $translateModel = new BackendTranslatesModel;
				$translateModel->setAttribute('table_name', $table);
				$translateModel->setAttribute('trans_content', $content);
				$translateModel->setAttribute('pri_id', $_POST['element_id']);
				$translateModel->setAttribute('language', $params_filter['language']);
				$translateModel->setAttribute('published', $published);
				$rs1=$translateModel->save(); */
				$sql1 = "INSERT INTO tbl_translates(table_name,trans_content,pri_id,language,published)
						VALUE( '$table', '$content',{$_POST['element_id']},'{$params_filter['language']}',$published)
				";
			    $rs1 = $connection->createCommand($sql1)->execute();
			    switch ($params_filter['key'])
				{
					case 'ct1':
					case 'ct2':
					case 'ct3':
						$alias = 'alias_'.$params_filter['language'];
						$sql2 = "UPDATE $table
						SET $alias = '{$_POST['BackendTranslatesModel']['alias']}'
						WHERE id = {$_POST['element_id']}
						";
						$rs2 = $connection->createCommand($sql2)->execute();
						break;
					default:
						$rs2=true;
						break;
				}
			    $transaction->commit();
				if($rs1==true && $rs2==true){
					Yii::app()->user->setFlash('success',Yii::t('app','Translated was success!'));
				}
			}
			catch(Exception $e) // an exception is raised if a query fails
			{
			    $transaction->rollBack();
			    Yii::app()->user->setFlash('error',$e->getMessage());
			}
			$this->redirect(array("Filterlayout"));
		}
		switch($params_filter['key']){
			case 'ct1':
				$data = BackendNewsModel::model()->findByPk($id);
				break;
			case 'ct2':
				$data = BackendPagesModel::model()->findByPk($id);
				break;
			case 'ct3':
				$data = BackendCategoriesModel::model()->findByPk($id);
				break;
			case 'ct4':
				$data = BackendMenuItemsModel::model()->findByPk($id);
				break;
			default:
				$model = $ContentElement[$params_filter['key']]['model'];
				$data = $model::model()->findByPk($id);
				break;
		}
		
		$view_create = $ContentElement[$params_filter['key']]['create_view'];
		$this->render($this->_view.$view_create, array('data'=>$data, 'params'=>$ContentElement[$params_filter['key']]));
	}
	public function actionUpdateTrans($id)
	{
		$params_filter = Yii::app()->user->getState('paramsTrans');
		$ContentElement = HelpTranslate::Params();
		if(isset($_POST['BackendTranslatesModel'])){
			$content = serialize($_POST['BackendTranslatesModel']);
			//$model = $this->loadModel($_POST['tt_id'], 'Translates');
			
			//$model->trans_content = $content;
			$table = $ContentElement[$params_filter['key']]['table'];
			$published = isset($_POST['t_published'])&& $_POST['t_published']=='on'?1:0;
			$content = mysql_real_escape_string($content);
			$connection=Yii::app()->db;
			$transaction=$connection->beginTransaction();
			try
			{
				$sql1 = "UPDATE tbl_translates
						SET trans_content = '$content', published = $published
						WHERE id = {$_POST['tt_id']}
				";
				
			    $rs1 = $connection->createCommand($sql1)->execute();
			    
			    switch ($params_filter['key'])
				{
					case 'ct1':
					case 'ct2':
					case 'ct3':
						$alias = 'alias_'.$params_filter['language'];
						$sql2 = "UPDATE $table
						SET $alias = '{$_POST['BackendTranslatesModel']['alias']}'
						WHERE id = {$id}
						";
						$rs2 = $connection->createCommand($sql2)->execute();
						break;
					default:
						$rs2=true;
						break;
				}
			    $transaction->commit();
				if($rs1==true && $rs2==true){
					Yii::app()->user->setFlash('success',Yii::t('app','Updated was success!'));
				}
			}
			catch(Exception $e) // an exception is raised if a query fails
			{
			    $transaction->rollBack();
			    Yii::app()->user->setFlash('error',$e->getMessage());
			}
			$this->redirect(array("Filterlayout"));
		}
		$data = BackendTranslatesModel::getUpdateX($id);
		$view_update = $ContentElement[$params_filter['key']]['update_view'];
		$this->render($this->_view.$view_update, array('data'=>$data));
	}
	public function actionDelMulti()
	{
		if(Yii::app()->request->isPostRequest){
			$arr_Id = Yii::app()->request->getParam('data');
			if(strpos($arr_Id,':')!==false){
				$arrid = explode(':', $arr_Id);
			}else{
				$arrid[]=$arr_Id;
			}
			$remove = BackendTranslatesModel::removeTranslate($arrid);
			if($remove){
				Yii::app()->user->setFlash('success', Yii::t('main','Delete translate content was success!'));
			}else{
				Yii::app()->user->setFlash('error', Yii::t('main','Delete translate content was fail!'));
			}
		}else 
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
		Yii::app()->end();
	}
}