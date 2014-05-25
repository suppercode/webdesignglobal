<?php
$this->_toolbar = array(
	'title'		=>	Shop::t('Upload Image'),
);

?>

<div id="shopcontent">

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

</div>
