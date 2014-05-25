<?php
$this->_toolbar = array(
		'title'		=>	Shop::t('Product Specifications'),
);

$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
