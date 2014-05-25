<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'key_code'); ?>
		<?php echo $form->textField($model, 'key_code', array('maxlength' => 100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'value_code'); ?>
		<?php echo $form->textArea($model, 'value_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'type'); ?>
		<?php echo $form->dropDownList($model, 'type', array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'label'); ?>
		<?php echo $form->textField($model, 'label', array('maxlength' => 255)); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('main', 'Search'), array('class'=>'button p0 size1of1')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
