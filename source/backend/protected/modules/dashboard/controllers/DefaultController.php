<?php

class DefaultController extends BackendApplicationController
{
	public $layout = 'application.modules.dashboard.views.layouts.dashboard';
	public function actionIndex()
	{
		$settings = array();
	  
		// Get user settings.
		$id = Yii::app()->user->id;
	  	$criteria=new CDbCriteria(array(
      		'condition'=>'uid=' . Yii::app()->user->id,
	    ));
	
	    $dataProvider=new CActiveDataProvider('DashboardPortlet', array('criteria' => $criteria));
	    $data = $dataProvider->getData();
	  
	    if (isset($data[0]))
	    {
	      $userSettings = unserialize($data[0]->settings);
	      
	      foreach ($userSettings as $class => $properties)
	      {
	        $settings[$properties['column']][$properties['weight']] = array(
	          'class' => $class,
	          'visible' => $properties['visible'],
	          'weight' => $properties['weight']
	        );
	      }
	      
	      foreach ($settings as $key => $value)
	      {
	        // Sort all portlets in every column by weight.
	        ksort($settings[$key]);
	      }
	    }
	    
	    // Use the default portlets settings if user did not set any portlet before.
	    if (empty($settings))
	    {
	      $deaultSettings = $this->getModule()->portlets;
	    
	      foreach ($deaultSettings as $class => $properties)
	      {
	        $column = isset($properties['column']) ? $properties['column'] : 0;
	        $settings[$column][$properties['weight']] = array(
	          'class' => $class,
	          'visible' => isset($properties['visible']) ? $properties['visible'] : true,
	          'weight' => $properties['weight']
	        );
	      }
	    }
	    $this->render('index',array(
	      'portlets'=>$settings
	    ));
	}
	
	/**
	 * Used for ajax call to save user portlets settings.
	 */
	public function actionSave()
	{
	  if (isset($_POST['portlets']) && !empty($_POST['portlets']))
	  {
	    $portlets = CJavaScript::jsonDecode($_POST['portlets']);
	    $transaction=Yii::app()->db->beginTransaction();
	    
	    try
	    {
	      // Delete outdated user settings.
  	    DashboardPortlet::model()->deleteAll('uid=:uid', array(':uid' => Yii::app()->user->id));

  	    // Save user new settings.
  	    $model = new DashboardPortlet;
  	    $model->settings = serialize($portlets);
  	    $model->save();
  	    
  	    $transaction->commit();
  	    
  	    echo CJavaScript::jsonEncode(array('message' => 'Save Successfully'));
	    }
	    catch (Exception $e)
	    {
	      $transaction->rollBack();
	      echo CJavaScript::jsonEncode(array('message' => 'Transaction Failed'));
	    }
	  }
	  else
	  {
	    echo CJavaScript::jsonEncode(array('message' => 'Incorrect arguments'));
	  }
	  
	  Yii::app()->end();
	}
	
	/**
	 * refresh
	 */
	public function actionRefresh()
	{
		sleep(2);
		$portlet = Yii::app()->request->getParam('portlets');
		
		$this->renderPartial('refresh', array('portlet'=>$portlet));
	}
}