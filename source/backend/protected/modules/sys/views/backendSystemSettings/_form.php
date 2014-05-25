<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'backend-system-settings-model-form',
	'enableAjaxValidation' => false,
));
?>
	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model, 'description'); ?>
		<?php echo $form->error($model,'description'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model, 'email', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'email'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'paging'); ?>
		<?php echo $form->textField($model, 'paging'); ?>
		<?php echo $form->error($model,'paging'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textArea($model, 'address'); ?>
		<?php echo $form->error($model,'address'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'), array('class'=>'btn btn-primary'));
$this->endWidget();
?>
</div><!-- form -->