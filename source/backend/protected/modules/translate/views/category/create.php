<?php 
$this->btnOptions = '<a class="btn btn-sm btn-primary" onclick="jQuery(\'#category-translate-form\').submit();">'.Yii::t('main','Save').'</a>';
$this->btnOptions .='&nbsp;<a class="btn btn-sm btn-primary" href="'.Yii::app()->createUrl('/translate/filterTranslate/Filterlayout').'">'.Yii::t('main', 'Close').'</a>';
?>
<?php
$params_filter = Yii::app()->user->getState('paramsTrans');
$languages = Yii::app()->params['languages'];
?>
<div class="form">
<div><?php echo Yii::app()->user->getFlash('msg');?></div>
<form method="post" action="" id="category-translate-form">
<div class="row">
<label><?php echo Yii::t('app','Published')?></label>
<input type="checkbox" name="t_published" />
</div>
<div class="row">
<label><?php echo Yii::t('app','Title')?></label>
<input class="textField-l" readonly="readonly" disabled="disabled" type="text" name="title" value="<?php echo $data->title;?>" />
</div>
<div class="row">
<label><?php echo Yii::t('app','Title').'&nbsp('.$languages[$params_filter['language']].')';?></label>
<input class="textField-l" type="text" name="BackendTranslatesModel[title]" value="" />
</div>

<div class="row">
<label><?php echo Yii::t('app','Alias');?></label>
<input class="textField-l" disabled="disabled" type="text" name="alias" value="<?php echo $data->alias;?>" />
</div>
<div class="row">
<label><?php echo Yii::t('app','Alias').'&nbsp('.$languages[$params_filter['language']].')'?></label>
<input class="textField-l" type="text" name="BackendTranslatesModel[alias]" value="" />
</div>
<!-- Description -->
<div class="row">
<label><?php echo Yii::t('app','Description');?></label>
<div style="clear: both;width:98%;background: #EBEBE4;padding: 10px;border: 1px solid #999;overflow: hidden"><?php echo $data->description;?></div>
</div>
<div class="row">
<label><?php echo Yii::t('app','Description').'&nbsp('.$languages[$params_filter['language']].')';?></label>
<?php
	$this->widget('application.extensions.elrte.elRTE', array(
		    'selector'=>'BackendTranslatesModel_description',
		    'doctype' => '<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">',
		    'cssClass' => 'el-rte',
		    'absoluteURLs' => 'false',
		    'allowSource' => 'true',
		    'lang' => 'en',
		    'styleWithCSS' => 'true',
		    'height' => '500',
		    'width' => '100%',
		    'fmAllow' => 'true',
		    'toolbar' => 'maxi',
		 ));
		?>
	<textarea name="BackendTranslatesModel[description]" id="BackendTranslatesModel_description" ></textarea>
</div>

<input type="hidden" name="element_id" value="<?php echo $data->id;?>" />
</form>
</div>
