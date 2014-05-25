<div class="form">
<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'comment-form',
	'enableAjaxValidation' => false,
));
?>

	<?php echo $form->errorSummary($model); ?>
		<div class="row">
		<?php echo $form->labelEx($model,'post_id'); ?>
		<?php 
		if($model->post_id>0 && $title = BackendNewsModel::model()->findByPk($model->post_id)) echo $title;
			else
		echo $form->textField($model, 'post_id'); ?>
		<?php echo $form->error($model,'post_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model, 'content', array('class'=>'textarea-m')); ?>
		<?php echo $form->error($model,'content'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model, 'status', BackendLookupModel::items('CommentStatus')); ?>
		<?php echo $form->error($model,'status'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model, 'email', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'email'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model, 'url', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'url'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model, 'type', array('maxlength' => 10)); ?>
		<?php echo $form->error($model,'type'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'create_time'); ?>
		<?php 
		if($model->create_time>0) echo date('d-m-Y H:i:s', $model->create_time);
			else
				echo $form->textField($model, 'create_time'); ?>
		<?php echo $form->error($model,'create_time'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'author'); ?>
		<?php echo $form->textField($model, 'author', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'author'); ?>
		</div><!-- row -->
		<!--
		<div class="row">
		<?php echo $form->labelEx($model,'modified'); ?>
		<?php echo $form->textField($model, 'modified'); ?>
		<?php echo $form->error($model,'modified'); ?>
		</div>
		<div class="row">
		<?php echo $form->labelEx($model,'modified_by'); ?>
		<?php echo $form->textField($model, 'modified_by'); ?>
		<?php echo $form->error($model,'modified_by'); ?>
		</div>
		-->


<?php
$this->endWidget();
?>
</div><!-- form -->