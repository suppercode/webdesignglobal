<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id'); ?>
		<?php echo $form->textField($model, 'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'table_name'); ?>
		<?php echo $form->textField($model, 'table_name', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'pri_id'); ?>
		<?php echo $form->textField($model, 'pri_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'trans_content'); ?>
		<?php echo $form->textArea($model, 'trans_content'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'language'); ?>
		<?php echo $form->textField($model, 'language', array('maxlength' => 5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'update_time'); ?>
		<?php echo $form->textField($model, 'update_time'); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
