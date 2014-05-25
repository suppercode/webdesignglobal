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
		<?php echo $form->label($model, 'title'); ?>
		<?php echo $form->textArea($model, 'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'show_title'); ?>
		<?php echo $form->dropDownList($model, 'show_title', array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'content'); ?>
		<?php echo $form->textArea($model, 'content'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'widget_name'); ?>
		<?php echo $form->textField($model, 'widget_name', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'ordering'); ?>
		<?php echo $form->textField($model, 'ordering'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'position'); ?>
		<?php echo $form->textField($model, 'position', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'params'); ?>
		<?php echo $form->textArea($model, 'params'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'created'); ?>
		<?php echo $form->textField($model, 'created'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'created_by'); ?>
		<?php echo $form->textField($model, 'created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'modified'); ?>
		<?php echo $form->textField($model, 'modified'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'modified_by'); ?>
		<?php echo $form->textField($model, 'modified_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'published'); ?>
		<?php echo $form->dropDownList($model, 'published', array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
