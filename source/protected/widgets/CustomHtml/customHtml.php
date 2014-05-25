<?php
class customHtml extends CWidget
{
	public $_wID = NULL;
	public $title = NULL;
	public $csClass='box_hot_top';
	public function init()
	{
		parent::init();
	}
	public function run()
	{
		$params = FrontendWidgetsModel::model()->findByPk($this->_wID);
		$this->render('default', array(
				'params'=>$params,
				'csClass'=>$this->csClass
		));
	}
	public static function buildParams($params="")
	{
		$data = @unserialize($params);
?>
	<label><?php echo Yii::t('admin_widgets','Content');?></label>
		<?php 
			Yii::app()->controller->widget('application.extensions.elrte.elRTE', array(
			    'selector'=>'customHtml_content',
			    'doctype' => '<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">',
			    'cssClass' => 'el-rte',
			    'absoluteURLs' => 'false',
			    'allowSource' => 'true',
			    'lang' => 'en',
			    'styleWithCSS' => 'true',
			    'height' => '350',
			    'width' => '100%',
			    'fmAllow' => 'true',
			    'toolbar' => 'maxi',
			 ));
		?>
	<textarea name="customHtml[content]" id="customHtml_content"><?php echo $data['content']?></textarea>
	<input type="hidden" name="widget" value="customHtml" />
	<?php
	}
	public function getParams($post)
	{
		return  serialize($post['customHtml']);
	}
}