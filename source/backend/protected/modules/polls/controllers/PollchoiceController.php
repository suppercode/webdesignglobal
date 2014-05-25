<?php

class PollchoiceController extends BackendApplicationController
{

  public function actionAjaxcreate()
  {
    if (Yii::app()->request->isPostRequest)
    {
      $choice = new PollChoice;
      $choice->label = $_POST['label'];

      $result = new stdClass();
      $result->id = $_POST['id'];
      $result->html = $this->renderPartial('_formChoice', array(
        'id' => $_POST['id'],
        'choice' => $choice,
      ), TRUE);

      echo function_exists('json_encode') ? json_encode($result) : CJSON::encode($result);

      Yii::app()->end();
    }
    else
      throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
  }

  /**
   * Deletes a particular model.
   * If deletion is successful, the browser will be redirected to the 'admin' page.
   * @param integer $id the ID of the model to be deleted
   */
  public function actionDelete($id)
  {
    if(Yii::app()->request->isPostRequest)
    {
      // we only allow deletion via POST request
      $this->loadModel($id)->delete();

      // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
      if(!isset($_GET['ajax']))
        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }
    else
      throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
  }


  /**
   * Returns the data model based on the primary key given in the GET variable.
   * If the data model is not found, an HTTP exception will be raised.
   * @param integer the ID of the model to be loaded
   */
  public function loadModel($id, $modelClass='')
  {
    $model=PollChoice::model()->with('pollVotes')->findByPk($id);
    if($model===null)
      throw new CHttpException(404,'The requested page does not exist.');
    return $model;
  }

}
