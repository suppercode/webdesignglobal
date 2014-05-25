<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'backend-shop-order-transaction-model-form',
	'enableAjaxValidation' => false,
));
?>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model, 'username', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'username'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model, 'phone', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'phone'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'ship_address'); ?>
		<?php echo $form->textArea($model, 'ship_address', array('style'=>'width: 400px; height: 150px;')); ?>
		<?php echo $form->error($model,'ship_address'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'payment_method'); ?>
		<?php
			$dataList = CHtml::listData(BackendShopPaymentMethodModel::model()->findAll(), 'id', 'title');
			echo $form->dropDownList($model, 'payment_method', $dataList);
			echo $form->error($model,'payment_method'); 
		?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'ship_method'); ?>
		<?php
			$dataList = CHtml::listData(BackendShopShippingMethodModel::model()->findAll(), 'id', 'title');
			echo $form->dropDownList($model, 'ship_method', $dataList);
			echo $form->error($model,'ship_method'); 
		?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model, 'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'cart'); ?>
		<?php echo ShopHelpers::getCartContent($model->cart); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php
			$dataList = CHtml::listData(BackendShopOrderStatusModel::model()->findAll(), 'id', 'name');
			echo $form->dropDownList($model, 'status', $dataList);
			echo $form->error($model,'status'); 
		?>
		</div><!-- row -->

<input type="hidden" name="apply" id="apply" value="0" />
<?php
$this->endWidget();
?>
</div><!-- form -->