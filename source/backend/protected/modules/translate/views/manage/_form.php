<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'translates-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'table_name'); ?>
		<?php echo $form->textField($model, 'table_name', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'table_name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'pri_id'); ?>
		<?php echo $form->textField($model, 'pri_id'); ?>
		<?php echo $form->error($model,'pri_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'trans_content'); ?>
		<?php echo $form->textArea($model, 'trans_content'); ?>
		<?php echo $form->error($model,'trans_content'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'language'); ?>
		<?php echo $form->textField($model, 'language', array('maxlength' => 5)); ?>
		<?php echo $form->error($model,'language'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'update_time'); ?>
		<?php echo $form->textField($model, 'update_time'); ?>
		<?php echo $form->error($model,'update_time'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->