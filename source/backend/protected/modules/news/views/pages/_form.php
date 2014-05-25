<div class="form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'page-form',
	'enableAjaxValidation' => false,
));
?>
	<?php echo $form->errorSummary($model); ?>
	<div class="row">
	<?php echo $form->labelEx($model,'title'); ?>
	<?php echo $form->textField($model, 'title', array('maxlength' => 255, 'class'=>'textField-l', 'onBlur'=>'CoreJs.buildAlias(this.value, \'-\',\'BackendPagesModel_alias\');')); ?>
	<?php echo $form->error($model,'title'); ?>
	</div><!-- row -->
	<div class="row">
	<?php echo $form->labelEx($model,'alias'); ?>
	<?php echo $form->textField($model, 'alias', array('class'=>'textField-l')); ?>
	<?php echo $form->error($model,'alias'); ?>
	</div><!-- row -->
	<div class="row">
	<?php echo $form->labelEx($model,'status'); ?>
	<?php echo $form->dropDownList($model,'status',BackendLookupModel::items('PostStatus')); ?>
	</div>
	<div class="row">
	<?php echo $form->labelEx($model,'ordering'); ?>
	<?php echo $form->textField($model, 'ordering'); ?>
	<?php echo $form->error($model,'ordering'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'language'); ?>
		<?php 
			$langs = Yii::app()->params['languages'];
			echo $form->dropDownList($model,'language', $langs);
		?>
		<?php echo $form->error($model,'language'); ?>
	</div><!-- row -->
	<div class="row">
	<?php echo $form->labelEx($model,'parent'); ?>
	<?php 
	$meid = ($model->id>0)?$model->id:0;
	$pages_list = BackendPagesModel::model()->published()->findAll();
	$pages = CHtml::listData($pages_list, 'id', 'page_tree');
	echo '<select name="BackendPagesModel[parent]" id="BackendPagesModel_parent">';
	echo '<option value="">--None--</option>';
	foreach($pages as $key => $page):
		if($key==$meid){
			echo "<option disabled='disabled'>$page</option>";
		}else{
			if($model->parent==$key){
				$selected = "selected";
			}else{
				$selected="";
			}
			echo "<option value='$key' $selected>$page</option>";
		}
		
	endforeach;
	echo '</select>';
	?>
	<?php echo $form->error($model,'parent'); ?>
	</div><!-- row -->
	<div class="row">
	<?php echo $form->labelEx($model,'fulltext'); ?>
	<?php
	$this->widget('application.extensions.elrte.elRTE', array(
	    'selector'=>'BackendPagesModel_fulltext',
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
	  echo $form->textArea($model, 'fulltext'); 
	?>
	<?php echo $form->error($model,'fulltext'); ?>
	</div><!-- row -->
	
	<div class="row">
	<?php echo $form->labelEx($model,'metakey'); ?>
	<?php echo $form->textArea($model, 'metakey', array('class'=>'textarea-m')); ?>
	<?php echo $form->error($model,'metakey'); ?>
	</div><!-- row -->
	<div class="row">
	<?php echo $form->labelEx($model,'metadesc'); ?>
	<?php echo $form->textArea($model, 'metadesc', array('class'=>'textarea-m')); ?>
	<?php echo $form->error($model,'metadesc'); ?>
	</div><!-- row -->
	<input type="hidden" name="apply" id="apply" value="0" />
<?php
$this->endWidget();
?>
</div><!-- form -->