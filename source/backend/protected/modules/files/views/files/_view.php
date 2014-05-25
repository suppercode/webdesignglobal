<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('name')); ?>:
	<?php echo GxHtml::encode($data->name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('source_path')); ?>:
	<?php echo GxHtml::encode($data->source_path); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('file_type')); ?>:
	<?php echo GxHtml::encode($data->file_type); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('file_size')); ?>:
	<?php echo GxHtml::encode($data->file_size); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('download')); ?>:
	<?php echo GxHtml::encode($data->download); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('view')); ?>:
	<?php echo GxHtml::encode($data->view); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('updated_datetime')); ?>:
	<?php echo GxHtml::encode($data->updated_datetime); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('created_datetime')); ?>:
	<?php echo GxHtml::encode($data->created_datetime); ?>
	<br />
	*/ ?>

</div>