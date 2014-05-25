<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('table_name')); ?>:
	<?php echo GxHtml::encode($data->table_name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('pri_id')); ?>:
	<?php echo GxHtml::encode($data->pri_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('content')); ?>:
	<?php echo GxHtml::encode($data->content); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('language')); ?>:
	<?php echo GxHtml::encode($data->language); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('update_time')); ?>:
	<?php echo GxHtml::encode($data->update_time); ?>
	<br />

</div>