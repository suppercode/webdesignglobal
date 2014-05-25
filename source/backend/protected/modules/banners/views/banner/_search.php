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
		<?php echo $form->label($model, 'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'client_id'); ?>
		<?php echo $form->textField($model, 'client_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'ordering'); ?>
		<?php echo $form->textField($model, 'ordering'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'clicks'); ?>
		<?php echo $form->textField($model, 'clicks'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'params'); ?>
		<?php echo $form->textArea($model, 'params'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'click_url'); ?>
		<?php echo $form->textField($model, 'click_url', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'created_time'); ?>
		<?php echo $form->textField($model, 'created_time'); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
