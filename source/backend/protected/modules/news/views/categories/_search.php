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
		<?php echo $form->label($model, 'parent_id'); ?>
		<?php echo $form->textField($model, 'parent_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'level'); ?>
		<?php echo $form->textField($model, 'level'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'title'); ?>
		<?php echo $form->textField($model, 'title', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'alias'); ?>
		<?php echo $form->textField($model, 'alias', array('maxlength' => 255)); ?>
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
