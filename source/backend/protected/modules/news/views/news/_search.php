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
		<?php echo $form->label($model, 'catid'); ?>
		<?php echo $form->textField($model, 'catid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'title'); ?>
		<?php echo $form->textField($model, 'title', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'fulltext'); ?>
		<?php echo $form->textArea($model, 'fulltext'); ?>
	</div>

	<div class="row buttons">
    	<?php echo GxHtml::submitButton(Yii::t('app', 'Search'), array('class'=>'btn btn-sm')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
