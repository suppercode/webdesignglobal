<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'backend-widgets-position-model-form',
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
		<?php echo $form->labelEx($model,'options'); ?>
		<?php echo $form->textArea($model, 'options'); ?>
		<?php echo $form->error($model,'options'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'published'); ?>
		<?php echo $form->checkBox($model, 'published'); ?>
		<?php echo $form->error($model,'published'); ?>
		</div><!-- row -->
<input type="hidden" name="apply" id="apply" value="0" />
<?php
$this->endWidget();
?>
</div><!-- form -->