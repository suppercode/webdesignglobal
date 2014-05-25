<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('key_code')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->key_code), array('view', 'id' => $data->key_code)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('value_code')); ?>:
	<?php echo GxHtml::encode($data->value_code); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('type')); ?>:
	<?php echo GxHtml::encode($data->type); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('label')); ?>:
	<?php echo GxHtml::encode($data->label); ?>
	<br />

</div>