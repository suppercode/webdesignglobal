<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('name')); ?>:
	<?php echo GxHtml::encode($data->name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('alias')); ?>:
	<?php echo GxHtml::encode($data->alias); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('title_tree')); ?>:
	<?php echo GxHtml::encode($data->title_tree); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('parent_id')); ?>:
	<?php echo GxHtml::encode($data->parent_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('params')); ?>:
	<?php echo GxHtml::encode($data->params); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('url')); ?>:
	<?php echo GxHtml::encode($data->url); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('position')); ?>:
	<?php echo GxHtml::encode($data->position); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('ordering')); ?>:
	<?php echo GxHtml::encode($data->ordering); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('published')); ?>:
	<?php echo GxHtml::encode($data->published); ?>
	<br />
	*/ ?>

</div>