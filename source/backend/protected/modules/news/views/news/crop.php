<?php 
$assets_path = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.extensions.crop'));
$assets_jquery = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('system.web.js.source'));
?>
<link rel="stylesheet" type="text/css" href="<?php echo $assets_path;?>/css/jquery.Jcrop.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $assets_path;?>/css/demos.css" />
<script type="text/javascript" src="<?php echo $assets_jquery;?>/jquery.js"></script>
<script type="text/javascript" src="<?php echo $assets_path;?>/js/jquery.Jcrop.js"></script>
<script type="text/javascript" src="<?php echo $assets_path;?>/js/jquery.color.js"></script>
<script>
jQuery(function(){
			jQuery('#cropimage').Jcrop(
				{
					setSelect: [ 0, 0, <?php echo $width;?>, <?php echo $height;?> ],
					allowResize: false,
					onSelect:   showCoords,
					allowSelect: false
				}
			);
		});
function showCoords(c)
{
  $('#x').val(c.x);
  $('#y').val(c.y);
  $('#w').val(c.w);
  $('#h').val(c.h);
};
		</script>
<form method="post" action="<?php //echo Yii::app()->createUrl('/admin_news/news/cropnow');?>">
<button id="cropnow" name="crop">Crop</button>
<input type="hidden" id="x" name="x" value="0" />
<input type="hidden" id="y" name="y" value="0" />
<input type="hidden" id="w" name="w" value="<?php echo $width;?>" />
<input type="hidden" id="h" name="h" value="<?php echo $height;?>" />
<input type="hidden" id="url" name="url" value="<?php echo $url;?>" />
</form>
<div><img id = "cropimage" src="<?php echo Yii::app()->params['site_url'].$url;?>" /></div>
