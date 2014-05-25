<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('username')); ?>:
	<?php echo GxHtml::encode($data->username); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('phone')); ?>:
	<?php echo GxHtml::encode($data->phone); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('ship_address')); ?>:
	<?php echo GxHtml::encode($data->ship_address); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('payment_method')); ?>:
	<?php echo GxHtml::encode($data->payment_method); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('ship_method')); ?>:
	<?php echo GxHtml::encode($data->ship_method); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('user_id')); ?>:
	<?php echo GxHtml::encode($data->user_id); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('cart')); ?>:
	<?php echo GxHtml::encode($data->cart); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('status')); ?>:
	<?php echo GxHtml::encode($data->status); ?>
	<br />
	*/ ?>

</div>