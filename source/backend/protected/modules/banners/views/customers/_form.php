<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'customers-form',
	'enableAjaxValidation' => false,
));
?>

	<?php echo $form->errorSummary($model); ?>
		<div class="row">
		<?php echo $form->labelEx($model,'actived'); ?>
		<?php echo $form->checkBox($model, 'actived'); ?>
		<?php echo $form->error($model,'actived'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'contact'); ?>
		<?php echo $form->textArea($model, 'contact'); ?>
		<?php echo $form->error($model,'contact'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model, 'email', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'email'); ?>
		</div><!-- row -->
		<input type="hidden" name="apply" id="apply" value="0" />
<?php
$this->endWidget();
?>
</div><!-- form -->