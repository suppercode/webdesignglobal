<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'admin-settings-model-form',
	'enableAjaxValidation' => false,
));
?>
	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'key_code'); ?>
		<?php echo $form->textField($model, 'key_code', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'key_code'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'value_code'); ?>
		<?php echo $form->textArea($model, 'value_code'); ?>
		<?php echo $form->error($model,'value_code'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'label'); ?>
		<?php echo $form->textField($model, 'label', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'label'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'ordering'); ?>
		<?php echo $form->textField($model, 'ordering'); ?>
		<?php echo $form->error($model,'ordering'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model, 'type'); ?>
		<?php echo $form->error($model,'type'); ?>
		</div><!-- row -->
<?php
$this->endWidget();
?>
</div><!-- form -->