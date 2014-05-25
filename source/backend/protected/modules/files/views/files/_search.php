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
		<?php echo $form->label($model, 'source_path'); ?>
		<?php echo $form->textField($model, 'source_path', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'file_type'); ?>
		<?php echo $form->textField($model, 'file_type', array('maxlength' => 3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'file_size'); ?>
		<?php echo $form->textField($model, 'file_size', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'download'); ?>
		<?php echo $form->textField($model, 'download'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'view'); ?>
		<?php echo $form->textField($model, 'view'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'updated_datetime'); ?>
		<?php echo $form->textField($model, 'updated_datetime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'created_datetime'); ?>
		<?php echo $form->textField($model, 'created_datetime'); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
